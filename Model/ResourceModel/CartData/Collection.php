<?php

namespace Assessment\CartDataToApiCrud\Model\ResourceModel\CartData;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(
            \Assessment\CartDataToApiCrud\Model\CartData::class,
            \Assessment\CartDataToApiCrud\Model\ResourceModel\CartData::class
        );
    }
}
