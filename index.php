<?php


use App\core\PayStation;
use App\models\Bus;
use App\models\Car;
use App\models\Truck;
use App\models\Worker;

require_once './bootstrap/bootstrap.php';
//add vehicles
$bmw = new Car('M5','BMW','white');
$man = new Truck('D26','MAN','black');
$scania = new Truck('S730','Scania','silver');
$bus = new Bus('9400','Volvo','blue');
//create PayStation Instance
$payStation = PayStation::getInstance();
//create workers
$petar = new Worker('Petar', 'Markovic');
$dragan = new Worker('Dragan', 'Petrovic');
//add workers to payStation
$payStation->addWorker($petar);
$payStation->addWorker($dragan);
//get tool charge
$payStation->toolCharge('petar', $bmw);
$payStation->toolCharge('petar', $scania);
$payStation->toolCharge('dragan', $man);
$payStation->toolCharge('dragan', $bus);

echo $payStation->getWorkerCurrentStatus('petar') . "<br>";
echo $payStation->getWorkerCurrentStatus('dragan') . "<br>";
echo $payStation->getDayStatus() . "<br>";
