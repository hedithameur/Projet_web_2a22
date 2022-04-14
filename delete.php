<?php
    include "config.php";

    // if the 'id' variable is set in the URL, we hnow that we need to edit a record
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        //write delete query
        $sql  = "DELETE FROM `users` WHERE `id`= '$user_id'";

        //execute the query
        $result = $conn->query($sql);
        if ($result == TRUE) {

            echo "Record deleted successfully.";
          
    	}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		
    }
}
?>