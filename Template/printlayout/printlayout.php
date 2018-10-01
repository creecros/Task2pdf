<section id="main" class="public-task">
    <?= $this->render('Task2pdf:printlayout/details', array(
        'task' => $task,
        'tags' => $tags,
        'project' => $project,
        'editable' => false,
    )) ?>

    <?= $this->render('task/description', array(
        'task' => $task,
        'project' => $project,
        'is_public' => true,
    )) ?>

    <?= $this->render('subtask/show', array(
        'task' => $task,
        'subtasks' => $subtasks,
        'editable' => false
    )) ?>

    <?= $this->render('task_internal_link/show', array(
        'task' => $task,
        'links' => $links,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>

    <?= $this->render('task_comments/show', array(
        'task' => $task,
        'comments' => $comments,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>
</section>