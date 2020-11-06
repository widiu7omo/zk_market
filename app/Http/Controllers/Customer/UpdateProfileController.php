<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function setProfile(Request $request, Customer $customer, User $user)
    {
        if (isset($request->nohp)) {
            $customer->whereId(session('customer_id'))->update(['no_hp' => $request->nohp]);
        }
        if (isset($request->name)) {
            $customer->whereId(session('customer_id'))->update(['nama' => $request->name]);
            if (Auth::user()) {
                $user->whereId(Auth::user()->id)->update(['name' => $request->name]);
            }
        }
        if (isset($request->email)) {
            if (Auth::user()) {
                $user->whereId(Auth::user()->id)->update('email', $request->email);
            }
        }
        return redirect('profile');
    }
}
