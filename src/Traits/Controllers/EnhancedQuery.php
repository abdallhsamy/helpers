<?php

namespace AbdallhSamy\Helpers\Traits\Controllers;

/**
 * Trait EnhancedQuery
 * @package AbdallhSamy\Helpers\Traits\Controllers
 * @method collection  @see AbdallhSamy\Helpers\Contracts\EnhancedQueryInterface
 */
trait EnhancedQuery
{
    /**
     * used to get all data of resource with trashed item or only trashed or not deleted
     *
     * @param array|mixed $data Request::all()
     * @return mixed
     */
    public function query($data)
    {
        $result = $this->model->filter($data);

        if ($data) {
            if (isset($data['search']) &&$data['search']) {
                $result = $result->search($data['search']);
            }

            if (isset($data['action']) && $data['action']) {
                if ($data['action'] === 'onlyTrashed') {
                    $result = $result->onlyTrashed();
                } else if ($data['action'] === 'withTrashed') {
                    $result = $result->withTrashed();
                }
            }

            if (isset($data['limit']) &&$data['limit']) {
                $result = $result->paginate($data['limit']);
            }

            return $this->collection($result);
        }
        return $this->collection($result->get());
    }
}
