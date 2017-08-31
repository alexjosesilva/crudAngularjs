 <?php	

	$HOST  = "127.0.0.1:55609";
	$LOGIN = "azure";
	$SENHA = "6#vWHD_$";
	$db = "localdb";
 
	mysql_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db($db) or die("Não foi possível SELECIONAR o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$id			= mysql_real_escape_string($data->id);
	

	//arquivo de erros
	$erro = 'erro2.txt';
	$file = fopen($erro, 'a');
	$texto = "\n Teste:".$data->id;
	fwrite($file, $texto);
	fclose($file);

	//deletar	
	$sql = "DELETE FROM `tprodutos` WHERE `id` =".$id;
	$result = mysql_query($sql) or die("Não foi possível apagar o dados no banco");
	
	
	mysql_close();
?>