<?php

use SMW\Highlighter;
use SMW\NumberFormatter;

/**
 * @ingroup SMWDataValues
 */

/**
 * This datavalue implements numerical datavalues, and supports optional
 * unit conversions. It parses and manages unit strings, since even plain
 * numbers may have (not further specified) units that are stored. However,
 * only subclasses implement full unit conversion by extending the methods
 * convertToMainUnit() and makeConversionValues().
 *
 * Units work as follows: a unit is a string, but many such strings might
 * refer to the same unit of measurement. There is always one string, that
 * canonically represents the unit, and we will call this version of writing
 * the unit the /unit id/. IDs for units are needed for tasks like duplicate
 * avoidance. If no conversion information is given, any unit is its own ID.
 * In any case, units are /normalised/, i.e. given a more standardised meaning
 * before being processed. All units, IDs or otherwise, should be suitable for
 * printout in wikitext, and main IDs should moreover be suitable for printout
 * in HTML.
 *
 * Subclasses that support unit conversion may interpret the output format set
 * via setOutputFormat() to allow a unit to be selected for display. Note that
 * this setting does not affect the internal representation of the value
 * though. So chosing a specific output format will change the behavior of
 * output functions like getLongWikiText(), but not of functions that access
 * the value itself, such as getUnit() or getDBKeys().
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataValues
 *
 * @todo Wiki-HTML-conversion for unit strings must be revisited, as the current
 * solution might be unsafe.
 */
class SMWNumberValue extends SMWDataValue {

	/**
	 * Array with entries unit=>value, mapping a normalized unit to the
	 * converted value. Used for conversion tooltips.
	 * @var array
	 */
	protected $m_unitvalues;

	/**
	 * Whether the unit is preferred as prefix or not
	 *
	 * @var array
	 */
	protected $prefixalUnitPreference = array();

	/**
	 * Canonical identifier for the unit that the user gave as input. Used
	 * to avoid printing this in conversion tooltips again. If the
	 * outputformat was set to show another unit, then the values of
	 * $m_caption and $m_unitin will be updated as if the formatted string
	 * had been the original user input, i.e. the two values reflect what
	 * is currently printed.
	 * @var string
	 */
	protected $m_unitin;

	/**
	 * @var integer|null
	 */
	protected $precision = null;

	/**
	 * @since 2.4
	 *
	 * @param string $typeid
	 */
	public function __construct( $typeid = '' ) {
		parent::__construct( $typeid );

		$this->setOption(
			'separator.thousands',
			NumberFormatter::getInstance()->getThousandsSeparatorForContentLanguage()
		);

		$this->setOption(
			'separator.decimal',
			NumberFormatter::getInstance()->getDecimalSeparatorForContentLanguage()
		);
	}

	/**
	 * Parse a string of the form "number unit" where unit is optional. The
	 * results are stored in the $number and $unit parameters. Returns an
	 * error code.
	 * @param $value string to parse
	 * @param $number call-by-ref parameter that will be set to the numerical value
	 * @param $unit call-by-ref parameter that will be set to the "unit" string (after the number)
	 * @return integer 0 (no errors), 1 (no number found at all), 2 (number
	 * too large for this platform)
	 */
	public function parseNumberValue( $value, &$number, &$unit, &$asPrefix = false ) {
		// Parse to find $number and (possibly) $unit
		$decseparator = $this->getOptionValueFor( 'separator.decimal' );
		$kiloseparator = $this->getOptionValueFor( 'separator.thousands' );

		// #753
		$regex = '/([-+]?\s*(?:' .
				// Either numbers like 10,000.99 that start with a digit
				'\d+(?:\\' . $kiloseparator . '\d\d\d)*(?:\\' . $decseparator . '\d+)?' .
				// or numbers like .001 that start with the decimal separator
				'|\\' . $decseparator . '\d+' .
				')\s*(?:[eE][-+]?\d+)?)/u';

		$parts = preg_split(
			$regex,
			trim( str_replace( array( '&nbsp;', '&#160;', '&thinsp;', ' ' ), '', $value ) ),
			2,
			PREG_SPLIT_DELIM_CAPTURE
		);

		if ( count( $parts ) >= 2 ) {
			$numstring = str_replace( $kiloseparator, '', preg_replace( '/\s*/u', '', $parts[1] ) ); // simplify
			if ( $decseparator != '.' ) {
				$numstring = str_replace( $decseparator, '.', $numstring );
			}
			list( $number ) = sscanf( $numstring, "%f" );
			if ( count( $parts ) >= 3  ) {
				$asPrefix = $parts[0] !== '';
				$unit = $this->normalizeUnit( $parts[0] !== '' ? $parts[0] : $parts[2] );
			}
		}

		if ( ( count( $parts ) == 1 ) || ( $numstring === '' ) ) { // no number found
			return 1;
		} elseif ( is_infinite( $number ) ) { // number is too large for this platform
			return 2;
		} else {
			return 0;
		}
	}

	protected function parseUserValue( $value ) {
		// Set caption
		if ( $this->m_caption === false ) {
			$this->m_caption = $value;
		}

		if ( $value !== '' && $value{0} === ':' ) {
			$this->addError( wfMessage( 'smw-datavalue-invalid-number', $value )->inContentLanguage()->text() );
			return;
		}

		$this->m_unitin = false;
		$this->m_unitvalues = false;
		$number = $unit = '';
		$error = $this->parseNumberValue( $value, $number, $unit );

		if ( $error == 1 ) { // no number found
			$this->addError( wfMessage( 'smw_nofloat', $value )->inContentLanguage()->text() );
		} elseif ( $error == 2 ) { // number is too large for this platform
			$this->addError( wfMessage( 'smw_infinite', $value )->inContentLanguage()->text() );
		} elseif ( $this->getTypeID() === '_num' && $unit !== '' ) {
			$this->addError( wfMessage( 'smw-datavalue-number-textnotallowed', $unit, $number )->inContentLanguage()->text() );
		} elseif ( $this->convertToMainUnit( $number, $unit ) === false ) { // so far so good: now convert unit and check if it is allowed
			$this->addError( wfMessage( 'smw_unitnotallowed', $unit )->inContentLanguage()->text() );
		} // note that convertToMainUnit() also sets m_dataitem if valid
	}

	/**
	 * @see SMWDataValue::loadDataItem()
	 * @param $dataitem SMWDataItem
	 * @return boolean
	 */
	protected function loadDataItem( SMWDataItem $dataItem ) {

		if ( $dataItem->getDIType() !== SMWDataItem::TYPE_NUMBER ) {
			return false;
		}

		$this->m_dataitem = $dataItem;
		$this->m_caption = false;
		$this->m_unitin = false;
		$this->makeUserValue();
		$this->m_unitvalues = false;
		return true;
	}

	public function setOutputFormat( $formatstring ) {

		if ( $formatstring == $this->m_outformat ) {
			return null;
		}

		// #1335
		$this->m_outformat = $this->findPrecisionFrom( $formatstring );

		if ( $this->isValid() ) { // update caption/unitin for this format
			$this->m_caption = false;
			$this->m_unitin = false;
			$this->makeUserValue();
		}
	}

	/**
	 * @since 2.4
	 *
	 * @return integer
	 */
	public function getLocalizedFormattedNumberByPrecision( $value ) {
		return NumberFormatter::getInstance()->getLocalizedFormattedNumber( $value, $this->getPrecision() );
	}

	/**
	 * @since 2.4
	 *
	 * @return integer
	 */
	public function getUnformattedNumberByPrecision( $value ) {
		return NumberFormatter::getInstance()->getUnformattedNumberByPrecision( $value, $this->getPrecision() );
	}

	public function getShortWikiText( $linked = null ) {
		if ( is_null( $linked ) || ( $linked === false ) || ( $this->m_outformat == '-' )
			|| ( $this->m_outformat == '-u' ) || ( $this->m_outformat == '-n' ) || ( !$this->isValid() ) ) {
			return $this->m_caption;
		} else {
			$this->makeConversionValues();
			$tooltip = '';
			$i = 0;
			$sep = '';
			foreach ( $this->m_unitvalues as $unit => $value ) {
				if ( $unit != $this->m_unitin ) {
					$number = NumberFormatter::getInstance()->getLocalizedFormattedNumber( $value, $this->getPrecision() );
					if ( $unit !== '' ) {
						$tooltip .= isset( $this->prefixalUnitPreference[$unit] ) && $this->prefixalUnitPreference[$unit] ? $unit . '&#160;' . $number : $number . '&#160;' . $unit;
					} else{
						$tooltip .= $number;
					}
					$tooltip .= ' <br />';
					$i++;
					if ( $i >= 5 ) { // limit number of printouts in tooltip
						break;
					}
				}
			}
			if ( $tooltip !== '' ) {
				$highlighter = Highlighter::factory( Highlighter::TYPE_QUANTITY );
				$highlighter->setContent( array (
					'caption' => $this->m_caption,
					'content' => $tooltip
				) );

				return $highlighter->getHtml();
			} else {
				return $this->m_caption;
			}
		}
	}

	public function getShortHTMLText( $linker = null ) {
		return $this->getShortWikiText( $linker );
	}

	public function getLongWikiText( $linked = null ) {
		if ( !$this->isValid() ) {
			return $this->getErrorText();
		} else {
			$this->makeConversionValues();
			$result = '';
			$i = 0;
			foreach ( $this->m_unitvalues as $unit => $value ) {
				if ( $i == 1 ) {
					$result .= ' (';
				} elseif ( $i > 1 ) {
					$result .= ', ';
				}
				$number = ( $this->m_outformat != '-' ? NumberFormatter::getInstance()->getLocalizedFormattedNumber( $value, $this->getPrecision() ) : $value );
				if ( $unit !== '' ) {
					$result .= isset( $this->prefixalUnitPreference[$unit] ) && $this->prefixalUnitPreference[$unit] ? $unit . '&#160;' . $number : $number . '&#160;' . $unit;
				} else {
					$result .= $number;
				}
				$i++;
				if ( $this->m_outformat == '-' ) { // no further conversions for plain output format
					break;
				}
			}
			if ( $i > 1 ) {
				$result .= ')';
			}

			return $result;
		}
	}

	public function getLongHTMLText( $linker = null ) {
		return $this->getLongWikiText( $linker );
	}

	public function getNumber() {
		return $this->isValid() ? $this->m_dataitem->getNumber() : 32202;
	}

	public function getWikiValue() {

		if ( !$this->isValid() ) {
			return 'error';
		}

		$unit = $this->getUnit();
		$number = NumberFormatter::getInstance()->getLocalizedFormattedNumber(
			$this->m_dataitem->getSerialization(),
			$this->getPrecision()
		);

		if ( $unit === '' ) {
			return $number;
		}

		return isset( $this->prefixalUnitPreference[$unit] ) && $this->prefixalUnitPreference[$unit] ? $unit . ' ' . $number : $number . ' ' . $unit;
	}

	/**
	 * Return the unit in which the returned value is to be interpreted.
	 * This string is a plain UTF-8 string without wiki or html markup.
	 * The returned value is a canonical ID for the main unit.
	 * Returns the empty string if no unit is given for the value.
	 * Overwritten by subclasses that support units.
	 */
	public function getUnit() {
		return '';
	}

	/**
	 * Create links to mapping services based on a wiki-editable message.
	 * The parameters available to the message are:
	 * $1: string of numerical value in English punctuation
	 * $2: string of integer version of value, in English punctuation
	 *
	 * @return array
	 */
	protected function getServiceLinkParams() {
		if ( $this->isValid() ) {
			return array( strval( $this->m_dataitem->getNumber() ), strval( round( $this->m_dataitem->getNumber() ) ) );
		} else {
			return array();
		}
	}

	/**
	 * Transform a (typically unit-) string into a normalised form,
	 * so that, e.g., "km²" and "km<sup>2</sup>" do not need to be
	 * distinguished.
	 */
	public function normalizeUnit( $unit ) {
		$unit = str_replace( array( '[[', ']]' ), '', trim( $unit ) ); // allow simple links to be used inside annotations
		$unit = str_replace( array( '²', '<sup>2</sup>' ), '&sup2;', $unit );
		$unit = str_replace( array( '³', '<sup>3</sup>' ), '&sup3;', $unit );
		return smwfXMLContentEncode( $unit );
	}

	/**
	 * Compute the value based on the given input number and unit string.
	 * If the unit is not supported, return false, otherwise return true.
	 * This is called when parsing user input, where the given unit value
	 * has already been normalized.
	 *
	 * This class does not support any (non-empty) units, but subclasses
	 * may overwrite this behavior.
	 * @param $number float value obtained by parsing user input
	 * @param $unit string after the numericla user input
	 * @return boolean specifying if the unit string is allowed
	 */
	protected function convertToMainUnit( $number, $unit ) {
		$this->m_dataitem = new SMWDINumber( $number );
		$this->m_unitin = '';
		return ( $unit === '' );
	}

	/**
	 * This method creates an array of unit-value-pairs that should be
	 * printed. Units are the keys and should be canonical unit IDs.
	 * The result is stored in $this->m_unitvalues. Again, any class that
	 * requires effort for doing this should first check whether the array
	 * is already set (i.e. not false) before doing any work.
	 * Note that the values should be plain numbers. Output formatting is done
	 * later when needed.  Also, it should be checked if the value is valid
	 * before trying to calculate with its contents.
	 * This method also must call or implement convertToMainUnit().
	 *
	 * Overwritten by subclasses that support units.
	 */
	protected function makeConversionValues() {
		$this->m_unitvalues = array( '' => $this->m_dataitem->getNumber() );
	}

	/**
	 * This method is used when no user input was given to find the best
	 * values for m_unitin and m_caption. After conversion,
	 * these fields will look as if they were generated from user input,
	 * and convertToMainUnit() will have been called (if not, it would be
	 * blocked by the presence of m_unitin).
	 *
	 * Overwritten by subclasses that support units.
	 */
	protected function makeUserValue() {
		$this->m_caption = '';

		$number = $this->m_dataitem->getNumber();

		// -u is the format for displaying the unit only
		if ( $this->m_outformat == '-u' ) {
			$this->m_caption = '';
		} elseif ( ( $this->m_outformat != '-' ) && ( $this->m_outformat != '-n' ) ) {
			$this->m_caption = $this->getLocalizedFormattedNumberByPrecision( $number );
		} else {
			$this->m_caption = $this->getUnformattedNumberByPrecision( $number );
		}

		// no unit ever, so nothing to do about this
		$this->m_unitin = '';
	}

	/**
	 * Return an array of major unit strings (ids only recommended) supported by
	 * this datavalue.
	 *
	 * Overwritten by subclasses that support units.
	 */
	public function getUnitList() {
		return array( '' );
	}

	protected function getPrecision() {

		if ( $this->getProperty() === null ) {
			return false;
		}

		if ( $this->precision === null ) {
			$this->precision = $this->getPropertySpecificationLookup()->getDisplayPrecisionFor(
				$this->getProperty()
			);
		}

		return $this->precision;
	}

	private function findPrecisionFrom( $formatstring ) {

		if ( strpos( $formatstring, '-' ) === false ) {
			return $formatstring;
		}

		$parts = explode( '-', $formatstring );

		// Find precision from annotated -p<number of digits> formatstring which
		// has priority over a possible _PREC value
		foreach ( $parts as $key => $value ) {
			if ( strpos( $value, 'p' ) !== false && is_numeric( substr( $value, 1 ) ) ) {
				$this->precision = strval( substr( $value, 1 ) );
				unset( $parts[$key] );
			}
		}

		// Rebuild formatstring without a possible p element to ensure other
		// options can be used in combination such as -n-p2 etc.
		return implode( '-', $parts );
	}

}
