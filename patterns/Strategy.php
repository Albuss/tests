<?php
 abstract class Lesson{
     private $duration;
     private $costStrateg;

     function __construct( $duration, CostStrategy $strategy)
     {
         $this-> duration = $duration;
         $this-> costStrateg = $strategy;

     }
     function cost(){
         return $this -> costStrateg -> cost($this);
     }
     function getType(){
         return $this-> costStrateg -> getType();
     }
     function getDuration(){
         return $this-> duration;
     }

 }

 class Lecture extends Lesson{

 }
 class Seminar extends Lesson{

 }

 abstract class CostStrategy{
     abstract function cost(Lesson $lesson);
     abstract function getType();
 }

 class Timed extends CostStrategy{
    function cost(Lesson $lesson){
            return ($lesson-> getDuration() *5);
    }
    function getType(){
        return "Timed cost";
    }
 }

 class Fixed extends CostStrategy{
     function cost(Lesson $lesson){
         return 30;
     }
     function getType(){
    return "Fixed cost";
     }

 }

 $lessons = new Lecture(4, new  Timed);
print "cost : ".$lessons->cost();
print "type : ".$lessons->getType();



