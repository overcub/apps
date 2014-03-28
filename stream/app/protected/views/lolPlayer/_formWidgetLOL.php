<div id="lol-player-result">
	<?php if($model instanceof LolPlayer ) :?>
	    <table class="table">
          <thead>
            <tr>
              <th>Invocador</th>
              <th>Level</th>
              <th>Server</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $model->name ?></td>
              <td><?php echo $model->level ?></td>
              <td><?php echo $model->server ?></td>
            </tr>
          </tbody>
        </table>
	<?php endif ?>
</div>
<div class="form-horizontal">
	<fieldset>
		<legend>Dados do Invocador <small>Campos obrigatórios <span class="required">*</span></small></legend>
		
		<div class="control-group">
			<label for="LolPlayer_name" class="control-label required">Invocador <span class="required">*</span></label>
			<div class="controls">
				<input type="text" value="" id="LolPlayer_name" name="LolPlayer[name]" maxlength="500" class="span5" autocomplete="off" />
			</div>
		</div>

		<div class="control-group">
			<label for="LolPlayer_server" class="control-label required">Servidor <span class="required">*</span></label>
			<?php /*
			<div id="btn-platform" class="btn-group" data-toggle="buttons-radio">
			    <button type="button" data-value="na" class="btn btn-small">NA</button>
			    <button type="button" data-value="euw" class="btn btn-small">EUW</button>
			    <button type="button" data-value="eune" class="btn btn-small">EUNE</button>
			    <button type="button" data-value="br" class="btn btn-small">BR</button>
			    <button type="button" data-value="tr" class="btn btn-small">TR</button>
			    <button type="button" data-value="ru" class="btn btn-small">RU</button>
			    <button type="button" data-value="lan" class="btn btn-small">LAN</button>
			    <button type="button" data-value="las" class="btn btn-small">LAS</button>
			    <button type="button" data-value="oce" class="btn btn-small">OCE</button>
			</div>	
			*/?>
			<div class="controls">
				<select id="btn-platform">
					<option value="na">NA</option>
					<option value="euw">EUW</option>
					<option value="euw">EUNE</option>
					<option value="br">BR</option>
					<option value="tr">TR</option>
					<option value="ru">RU</option>
					<option value="lan">LAN</option>
					<option value="las">LAS</option>
					<option value="oce">OCE</option>
				</select>
			</div>
		</div>

		<div class="form-actions">
			<button data-loading-text="Buscando..." id="btn-load-lol-player" type="button" class="btn btn-primary">Buscar</button>	
		</div>
	</fieldset>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		$('#btn-load-lol-player').on('click', function() {
			var name = $('#LolPlayer_name').val(),
			//platform = $('#btn-platform .btn.active').attr('data-value'),
			platform = $('#btn-platform').val(),
			resultPlayers = "",	
			conteudo = "";	
			if(name == "" || platform == ""){
				alert('ops! faltou incluir o nome do invocador e o server.');
			}else{
				$.ajax({
				    url: '/lolplayer/findSummonerBasic', // The URL to the API. You can get this by clicking on "Show CURL example" from an API profile
				    type: 'POST',
				    crossDomain: true,
					data : {
						LolPlayer : {
							name : name,
							server : platform
						}
					},
				    success: function(data) {
				    	window.location.reload();
				    }
				});
			}
		});
	});
</script>