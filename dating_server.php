<?php
	
		
	if(isset($_GET["p"]))
	{
		
		if($_GET["p"]=="signup")
		{
			signup();
		}
		else
		if($_GET["p"]=="edit_profile")
		{
			edit_profile();
		}
			else
		if($_GET["p"]=="edit_very_user")
		{
			edit_very_user();
		}
		else
			if($_GET["p"]=="harga")
		{
			harga();
		}
			else
			if($_GET["p"]=="transaksi")
		{
			transaksi();
		}
			else
			if($_GET["p"]=="transaksi_pending")
		{
	     	transaksi_pending();
		}
			else
			if($_GET["p"]=="transaksi_selesai")
		{
	     	transaksi_selesai();
		}
			else
			if($_GET["p"]=="transaksi_batal")
		{
	     	transaksi_batal();
		}
			else
			if($_GET["p"]=="transaksi_acc")
		{
	     	transaksi_acc();
		}
			else
			if($_GET["p"]=="transaksi_auto")
		{
	     	transaksi_auto();
		}
			else
			if($_GET["p"]=="buat_transaksi")
		{
			buat_transaksi();
		}
		else
		if($_GET["p"]=="getUserInfo")
		{
			getUserInfo();
		}
		else
		if($_GET["p"]=="uploadImages")
		{
			uploadImages();
		}
		else
		if($_GET["p"]=="uploadImages_very_user")
		{
			uploadImages_very_user();
		}
		else
		if($_GET["p"]=="userNearByMe")
		{
			userNearByMe();
			
		}
		else
		if($_GET["p"]=="deleteImages")
		{
			deleteImages();
		}
			else
		if($_GET["p"]=="deleteImages_very_user")
		{
			deleteImages_very_user();
		}
		else
		if($_GET["p"]=="show_or_hide_profile")
		{
			show_or_hide_profile();
		}
		else
		if($_GET["p"]=="update_purchase_Status")
		{
			update_purchase_Status();
		}
		else
		if($_GET["p"]=="myMatch")
		{
			myMatch();
		}
		else
		if($_GET["p"]=="firstchat")
		{
			firstchat();
		}
		else
		if($_GET["p"]=="flat_user")
		{
			flat_user();
		}
		else
		if($_GET["p"]=="unMatch")
		{
			unMatch();
		}
		else
		if($_GET["p"]=="deleteAccount")
		{
			deleteAccount();
		}
		else
		if($_GET["p"]=="boostProfile")
		{
			boostProfile();
		}
		else
		if($_GET["p"]=="subscription_update")
		{
			subscription_update();
		}
		
		//admin panel functions
		else
		if($_GET["p"]=="All_Users")
		{
			All_Users();
		}
		else
		if($_GET["p"]=="fake_profiles")
		{
			fake_profiles();
		}
		else
		if($_GET["p"]=="All_ReportedUsers")
		{
			All_ReportedUsers();
		}
		else
		if($_GET["p"]=="Admin_Login")
		{
			Admin_Login();
		}
		else
		if($_GET["p"]=="Update_From_Firebase")
		{
			Update_From_Firebase();
		}
		else
		if($_GET["p"]=="All_Matched_Profile")
		{
			All_Matched_Profile();
		}
	    else
		if($_GET["p"]=="changePassword")
		{
			changePassword();
		}
		else
		if($_GET["p"]=="getProfilePictures")
		{
			getProfilePictures();
		}
		else
		if($_GET["p"]=="getProfilelikes")
		{
			getProfilelikes();
		}
		else
		if($_GET["p"]=="getmatchedprofiles")
		{
			getmatchedprofiles();
		}
		else
		if($_GET["p"]=="get_profiles_nameByID")
		{
			get_profiles_nameByID();
		}
		else
		if($_GET["p"]=="banned_user")
		{
			banned_user();
		}
		else
		if($_GET["p"]=="under_review_new_uploaded_pictures")
		{
			under_review_new_uploaded_pictures();
		}
		else
		if($_GET["p"]=="underReviewPictureStatusChange")
		{
			underReviewPictureStatusChange();
		}
	    else
		if($_GET["p"]=="matchNow")
		{
			matchNow();
		}
		else
		if($_GET["p"]=="convertProfile")
		{
			convertProfile();
		}
		else
	    if($_GET["p"]=="addFakeProfile")
		{
			addFakeProfile();
		}
		else
	    if($_GET["p"]=="sendPushNotification")
		{
			sendPushNotification();
		}
		else
	    if($_GET["p"]=="mylikies")
		{
			mylikies();
		}
		else
		  if($_GET["p"]=="mylikiesCount")
		{
			mylikiesCount();
		}
	    else
	    if($_GET["p"]=="setupData")
		{
			setupData();
		}
	    
	    
	}
	else
	{
		echo"Not Found";

	}
	
		function transaksi_pending(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $query=mysqli_query($conn,"select * from transaksi where status='0' and DATE(created_at) > DATE_SUB( CURRENT_TIMESTAMP, INTERVAL 3 DAY ) order by id asc limit 300");
		        
		$array_out = array();
	    while($row1=mysqli_fetch_array($query))
		{
		    $array_out[] = $row1;
				// array(
				// 	"harga" => $row1['fb_id'],
				// 	"first_name" => htmlentities($row1['first_name']),
				// 	"last_name" => htmlentities($row1['last_name'])
				// );
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
	
		print_r(json_encode($output, true));
	}
		function transaksi_selesai(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $query=mysqli_query($conn,"select * from transaksi where status='1' and DATE(updatedata) = CURDATE() order by id asc limit 300");
		        
		$array_out = array();
	    while($row1=mysqli_fetch_array($query))
		{
		    $array_out[] = $row1;
				// array(
				// 	"harga" => $row1['fb_id'],
				// 	"first_name" => htmlentities($row1['first_name']),
				// 	"last_name" => htmlentities($row1['last_name'])
				// );
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
	
		print_r(json_encode($output, true));
	}
	function transaksi_batal(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $query=mysqli_query($conn,"update transaksi set status=0  where status='1' and id='".$event_json['id_transaksi']."'");
		        
		$array_out = array();
	    while($row1=mysqli_fetch_array($query))
		{
		    $array_out[] = $row1;
				// array(
				// 	"harga" => $row1['fb_id'],
				// 	"first_name" => htmlentities($row1['first_name']),
				// 	"last_name" => htmlentities($row1['last_name'])
				// );
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
	
		print_r(json_encode($output, true));
	}
	function transaksi_acc(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	     $query=mysqli_query($conn,"update transaksi set status=1  where status='0' and id='".$event_json['id_transaksi']."'");
		$array_out = array();

		 if($query && $event_json['tipe']=="upgrade"){
		   $qrry_1="update users SET member_vip =1 WHERE fb_id='".$event_json['fb_id']."'";
           	$cek=mysqli_query($conn, $qrry_1);

           	$array_out[] =  $event_json;
		 }else{
		  $array_out[] =   mysqli_error();
		 }


    	$output=array( "code" => "200", "msg" =>   $event_json);

		print_r(json_encode($output, true));
	}
		function transaksi_auto(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);

	    $que="update transaksi set status='1',konfirm_notifikasi='".$event_json['notifikasi']."',konfirm_time='".$event_json['time']."'   where status='0'  and DATE(created_at) > DATE_SUB( CURRENT_TIMESTAMP, INTERVAL 3 DAY ) and harga='".$event_json['harga']."'";
	    $query=mysqli_query($conn,$que);
		$array_out = array();
	if($query)
		{
		  $query_cek=mysqli_query($conn,"select * from transaksi  where status='1'  and DATE(created_at) > DATE_SUB( CURRENT_TIMESTAMP, INTERVAL 3 DAY ) and harga='".$event_json['harga']."'");

		while($row_promoted=mysqli_fetch_array($query_cek))
				{

					$id_user=$row_promoted['id_user'];

		     	if($row_promoted['tipe_transaksi']=="upgrade")
				{

		   $qrry_1="update users SET member_vip =1 WHERE fb_id='".	$id_user."'";
               	$cek=mysqli_query($conn, $qrry_1);
                   	 	if($cek){
                   	 	    	$array_out[] =  "berhasil upgrade VIP akun : ".	$id_user;
                   	 	    	$output=array( "code" => "200", "msg" => $array_out);
                   	 	}else{
                   	 	    	$array_out[] =  "gagal upgrade VIP akun : ".	$id_user;
                   	 	    	$output=array( "code" => "400", "msg" => $array_out);
                   	 	}

        		 }else{
        		     	   $array_out[] =  "berhasil BELI KOIN akun : ".	$id_user;
        		     		$output=array( "code" => "200", "msg" => $array_out);
        		 }
				}

		}else{
		      $array_out[] =   mysqli_error();
		      	$output=array( "code" => "400", "msg" => $array_out);
		}

	   // $array_out[] =  $que;


		print_r(json_encode($output, true));
	}
	
	function getAge($dob)
	{
	    
	    $birthDate = $dob;
          //explode the date to get month, day and year
          $birthDate = explode("/", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
	}

	function distance($lat1, $lon1, $lat2, $lon2, $unit) 
	{

	  $theta = $lon1 - $lon2;
	  $dist = sin(@deg2rad($lat1)) * sin(@deg2rad($lat2)) +  cos(@deg2rad($lat1)) * cos(@deg2rad($lat2)) * cos(@deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	
	  if ($unit == "K") {
		return ($miles * 1.609344);
	  } else if ($unit == "N") {
		  return ($miles * 0.8684);
		} else {
			return $miles;
		  }
	}
	
	function calculateAge($birthDate)
	{
	    //explode the date to get month, day and year
          $birthDate = explode("/", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
            return $age;
	}
function signup()
	{
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);

		if(isset($event_json['fb_id']) && isset($event_json['first_name']) && isset($event_json['last_name'])&& isset($event_json['job_title'])&& isset($event_json['company'])&& isset($event_json['school']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
			$last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
			$job_title=htmlspecialchars(strip_tags($event_json['job_title'] , ENT_QUOTES));
			$company=htmlspecialchars(strip_tags($event_json['company'] , ENT_QUOTES));
			$school=htmlspecialchars(strip_tags($event_json['school'] , ENT_QUOTES));
		    $email=$event_json['email'];
		    $about_me=$event_json['about_me'];
		    $no_hp=$event_json['no_hp'];
		    $alamat=$event_json['alamat'];
		    $status=$event_json['status'];
		    $kota=$event_json['kota'];
		    $agama=$event_json['agama'];
		    $target_menikah=$event_json['target_menikah'];
		    $provinsi=$event_json['provinsi'];
			$birthday=$event_json['birthday'];
			$gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
			$image=$event_json['image']['file_data'];
				$image1=$event_json['image1']['file_data1'];
					$image2=$event_json['image2']['file_data2'];
				$image3=$event_json['image3']['file_data3'];
					$image4=$event_json['image4']['file_data4'];
						$image5=$event_json['image5']['file_data5'];
			$profile_type=htmlspecialchars_decode(stripslashes($event_json['profile_type']));


		     if($birthday=="")
		     {
		         $birthday = "01/01/2000";
		     }
		     else
		     {
		         $birthday = $birthday;
		     }

		     if($profile_type=="")
		     {
		         $profile_type = "user";
		     }
		     else
		     {
		         $profile_type = "fake";
		     }

            //echo $birthDate;

			$log_in="select * from users where fb_id='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$log_in);

			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    $age="".calculateAge($rd->birthday)."";

				$array_out = array();
				 $array_out[] =
					//array("code" => "200");
					array(
						"fb_id" => $fb_id,
						"action" => "login",
						"image1" => $rd->image1,
					//		"very_user" => $rd->very_user,
						"first_name" => $rd->first_name,
						"last_name" => $rd->last_name,
						"job_title" => $rd->job_title,
						"company" => $rd->company,
						"school" => $rd->school,
						"email" => $rd->email,
						"about_me" => $rd->abou_me,
						"no_hp" => $rd->no_hp,
						"alamat" => $rd->alamat,
						"status" => $rd->status,
						"kota" => $rd->kota,
						"agama" => $rd->agama,
						"target_menikah" => $rd->target_menikah,
						"provinsi" => $rd->provinsi,
						"age" => $age,
						"birthday" => $rd->birthday,
							"image2" => $rd->image2,
								"image3" => $rd->image3,
									"image4" => $rd->image4,
										"image5" => $rd->image5,
						"gender" => $gender
					);

				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}
			else
			{
			    $age="".calculateAge($birthday)."";


			    //$image=$event_json['image']['file_data'];
			    
			       
			      $fileName=$fb_id."_".rand();
                $imageURl5="images/".$fileName.".jpg";
                
             

                $image5 = base64_decode($image5);

                file_put_contents($imageURl5, $image5);
			    
			       
			      $fileName=$fb_id."_".rand();
                $imageURl4="images/".$fileName.".jpg";
                
             

                $image4 = base64_decode($image4);

                file_put_contents($imageURl4, $image4);
                
			       
			      $fileName=$fb_id."_".rand();
                $imageURl3="images/".$fileName.".jpg";
                
             

                $image3 = base64_decode($image3);

                file_put_contents($imageURl3, $image3);
                
			       
			      $fileName=$fb_id."_".rand();
                $imageURl2="images/".$fileName.".jpg";
                
             

                $image2 = base64_decode($image2);

                file_put_contents($imageURl2, $image2);
			    
			    
			    
			      $fileName=$fb_id."_".rand();
                $imageURl1="images/".$fileName.".jpg";
                
             

                $image1 = base64_decode($image1);

                file_put_contents($imageURl1, $image1);
                

                $fileName=$fb_id."_".rand();
                $imageURl="images/".$fileName.".jpg";
                
             

                $image = base64_decode($image);

                file_put_contents($imageURl, $image);

			    $qrry_1="insert into users(fb_id,first_name,last_name,job_title,company,school,email,about_me,no_hp,birthday,age,image1,profile_type,gender,alamat,status,kota,agama,target_menikah,image2,image3,image4,image5,image6,provinsi)values(";
    			$qrry_1.="'".$fb_id."',";
    			$qrry_1.="'".$first_name."',";
    			$qrry_1.="'".$last_name."',";
    			$qrry_1.="'".$job_title."',";
    			$qrry_1.="'".$company."',";
    			$qrry_1.="'".$school."',";
    			$qrry_1.="'".$email."',";
    			$qrry_1.="'".$about_me."',";
    			$qrry_1.="'".$no_hp."',";
    			$qrry_1.="'".$birthday."',";
    			$qrry_1.="'".$age."',";
    			$qrry_1.="'http://66.42.59.158/api/".$imageURl."',";
    			$qrry_1.="'".$profile_type."',";
    			$qrry_1.="'".$gender."',";
    			$qrry_1.="'".$alamat."',";
    			$qrry_1.="'".$status."',";
    			$qrry_1.="'".$kota."',";
    		    $qrry_1.="'".$agama."',";
    			$qrry_1.="'".$target_menikah."',";
    				$qrry_1.="'http://66.42.59.158/api/".$imageURl1."',";
    					$qrry_1.="'http://66.42.59.158/api/".$imageURl2."',";
    						$qrry_1.="'http://66.42.59.158/api/".$imageURl3."',";
    							$qrry_1.="'http://66.42.59.158/api/".$imageURl4."',";
    								$qrry_1.="'http://66.42.59.158/api/".$imageURl5."',";
    			$qrry_1.="'".$provinsi."'";
    			
    			$qrry_1.=")";
    			if(mysqli_query($conn,$qrry_1))
    			{

				     $age="".calculateAge($birthday)."";
    				 $array_out = array();
    				 $array_out[] =
    					//array("code" => "200");
    					array(
    						"fb_id" => $fb_id,
    						"action" => "signup",
    						"image1" => "http://66.42.59.158/api/".$imageURl,
    							"image2" => "http://66.42.59.158/api/".$imageURl1,
    								"image3" => "http://66.42.59.158/api/".$imageURl2,
    									"image4" => "http://66.42.59.158/api/".$imageURl3,
    										"image5" => "http://66.42.59.158/api/".$imageURl4,
    											"image6" => "http://66.42.59.158/api/".$imageURl5,
    						"first_name" => $first_name,
    						"last_name" => $last_name,
    						"job_title" => $job_title,
    						"company" => $company,
    						"school" => $school,
    						"email" => $email,
    						"about_me" => $about_me,
    						"no_hp" => $no_hp,
    						"alamat" => $alamat,
    						"status" => $status,
    						"kota" => $kota,
    						"agama" => $agama,
                            "target_menikah" => $target_menikah,
                            "provinsi" => $provinsi,
    						"age" => $age,
					    	"birthday" => $birthday,
    						"gender" => $gender
    					);

    				$output=array( "code" => "200", "msg" => $array_out);
    				print_r(json_encode($output, true));
    			}
    			else
    			{
    			    //echo mysqli_error();
    			    $array_out = array();

            		 $array_out[] =
            			array(
            			"response" =>"problem in signup".mysqli_error());

            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}



		}
		else
		{
			$array_out = array();

			 $array_out[] =
				array(
				"response" =>"Json Parem are missing");

			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	
	
	function flat_user()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['my_id']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$my_id=htmlspecialchars(strip_tags($event_json['my_id'] , ENT_QUOTES));
			
			$qrry_1="insert into flag_user(user_id,flag_by)values(";
			$qrry_1.="'".$fb_id."',";
			$qrry_1.="'".$my_id."'";
			$qrry_1.=")";
			if(mysqli_query($conn,$qrry_1))
			{
			 
			
				 $array_out = array();
				 $array_out[] = 
					//array("code" => "200");
					array(
        			"response" =>"successful");
				
				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}
			else
			{
			    //echo mysqli_error();
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in signup");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
		function edit_very_user()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['about_me']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
			$job_title=htmlspecialchars(strip_tags($event_json['job_title'] , ENT_QUOTES));
			$company=htmlspecialchars(strip_tags($event_json['company'] , ENT_QUOTES));
			$school=htmlspecialchars(strip_tags($event_json['school'] , ENT_QUOTES));
				$agama=htmlspecialchars(strip_tags($event_json['agama'] , ENT_QUOTES));
					$kota=htmlspecialchars(strip_tags($event_json['kota'] , ENT_QUOTES));
						$status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
							$provinsi=htmlspecialchars(strip_tags($event_json['provinsi'] , ENT_QUOTES));
								$alamat=htmlspecialchars(strip_tags($event_json['alamat'] , ENT_QUOTES));
									$email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
										$no_hp=htmlspecialchars(strip_tags($event_json['no_hp'] , ENT_QUOTES));
											$no_ktp=htmlspecialchars(strip_tags($event_json['no_ktp'] , ENT_QUOTES));
												$very_sukses=htmlspecialchars(strip_tags($event_json['very_sukses'] , ENT_QUOTES));
												$first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
												$last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
			
		
				$very_user=stripslashes(strip_tags($event_json['very_user']));
		    $gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
		    $birthday=htmlspecialchars(strip_tags($event_json['birthday'] , ENT_QUOTES));
			
			
			
			
			$age=calculateAge($birthday);
			
			
			$qrry_1="update users SET about_me ='".$about_me."' ,alamat='".$alamat."',email='".$email."',no_hp='".$no_hp."',agama='".$agama."',kota ='".$kota."',status ='".$status."',provinsi ='".$provinsi."', job_title ='".$job_title."', birthday ='".$birthday."' , age ='".$age."' , company ='".$company."' , school ='".$school."'  ,  gender ='".$gender."' ,very_user='".$very_user."', no_ktp='".$no_ktp."', very_sukses='".$very_sukses."' , first_name='".$first_name."', last_name='".$last_name."'  WHERE fb_id ='".$fb_id."' ";
			if(mysqli_query($conn,$qrry_1))
			{
			    $array_out = array();
				 
				$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
    			$log_in_rs=mysqli_query($conn,$qrry_1);
    			
    			if(mysqli_num_rows($log_in_rs))
    			{   
    			    
                    
    			    $rd=mysqli_fetch_object($log_in_rs);
    			    
    			    $birthDate = $rd->birthday;
                    //explode the date to get month, day and year
                      $birthDate = explode("/", $birthDate);
                      //get age from date or birthdate
                      $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                        
                        
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"about_me" => $rd->about_me,
            			"job_title" => $rd->job_title,
            			"gender" => $rd->gender,
            			"birthday" => $rd->birthday,
            			"age" => $age,
            			"company" => $rd->company,
            			"school" => $rd->school,
            			"first_name" => $rd->first_name,
            			"last_name" => $rd->last_name,
            			"agama" => $rd->agama,
        				"kota" => $rd->kota,
        				"status" => $rd->status,
        				"provinsi" => $rd->provinsi,
        					"alamat" => $rd->alamat,
        						"email" => $rd->email,
        						"no_hp" => $rd->no_hp,
        					
            		
            			"very_user" => htmlspecialchars_decode(stripslashes($rd->very_user)),
            				"no_ktp" => $rd->no_ktp,
            					"very_sukses" => $rd->very_sukses,
            						"first_name" => $rd->first_name,
            							"last_name" => $rd->last_name,
            			);
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			
        		
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
	function edit_profile()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['about_me']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
			$job_title=htmlspecialchars(strip_tags($event_json['job_title'] , ENT_QUOTES));
			$company=htmlspecialchars(strip_tags($event_json['company'] , ENT_QUOTES));
			$school=htmlspecialchars(strip_tags($event_json['school'] , ENT_QUOTES));
				$agama=htmlspecialchars(strip_tags($event_json['agama'] , ENT_QUOTES));
					$kota=htmlspecialchars(strip_tags($event_json['kota'] , ENT_QUOTES));
						$status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
							$provinsi=htmlspecialchars(strip_tags($event_json['provinsi'] , ENT_QUOTES));
								$alamat=htmlspecialchars(strip_tags($event_json['alamat'] , ENT_QUOTES));
									$email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
										$no_hp=htmlspecialchars(strip_tags($event_json['no_hp'] , ENT_QUOTES));
										
			
			$image1=stripslashes(strip_tags($event_json['image1']));
			$image2=stripslashes(strip_tags($event_json['image2']));
			$image3=stripslashes(strip_tags($event_json['image3']));
			$image4=stripslashes(strip_tags($event_json['image4']));
			$image5=stripslashes(strip_tags($event_json['image5']));
			$image6=stripslashes(strip_tags($event_json['image6']));
			
		    $gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
		    $birthday=htmlspecialchars(strip_tags($event_json['birthday'] , ENT_QUOTES));
			
			
			
			
			$age=calculateAge($birthday);
			
			
			$qrry_1="update users SET about_me ='".$about_me."' ,alamat='".$alamat."',email='".$email."',no_hp='".$no_hp."',agama='".$agama."',kota ='".$kota."',status ='".$status."',provinsi ='".$provinsi."', job_title ='".$job_title."', birthday ='".$birthday."' , age ='".$age."' , company ='".$company."' , school ='".$school."'  ,  gender ='".$gender."' , image1='".$image1."', image2='".$image2."', image3='".$image3."', image4='".$image4."', image5='".$image5."' , image6='".$image6."' WHERE fb_id ='".$fb_id."' ";
			if(mysqli_query($conn,$qrry_1))
			{
			    $array_out = array();
				 
				$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
    			$log_in_rs=mysqli_query($conn,$qrry_1);
    			
    			if(mysqli_num_rows($log_in_rs))
    			{   
    			    
                    
    			    $rd=mysqli_fetch_object($log_in_rs);
    			    
    			    $birthDate = $rd->birthday;
                    //explode the date to get month, day and year
                      $birthDate = explode("/", $birthDate);
                      //get age from date or birthdate
                      $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                        
                        
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"about_me" => $rd->about_me,
            			"job_title" => $rd->job_title,
            			"gender" => $rd->gender,
            			"birthday" => $rd->birthday,
            			"age" => $age,
            			"company" => $rd->company,
            			"school" => $rd->school,
            			"first_name" => $rd->first_name,
            			"last_name" => $rd->last_name,
            			"agama" => $rd->agama,
        				"kota" => $rd->kota,
        				"status" => $rd->status,
        				"provinsi" => $rd->provinsi,
        					"alamat" => $rd->alamat,
        						"email" => $rd->email,
        						"no_hp" => $rd->no_hp,
        						
            			"image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
            			"image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
            			"image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
            			"image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
            			"image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
            			"image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
            		
            			);
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			
        		
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
	
	function getUserInfo()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			//$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
			
			
			$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{   
			    
                
			    $rd=mysqli_fetch_object($log_in_rs);
			    
			    $birthDate = $rd->birthday;
                //explode the date to get month, day and year
                  $birthDate = explode("/", $birthDate);
                  //get age from date or birthdate
                  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));
                    
                    
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"about_me" => $rd->about_me,
        			"job_title" => $rd->job_title,
        			"gender" => $rd->gender,
        			"birthday" => $rd->birthday,
        			"age" => $age,
        			"company" => $rd->company,
        			"school" => $rd->school,
        			"first_name" => $rd->first_name,
        			"last_name" => $rd->last_name,
        			"no_hp" => $rd->no_hp,
        			"email" => $rd->email,
        			"alamat" => $rd->alamat,
        			"like_count" => $rd->like_count,
        			"dislike_count" => $rd->dislike_count,
        			"id" => $rd->id,
        				"agama" => $rd->agama,
        					"kota" => $rd->kota,
        						"status" => $rd->status,
        						"provinsi" => $rd->provinsi,
        						"alamat" => $rd->alamat,
        						"email" => $rd->email,
        						"no_hp" => $rd->no_hp,
        						"member_vip" => $rd->member_vip,
        							"no_ktp" => $rd->no_ktp,
        								"very_sukses" => $rd->very_sukses,
        			"image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
        			"image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
        			"image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
        			"image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
        			"image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
        			"image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
        				"very_user" => htmlspecialchars_decode(stripslashes($rd->very_user)),
        			);
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
		function uploadImages_very_user()
	{
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['image']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$image=$event_json['image']['file_data'];
		    
		    $fileName=$fb_id."_".rand();
			$imageURl="images/".$fileName.".jpg";
			
			$image = base64_decode($image);
			
			file_put_contents($imageURl, $image);
			
			$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    
			    if($rd->very_user=="")
			    {
			        $colum_name="very_user";
			    }
			   
			    
			    
			    $qrry_1="insert into user_images(fb_id,image_url,columName)values(";
        		$qrry_1.="'".$fb_id."',";
        		$qrry_1.="'http://66.42.59.158/api/".$imageURl."',";
        		$qrry_1.="'".$colum_name."'";
        		$qrry_1.=")";
        		mysqli_query($conn,$qrry_1);
        		
			    $qrry_1="update users SET $colum_name ='http://66.42.59.158/api/".$imageURl."' WHERE fb_id ='".$fb_id."' ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in uploading");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}   
	    	
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	
	function uploadImages()
	{
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['image']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$image=$event_json['image']['file_data'];
		    
		    $fileName=$fb_id."_".rand();
			$imageURl="images/".$fileName.".jpg";
			
			$image = base64_decode($image);
			
			file_put_contents($imageURl, $image);
			
			$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    
			    if($rd->image1=="")
			    {
			        $colum_name="image1";
			    }
			    else
			     if($rd->image2=="")
			    {
			        $colum_name="image2";
			    }
			    else
			    if($rd->image3=="")
			    {
			        $colum_name="image3";
			    }
			    else
			    if($rd->image4=="")
			    {
			        $colum_name="image4";
			    }
			    else
			    if($rd->image5=="")
			    {
			        $colum_name="image5";
			    }
			    else
			    if($rd->image6=="")
			    {
			        $colum_name="image6";
			    }
			    else
			    if($rd->very_user=="")
			    {
			        $colum_name="very_user";
			    }
			    
			    
			    $qrry_1="insert into user_images(fb_id,image_url,columName)values(";
        		$qrry_1.="'".$fb_id."',";
        		$qrry_1.="'http://66.42.59.158/api/".$imageURl."',";
        		$qrry_1.="'".$colum_name."'";
        		$qrry_1.=")";
        		mysqli_query($conn,$qrry_1);
        		
			    $qrry_1="update users SET $colum_name ='http://66.42.59.158/api/".$imageURl."' WHERE fb_id ='".$fb_id."' ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in uploading");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}   
	    	
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	
	function Update_From_Firebase()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $headers = array(
		"Accept: application/json",
		"Content-Type: application/json"
    	);
    	
    	$data = array();
    	
    	$ch = curl_init($firebaseDb_URL.'/.json');
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	foreach ($json_data as $key => $item) 
    	{
            // 		echo" this user >>   ";
            // 		print_r($key);
            		
            // 		//print_r($item);
            // 		echo"<br>";
    		
    		
    		foreach ($item as $key1 => $item1)
    		{
    		    
    		  //  $data = array("fetch"=>"true");
    	
        //     	$ch = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
            	
        //     	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        //     	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        //     	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            	
        //     	$return = curl_exec($ch);
            	
        //     	$json_data = json_decode($return, true);
            	
    		    if(!isset($item1['fetch']))
    		    {
    		       
    		       //print_r($item1['match']);
        		     if($item1['match']=="false")
        		     {
        		         $match= "false";
        		     }
        		     
        		     if($item1['match']=="true")
        		     {
        		         $match= "true";
        		     }
        		     $effeted=$item1['effect'];
        		    
                        		  //  echo "<br>";
                        		  //  print_r($key);
                            //         print_r($item1['type']);
                            //         			echo"  this user >>>>>>    ";
                            //         			print_r($key1);
                            //         			print_r($item1['name']);
                            //         			echo"<br>";
                        			
        			
        			$qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected)values(";
            		$qrry_1.="'".$key."',";
            		$qrry_1.="'".$key1."',";
            		$qrry_1.="'".$item1['type']."',";
            		$qrry_1.="'".$match."',";
            		$qrry_1.="'".$effeted."'";
            		$qrry_1.=")";
            		if(mysqli_query($conn,$qrry_1))
            		{
            		    //echo "insert done";
            		   // echo $item1['effect']=="true";
            		    if($item1['type']=="like" && $item1['effect']=="true")
            		    {
            		        $qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key."' ";
                			if(mysqli_query($conn,$qrry_1))
                			{
                			    //echo "udpate";
                			}
                			
                			if($item1['status']=="1")
                			{
                    			$ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                				curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                            	curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                            	curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                            	curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                            	
                            	$return = curl_exec($ch1);
                            	
                            	$json_data = json_decode($return, true);
                            	
                            	
                            	$curl_error = curl_error($ch1);
                            	$http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                			}	
                			
            		    }
            		    else
            		    if($item1['type']=="dislike" && $item1['effect']=="true")
            		    {
            		        $qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key."' ";
                			if(mysqli_query($conn,$qrry_1))
                			{
                			    //echo "udpate";
                			}
                			
                			$ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
            				curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                        	curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        	curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                        	curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        	
                        	$return = curl_exec($ch1);
                        	
                        	$json_data = json_decode($return, true);
                        	
                        	
                        	$curl_error = curl_error($ch1);
                        	$http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                        	
                        	if($item1['status']=="1")
                			{
                    			$ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                				curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                            	curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                            	curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                            	curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                            	
                            	$return = curl_exec($ch1);
                            	
                            	$json_data = json_decode($return, true);
                            	
                            	
                            	$curl_error = curl_error($ch1);
                            	$http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                			}	
            		    }
            		    
            		   
            		} 
    		        
    		    }
    		     
        		
    		}
    	}
    	
    	
    	
    	//Delete firebase db data after insert
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	
    	$curl_error = curl_error($ch);
    	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    	
    	
    	
	    
	    
	}
	
	function harga(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $query=mysqli_query($conn,"select * from harga order by urutan DESC");
		        
		$array_out = array();
	    while($row1=mysqli_fetch_array($query))
		{
		    $array_out[] = $row1;
				// array(
				// 	"harga" => $row1['fb_id'],
				// 	"first_name" => htmlentities($row1['first_name']),
				// 	"last_name" => htmlentities($row1['last_name'])
				// );
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
	
		print_r(json_encode($output, true));
	}
	
		function transaksi(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $query=mysqli_query($conn,"select * from transaksi where id_user='".$event_json['fb_id']."' order by id desc");
		        
		$array_out = array();
	    while($row1=mysqli_fetch_array($query))
		{
		    $array_out[] = $row1;
				// array(
				// 	"harga" => $row1['fb_id'],
				// 	"first_name" => htmlentities($row1['first_name']),
				// 	"last_name" => htmlentities($row1['last_name'])
				// );
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
	
		print_r(json_encode($output, true));
	}
	function buat_transaksi(){
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $rand_id_transkasi="SN".generateRandomString(8);
	    $created_at=date('Y-m-d H:i:s', time());
	   // $expired_at=date('Y-m-d H:i:s', time());
	     $expired_at = date('Y-m-d H:i:s', strtotime('+24 hours' , time()));
   
	    $harga=(int)$event_json['harga']+rand(100, 999);
	    		$qrry_1="insert into transaksi(id_tagihan,harga,email,no_akun,id_user,tipe_transaksi,koin,nomor,nama,bank,tipe_transfer,created_at,expired_at)values(";
								$qrry_1.="'".$rand_id_transkasi."',";//id_tagihan
								$qrry_1.="'".$harga."',";//harga
								$qrry_1.="'".$event_json['email']."',";//email-user
								$qrry_1.="'".$event_json['id']."',";//id-akun
								$qrry_1.="'".$event_json['fb_id']."',";//id-user
								$qrry_1.="'".$event_json['tipe_transaksi']."',";//tipe_transaksi//
								$qrry_1.="'".$event_json['koin']."',";//koin
								$qrry_1.="'".$event_json['nomor']."',";//nomor
								$qrry_1.="'".$event_json['nama']."',";//nama
								$qrry_1.="'".$event_json['bank']."',";//nama
								$qrry_1.="'".$event_json['tipe_transfer']."',";//tipe_transfer
								$qrry_1.="'".$created_at."',";//tipe_transfer
				                $qrry_1.="'".$expired_at."'";//created_at
								$qrry_1.=")";
	    $query=mysqli_query($conn,$qrry_1);
		        
		        	if($query)
    			{
			         $array_out = array();
    				 $array_out[] = 
    					//array("code" => "200");
    					array(
            			"response" =>"successful");
    				
    				$output=array( "code" => "200", "msg" => $array_out);
    				print_r(json_encode($output, true));
    			}
// 		$array_out = array();
// 	    while($row1=mysqli_fetch_array($query))
// 		{
// 		    $array_out = array();
//     				 $array_out[] = 
//     					//array("code" => "200");
//     					array(
//             			"response" =>"successful");
    				
//     				$output=array( "code" => "200", "msg" => $array_out);
// 		}
	    
//     	$output=array( "code" => "200", "msg" => $array_out);
	
// 		print_r(json_encode($output, true));
	}
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	function userNearByMe()
	{
		require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
// 		$my_file = 'file.txt';
//         $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
//         $data = $input;
//         fwrite($handle, $data);
        
		if(isset($event_json['fb_id']) && isset($event_json['lat_long']) )
		{
		    
			//disable user promoted
				$query_promoted=mysqli_query($conn,"select * from users where promoted='1' order by promoted_mins ");
				while($row_promoted=mysqli_fetch_array($query_promoted))
				{
					
					$promoted_date=$row_promoted['promoted_date'];
					$promoted_mins=$row_promoted['promoted_mins'];
					$fb_id=$row_promoted['fb_id'];
					
					
					$datetime1 = new DateTime();
					$datetime2 = new DateTime($promoted_date);
					$interval = $datetime1->diff($datetime2);
					$min_ago = $interval->format('%i');
					$hour_ago = $interval->format('%h');
					//$elapsed;
					
					if($min_ago>$promoted_mins || $hour_ago>1)
					{
						$qrry_1="update users SET promoted='0' WHERE fb_id ='".$fb_id."' ";
						mysqli_query($conn,$qrry_1);
					}
				 }
			//disable user promoted
			
			
		    //remove after fetch
        	    
    	    $headers = array(
    		"Accept: application/json",
    		"Content-Type: application/json"
        	);
        	
        	$data = array();
        	
        	$ch = curl_init($firebaseDb_URL.'/.json');
        	
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	
        	$return = curl_exec($ch);
        	
        	$json_data = json_decode($return, true);
        	
        	$datacount=@count($json_data);
			if($datacount!="0")
			{
				foreach ($json_data as $key => $item) 
				{
					foreach ($item as $key1 => $item1)
					{
						
					 
						if(!isset($item1['fetch']))
						{
						   
						   //print_r($item1['match']);
						   if($item1['matchx']=="false")
    						 {
    							 $matchx= "false";
    						 }
						   
    						 if($item1['match']=="false")
    						 {
    							 $match= "false";
    						 }
    						 
    						 if($item1['match']=="true")
    						 {
    							 $match= "true";
    						 }
    						 
    						 $effeted=$item1['effect'];
    						 
    					
							 
							 	
							$qrry_1="select * from like_unlike where action_profile ='".$key."' and effect_profile ='".$key1."' ";
							$log_in_rs=mysqli_query($conn,$qrry_1);
							if(mysqli_num_rows($log_in_rs))
							{
							   mysqli_query($conn,"update like_unlike SET match_profile ='true' WHERE action_profile ='".$key."' and effect_profile ='".$key1."' ");
							   //echo "update 1";
							  
							}
							else
							{
		                    	$qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected,created)values(";
								$qrry_1.="'".$key."',";
								$qrry_1.="'".$key1."',";
								$qrry_1.="'".$item1['type']."',";
								$qrry_1.="'".$match."',";
								$qrry_1.="'".$effeted."',";
								$qrry_1.="'".date('Y-m-d H:i:s', time())."'";
								$qrry_1.=")";
								
								if(mysqli_query($conn,$qrry_1))
								{
									if($item1['type']=="like" && $item1['effect']=="true")
									{
										$qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}
										
									 }
									else
									if($item1['type']=="dislike" && $item1['effect']=="true")
									{
										$qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}
										
										
									}
									
								   
								} 
								
								
							}
						 
							
						}
						 
						
					}
				}
			}
        	
        	//Delete firebase db data after insert
        	
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	
        	$return = curl_exec($ch);
        	
        	$json_data = json_decode($return, true);
        	
        	
        	$curl_error = curl_error($ch);
        	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	//end--------------------------------------------------------------------
        	
        	
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$lat_long=strip_tags($event_json['lat_long']);
			
			$distance=strip_tags($event_json['distance']);
			$age_range=strip_tags($event_json['age_range']);
			$gender=strip_tags($event_json['gender']);
			
			$age_min =strip_tags($event_json['age_min']);
			$age_max =strip_tags($event_json['age_max']);
		    
		    $npage =strip_tags($event_json['npage']);
		    $offset=strip_tags($event_json['offset']);
		    $version=strip_tags($event_json['version']);
		    $device=strip_tags($event_json['device']);
			
			$purchased=strip_tags($event_json['purchased']);
			
				$member_vip=strip_tags($event_json['member_vip']);
		    
		    if($distance=="")
		    {
		        $distance="100000";
		    }
		    
		    $mylocation=explode(",",$lat_long);
			//
			$qrry_1="update users SET lat_long ='".$lat_long."' , users.lat='".$mylocation[0]."' , users.long='".$mylocation[1]."' , version='".$version."' , device='".$device."' , device_token='".$device_token."' , purchased='".$purchased."' , member_vip='".$member_vip."'   WHERE fb_id ='".$fb_id."' ";
			if(mysqli_query($conn,$qrry_1))
			{
			    //6371  for km query
			    $mylocation=explode(",",$lat_long);
			 //   $offset=rand(1,10);
			    
			 //   $npage=15;
			    $q="";
			    if($gender=="all")
			    {
			        $q= "SELECT *, ( 3959 * acos( cos( radians(".$mylocation[0].") ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians(".$mylocation[1].") ) + sin( radians(".$mylocation[0].") ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE age BETWEEN ".$age_min." AND ".$age_max." and fb_id !=".$fb_id." HAVING distance < ".$distance." ORDER BY distance LIMIT  ".$offset.",".$npage;
			        $query=mysqli_query($conn,$q);
			        $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 1");
		
			    }
			    else
			    {
			
			          $q= "SELECT *, ( 3959 * acos( cos( radians(".$mylocation[0].") ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians(".$mylocation[1].") ) + sin( radians(".$mylocation[0].") ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '".$gender."' AND age BETWEEN ".$age_min." AND ".$age_max." and fb_id !=".$fb_id." HAVING distance < ".$distance." ORDER BY distance LIMIT  ".$offset.",".$npage;
			        $query=mysqli_query($conn,$q);
			        $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 10");
			 
			    
			    }

			     	     $kabol="insert into log_data (data)values('".$offset." - ".$fb_id."') ";
			                 //$kabol="insert into log_data (data)values('yes') ";
    			$kab=mysqli_query($conn,$kabol);
			    
			 //   echo "SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age >= $age_range and fb_id !='".$fb_id."' HAVING distance < $distance ORDER BY distance LIMIT 40";
			    
			 //   echo "SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age >= $age_range and fb_id !='".$fb_id."' HAVING distance < $distance ORDER BY distance LIMIT 40";
			   
		//	    if($gender=="male")
			 //   if($gender=="laki-laki")
    // 		    {
    // 		        $query=mysqli_query($conn,"select * from users where fb_id !='".$fb_id."' and gender='laki-laki'  ORDER BY RAND() limit 15 ");
    // 		        $query=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' HAVING distance < $distance ORDER BY distance LIMIT 10");
			 //       $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 10");
    // 		    }
    // 		    else
    // 		    //  if($gender=="female")
    // 		    if($gender=="perempuan")
    // 		    {
    // 		        $query=mysqli_query($conn,"select * from users where fb_id !='".$fb_id."' and gender='perempuan' ORDER BY RAND() limit 15  ");
    // 		        $query=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' HAVING distance < $distance ORDER BY distance LIMIT 10");
			 //       $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 10");
    // 		    }
    // 		    else
    // 		    {
    // 		       $query=mysqli_query($conn,"select * from users where fb_id !='".$fb_id."' ORDER BY rand() limit 5");
    // 		     //  $query=mysqli_query($conn,"select * from user where id IN (".$idd.") and role='doctor' ");
    // 		    }
		        
		        //akeel login
		      //  if($fb_id=="102970476542908425990")
		      //  {
		      //      $query=mysqli_query($conn,"select * from users where  fb_id ='105137970237338569578'  ");
		      //  }
		        
		      //  //bg login
		      //  if($fb_id=="105137970237338569578")
		      //  {
		      //      $query=mysqli_query($conn,"select * from users where  fb_id ='102970476542908425990'  ");
		      //  }
		        //$query=mysqli_query($conn,"select * from users where fb_id !='".$fb_id."' ORDER BY id DESC limit 20 ");
		       
		        //check if block or not
		        $qrry_1="select * from users where fb_id ='".$fb_id."' ";
    			$log_in_rs=mysqli_query($conn,$qrry_1);
    			$rd=mysqli_fetch_object($log_in_rs); 
		        $profile_block=$rd->block;
    			//check if block or not
    			
    			
    			$array_out_promoted = array();
        		while($row_promoted=mysqli_fetch_array($promoted))
        		
        		
        		{
        		   
        		    $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' and effect_profile ='".$row_promoted['fb_id']."'  ";
        		   	$log_in_rs=mysqli_query($conn,$qrry_1);
        			
        			$rd=mysqli_fetch_object($log_in_rs);
    			   
    			    if(@$rd->effect_profile != @$row_promoted['fb_id'] || (@$rd->effected=="false" && @$rd->match_profile=="false"))
    			    {
    			        $action_type=@$rd->action_type;
    			        if($action_type==null)
    			        {
    			            $action_type="false";
    			        }
    			        
    			        $mylocation=explode(",",$lat_long);
            			$other_profiles=explode(",",$row_promoted['lat_long']);
            			
            		    
        			    $INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
        				$underONE_KM=explode(".",$INoneKM);
        				
        				      $birthDate = $row_promoted['birthday'];
                              //explode the date to get month, day and year
                              $birthDate = explode("/", $birthDate);
                              //get age from date or birthdate
                              $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[2]) - 1)
                                : (date("Y") - $birthDate[2]));
                              
            				 $array_out_promoted[] = 
            					//array("code" => "200");
            					array(
            					    	"id" => $row_promoted['id'],
            						"fb_id" => $row_promoted['fb_id'],
            						"first_name" => $row_promoted['first_name'],
            						"last_name" => $row_promoted['last_name'],
            						"birthday" => "$a$row_promotedge",
            						"about_me" => htmlentities($row_promoted['about_me']),
            						"distance" => $underONE_KM[0]." (km)",
            						"gender" => $row_promoted['gender'],
            						"image1" => $row_promoted['image1'],
            						"image2" => $row_promoted['image2'],
            						"image3" => $row_promoted['image3'],
            						"image4" => $row_promoted['image4'],
            						"image5" => $row_promoted['image5'],
            						"image6" => $row_promoted['image6'],
            						"job_title" => $row_promoted['job_title'],
            						"company" => $row_promoted['company'],
            						"school" => $row_promoted['school'],
            						"status" => $row_promoted['status'],
            						"agama" => $row_promoted['agama'],
            						"kota" => $row_promoted['kota'],
            							"very_sukses" => $row_promoted['very_sukses'],
            						"member_vip" => $row_promoted['member_vip'],
            						"like_count" => $row_promoted['like_count'],
            						"provinsi" => $row_promoted['provinsi'],
            						"super_like" => $rd->super_like,
            						"swipe" => $action_type,
            						"block" =>  $profile_block,  //0= normal  1=user blocked and auto logout
									"hide_age" => $row_promoted['hide_age'],
            						"hide_location" => $row_promoted['hide_location'],
            						
            					); 
        			}
        		}
        		
        		
    			
        		$array_out = array();
        		while($row=mysqli_fetch_array($query))
        		{
        		   
        		    
        		     $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' and effect_profile ='".$row['fb_id']."'  ";
        		   //echo  $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' ";
        		   //echo"<br>";
        			$log_in_rs=mysqli_query($conn,$qrry_1);
        			
        			$rd=mysqli_fetch_object($log_in_rs);
    			    //$match_profile= $rd->match_profile;
    			    //echo $rd->effect_profile;
    			    //echo"<br>";
    			    //if($row['fb_id'] != $rd->action_type && $row['fb_id'] != $rd->effect_profile)
    			    if(@$rd->effect_profile != @$row['fb_id'] || (@$rd->effected=="false" && @$rd->match_profile=="false"))
    			    {
    			        
    			       
    			        $action_type=@$rd->action_type;
    			        if($action_type==null)
    			        {
    			            $action_type="false";
    			        }
    			        
    			        
    			        $mylocation=explode(",",$lat_long);
            			$other_profiles=explode(",",$row['lat_long']);
            			
            		    
        			    $INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
        				$underONE_KM=explode(".",$INoneKM);
        				
        				//if($underONE_KM[0]<=$distance)
        			   // {
        				      $birthDate = $row['birthday'];
                              //explode the date to get month, day and year
                              $birthDate = explode("/", $birthDate);
                              //get age from date or birthdate
                              $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[2]) - 1)
                                : (date("Y") - $birthDate[2]));
                            
                              
                              
            				 $array_out[] = 
            					//array("code" => "200");
            					array(
            					    	"id" => $row['id'],
            						"fb_id" => $row['fb_id'],
            						"first_name" => $row['first_name'],
            						"last_name" => $row['last_name'],
            						"birthday" => "$age",
            						"about_me" => htmlentities($row['about_me']),
            						"distance" => $underONE_KM[0]." (km)",
            						"gender" => $row['gender'],
            						"image1" => $row['image1'],
            						"image2" => $row['image2'],
            						"image3" => $row['image3'],
            						"image4" => $row['image4'],
            						"image5" => $row['image5'],
            						"image6" => $row['image6'],
            						"job_title" => $row['job_title'],
            						"company" => $row['company'],
            						"school" => $row['school'],
            							"status" => $row['status'],
            								"agama" => $row['agama'],
            									"kota" => $row['kota'],
            									"member_vip" => $row['member_vip'],
            										"provinsi" => $row['provinsi'],
            										"like_count" => $row['like_count'],
            											"very_sukses" => $row['very_sukses'],
            						"swipe" => $action_type,
            						"block" =>  $profile_block,  //0= normal  1=user blocked and auto logout
									"hide_age" => $row['hide_age'],
            						"hide_location" => $row['hide_location'],
            						
            					); 
        			   // }
        			    
    			    }
        		   	
        		}
				
				
				$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
				$log_in_rs=mysqli_query($conn,$qrry_1);
				
				$rd=mysqli_fetch_object($log_in_rs);
					
				$birthDate = $rd->birthday;
				//explode the date to get month, day and year
				  $birthDate = explode("/", $birthDate);
				  //get age from date or birthdate
				  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
					? ((date("Y") - $birthDate[2]) - 1)
					: (date("Y") - $birthDate[2]));
					
				$query_count_total_like="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and action_type='like' ";
			    $log_in_rs11_count_total_like=mysqli_query($conn,$query_count_total_like);
        	    $count_total_like=mysqli_num_rows($log_in_rs11_count_total_like);
				
				$query_count_total_super_like="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and action_type='superLike' ";
			    $log_in_rs11_count_total_super_like=mysqli_query($conn,$query_count_total_super_like);
        	    $count_total_super_like=mysqli_num_rows($log_in_rs11_count_total_super_like);
        	    
			//	if($purchased=="1")
					if($member_vip=="1")
				
			
				{
				    
		
				    
				    $super_like_limit=PAID_USER_DAILY_SUPERLIKE_LIMIT;
                    $super_like_limit=$super_like_limit-$count_total_super_like;
                    
                    $like_limit=PAID_USER_LIKE_LIMIT;
                    $like_limit=$like_limit-$count_total_like;
				}
				else
				{

				    
				    $super_like_limit=UNPAID_USER_DAILY_SUPERLIKE_LIMIT;
				    
                    $like_limit=UNPAID_USER_LIKE_LIMIT;
                    $like_limit=$like_limit-$count_total_like;
            	}
				
				$array_out_user_info = array();
					
				 $array_out_user_info[] = 
					array(
					    	"id" => $rd->id,
					"about_me" => $rd->about_me,
					"job_title" => $rd->job_title,
					"gender" => $rd->gender,
					"birthday" => $rd->birthday,
					"age" => $age,
					"company" => $rd->company,
					"school" => $rd->school,
					"status" => $rd->status,
						"agama" => $rd->agama,
							"kota" => $rd->kota,
								"provinsi" => $rd->provinsi,
									"like_count" => $rd->like_count,
										"member_vip" => $rd->member_vip,
											"very_sukses" => $rd->very_sukses,
					"promoted" => $rd>promoted,
					"first_name" => $rd->first_name,
					"last_name" => $rd->last_name,
					"image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
					"image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
					"image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
					"image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
					"image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
					"image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
					"like_limit"=>$like_limit,
					"super_like_limit"=>$super_like_limit,
					
					);
				
//jika user empty
// if (mysqli_num_rows($query)==0){
    

//   $distance="100000";
//   if($gender=="all")
// 			    {
// 			        $q= "SELECT *, ( 3959 * acos( cos( radians(".$mylocation[0].") ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians(".$mylocation[1].") ) + sin( radians(".$mylocation[0].") ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE age BETWEEN ".$age_min." AND ".$age_max." and fb_id !=".$fb_id." HAVING distance < ".$distance." ORDER BY distance LIMIT  ".$offset.",".$npage;
// 			        $query=mysqli_query($conn,$q);
// 			        $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 1");
		
// 			    }
// 			    else
// 			    {
			
// 			          $q= "SELECT *, ( 3959 * acos( cos( radians(".$mylocation[0].") ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians(".$mylocation[1].") ) + sin( radians(".$mylocation[0].") ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '".$gender."' AND age BETWEEN ".$age_min." AND ".$age_max." and fb_id !=".$fb_id." HAVING distance < ".$distance." ORDER BY distance LIMIT  ".$offset.",".$npage;
// 			        $query=mysqli_query($conn,$q);
// 			        $promoted=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and promoted='1' HAVING distance < $distance ORDER BY promoted LIMIT 10");
			 
			    
// 			    }
			    
// 			    	$array_out = array();
//         		while($row=mysqli_fetch_array($query))
//         		{
        		   
        		    
//         		     $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' and effect_profile ='".$row['fb_id']."'  ";
//         		   //echo  $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' ";
//         		   //echo"<br>";
//         			$log_in_rs=mysqli_query($conn,$qrry_1);
        			
//         			$rd=mysqli_fetch_object($log_in_rs);
//     			    //$match_profile= $rd->match_profile;
//     			    //echo $rd->effect_profile;
//     			    //echo"<br>";
//     			    //if($row['fb_id'] != $rd->action_type && $row['fb_id'] != $rd->effect_profile)
//     			    if(@$rd->effect_profile != @$row['fb_id'] || (@$rd->effected=="false" && @$rd->match_profile=="false"))
//     			    {
    			        
    			       
//     			        $action_type=@$rd->action_type;
//     			        if($action_type==null)
//     			        {
//     			            $action_type="false";
//     			        }
    			        
    			        
//     			        $mylocation=explode(",",$lat_long);
//             			$other_profiles=explode(",",$row['lat_long']);
            			
            		    
//         			    $INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
//         				$underONE_KM=explode(".",$INoneKM);
        				
//         				//if($underONE_KM[0]<=$distance)
//         			   // {
//         				      $birthDate = $row['birthday'];
//                               //explode the date to get month, day and year
//                               $birthDate = explode("/", $birthDate);
//                               //get age from date or birthdate
//                               $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
//                                 ? ((date("Y") - $birthDate[2]) - 1)
//                                 : (date("Y") - $birthDate[2]));
                            
                              
                              
//             				 $array_out[] = 
//             					//array("code" => "200");
//             					array(
//             					    	"id" => $row['id'],
//             						"fb_id" => $row['fb_id'],
//             						"first_name" => $row['first_name'],
//             						"last_name" => $row['last_name'],
//             						"birthday" => "$age",
//             						"about_me" => htmlentities($row['about_me']),
//             						"distance" => $underONE_KM[0]." (km)",
//             						"gender" => $row['gender'],
//             						"image1" => $row['image1'],
//             						"image2" => $row['image2'],
//             						"image3" => $row['image3'],
//             						"image4" => $row['image4'],
//             						"image5" => $row['image5'],
//             						"image6" => $row['image6'],
//             						"job_title" => $row['job_title'],
//             						"company" => $row['company'],
//             						"school" => $row['school'],
//             							"status" => $row['status'],
//             								"agama" => $row['agama'],
//             									"kota" => $row['kota'],
//             									"member_vip" => $row['member_vip'],
//             										"provinsi" => $row['provinsi'],
//             										"like_count" => $row['like_count'],
//             											"very_sukses" => $row['very_sukses'],
//             						"swipe" => $action_type,
//             						"block" =>  $profile_block,  //0= normal  1=user blocked and auto logout
// 									"hide_age" => $row['hide_age'],
//             						"hide_location" => $row['hide_location'],
            						
//             					); 
//         			   // }
        			    
//     			    }
        		   	
//         		}
				
// }				
//end
			
        		$output=array( "code" => "200", "promoted"=>$array_out_promoted , "msg" => $array_out , "user_info"=> $array_out_user_info);
        		print_r(json_encode($output, true));
        	    
        	    
        	    
        	    
        	    
        		
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in api");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
		    
	    	
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	
		function deleteImages_very_user()
	{
		require_once("config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['image_link']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$image_link=stripslashes(strip_tags($event_json['image_link'] ));
			
			
			mysqli_query($conn,"update users where fb_id='".$fb_id."'   ");
				
	    	$qrry_1="select * from users WHERE fb_id ='".$fb_id."' and very_user='".$image_link."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    
			    
			    if($rd->very_user==$image_link)
			    {
			        $colum_name="very_user";
			    }
			    
			    
			    $qrry_1="update users SET $colum_name ='' WHERE fb_id ='".$fb_id."' ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in delete");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			} 
			
			
		}
		else
		{
			$array_out = array();
					
					 $array_out[] = 
						array(
						"response" =>"Json Parem are missing");
					
					$output=array( "code" => "201", "msg" => $array_out);
					print_r(json_encode($output, true));
		}
		
	}
	
	function deleteImages()
	{
		require_once("config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['image_link']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$image_link=stripslashes(strip_tags($event_json['image_link'] ));
			
			
			mysqli_query($conn,"update users where fb_id='".$fb_id."'   ");
				
	    	$qrry_1="select * from users WHERE fb_id ='".$fb_id."' and image1='".$image_link."' OR image2='".$image_link."' OR image3='".$image_link."' OR image4='".$image_link."' OR image5='".$image_link."' OR image6='".$image_link."' OR very_user='".$image_link."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    
			    if($rd->image2==$image_link)
			    {
			        $colum_name="image2";
			    }
			    else
			    if($rd->image3==$image_link)
			    {
			        $colum_name="image3";
			    }
			    else
			    if($rd->image1==$image_link)
			    {
			        $colum_name="image1";
			    }
			    else
			    if($rd->image4==$image_link)
			    {
			        $colum_name="image4";
			    }
			    else
			    if($rd->image5==$image_link)
			    {
			        $colum_name="image5";
			    }
			    else
			    if($rd->image6==$image_link)
			    {
			        $colum_name="image6";
			    }
			  
			    
			    
			    $qrry_1="update users SET $colum_name ='' WHERE fb_id ='".$fb_id."' ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in delete");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			} 
			
			
		}
		else
		{
			$array_out = array();
					
					 $array_out[] = 
						array(
						"response" =>"Json Parem are missing");
					
					$output=array( "code" => "201", "msg" => $array_out);
					print_r(json_encode($output, true));
		}
		
	}
	
	
	
	function show_or_hide_profile()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['status']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
		    
		    $hide_age=stripslashes(strip_tags($event_json['hide_age']));
            $hide_location=stripslashes(strip_tags($event_json['hide_location']));

			$qrry_1="update users SET hide_me ='".$status."' , hide_age='".$hide_age."' , hide_location='".$hide_location."' WHERE fb_id ='".$fb_id."' ";
			if(mysqli_query($conn,$qrry_1))
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"success");
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in uploading");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
		}
	    
	    
	}
	
	
	
	
	
	//admin panel functions
	
	function banned_user()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	
		
		if(isset($event_json['fb_id']) )
		{
			$fb_id=strip_tags($event_json['fb_id']);
			$block=strip_tags($event_json['block']);
		
			$qrry_1="update users SET block ='".$block."' where fb_id='".$fb_id."' ";
			if(mysqli_query($conn,$qrry_1))
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"success");
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}       
	}
	
	
	function All_ReportedUsers()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		$query=mysqli_query($conn,"select * from flag_user order by id DESC");
		        
		$array_out = array();
		while($row=mysqli_fetch_array($query))
		{   
		    
		    $qrry_1="select * from users WHERE fb_id ='".$row['user_id']."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			$rd=mysqli_fetch_object($log_in_rs);
			
			$qrry_11="select * from users WHERE fb_id ='".$row['flag_by']."' ";
			$log_in_rs1=mysqli_query($conn,$qrry_11);
			
			$rd1=mysqli_fetch_object($log_in_rs1);
			    
		    $array_out[] = 
			array(
				"fb_id" => $rd->fb_id,
				"first_name" => htmlentities($rd->first_name),
				"last_name" => htmlentities($rd->last_name),
				"block" => $rd->block,
				"flag_by"=>
    				array(
        				"fb_id" => $rd1->fb_id,
        				"first_name" => htmlentities($rd1->first_name),
        				"last_name" => htmlentities($rd1->last_name),
        			),
			);
			
		}
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	}
	
	
	function All_Users()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		$query=mysqli_query($conn,"select * from users order by id DESC");
		        
		$array_out = array();
		while($row=mysqli_fetch_array($query))
		{   
		    
		     $array_out[] = 
				array(
					"fb_id" => $row['fb_id'],
					//"first_name" => htmlentities($row['first_name']),
					"first_name" => $row['first_name'],
					"last_name" => $row['last_name'],
					"birthday" => $row['birthday'],
					"about_me" => htmlentities($row['about_me']),
					"location" => $row['lat_long'],
					"purchased" => $row['purchased'],
					"gender" => $row['gender'],
					"image1" => $row['image1'],
					"image2" => $row['image2'],
					"image3" => $row['image3'],
					"image4" => $row['image4'],
					"image5" => $row['image5'],
					"image6" => $row['image6'],
					"like_count" => $row['like_count'],
					"dislike_count" => $row['dislike_count'],
					"created" => $row['created'],
					
				);
			
		}
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	    
	}
	
	
	function setupData()
	{
	    die();
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
        $query=mysqli_query($conn,"select * from users where image2!='' and image3!='' order by id ");
		        
		$array_out = array();
		while($row=mysqli_fetch_array($query))
		{   
		    
		    //Remote image URL
            $image2 = $row['image2'];
            //$url3= $row['image3'];
            
            ?>
                <img src="<?php echo $image2;?>" width="150px">
                <!--<img src="<?php echo $url3;?>" width="150px">-->
            <?php
            
            // $image_info = getimagesize($image2);
            // //print_r($image_info);
            // echo count($image_info);
            
            if(count($image_info)=="1")
            {
                echo"<span style='color:red;'>not exist</span>";
                echo " <br>";
            }
            else
            {
               // echo"<span style='color:green;'>image exist</span> <br>";
                
                //echo $img2 = 'images/'.$row['fb_id']."_".rand().".jpg";
                
                //echo $image2;
                //Save image
                // $ch = curl_init($image2);
                // $fp = fopen($img2, 'wb');
                // curl_setopt($ch, CURLOPT_FILE, $fp);
                // curl_setopt($ch, CURLOPT_HEADER, 0);
                // curl_exec($ch);
                // curl_close($ch);
                // fclose($fp);
                
                //mysqli_query($conn,"update users SET image2 ='".$img2."' where fb_id='".$row['fb_id']."'  ");
            }
            
            // Image path
            //$img = 'images/'.$row['fb_id']."_".rand().".jpg";
            
            // Save image
            // $ch = curl_init($url);
            // $fp = fopen($img, 'wb');
            // curl_setopt($ch, CURLOPT_FILE, $fp);
            // curl_setopt($ch, CURLOPT_HEADER, 0);
            // curl_exec($ch);
            // curl_close($ch);
            // fclose($fp);
            
            // mysqli_query($conn,"update users SET image1 ='".$img."' where fb_id='".$row['fb_id']."'  ");
		     
		     
		  //   $image_info = getimagesize($row['image1']);
    //          //print_r($image_info);
    //          echo count($image_info);
            
    //         if(count($image_info)=="1")
    //         {
    //             echo"<span style='color:red;'>delete ac</span>";
    //             echo unlink($row['image1']);
    //             echo mysqli_query($conn,"Delete from users where image1='".$row['image1']."'  ");
    //             echo " <br>";
    //         }
    //         else
    //         {
    //             echo"<span style='color:green;'>image exist</span> <br>";
    //         }
            
            
            
		   	 $array_out[] = 
				array(
					"fb_id" => $row['fb_id'],
					//"first_name" => htmlentities($row['first_name']),
					"first_name" => $row['first_name'],
					"last_name" => $row['last_name'],
					"birthday" => $row['birthday'],
					"about_me" => htmlentities($row['about_me']),
					"location" => $row['lat_long'],
					"purchased" => $row['purchased'],
					"gender" => $row['gender'],
					"image1" => $row['image1'],
					"image2" => $row['image2'],
					"image3" => $row['image3'],
					"image4" => $row['image4'],
					"image5" => $row['image5'],
					"image6" => $row['image6'],
					"like_count" => $row['like_count'],
					"dislike_count" => $row['dislike_count'],
					"created" => $row['created'],
					
				);
			
		}
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	    
	}
	
	
	function fake_profiles()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		$query=mysqli_query($conn,"select * from users where profile_type='fake' order by id DESC");
		        
		$array_out = array();
		while($row=mysqli_fetch_array($query))
		{
		     
		   	 $array_out[] = 
				array(
					"fb_id" => $row['fb_id'],
					//"first_name" => htmlentities($row['first_name']),
					"first_name" => $row['first_name'],
					"last_name" => $row['last_name'],
					"birthday" => $row['birthday'],
					"about_me" => htmlentities($row['about_me']),
					"location" => $row['lat_long'],
					"purchased" => $row['purchased'],
					"gender" => $row['gender'],
					"image1" => $row['image1'],
					"image2" => $row['image2'],
					"image3" => $row['image3'],
					"image4" => $row['image4'],
					"image5" => $row['image5'],
					"image6" => $row['image6'],
					"like_count" => $row['like_count'],
					"dislike_count" => $row['dislike_count'],
					"created" => $row['created'],
					
				);
			
		}
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	}
	
	function Admin_Login()
	{   
	   	require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['email']) && isset($event_json['password']) )
		{
			$email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
			$password=strip_tags($event_json['password']);
		
			
			$log_in="select * from admin where email='".$email."' and pass='".md5($password)."' ";
			$log_in_rs=mysqli_query($conn,$log_in);
			
			if(mysqli_num_rows($log_in_rs))
			{
				$array_out = array();
				 $array_out[] = 
					//array("code" => "200");
					array(
						"response" => "login success"
					);
				
				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}	
			else
			{
			    
    			$array_out = array();
    					
        		 $array_out[] = 
        			array(
        			"response" =>"Error in login");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	
	
	
	
	
	
	function All_Matched_Profile()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		$query=mysqli_query($conn,"select * from like_unlike where match_profile='true' order by id DESC ");
		        
		$array_out = array();
		while($row=mysqli_fetch_array($query))
		{
		   	 $array_out[] = 
				array(
					"id" => $row['id'],
					"action_profile" => $row['action_profile'],
					"effect_profile" => $row['effect_profile']
				);
			
		}
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	    
	}
	
	
	function changePassword()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    //print_r($event_json);
		
		if(isset($event_json['new_password']) && isset($event_json['old_password']))
		{
			$old_password=strip_tags($event_json['old_password']);
			$new_password=strip_tags($event_json['new_password']);
		
		    $qrry_1="select * from admin where pass ='".md5($old_password)."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			$rd=mysqli_fetch_object($log_in_rs);
			
			if($rd->id!="")
			{
			    //$qrry_1="update admin SET pass ='".md5($new_password)."' where id='".$rd->id."'  ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in updating");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
	
	function getProfilePictures()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			//$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
			
			
			$qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"first_name" => htmlentities($rd->first_name),
					"last_name" => htmlentities($rd->last_name),
					"birthday" => $rd->birthday,
					"gender" => $rd->gender,
					"purchased" => $rd->purchased,
					"version" => $rd->version,
					"block" => $rd->block,
					"device" => $rd->device,
					"hide_me" => $rd->hide_me,
					"about_me" => htmlentities($rd->about_me),
					"location" => $rd->location,
					"profile_type" => $rd->profile_type,
					"like_count" => $rd->like_count,
					"dislike_count" => $rd->dislike_count,
					"image1" => stripslashes($rd->image1),
					"image2" => stripslashes($rd->image2),
        			"image3" => stripslashes($rd->image3),
        			"image4" => stripslashes($rd->image4),
        			"image5" => stripslashes($rd->image5),
        			"image6" => stripslashes($rd->image6),
        			"created" => $rd->created
        			);
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
	function getProfilelikes()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['status']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
			
			
			$qrry_1="select * from like_unlike WHERE effect_profile ='".$fb_id."' and action_type='".$status."' and effected='true' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			$array_out = array();
    		while($row=mysqli_fetch_array($log_in_rs))
    		{
    		    $qrry_11="select * from users WHERE fb_id ='".$row['action_profile']."' ";
    			$log_in_rs1=mysqli_query($conn,$qrry_11);
    			
    			while($row1=mysqli_fetch_array($log_in_rs1))
        		{
        		    
    		        $array_out[] = 
    				array(
    					"action_profile" => $row['action_profile'],
    					"profile_info" => 
    					array(
    					        "fb_id" => $row1['fb_id'],
    					        "first_name" => htmlentities($row1['first_name']),
    					        "image1" => htmlspecialchars_decode(stripslashes($row1['image1'])),
    					        "last_name" => htmlentities($row1['last_name']),
    					        "like_count" => $row1['like_count'],
    					        "dislike_count" => $row1['dislike_count']
    					    ),
    					
    				);
    		    
        		}
    			
    		}
    		$output=array( "code" => "200", "msg" => $array_out);
    		print_r(json_encode($output, true));
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}
	
	function getmatchedprofiles()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) )
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			
			$qrry_1="select * from like_unlike WHERE effect_profile ='".$fb_id."' and match_profile='true' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			$array_out = array();
    		while($row=mysqli_fetch_array($log_in_rs))
    		{
    		    $qrry_11="select * from users WHERE fb_id ='".$row['action_profile']."' ";
    			$log_in_rs1=mysqli_query($conn,$qrry_11);
    			
    			while($row1=mysqli_fetch_array($log_in_rs1))
        		{
        		    
    		        $array_out[] = 
    				array(
    					"action_profile" => $row['action_profile'],
    					"profile_info" => 
    					array(
    					        "fb_id" => $row1['fb_id'],
    					        "image1" => htmlspecialchars_decode(stripslashes($row1['image1'])),
    					        "first_name" => htmlentities($row1['first_name']),
    					        "last_name" => htmlentities($row1['last_name']),
    					        "like_count" => $row1['like_count'],
    					        "dislike_count" => $row1['dislike_count']
    					    ),
    					
    				);
    		    
        		}
    			
    		}
    		$output=array( "code" => "200", "msg" => $array_out);
    		print_r(json_encode($output, true));
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	    
	}

    
	function update_purchase_Status()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
	    
	    $qrry_1="update users SET purchased ='1' WHERE fb_id ='".$fb_id."' ";
		if(mysqli_query($conn,$qrry_1))
		{
		    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"update succesfully");
		}
	    
    	$output=array( "code" => "202", "msg" => $array_out);
		print_r(json_encode($output, true));
	    
	} 
	
	
	function get_profiles_nameByID()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=$event_json['fb_id'];
	    
	    
	    $query="select * from users where fb_id IN (".$fb_id.") order by fb_id ";
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($row1=mysqli_fetch_array($log_in_rs1))
		{
		    $array_out[] = 
				array(
					"fb_id" => $row1['fb_id'],
					"first_name" => htmlentities($row1['first_name']),
					"last_name" => htmlentities($row1['last_name'])
				);
		}
	    
    	$output=array( "code" => "202", "msg" => $array_out);
		print_r(json_encode($output, true));
	    
	} 
	
	function myMatch()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=$event_json['fb_id'];
	    
		$query1="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and (action_type='superLike' or action_type='like') order by rand() ";
		
	    $log_in_rs11=mysqli_query($conn,$query1);
	    $array_out1 = array();
	    while($row11=mysqli_fetch_array($log_in_rs11))
		{
		    $query_11="select * from users where fb_id ='".$row11['action_profile']."' ";
	        $log_in_rs1_1_1=mysqli_query($conn,$query_11);
		    $rd_1=mysqli_fetch_object($log_in_rs1_1_1); 
		    
		    $query1_2="select * from users where fb_id ='".$row11['effect_profile']."' ";
	        $log_in_rs11_2=mysqli_query($conn,$query1_2);
		    $rd1_2=mysqli_fetch_object($log_in_rs11_2); 
		    
		    $array_out1[] = 
				array(
					"action_profile" => $row11['action_profile'],
					"action_profile_name"=> array
					(
					    "image1" => htmlentities($rd_1->image1),
					    "first_name" => htmlentities($rd_1->first_name),
					    "last_name" => htmlentities($rd_1->last_name)
					)
				);
		}
		
		$userWhoLikeMe=$arrryy[] = 
			array(
				"total" => count($array_out1),
				"image1" =>$array_out1[0]['action_profile_name']['image1']
			);
	    
	    $query="select * from like_unlike where action_profile ='".$fb_id."' and match_profile='true' and chat='false' ";
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($row1=mysqli_fetch_array($log_in_rs1))
		{
		    $query="select * from users where fb_id ='".$row1['action_profile']."' ";
	        $log_in_rs1_1=mysqli_query($conn,$query);
		    $rd=mysqli_fetch_object($log_in_rs1_1); 
		    
		    $query1="select * from users where fb_id ='".$row1['effect_profile']."' ";
	        $log_in_rs11=mysqli_query($conn,$query1);
		    $rd1=mysqli_fetch_object($log_in_rs11); 
		    
		    $array_out[] = 
				array(
					"action_profile" => $row1['action_profile'],
					"action_profile_name"=> array
					(
					    "image1" => htmlentities($rd->image1),
					    "first_name" => htmlentities($rd->first_name),
					    "last_name" => htmlentities($rd->last_name)
					),
					"effect_profile" => htmlentities($row1['effect_profile']),
					"effect_profile_name"=> array
					(
					    "image1" => htmlentities($rd1->image1),
					    "first_name" => htmlentities($rd1->first_name),
					    "last_name" => htmlentities($rd1->last_name)
					)
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out , "myLikes"=>$userWhoLikeMe);
		print_r(json_encode($output, true));
		
	}
	
	

	
	
	function mylikiesCount()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=$event_json['fb_id'];
	    $lat_long=strip_tags($event_json['lat_long']);
		
		
		
		//remove after fetch
        	    
    	    $headers = array(
    		"Accept: application/json",
    		"Content-Type: application/json"
        	);
        	
        	$data = array();
        	
        	$ch = curl_init($firebaseDb_URL.'/.json');
        	
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	
        	$return = curl_exec($ch);
        	
        	$json_data = json_decode($return, true);
        	
        	$datacount=@count($json_data);
			if($datacount!="0")
			{
				foreach ($json_data as $key => $item) 
				{
					foreach ($item as $key1 => $item1)
					{
						
					 
						if(!isset($item1['fetch']))
						{
						   
						   //print_r($item1['match']);
    						 if($item1['match']=="false")
    						 {
    							 $match= "false";
    						 }
    						 
    						 if($item1['match']=="true")
    						 {
    							 $match= "true";
    						 }
    						 
    						 $effeted=$item1['effect'];
    						 
    						 
							 
							$qrry_1="select * from like_unlike where action_profile ='".$key."' and effect_profile ='".$key1."' ";
							$log_in_rs=mysqli_query($conn,$qrry_1);
							if(mysqli_num_rows($log_in_rs))
							{
							   mysqli_query($conn,"update like_unlike SET match_profile ='true' WHERE action_profile ='".$key."' and effect_profile ='".$key1."' ");
							   //echo "update 1";
							}
							else
							{
								$qrry_1="insert into like_unlike (action_profile,effect_profile,action_type,match_profile,effected)values(";
								$qrry_1.="'".$key."',";
								$qrry_1.="'".$key1."',";
								$qrry_1.="'".$item1['type']."',";
								$qrry_1.="'".$match."',";
								$qrry_1.="'".$effeted."'";
								$qrry_1.=")";
								if(mysqli_query($conn,$qrry_1))
								{
									if($item1['type']=="like" && $item1['effect']=="true")
									{
										$qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}
										
									 }
									else
									if($item1['type']=="dislike" && $item1['effect']=="true")
									{
										$qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}
										
										
									}
									
								   
								} 
								
								
							}
						 
							
						}
						 
						
					}
				}
			}
        	
        	//Delete firebase db data after insert
        	
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	
        	$return = curl_exec($ch);
        	
        	$json_data = json_decode($return, true);
        	
        	
        	$curl_error = curl_error($ch);
        	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	//end--------------------------------------------------------------------
			
			
		
		$query1="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and (action_type='superLike' or action_type='like')";
		
	    $log_in_rs11=mysqli_query($conn,$query1);
	    $array_out1 = array();
	    while($row11=mysqli_fetch_array($log_in_rs11))
		{	
		
			
			  
			$query="select * from users where fb_id ='".$row11['action_profile']."' ";
	        $rows=mysqli_query($conn,$query);
		    $rd1=mysqli_fetch_object($rows); 
			
			
			$mylocation=explode(",",$lat_long);
			$other_profiles=explode(",",$rd1->lat_long);
			
			
			$INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
			$underONE_KM=explode(".",$INoneKM);
			
			
			
			 $birthDate = $rd1->birthday;
			  //explode the date to get month, day and year
			  $birthDate = explode("/", $birthDate);
			  //get age from date or birthdate
			  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));
				
			 $array_out1[] = 
				//array("code" => "200");
				array(
				    	"id" => $rd1->id,
					"fb_id" => $rd1->fb_id,
					"first_name" => $rd1->first_name,
					"last_name" => $rd1->last_name,
					"birthday" => $age,
					"about_me" => htmlentities($rd1->about_me),
					"distance" => $underONE_KM[0]." (km)",
					"gender" => $rd1->gender,
					"image1" => $rd1->image1,
					"image2" => $rd1->image2,
					"image3" => $rd1->image3,
					"image4" => $rd1->image4,
					"image5" => $rd1->image5,
					"image6" => $rd1->image6,
					"job_title" => $rd1->job_title,
					"company" => $rd1->company,
					"status" => $rd1->status,
						"agama" => $rd1->agama,
							"kota" => $rd1->kota,
								"provinsi" => $rd1->provinsi,
									"very_sukses" => $rd1->very_sukses,
					"swipe" =>$row11['action_type'],
					
					"school" => $rd1->school
					
				);
			////////	
					
		    /*$query_11="select * from users where fb_id ='".$row11['action_profile']."' ";
	        $log_in_rs1_1_1=mysqli_query($conn,$query_11);
		    $rd_1=mysqli_fetch_object($log_in_rs1_1_1); 
		    
		    $query1_2="select * from users where fb_id ='".$row11['effect_profile']."' ";
	        $log_in_rs11_2=mysqli_query($conn,$query1_2);
		    $rd1_2=mysqli_fetch_object($log_in_rs11_2); 
		    
		    $array_out1[] = 
				array(
					"action_profile" => $row11['action_profile'],
					"action_profile_name"=> array
					(
					    "image1" => htmlentities($rd_1->image1),
					    "first_name" => htmlentities($rd_1->first_name),
					    "last_name" => htmlentities($rd_1->last_name)
					)
				);*/
		}
		
		$output=array( "code" => "200", "msg" => $array_out1);
		print_r(json_encode($output, true));
		
	}
	
		function mylikies()
	{

	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);

	    $fb_id=$event_json['fb_id'];
	    $lat_long=strip_tags($event_json['lat_long']);



		//remove after fetch

    	    $headers = array(
    		"Accept: application/json",
    		"Content-Type: application/json"
        	);

        	$data = array();

        	$ch = curl_init($firebaseDb_URL.'/.json');

        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        	$return = curl_exec($ch);

        	$json_data = json_decode($return, true);

        	$datacount=@count($json_data);
			if($datacount!="0")
			{
				foreach ($json_data as $key => $item)
				{
					foreach ($item as $key1 => $item1)
					{


						if(!isset($item1['fetch']))
						{

						   //print_r($item1['match']);
    						 if($item1['match']=="false")
    						 {
    							 $match= "false";
    						 }

    						 if($item1['match']=="true")
    						 {
    							 $match= "true";
    						 }

    						 $effeted=$item1['effect'];



				     		$qrry_1="select * from like_unlike where action_profile ='".$key."' and effect_profile ='".$key1."' ";
							
					
							$log_in_rs=mysqli_query($conn,$qrry_1);
							if(mysqli_num_rows($log_in_rs))
							{
							   mysqli_query($conn,"update like_unlike SET match_profile ='true' WHERE action_profile ='".$key."' and effect_profile ='".$key1."' ");
							   //echo "update 1";
							 
							   
							}
							else
							{
								$qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected)values(";
								$qrry_1.="'".$key."',";
								$qrry_1.="'".$key1."',";
								$qrry_1.="'".$item1['type']."',";
								$qrry_1.="'".$match."',";
								$qrry_1.="'".$effeted."'";
								$qrry_1.=")";
								if(mysqli_query($conn,$qrry_1))
								{
									if($item1['type']=="like" && $item1['effect']=="true")
									{
										$qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}

									 }
									else
									if($item1['type']=="dislike" && $item1['effect']=="true")
									{
										$qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key1."' ";
										if(mysqli_query($conn,$qrry_1))
										{
											//echo "udpate";
										}


									}


								}


							}


						}


					}
				}
			}

        	//Delete firebase db data after insert

        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        	$return = curl_exec($ch);

        	$json_data = json_decode($return, true);


        	$curl_error = curl_error($ch);
        	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	//end--------------------------------------------------------------------



		$query1="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and (action_type='superLike' or action_type='like')";

	    $log_in_rs11=mysqli_query($conn,$query1);
	    $array_out1 = array();
	    while($row11=mysqli_fetch_array($log_in_rs11))
		{



			$query="select * from users where fb_id ='".$row11['action_profile']."' ";
	        $rows=mysqli_query($conn,$query);
		    $rd1=mysqli_fetch_object($rows);


			$mylocation=explode(",",$lat_long);
			$other_profiles=explode(",",$rd1->lat_long);


			$INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
			$underONE_KM=explode(".",$INoneKM);



			 $birthDate = $rd1->birthday;
			  //explode the date to get month, day and year
			  $birthDate = explode("/", $birthDate);
			  //get age from date or birthdate
			  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));

			 $array_out1[] =
				//array("code" => "200");
				array(
				    "id" => $rd1->id,
					"fb_id" => $rd1->fb_id,
					"first_name" => $rd1->first_name,
					"last_name" => $rd1->last_name,
					"birthday" => $age,
					"about_me" => htmlentities($rd1->about_me),
					"distance" => $underONE_KM[0]." miles away",
					"gender" => $rd1->gender,
					"image1" => $rd1->image1,
					"image2" => $rd1->image2,
					"image3" => $rd1->image3,
					"image4" => $rd1->image4,
					"image5" => $rd1->image5,
					"image6" => $rd1->image6,
					"job_title" => $rd1->job_title,
					"company" => $rd1->company,
						"very_sukses" => $rd1->very_sukses,
					"swipe" =>$row11['action_type'],
					"school" => $rd1->school
				);
			////////

		    /*
		    $query_11="select * from users where fb_id ='".$row11['action_profile']."' ";
	        $log_in_rs1_1_1=mysqli_query($conn,$query_11);
		    $rd_1=mysqli_fetch_object($log_in_rs1_1_1);

		    $query1_2="select * from users where fb_id ='".$row11['effect_profile']."' ";
	        $log_in_rs11_2=mysqli_query($conn,$query1_2);
		    $rd1_2=mysqli_fetch_object($log_in_rs11_2);

		    $array_out1[] =
				array(
					"action_profile" => $row11['action_profile'],
					"action_profile_name"=> array
					(
					    "image1" => htmlentities($rd_1->image1),
					    "first_name" => htmlentities($rd_1->first_name),
					    "last_name" => htmlentities($rd_1->last_name)
					)
				);
//				*/
		}

		$output=array( "code" => "200", "msg" => $array_out1);
		print_r(json_encode($output, true));

	}
		
	
	
	function firstchat()
	{
	    
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
	    $effected_id=htmlspecialchars(strip_tags($event_json['effected_id'] , ENT_QUOTES));
	    
	    $qrry_1="update like_unlike SET chat ='true' WHERE action_profile ='".$fb_id."' and effect_profile ='".$effected_id."' ";
	    mysqli_query($conn,"update like_unlike SET chat ='true' WHERE action_profile ='".$effected_id."' and effect_profile ='".$fb_id."'");
		if(mysqli_query($conn,$qrry_1))
		{
		    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"update succesfully");
		}
	    
    	$output=array( "code" => "202", "msg" => $array_out);
		print_r(json_encode($output, true));
	    
	}
	
	
	function unMatch()
	{
	    
    	
    	
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $fb_id=$event_json['fb_id'];
	    $other_id=$event_json['other_id'];
	    
	    
	    
	    //remove from my inbox
        	    
	    $headers = array(
		"Accept: application/json",
		"Content-Type: application/json"
    	);
    	
    	$data = array();
    	
    
    	$url= $firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/'.$other_id.'/.json';
    	$ch = curl_init($url);
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	//delete from other user inbox as well
    	$data = array();
    	
    	$url=$firebaseDb_URL_MainDb.'/Inbox/'.$other_id.'/'.$fb_id.'/.json';
    	$ch = curl_init($url);
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	
	    mysqli_query($conn,"Delete from like_unlike where action_profile ='".$fb_id."' and effect_profile='".$other_id."'  ");
	    mysqli_query($conn,"Delete from like_unlike where effect_profile ='".$fb_id."' and action_profile='".$other_id."'  ");
	    
	    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"update succesfully");
	        
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
		
	}
	
	function deleteAccount()
	{
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	     $id_user=$event_json['id_user'];
	    $fb_id=$event_json['fb_id'];
	    $id=$event_json['id'];
	    
	  mysqli_query($conn,"Delete from transaksi where id_user ='".$id_user."' ");
	//   Delete from transaksi where id_user=id_user;
	    //remove from my inbox
        	    
	    $headers = array(
		"Accept: application/json",
		"Content-Type: application/json"
    	);
    	
    	$data = array();
    	
    
    	$url= $firebaseDb_URL_MainDb.'/Users/'.$fb_id.'/.json';
    	$ch = curl_init($url);
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	//delete from other user inbox as well
    	$data = array();
    	
    	$url=$firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/.json';
    	$ch = curl_init($url);
    	
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	
    	$return = curl_exec($ch);
    	
    	$json_data = json_decode($return, true);
    	
    	foreach ($json_data as $key => $item) 
    	{
    	    //echo $key;
    	    //remove chat from my inbox
	    	$data = array();
	    	$url=$firebaseDb_URL_MainDb.'/chat/'.$fb_id.'-'.$key.'/.json';
        	$ch = curl_init($url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	$return = curl_exec($ch);
        	$json_data = json_decode($return, true);
        	    
        	        //remove from my Inbox
                    	$data = array();
                    	$url=$firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/'.$key.'/.json';
                    	$ch = curl_init($url);
                    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    	$return = curl_exec($ch);
                    	$json_data = json_decode($return, true);
                    	
                    //remove from other person Inbox
                    	$data = array();
                    	$url=$firebaseDb_URL_MainDb.'/Inbox/'.$key.'/'.$fb_id.'/.json';
                    	$ch = curl_init($url);
                    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    	$return = curl_exec($ch);
                    	$json_data = json_decode($return, true);    	
        	    
        	//remove chat from oter inbox
        	$data = array();
	    	$url=$firebaseDb_URL_MainDb.'/chat/'.$key.'-'.$fb_id.'/.json';
        	$ch = curl_init($url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	$return = curl_exec($ch);
        	$json_data = json_decode($return, true);
    	}
    	
    	
    	
    	
    	mysqli_query($conn,"Delete from like_unlike where action_profile ='".$fb_id."' ");
	    mysqli_query($conn,"Delete from like_unlike where effect_profile ='".$fb_id."' ");
	    mysqli_query($conn,"Delete from users where fb_id ='".$fb_id."' ");
	     mysqli_query($conn,"Delete from transaksi where id_user ='".$id_user."' ");
	    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Delete succesfully");
	        
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	}
	
	 
	 function under_review_new_uploaded_pictures()
	 {
	     
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    $query="select * from user_images ";
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($row1=mysqli_fetch_array($log_in_rs1))
		{
		    
		    $query1="select * from users where fb_id ='".$row1['fb_id']."' ";
	        $log_in_rs11=mysqli_query($conn,$query1);
		    $rd=mysqli_fetch_object($log_in_rs11); 
		    
		    $array_out[] = 
				array(
					"id" => $row1['id'],
					"fb_id" => $row1['fb_id'],
					"image_url" => $row1['image_url'],
					"created_time" => $row1['created_time'],
					"first_name" => $rd->first_name,
					"last_name" => $rd->last_name,
					"columName" => $row1['columName']
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	 }
	 
	 
	 function underReviewPictureStatusChange()
	 {
	     
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
	    $action=htmlspecialchars(strip_tags($event_json['action'] , ENT_QUOTES));
	    $id=htmlspecialchars(strip_tags($event_json['id'] , ENT_QUOTES));
	    $columName=htmlspecialchars(strip_tags($event_json['columName'] , ENT_QUOTES));
	    $imgurl=urldecode($event_json['imgurl']);
	    
	    //print_r($event_json);
	    
	    if($action=="approve")
	    {
	       mysqli_query($conn,"Delete from user_images where id ='".$id."'  "); 
	    }
	    else
	    if($action=="delete")
	    {
	        
	       	mysqli_query($conn,"update users SET image1 ='' WHERE image1 ='".$imgurl."' ");
	       	mysqli_query($conn,"update users SET image2 ='' WHERE image2 ='".$imgurl."' ");
	       	mysqli_query($conn,"update users SET image3 ='' WHERE image3 ='".$imgurl."' ");
	       	mysqli_query($conn,"update users SET image4 ='' WHERE image4 ='".$imgurl."' ");
	       	mysqli_query($conn,"update users SET image5 ='' WHERE image5 ='".$imgurl."' ");
	       	mysqli_query($conn,"update users SET image6 ='' WHERE image6 ='".$imgurl."' ");
	       	
    		mysqli_query($conn,"Delete from user_images where id ='".$id."'  "); 
	    }
	    
	    $array_out = array();
		 $array_out[] = 
			//array("code" => "200");
			array(
			"response" =>"successful");
		
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	   
	 }
	 
	 function matchNow()
	 {
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['fb_id']) && isset($event_json['my_id']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$my_id=htmlspecialchars(strip_tags($event_json['my_id'] , ENT_QUOTES));
			
			$qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected,chat)values(";
			$qrry_1.="'".$my_id."',";
			$qrry_1.="'".$fb_id."',";
			$qrry_1.="'like',";
			$qrry_1.="'false',";
			$qrry_1.="'true',";
			$qrry_1.="'false'";
			$qrry_1.=")";
			if(mysqli_query($conn,$qrry_1))
			{
			    
			    $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected,chat)values(";
    			$qrry_1.="'".$fb_id."',";
    			$qrry_1.="'".$my_id."',";
    			$qrry_1.="'like',";
    			$qrry_1.="'false',";
    			$qrry_1.="'false',";
    			$qrry_1.="'false'";
    			$qrry_1.=")";
    			if(mysqli_query($conn,$qrry_1))
    			{
			         $array_out = array();
    				 $array_out[] = 
    					//array("code" => "200");
    					array(
            			"response" =>"successful");
    				
    				$output=array( "code" => "200", "msg" => $array_out);
    				print_r(json_encode($output, true));
    			}
			}
			else
			{
			    //echo mysqli_error();
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in signup");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	 }
	 
	 
	 function convertProfile()
	 {
	    require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
	    $profile_type=htmlspecialchars(strip_tags($event_json['profile_type'] , ENT_QUOTES));
	    
	    mysqli_query($conn,"update users SET profile_type ='".$profile_type."' WHERE fb_id ='".$fb_id."' ");
	    
	    $array_out = array();
		 $array_out[] = 
			//array("code" => "200");
			array(
			"response" =>"successful");
		
		$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
	 }
	 
	 
	 function addFakeProfile()
	 {
	     require_once("config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		
		if(isset($event_json['fb_id']) && isset($event_json['first_name']) && isset($event_json['last_name']))
		{
			$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
			$first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
			$last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
			$birthday=$event_json['birthday'];
			$gender=htmlspecialchars(strip_tags($event_json['gender'] , ENT_QUOTES));
			$image1=htmlspecialchars_decode(stripslashes($event_json['image1']));
			$image2=htmlspecialchars_decode(stripslashes($event_json['image2']));
			$image3=htmlspecialchars_decode(stripslashes($event_json['image3']));
			$profile_type=htmlspecialchars_decode(stripslashes($event_json['profile_type']));
		    
		    
		     if($birthday=="")
		     {
		         $birthday = "01/01/2000";
		     }
		     else
		     {
		         $birthday = $birthday;
		     }
		     
		     if($profile_type=="")
		     {
		         $profile_type = "user";
		     }
		     else
		     {
		         $profile_type = "fake";
		     }
		     
            //echo $birthDate;
           
			$log_in="select * from users where fb_id='".$fb_id."' ";
			$log_in_rs=mysqli_query($conn,$log_in);
			
			if(mysqli_num_rows($log_in_rs))
			{   
			    $rd=mysqli_fetch_object($log_in_rs);  
			    $age="".calculateAge($rd->birthday)."";
			    
				$array_out = array();
				 $array_out[] = 
					//array("code" => "200");
					array(
						"fb_id" => $fb_id,
						"action" => "login",
						"image1" => $image1,
						"image2" => $image2,
						"image3" => $image3,
						"first_name" => $first_name,
						"last_name" => $last_name,
						"age" => $age,
						"birthday" => $rd->birthday,
						"gender" => $gender
					);
				
				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}	
			else
			{
			    $qrry_1="insert into users(fb_id,first_name,last_name,birthday,image1,image2,image3,profile_type,gender)values(";
    			$qrry_1.="'".$fb_id."',";
    			$qrry_1.="'".$first_name."',";
    			$qrry_1.="'".$last_name."',";
    			$qrry_1.="'".$birthday."',";
    			$qrry_1.="'".$image1."',";
    			$qrry_1.="'".$image2."',";
    			$qrry_1.="'".$image3."',";
    			$qrry_1.="'".$profile_type."',";
    			$qrry_1.="'".$gender."'";
    			$qrry_1.=")";
    			if(mysqli_query($conn,$qrry_1))
    			{
				 
				     $age="".calculateAge($birthday)."";
    				 $array_out = array();
    				 $array_out[] = 
    					//array("code" => "200");
    					array(
    						"fb_id" => $fb_id,
    						"action" => "signup",
    						"image1" => $image1,
    						"first_name" => $first_name,
    						"last_name" => $last_name,
    						"age" => $age,
					    	"birthday" => $birthday,
    						"gender" => $gender
    					);
    				
    				$output=array( "code" => "200", "msg" => $array_out);
    				print_r(json_encode($output, true));
    			}
    			else
    			{
    			    //echo mysqli_error();
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in signup");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	 }
	 
	 
	 function sendPushNotification()
	{
		require_once("config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		
		$tokon=$event_json['tokon'];
		$title=htmlspecialchars(strip_tags($event_json['title'] , ENT_QUOTES));
		$message=htmlspecialchars(strip_tags($event_json['message'] , ENT_QUOTES));
		$icon=htmlspecialchars(strip_tags($event_json['icon'] , ENT_QUOTES));
		$senderid=htmlspecialchars(strip_tags($event_json['senderid'] , ENT_QUOTES));
		$receiverid=htmlspecialchars(strip_tags($event_json['receiverid'] , ENT_QUOTES));
		$action_type=htmlspecialchars(strip_tags($event_json['action_type'] , ENT_QUOTES));
		
		
		
		$notification['to'] = $tokon;
		$notification['notification']['title'] = $title;
		$notification['notification']['body'] = $message;
		// $notification['notification']['text'] = $sender_details['User']['username'].' has sent you a friend request';
		$notification['notification']['badge'] = "1";
		$notification['notification']['sound'] = "default";
		$notification['notification']['icon'] = "";
		 $notification['notification']['image'] = "";
		$notification['notification']['type'] = "";
		
		$notification['data']['title'] = $title;
		$notification['data']['body'] = $message;
		$notification['data']['icon'] = $icon;
		$notification['data']['senderid'] = $senderid;
		$notification['data']['receiverid'] = $receiverid;
		$notification['data']['action_type'] = $action_type;	
		
		sendPushNotificationToMobileDevice(json_encode($notification));  
	}
	
	function boostProfile()
	{
		require_once("config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		$mins=$event_json['mins'];
		$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
		$promoted=htmlspecialchars(strip_tags($event_json['promoted'] , ENT_QUOTES));
		
		$qrry_1="update users SET promoted_mins ='".$mins."' , promoted='".$promoted."' , promoted_date='".date('Y-m-d H:i:s', time())."' WHERE fb_id ='".$fb_id."' ";	
		
		if(mysqli_query($conn,$qrry_1))
		{
			$array_out = array();
				
			 $array_out[] = 
				array(
				"response" =>"success");
			
			$output=array( "code" => "200", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		else
		{
			$array_out = array();
				
			 $array_out[] = 
				array(
				"response" =>"problem in updating");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		
	}
	
	
	function subscription_update()
	{
		require_once("config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		
		$fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
		
		$qrry_1="update users SET subscription_datetime='".date('Y-m-d H:i:s', time())."' WHERE fb_id ='".$fb_id."' ";
		
		if(mysqli_query($conn,$qrry_1))
		{
			$array_out = array();
				
			 $array_out[] = 
				array(
				"response" =>"success");
			
			$output=array( "code" => "200", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		else
		{
			$array_out = array();
				
			 $array_out[] = 
				array(
				"response" =>"problem in updating");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	  
?>
