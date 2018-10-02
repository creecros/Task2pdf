<section class="accordion-section <?= empty($files) && empty($images) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Attachments') ?></h3>
    </div>
    <div class="accordion-content">
        <?= $this->render('Task2pdf:printlayout/file_table', array('task' => $task, 'files' => $files, 'images' => $images)) ?>
    </div>
</section>
