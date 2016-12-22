<?php

namespace Rufhausen\Placeholder\Services;

trait ServiceTrait
{
    public function createTagAttributes($array)
    {
        return implode(' ', array_map(
            function ($v, $k) {
                return sprintf('%s="%s"', $k, $v);
            },
            $array,
            array_keys($array)
        ));
    }
}
