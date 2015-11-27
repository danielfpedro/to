<?php foreach ($campanhas as $campanha): ?>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <?= $this->Html->image($campanha->imgFullPath) ?>
                <div class="caption">
                    <h3><?= $this->Html->link($campanha->title, $campanha->url) ?></h3>
                    <p><?= $this->Html->link($campanha->text, $campanha->url) ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>