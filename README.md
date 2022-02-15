# practice-php-clean-code
Documentation on clean coding and demonstration of studied clean coding principals with PHP. 

The content of this repo were summarized from sources: 
- https://medium.com/swlh/the-must-know-clean-code-principles-1371a14a2e75 
- https://github.com/jupeter/clean-code-php.


## 1. General Rules

DRY: Don't Repeat Yourself - write repeated codes inside functions.  
KISS: Keep It Simple Stupid - go for the simplest solution first (try linear search before binary search).  
Boy Scout Rule: Leave the campground cleaner than you found it. (no matter who made the mess, tidy up as much as you can)


**1.1 Variable Naming Rules:**
- Use nouns to name variables.
- descriptive, easy to search, easy to pronounce. 
- don't add type information, avoid encodings.
- replace magic numbers with constants.


**1.2 Comments:**
- The code is the best documentation.
- Use only to clarify code.

**1.3 Functions:**
- Use verbs to name functions.
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
- TEST DRIVEN DEVELOPMENT - write tests first ->  code fails the tests -> write code to satisfy the tests -> repeat



## 2. Variables

### Naming
- Can use camelCase, StudlyCaps/PascalCase or, snake_case for nming, but consistently use only one.
- Name constant variables in all capital.

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

### General Rules
- name should be in camelCase.
- opening and closing braces must be on their own line
- arguments with default values go last.
```php
function fooBarBaz($arg1, &$arg2, $arg3 = [])
{
    // function body
}
```
- when splitting arguments in multiple lines, put the first argument on a new line and keep closing paranthesis and the starting brace on the separate, same line.
```php
function aVeryLongFunctionName(
    int $arg1,
    &$arg2,
    array $arg3 = []
) {
    // implementation
}
```  
- When specifying return types, put one space after and no space before the colon. 
- Return type should be on the same line as function arguments. If arguments are on multi-line put the return type on the same line as ending parenthesis and starting brace of the function. 
- For nullable type declaration add `?` before type keyword without any space
```php
function functionName(int $arg1, $arg2): string
{
    return 'foo';
}

function multilineFunction(
    string $foo,
    string $bar,
    int $baz
): string {
    return 'foo';
}

function functionWithNullableType(?string $arg1): ?string
{
    return 'foo';
}
```
- When invoking functions with multiline arguments, put the first argument on a separate line and give single indentation all arguments.
```php
$fooBar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

### 3.1 Return as early as possible.

**bad:**
```php
function fooFunc(int $fooVar) : int {

    $returnValue = null;

    if($fooVar%2 == 0) $returnValue = 0;

    else{
        
	// very long and complex code...
	
        $returnValue = 100;
    }

    return $returnValue;
}
```

**good:**
```php
function fooFunc(int $fooVar) : int {

    $returnValue = null;

    if($fooVar%2 == 0) return 0;

    // very long and complex code...    
    $returnValue = 100;

    return $returnValue;
}
```


### 3.2 Avoid deep nesting.

**bad:**
```php
function isWeekend($day, $week){
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
function isWeekend($day, $week){
// weekend is Sundays every week and Saturdays on every alternating week

    $weekendDays = ['Sunday'];
    $alternateWeekendDays = ['Sunday', 'Saturday'];

    if($week%2==0) return in_array($day, $weekendDays);
    else return in_array($day, $alternateWeekendDays);
}
```


### 3.4 Avoid passing flags as function arguments, functions should do only one thing.

**bad:**
```php
function processYear(int $year, bool $isYearLeap) {

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
function processLeapYear(int $year) {
    // process leap year
}

function processNotLeapYear(int $year) {
    // process not leap year
}
```


### 3.5 Do only ONE thing inside a function.

**bad:**
```php
// the functions 'addAndMultiply()' and 'substractAndDivide()' were too much complicated 
// to forcefully fit the implementation of 'applyFormula()' functions

function addAndMultiply(int $x, int $y, int $z) : int {

    $result = $x + $y;
    $result = $result*$z;
    return $result;
}

function substractAndDivide(int $x, int $y, int $z) : int {

    $result = $x - $y;
    $result = $result/$z;
    return $result;
}

function applyFormula(int $x, int $y, int $z) : int {
// apply formula (x+y)*z + (x-y)/z
    
    return addAndMultiply($x, $y, $z) + substractAndDivide($x, $y, $z);
}
```

**good:**
```php
// instead create generalized functions to do one task only.

function add(int $x, int $y) : int {
    return $x+$y;
}
function substract(int $x, int $y) : int {
    return $x-$y;
}
function multiply(int $x, int $y) : int {
    return $x*$y;
}
function divide(int $x, int $y) : int {
    return $x/$y;
}

function applyFormula(int $x, int $y, int $z) : int {
// apply formula (x+y)*z + (x-y)/z

        $sumPart1 = multiply(add($x, $y), $z); // calculate (x+y)*z
        $sumPart2 = divide(substract($x, $y), $z); // calculate (x+y)*z
        $result = add($sumPart1, $sumPart2);
        
        return $result;
}
```


### 3.6 Specify function arguments variable types and/or return type. (when not defining generic functions that are intended to be type independent)

**bad:**
```php
function addNumbers($x, $y) : int {

    if (! is_numeric($x) || ! is_numeric($y)){
        throw new Exception('Must be a Number');
    }

    return $x + $y;
}
```

**good:**
```php
function addNumbers(int $x, int $y): int {
    return $x + $y;
}
```



## 4. Classes / OOP: Object Oriented Programming

### 4.1 Naming
- Class names should be in 'StudlyCaps/PascalCase'.
- Property/variable names can be in either camelCase, StudlyCaps/PascalCase or, snake_case. Constant variable names should be in all caps.
- Method names can be in either camelCase, StudlyCaps/PascalCase or, snake_case.
- Opening and closing brace must be on their own separate line.

Sample Class:

```php
class Foo
{
    public const $FOO_CONST = 1000;
    
    private $fooVar;

    public function __construct($fooVar) {
        $this->fooVar = $fooVar;
    }

    public getFooVar() {
        return $this->fooVar;
    }

    public setFooVar($fooVar) {
        $this->fooVar = $fooVar;
    }
}
```

- Keep `extends` and `implements` on the same line as class name. Multiple `implements` can be spread accross multiple lines, with one interface per line.  
```php
class FooClass extends FooParent implements
    FooInterface1
    FooInterface2
{
    // implementation
}
```
- Put `abstract`, `final` keywords before and `static` keyword after visibility declaration keywords.
```php
abstract class ClassName
{
    protected static $foo;

    abstract protected function bar();

    final public static function baz()
    {
        // method body
    }
}
```

### 4.2 Keep classes in a php file by itself, named same as the class name.

### 4.4 Properties/Class Variables 
- Always declare visibility: `public`, `private`, `protected`.
- One property declaration per line.
```php
class FooClass
{
    public const $FOO_BAR = 1000;    

    public $foo = null;
    public static int $bar = 0;
}
```

### 4.5 Methods/Class Functions 
- Always declare visibility: `public`, `private` or, `protected`).
- Opening and closing braces go on their separate single lines.
- No space after opening or before closing braces.
```php
class ClassName
{
    public function fooBar($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

### 4.3 Always enforce encapsulation

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



# 5. Misc


### 5.1 Use only either of these two tags: `<?php ?>` or `<?= ?>`. But be consistent.

### 5.2 A file should declare new classes, functions, constants, etc. and cause no other side effects, or it SHOULD execute logic with side effects, but SHOULD NOT do both. 

"Side Effects" means execution of logic not directly related to declaring classes, functions, constants, etc. Meaning the logic that executes merely from including the file.  

**bad:**
```php
// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "file.php";

// side effect: generates output
echo "<html>\n";

// function declaration
function foo() {
    // body
}
```

**good:**  
Stored inside 'declarations.php'
```php
function foo() {
    // body
}
```

Stored inside 'side_effects.php'
```php
// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "file.php";

// side effect: generates output
echo "<html>\n";
```

### 5.3 Files 
- All PHP files MUST end with a non-blank line. 
- The closing `?>` tag MUST be omitted from files containing only PHP.


### 5.4 Lines
- Lines should not be more than 80 characters. Split lines if they exceed the limit.
- No more than one statement per line.
- No trailing white spaces at end of line.
- Blank lines can be added to indicate block of code with certain purpose.
- Must use 4 space indentation and not tabs.

### 5.5 Structure of a .php file
The below items should be in sequence inside php code files.
- Opening <?php tag.
- File-level docblock.
- One or more declare statements.
- The namespace declaration of the file.
- One or more class-based use import statements.
- One or more function-based use import statements.
- One or more constant-based use import statements.
- The remainder of the code in the file.

**Sample PHP code file:**
```php
<?php

/**
 * This file contains an example of coding styles.
 */

declare(strict_types=1);

namespace Vendor\Package;

use Vendor\Package\{ClassA as A, ClassB, ClassC as C};
use Vendor\Package\SomeNamespace\ClassD as D;
use Vendor\Package\AnotherNamespace\ClassE as E;

use function Vendor\Package\{functionA, functionB, functionC};
use function Another\Vendor\functionD;

use const Vendor\Package\{CONSTANT_A, CONSTANT_B, CONSTANT_C};
use const Another\Vendor\CONSTANT_D;

/**
 * FooBar is an example class.
 */
class FooBar
{
    // ... additional PHP code ...
}
```

### Maximum allowed depth for Compound namespaces is no more than two.

**bad:**
```php
use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\AnotherNamespace\ClassA,
    SubnamespaceOne\ClassB,
    ClassZ,
};
```

**good:**
```php
use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\ClassB,
    ClassZ,
};
use Vendor\Package\SomeNamespace\AnotherNamespace\ClassA;
```