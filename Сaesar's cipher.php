<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tarasenko, Ivashin!</title>
  </head>
  <body>
  <form method="GET" action=""> 
    <div class="form-group col-md-5">
      <label for="inputEmail4">Ваш Текст</label>
      <input type="text" name="text" class="form-control" id="inputLogl4" placeholder="Текст">
      <label for="inputEmail4">Ключ</label>
      <input type="number" name="number" class="form-control" id="inputLogl4" placeholder="Текст">

    </div>
  </div>
  <div class="col-sm-10">
        <button type="submit" name="encrypt" class="btn btn-primary">Зашифровать</button> 
		<button type="submit" name="decrypt" class="btn btn-primary">Расшифровать</button>
    </div>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$array = array(
	'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
	's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
);

if (isset($_GET["encrypt"])) {
    $word = (string)$_GET["text"];
    $encrypt = "";
    for ($i = 0; $i < strlen($word); $i++) {
        //echo $word[$i]."<br/>";
        for ($j = 0; $j < count($array); $j++) {
            if ($word[$i] == $array[$j] || $word[$i] == strtoupper($array[$j])) {
                if ($word[$i] == $array[$j]) {
                    $C = $j + (int)$_GET["number"];
                    if ($C > 25) {
                        $C = $C%26;
                    }
                    $encrypt = $encrypt.$array[$C];
                } else {
                    $C = $j + (int)$_GET["number"];
                    if ($C > 25) {
                        $C = $C%26;
                    }
                    $encrypt = $encrypt.strtoupper($array[$C]);
                }
            }
        }
    }
    echo $encrypt."<br/";
} elseif (isset($_GET["decrypt"])) {
    $word = $_GET["text"];
    $decrypt = "";
    for ($i = 0; $i < strlen($word); $i++) {
        //echo $word[$i]."<br/>";
        for ($j = 0; $j < count($array); $j++) {
            if ($word[$i] == $array[$j] || $word[$i] == strtoupper($array[$j])) {
                if ($word[$i] == $array[$j]) {
                    $C = $j - $_GET["number"];
                    if ($C < 0) {
                        $C = 26 + $C;
                    }
                    $decrypt = $decrypt.$array[$C];
                } else {
                    $C = $j - $_GET["number"];
                    if ($C < 0) {
                        $C = 26 + $C;
                    }
                    $decrypt = $decrypt.strtoupper($array[$C]);
                }
            }
        }
    }
    echo $decrypt."<br/";
}
?>