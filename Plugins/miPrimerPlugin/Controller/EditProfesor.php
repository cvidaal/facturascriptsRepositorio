<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditProfesor extends EditController
{
    public function getModelClassName(): string
    {
        return 'Profesor';
    }
}
