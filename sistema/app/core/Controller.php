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

    public function getDataJSON(){
        // Leer JSON del body
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'data' => 'JSON inválido'
            ]);
            exit;
        }else{
            return $input;
        }
    }
}