<?php

namespace App\Http\Controllers;

use App\Models\Product;


use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductsController extends Controller
{
    public function index() {
        $products = Product::with('store')->get();
        return view('products/index', compact('products'));
    }

    public function edit($id) {
        $products=Product::find($id);
        $typesObject = Product::$typeObject;
        $firmsObject = Product::$firmObject;
        $typesCurrency = Product::$typeCurrency;
        $newStores = Store::get();
        return view('products/edit',compact('products','typesObject','firmsObject','typesCurrency','newStores'));
    }


    public function add() {
        $users = User::get();
        $newStores = Store::get();
        $products=Product::get();
        return view('products/add', compact('users','newStores','products'));
    }

    public function delete($id, Request $request){
        $products = Product::find($id);
        $products->delete();

        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Оголошення успішно видалено'
        ]));


        return redirect('/products');
    }

    public function makeValidator(array $data){
        return Validator::make($data,[
            'store_id'=> 'required|string|max:255',
            'type_object'=> 'required|string|max:255',
            'firm_object'=> 'required|string|max:255',
            'model_object'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'type_currency'=> 'required|string|max:255',
            'user_id'=> 'required|string|max:255',
            'phone'=> 'required|string|max:255',
        ]);
    }

    public function updateProduct($id, Request $request)
    {

        $product = Product::find($id);
        $product -> update([

            'type_object' => $request->input('type_object'),
            'firm_object' => $request->input('firm_object'),
            'model_object' => $request->input('model_object'),
            'price' => $request->input('price'),
            'type_currency' => $request->input('type_currency'),
            'condition' => $request->input('condition'),
            'phone' => $request->input('phone'),
            'more_information' => $request->input('more_information'),
            'remember' => $request->input('remember'),

        ]);
//
        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Оголошення успішно відредаговано'
        ]));


        return redirect()->route('products.index');
    }

    public function submit(Request $request)
    {

        $this->makeValidator($request->all())->validate();

        Product::create([
            'type_object' => $request->input('type_object'),
            'firm_object' => $request->input('firm_object'),
            'model_object' => $request->input('model_object'),
            'price' => $request->input('price'),
            'type_currency' => $request->input('type_currency'),
            'condition' => $request->input('condition'),
            'phone' => $request->input('phone'),
            'more_information' => $request->input('more_information'),
            'remember' => $request->input('remember'),
            'user_id' => $request->input('user_id'),
            'store_id' => $request->input('store_id'),
        ]);
//dd($request);
        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Оголошення успішно створено'
        ]));


        return redirect()->route('products.index');
    }

    public  function addImage($id){
        return view('products/addImageProduct');
    }
    public function addImageProduct($id, Request $request){
        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $request->file->storeAs('public/upload', $filename);

            $file = Product::find($id);
            $file->file_name = $filename;
            $file->file_size = $filesize;
            $file->save();

            \Session::flash('flash_message', json_encode([
                'class' =>  'success',
                'message'=>'Зображення успішно додано'
            ]));

            return redirect()->route('products.index');
        }
        return redirect()->route('products.index');
    }



}
