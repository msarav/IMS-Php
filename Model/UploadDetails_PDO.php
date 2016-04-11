<?

include_once("db_connection.php");

function Check_Student_id_StuDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent from student_details where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}

function Check_Student_id_EduDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent_EducationEntry from student_edudetails where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}

function Check_Student_id_CertDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent from student_certdetails where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}

function Check_Student_id_WrkexpDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent from preinternship_wrkexperience where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}

function Check_Student_id_SkillDetails($Stu_id)
{

	$Stu_id_chk = RowCount_qry("Select idStudent from student_skillset where `idStudent` = '$Stu_id'");

	return 	$Stu_id_chk;

}
// Student_PreIntern_details class to wrap all the Student PreIntern detail data  //

Class Student_PreIntern_details
{

	var $Sem_Regtd;
	var $Year_Regtd;
	var $Stu_id;
	var $Stu_fname;
	var $Stu_lname;
	var $Stu_email;
	var $Stu_phonenum;
	var $Stu_status;
	var $Stu_gender;

	var $Stu_UG_major;
	var $Stu_UG_gpa;
	var $Stu_UG_univ;
	var $Stu_UG_country;
	var $Stu_UG_mm;
	var $Stu_UG_yy;

	var $Stu_PG_major;
	var $Stu_PG_gpa;
	var $Stu_PG_univ;
	var $Stu_PG_country;
	var $Stu_PG_mm;
	var $Stu_PG_yy;

	var $Stu_other1_major;
	var $Stu_other1_gpa;
	var $Stu_other1_univ;
	var $Stu_other1_country;
	var $Stu_other1_mm;
	var $Stu_other1_yy;

	var $Stu_other2_major;
	var $Stu_other2_gpa;
	var $Stu_other2_univ;
	var $Stu_other2_country;
	var $Stu_other2_mm;
	var $Stu_other2_yy;

	var $Stu_cert1_title;
	var $Stu_cert1_title_body;
	var $Stu_cert1_issuedyear;
	var $Stu_cert1_validtillyear;

	var $Stu_cert2_title;
	var $Stu_cert2_title_body;
	var $Stu_cert2_issuedyear;
	var $Stu_cert2_validtillyear;

	var $Stu_cert3_title;
	var $Stu_cert3_title_body;
	var $Stu_cert3_issuedyear;
	var $Stu_cert3_validtillyear;

	var $Stu_wrkexp1_company;
	var $Stu_wrkexp1_from_mm;
	var $Stu_wrkexp1_from_yyyy;
	var $Stu_wrkexp1_till_mm;
	var $Stu_wrkexp1_till_yyyy;
	var $Stu_wrkexp1_title;
	var $Stu_wrkexp1_duties;

	var $Stu_wrkexp2_company;
	var $Stu_wrkexp2_from_mm;
	var $Stu_wrkexp2_from_yyyy;
	var $Stu_wrkexp2_till_mm;
	var $Stu_wrkexp2_till_yyyy;
	var $Stu_wrkexp2_title;
	var $Stu_wrkexp2_duties;

	var $Stu_wrkexp3_company;
	var $Stu_wrkexp3_from_mm;
	var $Stu_wrkexp3_from_yyyy;
	var $Stu_wrkexp3_till_mm;
	var $Stu_wrkexp3_till_yyyy;
	var $Stu_wrkexp3_title;
	var $Stu_wrkexp3_duties;

	var $Stu_techskill_list;
	var $Stu_techskill_otherlist;
	var $Stu_cmsskill_list;
	var $Stu_cmsskill_otherlist;
	var $Stu_osskill_list;
	var $Stu_osskill_otherlist;

	function Student_PreIntern_details()
	{
	   $Sem_Regtd = null;
		 $Year_Regtd = null;
		 $Stu_id = null;
		 $Stu_fname = null;
		 $Stu_lname = null;
		 $Stu_email = null;
		 $Stu_phonenum = null;
		 $Stu_status = null;
		 $Stu_gender = null;

		 $Stu_UG_major = null;
		 $Stu_UG_gpa = null;
		 $Stu_UG_univ = null;
		 $Stu_UG_country = null;
		 $Stu_UG_mm = null;
		 $Stu_UG_yy = null;

		 $Stu_PG_major = null;
		 $Stu_PG_gpa = null;
		 $Stu_PG_univ = null;
		 $Stu_PG_country = null;
		 $Stu_PG_mm = null;
		 $Stu_PG_yy = null;

		 $Stu_other1_major = null;
		 $Stu_other1_gpa = null;
		 $Stu_other1_univ = null;
		 $Stu_other1_country = null;
		 $Stu_other1_mm = null;
		 $Stu_other1_yy = null;

		 $Stu_other2_major = null;
		 $Stu_other2_gpa = null;
		 $Stu_other2_univ = null;
		 $Stu_other2_country = null;
		 $Stu_other2_mm = null;
		 $Stu_other2_yy = null;

		 $Stu_cert1_title = null;
		 $Stu_cert1_title_body = null;
		 $Stu_cert1_issuedyear = null;
		 $Stu_cert1_validtillyear = null;

		 $Stu_cert2_title = null;
		 $Stu_cert2_title_body = null;
		 $Stu_cert2_issuedyear = null;
		 $Stu_cert2_validtillyear = null;

		 $Stu_cert3_title = null;
		 $Stu_cert3_title_body = null;
		 $Stu_cert3_issuedyear = null;
		 $Stu_cert3_validtillyear = null;

		 $Stu_wrkexp1_company = null;
		 $Stu_wrkexp1_from_mm = null;
		 $Stu_wrkexp1_from_yyyy = null;
		 $Stu_wrkexp1_till_mm = null;
		 $Stu_wrkexp1_till_yyyy = null;
		 $Stu_wrkexp1_title = null;
		 $Stu_wrkexp1_duties = null;

		 $Stu_wrkexp2_company = null;
		 $Stu_wrkexp2_from_mm = null;
		 $Stu_wrkexp2_from_yyyy = null;
		 $Stu_wrkexp2_till_mm = null;
		 $Stu_wrkexp2_till_yyyy = null;
		 $Stu_wrkexp2_title = null;
		 $Stu_wrkexp2_duties = null;

		 $Stu_wrkexp3_company = null;
		 $Stu_wrkexp3_from_mm = null;
		 $Stu_wrkexp3_from_yyyy = null;
		 $Stu_wrkexp3_till_mm = null;
		 $Stu_wrkexp3_till_yyyy = null;
		 $Stu_wrkexp3_title = null;
		 $Stu_wrkexp3_duties = null;

		 $Stu_techskill_list = null;
		 $Stu_techskill_otherlist = null;
		 $Stu_cmsskill_list = null;
		 $Stu_cmsskill_otherlist = null;
		 $Stu_osskill_list = null;
		 $Stu_osskill_otherlist = null;

	}

	function deleteStudent_details($Student_ID_arr)
	{
			$row_count=0;

			foreach($Student_ID_arr as $Student_ID){

					$Updated_rows = Execute_qry("Delete from `student_details` where `idStudent` like '$Student_ID';");
					$Updated_rows = Execute_qry("Delete from `student_edudetails` where `idStudent` like '$Student_ID';");
					$Updated_rows = Execute_qry("Delete from `student_skillset` where `idStudent` like '$Student_ID';");
					$Updated_rows = Execute_qry("Delete from `student_certdetails` where `idStudent` like '$Student_ID';");
					$Updated_rows = Execute_qry("Delete from `preinternship_wrkexperience` where `idStudent` like '$Student_ID';");
					$Updated_rows = Execute_qry("Delete from `intern_interested_students` where `student_id` like '$Student_ID';");

					$row_count++;
			}

			if($row_count >= 1)
					return $row_count;
			else {
					# code...
					return 0;
			}

	}

	 function retrieveStudent_PreIntern_details($UserID)
	 {
		  $Student_PreIntern_details = array();

		  $retrieved_result = retrieve_qry("select

						stu_details.`idStudent`,stu_details.`Student_FName`,stu_details.`Student_MName`,stu_details.`Student_LName`,stu_details.`Student_Email`,
						stu_details.`Student_RegisteredSemester`,stu_details.`Student_RegisteredYear`,stu_details.`Student_Degree`,
						stu_details.`Student_Phonenum`,stu_details.`Student_Gender`,stu_details.`Student_Status`,stu_details.`Student_Country`,

						stu_cert.`EduDetails_Cert1Title`,stu_cert.`EduDetails_Cert1Body`,stu_cert.`EduDetails_Cert1IssuedDate`,
						stu_cert.`EduDetails_Cert1ValidityDate`,stu_cert.`EduDetails_Cert2Title`,stu_cert.`EduDetails_Cert2Body`,
						stu_cert.`EduDetails_Cert2IssuedDate`,stu_cert.`EduDetails_Cert2ValidityDate`,stu_cert.`EduDetails_Cert3Title`,
						stu_cert.`EduDetails_Cert3Body`,stu_cert.`EduDetails_Cert3IssuedDate`,stu_cert.`EduDetails_Cert3ValidityDate`,

						stu_wrkexp.`WrkExp1_Company`,stu_wrkexp.`WrkExp1_FromDate`,stu_wrkexp.`WrkExp1_TillDate`,stu_wrkexp.`WrkExp1_Title`,
						stu_wrkexp.`WrkExp1_Duties`,stu_wrkexp.`WrkExp1_Duration`,stu_wrkexp.`WrkExp2_Company`,stu_wrkexp.`WrkExp2_FromDate`,
						stu_wrkexp.`WrkExp2_TillDate`,stu_wrkexp.`WrkExp2_Title`,stu_wrkexp.`WrkExp2_Duties`,stu_wrkexp.`WrkExp2_Duration`,
						stu_wrkexp.`WrkExp3_Company`,stu_wrkexp.`WrkExp3_FromDate`,stu_wrkexp.`WrkExp3_TillDate`,stu_wrkexp.`WrkExp3_Title`,
						stu_wrkexp.`WrkExp3_Duties`,stu_wrkexp.`WrkExp3_Duration`,stu_wrkexp.`WrkExp4_Company`,stu_wrkexp.`WrkExp4_FromDate`,
						stu_wrkexp.`WrkExp4_TillDate`,stu_wrkexp.`WrkExp4_Title`,stu_wrkexp.`WrkExp4_Duties`,stu_wrkexp.`WrkExp4_Duration`,

						stu_edu.`EduDetails_UnderGradMajor`,stu_edu.`EduDetails_UnderGradDegree`,stu_edu.`EduDetails_UnderGradGPA`,
						stu_edu.`EduDetails_UnderGradUniversity`,stu_edu.`EduDetails_UnderGradCountry`,stu_edu.`EduDetails_UnderGradDate`,
						stu_edu.`EduDetails_GradMajor`,stu_edu.`EduDetails_GradDegree`,stu_edu.`EduDetails_GradGPA`,
						stu_edu.`EduDetails_GradUniversity`,stu_edu.`EduDetails_GradCountry`,stu_edu.`EduDetails_GradDate`,
						stu_edu.`EduDetails_Other1Name`,stu_edu.`EduDetails_Other1Major`,stu_edu.`EduDetails_Other1Degree`,
						stu_edu.`EduDetails_Other1GPA`,stu_edu.`EduDetails_Other1University`,stu_edu.`EduDetails_Other1Country`,
						stu_edu.`EduDetails_Other1Date`,stu_edu.`EduDetails_Other2Name`,stu_edu.`EduDetails_Other2Major`,
						stu_edu.`EduDetails_Other2Degree`,stu_edu.`EduDetails_Other2GPA`,stu_edu.`EduDetails_Other2University`,
						stu_edu.`EduDetails_Other2Country`,stu_edu.`EduDetails_Other2Date`,

						stu_skill.`skillset_linked`

				from
						  student_details stu_details LEFT JOIN student_certdetails stu_cert
				      on
						  stu_details.idStudent_CertificationEntry = stu_cert.idStudent_CertificationEntry

						LEFT JOIN preinternship_wrkexperience stu_wrkexp

						on
						  stu_details.idStudent_WrkExperience = stu_wrkexp.idStudent_WrkExperience

				   	LEFT JOIN student_edudetails stu_edu

						on
						  stu_details.idStudent_EducationEntry = stu_edu.idStudent_EducationEntry

				    	LEFT JOIN student_skillset stu_skill

						on
						  stu_details.idStudent_Skillset = stu_skill.idStudent_Skillset

				where stu_details.`idStudent` = '$UserID';");

		foreach ($retrieved_result as $rowlist)
		{

			$Student_PreIntern_details['Student_id'] = $rowlist['idStudent'];
			$Student_PreIntern_details['Student_FName'] = $rowlist['Student_FName'];
			$Student_PreIntern_details['Student_MName'] = $rowlist['Student_MName'];
			$Student_PreIntern_details['Student_LName'] = $rowlist['Student_LName'];
			$Student_PreIntern_details['Student_Email'] = $rowlist['Student_Email'];
			$Student_PreIntern_details['Student_RegisteredSemester'] = $rowlist['Student_RegisteredSemester'];
			$Student_PreIntern_details['Student_RegisteredYear'] = $rowlist['Student_RegisteredYear'];
			$Student_PreIntern_details['Student_Degree'] = $rowlist['Student_Degree'];
			$Student_PreIntern_details['Student_Phonenum'] = $rowlist['Student_Phonenum'];
			$Student_PreIntern_details['Student_Gender'] = $rowlist['Student_Gender'];
			$Student_PreIntern_details['Student_Status'] = $rowlist['Student_Status'];
			$Student_PreIntern_details['Student_Country'] = $rowlist['Student_Country'];

			$Student_PreIntern_details['EduDetails_Cert1Title'] = $rowlist['EduDetails_Cert1Title'];
			$Student_PreIntern_details['EduDetails_Cert1Body'] = $rowlist['EduDetails_Cert1Body'];
			$Student_PreIntern_details['EduDetails_Cert1IssuedDate'] = $rowlist['EduDetails_Cert1IssuedDate'];
			$Student_PreIntern_details['EduDetails_Cert1ValidityDate'] = $rowlist['EduDetails_Cert1ValidityDate'];
			$Student_PreIntern_details['EduDetails_Cert2Title'] = $rowlist['EduDetails_Cert2Title'];
			$Student_PreIntern_details['EduDetails_Cert2Body'] = $rowlist['EduDetails_Cert2Body'];
			$Student_PreIntern_details['EduDetails_Cert2IssuedDate'] = $rowlist['EduDetails_Cert2IssuedDate'];
			$Student_PreIntern_details['EduDetails_Cert2ValidityDate'] = $rowlist['EduDetails_Cert2ValidityDate'];
			$Student_PreIntern_details['EduDetails_Cert3Title'] = $rowlist['EduDetails_Cert3Title'];
			$Student_PreIntern_details['EduDetails_Cert3Body'] = $rowlist['EduDetails_Cert3Body'];
			$Student_PreIntern_details['EduDetails_Cert3IssuedDate'] = $rowlist['EduDetails_Cert3IssuedDate'];
			$Student_PreIntern_details['EduDetails_Cert3ValidityDate'] = $rowlist['EduDetails_Cert3ValidityDate'];

			$Student_PreIntern_details['WrkExp1_Company'] = $rowlist['WrkExp1_Company'];
			$Student_PreIntern_details['WrkExp1_FromDate'] = $rowlist['WrkExp1_FromDate'];
			$Student_PreIntern_details['WrkExp1_TillDate'] = $rowlist['WrkExp1_TillDate'];
			$Student_PreIntern_details['WrkExp1_Title'] = $rowlist['WrkExp1_Title'];
			$Student_PreIntern_details['WrkExp1_Duties'] = $rowlist['WrkExp1_Duties'];
			$Student_PreIntern_details['WrkExp1_Duration'] = $rowlist['WrkExp1_Duration'];
			$Student_PreIntern_details['WrkExp2_Company'] = $rowlist['WrkExp2_Company'];
			$Student_PreIntern_details['WrkExp2_FromDate'] = $rowlist['WrkExp2_FromDate'];
			$Student_PreIntern_details['WrkExp2_TillDate'] = $rowlist['WrkExp2_TillDate'];
			$Student_PreIntern_details['WrkExp2_Title'] = $rowlist['WrkExp2_Title'];
			$Student_PreIntern_details['WrkExp2_Duties'] = $rowlist['WrkExp2_Duties'];
			$Student_PreIntern_details['WrkExp2_Duration'] = $rowlist['WrkExp2_Duration'];
			$Student_PreIntern_details['WrkExp3_Company'] = $rowlist['WrkExp3_Company'];
			$Student_PreIntern_details['WrkExp3_FromDate'] = $rowlist['WrkExp3_FromDate'];
			$Student_PreIntern_details['WrkExp3_TillDate'] = $rowlist['WrkExp3_TillDate'];
			$Student_PreIntern_details['WrkExp3_Title'] = $rowlist['WrkExp3_Title'];
			$Student_PreIntern_details['WrkExp3_Duties'] = $rowlist['WrkExp3_Duties'];
			$Student_PreIntern_details['WrkExp3_Duration'] = $rowlist['WrkExp3_Duration'];
			$Student_PreIntern_details['WrkExp4_Company'] = $rowlist['WrkExp4_Company'];
			$Student_PreIntern_details['WrkExp4_FromDate'] = $rowlist['WrkExp4_FromDate'];
			$Student_PreIntern_details['WrkExp4_TillDate'] = $rowlist['WrkExp4_TillDate'];
			$Student_PreIntern_details['WrkExp4_Title'] = $rowlist['WrkExp4_Title'];
			$Student_PreIntern_details['WrkExp4_Duties'] = $rowlist['WrkExp4_Duties'];
			$Student_PreIntern_details['WrkExp4_Duration'] = $rowlist['WrkExp4_Duration'];

			$Student_PreIntern_details['EduDetails_UnderGradMajor'] = $rowlist['EduDetails_UnderGradMajor'];
			$Student_PreIntern_details['EduDetails_UnderGradDegree'] = $rowlist['EduDetails_UnderGradDegree'];
			$Student_PreIntern_details['EduDetails_UnderGradGPA'] = $rowlist['EduDetails_UnderGradGPA'];
			$Student_PreIntern_details['EduDetails_UnderGradUniversity'] = $rowlist['EduDetails_UnderGradUniversity'];
			$Student_PreIntern_details['EduDetails_UnderGradCountry'] = $rowlist['EduDetails_UnderGradCountry'];
			$Student_PreIntern_details['EduDetails_UnderGradDate'] = $rowlist['EduDetails_UnderGradDate'];
			$Student_PreIntern_details['EduDetails_GradMajor'] = $rowlist['EduDetails_GradMajor'];
			$Student_PreIntern_details['EduDetails_GradDegree'] = $rowlist['EduDetails_GradDegree'];
			$Student_PreIntern_details['EduDetails_GradGPA'] = $rowlist['EduDetails_GradGPA'];
			$Student_PreIntern_details['EduDetails_GradUniversity'] = $rowlist['EduDetails_GradUniversity'];
			$Student_PreIntern_details['EduDetails_GradCountry'] = $rowlist['EduDetails_GradCountry'];
			$Student_PreIntern_details['EduDetails_GradDate'] = $rowlist['EduDetails_GradDate'];
			$Student_PreIntern_details['EduDetails_Other1Name'] = $rowlist['EduDetails_Other1Name'];
			$Student_PreIntern_details['EduDetails_Other1Major'] = $rowlist['EduDetails_Other1Major'];
			$Student_PreIntern_details['EduDetails_Other1Degree'] = $rowlist['EduDetails_Other1Degree'];
			$Student_PreIntern_details['EduDetails_Other1GPA'] = $rowlist['EduDetails_Other1GPA'];
			$Student_PreIntern_details['EduDetails_Other1University'] = $rowlist['EduDetails_Other1University'];
			$Student_PreIntern_details['EduDetails_Other1Country'] = $rowlist['EduDetails_Other1Country'];
			$Student_PreIntern_details['EduDetails_Other1Date'] = $rowlist['EduDetails_Other1Date'];
			$Student_PreIntern_details['EduDetails_Other2Name'] = $rowlist['EduDetails_Other2Name'];
			$Student_PreIntern_details['EduDetails_Other2Major'] = $rowlist['EduDetails_Other2Major'];
			$Student_PreIntern_details['EduDetails_Other2Degree'] = $rowlist['EduDetails_Other2Degree'];
			$Student_PreIntern_details['EduDetails_Other2GPA'] = $rowlist['EduDetails_Other2GPA'];
			$Student_PreIntern_details['EduDetails_Other2University'] = $rowlist['EduDetails_Other2University'];
			$Student_PreIntern_details['EduDetails_Other2Country'] = $rowlist['EduDetails_Other2Country'];
			$Student_PreIntern_details['EduDetails_Other2Date'] = $rowlist['EduDetails_Other2Date'];

			$Skillset_arr= explode(",",$rowlist['skillset_linked']);

			$i=0;

			foreach($Skillset_arr as $Skill_id)
			{

				$Retrieved_result = Retrieve_qry("Select  `skill_name` from skillset_lookup where `id_skill` = $Skill_id;");

				$j =0;

				foreach ($Retrieved_result as $Rowlist)
				{
					$Skill_name[$j] = $Rowlist['skill_name'];
					$j++;
				}

				$Student_PreIntern_details['Skillset_name'][$i] = $Skill_name[0];
				$i++;

			 }
		}

			return 	$Student_PreIntern_details;

	// 	// echo $GHC_Privacy_val;
	// 	// exit();

  }


//----------------- Personal Info -----------------------------//

	 function setStudent_PreIntern_Details($StuID,$sqlcndtn,$idStudent_EducationEntry,$idStudent_CertificationEntry,$idStudent_WrkExpEntry,$idStudent_SkillSetEntry)
	 {
  	$Updated_rows = Execute_qry("	INSERT INTO `ims`.`student_details`(`idStudent`,`idStudent_EducationEntry`,	`idStudent_CertificationEntry`,`idStudent_WrkExperience`,`idStudent_Skillset`) VALUES ('$StuID',$idStudent_EducationEntry,$idStudent_CertificationEntry,$idStudent_WrkExpEntry,$idStudent_SkillSetEntry);");

		$Updated_rows = Execute_qry("Update `student_details` set  $sqlcndtn where `idStudent` = '$StuID';");

  	if($Updated_rows >= 1)
  			return "updated";
	 }

	 function updateStudent_PreIntern_Details($StuID,$sqlcndtn)
	 {

   $Updated_rows = Execute_qry("Update `student_details` set  $sqlcndtn where `idStudent` = '$StuID';");

 		if($Updated_rows >= 1)
 			return "updated";
	 }

//-------------------- Education Details ------------------------------//

	 function setStudent_PreIntern_Details_EduInfo($StuID,$sqlcndtn)
	 {
		$Updated_rows = Execute_qry("	INSERT INTO `student_edudetails` (`idStudent`) VALUES ('$StuID');");

		$Updated_rows = Execute_qry("Update `student_edudetails` set  $sqlcndtn where `idStudent` ='$StuID';");

			if($Updated_rows >= 1)
				return Execute_qry("Select `idStudent_EducationEntry` from `student_edudetails` where `idStudent` = '$StuID';");
	 }

	 function updateStudent_PreIntern_Details_EduInfo($StuID,$sqlcndtn)
	 {
		$Updated_rows = Execute_qry("Update `student_edudetails` set  $sqlcndtn where `idStudent` = '$StuID';");

			if($Updated_rows >= 1)
				return Execute_qry("Select `idStudent_EducationEntry` from `student_edudetails` where `idStudent` = '$StuID';");
	 }

//--------------------- For Certification ---------------------------------//

	 function setStudent_PreIntern_Details_CertInfo($StuID,$sqlcndtn)
	 {
		$Updated_rows = Execute_qry("	INSERT INTO `student_certdetails` (`idStudent`) VALUES ('$StuID');");

		$Updated_rows = Execute_qry("Update `student_certdetails` set  $sqlcndtn where `idStudent` = '$StuID';");

			if($Updated_rows >= 1)
				return Execute_qry("Select `idStudent_CertificationEntry` from `student_certdetails` where `idStudent` = '$StuID';");
	 }

	 function updateStudent_PreIntern_Details_CertInfo($StuID,$sqlcndtn)
	 {
		$Updated_rows = Execute_qry("Update `student_certdetails` set  $sqlcndtn where `idStudent` = '$StuID';");

			if($Updated_rows >= 1)
				return Execute_qry("Select `idStudent_CertificationEntry` from `student_certdetails` where `idStudent` = '$StuID';");
	 }


	 //--------------------- For Work Experience ---------------------------------//

	 	 function setStudent_PreIntern_Details_WrkExpInfo($StuID,$sqlcndtn)
	 	 {
	 		$Updated_rows = Execute_qry("INSERT INTO `preinternship_wrkexperience` (`idStudent`) VALUES ('$StuID');");

	 		$Updated_rows = Execute_qry("Update `preinternship_wrkexperience` set  $sqlcndtn where `idStudent` = '$StuID';");

	 			if($Updated_rows >= 1)
	 				return Execute_qry("Select `idStudent_WrkExperience` from `preinternship_wrkexperience` where `idStudent` = '$StuID';");
	 	 }

	 	 function updateStudent_PreIntern_Details_WrkExpInfo($StuID,$sqlcndtn)
	 	 {

	 		$Updated_rows = Execute_qry("Update `preinternship_wrkexperience` set  $sqlcndtn where `idStudent` = '$StuID';");

	 			if($Updated_rows >= 1)
	 				return Execute_qry("Select `idStudent_WrkExperience` from `preinternship_wrkexperience` where `idStudent` = '$StuID';");
	 	 }

		 //--------------------- For Skill Set  ---------------------------------//

			 function setStudent_PreIntern_Details_SkillSetInfo($StuID,$sqlcndtn)
			 {
				$Updated_rows = Execute_qry("INSERT INTO `student_skillset` (`idStudent`) VALUES ('$StuID');");

				$Updated_rows = Execute_qry("Update `student_skillset` set  $sqlcndtn where `idStudent` = '$StuID';");

					if($Updated_rows >= 1)
						return Execute_qry("Select `idStudent_Skillset` from `student_skillset` where `idStudent` = '$StuID';");
			 }

			 function updateStudent_PreIntern_Details_SkillSetInfo($StuID,$sqlcndtn)
			 {
				$Updated_rows = Execute_qry("Update `student_skillset` set  $sqlcndtn where `idStudent` = '$StuID';");

					if($Updated_rows >= 1)
						return Execute_qry("Select `idStudent_Skillset` from `student_skillset` where `idStudent` = '$StuID';");
			 }

			 function retrieve_SkillSetId($StuID)
			 {
					 $Retrieved_result = Retrieve_qry("Select `idStudent_Skillset` from `student_skillset` where `idStudent` = '$StuID';");

					foreach ($Retrieved_result as $Rowlist)
					{
						$id = $Rowlist['idStudent_Skillset'];
					}

					return $id;

			 }

			 function retrieve_CertId($StuID)
			 {

				 $Retrieved_result = Retrieve_qry("Select `idStudent_CertificationEntry` from `student_certdetails` where `idStudent` = '$StuID';");

				 foreach ($Retrieved_result as $Rowlist)
				 {
					 $id = $Rowlist['idStudent_CertificationEntry'];
				 }

				 return $id;

 		   }

			 function retrieve_WrkExpId($StuID)
			 {
				 $Retrieved_result = Retrieve_qry("Select `idStudent_WrkExperience` from `preinternship_wrkexperience` where `idStudent` = '$StuID';");

				foreach ($Retrieved_result as $Rowlist)
				{
					$id = $Rowlist['idStudent_WrkExperience'];
				}

				return $id;

			 }

			 function retrieve_EduId($StuID)
			 {
				 $Retrieved_result = Retrieve_qry("Select `idStudent_EducationEntry` from `student_edudetails` where `idStudent` = '$StuID';");

				foreach ($Retrieved_result as $Rowlist)
				{
					$id = $Rowlist['idStudent_EducationEntry'];
				}

				return $id;

			 }

}

Class Available_Intern_Position_details
{

	 var $intern_type = null;
	 var $company_addr_doorno = null;
	 var $company_addr_city = null;
	 var $company_addr_postalcode = null;
	 var $org_phonenum = null;
	 var $org_website = null;
	 var $poc_fname = null;
	 var $poc_lname = null;
	 var $poc_email = null;
	 var $poc_position = null;
	 var $intern_position = null;
	 var $intern_jobgroup = null;
	 var $job_desc = null;
	 var $job_responsibility = null;
	 var $intern_reqmnts = null;
	 var $intern_notes = null;
	 var $intern_updated_date = null;

	 function setAvailable_intern_Details($sql_qry)
	 {
		  $Updated_rows = Execute_qry("INSERT INTO `available_interndetails`(`company_name`, `company_addr_doorno`,
																	`company_addr_city`, `company_addr_postalcode`, `org_phonenum`,
																	`org_website`, `poc_fname`, `poc_lname`, `poc_email`,
																	`poc_position`, `intern_position`,
																	`job_desc`,
																	`job_responsibility`,
																	`intern_reqmnts`, `intern_notes`, `intern_type`, `intern_jobgroup`,
																	`intern_updated_date`,`intern_payment`)
																	  VALUES ($sql_qry);");

			if($Updated_rows >= 1)
					return Execute_qry("Select `id_availableinterndetails` from `available_interndetails`; ");

	 }

	 function deleteAvailable_intern_Details($sql_qry)
	 {

			$Updated_rows = Execute_qry("Delete from `available_interndetails` where $sql_qry;");

			if($Updated_rows >= 1)
					return 1;
		  else {
			  	# code...
					return 0;
		  }

	 }

	 function insertInterested_Positions($sql_qry)
	 {
		 		//echo "Insert into `intern_interested_students`  Values($sql_qry)";
			 $Updated_rows = Execute_qry("Insert into `intern_interested_students` (`student_id`, `id_available_interndetails`, `availability_tag`)  Values($sql_qry);");

			 if($Updated_rows >= 1)
					 return 1;
			 else {
					 # code...
					 return 0;
			 }


	 }

	 function deleteInterested_Positions($sql_qry)
	 {

			$Updated_rows = Execute_qry("Delete from `intern_interested_students` where $sql_qry;");

			if($Updated_rows >= 1)
					return 1;
			else {
					# code...
					return 0;
			}

	 }

	 function Retrieve_available_students($Available_intern_position_id)
	 {
		 $Available_Students_arr = array();

		 $Available_students_result = retrieve_qry("select `id_intern_interested_students` from `intern_interested_students` where `id_available_interndetails` = $Available_intern_position_id and availability_tag = 'available';");
		 $i = 0;

		 foreach ($Available_students_result as $Available_students)
		 {
			 	 $Available_Students_arr[$i]=$Available_students['id_intern_interested_students'];
				 $i++;

		 }

			return $Available_Students_arr;
	 }

	 function updateAvailable_student_Details($sql_qry)
	 {
			 $Updated_rows = Execute_qry("Update `intern_interested_students`  set 	`availability_tag`='hired' where $sql_qry;");

			 if($Updated_rows >= 1)
					 return 1;
			 else {
					 # code...
					 return 0;
			 }


	 }


	 function Interested_Student_count($Available_intern_position_id)
	 {
		 $Available_position_interested_result = retrieve_qry("select count(*) as interested_count from intern_interested_students where id_available_interndetails = $Available_intern_position_id and availability_tag = 'available';");

		 foreach ($Available_position_interested_result as $Interested_rowlist)
		 {
				 return $Interested_rowlist[0];
		 }

	 }

	 function Interested_Students_val($Available_intern_position_id)
	 {
		 $Interested_Students_arr = array();

		 $Interested_Students_result = retrieve_qry("select  interested_detail.id_intern_interested_students,interested_detail.student_id,
																																	 Concat(stu_details.Student_FName,\" \",stu_details.Student_LName) as student_name

																																from intern_interested_students interested_detail Left Join student_details stu_details
																																on   stu_details.idStudent = interested_detail.student_id

																																where interested_detail.id_available_interndetails = $Available_intern_position_id and interested_detail.availability_tag = 'available'
																																order by interested_detail.student_id;");

		 foreach ($Interested_Students_result as $Interested_rowlist)
		 {
			 		$Interested_id = $Interested_rowlist['id_intern_interested_students'];
			 		$Interested_Students_arr[$Interested_id]['Interested_id'] = $Interested_rowlist['id_intern_interested_students'];
				  $Interested_Students_arr[$Interested_id]['student_id']=$Interested_rowlist['student_id'];
					$Interested_Students_arr[$Interested_id]['student_name']=$Interested_rowlist['student_name'];
		 }

		 return $Interested_Students_arr;

	 }


	 function Hired_Student_count($Available_intern_position_id)
	 {
		 $Hired_position_interested_result = retrieve_qry("select count(*) as hired_count from intern_interested_students where id_available_interndetails = $Available_intern_position_id and availability_tag = 'hired';");

		 foreach ($Hired_position_interested_result as $Hired_rowlist)
		 {
				 return $Hired_rowlist[0];
		 }

	 }

	 function Hired_Students_val($Available_intern_position_id)
	 {
		 $Hired_Students_arr = array();

		 $Hired_Students_result = retrieve_qry("select  interested_detail.id_intern_interested_students,interested_detail.student_id,
																																	 Concat(stu_details.Student_FName,\" \",stu_details.Student_LName) as student_name

																																from intern_interested_students interested_detail Left Join student_details stu_details
																																on   stu_details.idStudent = interested_detail.student_id

																																where interested_detail.id_available_interndetails = $Available_intern_position_id and interested_detail.availability_tag = 'hired'
																																order by interested_detail.student_id;");

		 foreach ($Hired_Students_result as $hired_rowlist)
		 {
			 		$Hired_id = $hired_rowlist['id_intern_interested_students'];
			 		$Hired_Students_arr[$Hired_id]['Hired_id'] = $hired_rowlist['id_intern_interested_students'];
				  $Hired_Students_arr[$Hired_id]['student_id']=$hired_rowlist['student_id'];
					$Hired_Students_arr[$Hired_id]['student_name']=$hired_rowlist['student_name'];
		 }

		 return $Hired_Students_arr;

	 }


	 function retrieveAvailable_intern_Details()
	 {
		 $Available_Intern_details = array();

		 $retrieved_result = retrieve_qry("select * from available_interndetails");

		 foreach ($retrieved_result as $rowlist)
		 {
			 $Available_intern_detail_id = $rowlist['id_availableinterndetails'];
			 $Available_Intern_details[ $Available_intern_detail_id]['interested_count'] = 0;
			 $Available_Intern_details[ $Available_intern_detail_id]['hired_count'] = 0;

			 $Available_Intern_details[ $Available_intern_detail_id]['interested_count'] = $this->Interested_Student_count($Available_intern_detail_id);
			 $Available_Intern_details[ $Available_intern_detail_id]['hired_count'] = $this->Hired_Student_count($Available_intern_detail_id);



			 $Available_Intern_details[ $Available_intern_detail_id]['id_availableinterndetails'] = $rowlist['id_availableinterndetails'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_type_id'] = $rowlist['intern_type'];
			 $Available_Intern_details[ $Available_intern_detail_id]['company_name'] = $rowlist['company_name'];
			 $Available_Intern_details[ $Available_intern_detail_id]['company_addr_doorno'] = $rowlist['company_addr_doorno'];
			 $Available_Intern_details[ $Available_intern_detail_id]['company_addr_city'] = $rowlist['company_addr_city'];
			 $Available_Intern_details[ $Available_intern_detail_id]['company_addr_postalcode'] = $rowlist['company_addr_postalcode'];
			 $Available_Intern_details[ $Available_intern_detail_id]['org_phonenum'] = $rowlist['org_phonenum'];
			 $Available_Intern_details[ $Available_intern_detail_id]['org_website'] = $rowlist['org_website'];
			 $Available_Intern_details[ $Available_intern_detail_id]['poc_fname'] = $rowlist['poc_fname'];
			 $Available_Intern_details[ $Available_intern_detail_id]['poc_lname'] = $rowlist['poc_lname'];
			 $Available_Intern_details[ $Available_intern_detail_id]['poc_email'] = $rowlist['poc_email'];
			 $Available_Intern_details[ $Available_intern_detail_id]['poc_position'] = $rowlist['poc_position'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_position'] = $rowlist['intern_position'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_jobgroup_id'] = $rowlist['intern_jobgroup'];
			 $Available_Intern_details[ $Available_intern_detail_id]['job_desc'] = $rowlist['job_desc'];
			 $Available_Intern_details[ $Available_intern_detail_id]['job_responsibility'] = $rowlist['job_responsibility'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_reqmnts'] = $rowlist['intern_reqmnts'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_notes'] = $rowlist['intern_notes'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_updated_date'] = $rowlist['intern_updated_date'];
			 $Available_Intern_details[ $Available_intern_detail_id]['intern_payment'] = $rowlist['intern_payment'];

		 }

		 return $Available_Intern_details;

	 }


	 function retrieveAvailable_Position_Details($Postion_id)
	 {
	 	$Available_Position_Details = array();

	 	$retrieved_result = retrieve_qry("select * from available_interndetails where id_availableinterndetails=$Postion_id");

	 	foreach ($retrieved_result as $rowlist)
	 	{
	 		$Available_Position_Details['id_availableinterndetails'] = $rowlist['id_availableinterndetails'];
			$Available_Position_Details['intern_type'] = $rowlist['intern_type'];
			$Available_Position_Details['intern_payment'] = $rowlist['intern_payment'];
			$Available_Position_Details['company_name'] = $rowlist['company_name'];
			$Available_Position_Details['company_addr_doorno'] = $rowlist['company_addr_doorno'];
			$Available_Position_Details['company_addr_city'] = $rowlist['company_addr_city'];
			$Available_Position_Details['company_addr_postalcode'] = $rowlist['company_addr_postalcode'];
			$Available_Position_Details['org_phonenum'] = $rowlist['org_phonenum'];
			$Available_Position_Details['org_website'] = $rowlist['org_website'];
			$Available_Position_Details['poc_fname'] = $rowlist['poc_fname'];
			$Available_Position_Details['poc_lname'] = $rowlist['poc_lname'];
			$Available_Position_Details['poc_email'] = $rowlist['poc_email'];
			$Available_Position_Details['poc_position'] = $rowlist['poc_position'];
			$Available_Position_Details['intern_position'] = $rowlist['intern_position'];
			$Available_Position_Details['intern_jobgroup'] = $rowlist['intern_jobgroup'];
			$Available_Position_Details['job_desc'] = $rowlist['job_desc'];
			$Available_Position_Details['job_responsibility'] = $rowlist['job_responsibility'];
			$Available_Position_Details['intern_reqmnts'] = $rowlist['intern_reqmnts'];
			$Available_Position_Details['intern_notes'] = $rowlist['intern_notes'];

	 	}

	 	return $Available_Position_Details;

	 }

}

?>
