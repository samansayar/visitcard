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
        $data = Semat::query()->get();
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
        $request->validate([
            "name_semat" => 'string|required',
            "sort" => 'string|required',
            "desc" => 'string|required',
        ]);

        $request->user()->semat()->create([
            'name_semat' => $request->name_semat,
            'sort' => $request->sort,
            'desc' => $request->desc,
        ]);

        return redirect(route('admin.semat.index'))->with('success', 'سمت جدید با موفقیت ثبت شد');
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
        return view('admin.semat.edit', [
            'data' => $semat,
        ]);
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
        $request->validate([
            "name_semat" => 'string|required',
            "sort" => 'string|required',
            "desc" => 'string|required',
        ]);

        $semat->update([
            'name_semat' => $request->name_semat,
            'sort' => $request->sort,
            'desc' => $request->desc,
        ]);

        return redirect(route('admin.semat.index'))->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semat  $semat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semat $semat)
    {
        $semat->delete();

        return back()->with('success', 'سمت حذف شد');
    }
}
