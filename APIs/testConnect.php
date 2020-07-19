<?php
function getDB(){
	global $db;
	if(!isset($db)){
		//DO NOT COMMIT PRIVATE CREDENTIALS TO A REPOSITORY EVER
        $conn_string = '127.0.0.1';//TODO should pull from config or env variables
        $dbusername = 'root';
        $dbpassword = '';
        $dbname = 'raptor';
		$db = mysqli_connect($conn_string, $dbusername, $dbpassword, $dbname);
    }
    // $sql = "INSERT INTO 'drinkInfo' (drinkID, drinkName) VALUES ('1233', 'vodka')";
    // $result = mysqli_query($db, "SELECT * FROM drinkInfo");
    // echo mysqli_fetch_assoc($result);
    // print_r($db);
    $sql = "SELECT * FROM `drinkinfo`";
    $result = mysqli_query($db, $sql);

    $res = mysqli_query($db, $sql); //replace $con with your db connection variable
    echo $res;
    // if(mysqli_num_rows($res)>0) {
    //     while($row=  mysqli_fetch_assoc($res)){
    //         print_r($row);
    //         die;
    //     }
    // }
        
}

getDB();

?>