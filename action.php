<?php

require_once "config.php";

if(isset($_POST["action"])){


////////Student  	

	if($_POST["action"] == "Save_Student"){$st_password = hash('gost', $_POST['st_password'],'TRUE');$st_username = hash('gost', $_POST['st_username'],'TRUE');

		$statement = $connection->prepare("INSERT INTO studentstbl VALUES (DEFAULT, :st_fullname, :st_username, :st_password, :st_age, :st_gender, :st_dob, :st_email, :st_mobile1, :st_mobile2, :st_address, :st_pincode, :st_course, :st_sem)");
		$result = $statement->execute(
			array(
				'st_fullname' => $_POST['st_fullname'],
				'st_username' =>$st_username,
				'st_password' =>$st_password,
				'st_age' =>$_POST['st_age'],
				'st_gender' =>$_POST['st_gender'],
				'st_dob' => $_POST['st_dob'],
				'st_email' => $_POST['st_email'],
				'st_mobile1' => $_POST['st_mobile1'],
				'st_mobile2' => $_POST['st_mobile2'],
				'st_address' => $_POST['st_address'],
				'st_pincode' => $_POST['st_pincode'],
				'st_course' => $_POST['st_course'],
				'st_sem' => $_POST['st_sem']
			)
		);
		// echo json_encode("ksdhfkjsdf");
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}


	if($_POST["action"] == "Load_Students"){

		$statement = $connection->prepare("SELECT * FROM studentstbl ORDER BY st_id asc");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th class="displaynone">Student ID</th>
		<th width="20%">Full Name</th>
		<th width="20%" class="displaynone">Username</th>
		<th width="20%" class="displaynone">Password</th>
		<th width="20%" class="displaynone">Age</th>
		<th width="20%">Gender</th>
		<th width="20%" class="displaynone">Date of Birth</th>
		<th width="20%">Email</th>
		<th width="20%">Contact Number 1</th>
		<th width="20%" class="displaynone">Contact Number 2</th>
		<th width="20%" class="displaynone">Address</th>
		<th width="20%" class="displaynone">Pincode</th>
		<th width="20%">Course</th>
		<th width="20%">Sem</th>
		<th width="40%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="st_id displaynone">'.$row["st_id"].'</td>
				<td class="st_fullname">'.$row["st_fullname"].'</td>
				<td class="st_username displaynone">'.$row["st_username"].'</td>
				<td class="st_password displaynone">'.$row["st_password"].'</td>
				<td class="st_age displaynone">'.$row["st_age"].'</td>
				<td class="st_gender">'.$row["st_gender"].'</td>
				<td class="st_dob displaynone">'.$row["st_dob"].'</td>
				<td class="st_email">'.$row["st_email"].'</td>
				<td class="st_mobile1">'.$row["st_mobile1"].'</td>
				<td class="st_mobile2 displaynone">'.$row["st_mobile2"].'</td>
				<td class="st_address displaynone">'.$row["st_address"].'</td>
				<td class="st_pincode displaynone">'.$row["st_pincode"].'</td>
				<td class="st_course">'.$row["st_course"].'</td>
				<td class="st_sem">'.$row["st_sem"].'</td>
				<td>
				<button type="button" id="'.$row["st_id"].'" class="btn btn-warning btn-xs update">Update</button>
				<button type="button" id="'.$row["st_id"].'" class="btn btn-danger btn-xs delete">Delete</button>
				</td>
				</tr>

				';
			}

		}else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}


	if($_POST["action"] == "Update_Student"){

		$statement = $connection->prepare(
			"UPDATE studentstbl 
			SET st_fullname = :st_fullname, 
			st_username = :st_username,
			st_password = :st_password,
			st_age = :st_age,
			st_gender = :st_gender,
			st_dob = :st_dob,
			st_email = :st_email,
			st_mobile1 = :st_mobile1,
			st_mobile2 = :st_mobile2,
			st_address = :st_address,
			st_pincode = :st_pincode,
			st_course = :st_course,
			st_sem = :st_sem

			WHERE st_id = :st_id"
		);
		$result = $statement->execute(
			array(
				':st_fullname' => $_POST['st_fullname'],
				':st_username' =>$_POST['st_username'],
				':st_password' =>$_POST['st_password'],
				':st_age' =>$_POST['st_age'],
				':st_gender' =>$_POST['st_gender'],
				':st_dob' =>$_POST['st_dob'],
				':st_email' =>$_POST['st_email'],
				':st_mobile1' =>$_POST['st_mobile1'],
				':st_mobile2' =>$_POST['st_mobile2'],
				':st_address' =>$_POST['st_address'],
				':st_pincode' =>$_POST['st_pincode'],
				':st_course' =>$_POST['st_course'],
				':st_sem' =>$_POST['st_sem'],
				':st_id' => $_POST["st_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated!';

		}



	}



	if($_POST["action"] == "delete_student"){
		$statement = $connection->prepare("DELETE FROM studentstbl WHERE st_id = :st_id");
		$result=$statement->execute(array(':st_id'=>$_POST["st_id"]));
		if(!empty($result)){
			echo "Data Deleted";
		}
		else{
			echo "Data not Deleted";
		}
	}


////////Teacher

	if($_POST["action"] == "Save_Teacher"){$pass = hash('gost', $_POST['te_password'],'TRUE');$te_username = hash('gost', $_POST['te_username'],'TRUE');

		$statement = $connection->prepare("INSERT INTO teacherstbl VALUES (DEFAULT, :te_fullname, :te_username, :te_password, :te_dob, :te_email, :te_mobile)");
		$result = $statement->execute(
			array(
				'te_fullname' => $_POST['te_fullname'],
				'te_username' =>$te_username,
				'te_password' =>$pass,
				'te_dob' => $_POST['te_dob'],
				'te_email' => $_POST['te_email'],
				'te_mobile' => $_POST['te_mobile']
				
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}



	if($_POST["action"] == "Load_Teacher"){

		$statement = $connection->prepare("SELECT * FROM teacherstbl ORDER BY te_id asc");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th class="displaynone">Teacher ID</th>
		<th width="20%">Full Name</th>
		<th width="20%">Username</th>
		<th width="20%" class="displaynone">Password</th>
		<th width="20%">Date of Birth</th>
		<th width="20%">Email</th>
		<th width="20%">Contact Number</th>
		<th width="40%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="te_id displaynone">'.$row["te_id"].'</td>
				<td class="te_fullname">'.$row["te_fullname"].'</td>
				<td class="te_username">'.$row["te_username"].'</td>
				<td class="te_password displaynone">'.$row["te_password"].'</td>
				<td class="te_dob">'.$row["te_dob"].'</td>
				<td class="te_email">'.$row["te_email"].'</td>
				<td class="te_mobile">'.$row["te_mobile"].'</td>
				
				<td>
				<button type="button" id="'.$row["te_id"].'" class="btn btn-warning btn-xs update_teacher">Update</button>
				<button type="button" id="'.$row["te_id"].'" class="btn btn-danger btn-xs delete_teacher">Delete</button>
				</td>
				</tr>

				';
			}

		}else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}


	if($_POST["action"] == "Update_Teacher"){

		$statement = $connection->prepare(
			"UPDATE teacherstbl 
			SET te_fullname = :te_fullname, 
			te_username = :te_username,
			te_password = :te_password,
			te_dob = :te_dob,
			te_email = :te_email,
			te_mobile = :te_mobile
			WHERE te_id = :te_id"
		);
		$result = $statement->execute(
			array(
				'te_fullname' => $_POST['te_fullname'],
				'te_username' =>$_POST['te_username'],
				'te_password' =>$_POST['te_password'],
				'te_dob' => $_POST['te_dob'],
				'te_email' => $_POST['te_email'],
				'te_mobile' => $_POST['te_mobile'],
				':te_id' => $_POST["te_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated!';

		}



	}



	if($_POST["action"] == "delete_teacher"){
		$statement = $connection->prepare("DELETE FROM teacherstbl WHERE te_id = :te_id");
		$result=$statement->execute(array(':te_id'=>$_POST["te_id"]));
		if(!empty($result)){
			echo "Data Deleted";
		}
		else{
			echo "Data not Deleted";
		}
	}



	if($_POST["action"] == "Save_Channel"){

		$statement = $connection->prepare("INSERT INTO channelstbl VALUES (DEFAULT, :ch_name)");
		$result = $statement->execute(
			array(
				'ch_name' => $_POST['ch_name']
				
				
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}



	if($_POST["action"] == "Load_Channel"){

		$statement = $connection->prepare("SELECT * FROM channelstbl ORDER BY ch_id asc");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%" class="displaynone">Channel ID</th>
		<th width="40%">Channel Name</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="ch_id displaynone">'.$row["ch_id"].'</td>
				<td class="ch_name">'.$row["ch_name"].'</td>
				
				<td>
				<button type="button" id="'.$row["ch_id"].'" class="btn btn-danger btn-xs delete_channel">Delete</button>
				</td>
				</tr>

				';
			}

		}else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}


	if($_POST["action"] == "delete_channel"){
		$statement = $connection->prepare("DELETE FROM channelstbl WHERE ch_id = :ch_id");
		$result=$statement->execute(array(':ch_id'=>$_POST["ch_id"]));
		if(!empty($result)){
			echo "Data Deleted";
		}
		else{
			echo "Data not Deleted";
		}
	}


	if($_POST["action"] == "Save_Data"){

		$file1 = $_FILES['co_url']['name'];
		$sourcePath_file = $_FILES['co_url']['tmp_name']; 
		$targetPath_file = "./uploads/".$_FILES['co_url']['name']; 
		$FileType_file = strtolower(pathinfo($targetPath_file,PATHINFO_EXTENSION));

		$extensions_arr = array("jpg","jpeg","png","gif","MP4");

		if($_POST['dd_type'] == '1' || $_POST['dd_type'] == '2'){

			$statement = $connection->prepare("INSERT INTO contentstbl VALUES (DEFAULT, :te_id, :ch_id, :co_description, :co_url, :co_sem)");
			$result = $statement->execute(
				array(
					'te_id' => $_POST['te_id'],
					'ch_id' =>$_POST['ch_id'],
					'co_description' =>$_POST['co_description'],
					'co_url' => $targetPath_file,
					'co_sem' => $_POST['co_sem']	
				)
			);
			move_uploaded_file($sourcePath_file,$targetPath_file) ;
			
			if(!empty($result))
			{
				echo 'Data Added';
			}

			else{
				echo htmlspecialchars($statement->error);
			}
		}

		else {
			$statement = $connection->prepare("INSERT INTO contentstbl VALUES (DEFAULT, :te_id, :ch_id, :co_description, :co_url, :co_sem)");
			$result = $statement->execute(
				array(
					'te_id' => $_POST['te_id'],
					'ch_id' =>$_POST['ch_id'],
					'co_description' =>$_POST['co_description'],
					'co_url' => "",
					'co_sem' => $_POST['co_sem']	
				)
			);

			
			
			if(!empty($result))
			{
				echo 'Data Added';
			}

			else{
				echo htmlspecialchars($statement->error);
			}
		}

	}



	if($_POST["action"] == "Load_Data"){

		$statement = $connection->prepare("SELECT * FROM contentstbl  join teacherstbl  on teacherstbl.te_id = contentstbl.te_id join channelstbl on channelstbl.ch_id = contentstbl.ch_id where contentstbl.te_id = ".$_POST['te_id']."");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%" class="displaynone">Content ID</th>
		<th width="20%">Teacher Name</th>
		<th width="20%">Channel Name</th>
		<th width="20%">Description</th>
		<th width="20%">URL</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="co_id displaynone">'.$row["co_id"].'</td>
				<td class="te_fullname">'.$row["te_fullname"].'</td>
				<td class="ch_name">'.$row["ch_name"].'</td>
				<td class="co_description">'.$row["co_description"].'</td>
				<td class="co_url">'.$row["co_url"].'</td>
				<td>
				<button type="button" id="'.$row["co_id"].'" class="btn btn-danger btn-xs delete_uploads">Delete</button>
				</td>
				</tr>

				';
			}

		}
		else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}



	if($_POST["action"] == "delete_uploads"){
		$statement = $connection->prepare("DELETE FROM contentstbl WHERE co_id = :co_id");
		$result=$statement->execute(array(':co_id'=>$_POST["co_id"]));
		if(!empty($result)){
			echo "Data Deleted";
		}
		else{
			echo "Data not Deleted";
		}
	}


	if($_POST["action"] == "Load_Student_Content") {
		$statement = $connection->prepare("SELECT * FROM contentstbl join channelstbl on channelstbl.ch_id = contentstbl.ch_id where contentstbl.co_sem = ".$_POST['co_sem']." and contentstbl.ch_id = ".$_POST['ch_id']."");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%" class="displaynone">Content ID</th>
		<th width="20%">Content</th>
		<th width"10%" class="displaynone">URL</th>
		<th width="20%">Description</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$path_parts = pathinfo($row['co_url']);
				@$fileExtension = $path_parts['extension'];



					if($fileExtension == "mp4" || $fileExtension == "3gp" || $fileExtension == "ogg" || $fileExtension == "wmv" || $fileExtension == "web" || $fileExtension == "flv" || $fileExtension == "avi" || $fileExtension == "mkv"){
					$output .='
					<tr>
					<td class="co_id displaynone">'.$row["co_id"].'</td>
					<td class="url displaynone">'.$row["co_url"].'</td>
					<td class="co_url"><video class="view_video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="240" height="80"><source src="'.$row["co_url"].'" type="video/mp4"></video></td>
					<td class="co_description">'.$row["co_description"].'</td>
					<td><a id="'.$row['co_id'].'" class="link btn btn-primary add_comment" >Watch & Comment</a></td>
					</tr>

					';
				}

				if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif" || $fileExtension == "jfif"){
					$output .='
					<tr>
					<td class="co_id displaynone">'.$row["co_id"].'</td>
					<td class="url displaynone">'.$row["co_url"].'</td>
					<td><img width="240" height="80" src="'.$row["co_url"].'" class="img-responsive"/></td>
					<td class="co_description">'.$row["co_description"].'</td>
					<td><a class="link add_comment btn btn-primary" id="'.$row['co_id'].'">Watch & Comment</a></td>
					</tr>

					';

				}

				if($fileExtension == ""){
					$output .='
					<tr>
					<td class="co_id displaynone">'.$row["co_id"].'</td>
					<td class="url displaynone">'.$row["co_url"].'</td>
					<td class="co_url">No Video or Image uploaded</td>
					<td class="co_description">'.$row["co_description"].'</td>
					<td><a class="link add_comment" id="'.$row['co_id'].'" >Comments</a></td>
					</tr>

					';
				}
				
			}

		}
		else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;

	}




	if($_POST["action"] == "Add_Comment"){

		$statement = $connection->prepare("INSERT INTO commentstbl VALUES (DEFAULT, :co_id, :st_id, :cm_desc, :cm_date)");
		$result = $statement->execute(
			array(
				'co_id' => $_POST['co_id'],
				'st_id' => $_POST['st_id'],
				'cm_desc' => $_POST['cm_desc'],
				'cm_date' => date('Y-m-d')
				
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}


	if($_POST["action"] == "Save_Marks"){

		$statement = $connection->prepare("INSERT INTO markstbl VALUES (DEFAULT, :st_id, :m_sem, :m_sub1, :m_sub2, :m_sub3, :m_sub4, :m_sub5, :m_sub6)");
		$result = $statement->execute(
			array(
				'st_id' => $_POST['st_id'],
				'm_sem' => $_POST['m_sem'],
				'm_sub1' => $_POST['m_sub1'],
				'm_sub2' => $_POST['m_sub2'],
				'm_sub3' => $_POST['m_sub3'],
				'm_sub4' => $_POST['m_sub4'],
				'm_sub5' => $_POST['m_sub5'],
				'm_sub6' => $_POST['m_sub6']
				
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}



	if($_POST["action"] == "Load_Marks"){

		$statement = $connection->prepare("SELECT * FROM markstbl where st_id = ".$_POST['st_id']."");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%" class="displaynone">Marks ID</th>
		<th width="20%">Semester</th>
		<th width="10%">Subject 1</th>
		<th width="10%">Subject 2</th>
		<th width="10%">Subject 3</th>
		<th width="10%">Subject 4</th>
		<th width="10%">Subject 5</th>
		<th width="10%">Subject 6</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="m_id displaynone">'.$row["m_id"].'</td>
				<td class="m_sem">'.$row["m_sem"].'</td>
				<td class="m_sub1">'.$row["m_sub1"].'</td>
				<td class="m_sub2">'.$row["m_sub2"].'</td>
				<td class="m_sub3">'.$row["m_sub3"].'</td>
				<td class="m_sub4">'.$row["m_sub4"].'</td>
				<td class="m_sub5">'.$row["m_sub5"].'</td>
				<td class="m_sub6">'.$row["m_sub6"].'</td>
				<td>
				<button type="button" id="'.$row["m_id"].'" class="btn btn-danger btn-xs update">Update</button>
				</td>
				</tr>

				';
			}

		}
		else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}


	if($_POST["action"] == "Update_Marks"){

		$statement = $connection->prepare(
			"UPDATE markstbl 
			SET m_sem = :m_sem, 
			m_sub1 = :m_sub1,
			m_sub2 = :m_sub2,
			m_sub3 = :m_sub3,
			m_sub4 = :m_sub4,
			m_sub5 = :m_sub5,
			m_sub6 = :m_sub6
			WHERE m_id = :m_id"
		);
		$result = $statement->execute(
			array(
				
				'm_sem' => $_POST['m_sem'],
				'm_sub1' => $_POST['m_sub1'],
				'm_sub2' => $_POST['m_sub2'],
				'm_sub3' => $_POST['m_sub3'],
				'm_sub4' => $_POST['m_sub4'],
				'm_sub5' => $_POST['m_sub5'],
				'm_sub6' => $_POST['m_sub6'],
				':m_id' => $_POST["m_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated!';

		}
	}



	if($_POST["action"] == "Save_Questions"){

		$statement = $connection->prepare("INSERT INTO quesanstbl VALUES (DEFAULT, :st_id, :te_id, :q_question, :q_answer)");
		$result = $statement->execute(
			array(
				'st_id' => $_POST['st_id'],
				'te_id' => "",
				'q_question' => $_POST['q_question'],
				'q_answer' => ""
				
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Added';
		}
		else{
			echo htmlspecialchars($statement->error);
		}
	}


	if($_POST["action"] == "Load_Questions"){

		$statement = $connection->prepare("SELECT * FROM quesanstbl where st_id = ".$_POST['st_id']."");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%">Questions No</th>
		<th width="20%">Questions</th>
		<th width="10%">Answer</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="q_id">'.$row["q_id"].'</td>
				<td class="q_question">'.$row["q_question"].'</td>
				<td class="q_answer">'.$row["q_answer"].'</td>
				
				<td>
				<button type="button" id="'.$row["q_id"].'" class="btn btn-danger btn-xs update_question">Update</button>
				</td>
				</tr>

				';
			}

		}
		else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}



	if($_POST["action"] == "Update_Question"){

		$statement = $connection->prepare(
			"UPDATE quesanstbl 
			SET q_question = :q_question
			WHERE q_id = :q_id"
		);
		$result = $statement->execute(
			array(
				
				'q_question' => $_POST['q_question'],
				':q_id' => $_POST["q_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated!';

		}
	}



	if($_POST["action"] == "Load_Questions_Teacher"){

		$statement = $connection->prepare("SELECT * FROM quesanstbl ORDER BY q_id asc");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%">Questions No</th>
		<th width="20%">Questions</th>
		<th width="10%">Answer</th>
		<th width="10%">Actions</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="q_id">'.$row["q_id"].'</td>
				<td class="q_question">'.$row["q_question"].'</td>
				<td class="q_answer">'.$row["q_answer"].'</td>
				
				<td>
				<button type="button" id="'.$row["q_id"].'" class="btn btn-danger btn-xs answer_question">Answer</button>
				</td>
				</tr>

				';
			}

		}
		else{
			$output .= '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}

	if($_POST["action"] == "Answer_Question"){

		$statement = $connection->prepare(
			"UPDATE quesanstbl 
			SET q_answer = :q_answer
			WHERE q_id = :q_id"
		);
		$result = $statement->execute(
			array(
				
				'q_answer' => $_POST['q_answer'],
				':q_id' => $_POST["q_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated!';

		}
	}




	if($_POST["action"] == "Load_Compared_Marks"){

		$query = "SELECT m_id,st_id, m_sem, m_sub1, m_sub2, m_sub3, m_sub4, m_sub5, m_sub6,sum(m_sub1 + m_sub2 + m_sub3 + m_sub4 + m_sub5 + m_sub6) as Total from markstbl  WHERE st_id = ".$_POST["st_id"]."";  
			$result = mysqli_query($con, $query); 
			if($result)
			{	 
				$data = array();
				while($op = mysqli_fetch_array ($result)){
					$total = $op['Total']; 
					break;
				}

		$statement = $connection->prepare("SELECT studentstbl.st_fullname,markstbl.m_id, markstbl.m_sem, markstbl.m_sub1, markstbl.m_sub2, markstbl.m_sub3, markstbl.m_sub4, markstbl.m_sub5, markstbl.m_sub6,sum(markstbl.m_sub1 + markstbl.m_sub2 + markstbl.m_sub3 + markstbl.m_sub4 + markstbl.m_sub5 + markstbl.m_sub6) as Total from markstbl left join studentstbl on studentstbl.st_id = markstbl.st_id  GROUP BY m_id HAVING Total >= ".$total." ORDER BY Total ASC LIMIT 6");

		$statement->execute();
		$result=$statement->fetchAll();
		$output ='';
		$output .='<thead>
		<tr>
		<th width="20%" class="displaynone">Marks ID</th>
		<th width="20%">Student Name</th>
		<th width="20%">Semester</th>
		<th width="10%">Subject 1</th>
		<th width="10%">Subject 2</th>
		<th width="10%">Subject 3</th>
		<th width="10%">Subject 4</th>
		<th width="10%">Subject 5</th>
		<th width="10%">Subject 6</th>
		<th width="10%">Total</th>
		</tr></thead>
		<tbody>';

		if($statement->rowCount() > 0){

			foreach ($result as $row) {
				$output .='
				<tr>
				<td class="m_id displaynone">'.$row["m_id"].'</td>
				<td class="st_fullname">'.$row["st_fullname"].'</td>
				<td class="m_sem">'.$row["m_sem"].'</td>
				<td class="m_sub1">'.$row["m_sub1"].'</td>
				<td class="m_sub2">'.$row["m_sub2"].'</td>
				<td class="m_sub3">'.$row["m_sub3"].'</td>
				<td class="m_sub4">'.$row["m_sub4"].'</td>
				<td class="m_sub5">'.$row["m_sub5"].'</td>
				<td class="m_sub6">'.$row["m_sub6"].'</td>
				<td class="Total">'.$row["Total"].'</td>
				</tr>

				';
			}

		}

	}	
		else{
			$output = '
			<tr>
			<td align="center" colspan="6">Data not Found!</td>
			</tr>
			';
		}
		$output .= '</tbody>';
		echo $output;				
	}

}

?>