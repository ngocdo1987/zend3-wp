<?php
namespace Cms\Controller;

use Cms\Model\CategoryTable;

class CategoryController extends CrudController
{
    protected $singular = 'category';
    protected $plural = 'categories';

    public function __construct(CategoryTable $table)
    {
        parent::__construct();

        $this->table = $table;
    }
}