<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage orders');
    }

    public function index()
    {
        return view('admin.orders.index');
    }
}
