<?php

namespace App\Http\Controllers;

use App\Notifications\SupplyCreated;
use App\Notifications\SupplyDeleted;
use App\Product;
use App\Review;
use App\Seller;
use App\Supply;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplyController extends Controller
{
    use Payable;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seller $seller)
    {
        return view('supply.create',[
            'user'=>$seller->user,
            'options'=>Product::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Seller $seller)
    {
        $attribute['user_id']=$seller->user->id;
        $attribute=request()->validate([
            'product_id'=>['exists:products,id',Rule::unique('supplies','product_id')->where('user_id',$seller->user->id)],
            'price'=>['required','numeric']
        ]);
        $supply=Supply::create([
            'user_id'=>$seller->user->id,
            'product_id'=>$attribute['product_id'],
            'price'=>$attribute['price'],
            'seller_id'=>$seller->id
        ]);

        $seller->user->notify(new SupplyCreated($supply));
        // dd($supply);
        return redirect(route('supply.show',[
            'supply'=>$supply
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        return view('supply.show',[
            'supply'=>$supply,
            'reviews'=>Review::where('supply_id',$supply->id)->paginate(4)
            ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        $supply->seller->notify(new SupplyDeleted($supply));
        $supply->delete();
        return redirect(route('home'));
    }
}
