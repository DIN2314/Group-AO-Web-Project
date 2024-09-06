<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        // include($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        // sessionupd();
        // timeout();
        // u_validate(0);
?>

<?php
    bootstarp_css("Cart");
?>


<ul class='list-unstyled mb-1-9'>
    <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Receiption Name:</span> 
        <span name='txtFNME' id='id_txtFNME'>[First Name]</span> 
        <span name='txtMNME' id='id_txtMNME'>[Middle Name]</span> 
        <span name='txtLNME' id='id_txtLNME'>[Last Name]</span> 
    </li>
    <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Address:</span> 
        <span name='txtUADD' id='id_txtUADD'>[Address]</span> </br>
        <span name='txtUCITY' id='id_txtUCITY'>[City]</span>, </br>
        <span name='lstDIST' id='id_lstDIST'>[District]</span>,
        <span name='lstPROV' id='id_lstPROV'>[Province]</span> </br>
        <span name='txtUPCDE' id='id_txtUPCDE'>[Postal Code]</span>
    </li>
    <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Email:</span> 
        <span name='txtEMAIL' id='id_txtEMAIL'>[Email]</span> 
    </li>
    <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Number:</span> 
        <span name='txtUNUM' id='id_txtUNUM'>[Phone]</span>
    </li>
</ul>

<script src='Script.js'></script>
<?php
    bootstarp_js();
?>