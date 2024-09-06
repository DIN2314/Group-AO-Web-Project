<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
?>

<?php
        sessionupd();
        timeout();
        u_validate(1);
        bootstarp_css("Admin Dashboard"); 
?>


        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    <body class="sb-nav-fixed">
    <div style ="position:absolute; z-index: 1; background-color:white; left:92%; border-style: solid; display:none;" name="secUSERINFO" id="id_secUSERINFO">
        <h2>My Info</h2>
        <hr>
        <?php echo"<img name='imgUSR' id='id_imgUSR' src='' onerror=this.src='../uploads/images/default/user.png'; class='img-fluid card-img-top'>";?>
        <h3><span name="lblFNME" id="id_lblFNME">[First Name]</span>&nbsp<span name="lblLNME" id="id_lblLNME">[Last Name]</span></h3>
        <p name="lblUNME" id="id_lblUNME">[User Name]</p>
        <p name="lblUTYP" id="id_lblUTYP">[User Type]</p>
        <p name="lblUMAIL" id="id_lblUMAIL">[User Mail]</p>
        <p name="lblUADD" id="id_lblUADD">[User Address]</p>
        <form method="POST">
            <button name="butINFOEDT">Edit</button>
        </form>

        <form method="post">
        <button name="butLOUT">Logout</button>
        </form>
    </div>
    
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item" >
                    <a name="butMYINFO" id="id_butMYINFO" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a name = "navDSHBRD" id ="id_navDSHBRD" class="nav-link" href="javascript:void(0)">
                                Welcome
                            </a>
                            <div class="sb-sidenav-menu-heading">Management</div>
                            <!-- section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseLayouts">
                                Administrators Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a name = "navADDADMIN" id ="id_ADDADMIN" class="nav-link" href="javascript:void(0)">Add an account.</a>
                                    <a name = "navVIEWADMIN" id ="id_navVIEWADMIN" class="nav-link" href="javascript:void(0)">View Available accounts.</a>
                                </nav>
                            </div>
                            <!-- section end -->

                            <!-- section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseLayouts">
                                Users Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a name = "navVIEWUSER" id ="id_navVIEWUSER" class="nav-link" href="javascript:void(0)">View Available accounts.</a>
                                </nav>
                            </div>
                            <!-- section end -->

                            <!-- section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseItems" aria-expanded="false" aria-controls="collapseLayouts">
                                Items Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseItems" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a name = "navADDITMS" id ="id_navADDITMS" class="nav-link" href="javascript:void(0)">Add New Item</a>
                                    <a name = "navVIEWITMS" id ="id_navVIEWITMS" class="nav-link" href="javascript:void(0)">View Items</a>
                                </nav>
                            </div>
                            <!-- section end -->

                            <!-- section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOders" aria-expanded="false" aria-controls="collapseLayouts">
                                Orders Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseOders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a name = "navMNGODS" id ="id_navMNGODS" class="nav-link" href="javascript:void(0)">Manage Orders</a>
                                </nav>
                            </div>
                            <!-- section end -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <span name="lblUNME" id="id_lblhUNME">[User Name]</span>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                                <div style = "position: relative;">
                        <iframe style = "position: relative; width:100%; height:100%;" src="/admin/welcome.php" frameborder="none" name="disp" id="id_disp"></iframe>
                    </div>
                    
                    <script>
    function resizeIframe() {
        var iframe = parent.document.getElementById("id_disp");
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight   
        + "px";
        }
        function resizeIframe2()
        {
        if((document.getElementById('id_disp').contentWindow.document.body.scrollHeight!=0)||(document.getElementById('id_disp').style.height != 0)){

                    var iframe = document.getElementById('id_disp');
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight   
        + 'px';
        }
        }

        // Call the resizeIframe function when the iframe content loads
        document.getElementById('id_disp').onload=resizeIframe2;
</script>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Group AO 2024</div>
                            <div>
                               <!--<a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>--> 
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>

<?php
    set_nav_act("id_navDSHBRD","/admin/welcome.php");
    set_nav_act("id_ADDADMIN","/admin/create-admin.php");
    set_nav_act("id_navVIEWADMIN","/admin/admin_list.php");
    set_nav_act("id_navVIEWUSER","/admin/user_list.php");
    set_nav_act("id_navADDITMS","/items/create-item.php");
    set_nav_act("id_navVIEWITMS","/items/items_list-admin.php");
    set_nav_act("id_navMNGODS","/order/order_list-admin.php?oid=&uid=&frm=&to=&st=&ptyp=");

    $infost = false;
    welcome_tit($_SESSION["U_UNME"]);  
    if(isset($_POST["butLOUT"]))
    {
        logout();
    }

    acc_info($_SESSION["U_UNME"],$_SESSION["U_UTYP"]);
?>