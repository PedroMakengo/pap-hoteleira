<?php

$parametros = [":id" => $_SESSION['id']];
$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_reserva) as janeiro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 1",$parametros);
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_reserva) as fevereiro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 2",$parametros);
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_reserva) as marco FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 3",$parametros);
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_reserva) as abril FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 4",$parametros);
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_reserva) as maio FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 5",$parametros);
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_reserva) as junho FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 6",$parametros);
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_reserva) as julho FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 7",$parametros);
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_reserva) as agosto FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 8",$parametros);
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_reserva) as setembro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 9",$parametros);
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_reserva) as outubro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 10",$parametros);
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_reserva) as novembro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 11",$parametros);
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_reserva) as dezembro FROM tb_reservas 
INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
WHERE tb_quartos.id_hotel=:id AND  month(data_criacao_reserva) = 12",$parametros);
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$mensalReservas[] = (int)$janeiro;
$mensalReservas[] = (int)$fevereiro;
$mensalReservas[] = (int)$marco;
$mensalReservas[] = (int)$abril;
$mensalReservas[] = (int)$maio;
$mensalReservas[] = (int)$junho;
$mensalReservas[] = (int)$julho;
$mensalReservas[] = (int)$agosto;
$mensalReservas[] = (int)$setembro;
$mensalReservas[] = (int)$outubro;
$mensalReservas[] = (int)$novembro;
$mensalReservas[] = (int)$dezembro;

