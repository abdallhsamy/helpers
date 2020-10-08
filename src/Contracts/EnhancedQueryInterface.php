<?php

namespace AbdallhSamy\Helpers\Contracts;

interface EnhancedQueryInterface
{
    /**
     * Must be implemented if you want to use QueryResult
     *
     * @param $items
     * @return Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function collection($items) : ResourceCollection;
}
