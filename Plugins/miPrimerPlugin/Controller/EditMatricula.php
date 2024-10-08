<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditMatricula extends EditController
{
    public function getModelClassName(): string
    {
        return 'Matricula';
    }
}
