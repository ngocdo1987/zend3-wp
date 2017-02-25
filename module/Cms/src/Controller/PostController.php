<?php
namespace Cms\Controller;

use Cms\Model\PostTable;

class PostController extends CrudController
{
    protected $singular = 'post';
    protected $plural = 'posts';

    public function __construct(PostTable $table)
    {
        parent::__construct();

        $this->table = $table;
    }
}