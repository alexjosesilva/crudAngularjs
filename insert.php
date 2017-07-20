 <?php	
	$HOST  = "localhost";
	$LOGIN = "root";
	$SENHA = "";
 
	mysql_connect( $HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db("bancoteste") or die("Não foi possível selecionar o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$bname 		= mysql_real_escape_string($data->name);
	$price 		= mysql_real_escape_string($data->price);
	$quantity 	= mysql_real_escape_string($data->quantity);
		
	$sql = "INSERT INTO tprodutos('name', 'price', 'quantity') VALUES('".$name."','".$price."','".$quantity."')";
	$result = mysql_query($sql);
	
	
	mysql_close();
?>