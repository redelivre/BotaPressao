<?php 
include("../constantes.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="robots" content="none">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" type="text/css" href="tipped.css"/>
</head>
<body>
<div class="pure-menu pure-menu-horizontal">
    <a href="/dep/teste_dep.php" class="pure-menu-heading pure-menu-link">Home</a>
</div>
<style>
.voto_CONTRA{
	background-color:#dc5356;
}
.voto_FAVOR{
	background-color:#1e90ff;
}
.voto_INDECISO{
	background-color:#eeeeee;
}
table tr {
    cursor: pointer;
}
</style>
<?php

conn_bd();

$arrEstados = array("TO"=>"TOCANTINS","BA"=>"BAHIA","SE"=>"SERGIPE","PE"=>"PERNAMBUCO","AL"=>"ALAGOAS","RN"=>"RIO GRANDE DO NORTE","CE"=>"CEARÁ","PI"=>"PIAUÍ","MA"=>"MARANHÃO","AP"=>"AMAPÁ","PA"=>"PARÁ","RR"=>"RORAIMA","AM"=>"AMAZONAS","AC"=>"ACRE","RO"=>"RONDÔNIA","MT"=>"MATO GROSSO","MS"=>"MATO GROSSO DO SUL","GO"=>"GOIÁS","PR"=>"PARANÁ","SC"=>"SANTA CATARINA","RS"=>"RIO GRANDE DO SUL","SP"=>"SÃO PAULO","MG"=>"MINAS GERAIS","RJ"=>"RIO DE JANEIRO","ES"=>"ESPÍRITO SANTO","DF"=>"DISTRITO FEDERAL","PB"=>"PARAÍBA");

$result = mysql_query("SELECT `voto`, COUNT(`voto`) AS contagem FROM `testedep` WHERE `estado` = '".$_GET["p"]."' GROUP by `voto`;");
$favor=0;
$contra=0;
$indecisos=0;

while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	if($row['voto'] == "FAVOR"){
		$favor = $row['contagem'];
	} elseif($row['voto'] == "CONTRA"){
		$contra = $row['contagem'];
	} else {
		$indecisos = $row['contagem'];
	}
	//$votos[$row['voto']]=$row['cpntagem'];
}

echo '<div class="estado" style="width: 40%;margin: 0 auto;"><h2 style="font-size: 50px;text-align: center;">PAINEL '.$arrEstados[$_GET["p"]].'</h2>';
/*
echo '<div style="width: 500px;float: left;">';
echo '<h3>Contra: '.$contra.'</h3>';
echo '<h3>Indecisos: '.$indecisos.'</h3>';
echo '<h3>A Favor: '.$favor.'</h3></div>';*/
echo '<div id="divname"></div></div>';

$result2 = mysql_query("SELECT * FROM `testedep` WHERE `estado` = '".$_GET["p"]."' ORDER by `voto` ASC;");
echo '<h2 style="font-size: 50px;text-align: center;margin-top:90px;">VOTAÇÃO IMPEACHMENT</h2>';
echo "<table class='pure-table pure-table-horizontal' style='margin: 0 auto;margin-top: 20px;'>";
echo "<thead><tr><td>Deputado</td><td>Partido</td></tr></thead>";
while ($row = mysql_fetch_array($result2,MYSQL_ASSOC)) {
	echo "<tr href='/dep/deputado.php?p=".$row['id']."' class='voto_".$row['voto']."'><td>".$row['deputado']."</td><td>".$row['partido']."</td></tr>";
}
echo "</table>";

close_bd();
?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
<script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script>
<script>
new Morris.Donut({
  element: 'divname',
  data: [
    {label: "FAVOR", value: <?php echo $favor; ?>},
    {label: "CONTRA", value: <?php echo $contra; ?>},
    {label: "INDECISOS", value: <?php echo $indecisos; ?>}
  ],
  colors: ["#1e90ff","#dc5356","#444444"]
});

$(document).ready(function(){
    $('table tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
</script>
</body>
</html>