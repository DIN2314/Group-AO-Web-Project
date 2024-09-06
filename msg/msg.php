<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>
<?php


	function msg($returnloc,$header, $desc, $status)
	{
		echo "<script>location.href = '".$returnloc."?msg=".$desc."&msg_h=".$header."&msg_typ=".$status."'</script>";
	}
	
	function popup($returnloc,$popup, $type)
	{
		echo "<script>location.href = '".$returnloc."?popup=".$popup."&popup_typ=".$type."'</script>";
	}

	function msg_p($returnloc,$header, $desc, $status)
	{
		echo "<script>parent.document.location.href = '".$returnloc."?msg=".$desc."&msg_h=".$header."&msg_typ=".$status."'</script>";
	}
	
	function popup_($returnloc,$popup, $type)
	{
		echo "<script>parent.document.location.href = '".$returnloc."?popup=".$popup."&popup_typ=".$type."'</script>";
	}
    function msgelement($header, $desc, $status) {
        $Successemsg = "
		<div class='modal fade' id='statusSuccessModal' tabindex='1' role='dialog' data-bs-backdrop='static' data-bs-keyboard='false'> 
					<div class='modal-dialog modal-dialog-centered modal-sm' role='document'> 
						<div class='modal-content'> 
							<div class='modal-body text-center p-lg-4'> 
								<svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 130.2 130.2'>
									<circle class='path circle' fill='none' stroke='#198754' stroke-width='6' stroke-miterlimit='10' cx='65.1' cy='65.1' r='62.1'></circle>
									<polyline class='path check' fill='none' stroke='#198754' stroke-width='6' stroke-linecap='round' stroke-miterlimit='10' points='100.2,40.2 51.5,88.8 29.8,67.5 '></polyline> 
								</svg> 
								<h4 class='text-success mt-3'>$header</h4> 
								<p class='mt-3' style = 'color:gray'>$desc</p>
								<form><button name='butOK' id='id_butOK' class='btn btn-sm mt-3 btn-success' data-dismiss='#modal' >Ok</button></form>
							</div> 
						</div> 
					</div> 
				</div> 
			<script>
   				document.addEventListener('DOMContentLoaded', (event) => {    
     			var myModal = new bootstrap.Modal(document.getElementById('statusSuccessModal'));
     			myModal.show();
   				});
			</script>    
				";
        $Erroremsg = "
			<div class='modal fade' id='statusErrorsModal' tabindex='1' role='dialog' data-bs-backdrop='static' data-bs-keyboard='false'> 
				<div class='modal-dialog modal-dialog-centered modal-sm' role='document'> 
					<div class='modal-content'> 
						<div class='modal-body text-center p-lg-4'> 
							<svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 130.2 130.2'>
								<circle class='path circle' fill='none' stroke='#db3646' stroke-width='6' stroke-miterlimit='10' cx='65.1' cy='65.1' r='62.1'></circle> 
								<line class='path line' fill='none' stroke='#db3646' stroke-width='6' stroke-linecap='round' stroke-miterlimit='10' x1='34.4' y1='37.9' x2='95.8' y2='92.3'></line>
								<line class='path line' fill='none' stroke='#db3646' stroke-width='6' stroke-linecap='round' stroke-miterlimit='10' x1='95.8' y1='38' x2='34.4' y2='92.2'></line> 
							</svg> 
							<h4 class='text-danger mt-3'>$header</h4> 
							<p class='mt-3' style = 'color:gray'>$desc</p>
							<form><button class='btn btn-sm mt-3 btn-danger' data-dismiss='modal'>Ok</button></form>
						</div> 
					</div> 
				</div> 
			</div>
			<script>
   				document.addEventListener('DOMContentLoaded', (event) => {    
     			var myModal = new bootstrap.Modal(document.getElementById('statusErrorsModal'));
     			myModal.show();
   				});
			</script>  
		";
        if($status)
        {

			echo $Successemsg;
				return true;
		}
        else
        {
            echo $Erroremsg;
			return true;
        }
	}

	function Prompt($header, $desc)
	{
			$prompt = "
			<div class='modal fade' id='statusSuccessModal' tabindex='1' data-bs-backdrop='static' data-bs-keyboard='false' style='display: none;' aria-hidden='true'> 
						<div class='modal-dialog modal-dialog-centered modal-sm' role='document'> 
							<div class='modal-content'> 
								<div class='modal-body text-center p-lg-4'> 
									<h4 class='text-success mt-3'>$header</h4> 
									<p class='mt-3' style = 'color:gray'>$desc</p>
									<form method='post'>
									<button type='button' name='butYes' id='id_butYes' class='btn btn-sm mt-3 btn-success' data-dismiss='modal' >Yes</button> &nbsp 
									<button type='button' name='butNo' id='id_butNo' class='btn btn-sm mt-3 btn-success' data-dismiss='modal' >No</button>
									</form>
								</div> 
							</div> 
						</div> 
					</div> 
				<script>
					   document.addEventListener('DOMContentLoaded', (event) => {    
					 var myModal = new bootstrap.Modal(document.getElementById('statusSuccessModal'));
					 myModal.show();
					   });
				</script>    
					";
					echo $prompt;
					$out=null;
						if(isset($_POST['butYes']))
						{
							$out =  true;
						}
						elseif(isset($_POST['butNo']))
						{
							$out =   false;
						}
					return $out;


	}
	class prompt_box
	{
		public function showmsg($head,$dsc)
		{
			$element = "
			<div class='modal fade' id='statusSuccessModal' tabindex='1' data-bs-backdrop='static' data-bs-keyboard='false' style='display: none;' aria-hidden='true'> 
						<div class='modal-dialog modal-dialog-centered modal-sm' role='document'> 
							<div class='modal-content'> 
								<div class='modal-body text-center p-lg-4'> 
									<h4 class='text-success mt-3'>".$head."</h4> 
									<p class='mt-3' style = 'color:gray'>".$dsc."</p>
									<form method='post'>
									<button type='button' name='butYes' id='id_butYes' class='btn btn-sm mt-3 btn-success' data-dismiss='modal' >Yes</button> &nbsp 
									<button type='button' name='butNo' id='id_butNo' class='btn btn-sm mt-3 btn-success' data-dismiss='modal' >No</button>
									</form>
								</div> 
							</div> 
						</div> 
					</div> 
				<script>
					   document.addEventListener('DOMContentLoaded', (event) => {    
					 var myModal = new bootstrap.Modal(document.getElementById('statusSuccessModal'));
					 myModal.show();
					   });
				</script>    
					";
			echo $element;
			if(isset($_POST['butYes']))
			{
				return true;
			}
			elseif(isset($_POST['butNo']))
			{
				return false;
			}
		}

		public function dispout($head,$dsc)
		{
			return $this->showmsg($head,$dsc);
		}
	}

	function popupelement($type,$message)
	{
		$element = "
			<div class='notification_".$type." show shownotification' id= 'id_notification_".$type."'>
				<span class='fas fa-user-alt-slash'></span>
				<span class='message'>".$message."</span>
				<div class='close-btn'>
					<span class='fas fa-times'></span>
				</div>
			</div>


			<script>


				setTimeout(function(){
				$('.notification_".$type."').removeClass('show');
				$('.notification_".$type."').addClass('hide');
				document.getElementById('id_notification_".$type."').style.display='none';
				},5000);
				$('.close-btn').click(function(){
				$('.notification_".$type."').removeClass('show');
				$('.notification_".$type."').addClass('hide');
				document.getElementById('id_notification_".$type."').style.display='none';
				});
			</script>
		";
		echo $element;
	}
?>

