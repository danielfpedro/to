<script>
    $(function(){
        var webroot = $('#webroot').val();
        var maiorLado;
        var max = 396;

        $('#slider-opacity').slider({
            min: 0.1,
            max: 1,
            step: 0.1,
            value: $('#ribbon-opacity').val(),
            slide: function(event, ui){
                console.log(ui.value);
                $('#ribbon-opacity').val(ui.value);
                $('.img-inside').css('opacity', ui.value);
            }
        });

        //var maiorLado = (width >= height) ? 'width' : 'height';

        $('#slider-width').slider({
            min: 15,
            max: (max / 3),
            step: 1,
            value: ($('#ribbon-' + maiorLado).val() / 3),
            slide: function(event, ui){
                
                $('.img-inside').css({top: 0, left: 0});

                resizeAndKeepAspectRatio(ui.value, maiorLado.label);
                $('#ribbon-width').val($('.img-inside').width() * 3);
                $('#ribbon-height').val($('.img-inside').height() * 3);
            }
        });
        function resizeAndKeepAspectRatio(newValue, side){
            var otherSide = (side == 'width') ? 'height' : 'width';
            var fraction = (newValue * 100) / ($('#ribbon-image-' + side).val() / 3);
            var newOtherSideValue = (($('#ribbon-image-' + otherSide).val() / 3) * fraction) / 100;
            $(".img-inside").css(side, newValue + 'px');
            $(".img-inside").css(otherSide, newOtherSideValue + 'px');
        }
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var image  = new Image();

                reader.onload = function (e) {
                    
                    image.src = e.target.result;

                    image.onload = function(){
                        var h = this.height;
                        var w = this.width;
                        
                        var newH;
                        var newW;

                        if (w >= h) {
                            maiorLado = {label: 'width', value: w};
                        } else {
                            maiorLado = {label: 'height', value: h};
                        }

                        if (maiorLado.value > max) {
                            if (maiorLado.label == 'width') {
                                newW = max;
                                newH = calcProporcao(w, max, h);
                            } else {
                                newW = calcProporcao(h, max, w);
                                newH = max;
                            }
                            maiorLado.value = max;
                        } else {
                            newW = w;
                            newH = h;
                        }

                        $('.img-inside').attr('src', e.target.result);
                        $('.img-inside').css({top: 0 + 'px', left: 0 + 'px'});
                        $('.img-inside').css({width: (newW / 3) + 'px', height: (newH / 3) + 'px'});

                        $('#ribbon-left').val(0);
                        $('#ribbon-top').val(0);

                        $('#ribbon-width').val(newW);
                        $('#ribbon-height').val(newH);

                        $('#ribbon-image-width').val(newW);
                        $('#ribbon-image-height').val(newH);

                        $('#slider-width').slider('option', 'value', maiorLado.value / 3);
                        $('#slider-width').slider('option', 'max', maiorLado.value / 3);
                    };
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function resizeImg(size){
            max = 400;
            if (size.w > size.h) {
                size.newW = max;
                size.newH = calcProporcao(size.w, max, size.h);
            } else {
                size.newH = max;
                size.newW = calcProporcao(size.h, max, size.w);
            }
            return size;
        }
        function calcProporcao(maior, novoValor, menor){
            percent = (novoValor*100) / maior;
            novoMenor = (menor*percent) / 100;
            return Math.round(novoMenor);
        }
        function validateSize(width, height){
            var message = '';
            var max = 400;
            // if (width > max) {
            //     message = 'A largura da imagem não pode ser maior que '+max+' ('+width+'px informado)';
            // }
            // if (height > max) {
            //     message = 'A altura da imagem não pode ser maior que '+max+' ('+height+'px informado)';
            // }
            // if (message) {
            //     alert(message);
            //     return false;
            // }
            return true;
        }
        /**
         * Somente para edição
         */
        var ribbonDir = $('#ribbon-dir').val();
        if (ribbonDir) {
            var imageName = $('#ribbon-image-name').val();

            var imageWidth = parseInt($('#ribbon-image-width').val());
            var imageHeight = parseInt($('#ribbon-image-height').val());

            var width = parseInt($('#ribbon-width').val());
            var height = parseInt($('#ribbon-height').val());

            var top = parseInt($('#ribbon-top').val());
            var left = parseInt($('#ribbon-left').val());

            var opacity = $('#ribbon-opacity').val();

            $('.img-inside').attr('src', webroot + 'files/campanhas/ribbon/' + ribbonDir + '/' + imageName);
            $('.img-inside').css({top: (top / 3) + 'px', left: (left / 3) + 'px'});
            $('.img-inside').css({opacity: opacity});
            $('.img-inside').css({width: (width / 3) + 'px', height: (height / 3) + 'px'});

            if (width >= height) {
                maiorLado = {label: 'width', value: width};
                maxSlider = imageWidth;
            } else {
                maiorLado = {label: 'height', value: height};
                maxSlider = imageHeight;
            }

            $('#slider-width').slider('option', 'value', maiorLado.value / 3);
            $('#slider-width').slider('option', 'max', maxSlider / 3);
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
                console.log(ui.position);
                $('#ribbon-top').val(ui.position.top * 3);
                $('#ribbon-left').val(ui.position.left * 3);
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
        
        $('#opacity-placeholder').change(function(){
            var value = $(this).val();
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div style="background-image: url(http://graph.facebook.com/<?= $authUser['facebook_id'] ?>/picture?type=square&width=140&height=140);background-size: cover; background-position: top center; width: 132px; height: 132px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <?php $imgInside = $this->request->webroot . 'img/ribbon_test.png' ?>
                    <div class="img-preview"></div>
                    <button class="btn btn-primary btn-xs" id="load-img">Enviar</button>
                </div>
                <div class="col-md-3">
                    <div class="img-container" style="background-image: url(http://graph.facebook.com/<?= $authUser['facebook_id'] ?>/picture?type=square&width=140&height=140); bakground-size: cover; width: 132px; height: 132px;">

<!--                         <div class="img-inside">
                            <div id="swgrip" class="ui-resizable-handle ui-resizable-sw"></div>
                            <div id="segrip" class="ui-resizable-handle ui-resizable-se"></div>
                            <div id="nwgrip" class="ui-resizable-handle ui-resizable-nw"></div>
                            <div id="ngrip" class="ui-resizable-handle ui-resizable-n"></div>
                            <div id="negrip" class="ui-resizable-handle ui-resizable-ne"></div>
                        </div> -->
                        <img src="" class="img-inside" alt="">
                    </div>
                    
                </div>
                <div class="col-md-3">
                    opacity
                    <div id="slider-opacity"></div>
                    width
                    <div id="slider-width"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->Form->create($campanha, ['horizontal' => true, 'type' => 'file']) ?>
                        <?php
                            echo $this->Form->input('ribbon_image_name');

                            echo $this->Form->input('ribbon_width');
                            echo $this->Form->input('ribbon_height');

                            echo $this->Form->input('ribbon_image_width');
                            echo $this->Form->input('ribbon_image_height');

                            echo $this->Form->input('webroot', ['value' => $this->request->webroot]);
                            echo $this->Form->input('facebook_id_placeholder', ['value' => $authUser['facebook_id']]);
                            echo $this->Form->input('ribbon_dir');
                            echo $this->Form->input('title');
                            echo $this->Form->input('text');
                            echo $this->Form->input('tags');
                            echo $this->Form->input('categoria_id', ['empty' => __('Selecione a categoria')]);
                            
                            echo $this->Form->input('ribbon', ['type' => 'file']);
                            echo $this->Form->input('ribbon_top');
                            echo $this->Form->input('ribbon_left');
                            echo $this->Form->input('ribbon_opacity');
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