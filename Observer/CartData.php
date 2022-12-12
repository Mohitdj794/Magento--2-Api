<?php

namespace Assessment\CartDataToApiCrud\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData;
use Assessment\CartDataToApiCrud\Model\CartDataFactory;

class AddCart implements ObserverInterface
{
    /**
     * @var Session
     */
    private $checkout;

    /**
     * @var CartDataFactory
     */
    private $modelFactory;

    /**
     * @var CartData
     */
    private $resourceModel;

    /**
     *
     * @param Session $checkout
     */
    public function __construct(
        Session $checkout,
        CartDataFactory $modelFactory,
        CartData $resourceModel
    ) {
        $this->checkout=$checkout;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Observe and execute add to cart event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
            $sku = $observer->getProduct()->getSku();
            $session=$this->checkout->getQuote();
            $customer_id=$session->getCustomerId();
            $quote_id=$session->getId();
            $model = $this->modelFactory->create();
    }
}
