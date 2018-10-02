<?php if (! empty($links)): ?>
<table class="task-links-table table-striped table-scrolling" style="border:1px solid #eee;border-collapse:collapse;width:100%;">
    <?php foreach ($links as $label => $grouped_links): ?>
        <?php $hide_td = false ?>
        <?php foreach ($grouped_links as $link): ?>
            <?php if (! $hide_td): ?>
                <tr style="background-color: #eee;">>
                    <th>
                        <?= t('This task') ?>
                        <em><?= t($label) ?></em>
                        <span class="task-links-task-count">(<?= count($grouped_links) ?>)</span>
                    </th>
                    <th><?= t('Assignee') ?></th>
                    <th><?= t('Time tracking') ?></th>
                </tr>
                <?php $hide_td = true ?>
            <?php endif ?>
        <tr style="background-color: #fff;">>
            <td>
                <?php if ($is_public): ?>
                    <?= $this->url->link(
                        $this->text->e('#'.$link['task_id'].' '.$link['title']),
                        'TaskViewController',
                        'readonly',
                        array('task_id' => $link['task_id'], 'token' => $project['token']),
                        false,
                        $link['is_active'] ? '' : 'task-link-closed'
                    ) ?>
                <?php else: ?>
                    <?= $this->url->link(
                        $this->text->e('#'.$link['task_id'].' '.$link['title']),
                        'TaskViewController',
                        'show',
                        array('task_id' => $link['task_id'], 'project_id' => $link['project_id']),
                        false,
                        $link['is_active'] ? '' : 'task-link-closed'
                    ) ?>
                <?php endif ?>

                (<?php if ($link['project_id'] != $project['id']): ?><?= $this->text->e($link['project_name']) ?> - <?php endif ?><?= $this->text->e($link['column_title']) ?>)
            </td>
            <td>
                <?php if (! empty($link['task_assignee_username'])): ?>
                    <?php if ($editable): ?>
                        <?= $this->url->link($this->text->e($link['task_assignee_name'] ?: $link['task_assignee_username']), 'UserViewController', 'show', array('user_id' => $link['task_assignee_id'])) ?>
                    <?php else: ?>
                        <?= $this->text->e($link['task_assignee_name'] ?: $link['task_assignee_username']) ?>
                    <?php endif ?>
                <?php endif ?>
            </td>
            <td>
                <?php if (! empty($link['task_time_spent'])): ?>
                    <?= t('%sh spent', n($link['task_time_spent'])) ?>
                <?php endif ?>
                <?php if (! empty($link['task_time_spent']) && ! empty($link['task_time_estimated'])): ?>/<?php endif ?>
                <?php if (! empty($link['task_time_estimated'])): ?>
                    <?= t('%sh estimated', n($link['task_time_estimated'])) ?>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    <?php endforeach ?>
</table>
<?php endif ?>
