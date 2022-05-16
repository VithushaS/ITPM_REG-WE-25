$(document).ready(function () {
     
    // alert("from  account_view.js");

    // table start-load data
    var html;
    function loaddata() {

        $.ajax({
            url: "controller/course_view_controller.php",
            type: "POST",
            cache: false,
            data:{
                mode:'view_data'
            },
            success: function (data) {
                
                console.log(data);
                var response = JSON.parse(data);
                console.log(response);


                var length = response.length;
                html += "<thead>";
                html += "<tr>";
                // html += "<th align='center'>" + 'id' + "</th>";
                html += "<th align='center'>" + 'Module Name' + "</th>";  
                html += "<th align='center'>" + 'session' + "</th>";
                html += "<th align='center'>" + 'File' + "</th>";
                html += "<th align='center'>" + 'Date' + "</th>";  
                html += "<th align='center'>" + 'Action' + "</th>";
                html += "</tr>";
                html += "</thead>";
    
                html += "<tbody>";
                for (var i = 0; i < length; i++) {
                    var record = response[i];
                    // console.log(record);
    
    
                    html += "<tr>";
    
                   
                    // html += "<td  >" + record.id + "</td>";
                    html += "<td  >" + record.module_name + "</td>";
                    html += "<td  >" + record.session + "</td>";
                    html += "<td ><button id="+record.id+" class='add_attach btn btn-success'>Attachment📁</button> </td>";
                    html += "<td  >" + record.date + "</td>";
                    html += "<td ><button id="+record.id+" class='edit btn btn-success' data-toggle='modal' data-target='#myModal_edit'>Edit</button> <button id="+record.id+" class='delete btn btn-danger' data-toggle='modal' data-target='#myModal_delete' >Delete</button></td>";
                    
                    // id=$(this).attr('id');
                    // console.log(id);    
                    
                    html += "</tr>";
                }
    
    
                html += "</tbody>";
                $('#table_content').html(html);
                $('#table_content').DataTable();
    
    
            }
        });
    
        
        

    } // table -load function end



     // add function start
     $('#show-add').click(function () {
        $('#myModal').show(3000);
        $('#add_db').click(function () {
             
            
           
    
    
            var form_data = new Object();
            // form_data['id'] = $("#txt_id").val();
            form_data['module_name'] = $("#module_name").val();
            form_data['session'] = $("#session").val();
            form_data['file'] = $("#file").val();
            form_data['date'] = $("#date").val();

    
            form_data['mode']='add_course'

            // validatio start



           
            // Conditions filled
            if (form_data['module_name'] !='' && form_data['session'] !='' && form_data['file'] !='') {

                
            console.log(form_data);
    
    
            $.ajax({
                url: "controller/course_view_controller.php",
                type: "POST",
                data: form_data,       
                success: function (data) {
    
                    console.log(data);
                    $('#records_content').fadeOut(2500).html(data);
                    setTimeout(function(){
                        window.location.reload();
                     }, 5000);
                     $('#myModal').hide(3000);

    
                },
                complete: function() {
                  
                    window.setTimeout(loaddata, 10000);
                }
            });
                
            } else {
            // alert("All fields are required.....!");
            $('#myModal_validate').show(1500);

            $('#validate_ok').click(function () {
                 
              
               
               
    
                 $('#myModal_validate').hide(2000);
                 
                
           
    
    
            });// 

             
            }


            // validation end
    
    
    
        }); // add function close

        $('#add_cancel').click(function () {
            // alert(" from delete function");
          
           
           

             $('#myModal').hide(2000);
            //  setTimeout(function(){
            //     window.location.reload();
            //      }, 2500);
             
            
       


        });//cancel end
    


    });
     

              // delete start
              $("body").on("click", ".delete", function () {

                var id = $(this).attr('id');
                console.log(id);
                    $('#myModal_delete').show(2000);
                
                 
                

                $('#delete_db').click(function () {
                       // alert(" from delete function");
                    
                       $.ajax({
                       url : "controller/course_view_controller.php",
                       type: "POST",
                       data : { 
                           id: id,
                           mode:'delete_course'
                        },
                       
                       success: function(data)
                       {
       
                        $('#myModal_delete').hide(2000);
                    
                        $('#records_content').fadeOut(2500).html(data);
                        setTimeout(function(){
                            window.location.reload();
                         }, 5000);
                        
                      
                           
                       }
                   });


                });

                $('#delete_cancel').click(function () {
                    // alert(" from delete function");
                  
                   
                   
    
                     $('#myModal_delete').hide(2000);
                    //  setTimeout(function(){
                    //     window.location.reload();
                    //      }, 2500);
                     
                    
               


                });//cancel end
                
                     
          
            })  // delete  end





                     // edit start
            $("body").on("click", ".edit", function () {

                console.log("clicked");
            
                var id = $(this).attr('id');
                console.log(id);
               

                $.ajax({
                    url : "controller/course_view_controller.php",
                    type: "POST",
                    data : {
                        id: id,
                        mode:'edit_data'
                         
                    },
                    success: function(data)
                    {
                        // console.log(data);
                        var res = JSON.parse(data);
                        console.log(res['0'].date);
                          

                        $('#edit_id').val(res['0'].id);
                        $('#edit_module_name').val(res['0'].module_name);
                        $('#edit_session').val(res['0'].session);
                        $('#edit_file').val(res['0'].file);
                        $('#edit_date').val(res['0'].date);
                        

       
                        
                    }
                });

                $('#myModal_edit').show(2000);

                $('#update_db').click(function () {
                   
                    var form_data = new Object();
                    form_data['edit_id'] = $("#edit_id").val();
                    form_data['edit_module_name']=$("#edit_module_name").val();
                    form_data['edit_session'] = $("#edit_session").val();
                    form_data['edit_file'] = $("#edit_file").val();
                    form_data['edit_date'] = $("#edit_date").val();
                   
                

                    console.log(form_data);

                    // passing with mode
                    form_data['mode']='edit_course'

                    $.ajax({
                        url : "controller/course_view_controller.php",
                        type: "POST",
                        data : form_data,
                        success: function(data)
                        {
        
                           
                            $('#myModal_edit').hide(3000);
                            $('#records_content').fadeOut(2500).html(data);
                                setTimeout(function(){
                                window.location.reload();
                            }, 5000);
                        }
                    });
    
    
                
                
                
                
            });    // update  end

            $('#update_cancel').click(function () {
                // alert(" from delete function");
              
               
               
    
                 $('#myModal_edit').hide(2000);
                //  setTimeout(function(){
                //     window.location.reload();
                //      }, 2500);
                 
                
           
    
    
            });//cancel end
 
            
            
     }) // edit end

   
  

     $("body").on("click", ".add_attach", function () {
            
        var id = $(this).attr('id');
        console.log(id);
        window.open("attach2.php?id="+id+"");

    }); // gallery button clk end
  

                             
    loaddata();

}); // document ready close
