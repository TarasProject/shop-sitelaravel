<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function adminPanel() {

        return view('users/adminPanel');
    }

    public function submit(Request $request)
    {
        $stores = Store::get();

        $input = $request->input('input_store');

        foreach ($stores as $store){
            if ($input == $store['name_store']) {
                return view('users/adminPanel');
            }
        }

        $newStore = Store::create([
            'name_store' => $request ->input('input_store')
        ]);

        $newStore->save();

        return redirect()->route('products.index');
    }
}
