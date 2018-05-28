<?php

function fm_get_user_file($username, $filename) {
    
}

function fm_get_user_files($username) {
    $path = DATA_PATH . DIRECTORY_SEPARATOR . $username;

    $files = array();

    if (is_dir($path)) {
        $entries = scandir($path);
        foreach ($entries as $entry) {
            $entrypath = $path . DIRECTORY_SEPARATOR . $entry;
            if (is_file($entrypath)) {
                $files[$entry] = array(
                    'filesize' => filesize($entrypath),
                    'filemtime' => filemtime($entrypath),
                );
            }
        }
    }

    return $files;
}

function fm_delete_user_file($username, $filename) {
    
}

function fm_upload_user_file($username, $path) {
    
}
