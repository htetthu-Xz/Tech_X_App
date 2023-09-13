<?php

use Embed\Embed;
use Illuminate\Support\Facades\Storage;

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

if(!function_exists('uploadImage')) {
    function uploadImage($file, $path) {
        $file_name = uniqid() . '_' . date('Y-m-d-h-i-s') . '_' . $file->getClientOriginalName();
        Storage::put($path . $file_name, file_get_contents($file));
        return $file_name;
    }
}

if(!function_exists('getProfile')) {
    function getProfile($profile) {
        if(null !== $profile) {
            return asset('storage/images/profile/' . $profile);
        } else {
            return asset('storage/images/profile/noprofile.jpg');
        }
    }
}

if(!function_exists('getCoursePhotos')) {
    function getCoursePhotos($photo) {
        if('' !== $photo) {
            return asset('storage/images/course/' . $photo);
        } else {
            return asset('storage/images/nophoto.jpg');
        }
    }
}

if(!function_exists('getEpisodePhotos')) {
    function getEpisodePhotos($photo) {
        if('' !== $photo) {
            return asset('storage/images/episode/' . $photo);
        } else {
            return asset('storage/images/nophoto.jpg');
        }
    }
}

if(!function_exists('getEpisodes')) {
    function getEpisodes($video) {
        return asset('storage/images/episode/video/' . $video);
    }
}

if(!function_exists('getRole')) {
    function getRole($value) {
        if(empty($value)) {
            return 'No Role';
        } else {
            return $value[0]['name'];
        }
    }
}