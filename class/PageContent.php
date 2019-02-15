<?php
	class PageContent{
		public function get_header(){
			require_once('includes/header.php');
		}


		public function get_content($content){
			include_once($content.'.php');	
		}

		public function get_footer(){
			require_once('includes/footer.php');
		}
	}

	class Islogged
	{
		
		function check()
		{
			if(isset($_SESSION['username'])){
					$loggedusername = $_SESSION['username'];
				}else{
					header('Location: login.php');
				}
		}
	}
?>
