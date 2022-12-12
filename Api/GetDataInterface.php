<?php

namespace Assessment\CartDataToApiCrud\Api;

interface GetDataInterface
{

    /**
     * GET for all data api
     *
     * @return string
     */

    public function getAllData() : string;

    /**
     * Get data by id
     *
     * @param int $id
     * @return string
     */

    public function getDataById(int $id) : string;

    /**
     * POST data by id
     *
     * @api
     * @param mixed $data
     * @return string
     */

    public function edit($data) : string;

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
     * @return string
     */

    public function pagination(int $id) : string;
}
