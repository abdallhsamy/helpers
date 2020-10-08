<?php

namespace AbdallhSamy\Helpers\Traits\Controllers\Methods;

use Illuminate\Support\Facades\Request;

/**
 * Trait IndexTrait
 * @package AbdallhSamy\Helpers\Traits\Controllers\Methods
 * @method query
 */
trait IndexTrait
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * mixed
     * @return ResourceCollection
     */
    public function index(Request $request) : ResourceCollection
    {
        return $this->query($request->all());
    }
}
