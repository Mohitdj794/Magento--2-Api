<?php
namespace Assessment\Task2\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Assessment\Task2\Model\Data as Model;
use Assessment\Task2\Model\ResourceModel\Data as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
        parent::_construct();

    }
}