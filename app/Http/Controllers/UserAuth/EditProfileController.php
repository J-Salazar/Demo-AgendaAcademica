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
            'new_user_email' => 'required|unique:users,email,'.$id,
            'new_user_alias' => 'required|unique:users,alias,'.$id,
        ]);
//
//        User::where('id',$id)->update([
//                                        'name'      => $request->new_user_name,
//                                        'last_name' => $request->new_user_last_name,
//                                        'alias'     => $request->new_user_alias,
//                                        'email'     => $request->new_user_email
//        ]);

        $current = User::Find($id);

        $current->name      = $request->new_user_name;
        $current->last_name = $request->new_user_last_name;
        $current->alias     = $request->new_user_alias;
        $current->email     = $request->new_user_email;
        if($current->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }

        return redirect('user/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
