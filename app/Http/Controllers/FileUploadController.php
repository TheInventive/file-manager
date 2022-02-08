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

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);
        $fileName = $request->file->getClientOriginalName();
        $category_id = $request->category_id;
        DB::insert('insert into files (file_name, category_id) values (?, ?)', [$fileName, $category_id]);
        //save filename to the database with the correct category


        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file',$fileName);

    }
}
