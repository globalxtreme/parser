<?php

namespace GlobalXtreme\Parser\Contract;

interface AbstractParser
{
    public static function response($data, ...$args);
}
