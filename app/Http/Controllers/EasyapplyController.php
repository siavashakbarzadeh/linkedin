<?php

namespace App\Http\Controllers;

use App\Models\Easyapply;
use App\Http\Requests\StoreEasyapplyRequest;
use App\Http\Requests\UpdateEasyapplyRequest;

class EasyapplyController extends Controller
{
    public function easy()
    {
        $response = Http::withToken($accessToken)
            ->get('https://api.linkedin.com/v2/jobs?keywords=your-keywords');

        $jobs = $response->json();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEasyapplyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Easyapply $easyapply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Easyapply $easyapply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEasyapplyRequest $request, Easyapply $easyapply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Easyapply $easyapply)
    {
        //
    }
}
