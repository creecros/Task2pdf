<?php if (! empty($files) || ! empty($images)): ?>
    <table style="border:1px solid #eee;border-collapse:collapse;width:100%;">
        <tr style="background-color: #eee;">
            <th><?= t('Filename') ?></th>
            <th><?= t('Creator') ?></th>
            <th><?= t('Date') ?></th>
            <th><?= t('Size') ?></th>
        </tr>
        <?php foreach ($files as $file): ?>
            <tr style="background-color: #fff;">
                <td>
                    <?= $this->text->e($file['name']) ?>
                </td>
                <td>
                    <?= $this->text->e($file['username'] ?: $file['username']) ?>
                </td>
                <td>
                    <?= $this->dt->date($file['date']) ?>
                </td>
                <td>
                    <?= $this->text->bytes($file['size']) ?>
                </td>
            </tr>
        <?php endforeach ?>
        <?php foreach ($images as $image): ?>
            <tr style="background-color: #fff;">
                <td>
                    <?= $this->text->e($image['name']) ?>
                </td>
                <td>
                    <?= $this->text->e($image['user_name'] ?: $image['username']) ?>
                </td>
                <td>
                    <?= $this->dt->date($image['date']) ?>
                </td>
                <td>
                    <?= $this->text->bytes($image['size']) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
