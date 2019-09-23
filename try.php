<?php

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $conn = oci_connect('', '', '');

    if(!$conn){
        echo "Error <br>";
    }
    else{
        echo "Connected <br>";
    }

    $stmt = oci_parse($conn, 'select count(*) as COUNT from account where EMAIL=:email and PASS=:pass');

    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':pass', $pass);

    $r = oci_execute($stmt);

    oci_fetch_all($stmt, $res);

    //echo $res['COUNT'][0];

    if($res['COUNT'][0] == '1'){
        session_id('session');
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        header('Location: User.php');      
    }
    else{
        header('Location: Index.php');
    }

    oci_free_statement($stmt);
    oci_close($conn);
?>

