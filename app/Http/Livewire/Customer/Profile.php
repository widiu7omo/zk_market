<?php

namespace App\Http\Livewire\Customer;

use App\Models\Alamat;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use Livewire\Component;

class Profile extends Component
{
    public $customer;
    public $unpaid;
    public $onProcess;
    public $onTheWay;

    public function mount()
    {
        if (session('customer_id')) {
            $addresses = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
            $this->customer = Customer::findOrFail(session('customer_id'));
            $this->unpaid = Pesanan::where('status_bayar_id', StatusBayar::where('status_bayar', 'belum bayar')->first()->id)->whereIn('alamat_id', $addresses)->get();
            $this->onProcess = Pesanan::whereIn('alamat_id', $addresses)->whereStatusPesananId(StatusPesanan::whereStatusPesanan('pembuatan')->first()->id)->get();
            $this->onTheWay = Pesanan::whereIn('alamat_id', $addresses)->whereStatusPesananId(StatusPesanan::whereStatusPesanan('pengantaran')->first()->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.customer.profile')->layout('layouts.customer')->slot('body');
    }
}
