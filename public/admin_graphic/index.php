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
