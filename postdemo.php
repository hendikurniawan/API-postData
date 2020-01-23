<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nodemcu";
// http://192.168.56.1/postData/postdemo.php //api for Arduino IDE code
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    // echo "Date: ".$d." ";
    $t = date("H:i:s");

    //post data
    if(!empty($_POST['sensor']) && !empty($_POST['kelembaban']) && !empty($_POST['suhu']))
    {
        $sensor = $_POST['sensor'];
        $kelembaban = $_POST['kelembaban'];
        $suhu = $_POST['suhu'];
        //insert data from microcontroler into db
	    $sql = "INSERT INTO datas (sensor, kelembaban, suhu, Date, Time)
		
		VALUES ('".$sensor."','".$kelembaban."', '".$suhu."', '".$d."', '".$t."')";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>