<?

include_once("db_connection.php");

function Check_Student_id_StuDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent from student_details where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}

?>
