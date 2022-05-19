


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Portal</title>
     
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

       
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
   
    
    <title>Student Portal</title>
	 
	<script type="text/javascript" src="js/student_course_view.js"></script>
    



</head>

<body class="">





<div class="side_bar"></div>

 
    <div class="container-fluid" style="padding: 0px; margin: 0px width=1000px;">
        <div class="jumbotron">
            <h1 class="text-center bold">Student Portal</h1>
           
        </div>
    </div>



   
        
    



    <div class="container" style="padding-top: 25px;">
      <div class="row"> 
        <div class="col-md-12">
                    

        <div class="pull-left">
                    <button id="show-add" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    New submission
                    </button>
        </div>


        <div class="col-md-12">
                    <div id="records_content"></div>
                    <br>
                    <table class="table table-striped table-bordered" id="table_content"> </table>  
                    <button class="btn btn btn-success" onclick="window.print()">Print</button>
        </div>   



             <div class="modal" id="myModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-dialog">
                        <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Fill Course Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div><br>


                                    <!-- Modal body start -->  
                               
                                 <div class="row mx-sm-5 bg-info">

                                     <div class="col-md-6">
                                                <br> 
                                                <input type="hidden" name="id" id="id" placeholder="id" class="form-control">  
                                                
                                                <input type="text" name="module_name" id="module_name" placeholder="module_name *" class="form-control" required><br>
                                                
                                                <input type="text" name="title" id="title" placeholder="title *" class="form-control"><br>
                                       
                                         
                                                <input type="date" name="date" id="date" placeholder="pick the Date" class="form-control"><br> 
                                                
                                    </div > 
                                    <div class="col-md-6">
                                                <br> 
                                                
                                                <input type="file" name="file" id="file" placeholder="file" class="form-control"><br>

                                               
            

                                                 
                                            
                                     </div >

                                </div > <br>
                                  
                                    <!-- Modal body End -->      
                                             <!-- Modal Footer -->
                                             <div class="modal-footer">
                                             <button id="add_db" type="button" class="btn btn-success">Add Course</button>
                                             <button id="add_cancel" type="button" class="btn btn-warning">Cancel</button>
                                                </div><br>
                                        
                                      

                        </div>
                    </div>
                </div>
             </div>


                        <!-- Modal delete start -->
                        <div class="modal" id="myModal_delete">
                          <div class="modal-dialog modal-sm">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                      
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure..?</h4>
                                    </div>
                                    
                                    <!-- Modal body start -->
                                    <br></br>
                                    <center>
                                    <button id="delete_db" type="button" class="btn btn-info">YES</button>
                                    <button id="delete_cancel" type="button" class="btn btn-info">NO</button>
                                    </center>
                                    <!-- Modal body end-->
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                         <!-- Modal delete end  -->

                         


                        <!-- Modal edit start  -->
                         <div class="modal" id="myModal_edit">
                            <div class="modal-dialog">
                               <div class="modal-content">

                                    <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update the Course details</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div><br>


                                        <!-- Modal body start -->
                                

                                                <div class="row mx-sm-5 bg-primary mb-5" >

                                                                <div class="col-md-6">
                                                                        <br>
                                                                        <input type="hidden" name="id" id="edit_id"   class="form-control">  
                                                                        
                                                                        <input type="text" name="edit_module_name" id="edit_module_name"   class="form-control"><br>
                                                                        
                                                                        <input type="text" name="edit_title" id="edit_title"   class="form-control"><br> 
                                                                
                                                                
                                                                        <input type="date" name="date" id="edit_date" class="form-control"><br> 
                                                                       

                                                                         
                                                                </div > 
                                                                <div class="col-md-6">
                                                                         <br>
                                                                        
                                                                         <input type="file" name="edit_file" id="edit_file"   class="form-control"><br> 


                                                                         

                                                                        
                                                                    
                                                                </div >

                                                </div >   
                                                                <!-- Modal body End -->  
                                            <div class="modal-footer">
                                            <button id="update_db" type="button" class="btn btn-info">Update</button>
                                            <button id="update_cancel" type="button" class="btn btn-info">Cancel</button>
                                        </div>    
                                                                        
                                    
                                </div> <!-- Modal content end -->
                            </div><!-- Modal class dialog end -->
                         </div> <!-- Modal edit end -->




                                       <!-- Modal validation  start -->
                        <div class="modal" id="myModal_validate">
                          <div class="modal-dialog modal-sm">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="form-inline" >
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    
                                    <!-- Modal body start -->
                                    <br></br>
                                    <h6 class="modal-title">Fill the required fields ..!</h>
                                    <!-- Modal body end-->

                                    <div class="modal-footer">
                                            <button id="validate_ok" type="button" class="btn btn-info">OK</button>
                                             
                                        </div>  
                                     
                                     </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <!-- Modal validation end  -->

                         

                        
                

          
         </div>
      </div>
    </div>

 
              

     
 



   
 

 

</body>
</html>

