        <?php if ($this->user->hasProjectAccess('ExportController', 'tasks', $project['id'])): ?>
            <li>
                <?= $this->url->icon('file-pdf-o', t('Print Open Tasks'), 'PrintTaskController', 'printProject', ['plugin' => 'task2pdf', 'project_id' => $project['id']]) ?>
            </li>
        <?php endif ?>
