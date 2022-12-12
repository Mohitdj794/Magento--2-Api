<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Assessment\CartDataToApiCrud\Model\Api;

use Assessment\CartDataToApiCrud\Api\GetDataInterface;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData\CollectionFactory;
use Assessment\CartDataToApiCrud\Model\ResourceModel\CartData;
use Assessment\CartDataToApiCrud\Model\CartDataFactory;
use Magento\Framework\DataObject;

class GetData extends DataObject implements GetDataInterface
{
   /**
    * Collection variable
    *
    * @var CollectionFactory
    */
    private $collectionFactory;
    
   /**
    * Cunstruct variable
    *
    * @param CollectionFactory $collectionFactory
    * @param CartDataFactory $model
    * @param CartData $resourceModel
    */
    public function __construct(
        CollectionFactory $collectionFactory,
        CartDataFactory $model,
        CartData $resourceModel,
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->model = $model;
        $this->resourceModel = $resourceModel;
    }

   /**
    * Collection variable
    *
    * @return string
    */
    public function getAllData() : string
    {
         $collection = $this->collectionFactory->create();
         return json_encode(['items' => $collection->getData()]);
    }

   /**
    * Get Data by id
    *
    * @param int $id
    * @return string
    */

    public function getDataById(int $id) : string
    {
        try {
            if ($id == 0) {
                return [];
            }
            if ($id) {
                 $data = $this->model->create()->load($id)->getData();
                 return json_encode(['item' => $data]);
            }
            return ['Id not present in the table'];
        } catch (\Exception $e) {
             return ['success' => false, 'message' => $e->getMessage()];
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
        } catch (\Exception $e) {
               return ['success' => false, 'message' => $e->getMessage()];
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
                
        } catch (\Exception $e) {
                  return $e->getMessage();
        }
        return 'Id not present';
    }

    /**
     * Get data by id
     *
     * @param int $id
     * @return string
     */

    public function pagination(int $id) : string
    {
        $pageId = $id;
        if ($id == null) {
            $pageId = 1;
        }
        $collection = $this->collectionFactory->create()->setPageSize(5)->setCurPage($pageId);
        return json_encode(['items'=>$collection->getData()]);
    }
}
