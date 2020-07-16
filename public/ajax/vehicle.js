$(document).ready(function() {

    $(document).on("submit", "#vehicle_save", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/vehicle/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Vehicle added successfully", "Success!");
                $("#addModal").modal('hide');
                loaddata();
                $("#vehicle_save").trigger("reset");

            },error:function(errors){
                var error =JSON.parse(errors.responseText).errors;
                $("#vehicle_save").find('.form-group').each(function(){
                    var $that =$(this);
                    $(this).find('.help-block').remove();
                    var inputName=$(this).find('[name]').first().attr('name');
                    if(error[inputName])
                    {
                        $.each(error[inputName],function(i,message){
                            $that.append('<span class="help-block" style="color:red;">'+message+'</span>');
                        })
                    }
                });
            }
        });
    });

    $("#datalist").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/vehicle" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_vehicle_type").val(response.vehicle_type);
                $("#edit_vehicle_charge").val(response.vehicle_charge);
                $("#edit_vehicle_time").val(response.vehicle_time);
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
            url: "/admin/vehicle/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function(response) {
                toastr.success("Vehicle Updated successfully", "Success!");
                $("#edit").modal('hide');
                $("#vehicle_update").trigger("reset");
                loaddata();
            },error:function(errors){
                var error =JSON.parse(errors.responseText).errors;
                $("#vehicle_update").find('.form-group').each(function(){
                    var $that =$(this);
                    $(this).find('.help-block').remove();
                    var inputName=$(this).find('[name]').first().attr('name');
                    if(error[inputName])
                    {
                        $.each(error[inputName],function(i,message){
                            $that.append('<span class="help-block" style="color:red;">'+message+'</span>');
                        })
                    }
                });
            }
        });
    });

    $("#datalist").on("click", ".delete", function() {
        var data = $(this).attr("data");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                    $.ajax({
                        url: "/admin/vehicle/" + data,
                        data: data,
                        type: "delete",
                        dataType: "json",
                        success: function(response) {
                            toastr.success("Vehicle Deleted Successfully", "Success!");
                             loaddata();
                        }
                    });
                }
            });
    });
$("#datalist").on("click" , "#vehicle_status",function(){
    var data = $(this).attr("data");
    $.ajax({
        url: "/admin/vehicle/show/" + data,
        type: "get",
        dataType:"json",
        success: function(response){
            loaddata();
            if(response.vehicle_status==0){
                toastr.success("Vehicle Status Change into Inactive" , "Success!");
            }
            else{
               toastr.success("Vehicle Status Change into Active" , "Success!");
            }
        }

    });
});

$("#datalist").on("click",".page-link",function(e){
    e.preventDefault();
    var pagelink = $(this).attr('href');
    console.log(pagelink)
    loaddata(pagelink);
});

$("#search").keyup(function () {
    loaddata();
});

loaddata();
});

function loaddata(pagelink="/admin/vehicle/create"){
    var search = $("#search").val();
    console.log(search);

    $.ajax({
        url: pagelink,
        data:{search : search},
        type: "get",
        dataType: "html",
        success: function(data) {
            $("#datalist").html(data);
        }
    });
}
