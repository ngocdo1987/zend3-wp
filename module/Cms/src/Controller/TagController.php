<?php
namespace Cms\Controller;

use Cms\Model\TagTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TagController extends AbstractActionController
{
    private $table;

    public function __construct(TagTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
    	return new ViewModel([
            'mt' => 'List tags',
            'tags' => $this->table->fetchAll(),
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