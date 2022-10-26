<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = member::get();
        return view('dashboard.member.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'string|required',
            "fname" => 'string|required',
            "lname" => 'string|required',
            "phone" => 'string|required',
            "city" => 'string|required',
            "state" => 'string|required',
            "zone" => 'string|required',
            "desc" => 'string|required',
            "terms" => 'string|required'
        ]);

        $request->user()->member()->create([
            'title' => $request->title,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'zone' => $request->zone,
            'desc' => $request->desc,
        ]);

        return back()->with('success', 'اطلاعات کاربر با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        $status = $member->status ? false : true;
        $result = $member->update([
            'status' => $status,
        ]);

        if ($result && $member->status) {
            return back()->with('toggle', 'کاربر فعال شد');
        } else {
            return back()->with('togglefalse', 'کاربر غیرفعال شد');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        $member->delete();

        return back()->with('success', 'کاربر حذف شد ');
    }
}
