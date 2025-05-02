<?php
    include('../config/database.php');

    $email = $_POST['e_mail'];
    $passw = $_POST['passw'];

    $sql = 
    "SELECT
	id,
	email,
	password,
	COUNT(id) AS total
FROM
	users
WHERE
	email = 'angela@gmail.com' and
	password = '123456' and
	status = true
GROUP BY
	id;";

    $res = pg_query($conn, $sql);

    if($res){
        $row = pg_fetch_assoc($res);
        if($row['total']>0){
            echo "Login ok";
        }else{
            echo "Login failed";
        }
    }
?>