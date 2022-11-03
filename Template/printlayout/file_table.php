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
                    <?= $file_count = count($images); ?>
                    <?= $width = 100/$file_count; ?>
                    <img src="data:image/png;base64,<?= base64_encode(file_get_contents(FILES_DIR.DIRECTORY_SEPARATOR.$image['path'])); ?>" 
                        style="width: <?= $width; ?>%;border:1px solid #efefef;border-radius:5px;margin-bottom:20px;box-shadow:4px 2px 10px -6px rgb(0 0 0 / 55%);margin-right: 15px">

        <?php endforeach ?>
    </table>
<?php endif ?>
