<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }

    // public function edit(Product $product)
    // {
    //     $categories = Category::all();
    //     return view('products.edit', compact('product', 'categories'));
    // }

    public function edit($id)
{
    $product = Product::findOrFail($id); // Trouve le produit ou retourne une erreur 404
    $categories = Category::all(); // Charge toutes les catégories pour l'édition
    return view('products.edit', compact('product', 'categories'));
}


    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'quantity' => 'required|integer|min:0',
    //         'price' => 'required|numeric|min:0',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     $product->update($request->all());
    //     return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès');
    // }

public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);
    
        // Trouver le produit avec l'ID donné
        $product = Product::findOrFail($id);
        
        // Mettre à jour les informations du produit
        $product->update($validated);
        
        // Rediriger avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès');
    }
}
