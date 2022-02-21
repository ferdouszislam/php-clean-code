This readme contains parts of the root readme which were omitted after review.

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
// 'Character' class only holds information 
// and a separate 'CharacterAction' class holds implementions of action by the character

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

Open for extension, closed for modification. Make update by extending existing classes and not by modifying them by adding new instance variables and/or method.

**bad:**
```php
// everytime we implement 'insert()' for a new database,
// we need to add new method to the Database class

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
// everytime we implement 'insert()' for a new database source ,
// we just need to extend the Database class and add the implementation there.

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

All super class instances should be completely replacable by their subclasses. Generally, this can be achieved through an additional level of abstraction (addding another higher level interface/abstract class) see the traditional "Rectangle-Square" example: https://github.com/jupeter/clean-code-php#liskov-substitution-principle-lsp


### I: Interface Segragation

Keep interfaces short and meaningful, don't force the implementing classes to override irrelevant methods.

**bad:**
```php
// characters who are only supposed to farm or attack or heal would be forced to override the other methods
interface Action{
    function farm();
    function attack();
    function heal();
}
```

**good:**
```php
// character classes can implement corresponding interfaces based on their defined abbilities
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