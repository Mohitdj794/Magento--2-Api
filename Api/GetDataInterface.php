<?php

namespace Assessment\CartDataToApiCrud\Api;

interface GetDataInterface
{

    /**
     * GET for all data api
     *
     * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface[]
     */

    public function getAllData();

    /**
     * Get data by id
     *
     * @param int $id
     * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface
     */

    public function getDataById(int $id);

    /**
     * POST data by id
     *
     * @api
     * @param mixed $data
     * @return string
     */

    public function edit($data);

    /**
     * Get data by id
     *
     * @param int $id
     * @return bool
     */

    public function delete(int $id) : bool;

    /**
     * Get data by id
     *
     * @param int $id
     * @return \Assessment\CartDataToApiCrud\Api\Data\DataInterface[]
     */

    public function pagination(int $id);
}
