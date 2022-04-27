<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $repository;

    public function __construct(Products $products)
    {
        $this->repository = $products;
    }
    public function index()
    {
        $products = $this->repository->all();
        return view('admin.pages.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        if(!$this->repository->create($request->all())) {
            return redirect()->back()->withInput();
        }

        return redirect()->route('products.index');
    }

    public function show($sku)
    {
        $product = $this->repository->where('sku', $sku)->first();
        if(!$product) {
            return redirect()->back();
        }

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    public function delete($id)
    {
        $product = $this->repository->find($id);
        if(!$product) {
            return redirect()->back();
        }

        $product->delete();
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $term = $request->term;
        $products = $this->repository->search($term);
        return view('admin.pages.products.index', ['products' => $products, 'term' => $term]);
    }


    public function edit($sku)
    {
        $product = $this->repository->where('sku', $sku)->first();
        if(!$product) {
            return redirect()->back();
        }

        return view('admin.pages.products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $sku)
    {
        // $sku = $request->sku;
        $product = $this->repository->where('sku', $sku)->first();
        if(!$product) {
            return redirect()->back();
        }
        $product->update($request->all());
        return redirect()->route('products.index');
    }
}
