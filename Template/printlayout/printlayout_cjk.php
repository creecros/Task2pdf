<!DOCTYPE html>
<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
   @font-face {
      font-family: 'Droid Sans';
      font-style: normal;
      font-weight: 400;
      src: url('/plugins/Task2pdf/font/DroidSansFallback.ttf') format('truetype');
      src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format('truetype');
    }
    @font-face {
      font-family: 'Droid Sans';
      font-style: normal;
      font-weight: bold;
      src: url('/plugins/Task2pdf/font/DroidSansFallback.ttf') format('truetype');
      src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format('truetype');
    }
     @font-face {
      font-family: 'Droid Sans';
      font-style: normal;
      font-weight: bold;
      font-style: italic;
      src: url('/plugins/Task2pdf/font/DroidSansFallback.ttf') format('truetype');
      src: url(https://github.com/creecros/Task2pdf/blob/master/font/DroidSansFallback.ttf?raw=true) format('truetype');
    }
    * {
      font-family: Droid Sans, DejaVu Sans, sans-serif;
    }
  </style>
    </head>
<body>     
    <section id="main" class="public-task">
    <a style="display: inline-block; font-size:12px; text-align: left; width: 100%; word-wrap: break-word;"> 
    <?= $this->render('Task2pdf:printlayout/details', array(
        'task' => $task,
        'tags' => $tags,
        'project' => $project,
        'editable' => false,
    )) ?>
    </a>
    <br>
    <a style=" display: inline-block; font-size:14px; text-align: left; width: 95%; word-wrap: break-word;"> 
   <?php if (!empty($task['description'])): ?>
    <?= $this->render('Task2pdf:printlayout/description', array(
        'task' => $task,
        'project' => $project,
        'is_public' => true,
    )) ?>
   <?php endif ?>
   <?php if(!empty($subtasks)): ?>
    <?= $this->render('Task2pdf:printlayout/subtasks', array(
        'task' => $task,
        'subtasks' => $subtasks,
        'editable' => false
    )) ?>
   <?php endif ?>
   <?php if (!empty($files) || !empty($images)): ?>
    <?= $this->render('Task2pdf:printlayout/files', array(
        'task' => $task,
        'files' => $files,
        'images' => $images
    )) ?>
   <?php endif ?>
   <?php if (!empty($links)): ?>
    <?= $this->render('Task2pdf:printlayout/internal_links', array(
        'task' => $task,
        'links' => $links,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>
   <?php endif ?>
   <?php if (!empty($comments)): ?>
    <?= $this->render('Task2pdf:printlayout/comments', array(
        'task' => $task,
        'comments' => $comments,
        'project' => $project,
        'editable' => false,
        'is_public' => true,
    )) ?>
   <?php endif ?>
    </a>
</section>
</body>
</html>


