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
        $new_user_infos_fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $new_user_infos_telephone =  mysqli_real_escape_string($conn, $_POST['telephone']);
        $new_user_infos_email =  mysqli_real_escape_string($conn, $_POST['email']);
        $new_user_infos_password =  $_POST['password'];

        $user_infos_changes = mysqli_query(
            $conn,
            "UPDATE users
                            SET 
                            name = '$new_user_infos_fullname',
                            phone_number = '$new_user_infos_telephone',
                            email = '$new_user_infos_email',
                            password = '$new_user_infos_password'
    
                            WHERE username = '" . $_SESSION['username'] . "'
    
                            "
        );

        if ($conn->query($user_infos_changes)) {
            go("user-personal-infos.php");
        }
    }
}





?>