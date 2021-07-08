<?php
    //PENGATUR SESI HABIS
		//Session Berakhir Dalam 1 menit
		$minutesBeforeSessionExpire=0.1;
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
   			session_unset();     // unset $_SESSION   
    		session_destroy();   // destroy session data  
			}
			
		$_SESSION['LAST_ACTIVITY'] = time(); // update last activity
		else {
			echo "<script>
			alert('Login Expired');
			document.location='menulogin.php';
			 </script>";
		}
		
?>