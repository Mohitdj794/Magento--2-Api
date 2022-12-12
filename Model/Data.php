<?php

namespace Assessment\Task2\Model;

use Magento\Framework\Model\AbstractModel;
use Assessment\Task2\Model\ResourceModel\Data as ResourceModel;

class Data extends AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
        parent::_construct();
    }
}
