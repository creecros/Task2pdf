<section id="main" class="public-task">
    <a style=" display: inline-block; font-size:12px; text-align: left; width: 100%; word-wrap: break-word;"> 
    <?= $this->hook->render('task2pdf:printlayout:beforedetails') ?>
    <?= $this->render('Task2pdf:printlayout/details', array(
        'task' => $task,
        'tags' => $tags,
        'project' => $project,
        'editable' => false,
        'printlayout' => true,
    )) ?>
    </a>
    <br>
    <a style=" display: inline-block; font-size:14px; text-align: left; width: 95%; word-wrap: break-word;"> 
    <?= $this->hook->render('task2pdf:printlayout:beforedescription') ?>
   <?php if (!empty($task['description'])): ?>
    <?= $this->render('Task2pdf:printlayout/description', array(
        'task' => $task,
        'project' => $project,
        'is_public' => true,
    )) ?>
   <?php endif ?>
   <?= $this->hook->render('task2pdf:printlayout:beforesubtasks') ?>
   <?php if(!empty($subtasks)): ?>
    <?= $this->render('Task2pdf:printlayout/subtasks', array(
        'task' => $task,
        'subtasks' => $subtasks,
        'editable' => false
    )) ?>
   <?php endif ?>
   <?= $this->hook->render('task2pdf:printlayout:beforefiles') ?>
   <?php if (!empty($files) || !empty($images)): ?>
    <?= $this->render('Task2pdf:printlayout/files', array(
        'task' => $task,
        'files' => $files,
        'images' => $images
    )) ?>
   <?php endif ?>
   <?= $this->hook->render('task2pdf:printlayout:beforeinternallinks') ?>
   <?php if (!empty($links)): ?>
    <?= $this->render('Task2pdf:printlayout/internal_links', array(
        'task' => $task,
        'links' => $links,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>
   <?php endif ?>
   <?= $this->hook->render('task2pdf:printlayout:beforecomments') ?>
   <?php if (!empty($comments)): ?>
    <?= $this->render('Task2pdf:printlayout/comments', array(
        'task' => $task,
        'comments' => $comments,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>
   <?php endif ?>
   <?= $this->hook->render('task2pdf:printlayout:bottomoflayout') ?>
    </a>
</section>
