<?php


namespace App\core\interfaces;


interface iWorker
{
    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @param $name
     * @return mixed
     */
    public function setSurname($name);

    /**
     * @return mixed
     */
    public function getFullName();
}