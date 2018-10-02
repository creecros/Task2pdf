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
                <?php if ($link['is_active']): ?>
                    <?= $this->text->e('#'.$link['task_id'].' '.$link['title']) ?>
                <?php else: ?>
                <strike>
                    <?= $this->text->e('#'.$link['task_id'].' '.$link['title']) ?>
                </strike>
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
