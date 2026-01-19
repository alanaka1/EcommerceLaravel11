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
        //
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
