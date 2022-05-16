$id=$_POST['id'];

$result = mysqli_query($conn,"SELECT attachment FROM attach WHERE project_id='$id'");


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