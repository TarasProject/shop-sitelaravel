<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index () {
        $users = User::get();
//        $users = User::first();
//        dd($users);
        return view('users/index',compact( 'users'));
    }

    public function edit ($id) {
        $user=User::find($id);
        return view('users/edit', compact('user'));


    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Користувача успішно видалено'
        ]));

        return redirect()->route('users.index');
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        $user -> update([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Користувача успішно відредаговано'
        ]));
        return redirect()->route('users.index');
    }

    public  function addImage($id){
        return view('users/addImageUser');
    }
    public function addImageUser($id, Request $request){

        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $request->file->storeAs('public/upload', $filename);

            $file = User::find($id);
            $file->file_name = $filename;
            $file->file_size = $filesize;
            $file->save();

            \Session::flash('flash_message', json_encode([
                'class' =>  'success',
                'message'=>'Зображення успішно додано'
            ]));

            return redirect()->route('users.index');
        }
        return redirect()->route('users.index');
    }

}
