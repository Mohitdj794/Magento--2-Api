<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Assessment\CartDataToApiCrud\Model\Api;

use Assessment\CartDataToApiCrud\Api\GetDataInterface;
use Assessment\CartDataToApiCrud\Api\Data\DataInterfaceFactory;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData\CollectionFactory;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData;
use Assessment\CartDataToApiCrud\Model\CartDataFactory;
use Magento\Framework\Exception\LocalizedException;

class GetData implements GetDataInterface
{
   /**
    * Collection variable
    *
    * @var CollectionFactory
    */
    private $collectionFactory;
   /**
    * Collection variable
    *
    * @var DataInterfaceFactory
    */
    private $dataInterfaceFactory;

   /**
    * Collection variable
    *
    * @var DataInterfaceFactory
    */
    private $model;
   /**
    * Collection variable
    *
    * @var DataInterfaceFactory
    */
    private $resourceModel;
    
   /**
    * Cunstruct variable
    *
    * @param CollectionFactory $collectionFactory
    * @param CartDataFactory $model
    * @param CartData $resourceModel
    * @param DataInterfaceFactory $dataInterfaceFactory
    */
    public function __construct(
        CollectionFactory $collectionFactory,
        CartDataFactory $model,
        CartData $resourceModel,
        DataInterfaceFactory $dataInterfaceFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->model = $model;
        $this->resourceModel = $resourceModel;
        $this->dataInterfaceFactory = $dataInterfaceFactory;
    }

   /**
    * Collection variable
    *
    * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface[]
    */
    public function getAllData()
    {
        try {
            $collection = $this->collectionFactory->create();
            $data = [];
            foreach ($collection as $value) {
                $dataInterface = $this->dataInterfaceFactory->create();
                $dataInterface->setId($value->getId());
                $dataInterface->setSku($value->getSku());
                $dataInterface->setQuoteId($value->getQuoteId());
                $dataInterface->setCustomerId($value->getCustomerId());
                $dataInterface->setCreated($value->getCreated());
                $data [] = $dataInterface;
            }
            return $data;
        } catch (LocalizedException $e) {
            throw $e->getMessage();
        }
    }

   /**
    * Get Data by id
    *
    * @param int $id
    * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface
    */

    public function getDataById(int $id)
    {
        try {
            if ($id == 0) {
                return [];
            }
            if ($id) {
                $value = $this->model->create()->load($id);
                $value->getData();
                $dataInterface = $this->dataInterfaceFactory->create();
                $dataInterface->setId($value->getId());
                $dataInterface->setSku($value->getSku());
                $dataInterface->setQuoteId($value->getQuoteId());
                $dataInterface->setCustomerId($value->getCustomerId());
                $dataInterface->setCreated($value->getCreated());
                return $dataInterface;
            }
            return ['Id not present in the table'];
        } catch (LocalizedException $e) {
            throw ['success' => false, 'message' => $e->getMessage()];
        }
    }

   /**
    * Get data by id
    *
    * @param int $id
    * @return bool true on success
    */
    public function delete(int $id) : bool
    {
        try {
            if ($id) {
                $data = $this->model->create()->load($id);
                $data->delete();
                return "success";
            }
        } catch (LocalizedException $e) {
               throw ['success' => false, 'message' => $e->getMessage()];
        }
        return "false";
    }

    /**
     * Get data by id
     *
     * @param array[] $data
     * @return string
     */
    public function edit($data) : string
    {
        $insertData = $this->model->create();
        try {
               $id =$data['id'];
               $insertData->load($id);
               $data = array_slice($data, 1);
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                        $insertData->setData($key, $value);
                }
                $info = 'new Record Created';
                if ($insertData->getId()) {
                     $info = 'Updated';
                }
               
                  $this->resourceModel->save($insertData);
               
                  return $info;
            }
                
        } catch (LocalizedException $e) {
                  throw $e->getMessage();
        }
        return 'Id not present';
    }

    /**
     * Get data by id
     *
     * @param int $id
     * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface[]
     */

    public function pagination(int $id)
    {
        $pageId = $id;
        if ($id == null) {
            $pageId = 1;
        }
        try {
            $collection = $this->collectionFactory->create()->setPageSize(5)->setCurPage($pageId);
            $data = [];
            foreach ($collection as $value) {
                $dataInterface = $this->dataInterfaceFactory->create();
                $dataInterface->setId($value->getId());
                $dataInterface->setSku($value->getSku());
                $dataInterface->setQuoteId($value->getQuoteId());
                $dataInterface->setCustomerId($value->getCustomerId());
                $dataInterface->setCreated($value->getCreated());
                array_push($data, $dataInterface);
            }
            return $data;
        } catch (LocalizedException $e) {
            throw $e->getMessage();
        }
    }
}
