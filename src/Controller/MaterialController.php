<?php

namespace ProjetosIgor\ReservaMaterial\Controller;

use Exception;
use PDO;
use PDOException;
use Pessoa;
use ProjetosIgor\ReservaMaterial\Entity\Material;
use ProjetosIgor\ReservaMaterial\Utils\DBconect;


class MaterialController
{
    use ControllerComHtml;
    private Material $material;
    private DBconect $conn; 


    public function __construct()

    {
        $this->conn = new DBconect();
       
    }
    public  function exibirformularioCadastro()
    {   

        $arquivo = "form-cadastro-material.php";
        $titulo = "Cadastro de Materiais";
        $conteudo= array('titulo'=>$titulo, 'opcao'=>'/material/salvar');
        echo $this->renderizaHtml($arquivo, $conteudo);
        
        
    } 
    public function salvar()
    {
        $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
        $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
        $observacao = filter_input(INPUT_POST,'observacao', FILTER_SANITIZE_STRING);
        $material = new Material();
        $material->setDescricao($descricao);
        $material->setCodigo($codigo);
        $material->setObservacao($observacao);


        try{
            $query = "INSERT INTO materiais (descricao, codigo, observacao) VALUES (:descricao, :codigo, :observacao);";
          
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(':descricao', $material->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(':codigo', $material->getCodigo(), PDO::PARAM_STR);
            $stmt->bindValue(':observacao', $material->getObservacao(), PDO::PARAM_STR);
            $stmt->execute();

        }catch(PDOException $e){
            echo "Erro ao inserir no materiais no banco de dados: ". $e->getMessage();
            exit();

        }
        
       
       
        header('location:/material/cadastro');
        $_SESSION['mensagem'] = "Cadastro realizado";
        $_SESSION['classe'] = 'alert-success';

    }

    public function obterPorId(int $id){
        $material = new Material();
        try{
            $query = 'SELECT id, descricao, codigo, observacao from materiais WHERE id=:id';
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->setFetchMode( PDO::FETCH_CLASS, 'ProjetosIgor\ReservaMaterial\Entity\Material');
           
            $stmt->execute();
            $material = $stmt->fetch( PDO::FETCH_CLASS);
            
            return $material;

        }catch(PDOException $e){
            echo "Erro ao selecionar no banco de dados: ". $e->getMessage();
            exit();
        }

       
    }

    private function listar(): array{
        try{
            $query = 'SELECT id, descricao, codigo, observacao from materiais';
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->execute();
            $materiais = $stmt->fetchAll( PDO::FETCH_CLASS, "ProjetosIgor\ReservaMaterial\Entity\Material" );
           
            return $materiais;
        }catch(PDOException $e){
            echo "Erro ao listar os materiais: ". $e->getMessage();
            exit();
        }
    }

    public function exibirLista()
    {
        $materiais = $this->listar();
        $arquivo = "lista-materiais.php";
        $titulo = "Lista de Materiais";
        $tabela = '';
        // echo "<pre>";
        //     print_r($materiais);
        // echo "</pre>";
        foreach($materiais as $material){

           $tabela .=
            "<tr>
                <th scope='row'>{$material->getId()}</th>
                <td>{$material->getDescricao()}</td>
                <td>{$material->getCodigo()}</td>
                <td>{$material->getObservacao()}</td>
                <td> <a href='/material/atualizacao?id={$material->getId()}' class='btn btn-primary btn-sm active' role='button' aria-pressed='true'>Atualizar</a></td>
           </tr>";
          
        }
        $conteudo = array('titulo'=>$titulo, 'tabela'=>$tabela);
        echo $this->renderizaHtml($arquivo, $conteudo); 

    }

    public function exibirFormularioAtualizacao()
    {   
        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $material = $this->obterPorId($id);

        $arquivo = "form-cadastro-material.php";
        $titulo =  'Alteração de dados do material';

        $conteudo  = array('titulo'=>$titulo, 'material'=>$material, 'opcao'=>'/material/atualizar');
        echo $this->renderizaHtml($arquivo, $conteudo); 
        

    }

    public function atualizar()
    {
        $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
        $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
        $observacao = filter_input(INPUT_POST,'observacao', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT);
        $material = new Material();
        $material->setId($id);
        $material->setDescricao($descricao);
        $material->setCodigo($codigo);
        $material->setObservacao($observacao);

        try{
            $query = 'UPDATE materiais set descricao=:descricao, codigo=:codigo, observacao=:observacao WHERE id=:id';
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(':id', $material->getId());
            $stmt->bindValue(':descricao', $material->getDescricao());
            $stmt->bindValue(':codigo', $material->getCodigo());
            $stmt->bindValue(':observacao', $material->getObservacao());
            
            $stmt->execute();
            
        }catch(PDOException $e){
            echo "Erro ao atualizar o material: ". $e->getMessage();
            exit();
        }

        header('location:/material/listar');
        $_SESSION['mensagem'] = "Cadastro realizado";
        $_SESSION['classe'] = 'alert-success';

    }

    
    

}