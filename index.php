<?php

//Программа имитирующая отдел качества цеха

abstract class MetalObject
{
    protected const QUALITY = 85.00;
    static $all = [];
    abstract public function addItem($obj);
    static function showGood(){
        echo 'Изделия прошедшие проверку:<br>';
        foreach (self::$all as $key => $value) {
            if($value[1]){
                echo 'Изделие №'.$key.' - '.$value[0].', качество метала - '.$value[2].'% <br><hr>';
            }
        }
    }
    static function showBad(){
        echo 'Изделия не прошедшие проверку:<br>';
        foreach (self::$all as $key => $value) {
            if(!$value[1]){
                echo 'Изделие №'.$key.' - '.$value[0].', качество метала - '.$value[2].'% <br><hr>';
            }
        }
    }
    static function showAvarage(){
        $res = 0;
        foreach (self::$all as $value) {
            $res += $value[2];
        }
        echo 'Среднее качество среди всех изделий<br>'.round($res/count(self::$all), 2);
    }
}

class Screw extends MetalObject{
    private $quality;
    private $isGood;
    private $res;
    
    public function __construct($item) {
        $this->addItem($item);
    }
    
    public function addItem($obj){
        $this->quality = $obj;
        $this->isGood = $obj >= parent::QUALITY ? 1 : 0;
        $this->res = ['гайка', $this->isGood, $this->quality];
        array_push(parent::$all, $this->res);
        }
        
    public function checkQuality(){
        return $this->res;
    }
}

class Bolt extends MetalObject{
    private $quality;
    private $isGood;
    private $res;
    public function __construct($item) {
        $this->addItem($item);
    }
    
    public function addItem($obj){
        $this->quality = $obj;
        $this->isGood = $obj >= parent::QUALITY ? 1 : 0;
        $this->res = ['болт', $this->isGood, $this->quality];
        array_push(parent::$all, $this->res);
    }
        
    public function checkQuality(){
        return $this->res;
    }
}

class Nail extends MetalObject{
    private $quality;
    private $isGood;
    private $res;
    public function __construct($item) {
        $this->addItem($item);
    }
    
    public function addItem($obj){
        $this->quality = $obj;
        $this->isGood = $obj >= parent::QUALITY ? 1 : 0;
        $this->res = ['гвоздь', $this->isGood, $this->quality];
        array_push(parent::$all, $this->res);
        }
        
    public function checkQuality(){
        return $this->res;
    }
}
//тестирование
$screw1 = new Screw(84);
$screw2 = new Screw(88);
$screw3 = new Screw(90);

$nail1 = new Nail(64);
$nail2 = new Nail(88);
$nail3 = new Nail(78);

$bolt1 = new Bolt(90);
$bolt2 = new Bolt(89);
$bolt3 = new Bolt(87.12);

MetalObject::showGood();
MetalObject::showBad();
MetalObject::showAvarage();