 <?php	

	$HOST  = "//127.0.0.1:55609/";
	$LOGIN = "azure";
	$SENHA = "vWHD_";
	$dbName= 'localdb';
 
	mysql_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	
	mysql_select_db($dbName) or die("Não foi possível selecionar o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$name 		= mysql_real_escape_string($data->name);
	$price 		= mysql_real_escape_string($data->price);
	$quantity 	= mysql_real_escape_string($data->quantity);
		
	$sql = "INSERT INTO tprodutos('id','name', 'price', 'quantity') VALUES('".$name."','".$price."','".$quantity."')";
	$result = mysql_query($sql);
	
	
	mysql_close();
?>