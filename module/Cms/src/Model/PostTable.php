<?php
namespace Cms\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PostTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getPost($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function savePost(Post $post)
    {
        $data = [
            'post_title' => $post->post_title,
            'post_slug' => $post->post_slug,
            'post_image' => $post->post_image,
            'post_content' => $post->post_content,
            'post_status' => $post->post_status,
            'post_mt' => $post->post_mt,
            'post_md' => $post->post_md,
            'post_mk' => $post->post_mk,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at
        ];

        $id = (int) $post->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getCategory($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update post with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePost($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}