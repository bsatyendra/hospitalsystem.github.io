<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="hospital.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!--for using font-->
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/0a6ac5076a.js" crossorigin="anonymous"></script>

<title>Institute</title>
</head>

<body>
    <header class="header " id="head">
        <section id="nav">

            <nav class="navbar navbar-expand-lg navbar-dark bg-aquamarine;" id="secnav">
                <div class="col-sm-2">
                    <div id="div1">
                        <img src="logo.jpg" alt="">
                        <p class="">SAMAGRA CARE</p>
                    </div>
                </div>
                <div class="container-fluid col-sm-4" id="">



                    <a href="" class="navbar-brand"><i class="fa fa-home" aria-hidden="true"></i>HOME</a>
                    <a href="#sec2" class="navbar-brand">ABOUT US</a>
                    <a href="#services" class="navbar-brand">SERVICES</a>

                    <a href="create.php" class="navbar-brand">LOGIN</a>
                    <a href="#Aout_s" class="navbar-brand">CONTACT US</a>

                </div>
                <div class="col-sm-2">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" id="bu">Search</button>
                    </form>
                </div>
            </nav>
        </section>
    </header>
    <section id="home">
        <div class="col-sm-4">
            <h2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</h2>
        </div>

        <div class="col-sm-4" id="home1">
            <form action="" class="" method="post">
                <h4>Register Here</h4>
                <?php
//$showError=false;

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="hospital";
//make connection with database
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if($conn)
{
    //echo "connection successfully"."<br>";
}
if(!$conn)
{
  //die("connection failed").mysqli_connect_error();
}

//submit button action
//we will see the value of name of button
if(isset($_REQUEST["submit"])){
   

    //insert data in database by user by filling all field of form
    if(($_REQUEST["name"] =="") || ($_REQUEST["mobile"]=="") || ($_REQUEST["role"]=="") || ($_REQUEST["email"]=="")||($_REQUEST["pass"]=="") || ($_REQUEST["cpass"]==""))
     {
       
        echo '<div class="alert alert-danger" id="alertfill">
        <strong>fill all fields!</strong>
         </div>'."<br>";
    
       // echo "submit button clicked"."<br>";*/
        
    }
   else
     {
    $name=$_REQUEST["name"];

    $mobile=$_REQUEST["mobile"];
    $role=$_REQUEST["role"];
    $email=$_REQUEST["email"];
    $pass=$_REQUEST["pass"];
    $cpass=$_REQUEST["cpass"];
//this 3 lines for checking that email exist or not in database
   $existsql= "SELECT * FROM employee1 WHERE email = '$email'" ;
   $result=mysqli_query($conn,$existsql);
   $numExistRows=mysqli_num_rows($result);
   if($numExistRows>0)
//if($result>0)
     {
  //  $showError= "this username is already exist";
       echo '<div class="alert alert-danger"id="alertExist">
       <strong>error !</strong> This email is already Exists.
      </div>';
     }
   else
      {
 

     if( $pass!== $cpass)
     {
        //  $showError= "this username is already exist";
             echo '<div class="alert alert-danger">
             <strong>error !</strong> Conform password is not matched.
            </div>';
           }
         else
         {
          // insert data in data base using query
          $sql= "INSERT INTO employee1 (`name`, `mobile`, `role`, `email`, `password`, `dt`) VALUES ('$name', '$mobile', '$role', '$email', '$pass', current_timestamp())";

          if(mysqli_query($conn,$sql))
           {
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Your Account is created successfully you can login.
            </div>';
           }
          else
             {
             echo "unable to insert data"."<br>";
             }
  }

}

}
}

?>



                <div class="col-sm-10">
                    <div class="row" id="register">

                        <form action="usersat.php" method="POST">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" name="mobile" placeholder="Enter your mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role">
                                    <option value="empolyee1">employee1</option>
                                    <option value="employee2">employee2</option>
                                    <option value="employee3">employee3</option>
                                    <option value="employee4">employee4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" placeholder="Enter your mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password:</label>
                                <input type="text" name="pass" placeholder="Enter your password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cpass">Conform Password:</label>
                                <input type="text" name="cpass" placeholder="Enter your confirm password"
                                    class="form-control">
                            </div>

                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" name="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </form>

                    </div>



    </section>

    <section class="About" id="sec2">
        <h2 class="h2">ABOUT US</h2>
        <div class="ser">

            <div class="col-sm-6">
                <div class="about_hp">
                    <h2 class="h2">Welcome to samagra care</h2>
                    <img src="amb.jpg" alt="">
                    <p2 class="img2">Welcome to samagra care</p2>
                    <img src="hub.jpg" alt="" id="img2">
                    <p3 class="img2">Welcome to samagra care</p3>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="care">
                    <h2 class="h2">Welcome to samagra care</h2>
                    <div>Welcome to samagra care</div>
                    <div>Welcome to samagra care</div>

                    <div id="sat">HOSPITAL



                    </div>
                    <p1>Samagra care Hospital is a 150 bedded multidisciplinary super speciality hospital situated in
                        Jabalpur, Madhya Pradesh. The hospital has been established by a group of dedicated doctors who
                        have come together with the theme of providing high-quality healthcare services at an affordable
                        cost.


                        The hospital over the last decade has a proven credential of delivering best of healthcare
                        services to its patients. All over the years, Aditya hospital has gained popularity and faith
                        amongst thousands of patients.


                        The hospital and its team of doctors, paramedical staff and administrative staff try its level
                        best to provide treatment and services to one and all. Aditya super speciality hospital boasts
                        of high-end technology and equipment which is unmatched in Central India. Hence, we all assure
                        you of our best services in every discipline.

                        " Assuring our best services "</p1>
                </div>
            </div>
        </div>
    </section>

    <section class="About" id="services">
        <h2 class="h2">SERVICES</h2>
        <div class="ser">
            <div class="col-sm-6">
                <div class="about_hp">
                    <h2 class="h2">Welcome to samagra care</h2>
                    <img src="hub.jpg" alt="" id="img2">
                    <p2 class="img2">Welcome to samagra care</p2>
                    <img src="hub.jpg" alt="" id="img2">
                    <p3 class="img2">Welcome to samagra care</p3>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="care">
                    <h2 class="h2">Welcome to samagra care</h2>
                    <div>Welcome to samagra care</div>
                    <div>Welcome to samagra care</div>

                    <div id="sat">HOSPITAL



                    </div>
                    <p1>Samagra care Hospital is a 150 bedded multidisciplinary super speciality hospital situated in
                        Jabalpur, Madhya Pradesh. The hospital has been established by a group of dedicated doctors who
                        have come together with the theme of providing high-quality healthcare services at an affordable
                        cost.


                        The hospital over the last decade has a proven credential of delivering best of healthcare
                        services to its patients. All over the years, Aditya hospital has gained popularity and faith
                        amongst thousands of patients.


                        The hospital and its team of doctors, paramedical staff and administrative staff try its level
                        best to provide treatment and services to one and all. Aditya super speciality hospital boasts
                        of high-end technology and equipment which is unmatched in Central India. Hence, we all assure
                        you of our best services in every discipline.

                        " Assuring our best services "</p1>
                </div>
            </div>
        </div>
    </section>
    <section class="About" id="">
        <h2 class="h2">SERVICES</h2>
        <div class="ser">
            <div class="col-sm-4">

                <h2 class="h2">Welcome to samagra care</h2>
                <div class="imagep">
                    <img src="in.jpg" alt="" class="img">
                    <p3 class="img2">Welcome to samagra care</p3>
                </div>
            </div>
            <div class="col-sm-4">

                <h2 class="h2">Welcome to samagra care</h2>
                <div class="imagep">
                    <img src="ope.jpg" alt="" class="img">
                    <p3 class="img2">Welcome to samagra care</p3>
                </div>
            </div>
            <div class="col-sm-4">

                <h2 class="h2">Welcome to samagra care</h2>
                <div class="imagep">
                    <img src="op.jpg" alt="" class="img">
                    <p3 class="img2">Welcome to samagra care</p3>
                </div>
            </div>

        </div>
    </section>

    <section id="services">
        <h2 class="h2">SERVICES</h2>
        <div class="ser">


            <div class="col-sm-6">
                <h2 class="h2">Welcome to samagra care</h2>
                <img src="hub.jpg" alt="" id="img3">
            </div>
            <div class="col-sm-6">
                <h2 class="h2">Welcome to samagra care</h2>
                <img src="piza.jpg" alt="" id="img3">

            </div>
        </div>

    </section>


    <section id="sidh">
        <h2 class="h2"> samagra care</h2>
        <img src="hub.jpg" alt="" id="img2">
    </section>



    <section id="Aout_s">
        <h2 class="h3"> Contact Us</h2>
        <div class="icons">


            <a href="https://www.facebook.com/satyendra.baghel.982/" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="https://www.linkedin.com/in/satyendra-baghel-b87aa91ba/" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/bsatyendra84/" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-github"></a>
        </div>

    </section>


    <section id="con">
        <div class="col-sm-4">
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
        </div>
        <div class="col-sm-4">
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
        </div>

        <div class="col-sm-4">
            <p2 class="colorchange ">SUBHASHCHANDRA CITY HOSPITAL</p2>
        </div>
    </section>
    <section id="sit">

        <div id="numbers">
            <h5><i class="fa fa-phone-square" aria-hidden="true"></i>6260543185</h5>
            <h6><i class="fa fa-envelope-o" aria-hidden="true"></i></i>bsatyendra84@gmail.com</h6>
        </div>
        <h1>
            <marquee>SAMAGRA CARE,PHONE:6260543185</marquee>
        </h1>

    </section>
</body>

</html>