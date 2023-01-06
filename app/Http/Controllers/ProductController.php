<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        try {
            
            $extphoto = $request->file('image')->getClientOriginalExtension();
            $img_name = "photo_".time().'.'.$extphoto;
            $request->file('image')->move('../uploads/product', $img_name);
            $img = 'uploads/products/'.$img_name;

            $product = Product::create([
                'name'          => $request->name,
                'price'         => $request->price,
                'image'         => $img,
            ]);

            if($request->category_source == 'new' && $request->category_name != null)
            {
                $category = Category::create([
                    'name'  => $request->category_name,
                ]);
                $product->categories()->attach($category->id);
            } else {
                $product->categories()->attach($request->category_id);
            }
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            //throw $th;
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->categories()->detach();
        if ($product->image) File::delete('../'.$product->image);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus.');
    }
}
