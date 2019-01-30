<?php 


/**
 * 			
 */
class View
{
	
	function __construct()
	{
		# code...
	}

	public function render($viewScript, $variables = null)
	{
		if(isset($variables)){
			$this->compact($variables);
		}
		require($viewScript);
	}

	public function compact($variables)
	{
		if(is_array($variables)){
			foreach ($variables as $key => $value) {
				$this->$key = $value;
			}
		}
	}
}