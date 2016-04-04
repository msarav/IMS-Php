<?

include_once("db_connection.php");

// Function to Retrieve all the Users in the table

function Retrieve_UserList($sql_condition = "")
{
	$User_list = array();

	$Retrieved_result = Retrieve_qry("Select * from users $sql_condition ");

	$i=0;

	foreach ($Retrieved_result as $Rowlist)
	{	echo $User_list[$i] = $Rowlist['First Name']." ".$Rowlist['Last Name'];
		$i++;
	}

	return $User_list;
}


// Function to Retrieve User Password -- not implemented

function Retrieve_Password()
{

}


// Function to Check Login Credentials

function Login_Check($useremail,$password)
{

	$Row_count = Check_rowcount("Select * from user_details where `User_Email` = '$useremail' and `Password` = MD5('$password')");

	if($Row_count == 1)
	{
		return "Matched";
	}
	elseif($Row_count > 1)
	{
		return "Multiple";
	}
	else
	{
		return "Not Present";
	}
}

// Function to Retrieve User IDs based on Email and Password

function Retrieve_UserID($useremail,$password)
{

	$Retrieved_result = Retrieve_qry("Select `idUser` from user_details where `User_Email` = '$useremail' and `Password` = MD5('$password');");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$UserIDs[$i] = $Rowlist['idUser'];
		$i++;
	}

	return $UserIDs[0];
}

// Function to Retrieve Profile Type for a particular User based on the USER ID

function Profile_Check($UserID)
{

	$Retrieved_result = Retrieve_qry("Select `User_Level` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$Profile_Type[$i] = $Rowlist['User_Level'];
		$i++;
	}

	return $Profile_Type[0];
}

// Function to Retrieve First Name for a particular User based on the USER ID

function Retrieve_FirstName($UserID)
{
	$Retrieved_result = Retrieve_qry("Select `First Name` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$First_Name[$i] = $Rowlist['First Name'];
		$i++;
	}

	return $First_Name[0];
}

// Function to Retrieve Profile Img for a particular User based on the USER ID

function Retrieve_ProfileImg($UserID)
{
	$Retrieved_result = Retrieve_qry("Select `Profile_Img` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$Profile_Img_loc[$i] = $Rowlist['Profile_Img'];
		$i++;
	}

	return $Profile_Img_loc[0];
}

// Function to Retrieve Last Name for a particular User based on the USER ID   --not implemented

function Retrieve_lastName()
{

}

// Function to Retrieve Full Name for a particular User based on the USER ID

function Retrieve_UserFullName($UserID)
{

	$Retrieved_result = Retrieve_qry("Select  Concat(`User_FName`, \" \", `User_LName`) as `FullName` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$UserFullName[$i] = $Rowlist['FullName'];
		$i++;
	}

	return $UserFullName[0];
}

// Function to Retrieve USER's DOB for a particular User based on the USER ID -- not implemented

function Retrieve_DOB($UserID)
{
	$Retrieved_result = Retrieve_qry("Select  `DOB` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$User_DOB[$i] = $Rowlist['DOB'];
		$i++;
	}

	return $User_DOB[0];
}

// Function to Retrieve USER's Sex for a particular User based on the USER ID -- not implemented

function Retrieve_Sex($UserID)
{
	$Retrieved_result = Retrieve_qry("Select  `Sex` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$User_Sex[$i] = $Rowlist['Sex'];
		$i++;
	}

	return $User_Sex[0];
}


// Function to Retrieve User's Address for a particular User based on the USER ID -- not implemented

function Retrieve_Address()
{

}

// Function to Retrieve User's Email Address for a particular User based on the USER ID -- not implemented

function Retrieve_EmailAddr($UserID)
{
	$Retrieved_result = Retrieve_qry("Select  `Email ID` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$User_EmailID[$i] = $Rowlist['Email ID'];
		$i++;
	}

	return $User_EmailID[0];
}

// Function to Retrieve User's Phone num for a particular User based on the USER ID -- not implemented

function Retrieve_PhoneNo($UserID)
{
	$Retrieved_result = Retrieve_qry("Select `Phone No` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$User_Phoneno[$i] = $Rowlist['Phone No'];
		$i++;
	}

	return $User_Phoneno[0];
}

// Function to Retrieve Profile Image for a particular User based on the USER ID

function Retrieve_UserProfileType($UserID)
{

	$Retrieved_result = Retrieve_qry("Select `Profile_Type` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$ProfileType[$i] = $Rowlist['Profile_Type'];
		$i++;
	}

	return $ProfileType[0];
}

// Function to Retrieve User's Profile Location for a particular User based on the USER ID -- not implemented

function Retrieve_LocationGrp($UserID)
{
	$Retrieved_result = Retrieve_qry("Select `Profile_Location` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$User_LocationGrp[$i] = $Rowlist['Profile_Location'];
		$i++;
	}

	return $User_LocationGrp[0];
}

// Function to Retrieve Profile Image for a particular User based on the USER ID

function Retrieve_UserProfileImg($UserID)
{

	$Retrieved_result = Retrieve_qry("Select `Profile_Img` from user_details where `idUser` = $UserID;");

	$i =0;

	foreach ($Retrieved_result as $Rowlist)
	{
		$ProfileImg[$i] = $Rowlist['Profile_Img'];
		$i++;
	}

	return $ProfileImg[0];
}

// Class to maintain Users information

Class OtherUsersList
{

	var $Users_FirstName;
	var $Users_LastName;
	var $Users_UserID;
	var $Users_ProfileType;

	//Constructor to assign null values for User's Details

	function  OtherUsersList()
	{
		$Users_FirstName = null;
		$Users_LastName = null;
		$Users_UserID = null;
	    $Users_ProfileType = null;

	}

	// Function to Retrieve Other Users Details based on the supplied User ID

	function Retrieve_OtherUsersList($UserID)
	{

		$Users_list = array();

		$Obj_FriendsList = new FriendsList();

		if($Obj_FriendsList->Check_LinkedFriendsList($UserID) > 0 ){

			$FriendsList_val = $Obj_FriendsList->Retrieve_LinkedFriends($UserID);

			$UserID_Exclusion = $UserID.",".$FriendsList_val[0];
		}
		else
			$UserID_Exclusion = $UserID;

		$Retrieved_result = Retrieve_qry("select `UserID` from user_details where UserID not in ($UserID_Exclusion) order by `UserID`");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Users_list_arr[$i] = $Rowlist['UserID'];
			$i++;
		}

		foreach($Users_list_arr as $User_ID)
		{
			$UsersList_Details[$User_ID]["name"] = Retrieve_FirstName($User_ID);
			$UsersList_Details[$User_ID]["profile"] = Profile_Check($User_ID);
			$UsersList_Details[$User_ID]["id"] = $User_ID;
			$UsersList_Details[$User_ID]["profile_img_loc"] = Retrieve_ProfileImg($User_ID);

		}

		return $UsersList_Details;
	}

	// Function to Check Other Users List based on the supplied User ID i,e excluding the Linked Users

	function Check_OtherUsersList($UserID)
	{

		$Users_list = array();

		$Obj_FriendsList = new FriendsList();

		if($Obj_FriendsList->Check_LinkedFriendsList($UserID) > 0 ){

			$FriendsList_val = $Obj_FriendsList->Retrieve_LinkedFriends($UserID);

			$UserID_Exclusion = $UserID.",".$FriendsList_val[0];
		}
		else
			$UserID_Exclusion = $UserID;

		$Qry_result_size = RowCount_qry("select `UserID` from users where   `UserID` not in ($UserID_Exclusion) order by `UserID`");

		if($Qry_result_size > 0){

			$UsersList_length = $Qry_result_size;

		}
		else
			$UsersList_length = 0;

		return $UsersList_length;
	}

}

?>
