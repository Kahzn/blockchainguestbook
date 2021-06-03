<?php
# Redirect
header('Location: index.php');

# Insert POST values into database
$con = mysqli_connect("localhost", "ziolkowski_guestbook", "WcEpPGX3bsqdz3zy", "ziolkowski_guestbook");

if (mysqli_connect_errno()) {

    printf("connection failed: %s\n", mysqli_connect_error());
    exit();
}

$sqlgethash = 'SELECT hash FROM entries ORDER BY id DESC LIMIT 1;';

$hashresult = mysqli_query($con, $sqlgethash);

if(mysqli_num_rows($hashresult) > 0){
    $previousHash = mysqli_fetch_row($hashresult)[0];
}

echo $con->error;

$hash = hash('sha256', $previousHash . $_POST['title'] . $_POST['name'] . $_POST['message'], false);

$sqlinsert    = 'INSERT INTO entries (name, title, text, previous_hash, hash)
            VALUES(" ' . $_POST['name'] . '", "
            ' . $_POST['title'] . '", "
            ' . $_POST['message'] . '", "
            ' . $previousHash . '", "
            ' . $hash . '");';
$result = mysqli_query($con, $sqlinsert);

echo $con->error;


mysqli_close($con);


?>
