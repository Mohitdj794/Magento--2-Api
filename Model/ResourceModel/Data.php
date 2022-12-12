<?php

namespace Assessment\Task2\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{
    /**
     *  Init module  
     */
    protected function _construct()
    {
        $this->_init('customers_cart_task', 'id');
    }
}
