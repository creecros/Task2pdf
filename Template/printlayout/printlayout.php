<!DOCTYPE html>
<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
@font-face {
  font-family: 'Source Han Sans Web';
  font-style: normal;
  font-weight: 100;
  src: url('fonts/SourceHanSans-ExtraLight.otf') format('opentype');
}
 
@font-face {
  font-family: 'Source Han Sans Web';
  font-style: normal;
  font-weight: 200;
  src: url('fonts/SourceHanSans-Light.otf') format('opentype');
}
 
@font-face {
  font-family: 'Source Han Sans Web';
  font-style: normal;
  font-weight: 300;
  src: url('fonts/SourceHanSans-Normal.otf') format('opentype');
}
 
@font-face {
   font-family: 'Source Han Sans Web';
   font-style: normal;
   font-weight: 400;
   src: url('fonts/SourceHanSans-Regular.otf') format('opentype');
}
 
@font-face {
   font-family: 'Source Han Sans Web';
   font-style: normal;
   font-weight: 500;
   src: url('fonts/SourceHanSans-Medium.otf') format('opentype');
}
 
@font-face {
   font-family: 'Source Han Sans Web';
   font-style: normal;
   font-weight: 700;
   src: url('fonts/SourceHanSans-Bold.otf') format('opentype');
}
 
@font-face {
   font-family: 'Source Han Sans Web';
   font-style: normal;
   font-weight: 900;
   src: url('fonts/SourceHanSans-Heavy.otf') format('opentype');
}
* {
font-family: Source Han Sans Web, DejaVu Sans, sans-serif;
}
  </style>
    </head>
<body>     
    <section id="main" class="public-task">
    <a style=" display: inline-block; font-size:12px; text-align: left; width: 100%; word-wrap: break-word;"> 
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


