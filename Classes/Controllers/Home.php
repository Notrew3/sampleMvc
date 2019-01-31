<?php 


/**
 * Classe Controler
 */
class Home extends Controller
{
	
	use HomeService;

	public function index()
	{				
		
		$this->view->render('Views/home/index.phtml', array('users' => $this->listUserObjects()));
		
	}


}