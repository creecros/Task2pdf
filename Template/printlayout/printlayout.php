<section id="main" class="public-task">
    <a style=" display: inline-block; font-size:12px; text-align: left; width: 100%;"> 
    <?= $this->render('Task2pdf:printlayout/details', array(
        'task' => $task,
        'tags' => $tags,
        'project' => $project,
        'editable' => false,
    )) ?>
    </a>
    <br>
    <a style=" display: inline-block; font-size:14px; text-align: left; width: 95%;"> 
    <?= $this->render('task/description', array(
        'task' => $task,
        'project' => $project,
        'is_public' => true,
    )) ?>

    <?= $this->render('Task2pdf:printlayout/subtasks', array(
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
    </a>
</section>

