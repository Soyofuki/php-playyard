<?php include 'header.php';?>
<?php
 /*
  Objective: Get started with PHP syntax.
  Audience: Programmers with basic knowledge of OOP.
 */

 include('header.php');
 require('core.php');

 // echo 内容支持 HTML
 echo "<strong>This is a bold text.</strong>";

 $NAME = 'BREEZE';
 $name = 'breeze'; // Variable names are case-sensitive.
 // 1ABC = 25; is wrong. Variable names cannot start with numbers.
 $variable = 'name';
 echo $name;
 echo $name.$NAME; // breezeBREEZE
 echo $$variable; // breeze

 define("CASE_SENSITIVE_CONSTANT","CONSTANT_SAMPLE",true);
 define("CASE_INSENSITIVE_CONSTANT","CONSTANT_SAMPLE",false);
 define("CONSTANT","CONSTANT_SAMPLE"); // case-insensitive by default
 echo CASE_SENSITIVE_CONSTANT;

 $string1 = '9';
 $int1 = -42;
 $float1 = 42.09;
 $boolean1 = true; // Another boolean value is false.
 echo($string1+int1); // -33

 function getName() { // function names are NOT case-sensitive. starts with characters or underscore(_) only
  $name = 'Breeze';
  echo $name; // echo 'Breeze' but not 'breeze' which is defined at the beginning
  return $name;
 }

 function getGlobalName() {
  global $name;
  echo $name; // echo 'breeze' which is defined at the beginning
 } // NULL is returned

 function echoName($name='Alice') {
  echo $name;
 }

 echoName('Alice'); // Alice
 echoName(); // Alice

 $num1 =4;
 $num2 =3;
 echo $num1/$num2; // 1.33333333333
 echo $num1%$num2; // 1
 $num1++;
 --$num2; 
 $num2 += $num1; // $num2 = 7
 $t = true;
 $f = false;

 $booleanResult = $t and $f or $t xor $f && $t || !$f
 
 if ($num1 > 1 and $num1 < 1 or $num1 >= 0 xor $num2 <= 5 && $num1 != $num2 || !($num1 <> $num2)) {
 } Elseif ($num1 == $num2) { // equals to
  echo $num1++;
 } else if ($num1 === $num2) { // equals to and of the same type (identical)
  echo $num1--;
 } else if ($num1 !== $num2) { // not equals to or not of the same type (not identical)
  echo $num2++;
 } else {
  echo $num2--;
 }

 // array
 $peopleNumeric = array("Alice","Bob");
 $peopleAssociative = array("Alice"=>"17","Bob"=>"18");
 $peopleMultiDimensional = array("Alice"=>array('C','Z'),"Bob"=>array('H','W','L'));
 echo $peopleNumber[0]; // Alice
 echo $peopleAssociative['Alice']; // 17
 echo $peopleMultiDimensional['Bob'][2]; // L

 // loop
 $intForWhile = 1;
 while ($intForWhile<9) {
  echo "Current: ".$intForWhile;
  $intForWhile++;
 }

 do {
  echo "Current: ".$intForWhile;
  $intForWhile++;
 } while($intForWhile<20) 


 for ($i = 0;$i <9;$i++) {
  echo "Current: ".$i;
  if ($i==7) {
   continue;
  }   
 }

 foreach($peopleNumeric as $ $person) {
  echo $person; // Alice Bob
 }

 // switch
 switch ($peopleNumber[0]) {
  case "Alice":
   echo "Alice";
   break;
  case "bob":
  case "Bob":
   echo "Bob";
   break;
  default:
   echo "No match";
 }


 // superglobals
 echo $_SERVER['SCRIPT_NAME']; // including $GLOBALS, $_REQUEST, $_POST, $_GET, $_FILES, $_ENV, $_COOKIE, $_SESSION
 echo $_SERVER['SCRIPT_FILENAME'];
 echo $_SERVER['SCRIPT_URL'];
 echo $_SERVER['HTTP_HOST'];
 echo $_SERVER['PHP_SELF'];
 echo $_SERVER['SERVER_ADDR'];
 echo $_SERVER['SERVER_NAME'];
 echo $_SERVER['SERVER_PORT'];
 echo $_SERVER['REMOTE_ADDR'];
 echo $_SERVER['REMOTE_HOST'];
 echo $_SERVER['REMOTE_PORT'];

 $file=fopen("file.txt", "w"); // mode: r, w, a, x, r+, w+, a+, x+. a mode won't erase data
 fwrite($file,"TEXT\n"); // the original content is erased
 fclose($file); // return true or false
 $file=fopen("file.txt", "a");
 fwrite($file,"TEXT\n"); // content of the file: TEST\nTEST\n
 fclose($file);
 $content=file("file.txt"); 
 $count=count($content); // get length of the array
 foreach ($content as $line) {
  echo $line."\n";
 }

?>

<html>
 <body>
  <form action="main.php" method="post"> // data sent to main.php when the page is submitted. if action is not set, data will be sent to the file itself
   <p>Name: <input type="text" name="name" /></p>
   <p><input type="submit" name="submit" value="Submit" /></p>
  </form>
 </body>
</html>

<html>
 <body>
Welcome <?
php echo $_POST["name"]; // for post method, which is preferred for sending (big) data 
?>
 </body>
</html>

<?php
 session_start();
 $_SESSION['temp']='TEST';
 setcookie("user", "Alice", time()+(86400*7), '/'); // must be used before <html> tag
 if (isset($_COOKIE['user'])) { // check if the value has been set
  echo $_COOKIE['user']." is set in cookie";
 }
?>
<html>
 <body>
  <form action="actionGet.php" method="get">
   <p>data included in URL, e.g., actionGet.php?name=Alice</p>
   <p>Name: <input type="text" name="name" /></p>
   <p><input type="submit" name="submit" value="Submit" /></p>
  </form>
 </body>
</html>

<html>
 <body>
Welcome <?php echo $_GET['name']; ?>
<?php
 echo $_SESSION['temp']; // TEST
 session_unset();
 session_destroy();
 if (isset($_GET['name'])) { 
  $file=fopen("names.txt", "a"); 
  fwrite($file, $_GET['name']); 
  fclose($file);
  echo $_COOKIE['user']." is set in cookie";
 }
?>
 </body>
</html>
