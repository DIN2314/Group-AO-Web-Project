<?php
    include ($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
    function welcome_tit($uname)

    {

        echo "<script>document.getElementById('id_lblhUNME').textContent = '$uname'</script>";
        
    }

    function acc_info($unme,$utyp)
    {
        if($utyp!=9)
        {
        $user_dat = get_row('userdat','users_user_name',$unme);
        set_nav_evntf('id_imgUSR','src',"'../uploads/images/user/".$unme.'/main.png'."'");
        set_doc_content('id_lblhUNME',"$user_dat[0]");
        set_doc_content('id_lblUNME',"$unme");
        set_doc_content('id_lblFNME',"$user_dat[0]");
        set_doc_content('id_lblLNME',"$user_dat[2]");
        }
        else
        {
            set_nav_evntf('id_imgUSR','src',"'../uploads/images/user/".$unme.'/main.png'."'");
            set_doc_content('id_lblhUNME',"");
            set_doc_content('id_lblUNME',"$unme");
            set_doc_content('id_lblFNME',"");
            set_doc_content('id_lblLNME',"");
        }
        if($utyp==1)
        {
            set_doc_content('id_lblUTYP','Administrator Account'); 
            set_doc_content('id_lblUMAIL',"$user_dat[5]");
        }
        else if($utyp==9)
        {
            set_doc_content('id_lblUTYP',""); 
            set_doc_content('id_lblUMAIL',"");
            set_doc_content('id_lblUADD',"");
            set_doc_content('id_lblhUNME',"Guest");
            
        }
        else
        {
            set_doc_content('id_lblUTYP','Customer'); 
            set_doc_content('id_lblUMAIL',"$user_dat[5]");
        }
        
    }

    function usr_info_bsc_view($uid)
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
    
        set_doc_content('id_txtUNME',$U_nme);
        set_doc_content('id_txtFNME',$U_Fnme);
        set_doc_content('id_txtMNME',$U_Mnme);
        set_doc_content('id_txtLNME',$U_Lnme);
        set_doc_content('id_lstGNDR',$U_GEN);
        set_doc_content('id_datDOB',$U_DOB);
        set_doc_content('id_txtEMAIL',$U_Email);
    
        if($U_typ == 0)
        {
            set_doc_content('id_txtUTYP',"Customer");
        }
        else
        {
            set_doc_content('id_txtUTYP',"Administrator");
        }
    
        if($U_st == 0)
        {
            set_doc_content('id_lblst',"Pending");
        }
        elseif($U_st == 1)
        {
            set_doc_content('id_lblst',"Active");
        }else
        {
            set_doc_content('id_lblst',"Rejected");
        }
    }
    function usr_info_shadd_view($uid)
    {
        $row = get_tdrowwc_innj('cus_shadd','users', 'users_user_name', 'user_name','user_name',$uid);

        // User Basic Info
        $cus_prov = $row[0][0];
        $cus_dist = $row[0][1];
        $cus_city =  $row[0][2];
        $cus_add =  $row[0][3];
        $cus_postc = $row[0][4];
        $cus_no = $row[0][5];

        set_doc_content('id_txtUADD',$cus_add);
        set_doc_content('id_lstDIST',$cus_dist);
        set_doc_content('id_lstPROV',$cus_prov);
        set_doc_content('id_txtUCITY',$cus_city);
        set_doc_content('id_txtUNUM',$cus_no);
        set_doc_content('id_txtUPCDE',$cus_postc);
    }

        function usr_info_paym_view($uid)
    {
        $row = get_tdrowwc_innj('cus_paym','users', 'users_user_name', 'user_name','user_name',$uid);

        // User Basic Info
        $pay_nme = $row[0][0];
        $pay_cno = $row[0][1];
        $pay_expy =  $row[0][2];
        $pay_cvv =  $row[0][3];

        set_doc_content('id_txtPNME',$pay_nme);
        set_doc_content('id_txtPNUM',$pay_cno);
        set_doc_content('id_txtPEXP',$pay_expy);
        set_doc_content('id_txtPCVV',$pay_cvv);
    }

    function head_m1()
    {
        $element = 
        "
        
        <nav class='navbar navbar-expand-lg custom_nav-container' style='background-color: #3dc2ca;'>
          <a class='navbar-brand' href='/user/'>
            <span style='font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;'>
              
            </span>
            <span style='font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;'>
              TOY MART
            </span>
            </a>
          
          </a> 
         
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class=''> </span>
          </button>

          <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav  '>
                        <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='buthm' id='id_buthm'>Home</a></li>
                        <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butAIT' id='id_butAIT'>All Items</a></li>
                        <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butNIT' id='id_butNIT'>New Releases</a></li>
                        <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butKIT' id='id_butKIT'>Kids Section</a></li>
                        <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butU10IT' id='id_butU10IT'>Price under 1000</a></li>
        ";
    

        echo $element;
        set_nav_act('id_buthm','/items/items_list-user_main.php');
        set_nav_act('id_butAIT','/items/items_list-user.php');
        set_nav_act('id_butNIT','/items/items_list-user.php?ordby=it_date&sort=2&chead=New Release&whreq=0');
        set_nav_act('id_butU10IT','/items/items_list-user.php?iMinp=0&iMaxp=999&ordby=it_price&sort=1&chead=Price Under 1000');
        set_nav_act('id_butKIT','/items/items_list-user.php?ispMinag=3&ispMaxag=12&chead=Kids Section&whreq=1');
    }

    function static_sites()
    {
                $element = 
        "
            <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butSERVC' id='id_butSERVC'>Services</a></li>
             <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butABT' id='id_butABT'>About US</a></li>
             <li class='nav-item'><a class='nav-link' aria-current='page' href='javascript:void(0)' name='butCNTAT' id='id_butCNTAT'>Contact</a></li>
        ";
        echo $element;


        set_nav_act('id_butSERVC','/ststic/service.php');
        set_nav_act('id_butABT','/ststic/about US.php');
        set_nav_act('id_butCNTAT','/ststic/contact.php');
    }

    function head_m2()
    {
        $element = 
        "                  

            <li class='nav-item'>
                <a class='nav-link' name='butORD' id='id_butORD'> <i class='fas fa-shipping-fast' style='font-size:20px;color:white' aria-hidden='true'></i> Orders</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' name='butCART' id='id_butCART'> <i class='fa fa-shopping-cart' style='font-size:20px;color:white' aria-hidden='true'></i> CART <span class='badge bg-dark text-white ms-1 rounded-pill' id='id_qty'>0</span></a>
              </li>

              <button type='button' class='btn btn-primary' data-toggle='modal'  name='butMYINFO' id='id_butMYINFO'>  <span name='lblUNME' id='id_lblhUNME'>[User Name]</span> </button>
                </div>
            </ul>
        </nav>
        ";
        echo $element;
    }

        function head_m3()
    {
        $element = 
        "       <div style ='position:absolute; z-index: 1; background-color:white; left:92%; border-style: solid; display:none;' name='secUSERINFO' id='id_secUSERINFO'>
        <h2>My Info</h2>
        <hr>
        <img name='imgUSR' id='id_imgUSR' src='' onerror=this.src='../uploads/images/default/user.png'; class='img-fluid card-img-top'>
        <h3><span name='lblFNME' id='id_lblFNME'>[First Name]</span>&nbsp<span name='lblLNME' id='id_lblLNME'>[Last Name]</span></h3>
        <p name='lblUNME' id='id_lblUNME'>[User Name]</p>
        <p name='lblUTYP' id='id_lblUTYP'>[User Type]</p>
        <p name='lblUMAIL' id='id_lblUMAIL'>[User Mail]</p>
        <p name='lblUADD' id='id_lblUADD'>[User Address]</p>";
        
        if($_SESSION["U_UTYP"]!=9)
        {
            $element = $element.
            "
                        <form action='javascript:clk()'>
                    <button name='butINFOEDT' id='id_butINFOEDT'>Edit</button>
            </form>
        
                <form method='post'>
                    <button name='butLOUT'>Logout</button>
                </form>
            ";
        }
        else
        {
            $element = $element.
            "
                <form method='post'>
                    <button name='butLIN'>Sign In/Register</button>
                </form>
            ";
        }
        $element = $element.
        "
    </div>
        ";
        echo $element;
    }
        function head_m4($head,$subhead)
    {
        $element = 
        "      
        <section class='shop_section layout_padding'>
    <div class='container'>
      <div class='heading_container heading_center'>
        <h2>
            $head . $subhead
        </h2>
      </div>
      <div class='row'>
        ";

        echo $element;
    }        
    
    function head_m5()
    {
        $element = 
        "      
        </section>
            </div>
                </div>
        ";
        echo $element;
    }
    
    function footer()
    {
        $element = 
        "
                     <section class='info_section layout_padding2'>
    <div class='container'>
      <div class='row'>
        <div class='col-md-6 col-lg-3 info_col'>
          <div class='info_contact'>
            <h4>
              Address
            </h4>
            <div class='contact_link_box'>
              <a href=''>
                <i class='fa fa-map-marker' aria-hidden='true'></i>
                <span>
                  Location
                </span>
              </a>
              <a href=''>
                <i class='fa fa-phone' aria-hidden='true'></i>
                <span>
                  Call +94 78 132 5062
                </span>
              </a>
              <a href='groupaoweb@gmail.com'>
                <i class='fa fa-envelope' aria-hidden='true'></i>
                <span>
                  groupaoweb@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class='info_social'>
            <a href=''>
              <i class='fa fa-facebook' aria-hidden='true'></i>
            </a>
            <a href=''>
              <i class='fa fa-twitter' aria-hidden='true'></i>
            </a>
            <a href=''>
              <i class='fa fa-linkedin' aria-hidden='true'></i>
            </a>
            <a href=''>
              <i class='fa fa-instagram' aria-hidden='true'></i>
            </a>
          </div>
        </div>
        <div class='col-md-6 col-lg-3 info_col'>
          <div class='info_detail'>
            <h4>
              Any Trouble?
            </h4>
            <p>
              For any inconvenience we are at you service, just contact ToyMart,
              enjoy the joy of Toys.
            </p>
          </div>
        </div>
        <div class='col-md-6 col-lg-3 info_col '>
          <h4>
            Subscribe
          </h4>
          <form action='#'>
            <input type='text' placeholder='Enter email' />
            <button type='submit'>
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class='footer_section'>
    <div class='container'>
      <p>
        &copy; <span id='displayYear'></span> All Rights Reserved By ToyMartGroupAO
        
      </p>
    </div>
  </section>

        ";
        echo $element;
    }
?>