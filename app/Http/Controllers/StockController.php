<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Stock;
use App\Models\StockDetal;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $id;
    private $sizeData;
    private $sizeArray =[];
    private $colorData;
    private $colorArray =[];
    private $index;
    private $resultArray =[];
    private $stock;
    private $stockDetail;
    private $data;

    public function index() {
        return view('stock.add',[
            'suppliers'=>Supplier::where('status', 1)->get(),
            'products'=>Product::where('status', 1)->get(),
            'sizes'=>Size::where('status', 1)->get(),
            'colors'=>Color::where('status', 1)->get(),
        ]);
    }

    public function getAllData() {
        return response()->json([
            'suppliers'=>Supplier::where('status', 1)->get(),
            'products'=>Product::where('status', 1)->get(),
            'sizes'=>Size::where('status', 1)->get(),
            'colors'=>Color::where('status', 1)->get(),
        ]);
    }
    public function getProductData() {
        $this->id = $_GET['id'];
        $this->sizeData = ProductSize::where('product_id', $this->id)->get();
        foreach ( $this->sizeData as $key => $value){
            $this->sizeArray[$key]['id']   = $value->size_id;
            $this->sizeArray[$key]['name'] = Size::find($value->size_id)->name;
        }

        $this->colorData = ProductColor::where('product_id', $this->id)->get();
        foreach ( $this->colorData as $key => $value){
            $this->colorArray[$key]['id']   = $value->color_id;
            $this->colorArray[$key]['name'] = Color::find($value->color_id)->name;
        }

        return response()->json([
            'price'     => Product::find($this->id)->selling_price,
            'sizes'     => $this->sizeArray,
            'colors'    => $this->colorArray,
        ]);
    }


    protected function getStockDetailData($request)
    {
        $this->index = 0;
        foreach ($request->stock as $item){
            foreach ($item['size'] as $value){
                foreach ($item['color'] as $colorValue){
                    $this->resultArray[$this->index]['supplier']     = $item['supplier'];
                    $this->resultArray[$this->index]['product']      = $item['product'];
                    $this->resultArray[$this->index]['size']         = $value;
                    $this->resultArray[$this->index]['color']        = $colorValue;
                    $this->resultArray[$this->index]['unit_price']   = $item['unit_price'];
                    $this->resultArray[$this->index]['stock_amount'] = $item['stock_amount'];
                    $this->index++;
                }
            }
        }
        return $this->resultArray;
    }

    public function create(Request $request) {
        $this->stock = Stock::newStock($request);
        StockDetal::newStockDetail($this->getStockDetailData($request), $this->stock );
        return redirect()->back()->with('message','New inventory create successfully');
    }

    public function manage() {
        return view('stock.manage',['stocks'=>Stock::orderBy('id', 'DESC')->get(),]);
    }
    public function detail($id) {
        return view('stock.detail',[
            'stock'=>Stock::find($id),
        ]);
    }
    public function edit($id) {
        return view('stock.edit',[
            'stock'=>Stock::find($id),
            'suppliers'=>Supplier::where('status', 1)->get(),
            'products'=>Product::where('status', 1)->get(),
            'sizes'=>Size::where('status', 1)->get(),
            'colors'=>Color::where('status', 1)->get(),
        ]);
    }
    public function update(Request $request,$id) {
        $this->stock = Stock::find($id);
        $this->stock->stock_date        = $request->stock_date;
        $this->stock->stock_timestamp   = strtotime($request->stock_date);
        $this->stock->chalan_no         = $request->chalan_no;
        $this->stock->updated_by        = Auth::user()->id;
        $this->stock->save();

        $this->stockDetail = StockDetal::where('stock_id', $id)->get();
        foreach ($this->stockDetail as $item){
            $item->delete();
        }
        StockDetal::newStockDetail($this->getStockDetailData($request), $this->stock );
        return redirect('/manage-stock')->with('message','Inventory info update successfully');

    }
    public function delete($id) {

    }
}
