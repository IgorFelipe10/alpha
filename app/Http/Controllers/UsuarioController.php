<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
   

    public function show(User $user){
        $usuario = User::where('USUARIO_ID',$user->USUARIO_ID)->get();
        return view ('Usuarios.show', ['user' =>$user]);
    }

    public function edit(User $user){
        return view ('Usuarios.edit',['user'=>$user]);
    }
    public function __construct()
    {
     $this->user = new User();
    }
    public function update(Request $request, string $id)
    {
        $atualizado = $this->user->where('USUARIO_ID',$id)->update($request->except(['_token', '_method']));

        if($atualizado){
            return redirect()->back()->with('message','Atualizado com sucesso!');
        }else{
            return redirect()->back()->with('message','Ocorreu um erro');
        }
    }

}
