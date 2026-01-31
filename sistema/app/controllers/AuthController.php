<?php

class AuthController extends Controller {

    public function __construct() {
        parent::__construct([
            'UsuarioModel'
        ]);
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $_POST['username'];
            $password = $_POST['password'];
            
            if(UsuarioModel::validarUsuario($usuario, $password)){
                $usuario_db = UsuarioModel::consultarUsuario($usuario);
                echo json_encode([
                    'status' => 'success',
                    'data' => $usuario_db['email']
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'data' => 'Usuario o contraseña incorrectos'
                ]);
            }
        }
    }
}