<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\InformationResource;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!empty($request->category_id)&&$request->category_id!=0){
            if(Cache::get('information_'.$request->category_id)){
                return Cache::get('information_'.$request->category_id);
            }
            $list=InformationResource::collection(Information::where('category_id', $request->category_id)->orderBy('id', 'desc')->get());
            Cache::put('information_'.$request->category_id, $list, 60);
            return $list;
        }
        if(Cache::get('information_all')){
            return Cache::get('information_all');
        }

        $list= InformationResource::collection(Information::orderBy('id', 'desc')->get());
        Cache::put('information_all', $list, 60);
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
        DB::table('information')->increment('voteInteresting', 1, ['id' => $request->id]);
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
    }
    public  function increaseFalse(Request $request){
        DB::table('information')->increment('voteFalse', 1, ['id' => $request->id]);
        return InformationResource::collection(Information::orderBy('id', 'desc')->get());
    }
    public  function increaseMindBlowing(Request $request){
        DB::table('information')->increment('voteMindBlowing', 1, ['id'=> $request->id]);
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
