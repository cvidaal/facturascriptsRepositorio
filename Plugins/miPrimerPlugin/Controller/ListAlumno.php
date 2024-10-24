<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Dinamic\Model\Matricula;
use FacturaScripts\Dinamic\Model\Recibo;

class ListAlumno extends ListController
{
    public function getPageData(): array
    {
        $page = parent::getPageData();
        $page['title'] = 'Alumnos';
        $page['menu'] = 'Academia';
        $page['icon'] = 'fas fa-user-friends';
        return $page;
    }

    protected function createViews()
    {
        $this->createAlumno();
        $this->createRecibo();
        $this->createMatricula();
        $this->createEvaluacion();
    }


    protected function createAlumno($viewName = 'ListAlumno')
    {
        $this->addView($viewName, 'Alumno', 'Alumnos', 'fas fa-user-friends');
        $this->addSearchFields($viewName, ['nombre', 'dni', 'telefono', 'email']);
        $this->addOrderBy($viewName, ['fechanacimiento'], 'Fecha de nacimiento', 2);
        $this->addOrderBy($viewName, ['nombre'], 'Nombre');
        $this->addFilterPeriod($viewName, 'date', 'period', 'fechanacimiento');
    }

    protected function createRecibo($viewName = 'ListRecibo')
    {
        $this->addView($viewName, 'Recibo', 'Recibos', 'fas fa-wallet');
        //$this->addSearchFields('ListRecibo', ['nombre', 'dni', 'telefono','email']);
        $this->addOrderBy($viewName, ['fecha'], 'Fecha', 2);
        //$this->addOrderBy($viewName, ['nombre'], 'Nombre');
        $this->addFilterPeriod($viewName, 'date', 'period', 'fecha');
        $this->addButton($viewName, [
            'action' => 'generar-recibos',
            'icon' => 'fas fa-euro',
            'color' => 'success',
            'label' => 'Generar Recibos',
            'type' => 'action',
        ]);
    }

    protected function createMatricula($viewName = "ListMatricula")
    {
        $this->addView($viewName, 'Matricula', 'Matriculas', 'fas fa-file-invoice-dollar');
        $this->addFilterAutocomplete($viewName, 'idalumno', 'Alumno', 'idalumno', 'alumnos', 'idAlumno', 'nombre');
        $this->addFilterAutocomplete($viewName, 'idAsignatura', 'Asignatura', 'idasignatura', 'asignaturas', 'idasignatura', 'nombre');
        $this->addOrderBy($viewName, ['cuota'], 'Cuota', 2);
        $this->addOrderBy($viewName, ['fechadealta'], 'Fecha de Alta', 2);
        $this->addOrderBy($viewName, ['fechadebaja'], 'Fecha de Baja', 2);
    }

    protected function createEvaluacion($viewName = "ListEvaluacion")
    {
        $this->addView($viewName, 'Evaluacion', 'Evaluaciones', 'fas fa-graduation-cap');
    }

    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
                // Se puede poner así porque ejecuta el mismo código y no utiliza break;
            case 'ListMatricula':
            case 'ListAlumno':
            case 'ListRecibo':
            case 'ListEvaluacion':
                $view->loadData();
                break;
        }
    }

    // Este método ejecuta una acción dependiendo del (nombre del action) para ejecutar una función.
    protected function execPreviousAction($action)
    {
        switch ($action) {
            case 'generar-recibos':
                $this->actionGenerarRecibos();
                break;
        }
    }

    protected function actionGenerarRecibos()
    {
        //TODO: Programar funcionalidad para el botón de generar recibos

        $matriculas = new Matricula();
        $matriculas = $matriculas->all();
        $numRecibos = 0;
        foreach ($matriculas as $matricula) {
            if ($matricula->fechadebaja == null) {
                $recibo = new Recibo();
                $recibo->idalumno = $matricula->idalumno;
                $recibo->fecha = Date('Y-m-d');
                $recibo->importe = $matricula->cuota;
                $recibo->tipo = 'Cuota';
                if ($recibo->save()) {
                    $numRecibos++;
                }
            }
        }
    }
}
