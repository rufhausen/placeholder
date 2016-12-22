<?php

namespace Rufhausen\Placeholder\Services;

class UnsplashItService extends BaseService implements ServiceInterface
{
    protected $rootUrl = 'https://unsplash.it/';

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
