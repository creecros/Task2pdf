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

	public function getClasses() {
        return array(
            'Plugin\Task2pdf\Model' => array(
                'PrintModel',
            )
        );
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
		return '0.0.3'; 
	}

	public function getPluginDescription() 
	{ 
		return 'Create a printer friendly PDF of a task.'; 
	}

	public function getPluginHomepage() 
	{ 	 
		return 'https://github.com/creecros/Task2pdf'; 
	}
}
