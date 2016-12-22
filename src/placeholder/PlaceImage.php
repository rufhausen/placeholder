<?php

namespace Rufhausen\Placeholder;

class PlaceImage
{
    use PlaceHolderTrait;

    public static function make($imagePath, $width, $height = null, $tagAttributes = null, $imageOptions = null)
    {
        $service = self::getService();

        return $service->getImageTag($imagePath, $width, $height, $tagAttributes, $imageOptions);
    }
}
