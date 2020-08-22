<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Manufacturer;
use App\Notifications\AddToCart;
use App\Notifications\ProfileUpdated;
use App\Notifications\RemoveFromCart;
use App\Seller;
use App\Supply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Whoops\Run;

class ProfileController extends Controller
{
    use Cartable;

    public function show(User $user, $tab = null)
    {
        return view('profile.show', [
            'user' => $user,
            'tab' => $tab
        ]);
    }



    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }



    public function update(User $user)
    {
        $user_attribute = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'phone_no' => ['nullable', 'numeric', 'max:99999999999', Rule::unique('users')->ignore($user)],
            'address' => ['nullable', 'string', 'max:255'],
            'is_seller' => ['boolean'],
            'is_manufacturer' => ['boolean']
        ]);

        if ($user_attribute['is_seller']) {
            $seller_attribute = request()->validate([
                'seller_company_name' => ['required', 'max:255'],
                'seller_company_address' => ['required', 'max:255',Rule::unique('sellers','company_address')->where('company_name',request('seller_company_name'))->ignore($user->seller->first())]
            ]);
        }

        if ($user_attribute['is_manufacturer']) {
            $manufacturer_attribute = request()->validate([

                'manufacturer_company_name' => ['required', 'max:255'],
                'manufacturer_company_address' => ['required', 'max:255',Rule::unique('manufacturers','company_address')->where('company_name',request('manufacturer_company_name'))->ignore($user->manufacturer->first())]
            ]);
        }

        if (request('avatar')) {

            $user_attribute['avatar'] = request()->avatar->store('avatars');
        }



        $user->update($user_attribute);

        if ($user_attribute['is_seller']) {
            if ($user->seller->first()) {
                $user->seller()->update([
                    'company_name' => $seller_attribute['seller_company_name'],
                    'company_address' => $seller_attribute['seller_company_address']
                ]);
            } else {
                $user->seller()->create([
                    'company_name' => $seller_attribute['seller_company_name'],
                    'company_address' => $seller_attribute['seller_company_address']
                ]);
            }
        } else {
            $user->seller()->delete();
        }


        if ($user_attribute['is_manufacturer']) {
            if ($user->manufacturer->first()) {
                $user->manufacturer()->update([
                    'company_name' => $manufacturer_attribute['manufacturer_company_name'],
                    'company_address' => $manufacturer_attribute['manufacturer_company_address']
                ]);
            } else {
                $user->manufacturer()->create([
                    'company_name' => $manufacturer_attribute['manufacturer_company_name'],
                    'company_address' => $manufacturer_attribute['manufacturer_company_address']
                ]);
            }
        } else {
            $user->manufacturer()->delete();
        }

        $user->notify(new ProfileUpdated($user));

        return redirect($user->path());
        // dd($attribute);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('login');
    }


}
