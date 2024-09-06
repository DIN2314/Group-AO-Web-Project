<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>

<?php

    function bootstarp_css($tile)
    {
        echo "
        <head>
        <!-- Basic -->
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <!-- Mobile Metas -->
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <!-- Site Metas -->
        <meta name='keywords' content=''>
        <meta name='description' content=''>
        <meta name='author' content=''>
        <link rel='LOGO' href='/style/images/images/web_logo_1-removebg-preview.png' type='image/png'>


        <title> TOY MART </title>

        <!-- bootstrap core css -->
        <link rel='stylesheet' type='text/css' href='/style/css/bootstrap.css'>

        <!-- fonts style -->
        <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap' rel='stylesheet'>

        <!--owl slider stylesheet -->
        <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>

        <!-- font awesome style -->
        <link href='/style/css/font-awesome.min.css' rel='stylesheet'>

        <!-- Custom styles for this template -->
        <link href='/style/css/style.css' rel='stylesheet'>
        <!-- responsive style -->
        <link href='/style/css/responsive.css' rel='stylesheet'>

        <script type='text/javascript' charset='UTF-8' src='https://maps.googleapis.com/maps-api-v3/api/js/58/2/intl/en_gb/common.js'></script>
        <script type='text/javascript' charset='UTF-8' src='https://maps.googleapis.com/maps-api-v3/api/js/58/2/intl/en_gb/util.js'></script>

        <link rel='stylesheet' href='/msg/css/style.css'>
      	<link rel='stylesheet' href='/msg/styles.css'>
        <link rel='stylesheet' href='/items/ad_crd.css'>
        </head>
        ";
        if(isset($_GET['popup']))
        {
            popupelement($_GET['popup_typ'],$_GET['popup']);
        }elseif(isset($_GET['msg']))
        {
            if($_GET['msg_typ']==1)
            {
                $status = true;
            }
            else
            {
                $status = false;
            }
            msgelement($_GET['msg_h'], $_GET['msg'], $status);
        }
    }

    function bootstarp_js()
    {
        echo "  
        
        <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
                <script src='https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'>
                </script>
                <!-- custom js -->
                <script type='text/javascript' src='/style/js/custom.js'></script>
                <!-- Google Map -->
            ";
    }

    function set_doc_content($propoty,$value)
    {
        echo "<script>document.getElementById('$propoty').textContent = '$value';</script>";
    }
    function set_doc_contentex($element,$propoty,$value)
    {
        echo "<script>document.getElementById('$element').".$propoty." = '$value';</script>";
    }
    function set_doc_value($propoty,$value)
    {
        echo "<script>document.getElementById('$propoty').value = '$value';</script>";
    }
    function route($address)
    {
        echo "<script>location.href = '$address';</script>";
    }
    function set_nav_act($property,$value)
    {
        echo 
        "
        <script>
        document.getElementById('$property').onclick=function()
        {
        parent.document.getElementById('id_disp').contentWindow.document.body.scrollHeight=0+'px';
           parent.document.getElementById('id_disp').style.height = 0   
        + 'px';
        parent.document.getElementById('id_disp').src='$value';
        }
        </script>
        ";

    }
    function set_nav_actobj($property, $object, $value)
    {
        echo "<script>document.getElementById('$property').onclick=function(){document.getElementById('id_disp').src='$value'+ document.getElementById('$object').value;}</script>";
    }
    function set_nav_actp($property,$value)
    {
        echo "<script>document.getElementById('$property').onclick=function(){location.href = '$value';}</script>";
    }
    function set_nav_actpp($property,$value)
    {
        echo "<script>document.getElementById('$property').onclick=function(){
        parent.document.getElementById('id_disp').contentWindow.document.body.scrollHeight=0+'px';
        parent.document.getElementById('id_disp').style.height = 0   
        + 'px';
        parent.document.getElementById('id_disp').src='$value';
        }</script>";
    }
    function set_nav_evntf($element,$event,$function)
    {
        echo "<script>document.getElementById('$element').".$event."=".$function."</script>";
    }

    function set_nav_evntf_onclk($property,$element,$event,$function)
    {
        echo "<script>document.getElementById('$property').onclick=function(){document.getElementById('$element').".$event."=".$function.";}</script>";
    }

    function set_lst_empty($element)
    {
        echo "<script>document.getElementById('$element').options.length=0;</script>";
    }

    function updintf($element,$id,$uptyp,$section)//prints upload interface
    {
        set_nav_evntf($element,"src","'"."/General/file-upload.php?I=".$id."&T=".$uptyp."&S=".$section."'");
    }

    function rand_id($tag)
    {
        return $tag.rand('000000','999999');
    }
    
    function set_lst_add($element,$value)
    {
        echo "<script>
        var list = document.getElementById('$element');
        var opt=document.createElement('OPTION'); 
        list.options.add(opt);
        opt.text ='$value'; 
        opt.value ='$value'; 
        </script>";
    }

function usr_info_bsc($uid)
    {
        $row = get_tdrowwc_innj('userdat','users', 'users_user_name', 'user_name','user_name',$uid);

        // User Basic Info
        $U_nme = $row[0][6];
        $U_Fnme = $row[0][0];
        $U_Mnme =  $row[0][1];
        $U_Lnme =  $row[0][2];
        $U_GEN = $row[0][4];
        $U_DOB = $row[0][3];
        $U_Email = $row[0][5];
        $U_typ = $row[0][9];
        $U_st = $row[0][10];
    
        set_doc_value('id_txtUNME',$U_nme);
        set_doc_value('id_txtFNME',$U_Fnme);
        set_doc_value('id_txtMNME',$U_Mnme);
        set_doc_value('id_txtLNME',$U_Lnme);
        set_doc_value('id_lstGNDR',$U_GEN);
        set_doc_value('id_datDOB',$U_DOB);
        set_doc_value('id_txtEMAIL',$U_Email);
    
        if($U_typ == 0)
        {
            set_doc_value('id_txtUTYP',"Customer");
        }
        else
        {
            set_doc_value('id_txtUTYP',"Administrator");
        }
    
        if($U_st == 0)
        {
            set_doc_value('id_lblst',"Pending");
        }
        elseif($U_st == 1)
        {
            set_doc_value('id_lblst',"Active");
        }else
        {
            set_doc_value('id_lblst',"Rejected");
        }
    }

    function ord_info_bsc_view($oid)
    {
        
        $row = get_tdrowwc('orders','ord_id',$oid);

        // Order Basic Info
        $ordDT = $row[0][3];
        $ordTN = $row[0][1];
        $ordOTP = $row[0][4];

        $recNME = $row[0][7];
        $recADD = $row[0][8];
        $recTP = $row[0][9];
        $recEMAIL = $row[0][10];


        set_doc_content('id_lblORDID',$oid);
        set_doc_content('id_lblORDID1',$oid);
        set_doc_content('id_lblORDTD',$ordDT);

        set_doc_content('id_txtNME',$recNME);
        set_doc_content('id_txtUADD',$recADD);
        set_doc_content('id_txtUNUM',$recTP);
        set_doc_content('id_txtUEMAIL',$recEMAIL);
        
        if($ordOTP!=null)
        {
            set_doc_content('id_lblORDOTP',$ordOTP);
        }
        else
        {
            set_doc_content('id_lblORDOTP','Processing ...');
        }

        if($ordTN!=null)
        {
            set_doc_content('id_lblORDTN',$ordTN);
        }
        else
        {
            set_doc_content('id_lblORDTN','Processing ...');
        }
        
    }

    function usr_info_shadd($uid)
    {
        $row = get_tdrowwc_innj('cus_shadd','users', 'users_user_name', 'user_name','user_name',$uid);

        // User Basic Info
        $cus_prov = $row[0][0];
        $cus_dist = $row[0][1];
        $cus_city =  $row[0][2];
        $cus_add =  $row[0][3];
        $cus_postc = $row[0][4];
        $cus_no = $row[0][5];

        set_doc_value('id_txtUADD',$cus_add);
        set_doc_contentex('id_lstDIST','selectedIndex',$cus_dist);
        set_doc_contentex('id_lstPROV','selectedIndex',$cus_prov);
        set_doc_contentex('id_txtUCITY','selectedIndex',$cus_city);
        set_doc_value('id_txtUNUM',$cus_no);
        set_doc_value('id_txtUPCDE',$cus_postc);
    }

        function usr_info_paym($uid)
    {
        $row = get_tdrowwc_innj('cus_paym','users', 'users_user_name', 'user_name','user_name',$uid);

        // User Basic Info
        $pay_nme = $row[0][0];
        $pay_cno = $row[0][1];
        $pay_expy =  $row[0][2];
        $pay_cvv =  $row[0][3];

        set_doc_value('id_txtPNME',$pay_nme);
        set_doc_value('id_txtPNUM',$pay_cno);
        set_doc_value('id_txtPEXP',$pay_expy);
        set_doc_value('id_txtPCVV',$pay_cvv);
    }

    function view_u_lst($utyp)
    {
        $row = get_tdrowwc_innj('userdat','users', 'users_user_name', 'user_name','user_typ',$utyp);
        $i=0;
        if(!$row==null)
        {
          echo "                    
              <table class='table'>
                <thead>
                  <th>User Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </thead>
              <tr>";
        while($i<sizeof($row)){
            
            echo "
                    <td>" . $row[$i][7] . "</td>
                    <td>" . $row[$i][0]  . "</td>
                    <td>" . $row[$i][1]  . "</td>
                    <td>" . $row[$i][5]  . "</td>
                    <td>
                      </p>
                        <span>
                          <button name='butVIEW".$row[$i][7]."' id='id_butVIEW".$row[$i][7]."'>View</button>
                        </span>
                        <span>
                          <button name='butUPD".$row[$i][7]."' id='id_butUPD".$row[$i][7]."'>Update</button>
                        </span>
                        <span>
                          ";
                    if($utyp!="2"){echo "<button name='butDEL".$row[$i][7]."' id='id_butDEL".$row[$i][7]."'>Delete</button>";}
                       echo " </span>
                      </p>
                    </td>
                  </tr>";
                  set_nav_actp('id_butVIEW'.$row[$i][7],'/General/user_info.php?id='.$row[$i][7]);
                  set_nav_actp('id_butUPD'.$row[$i][7],'/General/user_info_edit.php?id='.$row[$i][7]);
                  if($utyp!="2"){set_nav_actp('id_butDEL'.$row[$i][7],'/General/user_info_edit.php?delid='.$row[$i][7]);}
                  $i++;
            }
        }
    }

    
    function view_cat_lst($rem)
    {
      $row = get_tdrowwc('cart','users_user_name',$_SESSION["U_UNME"]);
      $i=0;
      if(!$row==null)
      {
      $maxp = 0;
      $maxw = 0;
      while($i<sizeof($row))
      {
          $productname = read_s_data('items','It_name','it_id',$row[$i][1]);
          $productimage = "/uploads/images/item/".$row[$i][1]."/main.png";
          $productWeight = read_s_data('itspec','spc_weight','items_it_id',$row[$i][1]);
          $price = read_s_data('items','It_price','it_id',$row[$i][1]);
          $qty = $row[$i][3];
          $cid = $row[$i][0];
          CItem($productname,$productimage,$price,$qty,$cid,$rem);
          $maxp = $maxp + ($price*$qty);
          $maxw = $maxw + $productWeight;
          $i++;
      }
      echo "<script>parent.document.getElementById('id_qty').textContent ='$i'</script>";
      return array($maxp,$maxw);
      }
      
    }

    function ord_update_stock($ord_id)
    {
        $row = get_tdrowwc('order_itms','order_ord_id',$ord_id);
        $i=0;
        $st_update = true;
        $disp = true;
        if(!$row==null)
        {
            while($i<sizeof($row))
            {
                $qty = $row[$i][0];
                $it_qty = read_s_data('items','it_qty','it_id',$row[$i][3]);
                if($it_qty<1)
                {
                    echo "<div class='alert alert-danger'><strong>Insufficent Stock for Item : ".$row[$i][3]." Please Update Stock</strong></div>";
                    $st_update = false;
                    $disp =  false;
                }
                $i++;
            }
            if($st_update)
            {
                $i=0;
                while($i<sizeof($row))
                {
                    $qty = $row[$i][0];
                    $it_qty = read_s_data('items','it_qty','it_id',$row[$i][3]);
                    $it_n_qty = $it_qty - $qty;
                    if(set_s_data('items','it_qty',$it_n_qty,'it_id',$row[$i][3]))
                    {
                        $disp =   true;
                        echo "<script>alert('Stock Changed!');</script>";
                    }else
                    {
                        echo "<script>alert('Stock Change Failed!');</script>";
                        $disp =   false;
                    }
                    $i++;
                }
            }

        }
        return $disp;
    }

    function ord_it_lst($ord_id)
    {
      $row = get_tdrowwc('order_itms','order_ord_id',$ord_id);
      $i=0;
      if(!$row==null)
      {
      $maxp = 0;
      $maxw = 0;
      while($i<sizeof($row))
      {
          $productname = read_s_data('items','It_name','it_id',$row[$i][3]);
          $productimage = "/uploads/images/item/".$row[$i][3]."/main.png";
          $productWeight = read_s_data('itspec','spc_weight','items_it_id',$row[$i][3]);
          $price = $row[$i][5];
          $qty = $row[$i][0];
          $cid = $row[$i][3];
          OCItem($productname,$productimage,$price,$qty,$cid);
          $maxp = $maxp + ($price*$qty);
          $maxw = $maxw + $productWeight;
          $i++;
      }
      return array($maxp,$maxw);
      }
      
    }

    function wayb_it_lst($ord_id)
    {
      $row = get_tdrowwc('order_itms','order_ord_id',$ord_id);
      $i=0;
      if(!$row==null)
      {
      $maxp = 0;
      $maxw = 0;
      while($i<sizeof($row))
      {
          $productname = read_s_data('items','It_name','it_id',$row[$i][3]);
          $productWeight = read_s_data('itspec','spc_weight','items_it_id',$row[$i][3]);
          $price = $row[$i][5];
          $qty = $row[$i][0];
          $cid = $row[$i][3];
          $maxp = $maxp + ($price*$qty);
          $maxw = $maxw + $productWeight;
          $i++;
      }
      return array($maxp,$maxw);
      }
      
    }

    function inv_it_lst($ord_id)
    {
      $row = get_tdrowwc('order_itms','order_ord_id',$ord_id);
      $i=0;
      if(!$row==null)
      {
      $maxp = 0;
      $maxw = 0;
      while($i<sizeof($row))
      {
          $productname = read_s_data('items','It_name','it_id',$row[$i][3]);
          $productWeight = read_s_data('itspec','spc_weight','items_it_id',$row[$i][3]);
          $price = $row[$i][5];
          $qty = $row[$i][0];
          $cid = $row[$i][3];
          invItem($productname,$price,$qty);
          $maxp = $maxp + ($price*$qty);
          $maxw = $maxw + $productWeight;
          $i++;
      }
      return array($maxp,$maxw);
      }
      
    }

    function view_ord_lst_usr()
    {
        $row = get_tdrowwc('orders','users_user_name',$_SESSION["U_UNME"]);
      $i=0;
      if($row!=null)
      {     
  
      while($i<sizeof($row))
      {
          $ordID = $row[$i][0];
          $ordTN = $row[$i][1];
          $ordDT = $row[$i][3];
          $ordST = $row[$i][2];
          $ordPTYP = $row[$i][5];
          OItem($ordID,$ordTN,$ordDT,$ordST,$ordPTYP);
          $i++;
      }
      return true;   
      }
      else
      {
        return false;
    }
    }

    function view_ord_lst_admin($oID,$uID,$FRM,$TO,$ST,$PTYP)
    {
        $condt="";
        if($oID!="")
        {
            $condt = $condt . " (`ord_id`='$oID') AND";
        }

        if($uID!="")
        {
            $condt = $condt . " (`users_user_name`='$uID') AND";
        }

        if($FRM!="" || $TO!="")
        {
            $condt = $condt . " `ord_dnt` BETWEEN '$FRM' AND '$TO' AND";
        }

        if($ST!="")
        {
            $condt = $condt . " (`ord_st`='$ST') AND";
        }

        if($PTYP!="")
        {
            $condt = $condt . " (`ord_ptyp`='$PTYP') AND";
        }

        $condt = substr($condt, 0, -4);
        echo "<script>'$condt'</script>";

        if($condt!="")
        {
            $row = get_tdrowwrc('orders',$condt);
        }
        
        else
        {
            $row = get_tdrow('orders');

        }

      $i=0;
      if($row!=null)
      {     
  
      while($i<sizeof($row))
      {
          $ordID = $row[$i][0];
          $ordTN = $row[$i][1];
          $ordDT = $row[$i][3];
          $ordST = $row[$i][2];
          $ordPTYP = $row[$i][5];
          $usrID = $row[$i][6];

          OItemAD($ordID,$ordTN,$ordDT,$ordST,$ordPTYP,$usrID);
          $i++;
      }
      return true;   
      }
      else
      {
        return false;
    }
    }

    function head_update($head,$subhead,$oarry)
    {
        if($oarry[0]==""&&$oarry[1] == "")
        {
            $oarry[0] = $head;
            $oarry[1] = $subhead;
        }
        elseif(!$oarry[0]==""&&!$oarry[1] == "")
        {
            $oarry[1] =  $oarry[1] ."| ".$subhead.":".$head;
            $oarry[0] = "Filterd Result";
        }
        elseif($oarry[1] == "")
        {
            $oarry[1] = $subhead.":".$head;
            $oarry[0] = "Filterd Result";
        }

        return $oarry;
    }

    function view_itm_lst_user($iId,$iNme,$iMaxp,$iMinp,$iMaxd,$iMind,$ispBnd,$ispCat,$ispcntry,$ispMaxag,$ispMinag,$imanuNme,$ordby,$limit,$sort,$chead,$cshead,$disptyp,$whreq)
    {
        $condt="";
        $header = array("","");

        if($iId!="")
        {
            $header =head_update($iId,"Item Id",$header);
            $condt = $condt . " (`it_id`='$iId') AND";
        }

        if($iNme!="")
        {
            $header =head_update($iNme,"Search Result",$header);
            $condt = $condt . " (`It_name` LIKE '%$iNme%') AND";
        }

        if($iMaxp!="" || $iMinp!="")
        {
            $header =head_update($iMinp."-".$iMaxp,"Prices Between",$header);
            $condt = $condt . " (`It_price` BETWEEN $iMinp AND $iMaxp) AND";
        }

        if($iMind!="" || $iMaxd!="")
        {
            $header =head_update($iMind."-".$iMaxd,"Date Between",$header);
            $condt = $condt . " (`it_date` BETWEEN '$iMind' AND '$iMaxd') AND";
        } 

        if($ispBnd!="")
        {
            $header =head_update($ispBnd,"Brand",$header);
            $condt = $condt . " (`Brand_Brand_nme`='$ispBnd') AND";
        }

        if($ispCat!="")
        {
            $header =head_update($ispCat,"Category",$header);
            $condt = $condt . " (`category_cat_nme`='$ispCat') AND";
        }
        
        if($ispcntry!="")
        {
            $header =head_update($ispcntry,"Country",$header);
            $condt = $condt . " (`spc_country`='$ispcntry') AND";
        }

        if($ispMinag!="" || $ispMaxag!="")
        {
            $header =head_update($ispMinag."-".$ispMaxag,"Age Between",$header);
            $condt = $condt . " `spc_reqag` BETWEEN '$ispMinag' AND '$ispMaxag' AND";
        } 
        
        if($imanuNme!="")
        {
            $header =head_update($imanuNme,"Manufacture",$header);
            $condt = $condt . " (`manu_name`='$imanuNme') AND";
        }

        $condt = substr($condt, 0, -4);

        if($ordby!="")
        {
            $header =head_update($ordby,"Order By",$header);
            $condt = $condt . " ORDER BY $ordby";
        }
        
        if($sort!="")
        {
            if($sort=="1")
            {
                $header =head_update("Ascending","Sort",$header);
                $condt = $condt . " ASC";
            }
            else
            {
                $header =head_update("Descending","Sort",$header);
                $condt = $condt . " DESC";
            }
        }

        if($limit!="")
        {
            $header =head_update($limit,"Limit",$header);
            $condt = $condt . " LIMIT 0,".$limit;
        }

        if($whreq=="")
        {
            $whreq = true;
        }elseif($whreq=="1")
        {
            $whreq = true;
        }else
        {
            $whreq = false;
        }

        if($condt!="")
        {  
            if(!$whreq)
            {
                //NO HEAD
                $row = get_tdroww_innj3('items', 'itspec','`manufactures`', 'it_id', 'items_it_id', 'items_it_id', "$condt",false); 
            }
            else
            {
            $row = get_tdroww_innj3('items', 'itspec','`manufactures`', 'it_id', 'items_it_id', 'items_it_id', $condt,true);}
            if($chead != "" || $cshead != "")
            {
                if($chead == "HIDE" || $cshead == "HIDE")
                {
                    //NO HEAD
                }
                else
                {
                head_m4($chead,$cshead);
                }
            }
            else
            {
            head_m4($header[0],$header[1]);
            }
        }

        else
        {                   
                
            if($chead == "HIDE" || $cshead == "HIDE")
            {
                //NO HEAD
            }
            else
            {
            head_m4("All Items",$cshead);
            }
                $row = get_tdroww_innj3('items', 'itspec','`manufactures`', 'it_id', 'items_it_id', 'items_it_id', "",false); 

        }

        $i=0;
        if(!$row==null)
        {
            if($disptyp =='4')
            {
                echo 
                "
                <table class='table'>
                <thead>
                <th>Item Id</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Manufacture</th>
                <th>Price</th>
                </thead>
                ";
            }
        while($i<sizeof($row))
        {
            switch ($disptyp) {
                case '1':
                    $cat = read_s_data('itspec','category_cat_nme','items_it_id',$row[$i][0]);
                    Item($row[$i][1], $row[$i][4], "/uploads/images/item/".$row[$i][0]."/main.png",$row[$i][0],$cat,$row[$i][2]);
                    break;
                case '2':
                    if($i==0){$active_st=true;}else{$active_st=false;}
                    $cat = read_s_data('itspec','category_cat_nme','items_it_id',$row[$i][0]);
                    item_ad_acrousel($row[$i][1], $row[$i][4], "/uploads/images/item/".$row[$i][0]."/sub5.png",$row[$i][0],$cat,$row[$i][2],$active_st);
                    break;
                case '3':
                    $cat = read_s_data('itspec','category_cat_nme','items_it_id',$row[$i][0]);
                    item_ad_single_element($row[$i][1], $row[$i][4], "/uploads/images/item/".$row[$i][0]."/sub4.png",$row[$i][0],$cat,$row[$i][2]);
                    $i=sizeof($row);
                    break;
                case '4':
                    $manu = read_s_data('manufactures','manu_name','items_it_id',$row[$i][0]);
                    Item_admin($row[$i][1], $row[$i][4], $row[$i][0],$row[$i][3],$manu);
                    break;
                default:
                    # code...
                    break;
            }
            $i++;
        }
        }else
        {
            echo"Nothing to Show";
        }
        if($disptyp !="4")
        {
            head_m5();
        }
        
    }

    function del_u_u_cat_bnd()
    {
      $row = get_tdclm('category','cat_nme');
      $i=0;
      if(!$row==null)
      {
      while($i<sizeof($row)){
          if(!v_ext('itspec','category_cat_nme',$row[$i][0]))
          {
            remove_cat($row[$i][0]);
          }
                $i++;
          }
      }
      
      $row = get_tdclm('brand','Brand_nme');
      $i=0;
      if(!$row==null)
      {
      while($i<sizeof($row)){
          if(!v_ext('itspec','Brand_Brand_nme',$row[$i][0]))
          {
            remove_brand($row[$i][0]);
          }
                $i++;
          }
      }
    }


?>