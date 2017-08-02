 <?php
	$HOST  = "//127.0.0.1:55609/";
	$LOGIN = "azure";
	$SENHA = "6#vWHD_$";
 
	mysql_connect( $HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db("localdb") or die("Não foi possível selecionar o banco de dados");
	
	$sql = "SELECT * FROM tprodutos";
	$result = mysql_query($sql);
	$outp = "";
 
	/* Escreve resultados até que não haja mais linhas na tabela */
	 
	while($rs = mysql_fetch_array($result)) {
		//print "$consulta[nome] - $consulta[local]<br>";
		
		if ($outp != "") {$outp .= ",";}
		
		$outp .= '{"id":"'.$rs["id"]. '",';
		$outp .= '"name":"'.$rs["name"]. '",';
		$outp .= '"price":"'.$rs["price"]. '",';
		$outp .= '"quantity":"'.$rs["quantity"]. '"}';
		
	}
	
	$outp ='{"records":['.$outp.']}';
	echo $outp;
	
	mysql_close();
	
?>
