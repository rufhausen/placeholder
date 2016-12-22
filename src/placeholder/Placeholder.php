<?php

namespace Rufhausen\Placeholder;

class Placeholder
{
    use PlaceHolderTrait;

    public static function make($width, $height = null, $tagAttributes = null, $imageOptions = null)
    {
        $service = self::getService();

        return $service->getPlaceholderImageTag($width, $height, $tagAttributes, $imageOptions);
    }
}
