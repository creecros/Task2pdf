<style type="text/css">
    img.enlargable {
        max-width: 300px;
        max-height: 300px;
        cursor: zoom-in;
        margin: 20px 10px 7px 10px;
        /*display: inline-block !important;*/
    }
    .markdown p {
        margin-bottom: 60px;
    }
    .accordion-content {
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .accordion-title h3 {
        margin-bottom: 0;
    }
</style>
<section class="accordion-section <?= empty($task['description']) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Description') ?></h3>
    </div>
    <div class="accordion-content">
        <article class="markdown">
            <?= $this->text->markdown($this->task->printModel->codeblockFix($task['description']), isset($is_public) && $is_public) ?>
        </article>
    </div>
</section>
