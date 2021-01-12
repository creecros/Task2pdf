<?php

namespace Kanboard\Plugin\Task2pdf;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base

{
	public function initialize()
	{
		$this->template->hook->attach('template:task:sidebar:information', 'task2pdf:print');
		$this->template->hook->attach('template:project:dropdown', 'task2pdf:project_header/print_project');
		$this->template->hook->attach('template:config:application', 'task2pdf:config/font_toggle');
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
		return '1.4.0'; 
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
