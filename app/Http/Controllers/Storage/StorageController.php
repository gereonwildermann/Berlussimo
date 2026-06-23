<?php

namespace App\Http\Controllers\Storage;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class StorageController extends Controller
{
    const BASE_PATH = 'storage';

    public function asset($path)
    {
        if(Storage::exists($path)) {
            $resource_local_path = Storage::fullPath($path);
            return response()->file($resource_local_path);
        }
        throw new FileNotFoundException($path);
    }
}