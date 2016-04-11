<?
include_once("db_connection.php");

class View_Details
{
	function Retrieve_Joblocation()
	{
		$job_location = array();

		$Retrieved_result = Retrieve_qry("Select distinct `company_addr_city` from available_interndetails order by `company_addr_city` asc ");

		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$job_location[$i] = $Rowlist['company_addr_city'];
			$i++;
		}
		return $job_location;

	}

	function Retrieve_StudentIDs()
	{
		$Student_IDs = array();

		$Retrieved_result = Retrieve_qry("Select `idStudent` from student_details order by `idStudent` asc ");

		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$Student_IDs[$i] = $Rowlist['idStudent'];
			$i++;
		}
		return $Student_IDs;

	}

	function Retrieve_HiredCompany($Student_id)
	{
		$Hired_company_details = array();

		$Retrieved_result = Retrieve_qry("select available_intern_details.company_name,interested_stu.id_available_interndetails

													from  available_interndetails available_intern_details LEFT JOIN intern_interested_students interested_stu

													on interested_stu.id_available_interndetails = available_intern_details.id_availableinterndetails

													where interested_stu.student_id='$Student_id' and interested_stu.availability_tag='hired' ");

		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$Position_id = $Rowlist['id_available_interndetails'];

			$Hired_company_details[$Position_id]['position_id'] = $Rowlist['id_available_interndetails'];
			$Hired_company_details[$Position_id]['company_name'] = $Rowlist['company_name'];
			$i++;
		}

		return $Hired_company_details;

	}

	function Retrieve_Country()
	{
		$country = array();

		$Retrieved_result = Retrieve_qry("Select distinct(`Student_Country`) from student_details order by `Student_Country` asc ");

		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$country[$i] = $Rowlist['Student_Country'];
			$i++;
		}
		return $country;

	}

	function Retrieve_Batch()
	{
		$batch = array();

		$Retrieved_result = Retrieve_qry("select distinct `Student_RegisteredSemester`, `Student_RegisteredYear` from student_details order by `Student_RegisteredYear` asc");

		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$batch[$i] = $Rowlist['Student_RegisteredSemester']." ".$Rowlist['Student_RegisteredYear'];
			$i++;
		}
		return $batch;

	}

	function Retrieve_Skills()
	{
		$skill = array();
		$Retrieved_result = Retrieve_qry("select `skill_name` from skillset_lookup order by `skill_name` asc;");
		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$skill[$i] = $Rowlist['skill_name'];
			$i++;
		}
		return $skill;



	}


	function Retrieve_Certification()
	{
		$certification = array();
		$Retrieved_result = Retrieve_qry("select `EduDetails_Cert1Title`, `EduDetails_Cert2Title`, `EduDetails_Cert3Title` from student_certdetails");
		$i=0;

		foreach($Retrieved_result as $Rowlist)
		{
			$certification[$i] = $Rowlist['EduDetails_Cert1Title'];
			$i++;
			$certification[$i] = $Rowlist['EduDetails_Cert2Title'];
			$i++;
			$certification[$i] = $Rowlist['EduDetails_Cert3Title'];
			$i++;
		}
		return $certification;



	}



	function Map_Skill_list($skill_arr)
	{

	 $skill_list_arr = array();

	 foreach($skill_arr as $skill){

		 $Retrieved_result = Retrieve_qry("select `id_skill` from skillset_lookup where skill_name like '$skill';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$skill_list_arr[$skill] = $Rowlist['id_skill'];
				$i++;
			}
		}
				return $skill_list_arr;
	}



  function retrieveStudent_details($Sql_qry_cndtn,$Internship_condition)
{
     $Student_details = array();
     $Retrieval_qry = "";

     $Retrieval_qry= $Retrieval_qry."select

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

           stu_skill.`skillset_linked`";


     if($Internship_condition)
     {
        $Retrieval_qry= $Retrieval_qry.",available_intern_details.`id_availableinterndetails`,
                     available_intern_details.`intern_type`,available_intern_details.`intern_payment`,available_intern_details.`company_name`,
                     available_intern_details.`company_addr_doorno`,available_intern_details.`company_addr_city`,
                     available_intern_details.`company_addr_postalcode`,available_intern_details.`org_phonenum`,available_intern_details.`org_website`,
                     available_intern_details.`poc_fname`,available_intern_details.`poc_lname`,available_intern_details.`poc_email`,
                     available_intern_details.`poc_position`,available_intern_details.`intern_position`,available_intern_details.`intern_jobgroup`,
                     available_intern_details.`job_desc`,available_intern_details.`job_responsibility`,available_intern_details.`intern_reqmnts`,
                     available_intern_details.`intern_notes`,available_intern_details.`intern_updated_date`,

                     intern_interested_stu.`id_intern_interested_students`,intern_interested_stu.`student_id`,
                     intern_interested_stu.`id_available_interndetails`,intern_interested_stu.`availability_tag`";
     }

     $Retrieval_qry= $Retrieval_qry." from

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
                                     stu_details.idStudent_Skillset = stu_skill.idStudent_Skillset";

     if($Internship_condition)
     {
       $Retrieval_qry= $Retrieval_qry." LEFT JOIN intern_interested_students intern_interested_stu

                                           on
                                             stu_details.idStudent = intern_interested_stu.student_id

                                           LEFT JOIN available_interndetails available_intern_details

                                           on
                                             intern_interested_stu.id_available_interndetails = available_intern_details.id_availableinterndetails";
     }

     $Retrieval_qry= $Retrieval_qry." ".$Sql_qry_cndtn." ;";

     $retrieved_result = retrieve_qry($Retrieval_qry);

   foreach ($retrieved_result as $rowlist)
   {
     $Student_id = $rowlist['idStudent'];

     $Student_details[$Student_id]['idStudent'] = $rowlist['idStudent'];
     $Student_details[$Student_id]['Student_FName'] = $rowlist['Student_FName'];
     $Student_details[$Student_id]['Student_MName'] = $rowlist['Student_MName'];
     $Student_details[$Student_id]['Student_LName'] = $rowlist['Student_LName'];
     $Student_details[$Student_id]['Student_Email'] = $rowlist['Student_Email'];
     $Student_details[$Student_id]['Student_RegisteredSemester'] = $rowlist['Student_RegisteredSemester'];
     $Student_details[$Student_id]['Student_RegisteredYear'] = $rowlist['Student_RegisteredYear'];
     $Student_details[$Student_id]['Student_Degree'] = $rowlist['Student_Degree'];
     $Student_details[$Student_id]['Student_Phonenum'] = $rowlist['Student_Phonenum'];
     $Student_details[$Student_id]['Student_Gender'] = $rowlist['Student_Gender'];
     $Student_details[$Student_id]['Student_Status'] = $rowlist['Student_Status'];
     $Student_details[$Student_id]['Student_Country'] = $rowlist['Student_Country'];

     $Student_details[$Student_id]['EduDetails_Cert1Title'] = $rowlist['EduDetails_Cert1Title'];
     $Student_details[$Student_id]['EduDetails_Cert1Body'] = $rowlist['EduDetails_Cert1Body'];
     $Student_details[$Student_id]['EduDetails_Cert1IssuedDate'] = $rowlist['EduDetails_Cert1IssuedDate'];
     $Student_details[$Student_id]['EduDetails_Cert1ValidityDate'] = $rowlist['EduDetails_Cert1ValidityDate'];
     $Student_details[$Student_id]['EduDetails_Cert2Title'] = $rowlist['EduDetails_Cert2Title'];
     $Student_details[$Student_id]['EduDetails_Cert2Body'] = $rowlist['EduDetails_Cert2Body'];
     $Student_details[$Student_id]['EduDetails_Cert2IssuedDate'] = $rowlist['EduDetails_Cert2IssuedDate'];
     $Student_details[$Student_id]['EduDetails_Cert2ValidityDate'] = $rowlist['EduDetails_Cert2ValidityDate'];
     $Student_details[$Student_id]['EduDetails_Cert3Title'] = $rowlist['EduDetails_Cert3Title'];
     $Student_details[$Student_id]['EduDetails_Cert3Body'] = $rowlist['EduDetails_Cert3Body'];
     $Student_details[$Student_id]['EduDetails_Cert3IssuedDate'] = $rowlist['EduDetails_Cert3IssuedDate'];
     $Student_details[$Student_id]['EduDetails_Cert3ValidityDate'] = $rowlist['EduDetails_Cert3ValidityDate'];

     $Student_details[$Student_id]['WrkExp1_Company'] = $rowlist['WrkExp1_Company'];
     $Student_details[$Student_id]['WrkExp1_FromDate'] = $rowlist['WrkExp1_FromDate'];
     $Student_details[$Student_id]['WrkExp1_TillDate'] = $rowlist['WrkExp1_TillDate'];
     $Student_details[$Student_id]['WrkExp1_Title'] = $rowlist['WrkExp1_Title'];
     $Student_details[$Student_id]['WrkExp1_Duties'] = $rowlist['WrkExp1_Duties'];
     $Student_details[$Student_id]['WrkExp1_Duration'] = $rowlist['WrkExp1_Duration'];
     $Student_details[$Student_id]['WrkExp2_Company'] = $rowlist['WrkExp2_Company'];
     $Student_details[$Student_id]['WrkExp2_FromDate'] = $rowlist['WrkExp2_FromDate'];
     $Student_details[$Student_id]['WrkExp2_TillDate'] = $rowlist['WrkExp2_TillDate'];
     $Student_details[$Student_id]['WrkExp2_Title'] = $rowlist['WrkExp2_Title'];
     $Student_details[$Student_id]['WrkExp2_Duties'] = $rowlist['WrkExp2_Duties'];
     $Student_details[$Student_id]['WrkExp2_Duration'] = $rowlist['WrkExp2_Duration'];
     $Student_details[$Student_id]['WrkExp3_Company'] = $rowlist['WrkExp3_Company'];
     $Student_details[$Student_id]['WrkExp3_FromDate'] = $rowlist['WrkExp3_FromDate'];
     $Student_details[$Student_id]['WrkExp3_TillDate'] = $rowlist['WrkExp3_TillDate'];
     $Student_details[$Student_id]['WrkExp3_Title'] = $rowlist['WrkExp3_Title'];
     $Student_details[$Student_id]['WrkExp3_Duties'] = $rowlist['WrkExp3_Duties'];
     $Student_details[$Student_id]['WrkExp3_Duration'] = $rowlist['WrkExp3_Duration'];
     $Student_details[$Student_id]['WrkExp4_Company'] = $rowlist['WrkExp4_Company'];
     $Student_details[$Student_id]['WrkExp4_FromDate'] = $rowlist['WrkExp4_FromDate'];
     $Student_details[$Student_id]['WrkExp4_TillDate'] = $rowlist['WrkExp4_TillDate'];
     $Student_details[$Student_id]['WrkExp4_Title'] = $rowlist['WrkExp4_Title'];
     $Student_details[$Student_id]['WrkExp4_Duties'] = $rowlist['WrkExp4_Duties'];
     $Student_details[$Student_id]['WrkExp4_Duration'] = $rowlist['WrkExp4_Duration'];

     $Student_details[$Student_id]['EduDetails_UnderGradMajor'] = $rowlist['EduDetails_UnderGradMajor'];
     $Student_details[$Student_id]['EduDetails_UnderGradDegree'] = $rowlist['EduDetails_UnderGradDegree'];
     $Student_details[$Student_id]['EduDetails_UnderGradGPA'] = $rowlist['EduDetails_UnderGradGPA'];
     $Student_details[$Student_id]['EduDetails_UnderGradUniversity'] = $rowlist['EduDetails_UnderGradUniversity'];
     $Student_details[$Student_id]['EduDetails_UnderGradCountry'] = $rowlist['EduDetails_UnderGradCountry'];
     $Student_details[$Student_id]['EduDetails_UnderGradDate'] = $rowlist['EduDetails_UnderGradDate'];
     $Student_details[$Student_id]['EduDetails_GradMajor'] = $rowlist['EduDetails_GradMajor'];
     $Student_details[$Student_id]['EduDetails_GradDegree'] = $rowlist['EduDetails_GradDegree'];
     $Student_details[$Student_id]['EduDetails_GradGPA'] = $rowlist['EduDetails_GradGPA'];
     $Student_details[$Student_id]['EduDetails_GradUniversity'] = $rowlist['EduDetails_GradUniversity'];
     $Student_details[$Student_id]['EduDetails_GradCountry'] = $rowlist['EduDetails_GradCountry'];
     $Student_details[$Student_id]['EduDetails_GradDate'] = $rowlist['EduDetails_GradDate'];
     $Student_details[$Student_id]['EduDetails_Other1Name'] = $rowlist['EduDetails_Other1Name'];
     $Student_details[$Student_id]['EduDetails_Other1Major'] = $rowlist['EduDetails_Other1Major'];
     $Student_details[$Student_id]['EduDetails_Other1Degree'] = $rowlist['EduDetails_Other1Degree'];
     $Student_details[$Student_id]['EduDetails_Other1GPA'] = $rowlist['EduDetails_Other1GPA'];
     $Student_details[$Student_id]['EduDetails_Other1University'] = $rowlist['EduDetails_Other1University'];
     $Student_details[$Student_id]['EduDetails_Other1Country'] = $rowlist['EduDetails_Other1Country'];
     $Student_details[$Student_id]['EduDetails_Other1Date'] = $rowlist['EduDetails_Other1Date'];
     $Student_details[$Student_id]['EduDetails_Other2Name'] = $rowlist['EduDetails_Other2Name'];
     $Student_details[$Student_id]['EduDetails_Other2Major'] = $rowlist['EduDetails_Other2Major'];
     $Student_details[$Student_id]['EduDetails_Other2Degree'] = $rowlist['EduDetails_Other2Degree'];
     $Student_details[$Student_id]['EduDetails_Other2GPA'] = $rowlist['EduDetails_Other2GPA'];
     $Student_details[$Student_id]['EduDetails_Other2University'] = $rowlist['EduDetails_Other2University'];
     $Student_details[$Student_id]['EduDetails_Other2Country'] = $rowlist['EduDetails_Other2Country'];
     $Student_details[$Student_id]['EduDetails_Other2Date'] = $rowlist['EduDetails_Other2Date'];


     if($Internship_condition)
     {
        $Student_details[$Student_id]['id_availableinterndetails'] =$rowlist['id_availableinterndetails'];
        $Student_details[$Student_id]['intern_type'] =$rowlist['intern_type'];
        $Student_details[$Student_id]['intern_payment'] =$rowlist['intern_payment'];
        $Student_details[$Student_id]['company_name'] =$rowlist['company_name'];
        $Student_details[$Student_id]['company_addr_doorno'] =$rowlist['company_addr_doorno'];
        $Student_details[$Student_id]['company_addr_city'] =$rowlist['company_addr_city'];
        $Student_details[$Student_id]['company_addr_postalcode'] =$rowlist['company_addr_postalcode'];
        $Student_details[$Student_id]['org_phonenum'] =$rowlist['org_phonenum'];
        $Student_details[$Student_id]['org_website'] =$rowlist['org_website'];
        $Student_details[$Student_id]['poc_fname'] =$rowlist['poc_fname'];
        $Student_details[$Student_id]['poc_lname'] =$rowlist['poc_lname'];
        $Student_details[$Student_id]['poc_email'] =$rowlist['poc_email'];
        $Student_details[$Student_id]['poc_position'] =$rowlist['poc_position'];
        $Student_details[$Student_id]['intern_position'] =$rowlist['intern_position'];
        $Student_details[$Student_id]['intern_jobgroup'] =$rowlist['intern_jobgroup'];
        $Student_details[$Student_id]['job_desc'] =$rowlist['job_desc'];
        $Student_details[$Student_id]['job_responsibility'] =$rowlist['job_responsibility'];
        $Student_details[$Student_id]['intern_reqmnts'] =$rowlist['intern_reqmnts'];
        $Student_details[$Student_id]['intern_notes'] =$rowlist['intern_notes'];
        $Student_details[$Student_id]['intern_updated_date'] =$rowlist['intern_updated_date'];
        $Student_details[$Student_id]['id_intern_interested_students'] =$rowlist['id_intern_interested_students'];
        $Student_details[$Student_id]['id_available_interndetails'] =$rowlist['id_available_interndetails'];
        $Student_details[$Student_id]['availability_tag'] =$rowlist['availability_tag'];

     }

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

       $Student_details[$Student_id]['Skillset_name'][$i] = $Skill_name[0];
       $i++;

      }
   }

     return 	$Student_details;

 // 	// echo $GHC_Privacy_val;
 // 	// exit();

 }







}


?>
