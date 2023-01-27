<?php

if (!function_exists('loadFileData')) {
    function loadFileData($directory)
    {
        $filesData = [];
        if ($handle = opendir($directory)) {

            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {
                    $filesData[] = include "$directory$entry";
                }
            }

            closedir($handle);
        }
        return $filesData[0];
    }
}

if (!function_exists('dd')) {
    function dd($array, $die = 1)
    {
        echo '<pre><div style="background-color:#000;color:#fff;font-size:12px;">';
        print_r($array);
        echo '</div></pre>';
        $die ? die : '';
    }
}

if (!function_exists('asset')) {
    function asset($dir)
    {
        $protocol = ($_SERVER['HTTPS'] ?? 'off') === 'on' ? 'https' : 'http';
        // return "$protocol://localhost:8080/$dir";
        return sprintf("$protocol://%s:%s/$dir", $_SERVER['SERVER_NAME'],$_SERVER['SERVER_PORT']);
    }
}
