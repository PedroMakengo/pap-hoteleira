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


// ============================================================================
//                               HOTEL MESA 
// ============================================================================

$janeiro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as janeiro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 1");
foreach($janeiro1 as $mostrar):
$janeiro1 = $mostrar['janeiro'];
endforeach;

$fevereiro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as fevereiro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 2");
foreach($fevereiro1 as $mostrar):
$fevereiro1 = $mostrar['fevereiro'];
endforeach;

$marco1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as marco FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 3");
foreach($marco1 as $mostrar):
$marco1 = $mostrar['marco'];
endforeach;

$abril1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as abril FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 4");
foreach($abril1 as $mostrar):
$abril1 = $mostrar['abril'];
endforeach;

$maio1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as maio FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 5");
foreach($maio1 as $mostrar):
$maio1 = $mostrar['maio'];
endforeach;

$junho1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as junho FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 6");
foreach($junho1 as $mostrar):
$junho1 = $mostrar['junho'];
endforeach;

$julho1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as julho FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 7");
foreach($julho1 as $mostrar):
$julho1 = $mostrar['julho'];
endforeach;

$agosto1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as agosto FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 8");
foreach($agosto1 as $mostrar):
$agosto1 = $mostrar['agosto'];
endforeach;

$setembro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as setembro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 9");
foreach($setembro1 as $mostrar):
$setembro1 = $mostrar['setembro'];
endforeach;

$outubro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as outubro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 10");
foreach($outubro1 as $mostrar):
$outubro1 = $mostrar['outubro'];
endforeach;

$novembro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as novembro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 11");
foreach($novembro1 as $mostrar):
$novembro1 = $mostrar['novembro'];
endforeach;

$dezembro1 = $mensal->EXE_QUERY("SELECT count(id_reserva_mesa) as dezembro FROM tb_mesa_reservas
WHERE month(data_criacao_mesa_reserva) = 12");
foreach($dezembro1 as $mostrar):
$dezembro1 = $mostrar['dezembro'];
endforeach;

$mensalReservaMesa[] = (int)$janeiro1;
$mensalReservaMesa[] = (int)$fevereiro1;
$mensalReservaMesa[] = (int)$marco1;
$mensalReservaMesa[] = (int)$abril1;
$mensalReservaMesa[] = (int)$maio1;
$mensalReservaMesa[] = (int)$junho1;
$mensalReservaMesa[] = (int)$julho1;
$mensalReservaMesa[] = (int)$agosto1;
$mensalReservaMesa[] = (int)$setembro1;
$mensalReservaMesa[] = (int)$outubro1;
$mensalReservaMesa[] = (int)$novembro1;
$mensalReservaMesa[] = (int)$dezembro1;