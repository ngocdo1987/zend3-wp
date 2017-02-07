<?php
namespace Cms\Controller;

use Cms\Model\PostTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    private $table;

    public function __construct(PostTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
    	return new ViewModel([
            'posts' => $this->table->fetchAll(),
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