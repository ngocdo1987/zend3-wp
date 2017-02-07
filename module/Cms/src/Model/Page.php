<?php
namespace Cms\Model;

class Page
{
    public $id;
    public $page_title;
    public $page_slug;
    public $page_image;
    public $page_content;
    public $page_status;
    public $page_mt;
    public $page_md;
    public $page_mk;
    public $created_at;
    public $updated_at;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->page_title = !empty($data['page_title']) ? $data['page_title'] : null;
        $this->page_slug  = !empty($data['page_slug']) ? $data['page_slug'] : null;
        $this->page_image  = !empty($data['page_image']) ? $data['page_image'] : null;
        $this->page_content = !empty($data['page_content']) ? $data['page_content'] : null;
        $this->page_status = !empty($data['page_status']) ? $data['page_status'] : null;
        $this->page_mt = !empty($data['page_mt']) ? $data['page_mt'] : null;
        $this->page_md = !empty($data['page_md']) ? $data['page_md'] : null;
        $this->page_mk = !empty($data['page_mk']) ? $data['page_mk'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }
}