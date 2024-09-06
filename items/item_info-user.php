<?php
        // include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        // include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
            include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
            include($_SERVER["DOCUMENT_ROOT"]. "/items/items-ops.php");
               include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
    include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");

        sessionupd();
        timeout();
        if($_SESSION["U_UTYP"]!=9)
        {
            u_validate(0);
        }
?>

<?php
bootstarp_css("test");
?>

<form method="post">
<link href="item_info-user.css" rel="stylesheet">

<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 

<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active"> <img class="d-block mx-auto img-fluid" src="" onerror=this.src='../uploads/images/default/item.png' name="imgmain" id="id_imgmain" alt="Main"></div>
        <div class="carousel-item"> <img class="d-block mx-auto img-fluid" src="" onerror=this.src='../uploads/images/default/item.png' name="imgsub1" id="id_imgsub1" alt="Showcase 1"></div>
        <div class="carousel-item"> <img class="d-block mx-auto img-fluid" src="" onerror=this.src='../uploads/images/default/item.png' name="imgsub2" id="id_imgsub2" alt="Showcase 2"></div>
        <div class="carousel-item"> <img class="d-block mx-auto img-fluid" src="" onerror=this.src='../uploads/images/default/item.png' name="imgsub3" id="id_imgsub3" alt="Showcase 3"></div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
</div>

</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3" name="txtITNME" id="id_txtITNME">Original Version of Some product name</h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span class="currency">LK Rs.</span><span class="num" name="txtITPRICE" id="id_txtITPRICE">1299</span>
	</span> 
	<span>/per item</span> 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p name="txtITDEC" id="id_txtITDEC">Here goes description consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco </p></dd>
</dl>
<dl class="param param-feature">
  <dt>Product Code</dt>
  <dd name="txtID" id="id_txtID">12345611</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Manufacture</dt>
  <dd name="txtMNUNME" id="id_txtMNUNME">Black and white</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Brand</dt>
  <dd name="txtSPBND" id="id_txtSPBND">Russia, USA, and Europe</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>In Stock</dt>
  <dd name="txtITQTY" id="id_txtITQTY"></dd>
</dl>  <!-- item-property-hor .// -->
<hr>
	<div class="row">
		<div class="col-sm-5">
			<dl class="param param-inline">
			  <dt>Quantity: </dt>
			  <dd>
              <input type="button" id="decreaseBtn" class="btn btn-outline-info" value="-">
              <label name="lblcountview" id="id_lblcountview" class="badge badge-dark">0</label>
              <input type="hidden" name="lblcountviewh" id="id_lblcountviewh" value="0">
              <input type="button" id="increaseBtn" class="btn btn-outline-info" value="+">
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
	<hr>
	<button type="submit" class="btn btn-lg btn-outline-primary text-uppercase" name="butADDC" id="id_butADDC"> <i class="fas fa-shopping-cart"></i> Add to cart </a></button>
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div>
</form>


<!-- <form method="POST">
    <p name="lblMSG" id="id_lblMSG"></p>

    <p>Item Name: <input type="text" name="txtITNME" id="id_txtITNME"></p>

    <p>Description: <input type="text" name="txtITDEC" id="id_txtITDEC"></p>

    <p>Qty: <input type="text" name="txtITQTY1" id="id_txtITQTY1"></p>

    <p>Price: <input type="text" name="txtITPRICE" id="id_txtITPRICE"></p>

    <div id="id_divMANUFACT">
        <h2>Manufacture</h2>
        <p>Name: <input type="text" name="txtMNUNME" id="id_txtMNUNME"></p>
        <p>Address: <input type="text" name="txtMNUADD" id="id_txtMNUADD"></p>
        <p>E-mail: <input type="text" name="txtMNUEMAIL" id="id_txtMNUEMAIL"></p>
        <p>Telephone Number: <input type="text" name="txtMNUTP" id="id_txtMNUTP"></p>
    </div> 

    <div id="id_divSPEC">
        <h2>Specifications</h2>
        <p>Brand: <input type="text" name="txtSPBND" id="id_txtSPBND"></p>
        <p>Category: <input type="text" name="txtSPCAT" id="id_txtSPCAT"></p>
        <p>Country: <input type="text" name="txtSPCNT" id="id_txtSPCNT"></p>
        <p>Age: <input type="text" name="txtSPAG" id="id_txtSPAG"></p>
        <p>Weight: <input type="text" name="txtSPWIGHT" id="id_txtSPWIGHT"></p>
        <p>Depth: <input type="text" name="txtSPDEP" id="id_txtSPDEP"></p>
        <p>Width: <input type="text" name="txtSPWIDTH" id="id_txtSPWIDTH"></p>
        <p>Height: <input type="text" name="txtSPHEIGHT" id="id_txtSPHEIGHT"></p>        
    </div>
</form> -->


<?php
bootstarp_js("test");
?>

<?php
        $it_id= $_GET["it"];
        item_info_user($it_id);
        if(isset($_POST['butADDC']))
        {
          if($_SESSION["U_UTYP"]!=9)
          {
                $qty = $_POST['lblcountviewh'];
                if(add_cart($it_id,$_SESSION["U_UNME"],$qty))
                {
                   msg_p("/user/","Item Added to The Cart", "", 1);
                }
                else
                {
                    msg_P("/user/","Adding to The Cart Failed", "", 2);
                }
          }
          else
          {
              route("/user/login-ad.php");
          }

        }
?>

<script src="item_info-user.js"></script>
