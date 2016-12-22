<?php

namespace Rufhausen\Placeholder\Services;

class UnsplashItService implements ServiceInterface
{
    use ServiceTrait;

    protected $rootUrl = 'https://unsplash.it/';

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
            if (!empty($imageOptions['color'])) {
                if ($imageOptions['color'] == 'grayscale') {
                    $addPath = 'g' . '/';
                }
            }
        }

        $url = $this->rootUrl . $addPath . $width . '/' . $height . '?random';

        return $url;
    }
}
