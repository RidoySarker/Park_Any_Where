$(document).ready(function() {

    $(document).on("submit", "#vehicle_save", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "vehicle/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function(data) {
                toastr.success("Vehicle added successfully", "Success!");
                $("#addModal").modal('hide');
                loaddata();
                $("#vehicle_update").trigger("reset");

            },error:function(errors) {
                console.log(errors)
           let error = JSON.parse(errors.responseText).errors;
           $.each(error,function(i,message){
                $("#"+i+"_error").html('<span class="help-block" style="color:red;">'+message+'</span>');
             })
            }
        });
    });

    $("#datalist").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "vehicle" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_vehicle_type").val(response.vehicle_type);
                $("#edit_vehicle_charge").val(response.vehicle_charge);
                $("#edit_vehicle_period").val(response.vehicle_period);
                $("#edit_vehicle_status").val(response.vehicle_status);
                $("#edit_vehicle_id").val(response.vehicle_id);
            }
        });
    });

    $(document).on("submit", "#vehicle_update", function (e) {
        e.preventDefault();
        var id = $(this).attr("#edit_vehicle_id");
        let data = $(this).serializeArray();
        $.ajax({
            url: "vehicle/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function(response) {
                toastr.success("Vehicle updated successfully", "Success!");
                $("#edit").modal('hide');
                $("#vehicle_update").trigger("reset");
                loaddata();
            },error:function(errors) {
                console.log(errors)
           let error = JSON.parse(errors.responseText).errors;
           $.each(error,function(i,message){
                $("#"+i+"_error").html('<span class="help-block" style="color:red;">'+message+'</span>');
             })
            }
        });
    });

    $("#datalist").on("click", ".delete", function() {
        var data = $(this).attr("data");
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "vehicle/" + data,
                        data: data,
                        type: "delete",
                        dataType: "json",
                        success: function(response) {
                            toastr.success("Vehicle deleted successfully", "Success!");
                             loaddata();
                        }
                    });
                }
            });
    });
$("#datalist").on("click" , "#vehicle_status",function(){
    var data = $(this).attr("data");
    $.ajax({
        url: "vehicle/show/" + data,
        type: "get",
        dataType:"json",
        success: function(){
            loaddata();
            if(response.status==200){
                toastr.success("Vehicle Status Change into Inactive" , "Success!");
            }
            else{
               toastr.success("Vehicle Status Change into Active" , "Success!"); 
            }
        }

    });
});


    loaddata();
});

function loaddata() {

    $.ajax({
        url: 'vehicle/create',
        type: "get",
        dataType: "html",
        success: function(data) {
            $("#datalist").html(data);
        }
    });
}