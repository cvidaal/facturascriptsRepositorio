<?php
namespace FacturaScripts\Plugins\miPrimerPlugin\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;

class Alumno extends ModelClass
{
    use ModelTrait;

    public $idalumno;
    public $dni;
    public $email;
    public $fechanacimiento;
    public $nombre;
    public $telefono;

    public static function primaryColumn(): string
    {
        return 'idalumno';
    }

    public static function tableName(): string
    {
        return 'alumnos';
    }
}