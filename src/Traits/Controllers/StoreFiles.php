<?php


namespace AbdallhSamy\Helpers\Traits\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait StoreFiles
{
    /**
     * Does very basic image validity checking and stores it
     * @Notice: This is not an alternative to the model validation for this field.
     * @param Request $request
     * @param string $fieldName
     * @param string $directory
     * @return false|JsonResponse|string
     */
    public function storeFile(Request $request, $fieldName = 'image', $directory = 'unknown')
    {
        if ($request->hasFile($fieldName)) {

            if (!$request->file($fieldName)->isValid()) {

                return response()->json(['error' => 'file is not valid'], 415);
            }

            return $request->file($fieldName)->store('uploads/' . $directory, 'public');
        }

        return null;
    }
}
