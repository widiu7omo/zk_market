<?php

namespace App\Http\Livewire\Customer;

use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Xendit\Balance;
use Xendit\EWallets;
use Xendit\Exceptions\ApiException;
use Xendit\Xendit;

class Payment extends Component
{

    public $payment;

    public function mount()
    {
        $this->payment = Pembayaran::findOrFail(session('payment'));
    }

    public function render()
    {
        return view('livewire.customer.payment')->layout('layouts.customer')->slot('body');
    }
}
