<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Prompts\Clear;
use App\Models\Cadastro;

class ApiController extends Controller
{
    public function status()
    {
        return response()->json(
            [
                'status' => 'ok',
                'message' => "API is running OK!"
            ],
            200
        );
    }


    public function listar()
    {
        $cadastros = Cadastro::paginate(10);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucess',
                'data' => $cadastros
            ],
            200
        );
    }

    public function buscaCadastro($id)
    {
        //busca o cadastro por ID
        $cadastros = Cadastro::find($id);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
                'data' => $cadastros
            ],
            200
        );
    }

    public function buscaCadastroPost(Request $request)
    {

        //verificar se foi enviado o ID do Cadastro para busca
        if ($request->id) {

            $cadastros = Cadastro::find($request->id);

            return response()->json(
                [
                    'status' => 'ok',
                    'message' => 'success',
                    'data' => $cadastros
                ],
                200
            );
        } else {

            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'ID do cadastro é obrigatório.',
                ],
                400
            );
        }
    }


    public function addCadastro(Request $request)
    {
        //verifica e recebe dados do Cadastro
        if (($request->descricao) && ($request->valor)) {
            $cadastros = new Cadastro();
            $cadastros->descricao = $request->descricao;
            $cadastros->valor = $request->valor;
            $cadastros->url_imagem = $request->url_imagem;
            $cadastros->save();
            return response()->json(
                [
                    'status' => 'ok',
                    'message' => 'success',
                    'data' => $cadastros
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Descricao e valor do cadastro são obrigatórios.',
                ],
                400
            );
        }
    }


    public function updCadastro(Request $request)
    {
        if (($request->id) && ($request->descricao) && ($request->valor)) {
            $cadastros = Cadastro::find($request->id);
            $cadastros->descricao = $request->descricao;
            $cadastros->valor = $request->valor;
            $cadastros->save();
            return response()->json(
                [
                    'status' => 'ok',
                    'message' => 'success',
                    'data' => $cadastros
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'ID, descricao e valor do cadastro são obrigatórios.',
                ],
                400
            );
        }
    }

    public function delCadastro($id)
    {

        $cadastros = Cadastro::find($id);
        $cadastros->delete();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
            ],
            200
        );
    }
}
