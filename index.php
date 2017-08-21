<?php
$conn=mysqli_connect('localhost','root','qazwsx100');
mysqli_select_db($conn, 'opentutorials');

$result=mysqli_query($conn,'SELECT * FROM topic');
// 변수에 값이 뭐가 들어가있는지 알려주는 내장 함수
// var_dump($row)
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
  </head>
  <body id="target">
    <header>
      <img src="https://cdn.pixabay.com/photo/2013/07/13/13/32/alarm-161067_960_720.png" alt="alarm">
      <h1><a href="http://localhost/index.php">JavaScript</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          // echo file_get_contents("list.txt");
          while($row=mysqli_fetch_assoc($result)){
            echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
          }
         ?>
      </ol>
    </nav>
    <div id="control">
      <input type="button" value="white" onclick="document.getElementById('target').className='white'">
      <input type="button" value="black" onclick="document.getElementById('target').className='black'">
    </div>
    <article>
      <?php
      // if(empty($_GET['id'])==false){
      //   echo file_get_contents($_GET['id'].".txt");
      // }

      if(empty($_GET['id']) === false){
      //  $sql='select * from topic where id='.$_GET['id'];
        $sql='SELECT T.id, title, name, description
          FROM topic T LEFT JOIN user U ON T.id = U.id
          WHERE T.id ='.$_GET['id'];
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        echo '<h2>'.$row['title'].'</h2>';
        echo '<p>Author: '.$row['name'].'</p>';
        echo $row['description'];
      }

       ?>
    </article>
  </body>
</html>
