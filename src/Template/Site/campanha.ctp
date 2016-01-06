<?= $this->Html->css('../lib/remodal/dist/remodal', ['inline' => false]) ?>
<?= $this->Html->css('../lib/remodal/dist/remodal-default-theme', ['inline' => false]) ?>
<?= $this->Html->script('../lib/remodal/dist/remodal.min', ['inline' => false]) ?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '748363715295010',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			console.log(response);
		});
	}

	function openModal(){
		console.log('Carregando Ajax');
		$('.modal-body').html('Carregando...');
		$('#my-modal').modal();
		$('.modal-body').load($('#abre-modal').attr('href'), function(){
			$('.modal-footer > .btn').attr('disabled', false);
		});	
	}
	function logarFacebook() {
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				openModal();
			}
			else {
				FB.login(function(){
					logarFacebook();
				});
			}
		});
	}
</script>

<div class="remodal" data-remodal-id="modal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div id="modal-content"></div>
	<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
	<button type="button" class="remodal-confirm">OK</button>
</div>

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $campanha->title ?></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" disabled>Cancelar</button>
        <button type="button" class="btn btn-primary" disabled>Trocar minha foto de perfil!</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
	$ribbonImage = $this->request->webroot . 'files/campanhas/ribbon/' . $campanha->ribbon_dir . '/' . $campanha->ribbon_image_name;
	$ribbonWidth = ($campanha->ribbon_width / 3) . 'px';
	$ribbonHeight = ($campanha->ribbon_height / 3) . 'px';

	$avatarImage = $this->request->webroot . '/img/avatar.png';
?>
<?php echo $this->Html->link('abrirModal', ['controller' => 'Campanhas', 'action' => 'engineModal', $campanha->id], ['id' => 'abre-modal']) ?>
<div class="container">
	<div class="row">
		<!-- MAIN -->
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-4">
					<h2>
						<?= $campanha->title ?>
					</h2>
					<small>Por: <?= $this->Html->link($campanha->user->name, ['controller' => 'Site', 'action' => 'campanhasByUser', $campanha->user->id]) ?></small>
					<p>
						<?= $campanha->texto ?>
					</p>
					<h4>6540 Pessoas apoiam esta campanham</h4>
					<h5>Compartilhar Campanha</h5>
					<?= $this->Html->link($this->Html->faIcon('facebook') . ' Apoiar no Facebook', [], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
					<br>
					<?= $this->Html->link($this->Html->faIcon('twitter') . ' Apoiar apoio no Twitter', [], ['class' => 'btn btn-info btn-xs', 'escape' => false]) ?>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4">
							<div class="img-container" style="background-image: url(<?= $avatarImage ?>); width: 132px; height: 132px;">
								<img
									src="<?= $ribbonImage ?>"
									class="img-inside"
									style="width: <?= $ribbonWidth ?>; height: <?= $ribbonHeight ?>; margin-left: <?= $campanha->ribbon_left / 3 ?>px; margin-top: <?= $campanha->ribbon_top / 3 ?>px; opacity: <?= $campanha->ribbon_opacity ?>!important">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<button type="button" class="btn btn-primary" onClick="logarFacebook()">
									Usar no facebook
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2>Escolhidos</h2>
			<?= $this->cell('CampanhasHome', ['escolhidos']) ?>

			<h2>Populares</h2>
			<?= $this->cell('CampanhasHome', ['populares']) ?>
		</div>
		<div class="col-md-2">
			<?= $this->cell('Sidemenu') ?>
		</div>
	</div>
</div>