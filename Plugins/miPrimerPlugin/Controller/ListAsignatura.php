<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

class ListAsignatura extends ListController
{
    public function getPageData(): array
    {
        $page = parent::getPageData();
        $page['title'] = 'Asignatura';
        $page['menu'] = 'Academia';
        $page['icon'] = 'fas fa-file-signature';
        return $page;
    }

    protected function createViews()
    {
        $this->createAsignatura();
    }


    protected function createAsignatura($viewName = 'ListAsignatura')
    {
        $this->addView($viewName, 'Asignatura', 'Asignaturas');
    }

    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
                // Se puede poner así porque ejecuta el mismo código y no utiliza break;
            case 'ListAsignatura':
                $view->loadData();
                break;
        }
    }
}
