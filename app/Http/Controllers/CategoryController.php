<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $category;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('category.manage',['categories'=>Category::all()]);
    }

    public function updateStatus($id) {
        return redirect()->back()->with('message', Category::updateCategoryStatus($id));
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
        Category::newCategory($request);
        return redirect()->back()->with('message', 'Category info create successfully');
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
        return view('category.edit',['category'=>Category::find($id), 'categories'=>Category::all()]);
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
        Category::updateCategory($request, $id);
        return redirect('/category')->with('message', 'Category info Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            if ($this->category->image != 'dummy.jpg')
            {
                unlink($this->category->image);
            }
        }
        $this->category->delete();
        return redirect('/category')->with('message', 'Category info Delete successfully');
    }
}
