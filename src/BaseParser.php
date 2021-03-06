<?php

namespace GlobalXtreme\Parser;

class BaseParser
{
    /**
     * @param $collections
     *
     * @return array|null
     */
    public static function get($collections)
    {
        if (!$collections || count($collections) == 0) {
            return null;
        }

        $data = [];
        foreach ($collections as $collection) {
            $data[] = self::first($collection);
        }

        return $data;
    }

    /**
     * @param $data
     *
     * @return array|null
     */
    public static function first($data)
    {
        if (!$data) {
            return null;
        }

        $result = collect($data)->except(['created_at', 'updated_at', 'deleted_at'])->toArray();

        return $result + [
                'createdAt' => $data->created_at?->format('d/m/Y H:i')
            ];
    }

    /**
     * @param $collections
     *
     * @return array|null
     */
    public static function briefs($collections)
    {
        return self::get($collections);
    }

    /**
     * @param $data
     *
     * @return array|null
     */
    public static function brief($data)
    {
        return self::first($data);
    }

}
