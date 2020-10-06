<?php

namespace AbdallhSamy\Helpers\Traits\Models;

trait ModelSearch
{
    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeSearch($query, $data)
    {
        if (isset($this->searchItems) && count($this->searchItems)) {
            foreach ($this->searchItems as $item) {
                $this->addSearchItem($query , $data, $item);
            }
        }

        return $query;
    }

    /**
     * @param $query
     * @param $string
     * @param $item
     * @param string $operator
     * @return mixed
     */
    protected function addSearchItem($query , $string, $item, $operator = 'like')
    {
        if ($operator === 'like') {
            return $query->where($item, $operator, "%{$string}%");
        }

        return $query->where($item, $operator, $string);
    }
}
