<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$produto = $facadePrincipal->produtoController()->getDTO()->findAll();
$funcionarios = $facadePrincipal->funcionarioController()->getDTO()->findAllFuncionario();
$itensBySessao = $facadePrincipal->requisicaoController()->getDTO()->intensBySessao(isset($_SESSION['requisicaoSessao']) ? $_SESSION['requisicaoSessao'] : @$_GET['sessao']);
$requisicao = $facadePrincipal->requisicaoController()->getDTO()->findRequisicao();
$funcionarioById = $facadePrincipal->funcionarioController()->getDTO()->findFuncionarioById(@$_GET['id']); 
$fornecedor = $facadePrincipal->fornecedorController()->getDTO()->findFornecedor();


require '../Pages/commons/header.php';
?>
<script>
    window.addEventListener('load', defineComponent, true);

    function iserirItemRequisicao(id) {
        var linha = document.createElement('tr');
        linha.id = "ItemRequisicao" + id;
        var servico = document.createElement('td');
        var valor = document.createElement('td');
        var valorSelecionado = idProduto.getElementsByTagName("option")[idProduto.selectedIndex].innerHTML;
        var contServico = document.createTextNode(valorSelecionado);
        var valorCusto = qtdRequisicao.value;
        var conteudoValor = document.createTextNode(valorCusto);
        var eliminar = document.createElement('td');
        var linkEliminar = "";
        eliminar.innerHTML = linkEliminar;

        servico.appendChild(contServico);
        valor.appendChild(conteudoValor);
        linha.appendChild(servico);
        linha.appendChild(valor);
        linha.appendChild(eliminar);
        tabelaDeItens.appendChild(linha);
        idProduto.value = "";
        qtdRequisicao.value = "";

    }

    function enviarItens() {
        var xhr = new XMLHttpRequest();
        var qtd = qtdRequisicao.value;
        var rf = idProduto.value;
        var especific = especificacoes.value;
        var param = "&field[ItensRequisicao.idProduto]=" + rf + "&field[ItensRequisicao.qtd]=" +qtd+"&field[ItensRequisicao.especificacoes]="+especific;
        var url = "../controllerGateway.php?controller=Requisicao&method=enviarItemRequisicao" + param;
        xhr.open("GET", url, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                iserirItemRequisicao(xhr.responseText);

            }
        }
    }

</script>
<div class="container topo">
    <form method="post" action="../controllerGateway.php?controller=Requisicao&method=saveRequisicao">
        <input type="hidden" name="field[Requisicao.id]" value="<?php echo @$funcionarioById[0]->id; ?>">
        <fieldset>
            <label for="field[Requisicao.idFuncionario]">Nº Funcionário:</label>
            <input class="form-control" type="text" name="field[Requisicao.idFuncionario]" value="<?php echo @$funcionarioById[0]->id; ?>">
            
            <!-- CAMPOS QUE SO APARECEM COM O PARAMETRO 'SESSAO'-->
            <?php if(count(@$_GET['sessao']) != 0){  ?>
            <label for="qtdRequisicao">Funcionário:</label>
            <input class="form-control" readonly type="text"  id="" value="<?php echo @$funcionarioById[0]->nome; ?>"><br>
            
            <label for="qtdRequisicao">Departamento:</label>
            <input class="form-control" readonly type="text"  id="" value="<?php echo @$funcionarioById[0]->departamento; ?>"><br>
            <?php } ?>
            <!-- CAMPOS QUE SO APARECEM COM O PARAMETRO 'SESSAO'-->
            
            <?php if(count(@$_GET['sessao']) == 0){  ?>
            <label for="idProduto">Ref:</label>
            <select class="form-control" name="idProduto" id="idProduto">
                <option value="">Selecione</option>
                <?php foreach ($produto as $prod) { ?>
                    <option value="<?php echo $prod->id ?>"><?php echo $prod->nome ?></option>
                <?php } ?>
            </select>
            
            <label for="qtdRequisicao">Quantidade:</label>
            <input class="form-control" type="text" name="qtdRequisicao" id="qtdRequisicao" value=""><br>
            
            <label for="qtdRequisicao">Especifições:</label>
            <textarea class="form-control" type="text" name="especificacoes" id="especificacoes" value=""></textarea><br>

            <a href="#" onclick="enviarItens()" class="btn btn-primary">Adicionar</a>
            <?php } ?>
        </fieldset>


        <!-- ##########INICIO TABELA DE ITENS CORRENTE j-->
        <div class="mt-1"></div>
        <table class="table table-bordered" width="100%" id="tabelaDeItens" name="tabelaDeItens">
            <thead>
                <tr>
                    <th colspan="5" align="center">
                        Itens da Requisão
                    </th>
                </tr>
                <tr>
                    <td>Referência</td>
                    <td>Qtd Solicitada</td>
                    
                    <?php if($_SESSION['userTipo'] != 3){  ?>
                    <td>Qtd Em Stock</td>
                    <td>Especificações</td>
                    <?php } ?>
                    
                    <td>Operações</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itensBySessao as $req) { 
                    
                ?>
                    <tr id="ItemRequisicao<?php echo $req->id; ?>">
                        <th><?php echo $req->nome; ?></th>
                        <th><?php echo $req->qtd; ?></th>
                        <?php if($_SESSION['userTipo'] != 3){  ?>
                        <th><?php echo number_format($req->qtdStock)?></th>
                        <th><?php echo $req->especificacoes; ?></th>
                        <?php } ?>
                        <th>
                            <?php if($_SESSION['userTipo'] != 2 ){  ?>
                            <a href="#" onclick="">Eliminar</a>&nbsp;|&nbsp;
                            <?php } ?>
                            <?php if($_SESSION['userTipo'] != 3){  ?>
                            <a href="#" onclick="">Retirar do Stock</a>
                            &nbsp;|&nbsp;
                            <a href="javascript: return false;" 
                                                       onClick="window.open('fornecedorRequisicao.php?idProduto=<?php echo $req->idProduto; ?>&sessao=<?php echo $req->sessao ?>','','width=900,height=400')">
                                                        Solicitar a Fornecedor
                                                    </a>
                            <?php } ?>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- ##########FIM TABELA DE ITENS CORRENTE -->
        <?php if($_SESSION['userTipo'] != 2 ){ ?>
        <input class="btn btn-success" type="submit" value="Requisitar">
        <?php }else{ ?>
        <a href="#" onclick="" class="btn btn-primary">Terminar</a>
        <?php } ?>
    </form>

    <div class="mt-1"></div>

    <table class="table table-bordered">
        <tr>
            <td>Ref</td>
            <td>Nome</td>
            <td>Departamento</td>
            <td>Data da Requisição</td>
            <td>Status</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($requisicao as $rq) { ?>
            <tr>
                <td><?php echo "RA" . $rq->id ?></td>
                <td><?php echo $rq->nome ?></td>
                <td><?php echo $rq->departamento ?></td>
                <td><?php echo $rq->data ?></td>
                <td>Pendente</td>
                <td>
                    <a href="requisicao.php?id=<?php echo $rq->idFuncionario ?>&sessao=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-ok"></span>Ver</a>|
                    <?php if($_SESSION['userTipo'] == 1  ){ ?>
                    <a href="../controllerGateway.php?controller=Requisicao&method=changeStatus&field[Requisicao.sessao]=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-ok"></span>Aprovar</a>|
                    <a href="../controllerGateway.php?controller=Requisicao&method=changeStatus&field[Requisicao.sessao]=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-ok"></span>Reprovar</a>|
                    <?php } ?>
                    <?php if($_SESSION['userTipo'] != 2 ){  ?>
                    |
                    <a style="color: red" href="../controllerGateway.php?controller=Requisicao&method=excluir&field[Requisicao.sessao]=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>