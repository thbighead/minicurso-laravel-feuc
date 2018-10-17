<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/index', ['stocks' => Stock::with('products')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create', ['stocks' => Stock::all(['id', 'name'])->pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = Product::create($request->only(['name', 'description', 'price']));
        $newProduct->stocks()->attach($request->get('stocks'));

        return view('products/index', [
            'stocks' => Stock::with('products')->get(),
            'created' => (bool) $newProduct
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
        return view('products/show', [
            'product' => Product::with('stocks')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products/edit', [
            'stocks' => Stock::all(['id', 'name'])->pluck('name', 'id'),
            'product' => Product::with('stocks')->findOrFail($id)
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
        $succeeded = true;
        $product = Product::findOrFail($id);
        if($product) {
            $succeeded = $product->update($request->except('stocks'))
                && $product->stocks()->sync($request->get('stocks'));
        } else {
            $succeeded = false;
        }

        return view('products/index', [
            'stocks' => Stock::with('products')->get(),
            'updated' => $succeeded
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
        Product::destroy($id);

        return redirect()->back();
    }
}
