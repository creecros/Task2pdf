<div class="comment <?= isset($preview) ? 'comment-preview' : '' ?>" id="comment-<?= $comment['id'] ?>">
    <div class="comment-content">
        <div style="background-color:#eee" class="markdown">
            <?= $this->text->markdown($this->task->printModel->codeblockFix($comment['comment']), isset($is_public) && $is_public) ?>
        </div>
    </div>
    <div class="comment-title">
        <a style=" display: inline-block; font-size:9px; text-align: right; width: 100%;"> 
            <?= t('-') ?>
        <?php if (! empty($comment['username'])): ?>
            <strong class="comment-username"><?= $this->text->e($comment['name'] ?: $comment['username']) ?></strong>
        <?php endif ?>
        <small class="comment-date"><?= t('Created at:') ?> <?= $this->dt->datetime($comment['date_creation']) ?></small>
        <small class="comment-date"><?= t('Updated at:') ?> <?= $this->dt->datetime($comment['date_modification']) ?></small>
        </a>
    </div>
</div>
