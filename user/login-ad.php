

<!doctype html>
<title>Site Maintenance</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<style>
  html, body { padding: 0; margin: 0; width: 100%; height: 100%; }
  * {box-sizing: border-box;}
  body { text-align: center; padding: 0; background: #3dc2ca; color: #fff; font-family: Open Sans; }
  h1 { font-size: 50px; font-weight: 100; text-align: center;}
  body { font-family: Open Sans; font-weight: 100; font-size: 20px; color: #fff; text-align: center; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center;}
  article { display: block; width: 700px; padding: 50px; margin: 0 auto; }
  a { color: #fff; font-weight: bold;}
  a:hover { text-decoration: none; }
  svg { width: 75px; margin-top: 1em; }
</style>


<article>
<article>
     <h1>Login For see</br> This Feature.</h1>
</article>

</br>
<form method="POST">
            <input type= "Submit" Value = "Login" name = "boutLG" id="id_boutLG">
        </form>
    </div>
</article>

<?php

    if(array_diff_key($_POST,["boutLG"]))
    {
      echo "<script>window.open('/Login/');</script>";
    }
?>