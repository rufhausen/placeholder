<?php

namespace Rufhausen\Placeholder\Services;

interface ServiceInterface
{
    public function getPlaceholderImageTag($width, $height, $tagAttributes, $imageOptions);
    public function getImageTag($imagePath, $width, $height, $tagAttributes, $imageOptions);
}
