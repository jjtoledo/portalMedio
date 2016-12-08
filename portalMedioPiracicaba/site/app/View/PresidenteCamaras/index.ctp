<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container presidenteCamaras index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Ex Presidentes da Câmara'); ?></h2>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>													
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novas Fotos'), array('action' => 'add', $cidade['Cidade']['id']), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<?php
				echo '<div class="row">';
				if (count($presidenteCamaras > 0)) {
					for ($i=0; $i < count($presidenteCamaras); $i++) { 						
						echo '<div class="col-sm-6 col-md-4">';
						echo '<div class="thumbnail">';
						echo $this->Html->image($presidenteCamaras[$i]['PresidenteCamara']['foto'], array('class' => ' foto'));
						echo '<div class="caption foto">';
						echo $this->Form->end(); ?>
						<?php echo $this->Form->postLink('<span class="btn btn-danger" role="button">Excluir</span>', array('action' => 'delete', $presidenteCamaras[$i]['PresidenteCamara']['id'], $cidade['Cidade']['id']), array('escape' => false), __('Tem certeza que deseja escluir?'));						
						echo '&nbsp;&nbsp;<span class="btn btn-info edit" id="edit'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'" value="'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'">Descrição</span>';
						echo '<span style="display:none" class="btn btn-default cancel" id="cancel'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'" value="'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'">Cancelar</span>';
						echo '<div style="margin-top: 10px" hidden="true" id="'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'">';
					    echo $this->Form->create('PresidenteCamara', array('type' => 'post', 'class' => 'search-form', 'url' => 'edit/'.$presidenteCamaras[$i]['PresidenteCamara']['id'].'/'.$presidenteCamaras[$i]['PresidenteCamara']['cidade_id']));
					    echo $this->Form->input('id', array('id' => 'FotoId'.$presidenteCamaras[$i]['PresidenteCamara']['id']));	
					    echo $this->Form->input('descricao', array('type' => 'textarea', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Adicione a descrição', 'default' => $presidenteCamaras[$i]['PresidenteCamara']['descricao']));	
					    ?>
					    <div class="submit" style="margin-top: 10px">
					    	<input type="submit" value="Salvar" class="btn btn-success">&nbsp;
					    </div>
				    </div>
				    <?php
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				}
				echo '</div>';
			?>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->

	<script type="text/javascript">
		$(document).on("click", ".edit", function () {
	    // Use $(this) to reference the clicked button
	    var id = $(this).attr("value");
	   	$(this).toggle(300);
	   	$('#cancel'+id).toggle(300);
	    $("#"+id).toggle(300);
	    $("#FotoId"+id).attr('value', id);
		});

		$(document).on("click", ".cancel", function () {
	    // Use $(this) to reference the clicked button
	    var id = $(this).attr("value");
	   	$(this).toggle(300);
	   	$('#edit'+id).toggle(300);
	    $("#"+id).toggle(300);
		});
	</script>

</div><!-- end containing of content -->