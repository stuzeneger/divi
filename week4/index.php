<?php 

namespace divi;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>FooBarQix and InfQixFoo Week 4 use example</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h2>FooBarQix</h2>

<?php

# test number FooBarQix
$number=384;

# create class FooBarQix
$fooBarQix = new FooBarQix();

# get result from FooBarQix
$result = $fooBarQix->getFooBarQix($number);

# then print result from FooBarQix
?>

Input number: <strong><?php echo $number;?></strong><br>
Result: <strong><?php echo $result;?></strong>

<h2>InfQixFoo</h2>

<?php

# test number InfQixFoo
$number=84;

# create class InfQixFoo
$infQixFoo = new InfQixFoo();

# get result from InfQixFoo
$result = $infQixFoo->getInfQixFoo($number);

# then print result from InfQixFoo
?>

Input number: <strong><?php echo $number;?></strong><br>
Result: <strong><?php echo $result;?></strong>



</body>
</html>