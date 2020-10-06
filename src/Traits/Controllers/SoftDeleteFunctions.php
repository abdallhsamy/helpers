<?php

namespace AbdallhSamy\Helpers\Traits\Controllers;

use Illuminate\Http\Request;

trait SoftDeleteFunctions
{

    public function destroy(Request $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->delete();
            }
        }

        return $this->queryResult($request->all());
    }

    public function restore(Request $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->restore();
            }
        }
        return $this->queryResult($request->all());
    }

    public function forceDelete(Request $request)
    {
        foreach ($request->ids as $id) {
            if ($item = $this->model->withTrashed()->find($id)) {
                $item->forceDelete();
            }
        }
        return $this->queryResult($request->all());
    }
}
