<?php

namespace Rufhausen\Placeholder\Services;

class BaseService
{
    public function createTagAttributes($array)
    {
        if (is_array($array)) {
            return implode(' ', array_map(
                function ($v, $k) {
                    return sprintf('%s="%s"', $k, $v);
                },
                $array,
                array_keys($array)
            ));
        }
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
}
