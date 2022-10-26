<?php

namespace App\Http\Controllers;

use App\Models\accessbility;
use Illuminate\Http\Request;

class AccessbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.accessbility.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessbility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accessbility  $accessbility
     * @return \Illuminate\Http\Response
     */
    public function show(accessbility $accessbility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accessbility  $accessbility
     * @return \Illuminate\Http\Response
     */
    public function edit(accessbility $accessbility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accessbility  $accessbility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accessbility $accessbility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accessbility  $accessbility
     * @return \Illuminate\Http\Response
     */
    public function destroy(accessbility $accessbility)
    {
        //
    }
}
