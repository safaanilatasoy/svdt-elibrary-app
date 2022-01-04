<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FiledownloaderController extends Controller
{
    public function download_local(Request $request){
        // get file from local storage
        if(Storage::disk('local')->exists("pdf/$request->file")){
            $path=Storage::disk('local')->path("pdf/$request->file");
            $content =file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');

    }

    // get file from public storage

    public function download_public(Request $request){
        // get file from public storage
        if(Storage::disk('public')->exists("pdf/$request->file")){
            $path=Storage::disk('public')->path("pdf/$request->file");
            $content =file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
