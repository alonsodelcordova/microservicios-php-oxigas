<?php
require_once __DIR__ . '/../core/Model.php';
class Controller
{
    protected $user = null;

    public function __construct($models = []) {
        
        foreach ($models as $model) {
            require_once __DIR__ . '/../models/' . $model . '.php';
        }

        if(isset($_SESSION['email'])){
            $this->user = $_SESSION['email'];
        }
    }

    public function validarSesion(){
        if(isset($_SESSION['email'])){
            return true;
        }else{
            echo "<script>
                    window.location.href = '/';
                </script>";
            exit;
        }
    }

    protected function view($view, $data = [])
    {
        extract($data);
        ob_start();
        require "../app/views/$view.php";
        $content = ob_get_clean();
        if (!isset($_SESSION['email'])) {
            require __DIR__ . '/../views/layouts/main.php';
        } else {
            require __DIR__ . '/../views/layouts/system_layout.php';
        }
    }
}