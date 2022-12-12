<?php
/**
 * Authorization interface
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Assessment\CartDataToApiCrud\Model\Api\Data;

use Assessment\CartDataToApiCrud\Api\Data\DataInterface;
use Magento\Framework\DataObject;

/**
 * @api
 * @since 100.0.2
 */
class Data extends DataObject implements DataInterface
{
    /**
     * Get product Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }
    /**
     * Set product Id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        return $this->setData('id', $id);
    }
    /**
     * Get product sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->getData('sku');
    }
    /**
     * Set product sku
     *
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku)
    {
        return $this->setData('sku', $sku);
    }
    /**
     * Get product Name
     *
     * @return string
     */
    public function getQuoteId()
    {
        return $this->getData('quote_id');
    }
    /**
     * Set quote id
     *
     * @param int $quote_id
     * @return $this
     */
    public function setQuoteId(int $quote_id)
    {
        return $this->setData('quote_id', $quote_id);
    }
    /**
     * Get product price
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getData('customer_id');
    }
    /**
     * Set product Name
     *
     * @param int $customer_id
     * @return $this
     */
    public function setCustomerId($customer_id)
    {
        return $this->setData('customer_id', $customer_id);
    }

    /**
     * Get product price
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->getData('created');
    }
    /**
     * Set product Name
     *
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        return $this->setData('created', $created);
    }
}
