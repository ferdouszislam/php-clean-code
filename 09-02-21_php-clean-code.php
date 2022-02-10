<?php

// 1.1 make variable names clear, searchable. don't encode/minify.
	
	$currTmptr = 40; // bad

	$currentTemparature = 24; // good


// 1.2 Use constants/enums instead of magic hardcoded numbers

// bad
class User{

    public $type = 'employee'; // what is a 'student'
}

// good
class UserType{
    
    public const ADMIN_USER = 'admin';
    public const EMPLOYEE_USER = 'employee';
    public const MANAGER_USER = 'manager';
}

class UserClean{

    public $type = UserType::ADMIN_USER;
}



// 2.1 early return in functions

// bad
function fooNoEarlyReturn($fooFlag){

    $returnValue = null;

    if(!$fooFlag) $returnValue = 0;

    else{
        // very long and complex code
        $returnValue = 100;
    }

    return $returnValue;
}

// good
function fooCleanWithEarlyReturn($fooFlag){

    $returnValue = null;

    if(!$fooFlag) return 0;

    // very long and complex code
    $returnValue = 100;

    return $returnValue;
}



// 2.2. avoid deep nesting

// bad
function isVacationNested($day, $week){

    if($week%2==0){
        if($day == 'Sunday' || $day == 'Saturday') return true;
        else return false;
    }    

    else{
        if($day == 'Sunday') return true;
        else return false;
    }
}

// good
function isVacationClean($day, $week){

    $weekendDays = ['Sunday'];
    $alternateWeekendDays = ['Sunday', 'Saturday'];

    if($week%2==0) return in_array($day, $weekendDays);
    else return in_array($day, $alternateWeekendDays);
}



// 2.3 Avoid functional side effects

class Foo{
    
    public $foo=2;

    public function __construct($foo) {
        $this->foo = $foo;
    }
    
    public function __toString() {
      return  $this->foo. "";
    }
}

function foo($fooObj) {
    
    // create a clone to avoid changing the original object
    // which was passed by reference
    $fooObj = clone $fooObj;

    $fooObj->a = 5;
}

$foo = new Foo(2);
echo "before calling function, foo = ".$foo."\n";
foo($foo);
echo "after calling function, foo = ".$foo."\n";



// 2.4 avoid passing flags as function arguments, functions should do only one thing

// bad
function processYear($year, $isYearLeap) {

    if($isYearLeap){
        // process leap year
    }
    else{
        // process not leap year
    }
}


// good
function processLeapYear($year) {
    // process leap year
}

function processNotLeapYear($year) {
    // process not leap year
}



// 2.5 do only one thing inside a function

// bad
function addAndMultiply(int $x, int $y, int $z) {

    $result = $x + $y;
    $result = $result*$z;
    return $result;
}

function substractAndDivide(int $x, int $y, int $z) {

    $result = $x - $y;
    $result = $result/$z;
    return $result;
}

function applyFormula(int $x, int $y, int $z){
// apply formula (x+y)*z + (x-y)/z
    
    return addAndMultiply($x, $y, $z) + substractAndDivide($x, $y, $z);
}


// good
function add(int $x, int $y){
    return $x+$y;
}
function substract(int $x, int $y){
    return $x-$y;
}
function multiply(int $x, int $y){
    return $x*$y;
}
function divide(int $x, int $y){
    return $x/$y;
}

function applyFormulaNicely(int $x, int $y, int $z){
// apply formula (x+y)*z + (x-y)/z

        $sumPart1 = multiply(add($x, $y), $z); // calculate (x+y)*z
        $sumPart2 = divide(substract($x, $y), $z); // calculate (x+y)*z
        $result = add($sumPart1, $sumPart2);
        
        return $result;
}

?>