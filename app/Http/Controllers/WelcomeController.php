<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->whereNull('parent_id')
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
}
