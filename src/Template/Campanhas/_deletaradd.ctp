<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?= $this->Form->create($campanha, ['horizontal' => true]) ?>
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('text');
                echo $this->Form->input('tags');
                echo $this->Form->input('categoria_id', ['empty' => __('Selecione a categoria')]);
            ?>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>  
        </div>
        <div class="col-md-4">
            <?= $this->cell('sidemenu') ?>
        </div>
    </div>
</div>