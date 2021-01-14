<?php

namespace Kanboard\Plugin\Task2pdf\Controller;

require __DIR__.'/../vendor/autoload.php';

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
use Kanboard\Model\TaskFileModel;


class PrintTaskController extends BaseController
{


    public function printTask()
    {
        // instantiate and use t$options = new Options();
        $options = new Options();
        $options->set('isRemoteEnabled', 'true');
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('fontHeightRatio', '.9');
        $options->set('isJavascriptEnabled', 'true');
        $dompdf = new Dompdf($options);
        $dompdf->setBasePath('/var/www/app/');
        
        if ($this->configModel->get('task2pdf_cjk', 1) == 1) { $layout = 'Task2pdf:printlayout/printlayout_n'; } else { $layout = 'Task2pdf:printlayout/printlayout_cjk'; }

        $task = $this->getTask();
        $subtasks = $this->subtaskModel->getAll($task['id']);
        $files = $this->taskFileModel->getAllDocuments($task['id']);
        $file_to_embed = $this->taskFileModel->getAll($task['id']);
        $commentSortingDirection = $this->userMetadataCacheDecorator->get(UserMetadataModel::KEY_COMMENT_SORTING_DIRECTION, 'ASC');

        $html = $this->helper->layout->app($layout, array(
            'project' => $this->projectModel->getById($task['project_id']),
            'comments' => $this->commentModel->getAll($task['id'], $commentSortingDirection),
            'subtasks' => $subtasks,
            'files' => $files,
            'images' => $this->taskFileModel->getAllImages($task['id']),
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
        if ($this->configModel->get('task2pdf_embed_task', 1) == 1) {
            $cpdf = $dompdf->get_canvas()->get_cpdf();
            foreach ($file_to_embed as $file){
                
                $cpdf->addEmbeddedFile(
                    FILES_DIR. '/' . $file['path'],
                    $file['name'],
                    ''
                );
            }
        }

        // Output the generated PDF to Browser inline or as PDF download
        if ($this->configModel->get('task2pdf_attachment', 1) == 1) { 
			$dompdf->stream($task['id'] . '_' . $task['title'] . '.pdf', array("Attachment" => false));
        } else { 
			$dompdf->stream($task['id'] . '_' . $task['title'] . '.pdf');
        }
    }



    public function printProject()
    {
        // instantiate and use t$options = new Options();
        $options = new Options();
        $options->set('isRemoteEnabled', 'true');
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('fontHeightRatio', '.9');
        $options->set('isJavascriptEnabled', 'true');
        $dompdf = new Dompdf($options);
        $dompdf->setBasePath('/var/www/app/');

        if ($this->configModel->get('task2pdf_cjk', 1) == 1) { 
            $html_all = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style>.task-board.color-yellow, .task-summary-container.color-yellow, .color-picker-square.color-yellow, .task-board-category.color-yellow, .table-list-category.color-yellow, .task-tag.color-yellow {background-color: rgb(245, 247, 196);border-color: rgb(223, 227, 45)}td.color-yellow { background-color: rgb(245, 247, 196)}.table-list-row.color-yellow {border-left: 5px solid rgb(223, 227, 45)}.task-board.color-blue, .task-summary-container.color-blue, .color-picker-square.color-blue, .task-board-category.color-blue, .table-list-category.color-blue, .task-tag.color-blue {background-color: rgb(219, 235, 255);border-color: rgb(168, 207, 255)}td.color-blue { background-color: rgb(219, 235, 255)}.table-list-row.color-blue {border-left: 5px solid rgb(168, 207, 255)}.task-board.color-green, .task-summary-container.color-green, .color-picker-square.color-green, .task-board-category.color-green, .table-list-category.color-green, .task-tag.color-green {background-color: rgb(189, 244, 203);border-color: rgb(74, 227, 113)}td.color-green { background-color: rgb(189, 244, 203)}.table-list-row.color-green {border-left: 5px solid rgb(74, 227, 113)}.task-board.color-purple, .task-summary-container.color-purple, .color-picker-square.color-purple, .task-board-category.color-purple, .table-list-category.color-purple, .task-tag.color-purple {background-color: rgb(223, 176, 255);border-color: rgb(205, 133, 254)}td.color-purple { background-color: rgb(223, 176, 255)}.table-list-row.color-purple {border-left: 5px solid rgb(205, 133, 254)}.task-board.color-red, .task-summary-container.color-red, .color-picker-square.color-red, .task-board-category.color-red, .table-list-category.color-red, .task-tag.color-red {background-color: rgb(255, 187, 187);border-color: rgb(255, 151, 151)}td.color-red { background-color: rgb(255, 187, 187)}.table-list-row.color-red {border-left: 5px solid rgb(255, 151, 151)}.task-board.color-orange, .task-summary-container.color-orange, .color-picker-square.color-orange, .task-board-category.color-orange, .table-list-category.color-orange, .task-tag.color-orange {background-color: rgb(255, 215, 179);border-color: rgb(255, 172, 98)}td.color-orange { background-color: rgb(255, 215, 179)}.table-list-row.color-orange {border-left: 5px solid rgb(255, 172, 98)}.task-board.color-grey, .task-summary-container.color-grey, .color-picker-square.color-grey, .task-board-category.color-grey, .table-list-category.color-grey, .task-tag.color-grey {background-color: rgb(238, 238, 238);border-color: rgb(204, 204, 204)}td.color-grey { background-color: rgb(238, 238, 238)}.table-list-row.color-grey {border-left: 5px solid rgb(204, 204, 204)}.task-board.color-brown, .task-summary-container.color-brown, .color-picker-square.color-brown, .task-board-category.color-brown, .table-list-category.color-brown, .task-tag.color-brown {background-color: #d7ccc8;border-color: #4e342e}td.color-brown { background-color: #d7ccc8}.table-list-row.color-brown {border-left: 5px solid #4e342e}.task-board.color-deep_orange, .task-summary-container.color-deep_orange, .color-picker-square.color-deep_orange, .task-board-category.color-deep_orange, .table-list-category.color-deep_orange, .task-tag.color-deep_orange {background-color: #ffab91;border-color: #e64a19}td.color-deep_orange { background-color: #ffab91}.table-list-row.color-deep_orange {border-left: 5px solid #e64a19}.task-board.color-dark_grey, .task-summary-container.color-dark_grey, .color-picker-square.color-dark_grey, .task-board-category.color-dark_grey, .table-list-category.color-dark_grey, .task-tag.color-dark_grey {background-color: #cfd8dc;border-color: #455a64}td.color-dark_grey { background-color: #cfd8dc}.table-list-row.color-dark_grey {border-left: 5px solid #455a64}.task-board.color-pink, .task-summary-container.color-pink, .color-picker-square.color-pink, .task-board-category.color-pink, .table-list-category.color-pink, .task-tag.color-pink {background-color: #f48fb1;border-color: #d81b60}td.color-pink { background-color: #f48fb1}.table-list-row.color-pink {border-left: 5px solid #d81b60}.task-board.color-teal, .task-summary-container.color-teal, .color-picker-square.color-teal, .task-board-category.color-teal, .table-list-category.color-teal, .task-tag.color-teal {background-color: #80cbc4;border-color: #00695c}td.color-teal { background-color: #80cbc4}.table-list-row.color-teal {border-left: 5px solid #00695c}.task-board.color-cyan, .task-summary-container.color-cyan, .color-picker-square.color-cyan, .task-board-category.color-cyan, .table-list-category.color-cyan, .task-tag.color-cyan {background-color: #b2ebf2;border-color: #00bcd4}td.color-cyan { background-color: #b2ebf2}.table-list-row.color-cyan {border-left: 5px solid #00bcd4}.task-board.color-lime, .task-summary-container.color-lime, .color-picker-square.color-lime, .task-board-category.color-lime, .table-list-category.color-lime, .task-tag.color-lime {background-color: #e6ee9c;border-color: #afb42b}td.color-lime { background-color: #e6ee9c}.table-list-row.color-lime {border-left: 5px solid #afb42b}.task-board.color-light_green, .task-summary-container.color-light_green, .color-picker-square.color-light_green, .task-board-category.color-light_green, .table-list-category.color-light_green, .task-tag.color-light_green {background-color: #dcedc8;border-color: #689f38}td.color-light_green { background-color: #dcedc8}.table-list-row.color-light_green {border-left: 5px solid #689f38}.task-board.color-amber, .task-summary-container.color-amber, .color-picker-square.color-amber, .task-board-category.color-amber, .table-list-category.color-amber, .task-tag.color-amber {background-color: #ffe082;border-color: #ffa000}td.color-amber { background-color: #ffe082}.table-list-row.color-amber {border-left: 5px solid #ffa000}</style></head><body>';
        } else { 
            $html_all = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style>@font-face {font-family: \'Droid Sans\';font-style: normal;font-weight: 400;src: url(\'/plugins/Task2pdf/font/DroidSansFallback.ttf\') format(\'truetype\');src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format(\'truetype\');}@font-face {font-family: \'Droid Sans\';font-style: normal;font-weight: bold;src: url(\'/plugins/Task2pdf/font/DroidSansFallback.ttf\') format(\'truetype\');src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format(\'truetype\');}@font-face {font-family: \'Droid Sans\';font-style: normal;font-weight: bold;font-style: italic;src: url(\'/plugins/Task2pdf/font/DroidSansFallback.ttf\') format(\'truetype\');src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format(\'truetype\');}* {font-family: Droid Sans, DejaVu Sans, sans-serif;}.task-board.color-yellow, .task-summary-container.color-yellow, .color-picker-square.color-yellow, .task-board-category.color-yellow, .table-list-category.color-yellow, .task-tag.color-yellow {background-color: rgb(245, 247, 196);border-color: rgb(223, 227, 45)}td.color-yellow { background-color: rgb(245, 247, 196)}.table-list-row.color-yellow {border-left: 5px solid rgb(223, 227, 45)}.task-board.color-blue, .task-summary-container.color-blue, .color-picker-square.color-blue, .task-board-category.color-blue, .table-list-category.color-blue, .task-tag.color-blue {background-color: rgb(219, 235, 255);border-color: rgb(168, 207, 255)}td.color-blue { background-color: rgb(219, 235, 255)}.table-list-row.color-blue {border-left: 5px solid rgb(168, 207, 255)}.task-board.color-green, .task-summary-container.color-green, .color-picker-square.color-green, .task-board-category.color-green, .table-list-category.color-green, .task-tag.color-green {background-color: rgb(189, 244, 203);border-color: rgb(74, 227, 113)}td.color-green { background-color: rgb(189, 244, 203)}.table-list-row.color-green {border-left: 5px solid rgb(74, 227, 113)}.task-board.color-purple, .task-summary-container.color-purple, .color-picker-square.color-purple, .task-board-category.color-purple, .table-list-category.color-purple, .task-tag.color-purple {background-color: rgb(223, 176, 255);border-color: rgb(205, 133, 254)}td.color-purple { background-color: rgb(223, 176, 255)}.table-list-row.color-purple {border-left: 5px solid rgb(205, 133, 254)}.task-board.color-red, .task-summary-container.color-red, .color-picker-square.color-red, .task-board-category.color-red, .table-list-category.color-red, .task-tag.color-red {background-color: rgb(255, 187, 187);border-color: rgb(255, 151, 151)}td.color-red { background-color: rgb(255, 187, 187)}.table-list-row.color-red {border-left: 5px solid rgb(255, 151, 151)}.task-board.color-orange, .task-summary-container.color-orange, .color-picker-square.color-orange, .task-board-category.color-orange, .table-list-category.color-orange, .task-tag.color-orange {background-color: rgb(255, 215, 179);border-color: rgb(255, 172, 98)}td.color-orange { background-color: rgb(255, 215, 179)}.table-list-row.color-orange {border-left: 5px solid rgb(255, 172, 98)}.task-board.color-grey, .task-summary-container.color-grey, .color-picker-square.color-grey, .task-board-category.color-grey, .table-list-category.color-grey, .task-tag.color-grey {background-color: rgb(238, 238, 238);border-color: rgb(204, 204, 204)}td.color-grey { background-color: rgb(238, 238, 238)}.table-list-row.color-grey {border-left: 5px solid rgb(204, 204, 204)}.task-board.color-brown, .task-summary-container.color-brown, .color-picker-square.color-brown, .task-board-category.color-brown, .table-list-category.color-brown, .task-tag.color-brown {background-color: #d7ccc8;border-color: #4e342e}td.color-brown { background-color: #d7ccc8}.table-list-row.color-brown {border-left: 5px solid #4e342e}.task-board.color-deep_orange, .task-summary-container.color-deep_orange, .color-picker-square.color-deep_orange, .task-board-category.color-deep_orange, .table-list-category.color-deep_orange, .task-tag.color-deep_orange {background-color: #ffab91;border-color: #e64a19}td.color-deep_orange { background-color: #ffab91}.table-list-row.color-deep_orange {border-left: 5px solid #e64a19}.task-board.color-dark_grey, .task-summary-container.color-dark_grey, .color-picker-square.color-dark_grey, .task-board-category.color-dark_grey, .table-list-category.color-dark_grey, .task-tag.color-dark_grey {background-color: #cfd8dc;border-color: #455a64}td.color-dark_grey { background-color: #cfd8dc}.table-list-row.color-dark_grey {border-left: 5px solid #455a64}.task-board.color-pink, .task-summary-container.color-pink, .color-picker-square.color-pink, .task-board-category.color-pink, .table-list-category.color-pink, .task-tag.color-pink {background-color: #f48fb1;border-color: #d81b60}td.color-pink { background-color: #f48fb1}.table-list-row.color-pink {border-left: 5px solid #d81b60}.task-board.color-teal, .task-summary-container.color-teal, .color-picker-square.color-teal, .task-board-category.color-teal, .table-list-category.color-teal, .task-tag.color-teal {background-color: #80cbc4;border-color: #00695c}td.color-teal { background-color: #80cbc4}.table-list-row.color-teal {border-left: 5px solid #00695c}.task-board.color-cyan, .task-summary-container.color-cyan, .color-picker-square.color-cyan, .task-board-category.color-cyan, .table-list-category.color-cyan, .task-tag.color-cyan {background-color: #b2ebf2;border-color: #00bcd4}td.color-cyan { background-color: #b2ebf2}.table-list-row.color-cyan {border-left: 5px solid #00bcd4}.task-board.color-lime, .task-summary-container.color-lime, .color-picker-square.color-lime, .task-board-category.color-lime, .table-list-category.color-lime, .task-tag.color-lime {background-color: #e6ee9c;border-color: #afb42b}td.color-lime { background-color: #e6ee9c}.table-list-row.color-lime {border-left: 5px solid #afb42b}.task-board.color-light_green, .task-summary-container.color-light_green, .color-picker-square.color-light_green, .task-board-category.color-light_green, .table-list-category.color-light_green, .task-tag.color-light_green {background-color: #dcedc8;border-color: #689f38}td.color-light_green { background-color: #dcedc8}.table-list-row.color-light_green {border-left: 5px solid #689f38}.task-board.color-amber, .task-summary-container.color-amber, .color-picker-square.color-amber, .task-board-category.color-amber, .table-list-category.color-amber, .task-tag.color-amber {background-color: #ffe082;border-color: #ffa000}td.color-amber { background-color: #ffe082}.table-list-row.color-amber {border-left: 5px solid #ffa000}</style></head><body>';
        }
        
        $project = $this->getProject();
        $task_ids = $this->taskFinderModel->getAllIds($project['id']);
        $files_to_embed = array();

        foreach ($task_ids as $task_id) {
        $task = $this->taskFinderModel->getDetails($task_id);
        $subtasks = $this->subtaskModel->getAll($task['id']);
        $files = $this->taskFileModel->getAllDocuments($task['id']);
        $files_to_embed = array_merge($files_to_embed, $this->taskFileModel->getAll($task['id']));
        $commentSortingDirection = $this->userMetadataCacheDecorator->get(UserMetadataModel::KEY_COMMENT_SORTING_DIRECTION, 'ASC');

        $html = $this->template->render('Task2pdf:printlayout/printlayout_n', array(
            'project' => $this->projectModel->getById($task['project_id']),
            'comments' => $this->commentModel->getAll($task['id'], $commentSortingDirection),
            'subtasks' => $subtasks,
            'files' => $files,
            'images' => $this->taskFileModel->getAllImages($task['id']),
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
        
        $html_all = $html_all . $html . '<div style="page-break-after: always;"></div>';
        
        }

        $html_all = $html_all . '</body></html>';
        $dompdf->loadHtml($html_all);
     

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        if ($this->configModel->get('task2pdf_embed_projects', 1) == 1) {
            $cpdf = $dompdf->get_canvas()->get_cpdf();
            foreach ($files_to_embed as $file){
                
                $cpdf->addEmbeddedFile(
                    FILES_DIR. '/' . $file['path'],
                    $file['name'],
                    ''
                );
            }  
        }

        // Output the generated PDF to Browser inline or as PDF download
        if ($this->configModel->get('task2pdf_attachment', 1) == 1) { 
			$dompdf->stream($project['id'] . '_' . $project['name'] . '.pdf', array("Attachment" => false));
        } else { 
			$dompdf->stream($project['id'] . '_' . $project['name'] . '.pdf');
        }

    }

}
