<?php

namespace GlobalXtreme\Parser\Contract;

interface AbstractParser
{
    /**
     * @param $data
     * @param ...$args
     *
     * @return mixed
     */
    public static function response($data, ...$args);
}
