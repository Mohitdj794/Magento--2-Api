<?php

namespace Assessment\CartDataToApiCrud\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CartData extends AbstractDb
{
    /**
     * @inheritdoc
     */

    protected function _construct()
    {
        $this->_init('customers_cart_task', 'id');
    }
}
