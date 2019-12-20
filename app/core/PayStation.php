<?php


namespace App\core;


use App\models\Worker;

class PayStation
{
    private static $instance;

    protected $id;
    protected $name;
    protected $workers = [];
    protected $cashBox = [];
    protected $log;

    /**
     * PayStation constructor.
     * @param int $id
     * @param string $name
     */
    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return PayStation
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PayStation(1, 'PayStationOne');
        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getWorkers()
    {
        return $this->workers;
    }

    /**
     * @param Worker $worker
     */
    public function addWorker(Worker $worker)
    {
        $this->workers[strtolower($worker->getName())] = $worker;
    }

    /**
     * @param $workerName
     * @param $vehicle
     */
    public function toolCharge($workerName, $vehicle)
    {
        $workerName = strtolower($workerName);
        $this->cashBox[date('Y.m.d')][] = [
            $workerName =>  $this->workers[$workerName],
            'vehicle' => $vehicle,
            'price' => $vehicle::PRICE,
            'timestamp' => date('Y.m.d H:i')
        ];
        $this->logAction('Tool has been charged for ' . $vehicle->getBrand());

        echo 'Worker: ' . $workerName . ' vehicle: ' . $vehicle->getBrand() . ' ' . $vehicle->getModel() . ': ' . $vehicle::PRICE . ' din</br>';
    }

    public function getWorkerCurrentStatus($workerName)
    {
        $dayIncomeSum = 0;
        $dayWorkerStatus = array_filter($this->cashBox[date('Y.m.d')], function ($currentDay) use ($workerName) {

            return key($currentDay) === $workerName;
        });

        foreach ($dayWorkerStatus as $value) {
            $dayIncomeSum += $value['price'];
        }

        return $dayIncomeSum;
    }

    public function getDayStatus($date = 0)
    {
        $currentDate = $date ? $date : date('Y.m.d');
        $dayIncomeArr = $this->cashBox[$currentDate];
        $dayIncomeSum = 0;
        foreach ($dayIncomeArr as $value) {

            $dayIncomeSum += $value['price'];
        }

        return $dayIncomeSum;
    }

    protected function logAction($action)
    {
        $logger = Logger::getInstance();
        $logger->log($action);
    }
}