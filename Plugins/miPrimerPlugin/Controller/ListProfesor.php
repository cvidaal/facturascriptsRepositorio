<?php

namespace FacturaScripts\Plugins\miPrimerPlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

class ListProfesor extends ListController
{
    public function getPageData(): array
    {
        $page = parent::getPageData();
        $page['title'] = 'Profesores';
        $page['menu'] = 'Academia';
        $page['icon'] = 'fas fa-user-friends';
        return $page;
    }

    protected function createViews()
    {
        $this->createProfesor();
    }

    protected function createProfesor($viewName = "ListProfesor")
    {
        $this->addView($viewName, 'Profesor', 'Profesores', 'fas fa-chalkboard-teacher');
    }

    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
            case 'ListProfesor':
                $view->loadData();
                break;
        }
    }
}
