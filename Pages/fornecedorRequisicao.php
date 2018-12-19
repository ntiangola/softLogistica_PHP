<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$produtosById = $facadePrincipal->produtoController()->getDTO()->findAllProdById(@$_GET['idProduto']);
$fornecedor = $facadePrincipal->fornecedorController()->getDTO()->findFornecedor();
$fornecedorByRequisicao = $facadePrincipal->fornecedorReqDTO()->findFornecedorByReq($_GET['sessao']);

require '../Pages/commons/header.php';
?>

<script>
    window.addEventListener('load', defineComponent, true);
    window.addEventListener('load', selectInit, true);

    function selectInit() {
        populateSelect('Produto.categoria', '<?php echo @$produtosById[0]->categoria; ?>');
    }
    function populateSelect(elm, value) {
        try {
            document.getElementById(elm).value = value;
        } catch (e) {
            //  
        }
    }

</script>
<div class="container topo">
    <form method="post" action="../controllerGateway.php?controller=Fornecedor&method=saveFornecedorByReq">
        <input type="hidden" name="field[FornecedorReq.idProduto]" value="<?php echo @$produtosById[0]->id; ?>">
        <input type="hidden" name="field[FornecedorReq.sessao]" value="<?php echo @$_GET['sessao']; ?>">
        <fieldset>
            <label for="">Produto/Serviço:</label>
            <input class="form-control" type="text" readonly value="<?php echo @$produtosById[0]->nome; ?>">
            <br>
            <label for="field[FornecedorReq.idFornecedor]">Fornecedores:</label>
            <select class="form-control" name="field[FornecedorReq.idFornecedor]" id="Produto.categoria">
                <option value="">Selecione</option>
                <?php foreach ($fornecedor as $f){ ?>
                <option value="<?php echo $f->id ?>"><?php echo $f->nome ?></option>
                <?php } ?>
            </select>
            <br>
            <input class="btn btn-primary" type="submit" value="Solicitar" style="margin: 20px 0px">
        </fieldset>
    </form>
    <table class="table table-bordered">
        <tr>
            <td>Fornecedor</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($fornecedorByRequisicao as $p) { ?>
            <tr>
                <td><?php echo $p->nome ?></td>
                <td>
                    <a href="produto.php?id=<?php echo $p->id ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Produto&method=excluir&field[Produto.id]=<?php echo $p->id ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>