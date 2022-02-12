<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display the starting page of the application.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->where('parent_id','=',1)
            ->get();

        $files = DB::table('files')
            ->where('category_id', '=',1)
            ->get();

        return view('welcome',[
            'categories' => $categories,
            'files' => $files
        ]);
    }
}
