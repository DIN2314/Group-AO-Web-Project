<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        // include($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        sessionupd();
        timeout();
        if($_SESSION["U_UTYP"]!=9)
        {
            u_validate(0);
        }
?>

<!doctype html>
<title>Site Maintenance</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<style>
<!doctype html>
<title>Welcome</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<style>
  body { text-align: center; padding: 0; background: #3dc2ca; color: #fff; font-family: Open Sans; }
  h1 { font-size: 50px; font-weight: 100; text-align: center;}
  body { font-family: Open Sans; font-weight: 100; font-size: 20px; color: #fff; text-align: center; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center;}
  article { display: block; width: 700px; padding: 50px; margin: 0 auto; }
  a { color: #fff; font-weight: bold;}
  a:hover { text-decoration: none; }
</style>

<article>

    <h1>Welcome <span name = "titNAME" id="id_titNAME"></span></h1>
    <div>
        <h3>Please Wait</h3>
        <p></p>
        <p>&mdash; The Group AO</p>
    </div>
</article>

<?php
    route("/items/items_list-user_main.php");
?>


