<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->where('parent_id','=',1)
            ->get();
        return view('welcome',[
            'categories' => $categories
        ]);
    }

    public function indexFiles($category_id): JsonResponse
    {
        $files = DB::table('files')
            ->where('category_id','=',$category_id)
            ->get();
        return response()->json($files);
    }

    public function indexSubCategories($category_id) : JsonResponse
    {
        $subCategories = DB::table('categories')
            ->where('parent_id','=',$category_id)
            ->get();
        return response()->json($subCategories);
    }

    public function indexSiblings($category_id): JsonResponse
    {
        $siblings = Category::select(DB::raw('*'))
            ->from(DB::raw(" categories where parent_id = (select p.id as parent_id from categories i left outer join categories p on i.parent_id = p.id where i.id = $category_id)"))
            ->get();

        return response()->json($siblings);
    }
}
