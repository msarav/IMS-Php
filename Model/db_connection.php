<?php
$conn = null;
$servername = "localhost";
$username = "root";
$password = "";
$default_db_name = "ims";
$db_up_flag =false;

function DB_Connect(){

	try {

		$GLOBALS['conn'] = new PDO("mysql:host=".$GLOBALS['servername'].";dbname=".$GLOBALS['default_db_name']."", $GLOBALS['username'], $GLOBALS['password']);

		// set the PDO error mode to exception
		$GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// echo $database_name." Connected successfully";

		$GLOBALS['db_up_flag'] = true;

		// echo "\n DB flag is ".$GLOBALS['db_up_flag'];

	}
	catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
}

function DB_ConnectCustomDb($database_name){

	try {
		$GLOBALS['conn'] = new PDO("mysql:host=".$GLOBALS['servername'].";dbname=".$GLOBALS['default_db_name']."", $GLOBALS['username'], $GLOBALS['password']);

		// set the PDO error mode to exception
		$GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// echo $database_name." Connected successfully";

		$GLOBALS['db_up_flag'] = true;

		// echo "\n DB flag is ".$GLOBALS['db_up_flag'];

	}
	catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
}

function DB_Create(String $db_name)
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			// set the PDO error mode to exception
			$GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "CREATE DATABASE $db_name;";

			// use exec() because no results are returned
			$GLOBALS['conn']->exec($sql);

			echo "Database created successfully<br>";
			}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}

	//$conn = null;
}

function Table_Create($sql_query)
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			// sql to create table
			$sql = "$sql_query";

			// use exec() because no results are returned
			$GLOBALS['conn']->exec($sql);

			echo "Table created successfully";
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Insert_SingleRecqry($sql_query)
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			// sql to create table
			$sql = "$sql_query";

			// use exec() because no results are returned
			$GLOBALS['conn']->exec($sql);

			echo "New record inserted Successfully";
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Insert_MultiRecqry($sql_query)
{
	$i=0;
	try {
		if($GLOBALS['db_up_flag'])
		{
			if(gettype ($sql_query) == 'array')
			{
				While($i < $sql_query.length)
				{
					// sql to create table
					$sql = $sql_query[i];

					// use exec() because no results are returned
					$GLOBALS['conn']->exec($sql);

					echo "New record inserted Successfully";
				}
			}
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Retrieve_lastInsertedID()
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			$last_id = $GLOBALS['conn']->lastInsertId();

			return $last_id;
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Retrieve_qry($sql_query)
{

	try {
		if($GLOBALS['db_up_flag'])
		{
			$stmt = $GLOBALS['conn']->prepare("$sql_query");

			$stmt->execute();

			//set the resulting array to associative
			// $result = $stmt->setFetchMode(PDO::FETCH_BOTH);

			// $fetch_Array[] = $stmt->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);

			$fetch_Array = $stmt->fetchAll(PDO::FETCH_BOTH);

			// var_dump($fetch_Array);

			return $fetch_Array;


		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function RowCount_qry($sql_query)
{

	try {
		if($GLOBALS['db_up_flag'])
		{
			$stmt = $GLOBALS['conn']->prepare("$sql_query");

			$stmt->execute();

			//set the resulting array to associative
			// $result = $stmt->setFetchMode(PDO::FETCH_BOTH);

			// $fetch_Array[] = $stmt->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);

			$rowcount = $stmt->rowCount();

			// var_dump($fetch_Array);

			return $rowcount;


		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Execute_qry($sql_query)
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			$stmt = $GLOBALS['conn']->prepare("$sql_query");

			$stmt->execute();

			$row_count = $stmt->rowCount();

			// print_r($row_count);

			return $row_count;

			// echo "New record inserted Successfully";
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function Check_rowcount($sql_query)
{
	try {
		if($GLOBALS['db_up_flag'])
		{
			$stmt = $GLOBALS['conn']->prepare("$sql_query");

			$stmt->execute();

			$row_count = $stmt->rowCount();

			// print_r($row_count);

			return $row_count;
		}
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
}

function DB_Close()
{
	$GLOBALS['conn'] = null;
}


DB_Connect();



?>
