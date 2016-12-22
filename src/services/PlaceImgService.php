<?php

namespace Rufhausen\Placeholder\Services;

class PlaceImgService extends BaseService implements ServiceInterface
{
    protected $rootUrl = 'https://placeimg.com/';

    public function createPlacHolderUrl($width, $height, $imageOptions)
    {
        if ($height == null) {
            $height = $width;
        }

        $addPath = '';
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

        $url = $this->rootUrl . $width . '/' . $height . $addPath;

        return $url;
    }
}
