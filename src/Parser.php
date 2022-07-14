<?php

namespace GlobalXtreme\Parser;

use GlobalXtreme\Parser\Builder\ParserBuilder;

class Parser extends AbstractParser
{
    /**
     * @param ParserBuilder $builder
     *
     * @return array|null
     */
    public function handle(ParserBuilder $builder)
    {
        $parser = $builder->getParserClass();
        $method = $builder->getMethod();

        if (!$parser || !$method) {
            return null;
        }

        return $parser::$method($builder->data, ...$builder->arguments);
    }

}
