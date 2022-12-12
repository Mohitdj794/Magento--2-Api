<?php

namespace Assessment\CartDataToApiCrud\Model;
 
use Magento\Framework\Model\AbstractModel;

class CartData extends AbstractModel
{
    /**
     * @inheritdoc
     */

    protected function _construct()
    {
        $this->_init(\Assessment\CartDataToApiCrud\Model\ResourceModel\CartData::class);
    }
}
