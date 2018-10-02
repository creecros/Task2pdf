<section class="accordion-section <?= empty($subtasks) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Sub-Tasks') ?></h3>
    </div>
    <div class="accordion-content">
        <?= $this->render('Task2pdf:printlayout/subtable', array(
            'subtasks' => $subtasks,
            'task' => $task,
            'editable' => $editable
        )) ?>
    </div>
</section>
