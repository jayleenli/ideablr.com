<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$currentarticle = trim($_POST['currentArticle']);
$userRating = trim($_POST['userRating']);
$logUser = trim($_POST['logUser']);

$rate = "SELECT * FROM ARTICLERATINGS WHERE ARTICLETITLE = '$currentarticle'";
$result = mysqli_query($connect, $rate);
$row = mysqli_fetch_assoc($result);
$row_cnt = $result->num_rows;
if ($row_cnt == 0)
    {
        //Create a new entry
		$insert_rate = "INSERT INTO ARTICLERATINGS (ARTICLETITLE, RATING, NUMVOTES, WHOVOTED) VALUES ('$currentarticle','$userRating',1,'$logUser')";
		$query2 = mysqli_query($connect, $insert_rate);
    }
    else
    {
		//Update an entry	
		$articleTitle = $row['ARTICLETITLE'];
		$numvotes = $row['NUMVOTES'];
                $whoVoted = $row['WHOVOTED'];
                
                //If the user has already voted
                $userToLookFor = "%" . $logUser . "%";
                $checkForAlreadyVoted = "SELECT * FROM ARTICLERATINGS WHERE (WHOVOTED LIKE '$userToLookFor') AND ARTICLETITLE = '$currentarticle'";
                $userchecker = mysqli_query($connect, $checkForAlreadyVoted);
                $row2 = mysqli_fetch_assoc($userchecker);
                $row_cnt2 = $userchecker->num_rows;
                if ($row_cnt2 == 0)
                {
                        //user has not voted
                        $AVGRating = $row['RATING'] * $numvotes;
                
                        $new_rating = ($AVGRating + $userRating)/($numvotes+1);
                        $numvotes = $numvotes + 1;
    
                        $whoVoted = $whoVoted . " , " . $logUser;
		
                        $change_rate = "DELETE FROM ARTICLERATINGS WHERE ARTICLETITLE = '$currentarticle'";
                        $insert_rate = "INSERT INTO ARTICLERATINGS (ARTICLETITLE, RATING, NUMVOTES, WHOVOTED) VALUES ('$currentarticle','$new_rating','$numvotes', '$whoVoted')";
                        $query = mysqli_query($connect, $change_rate);
                        $query2 = mysqli_query($connect, $insert_rate);
                }
                else
                {
                        //User has voted
                }
                
	}

// close connection
mysqli_close($connect);
?> 