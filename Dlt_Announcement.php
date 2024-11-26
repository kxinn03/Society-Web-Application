<?php
//Delete_Announcement.php
$page_title = 'Delete Announcement';
include 'config.php';

if (isset($_GET['title'])){
    $title=$_GET['title'];
    
    $delete=mysqli_query($conn,"DELETE FROM announ WHERE title= '$title' ");
    
    if ($delete){
        header("location:Dlt_Announcement.php");
        dis();
    }
}

$select="select * from announ";
$query=mysqli_query($conn,$select);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <link href="Post_Announcement.css" rel="stylesheet" />
        <title>Delete Announcement - TARUC Chinese Language Society</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <div class="header">
        <h1>Delete Announcement</h1>
        </div>
        
        <h3>You have deleted the announcement, is there anything announcement want to delete? If not, press the GO BACK button.</h3>
        
        <table class='table table-striped'>
            <tr>
                <th>Title</th>
                <th>Post On</th>
                <th>Sender</th>
                <th>Announcement Content</th>
                <th>Delete Announcement</th>
            </tr>
            
            <?php
                $num=mysqli_num_rows($query);
                if($num>0){
                    while($result=mysqli_fetch_assoc($query)){
                        echo "
                        <tr>
                            <td style='width:150px'>".$result['title']."</td>
                            <td style='width:150px'>".$result['date']."</td>
                            <td>".$result['sender']."</td>  
                            <td>".$result['content']."</td>   

                            <td>
                                <a href='Dlt_Announcement.php?title=".$result['title']."' class='btn btn-danger'>Delete</a>                   
                            </td>
                        </tr>


                        ";
                    }
                }
            ?>

        </table>
        <a href='Post_Announcement.php' class='btn btn-danger'>Go Back</a>
    </body>
</html>



