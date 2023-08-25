<?php

use Embed\Embed;

if(!function_exists('checkPermission')) {
    function checkPermission($permission, $guard = 'admin') {
        return auth()->guard($guard)->user()->hasPermissionTo($permission);
    }
}

if(!function_exists('getVideoDuration')) {
    function getVideoDuration($url)
    {
        $embed = new Embed();

        $info = $embed->get($url);

        $oembed = $info->getOEmbed();

        $durationInSeconds = $oembed->get('duration');

        $formattedDuration = gmdate("H:i:s", $durationInSeconds); // Format duration as HH:MM:SS  

        return $formattedDuration;
    }
}