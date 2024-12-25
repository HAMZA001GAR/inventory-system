<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $categories = Product::selectRaw('category_id, COUNT(*) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        $categoryLabels = $categories->pluck('category.name'); // Noms des catégories
        $categoryValues = $categories->pluck('total'); // Nombre de produits

        $lowStockProducts = Product::where('quantity', '<', 10)->get();

        return view('reports.index', compact('categoryLabels', 'categoryValues', 'lowStockProducts'));
    }
}
