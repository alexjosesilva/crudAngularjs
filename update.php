 <?php	

	$HOST  = "127.0.0.1:55609";
	$LOGIN = "azure";
	$SENHA = "6#vWHD_$";
	$db = "localdb";
 
	mysql_connect($HOST, $LOGIN, $SENHA) or die("Não foi possível a conexão com o servidor");
	mysql_select_db($db) or die("Não foi possível SELECIONAR o banco de dados");
	
	$data		= json_decode(file_get_contents("php://input"));
	$id			= mysql_real_escape_string($data->id);
	$name 		= mysql_real_escape_string($data->name);
	$price 		= mysql_real_escape_string($data->price);
	$quantity 	= mysql_real_escape_string($data->quantity);
	
	
	//update	
	$sql = "UPDATE `tprodutos` SET `name`=".$name.",`price`=".$price.",`quantity` = ".$quantity." WHERE `tprodutos`.`id` = ".$id.";";
	$result = mysql_query($sql)or die("Erro em Atualizar os Dados no Banco");
	
	mysql_close();
?>