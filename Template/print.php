<?php if ($this->user->hasProjectAccess('metadata', 'index', $task['project_id'])): ?>
    <li class="pdf-menu-item">
        <i class="fa fa-file-pdf-o fa-fw"></i>
        <?= $this->url->link(t('Create PDF'), 'PrintTaskController', 'printTask', ['plugin' => 'task2pdf', 'task_id' => $task['id'], 'project_id' => $task['project_id']]) ?>
    </li>
<?php endif ?>
