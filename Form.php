<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        <br>
        <label>Email</label>
        <input type="text" name="email" class="form-control">
        <br>
        <label>Gender</label>
        <span>Male:</span>
        <input type="radio" name="gender" value="male">
        <span>Female:</span>
        <input type="radio" name="gender" value="female">
        <label for="gender" class="error"></label>
        <br>

        <select name="religion" id="" class="form-control">
        
            <option value="">Select Your Religion</option>
            <option value="Islam">Islam</option>
            <option value="Christian">Christian</option>
        </select>
        <br>

        <label>Password</label>
        <input type="text" name="password" class="form-control" id="kuchbhi">
        <br>

        <label>Confirm Password</label>
        <input type="text" name="confirmpassword" class="form-control">
        <br>
        <label>Enter age</label>
        <input type="text" name="age" class="form-control">
        <br>
        <button type="submit" name="submit" class="btn btn-primary">submit</button>
    </form>
    </div>

    <?php
        require_once("connection.php");
        if (isset($_POST["submit"])) 
        {
        $name =$_POST["name"];
        $email =$_POST["email"];
        $gender =$_POST["gender"];
        $religion =$_POST["religion"];
        $password =$_POST["password"];

        $slect = "INSERT INTO `user`(`name`, `email`, `gender`, `religion`, `password`) 
        VALUES('$name','$email','$gender','$religion','$password')";
        $exec = mysqli_query($con,$slect);
        if($exec == true)
        {
        echo " <script>alert('data gone successfully')</script>";
        }
        else
        {
            echo " <script>alert('data not  gone successfully')</script>";
        }
    }
     ?>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="validation/dist/jquery.validate.js"></script>
<script src="validation/dist/additional-methods.js"></script>


<script>
    $(document).ready(function(){
        $.validator.addMethod("BasitRehmani",function(value){
            return /^[A-Za-z_ ]{1,15}$/.test(value);
        },"GET LOST")
        $("form").validate({
            rules:{
                "name":{
                    required:true,
                    BasitRehmani:true
                },
                "email":{
                    required:true,
                    email:true
                },
                "gender":{
                    required:true
                },
                "religion":{
                    required:true
                },
                "password":{
                    required:true
                },
                 "confirmpassword":{
                    required:true,
                    equalTo:"#kuchbhi"
                },
                "age":{
                    required:true,
                    digits:true,
                    min:19,
                    max:30
                }
            }
        })
    })

</script>
</body>
</html>