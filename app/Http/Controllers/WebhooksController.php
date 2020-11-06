<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    public function ovo()
    {
        return response()->json(['status' => 'success']);
    }

    public function linkaja()
    {
        return response()->json(['status' => 'success']);

    }

    public function qris()
    {
        return response()->json(['status' => 'success']);

    }
}
