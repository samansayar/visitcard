<?php

namespace App\Http\Controllers;

use App\Models\VisitTitle;
use Illuminate\Http\Request;

class VisitTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.visit_titles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visit_titles.create');
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
     * @param  \App\Models\VisitTitle  $visitTitle
     * @return \Illuminate\Http\Response
     */
    public function show(VisitTitle $visitTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitTitle  $visitTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitTitle $visitTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitTitle  $visitTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitTitle $visitTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitTitle  $visitTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitTitle $visitTitle)
    {
        //
    }
}
