<?php
namespace Cms\Controller;

use Cms\Model\TagTable;

class TagController extends CrudController
{
    protected $singular = 'tag';
    protected $plural = 'tags';

    public function __construct(TagTable $table)
    {
        parent::__construct();

        $this->table = $table;
    }
}