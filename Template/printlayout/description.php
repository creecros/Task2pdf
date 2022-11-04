<section class="accordion-section <?= empty($task['description']) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Description') ?></h3>
    </div>
    <style>
	img {
		max-width:100%;
		max-height:100%;
	}
    </style>
    <div class="accordion-content">
        <article class="markdown">
            <?= $this->text->markdown($this->task->printModel->codeblockFix($task['description']), isset($is_public) && $is_public) ?>
        </article>
    </div>
</section>
