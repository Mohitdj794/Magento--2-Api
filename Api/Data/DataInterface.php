<?php

declare( strict_types = 1 );
/**
 * Authorization interface
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Assessment\CartDataToApiCrud\Api\Data;

/**
 * @api
 * @since 100.0.2
 */

interface DataInterface
{
    public const ID = 'id';
    public const SKU = 'sku';
    public const QUOTE_ID = 'quote_id';
    public const CUSTOMER_ID = 'customer_id';
    public const CREATED = 'created';

    /**
     * Get product Id
     *
     * @return int
     */
    public function getId();
    /**
     * Get Product By ID
     *
     * @param  int $id
     * @return $this
     */
    public function setId(int $id);
    /**
     * Get product Sku
     *
     * @return string
     */
    public function getSku();
    /**
     * Set Product By sku
     *
     * @param  string $sku
     * @return $this
     */
    public function setSku(string $sku);
    /**
     * Get quote_id
     *
     * @return int
     */
    public function getQuoteId();
    /**
     * Set quote_id
     *
     * @param  string $quote_id
     * @return $this
     */
    public function setQuoteId(int $quote_id);
    /**
     * Get customer_id
     *
     * @return int
     */
    public function getCustomerId();
    /**
     * Set customer_id
     *
     * @param  int $customer_id
     * @return $this
     */
    public function setCustomerId(int $customer_id);
    /**
     * Get created
     *
     * @return string
     */
    public function getCreated();
    /**
     * Set created
     *
     * @param string $created
     * @return $this
     */
    public function setCreated($created);
}
