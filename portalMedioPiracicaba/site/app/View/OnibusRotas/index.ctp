<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container onibusRotas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Linhas da ' . $empresa_onibus['EmpresaOnibus']['nome']); ?></h2>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Empresa'), array('controller' => 'empresa_onibuses', 'action' => 'view', $empresa_onibus['EmpresaOnibus']['id'], $empresa_onibus['EmpresaOnibus']['cidade_id']), array('escape' => false)); ?> </li>													
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Adicionar PDFs'), array('action' => 'add', $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<?php
				echo '<div class="row">';
				if (count($onibusRotas > 0)) {
					for ($i=0; $i < count($onibusRotas); $i++) { 						
						echo '<div class="col-sm-6 col-md-4">';
						echo '<div class="thumbnail">';
						echo $this->Html->image('pdf-icon.png', array('class' => ' foto'));
						echo '<div class="caption foto">';
						echo $this->Form->end(); ?>
						<?php echo $this->Form->postLink('<span class="btn btn-danger" role="button">Excluir</span>', array('action' => 'delete', $onibusRotas[$i]['OnibusRota']['id'], $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false), __('Tem certeza que deseja escluir?'));						
						echo '&nbsp;&nbsp;<span class="btn btn-info edit" id="edit'.$onibusRotas[$i]['OnibusRota']['id'].'" value="'.$onibusRotas[$i]['OnibusRota']['id'].'">Linha</span>';
						echo '<span style="display:none" class="btn btn-default cancel" id="cancel'.$onibusRotas[$i]['OnibusRota']['id'].'" value="'.$onibusRotas[$i]['OnibusRota']['id'].'">Cancelar</span>';
						echo '<div style="margin-top: 10px" hidden="true" id="'.$onibusRotas[$i]['OnibusRota']['id'].'">';
					    echo $this->Form->create('OnibusRota', array('type' => 'post', 'class' => 'search-form', 'url' => 'edit/'.$onibusRotas[$i]['OnibusRota']['id'].'/'.$onibusRotas[$i]['OnibusRota']['empresa_onibus_id']));
					    echo $this->Form->input('id', array('id' => 'OnibusRotaId'.$onibusRotas[$i]['OnibusRota']['id']));	
					    echo $this->Form->input('linha', array('type' => 'text', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Ex: Linha 152', 'default' => $onibusRotas[$i]['OnibusRota']['linha']));						    
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
	    $("#OnibusRotaId"+id).attr('value', id);
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
							
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->