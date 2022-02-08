<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $request->file('file')->move('uploads', $name);

        DB::insert('insert into files (file_name, category_id) values (?, ?)', [$name, $request->category_id]);
        //save filename to the database with the correct category

        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file',$name);
    }

    public function download(Request $request)
    {
        $file = public_path(). "/images/test.jpg";

        $headers = ['Content-Type: image/jpeg'];

        if (file_exists($file)) {
            return \Response::download($file, 'plugin.jpg', $headers);
        } else {
            echo('File not found.');
        }
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
