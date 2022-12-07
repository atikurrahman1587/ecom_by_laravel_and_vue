<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $sub_category;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('sub-category.manage',['sub_categories'=>SubCategory::all(), 'categories'=>Category::where('status', '=', 1)->get()]);
    }

    public function updateStatus($id) {
        return redirect()->back()->with('message', SubCategory::updateSubCategoryStatus($id));
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
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'Sub Category info create successfully');
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
        return view('sub-category.edit',['sub_category'=>SubCategory::find($id), 'sub_categories'=>SubCategory::all(),'categories'=>Category::where('status', '=', 1)->get()]);
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
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category')->with('message', 'Sub Category info Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sub_category = SubCategory::find($id);
        if (file_exists($this->sub_category->image))
        {
            if ($this->sub_category->image != 'dummy.jpg')
            {
                unlink($this->sub_category->image);
            }
        }
        $this->sub_category->delete();
        return redirect('/sub-category')->with('message', 'Sub Category info Delete successfully');
    }
}
