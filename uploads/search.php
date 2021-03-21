<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "reg";

$id ="";
$name = "";
$desg = "";
$party = "";
$phone = "";
$ward = "";
$other = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['name'];
    $posts[2] = $_POST['desg'];
    $posts[3] = $_POST['party'];
    $posts[4] = $_POST['phone'];
    $posts[5] = $_POST['ward'];
    $posts[6] = $_POST['other'];

    return $posts;
}



// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM `post` WHERE id = $data[0]"  ;
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id=$row['id'];
                $name = $row['name'];
                $desg = $row['desg'];
                $party = $row['party'];
                $phone= $row['phone'];
                $ward = $row['ward'];
                $other = $row['other'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}
 

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `post` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `post` SET `name`='$data[1]',`desg`='$data[2]',`party`='$data[3]' ,`phone`='$data[4]' ,`ward`='$data[5]' ,`other`='$data[6]'  WHERE `id` = '$data[0]' ";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}

?>