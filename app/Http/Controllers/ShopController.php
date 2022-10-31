<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::get();

        // dd(isset($data) ? 'true' : 'false');
        return view('dashboard.shop.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Auth::user()->member()->where('status', 1)->where('title', 'صاحب کسب و کار')->select('fname', 'lname', 'status', 'title')->get();
        // dd($members);
        return view('dashboard.shop.create', compact('members'));
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
            "type_shop" => 'string|required',
            "name_shop" => 'string|required',
            "founder_shop" => 'string|required',
            "phone" => 'string|required',
            "prephone" => 'string|required',
            "city" => 'string|required',
            "state" => 'string|required',
            "address_shop" => 'string|required',
            "desc" => 'string|required',
            "terms" => 'string|required'
        ]);

        $request->user()->shop()->create([
            "type_shop" => $request->type_shop,
            "name_shop" => $request->name_shop,
            "founder_shop" => $request->founder_shop,
            "phone" => $request->phone,
            "prephone" => $request->prephone,
            "city" => $request->city,
            "state" => $request->state,
            "address_shop" => $request->address_shop,
            "desc" => $request->desc,
        ]);

        return back()->with('success', 'اطلاعات فروشگاه با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $status = $shop->status ? false : true;
        $result = $shop->update([
            'status' => $status,
        ]);

        if ($result && $shop->status) {
            return back()->with('toggle', 'فروشگاه فعال شد');
        } else {
            return back()->with('togglefalse', 'فروشگاه غیرفعال شد');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return back()->with('success', 'فروشگاه حذف شد ');
    }
}
