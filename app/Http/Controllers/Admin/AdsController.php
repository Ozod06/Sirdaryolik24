<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::first();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_top' => 'required',
            'title_side' => 'required',
            'url_top' => 'required',
            'url_side' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image_top')) {
            $image = $request->file('image_top');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/admin/images'), $imageName);
            $requestData['image_top'] = $imageName;
        }

        if ($request->hasFile('image_side')) {
            $image = $request->file('image_side');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/admin/images'), $imageName);
            $requestData['image_side'] = $imageName;
        }

        Ad::create($requestData);
        return redirect()->route('admin.ads.index')->with('success', 'Ads added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
