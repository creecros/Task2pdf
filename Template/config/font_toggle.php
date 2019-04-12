<div class="panel">
    <?= $this->form->radio('task2pdf_cjk', 'Normal Font set when creating PDFs' , 1, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==1) ?>
    <?= $this->form->radio('task2pdf_cjk', 'CJK Font set when creating PDFs' , 2, isset($values['task2pdf_cjk'])&& $values['task2pdf_cjk']==2) ?>
</div>
