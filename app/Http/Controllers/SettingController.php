<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Setting::query()->find(5));
        // dd(Setting::query()->delete());
        $data = Setting::query()->find(5);
        return view('admin.setting.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Setting::query()->find(5);
        $file_path = $data->logo;

        $request->validate([
            "title" => 'string',
            'logo' => 'mimes:jpg,png,svg|max:2048',
            "desc" => 'string|min:20'
        ]);
        if ($request->file()) {
            $fileName = 'Logo_' . time() . '.' . $request->logo->extension();
            $filePath = $request->file('logo')->storeAs('logo', $fileName, 'public');
            $file_path = $filePath;
        }

        $request->user()->setting()->find(5)->update([
            'title' => $request->title,
            'logo' => $file_path,
            'desc' => $request->desc
        ]);
        return back()
            ->with('success', 'File has been uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
