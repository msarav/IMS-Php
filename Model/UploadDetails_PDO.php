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

	function MedicalCondition_Details()
	{
		$GHC_Privacy_val = null;
		$EyeCndtnPrivacy_val = null;
		$SkinCndtnPrivacy_val  = null;
		$DentalCndtnPrivacy_val  = null;
		$DigestiveCndtnPrivacy_val  = null;
		$DiabeticCndtn_val  = null;
		$DiabeticCndtnPrivacy_val  = null;
		$ObesityCndtn_val  = null;
		$BPCndtn_val  = null;
		$VisionType_val  = null;
		$Cataract_val  = null;
		$DryEye_val  = null;
		$SkinType_val  = null;
		$AcneProne_val  = null;
		$ColdSores_val  = null;
		$Cavities_val  = null;
		$SensitiveTeeth_val  = null;
		$TeethImplant_val  = null;
		$Ulcer_val  = null;
		$Gastritis_val  = null;
		$AcidReflux_val  = null;

	}

	 function retrieveMedicalCondition_Details($UserID)
	 {
		$MedicalCondition_details = array();

		$Retrieved_result = Retrieve_qry("Select  * from medical_details where `UserID` = $UserID;");

		$i =0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$GHC_Privacy_val = $Rowlist['GHC_Privacy'];
			$EyeCndtnPrivacy_val = $Rowlist['Eye_cndtn_Privacy'];
			$SkinCndtnPrivacy_val = $Rowlist['Skin_cndtn_Privacy'];
			$DentalCndtnPrivacy_val = $Rowlist['Dental_cndtn_Privacy'];
			$DigestiveCndtnPrivacy_val = $Rowlist['Digestive_cndtn_Privacy'];
			$DiabeticCndtn_val = $Rowlist['Diabetic_cndtn_val'];
			$DiabeticCndtnPrivacy_val = $Rowlist['Diabetic_cndtn_privacy'];
			$ObesityCndtn_val = $Rowlist['Obesity_cndtn_val'];
			$BPCndtn_val = $Rowlist['BP_cndtn_val'];
			$VisionType_val = $Rowlist['Vision_type_val'];
			$Cataract_val = $Rowlist['Cataract_val'];
			$DryEye_val = $Rowlist['DryEye_val'];
			$SkinType_val = $Rowlist['Skin_type_val'];
			$AcneProne_val = $Rowlist['Acne_prone_val'];
			$ColdSores_val = $Rowlist['Cold_sores_val'];
			$Cavities_val = $Rowlist['Cavities_val'];
			$SensitiveTeeth_val = $Rowlist['Sensitive_teeth_val'];
			$TeethImplant_val = $Rowlist['Teeth_implant_val'];
			$Ulcer_val = $Rowlist['Ulcer_val'];
			$Gastritis_val = $Rowlist['Gastritis_val'];
			$AcidReflux_val = $Rowlist['Acid_reflux_val'];

			$MedicalCondition_details['GHC_Privacy'] = $Rowlist['GHC_Privacy'];
			$MedicalCondition_details['Eye_cndtn_Privacy'] = $Rowlist['Eye_cndtn_Privacy'];
			$MedicalCondition_details['Skin_cndtn_Privacy'] = $Rowlist['Skin_cndtn_Privacy'];
			$MedicalCondition_details['Dental_cndtn_Privacy'] = $Rowlist['Dental_cndtn_Privacy'];
			$MedicalCondition_details['Digestive_cndtn_Privacy'] = $Rowlist['Digestive_cndtn_Privacy'];
			$MedicalCondition_details['Diabetic_cndtn_val'] = $Rowlist['Diabetic_cndtn_val'];
			$MedicalCondition_details['Diabetic_cndtn_privacy'] = $Rowlist['Diabetic_cndtn_privacy'];
			$MedicalCondition_details['Obesity_cndtn_val'] = $Rowlist['Obesity_cndtn_val'];
			$MedicalCondition_details['Obesity_cndtn_privacy'] = $Rowlist['Obesity_cndtn_privacy'];
			$MedicalCondition_details['BP_cndtn_val'] = $Rowlist['BP_cndtn_val'];
			$MedicalCondition_details['BP_cndtn_privacy'] = $Rowlist['BP_cndtn_privacy'];
			$MedicalCondition_details['Vision_type_val'] = $Rowlist['Vision_type_val'];
			$MedicalCondition_details['Cataract_val'] = $Rowlist['Cataract_val'];
			$MedicalCondition_details['DryEye_val'] = $Rowlist['DryEye_val'];
			$MedicalCondition_details['Skin_type_val'] = $Rowlist['Skin_type_val'];
			$MedicalCondition_details['Acne_prone_val'] = $Rowlist['Acne_prone_val'];
			$MedicalCondition_details['Cold_sores_val'] = $Rowlist['Cold_sores_val'];
			$MedicalCondition_details['Cavities_val'] = $Rowlist['Cavities_val'];
			$MedicalCondition_details['Sensitive_teeth_val'] = $Rowlist['Sensitive_teeth_val'];
			$MedicalCondition_details['Teeth_implant_val'] = $Rowlist['Teeth_implant_val'];
			$MedicalCondition_details['Ulcer_val'] = $Rowlist['Ulcer_val'];
			$MedicalCondition_details['Gastritis_val'] = $Rowlist['Gastritis_val'];
			$MedicalCondition_details['Acid_reflux_val'] = $Rowlist['Acid_reflux_val'];

			$i++;
		}

			return $MedicalCondition_details;

		// echo $GHC_Privacy_val;
		// exit();


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
?>
