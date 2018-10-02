<div class="comment <?= isset($preview) ? 'comment-preview' : '' ?>" id="comment-<?= $comment['id'] ?>">
    <div class="comment-title">
        <?php if (! empty($comment['username'])): ?>
            <strong class="comment-username"><?= $this->text->e($comment['name'] ?: $comment['username']) ?></strong>
        <?php endif ?>
        <small class="comment-date"><?= t('Created at:') ?> <?= $this->dt->datetime($comment['date_creation']) ?></small>
        <small class="comment-date"><?= t('Updated at:') ?> <?= $this->dt->datetime($comment['date_modification']) ?></small>
    </div>
    <div class="comment-content">
        <div class="markdown">
            <?= $this->text->markdown($comment['comment'], isset($is_public) && $is_public) ?>
        </div>
    </div>
</div>
