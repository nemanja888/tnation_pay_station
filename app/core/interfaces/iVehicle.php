<?php

namespace App\core\interfaces;

interface iVehicle
{
    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model);

    /**
     * @param $brand
     * @return mixed
     */
    public function setBrand($brand);

    /**
     * @param $color
     * @return mixed
     */
    public function setColor($color);

    /**
     * @return mixed
     */
    public function getModel();

    /**
     * @return mixed
     */
    public function getBrand();

    /**
     * @return mixed
     */
    public function getColor();
}