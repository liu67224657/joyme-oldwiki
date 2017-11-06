<?php

    //当上传完一个文件执行此操作
    function onFileUpload($filename,$archivename,$uid,$uname,$time){

//        DataSynchronization::addImagesData($filename,$archivename,$uid,$uname,$time);
    }

    $wgHooks['FileUploadData'][] = 'onFileUpload';


?>