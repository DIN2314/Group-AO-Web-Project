<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        sessionupd();
        timeout();
?>


<?php 
bootstarp_css("file Upload");
?>
    <style>
        #backgroundImageContainer {
            width: 300px;
            height: 200px;
            background-color: #f0f0f0;
        }
    </style>

<body>

<form method="POST" action="#" enctype="multipart/form-data">
    <P><input type="file" name="imgUPD" id="id_imgUPD"> <button type="submit" name="butUPLOAD" id="id_butUPLOAD">Upload</button></p>
</form>
<div class="img-thumbnail" id="backgroundImageContainer"></div>

<?php 
bootstarp_js();
?>
    <script>
        document.getElementById('id_imgUPD').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();   

                reader.onload = function(e) {
                    document.getElementById('backgroundImageContainer').style.backgroundImage   
                    = 'url(' + e.target.result + ')';
                    var img = new image();
                    img.src = getElementById('backgroundImageContainer').style.backgroundImage.replace('url("', '').replace('")', '');
                    document.getElementById('backgroundImageContainer').style.width= img.width +'px';
                    document.getElementById('backgroundImageContainer').style.height = '100px';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

<?php
           if (isset($_GET['I'])){$id = $_GET['I'];}
           if (isset($_GET['T'])){$type = $_GET['T'];}
           if (isset($_GET['S'])){$section = $_GET['S'];}
    if(isset($_POST['butUPLOAD']))
        {
            if (isset($_FILES['imgUPD'])) {
            $allowedTypes = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
            $maxFileSize = 1048576; // 1 MB in bytes
    
            if ($_FILES['imgUPD']['error'] === UPLOAD_ERR_OK) {
                if ($_FILES['imgUPD']['size'] > $maxFileSize) {
                    popup('file-upload.php','File is too large.','err');
                } elseif (!in_array($_FILES['imgUPD']['type'], $allowedTypes)) {
                    popup('file-upload.php','Invalid file type.','err');
                } elseif (!is_uploaded_file($_FILES['imgUPD']['tmp_name'])) {
                    popup('file-upload.php','Invalid file upload.','err');
                } else {
                    upload($id,$type,$section);
                    popup('file-upload.php','Uploaded','done');
                }
            } 
            else 
            {
                popup('file-upload.php',"File upload error: " . $_FILES['file']['error'],'err');
            }
        }
        }     
?>

<?php
        function genadd($id,$type,$section)
        {
            $uptyp=null;
            $upadd=null;
            $upsetion=null;
            switch ($type) {
                case '1':
                    $uptyp='user';
                    break;
                case '2':
                    $uptyp='item';
                    break;
                default:
                    # code...
                    break;
            }
            switch ($section) {
                case '1':
                    $upadd='main';
                    break;
                case '2':
                    $upadd='sub1';
                    break;
                case '3':
                    $upadd='sub2';
                    break;
                case '4':
                    $upadd='sub3';
                    break;
                case '5':
                    $upadd='sub4';
                    break;
                case '6':
                    $upadd='sub5';
                    break;
                default:
                    # code...
                    break;
            }
            if(!file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/images/".$uptyp."/".$id))
            {
                mkdir($_SERVER["DOCUMENT_ROOT"]."/uploads/images/".$uptyp."/".$id,0777,true);
            }

            $upadd = $_SERVER["DOCUMENT_ROOT"]. "/uploads/images/".$uptyp."/".$id."/".$upadd;
            return $upadd;
        }

        function upload($id,$type,$section)
        {
            echo "<script>alert(".$_FILES["imgUPD"]['size'].");</script>";
            if(move_uploaded_file($_FILES["imgUPD"]['tmp_name'],genadd($id,$type,$section).".png"))
            {
                echo "<script>alert('done');</script>";
            }
            else
            {
                echo "<script>alert('failed');</script>";
            }


        }
?>