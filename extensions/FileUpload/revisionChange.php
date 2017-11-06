<?php

    function onRevisionInsertComplete( &$revision, $data, $flags ) {

        global $wgTitle,$wgUser;
//        DataSynchronization::addWordsData($wgTitle,$wgUser);
    }

    $wgHooks['RevisionInsertComplete'][] = 'onRevisionInsertComplete';
?>



