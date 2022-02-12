<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Files;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $files = DB::table('files')
            ->where('category_id','=',$id)
            ->get();
        return response()->json($files);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexBySibling(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $siblings = Category::select(DB::raw('*'))
            ->from(DB::raw(" categories where parent_id = (select p.id as parent_id from categories i left outer join categories p on i.parent_id = p.id where i.id = $id)"))
            ->get();

        return response()->json($siblings);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $file_name
     * @return BinaryFileResponse
     */
    public function download($file_name): BinaryFileResponse
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
        return Response::download(Storage::path($file_name),$file_name ,$headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required',
        ]);

        $name = $request->file('file')->getClientOriginalName();

        Storage::disk('local')->putFileAs('',$request->file('file'),$name);

        $category_id = $request->input('category_id');
        DB::insert('insert into files (file_name, category_id) values (?, ?)', [$name, $category_id]);

        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file',$name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return bool
     */
    public function destroy(Request $request): bool
    {
        $file_name = $request->input('file_name');
        if (file_exists(Storage::path($file_name))) {
            Files::where('file_name',$file_name)->delete();
            return unlink(Storage::path($file_name));
        }

        return false;
    }
}
