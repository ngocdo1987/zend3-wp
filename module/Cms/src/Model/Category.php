<?php
namespace Cms\Model;

class Category
{
    public $id;
    public $category_name;
    public $category_slug;
    public $category_description;
    public $parent_id;
    public $category_mt;
    public $category_md;
    public $category_mk;
    public $created_at;
    public $updated_at;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->category_name = !empty($data['category_name']) ? $data['category_name'] : null;
        $this->category_slug  = !empty($data['category_slug']) ? $data['category_slug'] : null;
        $this->category_description  = !empty($data['category_description']) ? $data['category_description'] : null;
        $this->parent_id = !empty($data['parent_id']) ? $data['parent_id'] : null;
        $this->category_mt = !empty($data['category_mt']) ? $data['category_mt'] : null;
        $this->category_md = !empty($data['category_md']) ? $data['category_md'] : null;
        $this->category_mk = !empty($data['category_mk']) ? $data['category_mk'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }
}