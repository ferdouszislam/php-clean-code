# PHP Coding Conventions

The coding conventions mentioned below were summarized from **[PHP Standard Recommendation](https://www.php-fig.org/)** for more details on any of the points below please refer to [PSR-1](https://www.php-fig.org/psr/psr-1/) and [PSR-12](https://www.php-fig.org/psr/psr-12/) documentation.


## Table of Contents

- [Structure of a `.php` Files](#1-structure-of-a-php-files-code-example)
- [Code Lines](#2-code-lines)
- [Control Statements](#3-control-statements) 
    - [`if-elseif-else`](#31-if-elseif-else-code-example)
    - [`switch-case`](#32-switch-case-code-example)
    - [`for`](#33-for-code-example)
    - [`foreach`](#34-foreach-code-example)
    - [`while`](#35-while-code-example)
    - [`do-while`](#36-do-while-code-example)
    - [`try-catch-finally`](#37-try-catch-finally-code-example)
- [Operators](#4-operators)
    - [Unary Operators](#41-unary-operators-code-example)
    - [Binary Operators](#42-binary-operators-code-example)
    - [Ternary Operators](#43-ternary-operators-code-example)  
- [Function](#5-function)
- [Class](#6-class-code-example)
    - [Class Properties/Variables](#61-class-propertiesvariables-code-example)
    - [Class Methods/Functions](#62-class-methodsfunctions-code-example)
    - [Invoking Class Methods/Functions](#63-invoking-class-methodsfunctions-code-example)
    - [Class Traits](#64-class-traits-code-example)
    - [Anonymous Classes](#65-anonymous-classes-code-example)
- [Closures](#7-closures-code-example)
- [Misc](#8-misc)
- [Code Examples](#9-code-examples)
    - [Code with side effects](#code-with-side-effects-go-back)
    - [Sample `.php` file structure](#sample-php-file-structure-go-back)
    - [`if-elseif-else` code](#if-elseif-else-code-go-back)
    - [`switch-case` code](#switch-case-code-go-back)
    - [`for` loops code](#for-loops-code-go-back)
    - [`foreach` loops code](#foreach-loops-code-go-back)
    - [`while` loops code](#while-loops-code-go-back)
    - [`do-while` loops code](#do-while-loops-code-go-back)
    - [`try-catch-finally` code](#try-catch-finally-code-go-back)
    - [Unary operation code](#unary-operation-code-go-back)
    - [Binary operators code](#binary-operators-code-go-back)
    - [Ternary operators code](#ternary-operators-code-go-back)
    - [Function declaration code](#function-declaration-code-go-back)
    - [Function invokation code](#function-invokation-code-go-back)
    - [Class definition code](#class-definition-code-go-back)
    - [Class properties/variables declaration code](#class-propertiesvariables-declaration-code-go-back)
    - [Class method/functions definition code](#class-methodfunctions-definition-code-go-back)
    - [Class function/method invokation](#class-functionmethod-invokation-go-back)
    - [Class traits declaration code](#class-traits-declaration-code-go-back)
    - [Anonymous class declaration code](#anonymous-class-declaration-code-go-back)
    - [Closure declaration code](#closure-declaration-code-go-back)

## 1. Structure of a `.php` Files ([code example](#sample-php-file-structure-go-back))

- PHP code MUST use the long `<?php ?>` tags; it MUST NOT use the other tag variations.
- The opening `<?php` tag MUST be on its own line with no other statements.
- All `.php` files MUST end with a non-blank line.
- The closing `?>` tag MUST be omitted from files containing only PHP.
- A file should declare new classes, functions, constants, etc. and cause no other side effects, or it SHOULD execute logic with side effects, but SHOULD NOT do both. "Side Effects" means execution of logic not directly related to declaring classes, functions, constants, etc. Meaning the logic that executes merely from including the file. Example .php file with side effects is given here: [code-with-side-effects](#code-with-side-effects-go-back).
- The header of a PHP file may consist of a number of different blocks. If present, each of the blocks below MUST be separated by a single blank line, and MUST NOT contain a blank line in between. Each block MUST be in the order listed below, blocks that are not required may be omitted. Sample of an example php file is given here: [sample-php-file-structure](#sample-php-file-structure-go-back).
    - Opening <?php tag.
    - File-level docblock.
    - One or more declare statements.
    - The namespace declaration of the file.
    - One or more class-based use import statements.
    - One or more function-based use import statements.
    - One or more constant-based use import statements.
    - The remainder of the code in the file.

## 2. Code Lines
- Lines should not be more than 80 characters. Split lines if they exceed the limit.
- No more than one statement per line.
- No trailing white spaces at end of line.
- Blank lines can be added to indicate block of code with certain purpose.
- Must use 4 space indentation and not tabs.


## 3. Control Statements
Control structures refer to `conditional` (if-else, switch-case), `loop` (for, while etc.) and `exception` (try-catch).
- Put one space after the control structure keyword.
- No space after the opening parenthesis.
- No space before the closing parenthesis.
- Put one space between the closing parenthesis and the opening brace.
- Indented the body inside control statements once.
- Put the body on the next line after the opening brace.
- Put closing brace on the next line after the body.

### 3.1 `if`, `elseif`, `else` ([code example](#if-elseif-else-code-go-back))
`if` block structures look like the following: [code example](#if-elseif-else-code-go-back). Note the placement of parentheses, spaces, and braces; and that `else` and `elseif` are on the same line as the closing brace from the earlier body. Multiple Expression can be split into separate lines as shown in the code example.


### 3.2 `switch-case` ([code example](#switch-case-code-go-back))
A `switch` structure looks like the following: [code example](#switch-case-code-go-back). Note the placement of parentheses, spaces, and braces. Indent the `case` statement once from switch, and indent `break` keyword (or other terminating keywords) at the same level as the `case` body. There MUST be a comment such as `// no break` when fall-through is intentional in a non-empty case body. Expressions inside the `switch` statement may be split in multiple lines as shown.


### 3.3 `for` ([code example](#for-loops-code-go-back))
`for` statements look like the following: [code example](#for-loops-code-go-back). Note the placement of parentheses, spaces, and braces. Expressions inside the `for` statement may be split in multiple lines as shown.


### 3.4 `foreach` ([code example](#foreach-loops-code-go-back))
`foreach` statements look like the following: [code example](#foreach-loops-code-go-back). Note the placement of parentheses, spaces, and braces.


### 3.5 `while` ([code example](#while-loops-code-go-back))
`while` statements look like the following: [code example](#while-loops-code-go-back). Note the placement of parentheses, spaces, and braces. Expressions inside the `while` statement may be split in multiple lines as shown.

### 3.6 `do-while` ([code example](#do-while-loops-code-go-back))
`do-while` statements are similar to `while` as follows: [code example](#do-while-loops-code-go-back).

### 3.7 `try`, `catch`, `finally` ([code example](#try-catch-finally-code-go-back))
`try-catch-finally` blocks look like the following: [code example](#try-catch-finally-code-go-back). Note the placement of parentheses, spaces, and braces.


## 4. Operators

### 4.1 Unary Operators ([code example](#unary-operation-code-go-back))
- The increment/decrement operators MUST NOT have any space between the operator and operand.
- Type casting operators MUST NOT have any space within the parentheses.

### 4.2 Binary Operators ([Code example](#binary-operators-code-go-back))
- All binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators MUST be preceded and followed by at least one space.

### 4.3 Ternary Operators ([Code example](#ternary-operators-code-go-back))
- The conditional operator, also known simply as the ternary operator, MUST be preceded and followed by at least one space around both the `?` and `:` characters.


## 5. Function ([Function declaration code example](#function-declaration-code-go-back), [Function invokation code example](#function-invokation-code-go-back))

- Name should be in camelCase.
- Opening and closing braces must be on their own line
- Arguments with default values go last.
- When splitting arguments in multiple lines, put the first argument on a new line and keep closing paranthesis and the starting brace on the separate, same line.  
- When specifying return types, put one space after and no space before the colon. 
- Return type should be on the same line as function arguments. If arguments are on multi-line put the return type on the same line as ending parenthesis and starting brace of the function. 
- For nullable type declaration add `?` before type keyword without any space
- When invoking functions with multiline arguments, put the first argument on a separate line and give single indentation on all arguments.
- A single argument might also be split across multiple lines (as might be the case with an anonymous function or array) as shown.


## 6. Class ([code example](#class-definition-code-go-back))
The term "`class`" refers to all `class`, `interface`, and `trait` used in php.

- Keep classes in a `.php` file by itself, named same as the class name.
- Class names should be in `PascalCase`.
- Opening and closing brace must be on their own separate line.
- Keep `extends` and `implements` on the same line as class name. Multiple `implements` can be spread accross multiple lines, with one interface per line.
- Put `abstract`, `final` keywords before and `static` keyword after visibility declaration keywords.

### 6.1 Class properties/variables ([code example](#class-propertiesvariables-declaration-code-go-back))
- Property/variable names should be in `camelCase`.
- Visibility (`private`, `public`, `protected`) MUST be declared on all properties, including constants (PHP 7.1 or later).
- The `var` keyword MUST NOT be used to declare a property.
- One property declaration per statement.
- Class constants MUST be declared in all upper case with underscore separators, and include visibility keyword if supported

### 6.2 Class methods/functions ([code example](#class-methodfunctions-definition-code-go-back))
- Method names must be in either `camelCase`.
- Visibility (`private`, `public`, `protected`) MUST be declared on all methods.
- No space between the opening and closing paranthesis.
- Opening and closing braces must be on their own line.
- In the argument list put one space after commas and no space before.
- Arguments with default values go last.
- When splitting arguments in multiple lines, put the first argument on a new line and keep closing paranthesis and the starting brace on the separate, same line.
- In nullable type declarations, don't put any space between question mark and type.
- Put `abstract` and `final` declarations before the visibility declaration and `static` after.

### 6.3 Invoking Class Methods/Functions ([code example](#class-functionmethod-invokation-go-back))
- No space between the invoking method or function name and the opening parenthesis or after the opening parenthesis or before the closing parenthesis. 
- Give space after commas and not before.
- Argument lists may be split across multiple lines, where each subsequent line is indented once. When doing so, put the first item on the list on the next line, and put only one argument per line. A single argument might also be split across multiple lines (as might be the case with an anonymous function or array) as shown.

### 6.4 Class Traits ([code example](#class-traits-declaration-code-go-back))
- The `use` keyword used inside the classes to implement traits MUST be declared on the next line after the opening brace. Each `use` trait statement should be on its own line and have a blank line if there are other elements of the class afterwards.
- When using the `insteadof` and `as` operators they must be used as shown in [code example](#class-traits-declaration-code-go-back) taking note of indentation, spacing, and new lines.

### 6.5 Anonymous classes ([code example](#anonymous-class-declaration-code-go-back))
- Anonymous classes must be declared as shown in [code example](#anonymous-class-declaration-code-go-back) taking note of indentation, spacing, and new lines.

## 7. Closures ([code example](#closure-declaration-code-go-back))
- Put a space after the `function` keyword, and a space before and after the `use` keyword.
- Put the opening brace on the same line, and the closing brace on the next line after the body.
- No space after the opening parenthesis of the argument list or variable list, and before the closing parenthesis of the argument list or variable list.
- Put space after commas inside the argument and/or variable list and not before.
- Closure arguments with default values MUST go at the end of the argument list.
- If a return type is present, it MUST follow the same rules as with normal functions and methods; if the `use` keyword is present, put the colon after the `use` list's closing parentheses with no spaces in between. 
- Argument lists and variable lists may be split across multiple lines, with single indentation on each line. When doing so, put the first item in the list on the next line, and put only one argument or variable per line.
- When the ending list (arguments or variables) is split across multiple lines, put the closing parenthesis and opening brace together on their own line with one space between them.


## 8. Misc
- Short form of type keywords MUST be used i.e. `bool` instead of `boolean`, `int` instead of `integer` etc.
- Maximum allowed depth for Compound namespaces is no more than two.
```php
use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\ClassB,
    ClassZ,
};
use Vendor\Package\SomeNamespace\AnotherNamespace\ClassA;
```
- Block declare statements are allowed and MUST be formatted as below. Note position of braces and spacing.
```php
declare(ticks=1) {
    // some code
}
```

# 9. Code Examples
### Code with side effects. ([go back](#1-structure-of-a-php-files))
```php
<?php
// the codes below would run just by including the file on other php scripts

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: generates output
echo "<html>\n";
```

### Sample `.php` File Structure ([go back](#1-structure-of-a-php-files))
```php
<?php

/**
 * This file contains an example of coding styles. (File-level docblock)
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

### `if-elseif-else` code ([go back](#31-if-elseif-else-code-example))
```php
// with expression on single line
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}

// with expression on multi-line
if (
    $expr1
    && $expr2
) {
    // if body
} elseif (
    $expr3
    && $expr4
) {
    // elseif body
}
```

### `switch-case` code ([go back](#32-switch-case-code-example))
```php
// with expressions on single line
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}

// with expressions on multi-line
switch (
    $expr1
    && $expr2
) {
    // structure body
}
```

### `for` loops code ([go back](#33-for-code-example)) 
```php
// with expressions on single line
for ($i = 0; $i < 10; $i++) {
    // for body
}

// with expressions on multi-line
for (
    $i = 0;
    $i < 10;
    $i++
) {
    // for body
}
```

### `foreach` loops code ([go back](#34-foreach-code-example))
```php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

### `while` loops code ([go back](#35-while-code-example))
```php
// with expressions on single line
while ($expr) {
    // structure body
}

// with expression on multi-line
while (
    $expr1
    && $expr2
) {
    // structure body
}
```

### `do-while` loops code ([go back](#36-do-while-code-example))
```php
// with expression on single line
do {
    // structure body;
} while ($expr);

// with expression on multi-line
do {
    // structure body;
} while (
    $expr1
    && $expr2
);
```

### `try-catch-finally` code ([go back](#37-try-catch-finally-code-example))
```php
try {
    // try body
} catch (FirstThrowableType $e) {
    // catch body
} catch (OtherThrowableType | AnotherThrowableType $e) {
    // catch body
} finally {
    // finally body
}
```

### Unary operation code ([go back](#41-unary-operators-code-example))
```php
// increment/decrement
$i++;
++$j;

// type casting
$intValue = (int) $input;
```

### Binary operators code ([go back]())
```php
if ($a === $b) {
    $foo = $bar ?? $a ?? $b;
} elseif ($a > $b) {
    $foo = $a + $b * $c;
}
```

### Ternary operators code ([go back]())
```php
$variable = $foo ? 'foo' : 'bar';
```

### Function declaration code ([go back]())
```php
// function with arguments in single line and no return type
function fooBarBaz($arg1, &$arg2, $arg3 = [])
{
    // function body
}

// function with arguments on multiple lines and no return type
function aVeryLongFunctionName(
    int $arg1,
    &$arg2,
    array $arg3 = []
) {
    // implementation
}

// function with arguments in single line and return type
function functionName(int $arg1, $arg2): string
{
    return 'foo';
}

// function with arguments in multiple line and return type
function multilineFunction(
    string $foo,
    string $bar,
    int $baz
): string {
    return 'foo';
}

// function with nullable arguments and return type
function functionWithNullableType(?string $arg1): ?string
{
    return 'foo';
}
```

### Function invokation code ([go back]())
```php
// function invocation with single line arguments
bar($arg2, $arg3);

// function invocation with multi-line arguments 
$fooBar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);

// function invocation with single argument on multiple lines
somefunction($foo, $bar, [
  // ...
], $baz);
```

### Class definition code ([go back]())
```php
// class with extends and implements on same line
class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}


// class with implements on multiple lines
class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}

// class with abstract, final, static, visibility keywords
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

### Class properties/variables declaration code ((go back)[])
```php
class ClassName
{
    public const DATE_APPROVED = '2012-06-01';
    public $foo = null;
    public static int $bar = 0;
}
```

### Class method/functions definition code ((go back)[])
```php
abstract class ClassName
{
    // method with single line arguments and no return type
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }

    // method with multi-line arguments and no return type
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }

    // method with single line arguments and return type
    public function functionName(int $arg1, $arg2): string
    {
        return 'foo';
    }

    // method with multi-line arguments and return type
    public function anotherFunction(
        string $foo,
        string $bar,
        int $baz
    ): string {
        return 'foo';
    }

    // method with nullable type declarations
    public function functionName(?string $arg1, ?int &$arg2): ?string
    {
        return 'foo';
    }

    // abstract method
    abstract protected function zim();

    // method with multiple keywords final, public, static
    final public static function bar()
    {
        // method body
    }
}
```

### Class function/method invokation ((go back)[])
```php
// invoking non-static method
$foo->barA($arg1);

// invoking static method
Foo::barB($arg2, $arg3);

// invoking method with arguements list on multi-line 
$foo->barC(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);

// invoking method with single argument on multi-line
$foo->barD($foo, $bar, [
  // ...
], $baz);
```

### Class traits declaration code ((go back)[])
```php
class Talker
{
    use A;
    use B {
        A::smallTalk insteadof B;
    }
    use C {
        B::bigTalk insteadof C;
        C::mediumTalk as FooBar;
    }

    private $property;
}
```

### Anonymous class declaration code ((go back)[])
```php
// Brace on the same line, with single implement
$instance = new class extends \Foo implements \HandleableInterface {
    // Class content
};

// Brace on the next line, with multiple implements
$instance = new class extends \Foo implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // Class content
};
```

### Closure declaration code ((go back)[])
```php
// closure with arguments on single lines
$foo = function ($arg1, $arg2) {
    // body
};

// closure with arguments, variables on single line
$bar = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};

// closure with arguments, variables, return type on single line
$baz = function ($arg1, $arg2) use ($var1, $var2): bool {
    // body
};

// closure with arguments on multiple lines and no variables
$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
   // body
};

// closure with no arguments and variables on multiple lines
$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

// closure with arguments and variables on multiple lines
$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

// closure with arguments on multiple lines and variables on single line
$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
   // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};
```
- Defining closures on function invocations
```php
$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);
```
