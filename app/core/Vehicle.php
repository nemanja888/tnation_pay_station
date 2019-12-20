<?php


namespace App\core;


use App\core\interfaces\iVehicle;

abstract class Vehicle implements iVehicle
{
    protected $model;

    protected $brand;

    protected $color;

    /**
     * Vehicle constructor.
     * @param string $model
     * @param string $brand
     * @param string $color
     */
    public function __construct(string $model, string $brand, string $color)
    {
        $namespace = explode('\\', get_class($this));
        $className = array_pop($namespace);
        $this->model = $model;
        $this->brand = $brand;
        $this->color = $color;
        $this->logAction('Created '. $className);
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    protected function logAction($action)
    {
        $logger = Logger::getInstance();
        $logger->log($action);
    }
}