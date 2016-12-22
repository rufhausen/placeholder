<?php

namespace Rufhausen\Placeholder\Services;

class UnsplashItService implements ServiceInterface
{
    use ServiceTrait;

    protected $rootUrl = 'https://unsplash.it/';

    public function __construct()
    {
    }

    public function getImageTag($width, $height, $tagAttributes, $imageOptions)
    {
        $path          = $this->rootUrl . $width . '/' . $height;
        $tagAttributes = $this->createTagAttributes($tagAttributes);

        return '<img src="' . $path . '" ' . $tagAttributes . '>';
    }
}
