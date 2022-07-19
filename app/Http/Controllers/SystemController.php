<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use App\Models\Client;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    public function index()
    {
        $users = User::all();
        $providers = Provider::all();
        $products = Product::all();
        $clients = Client::all();
        $stores = Store::all();
        $roles = Role::all();

        return view('index', compact('users','providers','products','clients', 'stores', 'users', 'roles'));
    }
}
