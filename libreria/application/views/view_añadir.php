<section id="registro">
	<?php echo form_open(base_url('index.php/libro/insertarLibro'));

		$titulo = array(
			'name' => 'titulo',
			'id' => 'titulo',
			'size' => '30',
			'style' => 'width:50%',
			'value' => set_value('titulo')
			);
		$isbn = array(
			'name' => 'isbn',
			'id' => 'isbn',
			'size' => '30',
			'style' => 'width:50%',
			'type' => 'number',
			'value' => set_value('isbn')
			 );
		$precio = array(
			'name' => 'precio',
			'id' => 'precio',
			'size' => '30',
			'style' => 'width:50%',
			'type' => 'number',
			'value' => set_value('precio')
			 );
		$submit = array(
			'name' => 'submit',
			'id' => 'submit',
			'value' => 'Guardar',
			'title' => 'Enviar'
			 );
		echo form_fieldset('Nuevo Libro');
	 ?>
	 <table>
	 	<tr>
	 		<td><?php echo form_label('Titulo: '); ?> </td>
	 		<td><?php echo form_input($titulo);?> </td>
	 	</tr>
	 	<tr>
	 		<td><?php echo form_label('isbn: '); ?> </td>
	 		<td><?php echo form_input($isbn);?> </td>
	 	</tr>
	 	<tr>
	 		<td><?php echo form_label('Costo: '); ?> </td>
	 		<td><?php echo form_input($precio);?> </td>
	 	</tr>
		<tr>
			<td><?php echo form_label('Autor: '); ?> </td>
			<td>
					<select class="autor" name="autor">
						<?php
						foreach ($autores as $key => $autor) {
							echo "<option values=".$key.">".$autor->nombre." ".$autor->apellidopaterno."</option>";
						}
						 ?>
					</select>
			</td>
		</tr>
		<tr>
			<td><?php echo form_label('Editorial: '); ?> </td>
			<td>
					<select class="editorial" name="editorial">
						<?php
						foreach ($editoriales as $key => $editorial) {
							echo "<option values=".$key.">".$editorial->nombre."</option>";
						}
						 ?>
					</select>
			</td>
		</tr>
		<tr>
			<td>
				<font colo="red" style="font-weight: bold; font-size: 15;">
				<?php echo validation_errors(); ?>
			</font>
			</td>
		</tr>
	 	<tr>
	 		<td></td>
	 		<td><?php echo form_submit($submit);?> </td>
	 	</tr>
	 </table>
	 <?php echo form_fieldset_close(); ?>
</section>
