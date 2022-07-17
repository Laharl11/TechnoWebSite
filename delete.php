<?php

    $conn = mysqli_connect("localhost", "root", "", "contact");

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM contact_us WHERE id = '".$id."'";
    mysqli_query($conn, $sql);

    echo "success! approved";

    $conn->close();

?>