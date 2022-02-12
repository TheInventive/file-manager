<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccessRequest;
use App\Http\Requests\UpdateAccessRequest;
use App\Models\Access;
use Illuminate\Http\Response;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAccessRequest $request
     * @return Response
     */
    public function store(StoreAccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Access $access
     * @return Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Access $access
     * @return Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAccessRequest $request
     * @param Access $access
     * @return Response
     */
    public function update(UpdateAccessRequest $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Access $access
     * @return Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
