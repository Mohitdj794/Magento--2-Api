<?php

namespace Assessment\CartDataToApiCrud\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Checkout\Model\Session;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData;
use Assessment\CartDataToApiCrud\Model\CartDataFactory;

class GetCartData implements ObserverInterface
{
	/**
	 * Param
	 *
	 * @param ImportJson $importJson
	 * @param ImportCsv $importCsv
	 */
	public function __construcT(
	\Magento\Framework\HTTP\Client\Curl $curl,
	\Psr\Log\LoggerInterface $logger,
	Session $checkoutSession,
	CartDataFactory $model,
	CartData $resourceModel
	) {
		$this->logger = $logger;
		$this->crul = $curl;
		$this->checkoutSession = $checkoutSession;
		$this->model = $model;
		$this->resourceModel = $resourceModel;
	}

	public function execute(Observer $observer)
	{
	$sku = $observer->getProduct()->getSku();
	$session = $this->checkoutSession->getQuote();
	$quoteId = $session->getId();
	$customerId = $session->getCustomerId();
	$this->crul->post('http://magento2.local/rest/V1/get/data/cart', [
	'data' => [
		'sku' => $sku,
		'quote_id' => $quoteId,
		'customer_id' => $customerId
	]
	]);
	}
}
