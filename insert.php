 <?php	

	$HOST  = "//127.0.0.1:55609/";
	$LOGIN = "azure";
	$SENHA = "vWHD_";
	$dbName= 'localdb';
 
	mysqli_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	
	mysqli_select_db($dbName) or die("Não foi possível selecionar o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$name 		= mysqli_real_escape_string($data->name);
	$price 		= mysqli_real_escape_string($data->price);
	$quantity 	= mysqli_real_escape_string($data->quantity);
		
	$sql = "INSERT INTO tprodutos('id','name', 'price', 'quantity') VALUES(null,'".$name."','".$price."','".$quantity."')";
	$result = mysqli_query($sql);
	
	
	mysqli_close();
?>