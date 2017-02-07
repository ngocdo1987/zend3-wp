<?php
namespace Cms\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class TagTable
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

    public function getTag($id)
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

    public function saveTag(Tag $tag)
    {
        $data = [
            'tag_name' => $tag->tag_name,
            'tag_slug' => $tag->tag_slug,
            'tag_description' => $tag->tag_description,
            'tag_mt' => $tag->tag_mt,
            'tag_md' => $tag->tag_md,
            'tag_mk' => $tag->tag_mk,
            'created_at' => $tag->created_at,
            'updated_at' => $tag->updated_at
        ];

        $id = (int) $tag->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getCategory($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update tag with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteTag($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}