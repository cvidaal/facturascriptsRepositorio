<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\PanelController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class EditAlumno extends PanelController
{
    protected function createViews()
    {
        $this->addEditView('EditAlumno', 'Alumno', 'Alumnos', 'fas fa-user-friends');
        $this->addListView('ListRecibo', 'Recibo', 'Recibos', 'fas fa-wallet');
        $this->addListView('ListMatricula', 'Matricula', 'Matriculas', 'fas fa-file-invoice-dollar');
        $this->addListView('ListEvaluacion', 'Evaluacion', 'Evaluaciones', 'fas fa-graduation-cap');
    }

    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
                // Cargar la informacion del alumno
            case 'EditAlumno':
                $code = $this->request->get('code'); // Carga el código del id del alumno seleccionado
                $view->loadData($code);
                break;

                // Para filtrar y cargar solo los recibos del alumno seleccionado
            case 'ListRecibo':
                $code = $this->request->get('code');
                $where = [new DataBaseWhere('idalumno', $code)];
                $view->loadData('', $where);
                break;

            case 'ListMatricula':
                $code1 = $this->request->get('code');
                $where = [new DataBaseWhere('idalumno', $code1)];
                $view->loadData('', $where);
                break;

            case 'ListEvaluacion':
                $code2 = $this->request->get('code');
                $where = [new DataBaseWhere('idalumno', $code2)];
                $view->loadData('', $where);
                break;
        }
    }

    public function getModelClassName(): string
    {
        return 'Alumno';
    }
}
