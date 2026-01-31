
<?php

class ConfigController extends Controller
{
    public function __construct()
    {
        parent::__construct([
        ]);
        $this->validarSesion();
    }

    public function index()
    {
        $this -> view('config/index');
    }
}
