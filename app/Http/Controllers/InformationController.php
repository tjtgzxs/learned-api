<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\InformationResource;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
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
    public function store(Request $request)
    {
        //get params
        $params = $request->all();
        //create new information
        $information = new Information();
        $information->fact = $params['fact'];
        $information->category_id = $params['category_id'];
        $information->source = $params['source'];
         $information->save();
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        //
    }
}
