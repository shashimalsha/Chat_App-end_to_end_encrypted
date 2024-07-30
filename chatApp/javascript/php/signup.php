<?php
session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty ($fname) && !empty ($lname) && !empty ($email) && !empty ($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) //if email is valid
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){ //if email already exist
            echo "$email already exist..";
        }else{
            if(isset($_FILES['file'])){ //if file is uploaded
                $img_name =$_FILES['file']['name'];//getting user uploaded image name
                $img_type = $_FILES['file']['type']; //getting user uploaded image type
                $tmb_name = $_FILES['file']['tmp_name']; //this temporary name is used to save file in our folder

                //explode image and get extension like jog png
                $img_explode = explode('.' $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png','jpeg','jpg'];
                if(in_array($img_ext , $img_ext) === true){
                    $time = time(); //this will return us current time
                    $new_image_name = $time.$img_name;

                    if(move_uploaded_file($tmp_name, "images/".$new_image_name)){
                    $status = "Active now";
                    $random_id = ran(time(),10000000);

                    //let insert all user detail to table
                    $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id,fname, lname, email, password, img, status) VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_image_name}','{$status}')");

                    if($sql2){
                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION = ['unique_id'] = $row['unique_id'];
                            echo "success";
                        }
                    }else{
                        echo "something went wrong..";
                    }
                    }


                }else{
                   echo "please select an image file - jpeg, jpg, png"; 
                }

            }else{
                echo "please select an image file";
            }
        }
    }else{
        echo "$email this is not a valid email";
    }
?>