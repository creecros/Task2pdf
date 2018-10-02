<?php if (! empty($subtasks)): ?>
    <table style="border:1px solid #eee;border-collapse:collapse;width:100%;">

        <tr style="background-color: #eee;">
            <th><?= t('     Title') ?></th>
            <th><?= t('Assignee') ?></th>
            <?= $this->hook->render('template:subtask:table:header:before-timetracking') ?>
            <th><?= t('Time tracking') ?></th>
        </tr>
        <?php foreach ($subtasks as $subtask): ?>
        <tr style="background-color: #fff;">
            <td>
                <?php if ($subtask['status'] > 1): ?>
                    <?= t('[x] ') ?>
                    <?= $this->subtask->renderTitle($subtask) ?>
                <?php else: ?>
                    <?= t('[  ] ') ?>
                    <?= $this->subtask->renderTitle($subtask) ?>
                <?php endif ?>
            </td>
            <td>
                <?php if (! empty($subtask['username'])): ?>
                    <?= $this->text->e($subtask['name'] ?: $subtask['username']) ?>
                <?php endif ?>
            </td>
            <?= $this->hook->render('template:subtask:table:rows', array('subtask' => $subtask)) ?>
            <td>
                <?= $this->render('subtask/timer', array(
                    'task'    => $task,
                    'subtask' => $subtask,
                )) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
