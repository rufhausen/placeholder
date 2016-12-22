<?php

namespace Rufhausen\Placeholder\Services;

class PlaceImgService implements ServiceInterface
{
    use ServiceTrait;

    protected $rootUrl = 'https://placeimg.com/';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getImageTag($width, $height, $tagAttributes, $imageOptions)
    {
        if (!empty($imageOptions)) {
            if (!empty($imageOptions['category'])) {
                $addPath = '/' . $imageOptions['category'];
            } else {
                $addPath = '/any';
            }
            if (!empty($imageOptions['color'])) {
                $addPath = $addPath . '/' . $imageOptions['color'];
            }
        }

        $path = $this->rootUrl . $width . '/' . $height . $addPath;

        return '<img src="' . $path . '">';
    }
}
