<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $brand;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('brand.manage',['brands'=>Brand::all()]);

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
        Brand::newBrand($request);
        return redirect()->back()->with('message', 'Brand info create successfully');

    }

    public function updateStatus($id) {
        return redirect()->back()->with('message', Brand::updateBrandStatus($id));
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
        return view('brand.edit',['brand'=>Brand::find($id),'brands'=>Brand::all()]);
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
        Brand::updateBrand($request, $id);
        return redirect('/brand')->with('message', 'Brand info Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brand = Brand::find($id);
        if (file_exists($this->brand->image))
        {
            if ($this->brand->image != 'dummy.jpg')
            {
                unlink($this->brand->image);
            }
        }
        $this->brand->delete();
        return redirect('/brand')->with('message', 'Brand info Delete successfully');
    }
}
