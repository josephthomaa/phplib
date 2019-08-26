<?php

interface CarService{
    public function getCost();
    public function  getDescription();
}

class BasicInspection implements CarService{
    public function getCost()
    {
       return 20;
    }
    public function getDescription()
    {
        return "Basic Inspection";
    }
}

class  OilChange implements CarService{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }
    public function getDescription()
    {
       return $this->carService->getDescription()." , Oil Change";
    }
}

class TireRotation implements CarService{
    protected $tireRotation;

    function __construct(CarService $carService)
    {
        $this->carService =$carService;
    }
    public function getCost()
    {
        return 10 + $this->carService->getCost();
    }
    public function getDescription()
    {
        return $this->carService->getDescription()." , and a tire change";
    }
}

$servicePack1 = new BasicInspection();
$servicePack2=new OilChange(new BasicInspection());
$servicePack3= new TireRotation(new OilChange(new BasicInspection()));
echo $servicePack1->getDescription()." priced at ".$servicePack1->getCost();
echo "   ";
echo $servicePack2->getDescription()." priced at ".$servicePack2->getCost();
echo "   ";
echo $servicePack3->getDescription()." priced at ".$servicePack3->getCost();
?>
