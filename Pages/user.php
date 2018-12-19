<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$funcionarios = $facadePrincipal->funcionarioController()->getDTO()->findAllFuncionario();
$user = $facadePrincipal->userController()->getDTO()->findUser();
$userById = $facadePrincipal->userController()->getDTO()->findUserById(@$_GET['id']);

require '../Pages/commons/header.php';
?>
<script>
    window.addEventListener('load', selectInit, true);

    function selectInit() {
        populateSelect('User.idFuncionario', '<?php echo @$userById[0]->idFuncionario; ?>');
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
    <form method="post" action="../controllerGateway.php?controller=User&method=save" class="form-horizontal">
         <input type="hidden" name="field[User.id]" value="<?php echo @$funcionarioById[0]->id; ?>">
        <fieldset>
            <label for="field[User.idFuncionario]">Nome Funcionario:</label>
            <select class="form-control" type="text" id="User.idFuncionario" name="field[User.idFuncionario]">
                <option value="">Selecione</option>
                <?php foreach ($funcionarios as $func){ ?>
                <option value="<?php echo $func->id ?>"><?php echo $func->nome ?></option>
                <?php } ?>
            </select>
            <label for="field[User.userName]">UserName:</label>
            <input class="form-control" type="text" name="field[User.userName]" value="<?php echo @$funcionarioById[0]->cargo; ?>">

            <label for="field[User.senha]">Senha:</label>
            <input class="form-control" type="text" name="field[User.senha]" value="<?php echo @$funcionarioById[0]->cargo; ?>">
            
            <label for="field[User.cargo]">Confirmar Senha:</label>
            <input class="form-control" type="text" name="" value="<?php echo @$funcionarioById[0]->cargo; ?>">
            <br>

            <input class="btn btn-primary" type="submit" value="Cadastrar" style="margin-bottom: 10px">
            <?php if (@count(@$_GET['id']) == 1) { ?>
                <nakassonyActionButton id="btnAct" value="Actualizar" action="actualizarFuncionario"></nakassonyActionButton>
                <?php } ?>
        </fieldset>
    </form>
    <table class="table table-bordered">
        <tr>
            <td>Nº Funcionário</td>
            <td>Nome Funcionário</td>
            <td>UserName</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($user as $u) { ?>
            <tr>
                <td><?php echo "F0".$u->idFuncionario ?></td>
                <td><?php echo $u->nome ?></td>
                <td><?php echo $u->userName ?></td>
                <td>
                    <a href="funcionario.php?id=<?php echo $u->id ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Funcionario&method=excluir&field[Funcionario.id]=<?php echo $u->id ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>