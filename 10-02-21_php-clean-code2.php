<?php
    
    // 1. Avoid Type Checking

    // 1.1 specify function arguments type and/or return type if type checking is required


    // bad
    function add($x, $y) {

        if (! is_numeric($x) || ! is_numeric($y)){
            throw new Exception('Must be a Number');
        }

        return $x + $y;
    }

    // good
    function addClean(int $x, int $y): int {
        return $x + $y;
    }



    // 1.2 use polymorphism
    
    // bad
    class Authentication{
        
        public $auth_type;

        public function __construct($auth_type){
            $this->auth_type = $auth_type;
        }

        public function authenticateGoogle() {
            // logic for google authentication
            return true;
        }

        public function authenticateGithub() {
            // logic for google authentication
            return true;
        }
    }

    $user_authenticator = new Authentication('github');

    switch($user_authenticator->auth_type){
        case 'google':
            $user_authenticator->authenticateGoogle();
            break;

        case 'github':
            $user_authenticator->authenticateGithub();
            break;
    
        default:
            throw new Exception('unknon auth type='.$user_authenticator->auth_type);
    }


    // good
    abstract class AuthenticationClean{
        // implementation
        abstract function authenticate();
    }

    class GoogleAuthentication extends AuthenticationClean{
        public function authenticate(){
            return true;
        }
    }

    class GithubAuthentication extends AuthenticationClean{
        public function authenticate(){
            return true;
        }
    }

    $user_auth = new GoogleAuthentication();
    $user_auth->authenticate();



    // 2. Classes

    // 2.1 always enforce encapsulation

    // bad
    class Result{
        public $mark;
    }
    $result = new Result();
    $result->mark -= 10; // penalize 10 marks for cheating

    
    // good
    class ResultClean{

        private static $MAX_MARK = 100;
        private static $MIN_MARK = 0;

        private $mark;

        public function __construct($mark){
            $this->mark = $mark;
        }
        public function penalize($penalizeMarks){
            $this->mark-=$penalizeMarks;
            $this->mark = max(ResultClean::$MIN_MARK, $this->mark);
        }
        public function reward($bonusMarks){
            $this->mark+=$bonusMarks;
            $this->mark = min(ResultClean::$MAX_MARK, $this->mark);
        }
    }
    $result = new ResultClean(85);
    $result->penalize(5);




    // 3. SOLID

    // 3.1 Single Responsibility

    // bad
    // Character class stores information of a character and also codes regarding actions made by the character
    class GameCharacter{
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
        
        public function fly(){
            $this->positionX+=5;
            $this->positionY+=5;
        }

        public function sleep(){
            $this->healthPoints+=100.00;
        }
    } 


    // good
    // create separate class for storing character information and character actions
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



    // 3.2 Open-Closed Principal

    // implement classes in such a way through inheritance that any update on the system 
    // would require only extending base classes and not modifying codes inside existing classes 


    // bad
    class Database{

        public function insertToFirebase(){
            // implementation
        }
        
        public function insertToMysql(){
            // implementation
        }
    }

    // good
    abstract class DatabaseClean{

        abstract function insert();
    }

    class FirebaseDatabase extends DatabaseClean{
        // overriden method
        function insert(){
            // implementation
        }
    }

    class MySqlDatabase extends DatabaseClean{
        // overriden method
        function insert(){
            // implementation
        }
    }


    // 3.3 Liskov Substitution Principal
    // all super class instances should be completely replacable by their subclasses
    // can be acquired through an additional level of abstraction (addding another higher level interface/abstract class)
    // see the traditional "Rectangle-Square" example: https://github.com/jupeter/clean-code-php#liskov-substitution-principle-lsp



    // 3.4 Interface Segragation
    // keep interfaces short and meaningful, don't force the implementing classes to override irrelevant methods


    // bad
    // character's who are only supposed to farm or attack or heal are forced to override the other methods
    interface Action{
        function farm();
        function attack();
        function heal();
    }


    // good
    // character's who are only supposed to farm or attack or heal are forced to override the other methods
    interface VillagerAction{
        function farm();
    }
    interface AttackerAction{
        function attack();
    }
    interface HealerAction{
        function heal();
    }



    // 3.5 Dependency Injection
    /**
     * (i) high-level modules should not depend on low-level modules. Both should depend on abstractions.
     * (ii) abstractions should not depend upon details. Details should depend on abstractions.
     * 
     * the coding example below only contains demo for point (ii)
     * 
     */

    // bad
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


    // good (maybe...)
    abstract class InsectClean{

        protected int $positionX, $positionY, $positionZ;
    }

    interface Flyable{
        function fly();
    }

    interface Crawlable{
        function crawl();
    }

    class CockroachClean extends InsectClean implements Flyable, Crawlable{

        function crawl(){
            // code for crawling
        }

        function fly(){
            // code for flying
        }
    } 

    class ScorpionClean extends InsectClean implements Crawlable{

        function crawl(){
            // code for crawling
        }
    } 


?>