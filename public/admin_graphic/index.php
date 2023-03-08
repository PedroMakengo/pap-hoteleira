<?php

$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_hospede) as janeiro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 1");
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_hospede) as fevereiro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 2");
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_hospede) as marco FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 3");
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_hospede) as abril FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 4");
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_hospede) as maio FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 5");
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_hospede) as junho FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 6");
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_hospede) as julho FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 7");
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_hospede) as agosto FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 8");
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_hospede) as setembro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 9");
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_hospede) as outubro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 10");
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_hospede) as novembro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 11");
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_hospede) as dezembro FROM tb_hospedes
WHERE month(data_criacao_hospede	) = 12");
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$mensalHospede[] = (int)$janeiro;
$mensalHospede[] = (int)$fevereiro;
$mensalHospede[] = (int)$marco;
$mensalHospede[] = (int)$abril;
$mensalHospede[] = (int)$maio;
$mensalHospede[] = (int)$junho;
$mensalHospede[] = (int)$julho;
$mensalHospede[] = (int)$agosto;
$mensalHospede[] = (int)$setembro;
$mensalHospede[] = (int)$outubro;
$mensalHospede[] = (int)$novembro;
$mensalHospede[] = (int)$dezembro;


// ============================================================================
//                        HOTEL REGISTRADOS MENSALMENTE
// ============================================================================

$janeiro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as janeiro FROM tb_hotel
WHERE month(data_criacao_hotel) = 1");
foreach($janeiro1 as $mostrar):
$janeiro1 = $mostrar['janeiro'];
endforeach;

$fevereiro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as fevereiro FROM tb_hotel
WHERE month(data_criacao_hotel) = 2");
foreach($fevereiro1 as $mostrar):
$fevereiro1 = $mostrar['fevereiro'];
endforeach;

$marco1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as marco FROM tb_hotel
WHERE month(data_criacao_hotel) = 3");
foreach($marco1 as $mostrar):
$marco1 = $mostrar['marco'];
endforeach;

$abril1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as abril FROM tb_hotel
WHERE month(data_criacao_hotel) = 4");
foreach($abril1 as $mostrar):
$abril1 = $mostrar['abril'];
endforeach;

$maio1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as maio FROM tb_hotel
WHERE month(data_criacao_hotel) = 5");
foreach($maio1 as $mostrar):
$maio1 = $mostrar['maio'];
endforeach;

$junho1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as junho FROM tb_hotel
WHERE month(data_criacao_hotel) = 6");
foreach($junho1 as $mostrar):
$junho1 = $mostrar['junho'];
endforeach;

$julho1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as julho FROM tb_hotel
WHERE month(data_criacao_hotel) = 7");
foreach($julho1 as $mostrar):
$julho1 = $mostrar['julho'];
endforeach;

$agosto1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as agosto FROM tb_hotel
WHERE month(data_criacao_hotel) = 8");
foreach($agosto1 as $mostrar):
$agosto1 = $mostrar['agosto'];
endforeach;

$setembro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as setembro FROM tb_hotel
WHERE month(data_criacao_hotel) = 9");
foreach($setembro1 as $mostrar):
$setembro1 = $mostrar['setembro'];
endforeach;

$outubro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as outubro FROM tb_hotel
WHERE month(data_criacao_hotel) = 10");
foreach($outubro1 as $mostrar):
$outubro1 = $mostrar['outubro'];
endforeach;

$novembro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as novembro FROM tb_hotel
WHERE month(data_criacao_hotel) = 11");
foreach($novembro1 as $mostrar):
$novembro1 = $mostrar['novembro'];
endforeach;

$dezembro1 = $mensal->EXE_QUERY("SELECT count(id_hotel) as dezembro FROM tb_hotel
WHERE month(data_criacao_hotel) = 12");
foreach($dezembro1 as $mostrar):
$dezembro1 = $mostrar['dezembro'];
endforeach;

$mensalHotel[] = (int)$janeiro1;
$mensalHotel[] = (int)$fevereiro1;
$mensalHotel[] = (int)$marco1;
$mensalHotel[] = (int)$abril1;
$mensalHotel[] = (int)$maio1;
$mensalHotel[] = (int)$junho1;
$mensalHotel[] = (int)$julho1;
$mensalHotel[] = (int)$agosto1;
$mensalHotel[] = (int)$setembro1;
$mensalHotel[] = (int)$outubro1;
$mensalHotel[] = (int)$novembro1;
$mensalHotel[] = (int)$dezembro1;


// ============================================================================
//                        RESERVAS REGISTRADOS MENSALMENTE
// ============================================================================
$janeiro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as janeiro FROM tb_reservas
WHERE month(data_criacao_reserva) = 1");
foreach($janeiro2 as $mostrar):
$janeiro2 = $mostrar['janeiro'];
endforeach;

$fevereiro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as fevereiro FROM tb_reservas
WHERE month(data_criacao_reserva) = 2");
foreach($fevereiro2 as $mostrar):
$fevereiro2 = $mostrar['fevereiro'];
endforeach;

$marco2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as marco FROM tb_reservas
WHERE month(data_criacao_reserva) = 3");
foreach($marco2 as $mostrar):
$marco2 = $mostrar['marco'];
endforeach;

$abril2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as abril FROM tb_reservas
WHERE month(data_criacao_reserva) = 4");
foreach($abril2 as $mostrar):
$abril2 = $mostrar['abril'];
endforeach;

$maio2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as maio FROM tb_reservas
WHERE month(data_criacao_reserva) = 5");
foreach($maio2 as $mostrar):
$maio2 = $mostrar['maio'];
endforeach;

$junho2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as junho FROM tb_reservas
WHERE month(data_criacao_reserva) = 6");
foreach($junho2 as $mostrar):
$junho2 = $mostrar['junho'];
endforeach;

$julho2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as julho FROM tb_reservas
WHERE month(data_criacao_reserva) = 7");
foreach($julho2 as $mostrar):
$julho2 = $mostrar['julho'];
endforeach;

$agosto2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as agosto FROM tb_reservas
WHERE month(data_criacao_reserva) = 8");
foreach($agosto2 as $mostrar):
$agosto2 = $mostrar['agosto'];
endforeach;

$setembro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as setembro FROM tb_reservas
WHERE month(data_criacao_reserva) = 9");
foreach($setembro2 as $mostrar):
$setembro2 = $mostrar['setembro'];
endforeach;

$outubro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as outubro FROM tb_reservas
WHERE month(data_criacao_reserva) = 10");
foreach($outubro2 as $mostrar):
$outubro2 = $mostrar['outubro'];
endforeach;

$novembro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as novembro FROM tb_reservas
WHERE month(data_criacao_reserva) = 11");
foreach($novembro2 as $mostrar):
$novembro2 = $mostrar['novembro'];
endforeach;

$dezembro2 = $mensal->EXE_QUERY("SELECT count(id_reserva) as dezembro FROM tb_reservas
WHERE month(data_criacao_reserva) = 12");
foreach($dezembro2 as $mostrar):
$dezembro2 = $mostrar['dezembro'];
endforeach;

$mensalReservas[] = (int)$janeiro2;
$mensalReservas[] = (int)$fevereiro2;
$mensalReservas[] = (int)$marco2;
$mensalReservas[] = (int)$abril2;
$mensalReservas[] = (int)$maio2;
$mensalReservas[] = (int)$junho2;
$mensalReservas[] = (int)$julho2;
$mensalReservas[] = (int)$agosto2;
$mensalReservas[] = (int)$setembro2;
$mensalReservas[] = (int)$outubro2;
$mensalReservas[] = (int)$novembro2;
$mensalReservas[] = (int)$dezembro2;



// ============================================================================
//                        HOTEL REGISTRADOS MENSALMENTE
// ============================================================================
$newMasculino = $mensal->EXE_QUERY("SELECT count(id_hospede) as masculino FROM tb_hospedes
WHERE genero_hospedes='M'");
foreach($newMasculino as $mostrar):
$masculino = $mostrar['masculino'];
endforeach;

$newFemenino = $mensal->EXE_QUERY("SELECT count(id_hospede) as feminino FROM tb_hospedes
WHERE genero_hospedes='F' ");
foreach($newFemenino as $mostrar):
$femenino = $mostrar['feminino'];
endforeach;

$dataHospedeGenero[] = (int)$masculino;
$dataHospedeGenero[] = (int)$femenino;