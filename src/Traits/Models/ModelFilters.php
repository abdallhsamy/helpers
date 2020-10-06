<?php

namespace AbdallhSamy\Helpers\Traits\Models;

trait ModelFilters
{
    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeFilter($query, $data)
    {
        if (isset($this->filterItems) && count($this->filterItems)) {
            foreach ($this->filterItems as $item) {
                $this->addFilterItem($query , $data, $item);
            }
        }
        return $query;
    }

    /**
     * @param $query
     * @param $data
     * @param $item
     * @return mixed
     */
    protected function addFilterItem($query , $data, $item)
    {
        if (isset($data[$item]) && $data[$item] !== '') {
            $query->where($item, $data[$item]);
        }

        return $query;
    }
}
