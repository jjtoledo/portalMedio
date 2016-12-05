<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container fotos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Fotos de: ' . $politico['Politico']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes'), array('controller' => 'politicos', 'action' => 'view', $politico['Politico']['id'], $politico['Cidade']['id']), array('escape' => false)); ?> </li>													
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novas fotos'), array('action' => 'add', $politico['Politico']['id']), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<?php
				echo '<div class="row">';
				if (count($fotoPoliticos > 0)) {
					for ($i=0; $i < count($fotoPoliticos); $i++) { 
						echo '<div class="col-sm-6 col-md-4">';
						echo '<div class="thumbnail">';
						echo $this->Html->image($fotoPoliticos[$i]['FotoPolitico']['foto'], array('class' => ' foto'));
						echo '<div class="caption foto">';
						echo $this->Form->end(); ?>
						<?php echo $this->Form->postLink('<span class="btn btn-danger" role="button">Excluir</span>', array('action' => 'delete', $fotoPoliticos[$i]['FotoPolitico']['id'], $fotoPoliticos[$i]['FotoPolitico']['politico_id']), array('escape' => false), __('Tem certeza que deseja escluir?'));
						echo '&nbsp;&nbsp;<span class="btn btn-info edit" id="edit'.$fotoPoliticos[$i]['FotoPolitico']['id'].'" value="'.$fotoPoliticos[$i]['FotoPolitico']['id'].'">Descrição</span>';
						echo '<span style="display:none" class="btn btn-default cancel" id="cancel'.$fotoPoliticos[$i]['FotoPolitico']['id'].'" value="'.$fotoPoliticos[$i]['FotoPolitico']['id'].'">Cancelar</span>';
						echo '<div style="margin-top: 10px" hidden="true" id="'.$fotoPoliticos[$i]['FotoPolitico']['id'].'">';
					    echo $this->Form->create('FotoPolitico', array('type' => 'post', 'class' => 'search-form', 'url' => 'edit/'.$fotoPoliticos[$i]['FotoPolitico']['id'].'/'.$fotoPoliticos[$i]['FotoPolitico']['politico_id']));
					    echo $this->Form->input('id', array('id' => 'FotoId'.$fotoPoliticos[$i]['FotoPolitico']['id']));	
					    echo $this->Form->input('descricao', array('type' => 'textarea', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Adicione a descrição', 'default' => $fotoPoliticos[$i]['FotoPolitico']['descricao']));	
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