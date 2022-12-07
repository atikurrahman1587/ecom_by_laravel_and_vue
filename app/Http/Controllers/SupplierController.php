<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $supplier;

    public function index() {
        return view('supplier.manage',['suppliers' => Supplier::orderBy('id', 'DESC')->get()]);
    }


    public function create(Request $request) {
        Supplier::newSupplier($request);
        return redirect()->back()->with('message', 'Supplier info create successfully');
    }

    public function updateStatus($id) {
        return redirect()->back()->with('message', Supplier::updateSupplierStatus($id));
    }

    public function detail($id) {
        return view('supplier.detail',['product'=>Supplier::find($id)]);
    }

    public function edit($id) {
        return view('supplier.edit',['supplier'=>Supplier::find($id),'suppliers'=>Supplier::orderBy('id', 'DESC')->get()]);
    }

    public function update(Request $request, $id) {
        Supplier::updateSupplier($request, $id);
        return redirect('add-new-supplier')->with('message', 'Supplier info update successfully');
    }

    public function delete(Request $request,$id) {
        $this->supplier = Supplier::find($id);
        if (file_exists($this->supplier->logo))
        {
            if ($this->supplier->logo != 'dummy.jpg')
            {
                unlink($this->supplier->logo);
            }
        }
        $this->supplier->delete();
        return redirect()->back()->with('message', 'Supplier info delete successfully');
    }}
