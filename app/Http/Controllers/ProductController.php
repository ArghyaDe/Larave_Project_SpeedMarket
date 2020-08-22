<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacturer;
use App\Notifications\ProductCreated;
use App\Notifications\ProductDeleted;
use App\Notifications\ProductEdited;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        // dd($product);
        return view('product.show', [
            'product' => $product
        ]);
    }

    public function create(Manufacturer $manufacturer)
    {
        // $this->authorize('edit_product', $manufacturer);
        // dd($manufacturer->user->is(current_user()));
        return view('product.create', [
            'categorys' => Category::all(),
            'manufacturer' => $manufacturer
        ]);
    }



    public function store(Manufacturer $manufacturer)
    {
        $product = new Product($this->ValidateProduct());
        $product['manufacturer_id'] = $manufacturer->id;

        if (request('photo')) {
            $product['photo'] = request()->photo->store('photos');
        }
        $product->save();
        $product->category()->attach(request('category'));

        current_user()->notify(new ProductCreated($product));

        return redirect(route('home'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product,
            'categorys' => Category::all()
        ]);
    }

    public function update(Product $product)
    {
        $update_product = $this->ValidateProduct();
        if (request('photo')) {
            $product['photo'] = request()->photo->store('photos');
        }
        $product->update($update_product);
        $product->category()->detach($product->category);
        $product->category()->attach(request('category'));
        current_user()->notify(new ProductEdited($product));
        return redirect(route('home'));
    }

    public function destroy(Product $product)
    {
        current_user()->notify(new ProductDeleted($product));
        $product->delete();
        return redirect(route('home'));
    }

    public function ValidateProduct()
    {
        return request()->validate([
            'name' => ['required', 'max:255'],
            'specification' => ['required'],
            'category' => ['required', 'exists:categories,id']
        ]);
    }
}
