<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditAsignatura extends EditController
{
    public function getModelClassName(): string
    {
        return 'Asignatura';
    }
}
