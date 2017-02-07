<?php
namespace Album\Controller;

//use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    public function indexAction()
    {
        die('It is post controller index!');
        /*
    	return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
        */
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