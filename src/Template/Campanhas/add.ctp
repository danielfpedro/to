<script>
    $(function(){

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var image  = new Image();

                reader.onload = function (e) {
                    
                    image.src = e.target.result;

                    image.onload = function(){
                        var h = this.height;
                        var w = this.width;

                        if (validateSize(w, h)) {
                            $('.img-preview').css('background-image', 'url('+e.target.result+')');
                            $('.img-inside').css('background-image', 'url('+e.target.result+')');
                            $('.img-inside').css('background-size', '100%');
                            $('.img-inside').css({top: 0, left: 0});

                            $('.img-inside').resizable('option', 'maxHeight', (h / 3));
                            $('.img-inside').resizable('option', 'maxWidth', (w / 3));

                            

                            var greater = w;
                            if (h > w) {
                                greater = h;
                            }
                            $('.img-inside').css({width: (w/3), height: (h/3)});
                            if (greater > (400/3)) {
                                $('.img-preview').css('background-size', 'cover');
                            } else {
                                $('.img-preview').css('background-size', 'auto');
                                // $('.img-inside').css({width: w, height: h});        
                            }
                        } else {
                            $("#ribbon").val('');
                            $('.img-preview').css('background-image', 'url()');
                            $('.img-inside').css('background-image', 'url()');
                        }
                    };
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function validateSize(width, height){
            var message = '';
            var max = 400;
            if (width > max) {
                message = 'A largura da imagem não pode ser maior que '+max+' ('+width+'px informado)';
            }
            if (height > max) {
                message = 'A altura da imagem não pode ser maior que '+max+' ('+height+'px informado)';
            }
            if (message) {
                alert(message);
                return false;
            }
            return true;
        }

        $("#load-img").click(function(){
            $('#ribbon').click();
        });
        $("#ribbon").change(function(){
            readURL(this);
        });

        $('.img-inside').draggable({
            containment: "parent",
            stop: function(event, ui) {
                console.log(ui);
                $('#ribbon-position-top').val(ui.position.top);
                $('#ribbon-position-left').val(ui.position.left);
            }
        });
        $('.img-inside').resizable({
            containment: "parent",
            aspectRatio: true,
            handles: {
                'sw': '#swgrip',
                'se': '#segrip',
                'nw': '#nwgrip',
                'ne': '#negrip',
                // 's': '#sgrip',
            },
            minHeight: 30,
            maxWidth: 30,
            stop: function(event, ui){
                console.log(ui);
                $('#ribbon-width').val(ui.size.width);
                $('#ribbon-height').val(ui.size.height);
            }
        });

        $('#btn-show-info').click(function(){
            var w = $('.img-inside').width();
            var h = $('.img-inside').height();

            var offset = $('.img-inside').offset();

            $('#img-size').val(w + ' X ' + h);

            $('#img-top').val(offset.top - 8);
            $('#img-left').val(offset.left - 8);
        });
        $('.ui-resizable-handle').hide();

        var insideImgOffset = {
            top: $('#offset-top').val() + 'px',
            left: $('#offset-left').val() + 'px',
        };
        
        $('.img-inside').css(insideImgOffset);

        $('.img-container').hover(function(){
            $('.ui-resizable-handle').fadeToggle();
        }, function(){
            $('.ui-resizable-handle').fadeToggle();
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div style="background-image: url(http://graph.facebook.com/<?= $authUser['facebook_id'] ?>/picture?type=square&width=140&height=140);background-size: cover; background-position: top center; width: 140px; height: 140px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <?php $imgInside = $this->request->webroot . 'img/ribbon_test.png' ?>
                    <div class="img-preview"></div>
                    <button class="btn btn-primary btn-xs" id="load-img">Enviar</button>
                </div>
                <div class="col-md-3">
                    <div class="img-container" style="background-image: url(http://graph.facebook.com/<?= $authUser['facebook_id'] ?>/picture?type=square&width=140&height=140); bakground-size: cover;">

                        <?php $imgInside = $this->request->webroot . 'img/ribbon_test.png' ?>
                        <div class="img-inside">
                            <div id="swgrip" class="ui-resizable-handle ui-resizable-sw"></div>
                            <div id="segrip" class="ui-resizable-handle ui-resizable-se"></div>
                            <div id="nwgrip" class="ui-resizable-handle ui-resizable-nw"></div>
                            <div id="negrip" class="ui-resizable-handle ui-resizable-ne"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->Form->create($campanha, ['horizontal' => true, 'type' => 'file']) ?>
                        <?php
                            echo $this->Form->input('title');
                            echo $this->Form->input('text');
                            echo $this->Form->input('tags');
                            echo $this->Form->input('categoria_id', ['empty' => __('Selecione a categoria')]);
                            
                            echo $this->Form->input('ribbon', ['type' => 'file']);
                            echo $this->Form->input('ribbon_position_left');
                            echo $this->Form->input('ribbon_position_top');
                            echo $this->Form->input('ribbon_width');
                            echo $this->Form->input('ribbon_height');

                        ?>
                        <?= $this->Form->button(__('Enviar')) ?>
                    <?= $this->Form->end() ?>  
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?= $this->cell('sidemenu') ?>
        </div>
    </div>
</div>