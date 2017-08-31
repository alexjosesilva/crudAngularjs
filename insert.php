 <?php	

	$HOST  = "127.0.0.1:55609";
	$LOGIN = "azure";
	$SENHA = "6#vWHD_$";
	$db = "localdb";
 
	mysql_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db($db) or die("Não foi possível SELECIONAR o banco de dados");
	
	$data	= json_decode(file_get_contents("php://input"));
	$id 		= $data->id;
	$name 		= $data->name;
	$price 		= $data->price;
	$quantity 	= $data->quantity;
	
	$erro = 'arquivo1.txt';
	$file = fopen($erro, 'a');
	$texto = $db;
	fwrite($file, $texto);
	fclose($file);
	 
	//insert	
	$sql = "INSERT INTO tprodutos('id','name', 'price', 'quantity') VALUES('".$id."','".$name."','".$price."','".$quantity."')";
	$result = mysql_query($sql) or die("Erro ao Inseriro no Banco");
	
	mysql_close();
?>