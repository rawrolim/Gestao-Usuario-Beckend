<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function showAll(){
        return usuario::all();
    }

    public function show($id){
        return usuario::findOrFail($id);
    }

    public function store(Request $request){
        $usuario = usuario::where('login','=',$request['login'])->get();
        if(sizeof($usuario)>0){
            return ['erro'=>'Login já existente, selecione outro.'];
        }
        if($request['senha'] != $request['senha_repete']){
            return ['erro'=>'As senhas devem ser iguais.'];
        }
        if($request['senha'] == ''){
            return ['erro'=>'Insira uma senha.'];
        }
        if($request['nome'] == ''){
            return ['erro'=>'Insira um nome.'];
        }
        if($request['login'] == ''){
            return ['erro'=>'Insira um login.'];
        }
        $request['senha'] = md5($request['senha']);
        $usuario = usuario::create($request->all());
        $usuario['erro']='';
        return $usuario;
    }

    public function update(Request $request, $id){
        $usuario = usuario::findOrFail($id);
        if($usuario['senha'] != $request['senha']){
            $request['senha'] = md5($request['senha']);
        }
        $usuario->update($request->all());
        $usuario['erro'] = '';
        return $usuario;
    }

    public function destroy($id){
        $usuario = usuario::findOrFail($id);
        return $usuario->delete();
    }

    public function login(Request $request){
        return usuario::where('senha','=',md5($request['senha']))
            ->where('login','=',$request['login'])
            ->get();
    }
}
