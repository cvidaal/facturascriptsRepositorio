<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Model;

use FacturaScripts\Core\Model\Base\ModelClass;
use FacturaScripts\Core\Model\Base\ModelTrait;

class Profesor extends ModelClass
{
    use ModelTrait;

    public $idprofesor;
    public $nombre;
    public $email;

    public static function primaryColumn(): string
    {
        return 'idprofesor';
    }

    public static function tableName(): string
    {
        return 'profesores';
    }
}
