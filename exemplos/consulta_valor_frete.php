<?php

/**
 * Contém um exemplo de utilização da classe de valor total do frete da Braspress.
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
  $consulta = new BraspressValorFreteTotal(17933915000152);
  $consulta->setIdOrigem(10097780);
  $consulta->setCepOrigem(75901060);
  $consulta->setCepDestino(31814500);
  $consulta->setDocumentoDestino(05771095613);
  $consulta->setTipoFrete(Braspress::TIPO_FRETE_RODOVIARIO);
  $consulta->setPeso(1500);
  $consulta->setValorNF(123);
  $consulta->setVolume(1);

  if ($consulta->processaConsulta())
  {
    $retorno = $consulta->getResultado();
    if ($retorno->getSucesso())
      echo 'Valor..: ' . number_format($retorno->getValorFrete(), 2, ',', '.') . PHP_EOL;
    else
      echo 'Ocorreu um erro. Mensagem: ' . $retorno->getMensagemErro() . PHP_EOL . PHP_EOL;
  } else
    echo 'Ocorreu um erro, tente novamente mais tarde.' . PHP_EOL;
} catch (Exception $e)
{
  echo 'Ocorreu um erro ao processar sua solicitação. Erro: ' . $e->getMessage() . PHP_EOL;
}
