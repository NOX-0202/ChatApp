<?php 

function site(String $param = null): string
{
    if ($param && !empty(SITE[$param])) {
        return SITE[$param];    
    } else {
        return SITE["baseUrl"];
    }
    
}

function asset(String $path, $time = true): string
{
    $file = SITE['baseUrl'] . "/views/assets/{$path}"; 
    $dir_file = dirname(__DIR__, 1) . "/views/assets/{$path}";

    if ($time && file_exists($dir_file)) {
        $file .= "?time=" . filemtime($dir_file);
    }

    return $file;
}