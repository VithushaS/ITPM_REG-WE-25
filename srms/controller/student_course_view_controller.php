<?php
    include_once("includes/config.php");

    if($_POST['mode']=='view_data'){

         // Create database connection using config file
         include_once("includes/config.php");
         $mysqli = new mysqli($servername, $username, $password, $dbname);
 
         $query ="SELECT * FROM student_courses";
 
          
 
         $result=$mysqli->prepare($query);
         //execute query
 
         $result->bind_result($id,$module_name,$title,$date,$file);
         $result->execute();
 
         /* fetch values */
         while ($result->fetch()) {
             $Data[] = array(
                 'id'=> $id,
                 'module_name'=> $module_name,
                 'title'=> $title,
                 'date'=> $date,
                 'file'=> $file
                 
                  
          
             );
         }
         echo json_encode($Data);
 
         //free memory associated with result
         $result->close();
 
         //close connection
         $mysqli->close();
 




    }


    if($_POST['mode']=='add_course'){

         
        //  8
    //    $id =$_POST['id'];
       $module_name = $_POST['module_name'];
       $title = $_POST['title'];
       $date = $_POST['date'];
       $file = $_POST['file'];
       


               
       if(!empty($module_name) && !empty($title)){

            //    prepare and bind insert statement
          $query="INSERT INTO student_courses(module,title,date,file)VALUES(?,?,?,?)";
          $stmt_insert = $conn->prepare($query);
       
          $stmt_insert->bind_param("ssss",$module_name,$title,$date,$file);
             //  echo $query;
   
        
   
   
         $result=$stmt_insert->execute();
   
       if (!$result) {
            
           echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success"> Details not addedly</div>';
   
        }else {
   
       
              
             echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success"> record  added succcessfully</div>'; 
          
        }


        
    }
   
     
   
     }


     if($_POST['mode']=='delete_course'){

     
   
        // Get id from URL to delete that account
        $id = $_POST['id'];
         // echo $id;
    
    
        // Delete user row from table based on given id
        $query="DELETE FROM student_courses WHERE id='".$id."' ";
        $result = mysqli_query($conn, $query);
        // echo $query;
        if($result){

             
            echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success"> record deleted </div>'; 
        }
    
    
      }

      if($_POST['mode']=='edit_data'){


        // Create database connection using config file
        include_once("includes/config.php");
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        $id =$_POST['id'];
       

        $query ="SELECT * FROM student_courses WHERE id='".$id."'";
        
        $result=$mysqli->prepare($query);
        //execute query

        $result->bind_result($id,$module_name,$title,$date,$file);
        $result->execute();

        /* fetch values */
        while ($result->fetch()) {
            $Data[] = array(

                //8 
                'id'=> $id,
                'module_name'=> $module_name,
                'title'=> $title,
                'date'=> $date,
                'file'=> $file
                    
               
            );
        }
        echo json_encode($Data);

        //free memory associated with result
        $result->close();

        //close connection
        $mysqli->close();



}

if($_POST['mode']=='edit_course'){


    // include database connection file
   include_once("includes/config.php");
   
   // Check if form is submitted for members update, then redirect to homepage after update
        
       $edit_id =$_POST['edit_id'];
       $edit_module_name =$_POST['edit_module_name'];
       $edit_title = $_POST['edit_title'];
       $edit_date = $_POST['edit_date']; 
       $edit_file = $_POST['edit_file'];
       
      
    
       $stmt_update = $conn->prepare("UPDATE student_courses SET  module=?,title=?,date=?,file=? WHERE id='".$edit_id."'");
       $stmt_update->bind_param("ssss",$edit_module_name,$edit_title,$edit_date,$edit_file);
           
   
   
       if (!$stmt_update->execute()) {

           
           echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success"> record not updated </div>'; 
           
       } 
       else {
            
           echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success"> record updated succcessfully</div>'; 
           
       }
   
   
   
   }


      
       



     
        
?>