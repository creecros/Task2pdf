<?php

namespace Kanboard\Plugin\Task2pdf;

require_once __DIR__.'/dompdf/autoload.inc.php';

use Kanboard\Core\Plugin\Base;

class Plugin extends Base

{
	public function initialize()
	{
		$this->template->hook->attach('template:task:sidebar:information', 'task2pdf:print');
	}

	
	public function getPluginName()	
	{ 		 
		return 'Task2pdf'; 
	}

	public function getPluginAuthor() 
	{ 	 
		return 'Craig Crosby'; 
	}

	public function getPluginVersion() 
	{ 	 
		return '0.0.1'; 
	}

	public function getPluginDescription() 
	{ 
		return 'Print Tasks'; 
	}

	public function getPluginHomepage() 
	{ 	 
		return 'https://github.com/creecros/Task2pdf'; 
	}
}
