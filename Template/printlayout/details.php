<section id="task-summary">
    <h2><?= $this->text->e($project['name']) ?>
        <?= t(' > #') ?>
        <?= $this->text->e($task['id']) ?>
        <?= t(' ') ?>
        <?= $this->text->e($task['title']) ?>
    </h2>
    
        <?= $this->hook->render('template:task:details:top', array('task' => $task)) ?>

    <div class="task-summary-container color-<?= $task['color_id'] ?>">
<table style="width:100%">
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
                    <td>
                        <strong><?= t('Status:') ?></strong>
                        <span>
                        <?php if ($task['is_active'] == 1): ?>
                            <?= t('open') ?>
                        <?php else: ?>
                            <?= t('closed') ?>
                        <?php endif ?>
                        </span>
                    </td>
                    <td>
                            <strong><?= t('Category:') ?></strong>
                            <span><?= $this->text->e($task['category_name']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Assignee:') ?></strong>
                        <span>
                        <?php if ($task['assignee_username']): ?>
                            <?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>
                        <?php else: ?>
                            <?= t('not assigned') ?>
                        <?php endif ?>
                        </span>
                    </td>
                    <td>
                            <strong><?= t('Due date:') ?></strong>
                            <span><?= $this->dt->datetime($task['date_due']) ?></span>
                    </td>
      </tr>
      <tr>         
                    <td>
                        <strong><?= t('Priority:') ?></strong> <span><?= $task['priority'] ?></span>
                    </td>
                    <td>
                            <strong><?= t('Swimlane:') ?></strong>
                            <span><?= $this->text->e($task['swimlane_name']) ?></span>
                    </td>
                    <td>
                            <strong><?= t('Creator:') ?></strong>
                            <span><?= $this->text->e($task['creator_name'] ?: $task['creator_username']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Started:') ?></strong>
                            <span><?= $this->dt->datetime($task['date_started']) ?></span>
                    </td>   
      </tr>
      <tr>
                    <td>
                            <strong><?= t('Reference:') ?></strong> <span><?= $this->task->renderReference($task) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Column:') ?></strong>
                        <span><?= $this->text->e($task['column_title']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Time estimated:') ?></strong>
                        <span><?= t('%s hours', $task['time_estimated']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Created:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_creation']) ?></span>
                    </td>
      </tr>
      <tr>
                    <td>
                            <strong><?= t('Complexity:') ?></strong> <span><?= $this->text->e($task['score']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Position:') ?></strong>
                        <span><?= $task['position'] ?></span>
                    </td>
                    <td>
                        <strong><?= t('Time spent:') ?></strong>
                        <span><?= t('%s hours', $task['time_spent']) ?></span>
                    </td>
                    <td>
                        <strong><?= t('Modified:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_modification']) ?></span>
                    </td>
      </tr>
      <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <strong><?= t('Finished:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_completed']) ?></span>
                    </td>
      </tr>
      <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>       
                    <td>
                        <strong><?= t('Moved:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_moved']) ?></span>
                    </td>
      </tr>
</table>
</div>
     <a style=" display: inline-block; font-size:14px; text-align: left; line-height:5px;"> 
        <?= $this->hook->render('template:task:details:bottom', array('task' => $task)) ?>
    </a>
</section>
