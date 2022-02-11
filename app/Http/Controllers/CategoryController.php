<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Files;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws Exception
     */
    public function index(): Response
    {
        throw new Exception();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $name = $request->input('category_name');

        Category::create([
            'category_name' => $name,
            'parent_id' => (int)$request->parent_id
        ]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return Response
     * @throws Exception
     */
    public function store(StoreCategoryRequest $request): Response
    {
        throw new \Exception();
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function show(Category $category): Response
    {
        throw new \Exception();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function edit(Category $category) : Response
    {
        throw new \Exception();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function update(UpdateCategoryRequest $request, Category $category): Response
    {
        throw new \Exception();
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
