<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()
            ->when(request('search'),function($query){
                $query
                    ->where('name', 'LIKE', '%'.request('search').'%')
                    ->orWhere('code', 'LIKE', '%'.request('search').'%');
            })
            ->paginate(15);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return redirect(route('product.index'))->with('message', 'Dodano wpis poprawnie');
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
        $product = Product::find($id);

        return view('products.edit', compact('product'));
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
        $product = Product::find($id);

        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return redirect(route('product.index'))->with('message', 'Produkt edytowanie poprawnie');
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
    }

    public function disable($id){

        $product = Product::find($id);

        $product->disable = true;

    }
}
