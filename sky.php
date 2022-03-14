<?php

class AssignmentRecord {
    private $studentNum ;
    private $mark1, $mark2, $mark3;
    const ass1 = 10;
    const ass2 = 10;
    const ass3 = 80;

    public function __construct($studentNum,$mark1,$mark2,$mark3){
        $this->studentName = $studentNum;
        $this->mark1 = $mark1;
        $this->mark2 = $mark2;
        $this->mark3 = $mark3;

        @$semMark = ($mark1 * ass1) + ($mark2 * ass2) + ($mark3 * ass3);
    }

    public function getStudentNum(){
        return $this->studentNum;
    }
    public function getMark1(){
        return $this->studentNum;
    }
    public function getMark2(){
        return $this->studentNum;
    }
    public function getMark3(){
        return $this->studentNum;
    }

    public function toString($semMark,$studentNum,$mark1,$mark2,$mark3){
         $value = $studentNum . ", " . $mark1 . ", " . $mark2 . ", " . $mark3;
         return $value;
    }
}


$myShit = new assignmentRecord(63989948,70,80,50);
echo $myShit->toString($myShit,63989948,70,80,50);

































































































































// function calculateSemMark($mark1,$mark2,$mark3){
//     $semMark = ($mark1 * .10) + ($mark2 * .10) + ($mark3 * .80);
//     if($semMark < 50){
//         $message = "Below average <br>";
//         echo $message;
//     } elseif($semMark > 50 && $semMark < 75){
//         $message = "Above average <br>";
//         echo $message;
//     } else {
//         $message = "Exceptional <br>";
//         echo $message;
//     }
    
// }

// calculateSemMark(90,97,47);
// calculateSemMark(78,99,99);
// calculateSemMark(20,39,59);



// echo "ICT3612 Exam 2018<br><br>";
// echo "Question 1<br><br>";
// function simple_function($requir, $sjongo = 'Hello'){
//     $write = $sjongo . " " . $requir;
//     echo $write;
// }
//  echo simple_function('World <br><br>');

//  echo "Question 2<br>";
//  echo "2.1<br>";
// function subtract($first_number, $second_number){ 
//     $result = $first_number - $second_number; 
//     return $result; 
// } 

// $first_number = 14;
// $second_number = 90;
// echo "The result of the calculation is" . subtract($first_number,$second_number) . "<br><br>";

// echo "2.2<br>";
// function dynamic_args() { 
//     for($i = 0 ; $i < func_num_args(); $i++) { 
//         echo "Argument $i = ".func_get_arg($i)."<br />"; 
//     }
// }
// echo "a) <br>";
// dynamic_args('a','b');
// echo "<br>";
// echo "b) <br>";
// dynamic_args('a','b','c','d','e');
// echo "<br><br><br>";
// echo "Question 3 <br> 3.1 <br>";

// // class SIMPLE {
    
// //     public function show_name($name){
// //         echo "Good Bye " . $name . "<br><br>";

// //     }
     
// // }

// // $sure = new SIMPLE();
// // $sure->show_name('Felicia');

// echo "3.2 <br>";

// class SIMPLE {
//     public $name;
//     public $surname;
    
//     public function __construct($name, $surname){
//         $this->name = $name;
//         $this->surname = $surname;
//     }

//     public function getName(){
//         return $this->name;
//     }
//     public function setName($value){
//         $this->name = $value;
//     }

//     public function getSurname(){
//         return $this->surname;
//     }
//     public function setSurname($value){
//         $this->surname = $value;
//     }

//     public function set_user($user){
//         $this->user = $user;
//         return $user;
//     }
// }

// $azishe = new SIMPLE('Felicia','Ngubenzo');
// echo "Ekse " . $azishe->getName() . " " . $azishe->getSurname() . "!<br><br><br>";


// class MEMBER extends SIMPLE {
//     private $user_type;

//     public function __construct($name, $surname, $user_type){
//         $this->user_type = $user_type;
//         parent::__construct($name,$surname);
//     }
//     public function getUserType(){
//         return $this->user_type;
//     }
//     public function setUserType($value){
//         $this->user_type = $value;
//     }
// }

// @$myReg = new MEMBER(f3lng0Beni, ' ', 'Member');
// echo "Hello " . $myReg->getUserType() . " " . $myReg->getName() . " " . $myReg->getSurname() . "! <br>"; 


// class Administrator extends SIMPLE {

//     public function sayHello(){
//         return "Hello administrator, " . $this->getName() . "!";
//     }

// }
// $obj = new Administrator('','');
// $obj->setName("Ntabiseng1738");
// echo $obj->sayHello();


// function assignment_marks($x){
//     $mark = func_num_args();
//     $total = 76;
//     if($total < 50){
//         echo "Below average";
//     } if ($total > 50 && $total < 75) {
//         echo "Above average";
//       } if ($total > 75) {
//         echo "Exceptional";
//       }
    
    
// }
// $semesterMark = assignment_marks(70,80,400);




// class POI{ 
 
//     private $place, $date_of_record; 
              
//     public function __construct($place, $date_of_record){
//         $this->place = $place;    
//         $this->date_of_record = $date_of_record;     
//     } 
            
//     public function getPlace(){
//            return $this->place; 
//     }          
//     function getDateOfRecord(){
//         return $this->date_of_record;    
//     }                  
//     function toString(){     
//         $date = $this->date_of_record->format('Y/m/d');   
//         return $date;     
//     } 
// } 

// $weather = new POI('Gordons Bay','2019/03/01');
// echo $weather->getPlace();
// echo $weather->getDateOfRecord();




// $pattern = '/^[abc]{1,3}\d*$/';
// $strol = "ccc";
// $match = preg_match($pattern,$strol);
// echo $match;

// function calculate(){
//     $num = func_num_args();
//     $result = 0;
//     for($i = 0; $i < $num; $i++){
//         $result += func_get_arg($i);
//     }
//     return $result * 2;
// }
// echo calculate(4,2,1);

// function calculate($arr, &$num){
//     $result = 0;
//     foreach($arr as $value){
//         $result += $value;
//     }
//     $num = $result * 2;
// }
// $arr = array(1,2,3,4,5);
// $num = 0;
// calculate($arr,$num);
// echo $num;

// class Registration {
//     const username = 5;
//     const password = 8;

//     public function getUsername(){
//         return $this->username;
//     }
//     public function setUsername($value){
//         $this->username = $value;
//     }

//     public function getPassword(){
//         return $this->password;
//     }
//     public function setPassword($value){
//         $this->password = $value;
//     }

// }

// $myReg = new Registration();

// echo "The minimum required username length is " . $myReg::username . "</br>";
// echo "The minimum required password length is " . $myReg::password ;

// function my_func(){
//     $numbers = func_get_args();
//     $total = 0;
//     foreach($numbers as $number){
//         $total = $number;
//     }
//     return $total;
// }

// $results = my_func(1,2,3);

// echo "There were " . $results . " numbers passed<br>" ;
// echo "Number " . $results . "<br>";
// echo "Number " . $results . "<br>";
// echo "Number " . $results . "<br>";

// function calcIt($first_number, $second_number, $third_number){
//     $total_sum = $first_number + $second_number - $third_number;
//     return $total_sum;
// }
// $first_number = 12;
// $second_number = 8;
// $third_number = 4;
// $result = calcIt($first_number, $second_number, $third_number);
// echo "The result of adding the values ". $first_number. ", " . $second_number . " and " . $third_number . " is " . $result;



// function studentName($name = "Mpo"){
//     return "The student's name is " . $name . "";
// }
// $name = "";
// echo studentName($name);
?>