<?php 

namespace divi;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>FooBarQix Week 2 use example</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h2>FooBarQix</h2>

<?php

# test number
$number=17;

# create class
$fooBarQix = new FooBarQix();

# get result
$result = $fooBarQix->getFooBarQix($number);

# then print result
?>

Input number: <strong><?php echo $number;?></strong><br>
Result: <strong><?php echo $result;?></strong>

</body>
</html>