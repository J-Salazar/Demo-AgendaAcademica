<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Orgnz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateEventController extends Controller
{
    //


    public function create_event(Request $request){
        $user = Auth::user();
        $id = Auth::user()->id;
        $mensaje_exitoso = '';

        $request->validate([
            'new_orgnz_email' => 'required|unique:orgnzs,email,'.$id,
            'new_orgnz_alias' => 'required|unique:orgnzs,alias,'.$id,
        ]);
//
//        User::where('id',$id)->update([
//                                        'name'      => $request->new_user_name,
//                                        'last_name' => $request->new_user_last_name,
//                                        'alias'     => $request->new_user_alias,
//                                        'email'     => $request->new_user_email
//        ]);



        $current_orgnz = Orgnz::Find($id);

        $current_orgnz->name      = $request->new_orgnz_name;
        $current_orgnz->last_name = $request->new_orgnz_last_name;
        $current_orgnz->alias     = $request->new_orgnz_alias;
        $current_orgnz->email     = $request->new_orgnz_email;
        if($current_orgnz->save()){
            $mensaje_exitoso = 'Datos actualizados correctamente';
        }



        return redirect('orgnz/profile')->with('mensaje_exitoso',$mensaje_exitoso);



    }
}
