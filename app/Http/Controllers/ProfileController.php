<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{

    public function perfil()
    {
        $user = User::find( session('user_id') );

        return view(
            'perfil.index',
            compact('user')
        );
    }


    public function editarView()
    {
        $user = User::find( session('user_id') );

        return view(
            'perfil.editar',
            compact('user')
        );
    }


    public function editar( Request $request )
    {
        $user = User::find( session('user_id') );

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ( $request->filled('password') )
        {
            $data['password'] = Hash::make( $request->password );
        }

        $user->update( $data );

        return redirect()->route( 'perfil' );
    }


    public function excluir()
    {
        $user = User::find( session('user_id') );

        $user->delete();

        session()->forget( 'user_id' );

        return redirect()->route( 'register' );
    }

}
