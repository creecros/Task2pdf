<section class="accordion-section <?= empty($comments) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Comments') ?></h3>
    </div>
    <div class="accordion-content comments" id="comments">
        <?php foreach ($comments as $comment): ?>
            <?= $this->render('Task2pdf:printlayout/comments_show', array(
                'comment'   => $comment,
                'task'      => $task,
                'project'   => $project,
                'editable'  => $editable,
                'is_public' => isset($is_public) && $is_public,
            )) ?>
        <?php endforeach ?>
    </div>
</section>

