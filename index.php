<?php
/*
 * calculator.php
 * 
 * Copyright 2022 dell <dell@ABE>
 * 
 * 
 */
 
 function evaluale_expression($expr) {
 	$f1 = array('abs', 'acos', 'acosh', 'asin', 'asinh', 'atn', 'atan2', 'atanh', 'cos', 'cosh', 'exp', 'expm1', 'log', 'log10', 'log1p', 'pi', 'pow', 'sin', 'sinh', 'sqrt', 'tan', 'tanh');
 	$f2 = array('!01!', '!02!', '!03!', '!04!', '!05!', '!06!', '!07!', '!08!', '!09!', '!10!', '!11!', '!12!', '!13!', '!14!', '!15!', '!16!', '!17!', '!18!', '!19!', '!20!', '!21!', '!22!');
 	
 	$expr = strtolower($expr);
 	$expr = str_replace($f1, $f2, $expr);
 	$expr = preg_replace("/[^\d\+\*\/\-\.(),! ]/", '', $expr);
 	$expr = str_replace($f2, $f1, $expr);
 	# echo "$expr<br />\n";
 	return eval("return $expr;");
 }
 $message = "NULL";
 if(isset($_POST['calculate']) AND $_POST['calculate'] == 'calculate'){
 	$user_input = $_POST['user_input'];
 	
 	if($user_input == '') {
 		$message = "Enter expression first!";
 	}else {
 		$result = evaluale_expression($user_input);
 	}
 }
 

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Calculator</title>
	<meta name="application-name" content="Calculator"/>
	<meta name="author" content="Abebe Biru"/>
	<meta name="description" content="This app is built just to help you on most of the calculations you need to do."/>
	<meta name="keywords" content="Afaan Oromoo, Oromoo, Calculator"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
	<link rel="stylesheet" href="css/main.css"/>
	<style>
	@font-face {
		font-family: click;
		src: url(css/digital-7.ttf);
	}
	.number-list{
		text-align: center;
		margin: 1em auto;
	}
    .array {
        background-color: #005a40;
        width: 60px;
        height: 60px;
        line-height: 60px;
        text-align: center;
        margin: 3px;
        float: left;
        transition: 1s;
        outline: 1px solid #fff;
        color: #ffffff;
        font-family: clock;
        font-size: 2em;
        box-shadow: 1px 2px 3px #000;
    }

    .clear {
        clear: both;
    }
    </style>
</head>

<body>
	<div class="form-container">
	<h1>Calculator</h1>
		<form method="post">
			<input type="text" name="user_input" id="user_input" placeholder="Type expression here(e.g. pi() * pow(4, 2))" value="<?php if(isset($user_input)) echo($user_input) ?>"/>
			<?php
			if($message == "NULL"){
				?>
				<label for="user_input" style="visibility: hidden;"><?=$message ?></label>
				<?php
			}else {
				?>
				<label for="user_input" style="visibility: visible; color: #c50000; font-weight: bold;"><?=$message ?></label>
				<?php
			}
			?>
			<input type="text" name="result" id="result" placeholder="Not calculated yet" value="<?php if(isset($result)) echo $result; ?>" disabled="on"/>
			   <div class="number-list">
			    <?php
    $integers = [
        [7, 8, 9, "÷"],
        [4, 5, 6, "×"],
        [1, 2, 3, "-"],
        [0, ".", "=","+"]
        ];
    foreach ($integers as $integer) : ?>
    <?php foreach ($integer as $i) : ?>
    <div class="array"><?= $i; ?></div>
    <?php endforeach; ?>
    <div class="clear"></div>
    <?php endforeach; ?>
			   </div>
		    <button type="submit" name="calculate" value="calculate">Calculate</button>
	    </form>
	</div>
</body>

</html>