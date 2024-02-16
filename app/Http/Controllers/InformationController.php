<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\InformationResource;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!empty($request->category_id)&&$request->category_id!=0){

            $list=InformationResource::collection(Information::where('category_id', $request->category_id)->orderBy('id', 'desc')->get());
            return $list;
        }


        $list= InformationResource::collection(Information::orderBy('id', 'desc')->get());

        return $list;
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

    public  function increaseInteresting(Request $request){
        DB::table('information')->where('id',$request->id)->increment('voteInteresting', 1);
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
    }
    public  function increaseFalse(Request $request){
        DB::table('information')->where('id',$request->id)->increment('voteFalse', 1);
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
    }
    public  function increaseMindBlowing(Request $request){
        DB::table('information')->where('id',$request->id)->increment('voteMindBlowing', 1);
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
