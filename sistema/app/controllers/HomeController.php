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
            $this->home();
        }else{
            $this->view('auth/login', [
                'title' => 'Bienvenido MVC PHP'
            ]);
        }
    }

    public function home()
    {
        $this->view('home/index');
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
                    $_SESSION['id'] = $resultado['id'];
                    echo "<script>
                    alert('Inicio de sesión exitoso');
                    window.location.href = '/home';
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

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->view('auth/register');
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if(UsuariosModel::crearUsuario($nombre, $password, $email)){
                echo "<script>
                alert('Usuario creado correctamente');
                window.location.href = '/';
                </script>";
            }else{
                echo "<script>
                alert('Error al crear el usuario');
                window.location.href = '/home/register';
                </script>";
            }
        }
    }

}
