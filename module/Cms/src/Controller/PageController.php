<?php
namespace Cms\Controller;

use Cms\Model\PageTable;

class PageController extends CrudController
{
    protected $singular = 'page';
    protected $plural = 'pages';

    public function __construct(PageTable $table)
    {
        parent::__construct();
        
        $this->table = $table;
    }
}