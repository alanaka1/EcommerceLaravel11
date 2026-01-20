<?php

namespace App\Http\Controllers\Backend;

use App\Models\{Category, Prodect};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Ecommerce.Backend.Prodect.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('Ecommerce.Backend.Prodect.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category_id = $request->category_id;
        $name = strip_tags($request->name);
        $old_price = strip_tags($request->old_price);
        $new_price = strip_tags($request->new_price);

        $img = $request->file('img');
        $gen = hexdec(uniqid());
        $ex = strtolower($img->getClientOriginalExtension());
        $name = $gen . '.' . $ex;
        $location = 'Products/';
        $source = $location.$name;
        $img->move($location,$name);

        $prodect = Prodect::create([
            'category_id' => $category_id,
            'name' => $name,
            'old_price' => $old_price,
            'new_price' => $new_price,
            'img' => $source,
        ]);

        return response()->json(['data' => $prodect]);
    }
  

    /**
     * Display the specified resource.
     */
    public function show(Prodect $prodect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodect $prodect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodect $prodect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodect $prodect)
    {
        //
    }
}
