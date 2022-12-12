<?php

namespace Assessment\CartDataToApiCrud\Consumer;

use Magento\Framework\Serialize\SerializerInterface;
use Assessment\CartDataToApiCrud\Model\DataFactory as Model;
use Assessment\CartDataToApiCrud\Model\ResourceModel\Data as ResourceModel;

class Addcart
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * @param SerializerInterface $serializer
     * @param Model $model
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        SerializerInterface $serializer,
        Model $model,
        ResourceModel $resourceModel
    ) {
        $this->serializer = $serializer;
        $this->model = $model;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Consume Method
     *
     * @param array $data
     * @return void
     */
    public function consume($data)
    {
        $model = $this->model->create();
        $unserialarr = $this->serializer->unserialize($data);
        $model->setData($unserialarr);
        try {
            $this->resourceModel->save($model);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
