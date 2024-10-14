<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditEvaluacion extends EditController
{
    public function getModelClassName(): string
    {
        return 'Evaluacion';
    }
}
