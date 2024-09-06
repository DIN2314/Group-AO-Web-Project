<?php
    include_once ($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
    include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
    include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
    function load_cat_band()
    {

        $row = get_tdclm('category','cat_nme');
        $i=0;
        set_lst_empty('id_txtSPCAT');
        if(!$row==null)
        {
          set_lst_add('id_txtSPCAT','');
        while($i<sizeof($row)){
            set_lst_add('id_txtSPCAT',$row[$i][0]);
                  $i++;
            }
        }
        
        $row = get_tdclm('brand','Brand_nme');
        $i=0;
        set_lst_empty('id_txtSPBND');
        if(!$row==null)
        {
          set_lst_add('id_txtSPBND','');
        while($i<sizeof($row)){
            set_lst_add('id_txtSPBND',$row[$i][0]);
                  $i++;
            }
        }
    }

    function load_itms_cat_band()
    {

        $row = get_tdclm('category','cat_nme');
        $i=0;
        if(!$row==null)
        {
        while($i<sizeof($row)){
          view_itm_lst_user('','','','','','','',$row[$i][0],'','','','',"rand()",'5','',$row[$i][0],"Category","1",'1');
                  $i++;
            }
        }
        
        $row = get_tdclm('brand','Brand_nme');
        $i=0;
        if(!$row==null)
        {
        while($i<sizeof($row)){
          view_itm_lst_user('','','','','','',$row[$i][0],'','','','','',"rand()",'5','',$row[$i][0],"Brand","1",'1');
                  $i++;
            }
        }
    }
    function search()
    {
        echo 
        "
            <input type='search' placeholder='Search' aria-label='Search' name='txtSEARCH' id='id_txtSEARCH'>
            <button class='btn btn-outline-success my-2 my-sm-0' name='butSEARCH' id='id_butSEARCH'>Search</button>
        ";
        
        
        set_nav_actobj('id_butSEARCH', 'id_txtSEARCH',"/items/items_list-user.php?iNme=");
              
    }

    function get_cat()
    {
        $row = get_tdclm('category','cat_nme');
        $i=0;
        if(!$row==null)
        {
          echo 
          "
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='javascript:void(0)' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  Catagories
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          ";
        while($i<sizeof($row)){
              echo "<a class='dropdown-item' href='javascript:void(0)' name='cat".$row[$i][0]."' id='id_cat".$row[$i][0]."'>".$row[$i][0]."</a>";
              set_nav_act("id_cat".$row[$i][0]."","/items/items_list-user.php?ispCat=".$row[$i][0]."");
              $i++;
            }
          echo 
              "
                  </div>
                </li>
              ";
        }
    }

    function get_brnd()
    {
      $row = get_tdclm('brand','Brand_nme');
        $i=0;
        if(!$row==null)
        {
          echo 
          "
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='javascript:void(0)' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  Brands
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          ";
          
        while($i<sizeof($row)){
          echo "<a class='dropdown-item' href='#!' name='bnd".$row[$i][0]."' id='id_bnd".$row[$i][0]."'>".$row[$i][0]."</a>";
          set_nav_act("id_bnd".$row[$i][0]."","/items/items_list-user.php?ispBnd=".$row[$i][0]."");
          $i++;
            }

            echo 
            "
                            </div>
                        </li>
            ";
        }
    }
    
    function Item($productname, $productprice, $productimage,$productid,$category,$description) {
        $productidrel = rand_id($productid);
        $element = "        
          <div class='col-sm-6 col-md-4 col-lg-3' name='id_crd".$productidrel."' id='id_crd".$productidrel."'>
              <div class='box'>
                  <div class='img-box'>
                    <img src='{$productimage}' onerror=this.src='../uploads/images/default/item.png'; alt='{$productname}' >
                  </div>
                  <div class='detail-box'>
                      {$productname}
                    <h6>
                    Rs. {$productprice}
                    </h6>
                  </div>
              </div>
            </div>
        "
        ;
        echo $element;
        set_nav_actpp("id_crd".$productidrel."","/items/item_info-user.php?it=".$productid."");
    }

    function Item_admin($productname, $productprice,$productid,$qty,$manufacture) {
        $productidrel = rand_id($productid);
        $element = "    
                  <tr>    
                    <td>" . $productid. "</td>
                    <td>" . $productname . "</td>
                    <td>" . $qty. "</td>
                    <td>" . $manufacture. "</td>
                    <td>" . $productprice. "</td>
                    <td>
                      </p>
                        <span>
                          <button name='butVIEW".$productid."' id='id_butVIEW".$productid."'>View</button>
                        </span>
                        <span>
                          <button name='butUPD".$productid."' id='id_butUPD".$productid."'>Update</button>
                        </span>
                        <span>
                          <button name='butSTUP".$productid."' id='id_butSTUP".$productid."'>Add/Remove Stock</button>
                        </span>
                        <span>
                          <button name='butIMGUP".$productid."' id='id_butIMGUP".$productid."'>Image Updates</button>
                        </span>
                        <span>
                          <button name='butDEL".$productid."' id='id_butDEL".$productid."'>Delete</button>
                        </span>
                      </p>
                    </td>
                  </tr>";
        echo $element;
        set_nav_actp('id_butVIEW'.$productid,'/items/item_info.php?it='.$productid);
        set_nav_actp('id_butUPD'.$productid,'/items/item_info_edit.php?it='.$productid);
        set_nav_actp('id_butSTUP'.$productid,'/items/item_stock_edit.php?it='.$productid);
        set_nav_actp('id_butIMGUP'.$productid,'/items/item_pics_upload.php?I='.$productid);
        set_nav_actp('id_butDEL'.$productid,'/items/item_info.php?delid='.$productid);
    }

    function item_info($itid)
    {
        // Item Basic Info
        $row =  get_row('items','it_id',$itid);
        set_doc_value('id_txtITNME',$row['1']);
        set_doc_value('id_txtITDEC',$row['2']);
        set_doc_value('id_txtITQTY',$row['3']);
        set_doc_value('id_txtITPRICE',$row['4']);

        //Item Manufacture
        $row =  get_row('manufactures','items_it_id',$itid);
        set_doc_value('id_txtMNUNME',$row['0']);
        set_doc_value('id_txtMNUADD',$row['1']);
        set_doc_value('id_txtMNUEMAIL',$row['2']);
        set_doc_value('id_txtMNUTP',$row['3']);

        //Item Spec.
        $row =  get_row('itspec','items_it_id',$itid);
        set_doc_value('id_txtSPBND',$row['0']);
        set_doc_value('id_txtSPCAT',$row['1']);
        set_doc_value('id_txtSPCNT',$row['2']);
        set_doc_value('id_txtSPAG',$row['3']);
        set_doc_value('id_txtSPWIGHT',$row['4']);
        set_doc_value('id_txtSPDEP',$row['5']);
        set_doc_value('id_txtSPWIDTH',$row['6']);
        set_doc_value('id_txtSPHEIGHT',$row['7']);
    }

    function item_info_user($itid)
    {
        //Item Images
        set_doc_contentex('id_imgmain','src',"/uploads/images/item/".$itid."/main.png");
        set_doc_contentex('id_imgsub1','src',"/uploads/images/item/".$itid."/sub1.png");
        set_doc_contentex('id_imgsub2','src',"/uploads/images/item/".$itid."/sub2.png");
        set_doc_contentex('id_imgsub3','src',"/uploads/images/item/".$itid."/sub3.png");
        
        // Item Basic Info
        $row =  get_row('items','it_id',$itid);
        set_doc_content('id_txtITNME',$row['1']);
        set_doc_content('id_txtID',$row['0']);
        set_doc_content('id_txtITDEC',$row['2']);
        set_doc_content('id_txtITQTY',$row['3']);
        set_doc_content('id_txtITPRICE',$row['4']);

        //Item Manufacture
        $row =  get_row('manufactures','items_it_id',$itid);
        set_doc_content('id_txtMNUNME',$row['0']);
        set_doc_content('id_txtMNUADD',$row['1']);
        set_doc_content('id_txtMNUEMAIL',$row['2']);
        set_doc_content('id_txtMNUTP',$row['3']);

        //Item Spec.
        $row =  get_row('itspec','items_it_id',$itid);
        set_doc_content('id_txtSPBND',$row['0']);
        set_doc_content('id_txtSPCAT',$row['1']);
        set_doc_content('id_txtSPCNT',$row['2']);
        set_doc_content('id_txtSPAG',$row['3']);
        set_doc_content('id_txtSPWIGHT',$row['4']);
        set_doc_content('id_txtSPDEP',$row['5']);
        set_doc_content('id_txtSPWIDTH',$row['6']);
        set_doc_content('id_txtSPHEIGHT',$row['7']);
    }

    function view_it_lst($itid)
    {
        if($itid==null)
        {
            $row = get_tdroww_innj('items','manufactures', 'items_it_id', 'it_id');
        }
        else
        {
            $row = get_tdrowwc_innj('items','manufactures', 'items_it_id', 'it_id','it_id',$itid);
        }
        $i=0;
        if(!$row==null)
        {
          echo "                    
              <table class='table'>
                <thead>
                  <th>Item Id</th>
                  <th>Item Name</th>
                  <th>Qty</th>
                  <th>Manufacture</th>
                  <th>Price</th>
                </thead>
              <tr>";
        while($i<sizeof($row)){
            
            echo "
                    <td>" . $row[$i][0] . "</td>
                    <td>" . $row[$i][1]  . "</td>
                    <td>" . $row[$i][3]  . "</td>
                    <td>" . $row[$i][6]  . "</td>
                    <td>" . $row[$i][4]  . "</td>
                    <td>
                      </p>
                        <span>
                          <button name='butVIEW".$i."' id='id_butVIEW".$i."'>View</button>
                        </span>
                        <span>
                          <button name='butUPD".$i."' id='id_butUPD".$i."'>Update</button>
                        </span>
                        <span>
                          <button name='butSTUP".$i."' id='id_butSTUP".$i."'>Add/Remove Stock</button>
                        </span>
                        <span>
                          <button name='butIMGUP".$i."' id='id_butIMGUP".$i."'>Image Updates</button>
                        </span>
                        <span>
                          <button name='butDEL".$i."' id='id_butDEL".$i."'>Delete</button>
                        </span>
                      </p>
                    </td>
                  </tr>";
                  set_nav_actp('id_butVIEW'.$i,'/items/item_info.php?it='.$row[$i][0]);
                  set_nav_actp('id_butUPD'.$i,'/items/item_info_edit.php?it='.$row[$i][0]);
                  set_nav_actp('id_butSTUP'.$i,'/items/item_stock_edit.php?it='.$row[$i][0]);
                  set_nav_actp('id_butIMGUP'.$i,'/items/item_pics_upload.php?I='.$row[$i][0]);
                  set_nav_actp('id_butDEL'.$i,'/items/item_info.php?it=null&delid='.$row[$i][0]);
                  $i++;
            }
        }
    }

    function item_ad_acrousel($productname, $productprice, $productimage,$productid,$category,$description,$active_st)
    {
      $productidrel = rand_id($productid);
      if($active_st)
      {
      echo 
      "
          <div class='carousel-item active'>
            <div class='container '>
              <div class='row'>
                <div class='col-md-4 '>
                  <div class='detail-box'>
                    <h1>
                      $productname
                    </h1>
                    <p>
                     $description
                    </p>
                    <div class='btn-box'  name='imgad".$productidrel."' id='id_imgad".$productidrel."'>
                        <div class='btn1' name='imgad".$productidrel."' id='id_imgad".$productidrel."'>Shop Now</div>
                    </div>
                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='img-box'>
                    <img src='{$productimage}' onerror=this.src='../uploads/images/default/item.png' alt='{$productname}'>
                  </div>
                </div>
              </div>
            </div>
          </div>
          ";
      }else
      {
      echo 
      "
                <div class='carousel-item'>
            <div class='container '>
              <div class='row'>
                <div class='col-md-4 '>
                  <div class='detail-box'>
                    <h1>
                      Star Wars
                    </h1>
                    <p>
                      $description
                    </p>
                    <div class='btn-box'>
                        <div class='btn1' name='imgad".$productidrel."' id='id_imgad".$productidrel."'>Shop Now</div>
                    </div>
                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='img-box'>
                    <img src='{$productimage}' onerror=this.src='../uploads/images/default/item.png' alt='{$productname}'>
                  </div>
                </div>
              </div>
            </div>
          </div>
          ";
      }
      set_nav_actpp("id_imgad".$productidrel."","/items/item_info-user.php?it=".$productid."");
    }

    function item_ad_single_element($productname, $productprice, $productimage,$productid,$category,$description)
    {
      $productidrel = rand_id($productid);
      echo 
      "
        <div class='col-md-6 pl-md-2 col-xl-6' name='imgad_s".$productidrel."' id='id_imgad_s".$productidrel."'>
          <div class='img-box'>
            <img src='{$productimage}' onerror=this.src='../uploads/images/default/item.png'; alt='{$productname}' width='1920'>
          </div>
        </div>
          "
          ;

      set_nav_actpp("id_imgad_s".$productidrel."","/items/item_info-user.php?it=".$productid."");
    }
?>



