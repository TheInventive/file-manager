<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function fileUploadPost(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required',
        ]);

        $name = $request->file('file')->getClientOriginalName();

        Storage::disk('local')->putFileAs('',$request->file('file'),$name);

        //DB INSERT
        DB::insert('insert into files (file_name, category_id) values (?, ?)', [$name, $request->category_id]);

        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file',$name);
    }

    public function fileDownloadPost($file_name)
    {
        $headers = [
            'Content-Description' => 'File Transfer',
            'Content-Type' => 'application/octet-stream',
            'Cache-Control' => 'no-cache, must-revalidate',
            'Expires' => 0,
            'Content-Disposition' => 'attachment; filename="'.basename($file_name).'"',
            'Content-Length' => Storage::size($file_name),
            'Pragma' => 'public'
        ];
        return \Response::download(Storage::path($file_name),$file_name ,$headers);
    }

    public function delete(Request $request)
    {
        if (file_exists($file)) {
            return unlink($file);
        } else {
            echo('File not found.');
        }
    }
}
