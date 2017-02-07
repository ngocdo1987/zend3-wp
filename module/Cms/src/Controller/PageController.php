<?php
namespace Cms\Controller;

use Cms\Model\PageTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PageController extends AbstractActionController
{
    private $table;

    public function __construct(PageTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
    	return new ViewModel([
            'pages' => $this->table->fetchAll(),
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