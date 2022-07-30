<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSlider extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Slider::all();
        return view('admin.slider.list', [
            'title' => 'Admin | Slider',
            'content' => 'List Slider',
            'collection' => $collection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->fill($request->all());

        $file = $request->file('thumb');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('Backend/img/', $filename);
        $slider->thumb = $filename;
        $slider->save();
        return response()->json([
            'alert' => 'success',
            'echo' => $file
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::find($id);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->fill($request->all());

        if ($request->file('thumb') == ''){
            $slider->thumb = $request->input('image');
        }else{
            $file = $request->file('thumb');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('Backend/img/', $filename);
            $slider->thumb = $filename;
        }

        $slider->save();
        return response()->json([
            'alert' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
    }
}
