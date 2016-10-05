<?php 
include("../constantes.php");
conn_bd();
$result2 = mysql_query("SELECT * FROM `testedep` WHERE `id` = '".$_GET["p"]."';");
while ($row = mysql_fetch_array($result2,MYSQL_ASSOC)) {
	$voto = "voto_".$row['voto'];
}
close_bd();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="robots" content="none">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" type="text/css" href="tipped.css"/>
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
.CONTRA{
	color:#dc5356;
}
.FAVOR{
	color:#1e90ff;
}
.INDECISO{
	color:#eeeeee;
}
</style>
</head>
<body class="<?php echo $voto; ?>">
<div class="pure-menu pure-menu-horizontal">
    <a href="/dep/teste_dep.php" class="pure-menu-heading pure-menu-link">Home</a>
</div>
<?php

conn_bd();
$result2 = mysql_query("SELECT * FROM `testedep` WHERE `id` = '".$_GET["p"]."';");
while ($row = mysql_fetch_array($result2,MYSQL_ASSOC)) {
	$deputado = $row["deputado"];
	echo '<div class="deputado" style="width: 60%;margin: 0 auto;"><h2 style="font-size: 50px;text-align: center;">DEPUTADO '.$row["deputado"].'</h2>';
	echo '<h3 style="font-size: 30px;text-align: center;">VOTA '.$row["voto"].'</h2>';
	echo '<img src=img/'.$row['img'].' style="width: 260px;"/>';
	echo "<table class='pure-table pure-table-horizontal class='voto_".$row['voto']."'' style='float: right;width: 470px;'>";
	echo "<tr><td>Partido</td><td>".$row['partido']."</td></tr>";
	echo "<tr><td>Estado</td><td><a href='/dep/estado.php?p=".$row['estado']."'>".$row['estado']."</a></td></tr>";
	echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
	echo "<tr><td>Telefone</td><td>(61) ".$row['telefone']."</td></tr>";
	echo "<tr><td>Facebook:</td><td><a href='".$row['facebook']."'>".$row['facebook']."</a></td></tr>";
	echo "<tr><td>Twitter:</td><td><a href='".$row['twitter']."'>".$row['twitter']."</a></td></tr>";
	echo "<tr><td>Instagram</td><td><a href='".$row['instagram']."'>".$row['instagram']."</a></td></tr>";
	echo "</table></div>";
}

echo '<div class="votacao" style="width: 60%;margin: 0 auto;margin-top:80px;"><h2 style="font-size: 50px;text-align: center;">VOTAÇÃO POR MUNICÍPIO</h2>';
echo "<table class='pure-table pure-table-horizontal' style='width: 100%;'><thead><tr><td>Município</td><td>Votos</td><td>%</td></tr></thead>";
$result4 = mysql_query("SELECT SUM(`votos`) AS total FROM `votosmunicipais` WHERE `deputado` = '".$deputado."' ORDER BY `votos` DESC;");
$total = mysql_result($result4, 0);
$result3 = mysql_query("SELECT * FROM `votosmunicipais` WHERE `deputado` = '".$deputado."' ORDER BY `votos` DESC;");
while ($row = mysql_fetch_array($result3,MYSQL_ASSOC)) {
	echo "<tr><td>".$row['municipio']."</td><td>".$row['votos']."</td><td>".number_format((($row['votos']/$total)*100),1,",","")."</td></tr>";
}
echo "</table></div>";

close_bd();
?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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