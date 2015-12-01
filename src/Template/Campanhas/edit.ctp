<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?= $this->Form->create($campanha, ['horizontal' => true]) ?>
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('text');
                echo $this->Form->input('categoria_id');
            ?>
            <?= $this->Form->button(__('Salvar Alterações')) ?>
            <?= $this->Form->end() ?>  
        </div>
        <div class="col-md-4">
            <?= $this->cell('sidemenu') ?>
        </div>
    </div>
</div>