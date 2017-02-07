<?php
namespace Cms\Model;

class Post
{
    public $id;
    public $post_title;
    public $post_slug;
    public $post_image;
    public $post_content;
    public $post_status;
    public $post_mt;
    public $post_md;
    public $post_mk;
    public $created_at;
    public $updated_at;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->post_title = !empty($data['post_title']) ? $data['post_title'] : null;
        $this->post_slug  = !empty($data['post_slug']) ? $data['post_slug'] : null;
        $this->post_image  = !empty($data['post_image']) ? $data['post_image'] : null;
        $this->post_content = !empty($data['post_content']) ? $data['post_content'] : null;
        $this->post_status = !empty($data['post_status']) ? $data['post_status'] : null;
        $this->post_mt = !empty($data['post_mt']) ? $data['post_mt'] : null;
        $this->post_md = !empty($data['post_md']) ? $data['post_md'] : null;
        $this->post_mk = !empty($data['post_mk']) ? $data['post_mk'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }
}