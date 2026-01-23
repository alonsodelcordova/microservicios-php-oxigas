<?php

class HomeController extends Controller
{
    public function __construct() {
        parent::__construct([
            'UsuariosModel'
        ]);
    }

    public function index()
    {
        if($this->user){
            echo "<script>
                    window.location.href = '/usuarios/listado';
                </script>";
            exit;
        }else{
            $this->view('home/index', [
                'title' => 'Bienvenido MVC PHP'
            ]);
        }
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $resultado = UsuariosModel::consultarUsuario($username);
            if($resultado!=null){
                if($password == $resultado['password']){
                    $_SESSION['email'] = $username;
                    echo "<script>
                    alert('Inicio de sesión exitoso');
                    window.location.href = '/usuarios/listado';
                    </script>";
                }else{
                    echo "<script>
                    alert('Contraseña incorrecta');
                    window.location.href = '/home';
                    </script>";
                }
            }else{
                echo "<script>
                alert('Usuario o contraseña incorrectos');
                window.location.href = '/home';
                </script>";
            }
        }
    }

    public function logout()
    {
        session_destroy();
        echo "<script>
        alert('Logout exitoso');
        window.location.href = '/home';
        </script>";
        exit;
    }

}
