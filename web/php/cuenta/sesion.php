<?php
include "bd.php";
class Sesion extends BD
{
    const SESION_INIT = TRUE;
    const SESION_NO_INIT = FALSE;

    //Operadores de resolución de ambito
    //self --> Hace referencia a la clase actual y se usa cuando accedemos a atributos y métodos const o static desde dentro de la clase
    //this --> Hace referencia al objeto actual y lo usamos en atributos o métodos no const y static
    //parent --> Temas de herencia, y lo usamos para acceder a atributos o static de una clase padre

    //Estado de la sesión
    private $edoSesion = self::SESION_NO_INIT;

    //Instancia de la clase
    private static $instancia;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la instancia de la sesión
     * Si la sesión no existe se inicializa
     */
    public static function getInstancia()
    {
        //isset -> Determina si una variable está definida y no es NULL
        if (!isset(self::$instancia)) {
            self::$instancia = new self;
        }
        self::$instancia->iniSesion();
        return self::$instancia;
    }

    /**
     * Inicializa o reinicializa la sesión
     * @retur bool 
     * true -> si la sesión se inicializa
     * false -> si no 
     */
    public function iniSesion()
    {
        //session_start — Iniciar una nueva sesión o reanudar la existente
        if ($this->edoSesion == self::SESION_NO_INIT) {
            $this->edoSesion = session_start();
        }
        return $this->edoSesion;
    }

    /**
     * Destruir la sesión
     */
    public function destruirSesion()
    {
        if ($this->edoSesion == self::SESION_INIT) {
            $this->edoSesion = !session_destroy();
            unset($_SESSION);
            return !$this->edoSesion;
        }
        return false;
    }

    /**
     * Almacena datos en la sesión
     * $instancia->attr = 'value';
     */
    public function __set($name, $value)
    {
        //$_SESSION --> variables de sesión

        $_SESSION[$name] = $value;
    }

    /**
     * Permite obtener datos de la sesión
     * echo $instancia->attr;
     */
    public function __get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    /**
     * Validar una variable de sesión
     */
    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }


    /**
     * Eliminamos una variable de sesión
     */
    public function __unset($name)
    {
        //unset — Destruye una variable especificada
        unset($_SESSION[$name]);
    }
}
