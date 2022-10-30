<?php

namespace App\Http\Controllers;

use App\Models\RequestVisit;
use Illuminate\Http\Request;

class RequestVisitController extends Controller
{
    public function index()
    {
        return view('dashboard.request.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lists()
    {
        $data=[];
        return view('dashboard.request.list',compact('data'));
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
        $request->validate([
            'type' => 'required|string',
            'electron_name' => 'required|string',
            'shop_name' => 'required|string',
            'flname' => 'required|string',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phonenumber' => 'required|string',
            'city' => 'required|string',
            'land' => 'required|string',
            'zone' => 'required|string',
            'desc' => 'required|string'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestVisit  $requestVisit
     * @return \Illuminate\Http\Response
     */
    public function show(RequestVisit $requestVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestVisit  $requestVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestVisit $requestVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestVisit  $requestVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestVisit $requestVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestVisit  $requestVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestVisit $requestVisit)
    {
        //
    }
}
