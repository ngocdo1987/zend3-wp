<?php
namespace Cms\Controller;

use Cms\Model\CategoryTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{
    private $table;

    public function __construct(CategoryTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
    	return new ViewModel([
            'mt' => 'List categories',
            'categories' => $this->table->fetchAll(),
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