<?php
namespace Cms\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PageTable
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

    public function getPage($id)
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

    public function savePage(Page $page)
    {
        $data = [
            'page_title' => $page->page_title,
            'page_slug' => $page->page_slug,
            'page_image' => $page->page_image,
            'page_content' => $page->page_content,
            'page_status' => $page->page_status,
            'page_mt' => $page->page_mt,
            'page_md' => $page->page_md,
            'page_mk' => $page->page_mk,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at
        ];

        $id = (int) $page->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getCategory($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update page with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePage($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}