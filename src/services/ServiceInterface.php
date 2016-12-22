<?php

namespace Rufhausen\Placeholder\Services;

interface ServiceInterface
{
    public function __construct();
    public function getImageTag($width, $height, $tagAttributes, $imageOptions);
}
