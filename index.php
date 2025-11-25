<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- style bootstraap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container pt-5">
        <div class="my-3 d-flex justify-content-between">
            <h2>list User</h2>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add User
        </button>
        </div>
        <table class="table align-middle">
            <button type="button" class="btn btn-danger" onclick="loadUser();">Refresh</button>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>PROFILE</th>
                    <th>ADDRESS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody id="tableUser">
               
            </tbody>
        </table>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">List Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="my-3 form-group">
                                <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="enter name">
                            </div>
                            <div class="my-3 form-group">
                                <select class="form-control rounded-0" name="gender" id="gender">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="my-3 form-group">
                                <input type="text" name="address" id="address" class="form-control rounded-0" placeholder="enter address">
                            </div>
                            <div class="my-3 form-group">
                                <input type="file" name="profile" id="profile" class="form-control rounded-0">
                                <div class="my-3">
                                    <img src="./krud.png" id="image" style="border-radius: 50px; width: 100px; height: 100px;" alt="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit();">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#profile').hide();
        $('#image').click(function(){
            $('#profile').click();
        })
        //image preview
        $('#profile').change(function(){
            const file = this.files[0];
            if(file){
                $('#image').attr('src',URL.createObjectURL(file));
            }
        })
        loadUser();
    })
    function loadUser(){
        $.ajax({
            type: "GET",
            url: "fetch.php",
            success: function (response) {
                $('#tableUser').html(response);
            }
        });
    }
    function submit(){
        //get value from form
        var name = $('#name').val();
        var gender = $('#gender').val();
        var address = $('#address').val();
        var profile = $('#profile')[0].files;
        //check validate
        if(!name || !gender || !address){
            alert("data invalide");
            return;
        }
        //append all data
        const formData = new FormData();
        formData.append('name',name);
        formData.append('gender',gender);
        formData.append('address',address);
        formData.append('profile',profile[0]);
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: formData,
            processData:false,
            contentType:false,
            success: function (response) {
                console.log('data respone',response);
                if(response === "success"){
                    alert('data insert success');
                }else{
                    alert('data insert failse');
                }
            }
        });


    }
</script>
</html>