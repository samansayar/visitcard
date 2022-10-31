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
            'title' => 'required|string',
            'accessbiliy' => 'required|string',
            'feild' => 'required|array',
            'show_in_shop' => 'required|string',
            'show_in_cardvisit' => 'required|string',
            'startdate' => 'required|string',
            'endstart' => 'required|string'
        ]);


        $result = $request->user()->Form()->create([
            "title_shop" => $request->title,
            "access" => $request->accessbiliy,
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
        return view('admin.form.edit', [
            'data' => $form,
        ]);
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
        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'accessbiliy' => 'required|string',
            'feild' => 'required|array',
            'show_in_shop' => 'required|string',
            'show_in_cardvisit' => 'required|string',
            'startdate' => 'required|string',
            'endstart' => 'required|string'
        ]);


       $form->update([
            "title_shop" => $request->title,
            "access" => $request->accessbiliy,
            "feild" => $request->feild,
            "show_in_shop" => $request->show_in_shop,
            "show_in_cardvisit" => $request->show_in_cardvisit,
            "startdate" => $request->startdate,
            "endstart" => $request->endstart,
        ]);
        return redirect(route('admin.form.index'))->with('success', 'فرم با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return back()->with('success', 'فرم حذف شد ');
    }
}
