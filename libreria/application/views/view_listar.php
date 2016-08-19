
<?=$mensaje ?>
<!-- menu -->
<div>
	<ul>
		<li><a href="<?php echo base_url();?>index.php/libro/anadirlibro">Añadir</a></li>
		<li><a href="<?php echo base_url();?>index.php/libro/buscarlibro">Editar</a></li>
		<li><a href="<?php echo base_url();?>index.php">listar</a></li>
		<li><a href="<?php echo base_url();?>index.php/libro/eliminarlibro">Eliminar</a> </li>
	</ul>
</div>

<div align="center">
	<table border="5px">
		<tr>
			<td>Clave</td>
			<td>Titulo</td>
			<td>ISBN</td>
			<td>Precio</td>
			<td>Editorial</td>
			<td>Autor</td>
		</tr>
		<?php
		if (count($libros)) {
			foreach ($libros as $libro) {
				echo "<tr>";
				echo "<td>".$libro->idlibro."</td>";
				echo "<td>".$libro->titulo."</td>";
				echo "<td>".$libro->isbn."</td>";
				echo "<td>".$libro->precio."</td>";
				echo "<td>".$libro->ideditorial."</td>";
				echo "<td>".$libro->idautor."</td>";
				echo "</tr>";
			}
		} else {
			echo "<h2>No hay ningun registro en la Base de Datos</h2>";
		}

		 ?>
	</table>
</div>
<br>
<?php

	//var_dump($libros);


 ?>
