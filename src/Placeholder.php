<?php

namespace Rufhausen\Placeholder;

class Placeholder
{
    public static function make($width, $height = null, $tagAttributes = null, $imageOptions = null)
    {
        $service = config('placeholder.service');

        switch ($service) {
        case 'unsplash.it':
            $service = new Services\UnsplashItService;
            break;

        case 'placeimg.com':
            $service = new Services\PlaceImgService;
            break;

        default:
            throw new \Exception('Placeholder service not defined.');
            break;
        }

        return $service->getImageTag($width, $height, $tagAttributes, $imageOptions);
    }
}
