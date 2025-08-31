<?php

require_once("model/Pedido.php");
require_once("model/Prato.php");

$pratos = array();
$pedidos = array();

$prato1 = new Prato;
$prato1 -> setNumero(1) -> setNome("Camarão à Milanesa") -> setValor(110.00);
array_push($pratos , $prato1);

$prato2 = new Prato;
$prato2 -> setNumero(2) -> setNome("Pizza Margherita") -> setValor(80.00);
array_push($pratos , $prato2);

$prato3 = new Prato;
$prato3 -> setNumero(3) -> setNome("Macarrão à Carbonara") -> setValor(60.00);
array_push($pratos , $prato3);

$prato4 = new Prato;
$prato4 -> setNumero(4) -> setNome("Bife à Parmegiana") -> setValor(75.00);
array_push($pratos , $prato4);

$prato5 = new Prato;
$prato5 -> setNumero(5) -> setNome("Risoto ao Funghi") -> setValor(70.00);
array_push($pratos , $prato5);

do {
    print "\n----------MENU-----------\n";
    print "1- Cadastrar um prato: \n";
    print "2- Excluir um prato: \n";
    print "3- Listar os pratos: \n";
    print "4- Total de Vendas: \n";
    print "0- Sair\n";
    print "\n";

    $option = readline("\nInforme a opção desejada: ");

        if ($option == 1) {
             print "\nEsses são os Pratos Disponíveis:\n\n";

        foreach ($pratos as $p1) {
            print $p1 . "\n";
        }

        $prato = readline("Escolha o número do prato: ");
        $totalPratos = count($pratos);

        if ($prato > 0 && $prato <= $totalPratos) {
            $pedido = new Pedido;
            $pedido->setNomeCliente(readline("Informe o seu nome: ")) ->setNomeGarcom(readline("Informe o nome do garçom: "))  ->setPrato($pratos[$prato - 1]);

            array_push($pedidos, $pedido);
            print "\n Pedido cadastrado com sucesso!\n";
        } else {
            print "\n Número de prato inválido.\n";
        }

        } elseif ($option == 2) {
            print "Esses são os pedidos ja feitos: \n";

            foreach ($pedidos as $i => $p) {
                print ($i + 1) . " - " . $p . "\n";
            }

            if (count($pedidos) > 0) {
               $indice_pedido = readline("\nInforme o índice do pedido que deve ser excluído: \n");

               if ($indice_pedido > 0 and $indice_pedido <= count($pedidos)) {
                array_splice($pedidos , $indice_pedido - 1 , 1 );
                }else {
                print "Índice inválido, por favor informe um índice válido: \n";
                } 
            }else{
                print "Ainda não há pedidos. \n";
            }
        }elseif ($option == 3) {
            foreach ($pedidos as $i => $p) {
                print ($i + 1) .  " - " . $p . "\n";
            }
        }elseif ($option == 4) {
            
            $valor_total = 0;

            foreach ($pedidos as $p) {
                $valor_total += $p -> getPrato() -> getValor();
            }

            print "\n O valor total é de: R$ " . $valor_total . "\n";

        }elseif ($option == 0) {
            print "Programa Encerrado!";
            break;
        }else {
            print "Opção Inválida.";
        }
} while ($option != 0);



?>