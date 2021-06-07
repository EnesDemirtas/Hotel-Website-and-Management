<?php include '../phpFunctions/databaseConnection.php'; 

function getPersonalInfos($conn){
    $personal_infos = mysqli_query($conn,
    "SELECT * 
    FROM users
    WHERE username = '" . $_SESSION['session_username'] . "'
     "
     );

     $p_infos = $personal_infos->fetch_array(1);
     return $p_infos;
}



function saveUserChanges($conn){
    if (isset($_POST['personal-infos-changes'])) {
        $new_user_infos_fullname = escape_sanitize_input($conn, $_POST['fullname'], "string");
        $new_user_infos_telephone = escape_sanitize_input($conn, $_POST['telephone'], "string");
        $new_user_infos_email =  escape_sanitize_input($conn, $_POST['email'], "email");
        $new_user_infos_password =  $_POST['password'];


        if(empty($new_user_infos_fullname) OR empty($new_user_infos_telephone) OR empty($new_user_infos_email) OR empty($new_user_infos_password)){
            echo "<div class='text-center bg-danger text-white'> Please provide all informations... </div>";
        }else {
            if(!filter_var($new_user_infos_email, FILTER_VALIDATE_EMAIL)){
                echo "<div class='text-center bg-danger text-white'> Invalid Email... </div>";
            }else {

                $new_pw_hashed = password_hash($new_user_infos_password, PASSWORD_DEFAULT);
                $session_username = $_SESSION['username'];

                $user_infos_changes = mysqli_query(
                    $conn,
                    "UPDATE users
                                    SET 
                                    name = '$new_user_infos_fullname',
                                    phone_number = '$new_user_infos_telephone',
                                    email = '$new_user_infos_email',
                                    password = '$new_pw_hashed'
            
                                    WHERE username = '$session_username'
            
                                    "
                );
    
                if ($conn->query($user_infos_changes)) {
                    go("user-personal-infos.php");
                }
            }

        }






    }
}
