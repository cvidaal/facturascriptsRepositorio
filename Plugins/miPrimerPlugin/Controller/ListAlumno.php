<?php
namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

class ListAlumno extends ListController {
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
        $this->addView('ListAlumno', 'Alumno');
        $this->addSearchFields('ListAlumno', ['nombre', 'dni', 'telefono','email']);
        $this->addOrderBy('ListAlumno', ['fechanacimiento'], 'Fecha de nacimiento',2);
        $this->addOrderBy('ListAlumno', ['nombre'], 'Nombre');
        $this->addFilterPeriod('ListAlumno', 'date', 'period', 'fechanacimiento');
    }

    protected function loadData($viewName, $view) {
        switch ($viewName) {
            case 'ListAlumno':
                $view->loadData();
                break; 
        }
    }
}