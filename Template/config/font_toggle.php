<div class="panel"><h1>Task2PDF Options</h1>
    <br>
    <h2><?= t('Font Options') ?>:</h2>
    <?= $this->form->radio('task2pdf_cjk', t('Normal Font set when creating PDFs') , 1, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==1) ?>
    <?= $this->form->radio('task2pdf_cjk', t('CJK Font set when creating PDFs') , 2, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==2) ?>
    <br>
    <h2><?= t('Embed Task Files Options') ?>:</h2>
	<?= $this->form->radio('task2pdf_embed_task', t('Embed Files when creating a PDF for a Task') , 1, isset($values['task2pdf_embed_task'])&& $values['task2pdf_embed_task']==1) ?>
    <?= $this->form->radio('task2pdf_embed_task', t('Do not embed Files when creating a PDF for a Task') , 2, isset($values['task2pdf_embed_task'])&& $values['task2pdf_embed_task']==2) ?>
    <?= $this->form->radio('task2pdf_embed_projects', t('Embed Files when creating a PDF for all Open Tasks in a Project') , 1, isset($values['task2pdf_embed_projects'])&& $values['task2pdf_embed_projects']==1) ?>
    <?= $this->form->radio('task2pdf_embed_projects', t('Do Not Embed Files when creating a PDF for all Open Tasks in a Project') , 2, isset($values['task2pdf_embed_projects'])&& $values['task2pdf_embed_projects']==2) ?>
    <br>
    <h2><?= t('PDF Download or Inline') ?>:</h2>
	<?= $this->form->radio('task2pdf_attachment', t('Show PDF inline Browser') , 1, isset($values['task2pdf_attachment'])&& $values['task2pdf_attachment']==1) ?>
    <?= $this->form->radio('task2pdf_attachment', t('Download pdf') , 2, isset($values['task2pdf_attachment'])&& $values['task2pdf_attachment']==2) ?>
    <?= $this->form->radio('task2pdf_attachment', t('Download pdf') , 2, isset($values['task2pdf_attachment'])&& $values['task2pdf_attachment']==2) ?>
</div>
