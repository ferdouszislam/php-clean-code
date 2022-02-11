# practice-php-clean-code
Documentation on clean coding and demonstration of studied clean coding principals with PHP.


## 1. General Rules ***(can skip this section)***

DRY: Don't Repeat Yourself - write repeated codes inside functions.  
KISS: Keep It Simple Stupid - go for the simplest solution first (try linear search before binary search).


**1.1 Variable Naming Rules:**
- descriptive, easy to search, easy to pronounce. 
- don't add type information, avoid encodings.
- replace magic numbers with constants.


**1.2 Comments:**
- The code is the best documentation.
- Use only to clarify code.

**1.3 Functions:**
- Place functions in the downward direction.
- keep it simple and short, do only one thing inside a function. Rule of thumb: whole function should fits in your monitor.
	- keep number of parameters small (<=3), 
	- avoid passing booleans (are you trying to do more than one thing?).
	- use language provided library functions (sorting, searching, data structures etc.)
- AVOID SIDE EFFECTS (changing variables passed by reference)

**1.4 Class:**
- use public, private, protected keywords.
- keep small, and only for single purpose.
- small number of instance variables.
- super class should know nothing of it's sub classes.
- keep utility variables and methods private.
- avoid redundancy by inheriting from classes.

**1.5 Tests:**
- fast to execute.
- should not depend on other tests.
- one assert per test.
- TEST DRIVEN DEVELOPMENT - writing unit tests while you are writing the code (or before writing new code).



## 2. Variables

### 2.1 Make variable names clear, searchable. don't encode or minify.  

```php
$currTmptr = 24; // bad
$currentTemparature = 24; // good
```

### 2.2 Use constants/enums instead of magic hardcoded numbers.

**bad:**
```php
class User{

    public $type = 'employee'; // what is a 'employee', what are other types??
}
```

**good:**
```php
class UserType{
// dedicated class to keep constant values of employee types

    public const ADMIN_USER = 'admin';
    public const EMPLOYEE_USER = 'employee';
    public const MANAGER_USER = 'manager';
}

class User{

    public $type = UserType::ADMIN_USER;
}
```



## 3. Functions

### 3.1 Return as early as possible.

**bad:**
```php
function fooFunc($fooFlag){

    $returnValue = null;

    if(!$fooFlag) $returnValue = 0;

    else{
        
	// very long and complex code...
	
        $returnValue = 100;
    }

    return $returnValue;
}
```

**good:**
```php
function fooFunc($fooFlag){

    $returnValue = null;

    if(!$fooFlag) return 0;

    // very long and complex code...    
    $returnValue = 100;

    return $returnValue;
}
```


### 3.2 Avoid deep nesting.

**bad:**
```php
function isVacation($day, $week){
// weekend is Sundays every week and Saturdays on every alternating week

    if($week%2==0){
        if($day == 'Sunday' || $day == 'Saturday') return true;
        else return false;
    }    

    else{
        if($day == 'Sunday') return true;
        else return false;
    }
}
```

**good:**
```php
function isVacation($day, $week){
// weekend is Sundays every week and Saturdays on every alternating week

    $weekendDays = ['Sunday'];
    $alternateWeekendDays = ['Sunday', 'Saturday'];

    if($week%2==0) return in_array($day, $weekendDays);
    else return in_array($day, $alternateWeekendDays);
}
```


### 3.3 Avoid functional side effects.

**bad:**
```php
class FooClass{
    
    public $fooVar=2;

    public function __construct($fooVar) {
        $this->fooVar = $fooVar;
    }
}

function fooFunc($fooObj) {
    
    $fooObj->a = 5; // changes the value of the original '$fooObj' passed by reference
}
```

**good:**
```php
class FooClass{
    
    public $fooVar=2;

    public function __construct($fooVar) {
        $this->fooVar = $fooVar;
    }
}

function fooFunc($fooObj) {
    
    // create a clone to avoid changing the original object
    // which was passed by reference
    $fooObj = clone $fooObj;

    $fooObj->a = 5;
}
```


### 3.4 Avoid passing flags as function arguments, functions should do only one thing.

**bad:**
```php
function processYear($year, $isYearLeap) {

    if($isYearLeap){
        // process leap year
    }
    else{
        // process not leap year
    }
}
```

**good:**
```php
function processLeapYear($year) {
    // process leap year
}

function processNotLeapYear($year) {
    // process not leap year
}
```


### 3.5 Do only ONE thing inside a function.

**bad:**
```php
// the functions 'addAndMultiply()' and 'substractAndDivide()' were too much complicated 
// to forcefully fit the implementation of 'applyFormula()' functions

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
```

**good:**
```php
// instead create generalized functions to do one task only.

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

function applyFormula(int $x, int $y, int $z){
// apply formula (x+y)*z + (x-y)/z

        $sumPart1 = multiply(add($x, $y), $z); // calculate (x+y)*z
        $sumPart2 = divide(substract($x, $y), $z); // calculate (x+y)*z
        $result = add($sumPart1, $sumPart2);
        
        return $result;
}
```


### 3.6 Specify function arguments variable types and/or return type.

**bad:**
```php
function add($x, $y) {

    if (! is_numeric($x) || ! is_numeric($y)){
        throw new Exception('Must be a Number');
    }

    return $x + $y;
}
```

**good:**
```php
function add(int $x, int $y): int {
    return $x + $y;
}
```



## 4. OOP

### 4.1 Use polymorphism instead of type cheking

**bad:**
```php
class Authentication{
        
    public $auth_type;

    public function __construct($auth_type){
        $this->auth_type = $auth_type;
    }

    public function googleAuthentication() {
        // logic for google authentication
        return true;
    }

    public function githubAuthentication() {
        // logic for google authentication
        return true;
    }
}

$user_authenticator = new Authentication('github');

switch($user_authenticator->auth_type){
    case 'google':
        $user_authenticator->googleAuthentication();
        break;

    case 'github':
        $user_authenticator->githubAuthentication();
        break;

    default:
        throw new Exception('unknon auth type='.$user_authenticator->auth_type);
}
```

**good:**
```php
abstract class Authentication{

    abstract function authenticate();
}

class GoogleAuthentication extends Authentication{
    public function authenticate(){
        return true;
    }
}

class GithubAuthentication extends Authentication{
    public function authenticate(){
        return true;
    }
}

$user_auth = new GoogleAuthentication();
$user_auth->authenticate();
```


### 4.2 Always enforce encapsulation

**bad:**
```php
class Result{
    public $mark;
}
$result = new Result();
$result->mark -= 10; // penalize 10 marks for cheating
```

**good:**
```php
class Result{

    private static $MAX_MARK = 100;
    private static $MIN_MARK = 0;

    private $mark;

    public function __construct($mark){
        $this->mark = $mark;
    }
    public function penalize($penalizeMarks){
    // method to access the instance variable $mark
    // and decrease it to non-negative
    
        $this->mark-=$penalizeMarks;
        $this->mark = max(Result::$MIN_MARK, $this->mark);
    }
    public function reward($bonusMarks){
    // method to access the instance variable $mark
    // and increase it within a fixed limit
    
	$this->mark+=$bonusMarks;
        $this->mark = min(Result::$MAX_MARK, $this->mark);
    }
}

$result = new Result(85);
$result->penalize(5); // penalize 5 marks for cheating
```


## 5. SOLID


### S: Single Responsibility

One class should be responsible for ONE and ONLY ONE thing.

**bad:**
```php
// Character class stores information of a character and also codes regarding actions made by the character
class Character{
    private string $name;
    private float $healthPoints;
    private int $positionX, $positionY;

    public function __construct(
        $name='temp_player', 
        $healthPoints=100.00, 
        $positionX=0,
        $positionY=0)
    {
            $this->name = $name;
            $this->healthPoints = $healthPoints;
            $this->positionX = $positionX;
            $this->positionY = $positionY;   
    }
    
    public function fly() {
        $this->positionX+=5;
        $this->positionY+=5;
    }

    public function sleep() {
        $this->healthPoints+=100.00;
    }
}
```

**good:**
```php
class Character{
    private string $name;
    private float $healthPoints;
    private int $positionX, $positionY;

    public function __construct(
        $name='temp_player', 
        $healthPoints=100.00, 
        $positionX=0,
        $positionY=0)
    {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->positionX = $positionX;
        $this->positionY = $positionY;   
    }
}

class CharacterAction{

    public function fly(Character $character) : Character
    {
        $character->positionX+=5;
        $character->positionY+=5;
        return $character;
    }

    public function sleep(Character $character) : Character
    {
        $character->healthPoints+=100.00;      
        return $character;
    }
}
```


### O: Open-Closed Principal

Open for extension, closed for modification.

**bad:**
```php
class Database{

    public function insertToFirebase(){
        // implementation
    }
    
    public function insertToMysql(){
        // implementation
    }
}
```

**good:**
```php
abstract class Database{

    abstract function insert();
}

class FirebaseDatabase extends Database{
    // overriden method
    function insert(){
        // implementation
    }
}

class MySqlDatabase extends Database{
    // overriden method
    function insert(){
        // implementation
    }
}
```

### L: Liskov Substitution Principal

all super class instances should be completely replacable by their subclasses can be acquired through an additional level of abstraction (addding another higher level interface/abstract class) see the traditional "Rectangle-Square" example: https://github.com/jupeter/clean-code-php#liskov-substitution-principle-lsp


### I: Interface Segragation

Keep interfaces short and meaningful, don't force the implementing classes to override irrelevant methods.

**bad:**
```php
// character's who are only supposed to farm or attack or heal are forced to override the other methods
interface Action{
    function farm();
    function attack();
    function heal();
}
```

**good:**
```php
interface VillagerAction{
    function farm();
}

interface AttackerAction{
    function attack();
}

interface HealerAction{
    function heal();
}
```


### D: Dependency Inversion

- high-level modules should not depend on low-level modules. Both should depend on abstractions.
- abstractions should not depend upon details. Details should depend on abstractions. 

***The coding example below only contains demo for point (ii)***

**bad:**
```php
abstract class Insect{

    protected int $positionX, $positionY, $positionZ;

    abstract function crawl();
    abstract function fly();
}

class Cockroach extends Insect{

    function crawl(){
        // code for crawling
    }

    function fly(){
        // code for flying
    }
}

class Scorpion extends Insect{
    
    function crawl(){
        // code for crawling
    }

    // scorpions can't fly!
    // abstract class Insect contains too much details about insects (that they can crawl and fly)
    function fly(){
        // code for flying
    }
}
```

**good (maybe...):**
```php
abstract class Insect{

    protected int $positionX, $positionY, $positionZ;
}

interface Flyable{
    function fly();
}

interface Crawlable{
    function crawl();
}

class Cockroach extends Insect implements Flyable, Crawlable{

    function crawl(){
        // code for crawling
    }

    function fly(){
        // code for flying
    }
} 

class Scorpion extends Insect implements Crawlable{

    function crawl(){
        // code for crawling
    }
}
```
