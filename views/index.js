$(document).ready(function(){  
    $('#add').click(function(){  
        $('#insert').val("Insert");  
        $('#insert_form')[0].reset();  
    });  
    $(document).on('click', '.edit_data', function(){  
        var employee_id = $(this).attr("id");  
        $.ajax({  
                url:"sensors/fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                    $('#sens_name').val(data.sens_name);  
                    $('#sens_type').val(data.sens_type);  
                    $('#threshold_min').val(data.threshold_min);  
                    $('#sens_value').val(data.sens_value); 
                    $('#threshold_max').val(data.threshold_max);   
                    $('#status_sensor').val(data.status_sensor);
                    $('#employee_id').val(data.id);  
                    $('#insert').val("Update");  
                    $('#add_data_Modal').modal('show');  
                }  
        });  
    });  
    $('#insert_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#sens_name').val() == "")  
        {  
                alert("Name is required");  
        }  
        else if($('#sens_type').val() == '')  
        {  
                alert("Type Sensor is required");  
        }  
        else if($('#threshold_min').val() == '')  
        {  
                alert("Threshold_min is required");  
        }  
        else if($('#threshold_max').val() == '')  
        {  
                alert("Threshold_max is required");  
        }  
        else  
        {  
                $.ajax({  
                    url:"sensors/insert.php",  
                    method:"POST",  
                    data:$('#insert_form').serialize(),  
                    beforeSend:function(){  
                        $('#insert').val("Inserting");  
                    },  
                    dataType:"json", 
                    success:function(result){ 
                        $('#add_data_Modal').modal('hide'); 

                        if(result == 'success')
                        {
                            setInterval(function(){ }, 500);
                            swal({
                                title: "Success",
                                text: "Berhasil Mengupdate Sensor",
                                icon: "success",
                            })
                            .then((value) => {
                                location.reload();
                            });
                        }

                        if(result == 'gagal')
                        {
                            setInterval(function(){  }, 500);
                            swal({
                                title: "Gagal",
                                text: "Gagal Mengupdate Sensor",
                                icon: "error",
                            })
                            .then((value) => {
                                location.reload();
                            });
                        }
                    }  
                });  
        }  
    });  
    $(document).on('click', '.view_data', function(){  
        var employee_id = $(this).attr("id");  
        if(employee_id != '')  
        {  
                $.ajax({  
                    url:"sensors/select.php",  
                    method:"POST",  
                    data:{employee_id:employee_id},  
                    success:function(data){  
                        $('#employee_detail').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
        }            
    });  
});  