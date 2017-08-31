 <?php	

	$HOST  	= "127.0.0.1:55609";
	$LOGIN 	= "azure";
	$SENHA 	= "6#vWHD_$";
	$db 	= "localdb";
 
	mysql_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db($db) or die("Não foi possível SELECIONAR o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$id 		= $data->id;
	$name 		= $data->name;
	$price 		= $data->price;
	$quantity 	= $data->quantity;
	 
	//insert	
	$sql1 = "INSERT INTO tprodutos('id','name','price','quantity') VALUES(NULL,'".$name."','".$price."','".$quantity."')";
	$sql = "INSERT INTO `tprodutos` (`id`, `name`, `price`, `quantity`) VALUES (NULL, '".$name."', '".$price."', '".$quantity."');";
	
	$result = mysql_query($sql) or die("Erro ao Inseriro no Banco");
	
	
	$erro = 'arquivo2.txt';
	$file = fopen($erro, 'a');
	$texto = $data->name;
	fwrite($file, $texto);
	fclose($file);
	
		
	mysql_close();
?>