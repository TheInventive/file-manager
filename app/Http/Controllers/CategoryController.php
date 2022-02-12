<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $subCategories = DB::table('categories')
            ->where('parent_id','=',$request->id)
            ->get();
        return response()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('category_name');
        $parent_id = $request->input('parent_id');

        Category::create([
            'category_name' => $name,
            'parent_id' => (int)$parent_id
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return bool
     */
    public function destroy(Request $request): bool
    {
        $category_name = $request->category_name;
        Category::where('category_name',$category_name)->delete();
        return true;
    }
}
