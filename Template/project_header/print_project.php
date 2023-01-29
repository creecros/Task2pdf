        <?php if ($this->user->hasProjectAccess('ExportController', 'tasks', $project['id'])): ?>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print All Tasks for This User'), 'PrintTaskController', 'printProjectPerUser', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print Open Tasks for This User'), 'PrintTaskController', 'printProjectPerUserOpen', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print Closed Tasks for This User'), 'PrintTaskController', 'printProjectPerUserClosed', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
        <?php endif ?>
