
<div align="center">
  <?php
  $titulo = array(
  'name' => 'titulo',
  'id' => 'titulo',
  'size' => '50',
  'style' => 'width:50%',
  'value' => set_value('titulo')
  );
  //el botón submit de nuestro formulario
    $submit = array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Aceptar',
        'title' => 'Buscar'
    );

    echo form_open(base_url('index.php/libro/buscar'));

    echo form_label('Titulo: ');

    echo form_input($titulo);

    echo form_submit($submit);
    ?>
    <font colo="red" style="font-weight: bold; font-size: 15;">
      <?php echo validation_errors(); ?>
    </font>

    <?php     echo form_close(); ?>

</div>
