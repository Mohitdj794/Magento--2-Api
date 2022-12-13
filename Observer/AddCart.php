<?php

namespace Assessment\CartDataToApiCrud\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session;
use Assessment\CartDataToApiCrud\Publisher\AddCart as Publisher;

class AddCart implements ObserverInterface
{
    /**
     * @var Session
     */
    private $checkout;

    /**
     *
     * @param Session $checkout
     * @param Publisher $publisher
     */
    public function __construct(
        Session $checkout,
        Publisher $publisher
    ) {
       
        $this->checkout=$checkout;
        $this->publisher=$publisher;
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
            $data=['sku'=>$sku,
                    'customer_id'=>$customer_id,
                    'quotes_id'=>$quote_id
                  ];
            $this->publisher->publish($data);
    }
}
