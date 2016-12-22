<?php

namespace Rufhausen\Placeholder\Services;

class PlaceImgService implements ServiceInterface
{
    use ServiceTrait;

    protected $rootUrl = 'https://placeimg.com/';

    public function __construct()
    {
    }

    public function getPlaceholderImageTag($width, $height, $tagAttributes, $imageOptions)
    {
        $tagAttributes = $this->createTagAttributes($tagAttributes);
        $url           = $this->createPlacHolderUrl($width, $height, $imageOptions);

        return '<img src="' . $url . '" ' . $tagAttributes . '>';
    }

    public function getImageTag($imagePath, $width, $height, $tagAttributes, $imageOptions)
    {
        $tagAttributes = $this->createTagAttributes($tagAttributes);

        if (isset($imagePath) && \File::exists(public_path($imagePath))) {
            $url = $imagePath;
        } else {
            $url = $this->createPlacHolderUrl($width, $height, $imageOptions);
        }

        return '<img src="' . $url . '" ' . $tagAttributes . '>';
    }

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
