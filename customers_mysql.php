 <?php
	$HOST  = "127.0.0.1";
	$LOGIN = "azure";
	$SENHA = "6#vWHD_$";
 
	mysqli_connect( $HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysqli_select_db("localdb") or die("Não foi possível selecionar o banco de dados");
	
	$sql = "SELECT * FROM tprodutos";
	$result = mysqli_query($sql);
	$outp = "";
 
	/* Escreve resultados até que não haja mais linhas na tabela */
	 
	while($rs = mysqli_fetch_array($result)) {
		//print "$consulta[nome] - $consulta[local]<br>";
		
		if ($outp != "") {$outp .= ",";}
		
		$outp .= '{"id":"'.$rs["id"]. '",';
		$outp .= '"name":"'.$rs["name"]. '",';
		$outp .= '"price":"'.$rs["price"]. '",';
		$outp .= '"quantity":"'.$rs["quantity"]. '"}';
		
	}
	
	$outp ='{"records":['.$outp.']}';
	echo $outp;
	
	mysqli_close();
	
?>
