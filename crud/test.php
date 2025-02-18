<?php 
#Title
echo "Hello <br>";

$num = 1;
$num1 = 2;

print $num ."+" .$num1;
echo "<br>";

$a="clue";
$a .="get";
$aa= (array) $a;
echo "$a";
$THIs = "gg";
function t() {
    static $c=0;
    $c++;
    echo $c;
}

t();
t();
t();
t();
// sprintf($a);
// printf($aa);
echo "<br>";
$total = "25 students";
$more = 10;
$tt = $total + $more;
echo "\$tt";
echo "<br>";
$foo = "bob";
$bar = &$foo;
$bar = "My Name is $bar";
// echo $bar;
echo $foo;
$f=5;
$h=5;
echo ($f===$h);
?>