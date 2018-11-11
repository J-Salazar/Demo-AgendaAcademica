<?php

namespace App\Http\Controllers\UserAuth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    //


    public function edit(Request $request){
        $user = Auth::user();
        $id = Auth::user()->id;
        $mensaje_exitoso = '';

        $request->validate([
            'new_user_email'         => 'required|unique:users,email,'.$id,
            'new_user_alias'         => 'required|unique:users,alias,'.$id,
            'new_user_name'          =>  'required',
            'new_user_last_name'     =>  'required',
            'new_user_eap'           =>  'required',
            'new_user_code'          =>  'required',
            'new_user_phone'         =>  'required',
        ]);

        $current = User::Find($id);

        $current->name      = $request->new_user_name;
        $current->last_name = $request->new_user_last_name;
        $current->alias     = $request->new_user_alias;
        $current->email     = $request->new_user_email;
        $current->eap       = $request->new_user_eap;
        $current->code      = $request->new_user_code;
        $current->phone     = $request->new_user_phone;
        $current->my_tag    = $request->new_user_my_tag;

        if($current->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }

        return redirect('user/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
