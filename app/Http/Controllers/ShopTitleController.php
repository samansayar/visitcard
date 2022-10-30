<?php

namespace App\Http\Controllers;

use App\Models\ShopTitle;
use Illuminate\Http\Request;

class ShopTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopTitle::query()->get();
        return view('admin.shop_title.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop_title.create');
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
            "title_shop" => 'string|required',
            "sort" => 'string|required',
            "desc" => 'string',
        ]);

        $request->user()->ShopTitle()->create([
            'title_shop' => $request->title_shop,
            'sort' => $request->sort,
            'desc' => $request->desc,
        ]);

        return back()->with('success', 'اطلاعات کاربر با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopTitle  $shopTitle
     * @return \Illuminate\Http\Response
     */
    public function show(ShopTitle $shopTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopTitle  $shopTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopTitle $shopTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopTitle  $shopTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopTitle $shopTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopTitle  $shopTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopTitle $shopTitle)
    {
        $shopTitle->delete();

        return back()->with('success', 'عنوان فروشگاه حذف شد ');
    }
}
