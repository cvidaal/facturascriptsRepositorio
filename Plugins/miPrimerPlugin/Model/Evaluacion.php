<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;

class Evaluacion extends ModelClass
{
    use ModelTrait;

    public $idevaluacion;
    public $idalumno;
    public $idasignatura;
    public $idprofesor;
    public $fecha;
    public $nota;
    public $comportamiento;
    public $observaciones;

    public static function primaryColumn(): string
    {
        return 'idevaluacion';
    }

    public static function tableName(): string
    {
        return 'evaluaciones';
    }

    public function url(string $type = 'auto', string $list = 'ListAlumno?activetab=List'): string
    {
        return parent::url($type, $list);
    }
}
