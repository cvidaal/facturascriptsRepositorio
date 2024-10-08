<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

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
    }

    protected function createMatricula($viewName = "ListMatricula")
    {
        $this->addView($viewName, 'Matricula', 'Matriculas', 'fas fa-file-invoice-dollar');
        $this->addOrderBy($viewName, ['cuota'], 'Cuota', 2);
        $this->addOrderBy($viewName, ['fechadealta'], 'Fecha de Alta', 2);
        $this->addOrderBy($viewName, ['fechadebaja'], 'Fecha de Baja', 2);
    }

    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
                // Se puede poner así porque ejecuta el mismo código y no utiliza break;
            case 'ListMatricula':
            case 'ListAlumno':
            case 'ListRecibo':
                $view->loadData();
                break;
        }
    }
}
