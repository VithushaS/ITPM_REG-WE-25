<?php

$conn = new mysqli("localhost","root","","spirint");

if($_POST['mode']=='add_attach'){


    $id =$_POST['id']; 
    
    foreach ($_FILES['files']['name'] as $i => $value) {


       

        $attach_name = $_FILES['files']['tmp_name'][$i];
        $folder = "../attach/";
        $attach_path = $folder.$_FILES['files']['name'][$i];
        move_uploaded_file($attach_name,$attach_path);

     


    
    $sql = "INSERT INTO attach (id,attachment) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$id,$attach_path);
    $stmt->execute();
  
    if($stmt){
       echo "Attachment Uploaded Succesfully👍";
    }
     
    
    
    }

   //  echo "Image Uploaded Succesfully👍";




}  


if($_POST['mode']=='view_attach'){


    $id=$_POST['id'];

    $result = mysqli_query($conn,"SELECT attachment FROM attach WHERE id='$id'");
   

        if($result) {
            $data = '';
            while ($row = $result->fetch_assoc()) {
                $data .= ' 
                     
                         
                            <a href="attach/'.$row['attachment'].'">

                                <img src="attach/'.$row['attachment'].'" height="150" width="120"> 
                            </a>
                      ';
            }
        
         echo $data;



      

    }






}



   
   
     
     



?>