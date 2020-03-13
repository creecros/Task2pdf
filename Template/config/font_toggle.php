<div class="panel">Set PDF Fonts
    <?= $this->form->radio('task2pdf_cjk', 'Normal Font set when creating PDFs' , 1, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==1) ?>
    <?= $this->form->radio('task2pdf_cjk', 'CJK Font set when creating PDFs' , 2, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==2) ?>
</div>
<div class="panel">Set PDF Output
	<?= $this->form->radio('task2pdf_attachment', 'Show PDF inline Browser' , 1, isset($values['task2pdf_attachment'])&& $values['task2pdf_attachment']==1) ?>
    <?= $this->form->radio('task2pdf_attachment', 'Download pdf' , 2, isset($values['task2pdf_attachment'])&& $values['task2pdf_attachment']==2) ?>
	
</div>
