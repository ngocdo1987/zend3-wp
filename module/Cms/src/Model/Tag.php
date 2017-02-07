<?php
namespace Cms\Model;

class Tag
{
    public $id;
    public $tag_name;
    public $tag_slug;
    public $tag_description;
    public $tag_mt;
    public $tag_md;
    public $tag_mk;
    public $created_at;
    public $updated_at;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->tag_name = !empty($data['tag_name']) ? $data['tag_name'] : null;
        $this->tag_slug  = !empty($data['tag_slug']) ? $data['tag_slug'] : null;
        $this->tag_description  = !empty($data['tag_description']) ? $data['tag_description'] : null;
        $this->tag_mt = !empty($data['tag_mt']) ? $data['tag_mt'] : null;
        $this->tag_md = !empty($data['tag_md']) ? $data['tag_md'] : null;
        $this->tag_mk = !empty($data['tag_mk']) ? $data['tag_mk'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }
}