<?php 

include __DIR__."/../inicio-html.php" ;
 

?>



<h3> Cadastro de Material </h3>

<form method="POST" action="<?= isset($opcao)?$opcao: '' ?>">
  <input type="hidden" name="id" value="<?= isset($material)? $material->getId() : '' ?>" >
  <div class="form-group">

    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" value="<?= isset($material)? $material->getDescricao() : '' ?>" required id="descricao" name="descricao" placeholder="Descrição">
  </div>
  <div class="form-group">
    <label for="descricao">Código</label>
    <input type="text" class="form-control" value="<?= isset($material)? $material->getCodigo() : '' ?>" required id="codigo" name="codigo"  placeholder="Código">
  </div>
  <div class="form-group">
    <label for="descricao">Observação</label>
    <input type="text" class="form-control" value="<?= isset($material)? $material->getObservacao() : '' ?>"  required id="observacao" name="observacao" placeholder="Observação">
  </div>


  <button type="submit" class="btn btn-primary">Salvar</button>
</form>



<?php echo include __DIR__."/../fim-html.php" ?>