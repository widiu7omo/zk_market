<?php

namespace App\Http\Livewire\Customer;

use App\Models\Alamat;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $customer;
    public $unpaid;
    public $onProcess;
    public $onTheWay;

    public $nohp;
    public $name;
    public $email;


    public function mount()
    {
        $addresses = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
        if (session('customer_id')) {
            $this->customer = Customer::findOrFail(session('customer_id'));
            $this->nohp = $this->customer->no_hp;
            $this->name = $this->customer->nama;
            $this->email = Auth::user() ? Auth::user()->email : 'Anda belum terdaftar';
            $this->unpaid = Pesanan::where('status_bayar_id', StatusBayar::where('status_bayar', 'belum bayar')->first()->id)->whereIn('alamat_id', $addresses)->get();
            $this->onProcess = Pesanan::whereIn('alamat_id', $addresses)->whereStatusPesananId(StatusPesanan::whereStatusPesanan('pembuatan')->first()->id)->get();
            $this->onTheWay = Pesanan::whereIn('alamat_id', $addresses)->whereStatusPesananId(StatusPesanan::whereStatusPesanan('pengantaran')->first()->id)->get();
        } else {
            $this->customer = [];
            $this->unpaid = [];
            $this->onProcess = [];
            $this->onTheWay = [];
        }
    }

    public function render()
    {
        return view('livewire.customer.profile')->layout('layouts.customer')->slot('body');
    }
}
