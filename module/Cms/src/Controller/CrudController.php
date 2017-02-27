<?php
namespace Cms\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CrudController extends AbstractActionController
{
    protected $singular;
    protected $plural;
    protected $config;

    public function __construct()
    {
        $cfg_file = __DIR__.'/../../config/cms/'.$this->singular.'.json';
        $config = file_exists($cfg_file) ? json_decode(file_get_contents($cfg_file)) : null;

        $this->config = $config;
    }

    public function indexAction()
    {
        $viewModel = new ViewModel([
            'mt' => 'List '.$this->plural,
            'cruds' => $this->table->fetchAll(),
            'config' => $this->config,
            'singular' => $this->singular,
            'plural' => $this->plural
        ]);

        $viewModel->setTemplate('cms/crud/index.phtml');

        return $viewModel;
    }

    public function addAction()
    {
        $viewModel = new ViewModel([
            'mt' => 'Add '.$this->singular
        ]);

        $viewModel->setTemplate('cms/crud/add.phtml');

        return $viewModel;
    }

    public function editAction()
    {
        $viewModel = new ViewModel([
            'mt' => 'Edit '.$this->singular
        ]);

        $viewModel->setTemplate('cms/crud/edit.phtml');

        return $viewModel;
    }

    public function deleteAction()
    {
        
    }
}