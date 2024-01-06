<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {

                $file = $request->file('file');
                $name = $file->getClientOriginalName();

                $file->storeAs('public/fileUpload', $name);
                return '/storage/fileUpload/' . $name;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}