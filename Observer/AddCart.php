<?php

namespace Assessment\CartDataToApiCrud\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session;
use Assessment\CartDataToApiCrud\Publisher\AddCart as Publisher;

class AddCart implements ObserverInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var Session
     */
    private $checkout;

    /**
     *
     * @param LoggerInterface $logger
     * @param Session $checkout
     * @param Publisher $publisher
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        Session $checkout,
        Publisher $publisher
    ) {
       
        $this->logger = $logger;
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
            $this->logger->info($data['sku']);

            $this->publisher->publish($data);
    }
}
