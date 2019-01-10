<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Orgnz;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    //Metodo encargado de editar los datos del organizador

    public function edit(Request $request){
        $id = Auth::user()->id;
        $mensaje_exitoso = '';
//      Validacion de datos
        $request->validate([
            'new_orgnz_name'        => 'required',
            'new_orgnz_last_name'   => 'required',
            'new_orgnz_email'       => 'required|unique:orgnzs,email,'.$id,//el nuevo email no debe existir en la tabla
            'new_orgnz_alias'       => 'required|unique:orgnzs,alias,'.$id,//el nuevo alias o nickname no debe estar registrado
            'new_orgnz_dir'         => 'required',
            'new_orgnz_phone'       => 'required',
            'new_orgnz_desc'        => 'required'
        ]);

        $current = Orgnz::Find($id);

        $current->name      = $request->new_orgnz_name;
        $current->last_name = $request->new_orgnz_last_name;
        $current->alias     = $request->new_orgnz_alias;
        $current->email     = $request->new_orgnz_email;
        $current->dir       = $request->new_orgnz_dir;
        $current->phone     = $request->new_orgnz_phone;
        $current->desc      = $request->new_orgnz_desc;



        if($current->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }

        return redirect('orgnz/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
