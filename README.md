# PHP Coding Conventions

The coding conventions mentioned below were summarized from **[PHP Standard Recommendation](https://www.php-fig.org/)** for more details on any of the points below please refer to [PSR-1](https://www.php-fig.org/psr/psr-1/) and [PSR-12](https://www.php-fig.org/psr/psr-12/) documentation.


## 1. Structure of a `.php` Files

- PHP code MUST use the long `<?php ?>` tags; it MUST NOT use the other tag variations.
- The opening `<?php` tag MUST be on its own line with no other statements.
- All `.php` files MUST end with a non-blank line.
- The closing `?>` tag MUST be omitted from files containing only PHP.
- A file should declare new classes, functions, constants, etc. and cause no other side effects, or it SHOULD execute logic with side effects, but SHOULD NOT do both. "Side Effects" means execution of logic not directly related to declaring classes, functions, constants, etc. Meaning the logic that executes merely from including the file. Example .php file with side effects:
```php
<?php
// the codes below would run just by including the file on other php scripts

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: generates output
echo "<html>\n";
```
- The header of a PHP file may consist of a number of different blocks. If present, each of the blocks below MUST be separated by a single blank line, and MUST NOT contain a blank line in between. Each block MUST be in the order listed below, blocks that are not required may be omitted.
    - Opening <?php tag.
    - File-level docblock.
    - One or more declare statements.
    - The namespace declaration of the file.
    - One or more class-based use import statements.
    - One or more function-based use import statements.
    - One or more constant-based use import statements.
    - The remainder of the code in the file.

Example of a sample .php file is given below:
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

### 3.1 `if`, `elseif`, `else`
`if` block structures look like the following. Note the placement of parentheses, spaces, and braces; and that `else` and `elseif` are on the same line as the closing brace from the earlier body. Multiple Expression can be split into separate lines as shown.

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

### 3.2 `switch-case`
A `switch` structure looks like the following. Note the placement of parentheses, spaces, and braces. Indent the `case` statement once from switch, and indent `break` keyword (or other terminating keywords) at the same level as the `case` body. There MUST be a comment such as // no break when fall-through is intentional in a non-empty case body. Expressions inside the `switch` statement may be split in multiple lines as shown..
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

### 3.3 `for`
`for` statements look like the following. Note the placement of parentheses, spaces, and braces. Expressions inside the `for` statement may be split in multiple lines as shown.
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

### 3.4 `foreach`
`foreach` statements look like the following. Note the placement of parentheses, spaces, and braces.
```php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

### 3.5 `while`
`while` statements look like the following. Note the placement of parentheses, spaces, and braces. Expressions inside the `while` statement may be split in multiple lines as shown.
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

### 3.6 `do-while`
`do-while` statements are similar to `while` as follows.
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

### 3.7 `try`, `catch`, `finally`
`try-catch-finally` blocks look like the following. Note the placement of parentheses, spaces, and braces.
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


## 4. Operators

### 4.1 Unary Operators
- The increment/decrement operators MUST NOT have any space between the operator and operand.
```php
$i++;
++$j;
```
- Type casting operators MUST NOT have any space within the parentheses.
```php
$intValue = (int) $input;
```

### 4.2 Binary Operators
- All binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators MUST be preceded and followed by at least one space.
```php
if ($a === $b) {
    $foo = $bar ?? $a ?? $b;
} elseif ($a > $b) {
    $foo = $a + $b * $c;
}
```

### 4.3 Ternary Operators
- The conditional operator, also known simply as the ternary operator, MUST be preceded and followed by at least one space around both the `?` and `:` characters.
```php
$variable = $foo ? 'foo' : 'bar';
```


## 5. Function

- name should be in camelCase.
- opening and closing braces must be on their own line
- arguments with default values go last.
- when splitting arguments in multiple lines, put the first argument on a new line and keep closing paranthesis and the starting brace on the separate, same line.  
- When specifying return types, put one space after and no space before the colon. 
- Return type should be on the same line as function arguments. If arguments are on multi-line put the return type on the same line as ending parenthesis and starting brace of the function. 
- For nullable type declaration add `?` before type keyword without any space
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
- When invoking functions with multiline arguments, put the first argument on a separate line and give single indentation all arguments.
- A single argument might also be split across multiple lines (as might be the case with an anonymous function or array) as shown.
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


## 6. Class
The term "`class`" refers to all `class`, `interface`, and `trait` used in php.

- Keep classes in a `.php` file by itself, named same as the class name.
- Class names should be in `PascalCase`.
- Opening and closing brace must be on their own separate line.
- Keep `extends` and `implements` on the same line as class name. Multiple `implements` can be spread accross multiple lines, with one interface per line.  
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

### 6.1 Class properties/variables
- Property/variable names should be in `camelCase`.
- Visibility (`private`, `public`, `protected`) MUST be declared on all properties, including constants (PHP 7.1 or later).
- The `var` keyword MUST NOT be used to declare a property.
- One property declaration per statement.
- Class constants MUST be declared in all upper case with underscore separators, and include visibility keyword if supported.
```php
class ClassName
{
    public const DATE_APPROVED = '2012-06-01';
    public $foo = null;
    public static int $bar = 0;
}
```

### 6.2 Class methods/functions
- Method names must be in either `camelCase`.
- Visibility (`private`, `public`, `protected`) MUST be declared on all methods.
- No space between the opening and closing paranthesis.
- Opening and closing braces must be on their own line.
- In the argument list put one space after commas and no space before.
- Arguments with default values go last.
- When splitting arguments in multiple lines, put the first argument on a new line and keep closing paranthesis and the starting brace on the separate, same line.
- In nullable type declarations, don't put any space between question mark and type.
- Put `abstract` and `final` declarations before the visibility declaration and `static` after.
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

### 6.3 Invoking Class Methods/Functions
- No space between the invoking method or function name and the opening parenthesis or after the opening parenthesis or before the closing parenthesis. 
- Give space after commas and not before.
- Argument lists may be split across multiple lines, where each subsequent line is indented once. When doing so, put the first item on the list on the next line, and put only one argument per line. A single argument might also be split across multiple lines (as might be the case with an anonymous function or array) as shown.
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

### 6.4 Class Traits
- The `use` keyword used inside the classes to implement traits MUST be declared on the next line after the opening brace. Each `use` trait statement should be on its own line and have a blank line if there are other elements of the class afterwards.
```php
class ClassName
{
    use FirstTrait;

    private $property;
}
```
- When using the `insteadof` and `as` operators they must be used as follows taking note of indentation, spacing, and new lines.
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
}
```

### 6.5 Anonymous classes
- Anonymous classes must be declared as follows taking note of indentation, spacing, and new lines.
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

## 7. Closures
- Put a space after the `function` keyword, and a space before and after the `use` keyword.
- Put the opening brace on the same line, and the closing brace on the next line after the body.
- No space after the opening parenthesis of the argument list or variable list, and before the closing parenthesis of the argument list or variable list.
- Put space after commas inside the argument and/or variable list and not before.
- Closure arguments with default values MUST go at the end of the argument list.
- If a return type is present, it MUST follow the same rules as with normal functions and methods; if the `use` keyword is present, put the colon after the `use` list's closing parentheses with no spaces in between.
```php
$foo = function ($arg1, $arg2) {
    // body
};

$bar = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};

$baz = function ($arg1, $arg2) use ($var1, $var2): bool {
    // body
};
```

- Argument lists and variable lists may be split across multiple lines, with single indentation on each line. When doing so, put the first item in the list on the next line, and put only one argument or variable per line.
- When the ending list (arguments or variables) is split across multiple lines, put the closing parenthesis and opening brace together on their own line with one space between them.
```php
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