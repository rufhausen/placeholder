<?php

namespace Rufhausen\Placeholder;

trait PlaceHolderTrait
{
    public static function getService()
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

        return $service;
    }
}
