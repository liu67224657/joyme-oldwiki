<?php

$wgHooks['EditPage::showEditForm:initial'][] = 'showEditForm';
function showEditForm($form){
global $wgOut;
$wgOut->addScriptFile( '/extensions/ckeditor/ckeditor.js' );
$script =
"<script type=\"text/javascript\">
window.onload = function()
{
CKEDITOR.replace( 'wpTextbox1' );
};
if ( window.removeEventListener )
window.removeEventListener( 'load', mwSetupToolbar, false ) ;
else if ( window.detachEvent )
window.detachEvent( 'onload', mwSetupToolbar ) ;
</script>";

$wgOut->addHTML($script);

return true;
}

?>