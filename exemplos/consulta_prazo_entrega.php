<?php

/**
 * Contém um exemplo de utilização da classe de consulta de CEP da Braspress.
 * 
 * @author Ivan Wilhelm <ivan.whm@me.com>
 * @version 1.0 
 */
//Ajusta a codificação e o tipo do conteúdo
header('Content-type: text/txt; charset=utf-8');

//Importa as classes
require_once dirname(__FILE__).'/../vendor/autoload.php';

try
{
  //Cria o objeto
  $consulta = new BraspressPrazoEntrega(00000000000000);
  $consulta->setCepOrigem('89010130');
  $consulta->setCepDestino('88095001');
  if ($consulta->processaConsulta())
  {
    $retorno = $consulta->getResultado();
    //Se teve erro
    if ($retorno->getSucesso())
      echo 'Prazo..: ' . $retorno->getPrazo() . PHP_EOL;
    else
      echo 'Ocorreu um erro. Mensagem: ' . $retorno->getMensagemErro() . PHP_EOL . PHP_EOL;
  } else
    echo 'Ocorreu um erro, tente novamente mais tarde.' . PHP_EOL;
} catch (Exception $e)
{
  echo 'Ocorreu um erro ao processar sua solicitação. Erro: ' . $e->getMessage() . PHP_EOL;
}
