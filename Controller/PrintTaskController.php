<?php

namespace Kanboard\Plugin\Task2pdf\Controller;

require_once __DIR__.'/../dompdf/autoload.inc.php';

use Dompdf;
use Kanboard\Controller\BaseController;


class PrintTaskController extends BaseController
{


    public function printTask()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $task = $this->getTask();

        $dompdf->loadHtml($this->helper->layout->task('task/show', array(
            'task' => $task,
            'project' => $this->projectModel->getById($task['project_id']),
            'files' => $this->taskFileModel->getAllDocuments($task['id']),
            'images' => $this->taskFileModel->getAllImages($task['id']),
            'comments' => $this->commentModel->getAll($task['id'], $commentSortingDirection),
            'subtasks' => $subtasks,
            'internal_links' => $this->taskLinkModel->getAllGroupedByLabel($task['id']),
            'external_links' => $this->taskExternalLinkModel->getAll($task['id']),
            'link_label_list' => $this->linkModel->getList(0, false),
            'tags' => $this->taskTagModel->getTagsByTask($task['id']),
        )));
     

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

    }

}

