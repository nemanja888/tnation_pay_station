<?php


namespace App\core;

use App\core\interfaces\iWorker;

abstract class MainWorker implements iWorker
{
    protected $name;

    protected $surname;

    /**
     * MainWorker constructor.
     * @param $name
     * @param $surname
     */
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @param $name
     * @return mixed|void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $surname
     * @return mixed|void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return strtolower($this->name);
    }

    /**
     * @return mixed|string
     */
    public function getFullName()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }
}