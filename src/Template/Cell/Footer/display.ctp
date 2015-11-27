<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?= $this->Html->image('logo_footer.jpng') ?>
            </div>
            <div class="col-md-8 text-right">
                <ul class="list-inline">
                    <?php foreach ($socials as $social): ?>
                        <li>
                            <?= $this->Html->link($this->Html->faIcon($social['icon']), $social['url'], ['escape' => false]) ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>