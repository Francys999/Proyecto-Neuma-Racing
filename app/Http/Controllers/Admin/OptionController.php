<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage options');
    }

    public function index()
    {
        return view("admin.options.index");
    }
}
