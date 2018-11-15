<!DOCTYPE>
<html>
    
     <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css" />

          <title>Friend book</title>

     </head>
     <body>
          <h1>Friend book </h1>
          <form action="index.php" method="post">
          Name: <input type="text" name="name">
          <input type="submit" value="send">


          <h2>My best friends:</h2>
          <input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>">
          <input type="submit" value="filter">
          </form>

          <?php
           $filename = 'friend.txt';

          

           $name =$_POST['name'];
           $file = fopen( $filename, "a" );
           if("$name"!=NULL){
           	fwrite( $file, "$name\n" );
           }
           
            
           $file = fopen( $filename, "r" );
           $nameFilter =$_POST['nameFilter'];
           $file2 = fopen( $filename, "r" );
           while (!feof($file)) {
           	if ($nameFilter!=NULL){
                 if(strstr(fgets($file),"$nameFilter",false)!=NULL){
                 	$ligne=fgets($file2)."<br/>";
                 	echo $ligne;

                 }
                 else{
                 	fgets($file2);
                 }
           	}
           	else{
           		 echo fgets($file)."<br/>";
           	}
           }

          ?>
          <h3>Footer</h3>
     </body>
</html>