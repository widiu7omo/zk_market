<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function show($id, Alamat $address)
    {
        return response()->json($address->exclude(['customer_id','updated_at','created_at'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'alamat_lengkap' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        $dataRequest = $request->all();
        if (session('customer_id')) {
            $dataRequest['customer_id'] = session('customer_id');
        } else {
            $customer = new Customer();
            $customer->nama = $request->pemesan;
            $customer->no_hp = $request->nohppemesan;
            $customer->save();
            $dataRequest['customer_id'] = $customer->id;
            session(['customer_id' => $customer->id]);
        }
        $status = Alamat::create($dataRequest) ? ['type' => 'success', 'message' => 'Alamat berhasil disimpan'] : ['type' => 'danger', 'message' => 'Alamat gagal disimpan'];
        return redirect()->route('address')->with('status', $status);
    }

}