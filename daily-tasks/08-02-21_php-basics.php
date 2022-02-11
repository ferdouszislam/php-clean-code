<?php

  function printLine($message=""){
    
    echo $message."\n";
    
    return true;
  }
  
  // const type variable
  define("SOME_FIXED_VALUE", 404);
  printLine(SOME_FIXED_VALUE);
  printLine();
  
	printLine("Hello world");
  
  printLine();
  // variables and operations
  $someNumber = -1;
  printLine("someNumber = ".$someNumber);
  $someNumber += $someNumber;
  printLine("someNumber after operation = ".$someNumber);
  
  printLine();
  // if else
  if ($someNumber > 0) printLine($someNumber. " is positive");
  else printLine($someNumber. " is negative");
  
  printLine();
  // get variable type 
  var_dump($someNumber);
  $someNumber = "-2";
  var_dump($someNumber);
  
  printLine();
  // oop
  class Student{
    
    protected $name;
    protected $id;
    
    public function __construct($name, $id){
      
      $this->name = $name;
      $this->id = $id;
    }
    
    public function getName(){
      return $this->name;
    } 
    
    public function getId(){
      return $this->id;
    }
    
    public function setName($name){
      $this->name = $name;
    } 
    
    public function setId($id){
      $this->id = $id;
    }
    
    public function __toString(){
      return  "student object (".$this->name. ", ".$this->id.")";
    }
  }
  
  $student = new Student('john', '123');
  printLine($student);
  
  class UndergraduateStudent extends Student{
    
    private $cgpa;
    
    public function __construct($name, $id, $cgpa){
      
      parent::__construct($name, $id);
      
      $this->cgpa = $cgpa;
    }
    
    public function getCgpa(){
      return $this->cgpa;
    }
    
    public function setCgpa($cgpa){
      $this->cgpa = $cgpa;
    }
    
    public function __toString(){
      return  "undergraduate-student object ("
      .$this->name. ", "
      .$this->id.", "
      .$this->cgpa.")";
    }
  }
  
  $undergradStudent = new UndergraduateStudent("Bob", 345, 3.56);
  printLine($undergradStudent)
  
?>