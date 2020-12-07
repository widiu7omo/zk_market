<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function savePemesan(Request $request)
    {
        $nama = $request->pemesan;
        $noHp = $request->nohp;
        if (Auth::user()) {
            Customer::whereUserId(Auth::user()->id)->update(['nama' => $nama, 'no_hp' => $noHp]);
        } else {
            $customers = Customer::whereNoHp($noHp)->get();
            //jika ada customer dengan nomor hp tertera
            if ($customers && count($customers) != 0) {
                $customerFilterName = Customer::where(['nama'=>$nama,'no_hp'=>$noHp])->get();
                // jika ada user yang mempunyai nama dan no hp
                if ($customerFilterName && count($customerFilterName) > 0) {
                    //set session
                    session(['customer_id' => $customerFilterName[0]->id]);
                } else {
                    $newCustomer = Customer::create(['nama' => $nama, 'no_hp' => $noHp]);
                    session(['customer_id' => $newCustomer->id]);
                }
            } //jika tidak ada customer dengan nomor hp tersebut, buat customer baru
            else {
                $newCustomer = Customer::create(['nama' => $nama, 'no_hp' => $noHp]);
                session(['customer_id' => $newCustomer->id]);
            }
        }
    }

}
