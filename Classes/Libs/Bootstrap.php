<?php

/**
 * Classe que faz o MVC acontecer.
 */
class Bootstrap
{
	
	public function __construct()
	{
		//Rounting
		$tokens = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
		
		if(!isset($tokens[1])){
			$controllerName = 'Home';
			$controllerMethod = 'index';
		}else{
			if(class_exists(ucfirst($tokens[1]))){
				$controllerName = ucfirst($tokens[1]);					
				if(isset($tokens[2])){
					$controllerMethod = strtolower($tokens[2]);
					if(isset($tokens[3])){
						$controllerParam = $tokens[3];
					}
				}else{
					$controllerMethod = 'index';
				}
			}else{
				$controllerName = 'Home';
				if(method_exists($controllerName,$tokens[1])){
					$controllerMethod = strtolower($tokens[1]);
					if(isset($tokens[2])){
						$controllerParam = $tokens[2];
					}
				}else{
					$controllerName = 'Erro';
					$controllerMethod = 'index';
				}
			}
		}	

		//Dispatching
		$controller = new $controllerName();
		if(isset($controllerParam)){
			$controller->$controllerMethod($controllerParam);
		}else{
			$controller->$controllerMethod();
		}
	}
}