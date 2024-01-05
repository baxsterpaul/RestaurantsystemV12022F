<?php

$arrayName = array('test1' => '1', 'test2' => '2', 'test3' => '3', 'test4' => '4');

foreach ($arrayName as $key => $value) {
  $$key = $value;
  echo '
  <form action="" method="post" enctype="multipart/form-data">
    <input type="submit" name="forminput" Value ="'.$$key.'">
  </form>
  ';
}

foreach ($_POST as $key => $value) {
$key = strip_tags($key); // to prevent scripts being injected into the page
$value = strip_tags($value);

  echo $key . ' ' . $value;
}

 ?>