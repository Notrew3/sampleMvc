<?php 


/**
 * Classe Controler
 */
class Home extends Controller
{
	
	public function index()
	{
		$home = new HomeService();		
		
		$this->view->render('Views/home/index.phtml', array('users' => $home->listUserObjects()));
		
	}


}