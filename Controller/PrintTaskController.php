<?php

namespace Kanboard\Plugin\Task2pdf\Controller;

require_once __DIR__.'/../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use Kanboard\Controller\BaseController;
use Kanboard\Model\UserMetadataModel;
use Kanboard\Model\ProjectModel;
use Kanboard\Model\CommentModel;
use Kanboard\Model\TaskLinkModel;
use Kanboard\Model\ColumnModel;
use Kanboard\Model\ColorModel;
use Kanboard\Model\TaskTagModel;


class PrintTaskController extends BaseController
{


    public function printTask()
    {
        // instantiate and use t$options = new Options();
        $options = new Options();
        $options->set('isRemoteEnabled', 'true');
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
        $dompdf->setBasePath(__DIR__.'/../../');
        

        $task = $this->getTask();
        $subtasks = $this->subtaskModel->getAll($task['id']);
        $commentSortingDirection = $this->userMetadataCacheDecorator->get(UserMetadataModel::KEY_COMMENT_SORTING_DIRECTION, 'ASC');
        $html = '<link rel="stylesheet" href="/var/www/app/assets/css/vendor.min.css" media="all" />
                 <link rel="stylesheet" href="/var/www/app/assets/css/print.min.css" media="all" />
                 <link rel="stylesheet" href="/var/www/app/assets/css/app.min.css" media="all" />';
        $html += $this->helper->layout->app('task/public', array(
            'project' => $this->projectModel->getById($task['project_id']),
            'comments' => $this->commentModel->getAll($task['id'], $commentSortingDirection),
            'subtasks' => $subtasks,
            'links' => $this->taskLinkModel->getAllGroupedByLabel($task['id']),
            'task' => $task,
            'columns_list' => $this->columnModel->getList($task['project_id']),
            'colors_list' => $this->colorModel->getList(),
            'tags' => $this->taskTagModel->getList($task['id']),
            'title' => $task['title'],
            'no_layout' => true,
            'auto_refresh' => true,
            'not_editable' => true,
        ));
        
        $dompdf->loadHtml($html);
     

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

    }

}

