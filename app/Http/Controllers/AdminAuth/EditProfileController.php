<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
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
            'new_admin_email' => 'required|unique:admins,email,'.$id,
            'new_admin_alias' => 'required|unique:admins,alias,'.$id,
        ]);
//
//        User::where('id',$id)->update([
//                                        'name'      => $request->new_user_name,
//                                        'last_name' => $request->new_user_last_name,
//                                        'alias'     => $request->new_user_alias,
//                                        'email'     => $request->new_user_email
//        ]);

        $current = Admin::Find($id);

        $current->name      = $request->new_admin_name;
        $current->last_name = $request->new_admin_last_name;
        $current->alias     = $request->new_admin_alias;
        $current->email     = $request->new_admin_email;
        if($current->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }

        return redirect('admin/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
