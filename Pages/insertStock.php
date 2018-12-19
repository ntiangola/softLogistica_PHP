<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$produtos = $facadePrincipal->produtoController()->getDTO()->findProdStock();

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
    <form method="post" action="../controllerGateway.php?controller=Produto&method=inserirStock">
        <input type="hidden" name="field[Stock.id]" value="<?php echo @$produtosById[0]->id; ?>">
        <fieldset>

            Produto:<select class="form-control" name="field[Stock.idProduto]" id="Produto.categoria">
                <option value="">Selecione</option>
                <?php foreach ($produtos as $prod){ ?>
                <option value="<?php echo $prod->id ?>"><?php echo $prod->nome ?></option>
                <?php } ?>
            </select>
            <br>
            <label for="field[Produto.nome]">Quantidade:</label>
            <input class="form-control" type="text" name="field[Stock.qtd]" value="<?php echo @$produtosById[0]->nome; ?>">
            <br>
            <label for="field[Produto.nome]">Data de Expiração:</label>
            <input class="form-control" type="date" name="field[Stock.dataExpiracao]" value="<?php echo @$produtosById[0]->nome; ?>">
            <br>
            <input class="btn btn-primary" type="submit" value="cadastrar" style="margin: 20px 0px">
            <?php if (@count(@$_GET['id']) == 1) { ?>
                <nakassonyActionButton id="btnAct" value="Actualizar" action="actualizarProduto"></nakassonyActionButton>
                <?php } ?>
        </fieldset>
    </form>
    <table class="table table-bordered">
        <tr>
            <td>Categoria</td>
            <td>Nome</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($produtos as $p) { ?>
            <tr>
                <td><?php echo $p->categoria ?></td>
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