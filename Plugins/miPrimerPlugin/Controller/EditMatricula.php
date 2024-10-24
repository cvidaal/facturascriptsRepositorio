<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Core\Tools;
use FacturaScripts\Dinamic\Model\Asignatura;

class EditMatricula extends EditController
{
    public function getModelClassName(): string
    {
        return 'Matricula';
    }


    // Este método se ejecuta cuando insertamos una nueva matrícula 
    //TODO: Método para eliminar una plaza de Asignatura.
    protected function insertAction()
    {
        if (parent::insertAction()) { // parent:: Se ejecuta el método en la clase padre.
            // Si es true queremos que devuelva una plaza.
            $asignatura = new Asignatura(); // Creación de objeto asignatura
            $idasignatura = $this->request->get('idasignatura');
            $asignatura = $asignatura->get($idasignatura); // Sirve para obtener el idasignatura 
            if ($asignatura->plazas == 0) {
                Tools::log()->error('No se ha realizado la matricula ' . $asignatura->nombre . ' porque no hay plazas disponibles');
                return false;
            }
            $asignatura->plazas--; // Restamos uno a plazas
            $asignatura->save(); // Guardamos la información
        }
    }
}
