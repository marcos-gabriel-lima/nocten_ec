<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Aqui você pode buscar os produtos do banco de dados, por exemplo
        // $products = Product::all();
        // return view('admin.products.index', compact('products'));

        // Certifique-se de que a view 'admin.products.index' existe
        return view('/resources/views/admin/products/index.blade.php');
    }
}
