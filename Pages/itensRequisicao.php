<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$itensBySessao = $facadePrincipal->requisicaoController()->getDTO()->intensBySessao($_GET['sessao']);
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <td>Referencia</td>  
                    <td>Quantidade</td>  
                    <td>Operações</td>  
                </tr>
                <?php foreach ($itensBySessao as $ir){ ?>
                <tr>
                    <td><?php echo $ir->nome ?></td>  
                    <td><?php echo $ir->qtd ?></td>  
                    <td>
                        <a href="#">Eliminar</a>
                    </td>  
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>



