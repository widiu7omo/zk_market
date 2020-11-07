<?php

namespace App\Http\Livewire\Customer;

use App\Models\Alamat;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Livewire\Component;

class ListOrder extends Component
{
    public $orders;

    public function mount($order = null)
    {
        switch ($order) {
            case 'process':
                $alamatIds = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
                $pesananIds = Pesanan::whereIn('alamat_id', $alamatIds)->where('status_pesanan_id', 2)->pluck('id');
                $this->orders = Pembayaran::whereIn('pesanan_id', $pesananIds)->orderBy('id', 'DESC')->get();
                break;
            case 'pengiriman':
                $alamatIds = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
                $pesananIds = Pesanan::whereIn('alamat_id', $alamatIds)->where('status_pesanan_id', 3)->pluck('id');
                $this->orders = Pembayaran::whereIn('pesanan_id', $pesananIds)->orderBy('id', 'DESC')->get();
                break;
            case 'unpaid':
                $alamatIds = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
                $pesananIds = Pesanan::whereIn('alamat_id', $alamatIds)->where('status_pesanan_id', 1)->pluck('id');
                $this->orders = Pembayaran::whereIn('pesanan_id', $pesananIds)->orderBy('id', 'DESC')->get();
                break;
            default:
                $alamatIds = Alamat::whereCustomerId(session('customer_id'))->pluck('id');
                $pesananIds = Pesanan::whereIn('alamat_id', $alamatIds)->pluck('id');
                $this->orders = Pembayaran::whereIn('pesanan_id', $pesananIds)->orderBy('id', 'DESC')->get();
        }

    }

    public function render()
    {
        return view('livewire.customer.list-order')->layout('layouts.customer')->slot('body');
    }
}
