<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form::query()->get();
        dd($data[0]->feild);
        return view('admin.form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_shop' => 'required|string',
            'access' => 'required|string',
            'feild' => 'required|array',
            'show_in_shop' => 'required|string',
            'show_in_cardvisit' => 'required|string',
            'startdate' => 'required|string',
            'endstart' => 'required|string'
        ]);


        $result = $request->user()->Form()->create([
            "title_shop" => $request->title_shop,
            "access" => $request->access,
            "feild" => $request->feild,
            "show_in_shop" => $request->show_in_shop,
            "show_in_cardvisit" => $request->show_in_cardvisit,
            "startdate" => $request->startdate,
            "endstart" => $request->endstart,
        ]);
        return back()->with('success', 'اطلاعات فروشگاه با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
