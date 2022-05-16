$(document).ready(function () {

    //  receiving id of particular Event
    alert("from  attach2.js");
            console.log(id);


        $("#attach").on('change',function(){
          var filename = $(this).val();
          $(".custom-file-label").html(filename);
        });


        $("#attach_upload").submit(function(e){
        	e.preventDefault();
            $(this).off('submit');

			 
                console.log(this);
            
            var data = new FormData(this);
            data.append("id",id);
            data.append("mode",'add_attach');

        	$.ajax({
                url:'controller/attach2_controller.php',
                method:'post',
                processData:false,   
                contentType:false,
                cache:false,
                data: data,
                success:function(response){
                	$("#result").html(response);
                    // load_images();
                }
        	});
        });


        $('#show').click(function(e) {
            e.preventDefault();
            $('#modal_fx').hide(2000);
            load_attach(3000);

        });

     

        function load_attach(){

             
            
        	$.ajax({
        		url:'controller/attach2_controller.php',
        		method:"POST",
                data:{
                    id:id,
                    mode:'view_attach'
                },
        		success:function(data){
                    console.log(data);
                   $("#preview").html(data);
        		}
        	});
        }






 




}); // document ready close