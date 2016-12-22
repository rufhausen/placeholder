<?php

namespace Rufhausen\Placeholder\Services;

trait ServiceTrait
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
}
