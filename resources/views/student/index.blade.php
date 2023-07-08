    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Document</title>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div class="modal" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            

            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_errlist"></ul>
                <div class="form-grup mb-3">
                    <label for="">Student Name</label>
                    <input type="text" class="name form-control">
                </div>
                <div class="form-grup mb-3">
                    <label for="">Student Email</label>
                    <input type="text" class="email form-control">
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">Save</button>
                </div>
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="succ_msg"></div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Students Data</h4>
                            <a href="" class="btn btn-primary floate-end btn-sm"  data-bs-toggle="modal" data-bs-target="#studentModal">Add Student</a>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        







    <script>
        $(document).ready(function(){
            $(document).on('click','.add_student',function(e){
                e.preventDefault();
                var data={
                    'name':$('.name').val(),
                    'email':$('.email').val()
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"/students",
                    data: data,
                    dataType:"json",
                    success:function(response){
                            // console.log(response);
                            if(response.status == 400 ){
                                $('#saveform_errlist').html("");
                                $('#saveform_errlist').addClass("alert alert-danger");
                                $.each(response.errors,function(key, err_values){
                                    $('#saveform_errlist').append('<li>'+err_values+'</li>');
                                });
                            }
                            else{
                                $('#succ_msg').html("");
                                $('#succ_msg').addClass("alert alert-success");
                                $('#succ_msg').text(response.message);
                                $('#studentModal').find('input').val("");
                                $("#studentModal").removeClass("in");
                                $(".modal-backdrop").remove();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '');
                                $("#studentModal").hide();

                                
                            }
                    }
                });

            });
        });
    </script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    </body>


    </html>


