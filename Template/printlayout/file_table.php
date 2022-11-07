<?php if (! empty($files) || ! empty($images)): ?>
    <table style="width:100%; position: relative; table-layout: fixed;">
        <tr style="border:1px solid #eee; background-color: #eee; margin-top: 6px; margin-bottom: 6px; position: relative;">
            <th style="text-align:left; padding: 4px;"><?= t('Filename') ?></th>
            <th style="text-align:left; padding: 4px;"><?= t('Creator') ?></th>
            <th style="text-align:left; padding: 4px;"><?= t('Date') ?></th>
            <th style="text-align:left; padding: 4px;"><?= t('Size') ?></th>
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
    </table>
    <br>
    <table style="width:100%; position: relative; table-layout: fixed;">
        <tr style="background-color: #fff;">
        <?php $c = 0; ?>
        <?php foreach ($images as $image): ?>
        <?php $c = $c + 1; ?>
            <?php if ($c == 6): ?>
                <?php $c = 0; ?>
                </tr>
                <tr style="background-color: #fff;">
            <?php endif ?>
                <td>
                    <br><img src="data:image/png;base64,<?= base64_encode(file_get_contents(FILES_DIR.DIRECTORY_SEPARATOR.$image['path'])); ?>" 
                        style="width: 100px; border:1px solid #000; border-radius:3px; margin-bottom:10px; box-shadow:4px 2px 10px -6px rgb(0 0 0 / 55%); margin: 0 15px 0 0; /*max-height:100px;*/"></br>
                        <br><?= $this->text->e($image['name'] ?: $image['name']) ?></br>
                        <br><?= $this->dt->date($image['date']) ?></br>
                        <br><?= $this->text->bytes($image['size']) ?></br>
                </td>
            
        <?php endforeach ?>
        </tr>
    </table>
<?php endif ?>
