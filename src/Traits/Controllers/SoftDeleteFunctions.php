<?php

namespace AbdallhSamy\Helpers\Traits\Controllers;

use AbdallhSamy\Helpers\Requests\SoftDeleteRequest;

trait SoftDeleteFunctions
{
    public function destroy(SoftDeleteRequest $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->delete();
            }
        }

        return $this->query($request->all());
    }

    public function restore(SoftDeleteRequest $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->restore();
            }
        }

        return $this->query($request->all());
    }

    public function forceDelete(SoftDeleteRequest $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->forceDelete();
            }
        }

        return $this->query($request->all());
    }
}
