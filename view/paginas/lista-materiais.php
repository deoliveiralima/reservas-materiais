<?php 

include __DIR__."/../inicio-html.php" ;
 

?>


<h3> <?= $titulo ?> </h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descrição</th>
      <th scope="col">Código</th>
      <th scope="col">Observação</th>
      <th scope="col">Atualização</th>
    </tr>
  </thead>
  <tbody>
    <?= $tabela?>
  </tbody>
</table>


<?php echo include __DIR__."/../fim-html.php" ?>