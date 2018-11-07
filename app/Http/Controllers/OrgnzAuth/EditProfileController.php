<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Orgnz;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    //


    public function edit(Request $request){
//        $orgnz = Auth::user();
        $id = Auth::user()->id;
        $mensaje_exitoso = '';

        $request->validate([
            'new_orgnz_name'        => 'required',
            'new_orgnz_last_name'   => 'required',
            'new_orgnz_email'       => 'required|unique:orgnzs,email,'.$id,
            'new_orgnz_alias'       => 'required|unique:orgnzs,alias,'.$id,
            'new_orgnz_dir'       => 'required',
            'new_orgnz_phone'       => 'required',
            'new_orgnz_desc'       => 'required'
        ]);
//
//        User::where('id',$id)->update([
//                                        'name'      => $request->new_user_name,
//                                        'last_name' => $request->new_user_last_name,
//                                        'alias'     => $request->new_user_alias,
//                                        'email'     => $request->new_user_email
//        ]);

        $current = Orgnz::Find($id);

        $current->name      = $request->new_orgnz_name;
        $current->last_name = $request->new_orgnz_last_name;
        $current->alias     = $request->new_orgnz_alias;
        $current->email     = $request->new_orgnz_email;
        $current->dir     = $request->new_orgnz_dir;
        $current->phone     = $request->new_orgnz_phone;
        $current->desc     = $request->new_orgnz_desc;



        if($current->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }

        return redirect('orgnz/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
