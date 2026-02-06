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
        $prudects = Prodect::orderBy('id', 'ASC')->get();
        return view('Ecommerce.Backend.Prodect.index', compact('prudects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
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
        $name2 = $gen . '.' . $ex;
        $location = 'Products/';
        $source = $location.$name2;
        $img->move($location,$name2);

        $prodect = Prodect::create([
            'category_id'   => $category_id,
            'name'          => $name,
            'old_price'     => $old_price,
            'new_price'     => $new_price,
            'img'           => $source,
        ]);
        
        // الكود الأحترافي
        // $img = $request->file('img');
        // $name2 = uniqid() . '.' . $img->getClientOriginalExtension();
        // $location = public_path('Products');
        // $img->move($location, $name2);

        // $prodect = Prodect::create([
        //     'category_id' => $request->category_id,
        //     'name'        => $request->name,
        //     'old_price'   => $request->old_price,
        //     'new_price'   => $request->new_price,
        //     'img'         => 'Products/' . $name2,
        // ]);


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
    public function edit($prodect)
    {
        $prodect = Prodect::findOrFail($prodect);
        // $categories = Category::where('id', '=', $prodect->category)->get();
        $categories = Category::all();
        return view('Ecommerce.Backend.Prodect.form', compact('categories', 'prodect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    $prodect = Prodect::findOrFail($request->id);

    if ($request->hasFile('img')) {

        if ($prodect->img && file_exists($prodect->img)) {
            unlink($prodect->img);
        }

        $img = $request->file('img');
        $gen = hexdec(uniqid());
        $ex = strtolower($img->getClientOriginalExtension());
        $name2 = $gen . '.' . $ex;
        $location = 'Products/';
        $source = $location . $name2;
        $img->move($location, $name2);

        $prodect->img = $source;
    }

    $prodect->category_id = $request->category_id;
    $prodect->name        = strip_tags($request->name);
    $prodect->old_price   = strip_tags($request->old_price);
    $prodect->new_price   = strip_tags($request->new_price);

    $prodect->save();

    return response()->json(['data' => 1]);

        // return response()->json(['data' => $request->all()]);
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
