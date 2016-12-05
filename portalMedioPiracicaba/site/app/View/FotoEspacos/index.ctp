<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container fotos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Fotos de: ' . $espaco['EspacoEvento']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes'), array('controller' => 'espacoEventos', 'action' => 'view', $espaco['EspacoEvento']['id'], $espaco['Cidade']['id']), array('escape' => false)); ?> </li>													
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novas fotos'), array('action' => 'add', $espaco['EspacoEvento']['id']), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<?php
				echo '<div class="row">';
				if (count($fotoEspacos > 0)) {
					for ($i=0; $i < count($fotoEspacos); $i++) { 
						echo '<div class="col-sm-6 col-md-4">';
						echo '<div class="thumbnail">';
						echo $this->Html->image($fotoEspacos[$i]['FotoEspaco']['foto'], array('class' => ' foto'));
						echo '<div class="caption foto">';
						echo $this->Form->end(); ?>
						<?php echo $this->Form->postLink('<span class="btn btn-danger" role="button">Excluir</span>', array('action' => 'delete', $fotoEspacos[$i]['FotoEspaco']['id'], $fotoEspacos[$i]['FotoEspaco']['espaco_evento_id']), array('escape' => false), __('Tem certeza que deseja escluir?'));
						echo '&nbsp;&nbsp;<span class="btn btn-info edit" id="edit'.$fotoEspacos[$i]['FotoEspaco']['id'].'" value="'.$fotoEspacos[$i]['FotoEspaco']['id'].'">Descrição</span>';
						echo '<span style="display:none" class="btn btn-default cancel" id="cancel'.$fotoEspacos[$i]['FotoEspaco']['id'].'" value="'.$fotoEspacos[$i]['FotoEspaco']['id'].'">Cancelar</span>';
						echo '<div style="margin-top: 10px" hidden="true" id="'.$fotoEspacos[$i]['FotoEspaco']['id'].'">';
					    echo $this->Form->create('FotoEspaco', array('type' => 'post', 'class' => 'search-form', 'url' => 'edit/'.$fotoEspacos[$i]['FotoEspaco']['id'].'/'.$fotoEspacos[$i]['FotoEspaco']['espaco_evento_id']));
					    echo $this->Form->input('id', array('id' => 'FotoId'.$fotoEspacos[$i]['FotoEspaco']['id']));	
					    echo $this->Form->input('descricao', array('type' => 'textarea', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Adicione a descrição', 'default' => $fotoEspacos[$i]['FotoEspaco']['descricao']));	
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