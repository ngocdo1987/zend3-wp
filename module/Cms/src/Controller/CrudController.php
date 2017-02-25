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
        return new ViewModel([
            'mt' => 'List '.$this->plural,
            $this->plural => $this->table->fetchAll(),
            'config' => $this->config
        ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}