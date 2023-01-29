        <?php if ($this->user->hasProjectAccess('AnalyticController', 'taskDistribution', $project['id'])): ?>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print All Tasks'), 'PrintTaskController', 'printProjectAll', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print Open Tasks'), 'PrintTaskController', 'printProjectOpen', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print Closed Tasks'), 'PrintTaskController', 'printProjectClosed', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
        <?php endif ?>
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
