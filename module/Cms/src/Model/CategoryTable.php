<?php
namespace Cms\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CategoryTable
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

    public function getCategory($id)
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

    public function saveCategory(Category $category)
    {
        $data = [
            'category_name' => $category->category_name,
            'category_slug' => $category->category_slug,
            'category_description' => $category->category_description,
            'parent_id' => $category->parent_id,
            'category_mt' => $category->category_mt,
            'category_md' => $category->category_md,
            'category_mk' => $category->category_mk,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at
        ];

        $id = (int) $category->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getCategory($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update category with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteCategory($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}