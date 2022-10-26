<?php

namespace App\Http\Controllers;

use App\Models\Semat;
use Illuminate\Http\Request;

class SematController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.semat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semat  $semat
     * @return \Illuminate\Http\Response
     */
    public function show(Semat $semat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semat  $semat
     * @return \Illuminate\Http\Response
     */
    public function edit(Semat $semat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semat  $semat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semat $semat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semat  $semat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semat $semat)
    {
        //
    }
}
