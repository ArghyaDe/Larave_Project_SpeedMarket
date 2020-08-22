<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketplaceController extends Controller
{
    public function index()
    {
        return view('marketplace.index', [
            'products' => Product::latest()->paginate(8)
        ]);
    }

    public function search()
    {
        $search = request()->validate(['search' => 'required', 'max:255']);
        // dd($search);
        $search_ = $search['search'] . "%";

        return view('marketplace.index',[
            'products'=>Product::where('name','like',$search_)->orderBy('name')->paginate(8),
			'search'=>$search['search']
        ]);
    }
}

