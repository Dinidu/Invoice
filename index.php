<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>invoice</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body bgcolor="#333333">



<div id="head"></div>
<div id="main">
<div id="invoice">
<form method="post" action="http://localhost/curdbee/invoices.php">
  <div>
    <p style="font-size:24px; "align="left">We reqired your informations</p>
		  <?php
		  $errors = array();
		if(count($errors) > 0){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
			echo '</ul>';
		}
		?>
  </div>
		<p align="left">Enter your curdbee Id</p>
		<p align="left">
  <input type="text" name="id" size="25" />
  .curdbee.com
		  </p>
		<p align="left">Place your token here</p>
		<p align="left">
  <input type="text" name="token" size="25" />
		  </p>
		
		<p align="left"><input type="submit" name="submit" value="submit" /></p>
      </form>
</div>
</div>

<div id="foot"></div>

</body>
</html>