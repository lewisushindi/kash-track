

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>
 
    <nav class="fixed w-full h-16 flex flex-wrap items-center justify-between py-3 z-40 bg-blue-500 text-white hover:text-gray-700 focus:text-gray-700 shadow-lg">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
          <div class="container-fluid">
            <a class="text-xl text-white font-semibold" href="#">Kash Track</a>
          </div>          
        </div>
    </nav>
    
    <section class="vh-100 pt-20" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4" action="register.php" method="post">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="fname" class="form-control" autocomplete="off" name="fname"  />
                            <label class="form-label" for="fname">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="name" autocomplete="off" class="form-control" />
                            <label class="form-label" for="email">Your Email</label>
                            <div id="disp"></div>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="inputPassword3" name="password"  name="password"  class="form-control" required />
                            <label class="form-label" for="inputPassword3">Password</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4cd" class="form-control" />
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                          </div>
                        </div>
      
                        <div class="form-check d-flex justify-content-center mb-2">
                          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                          <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                          
                        </div>
                        <p class="text-sm font-semibold mt-2 ml-6 pt-1 mb-5">
                            Already have an account?
                            <a
                              href="login.html"
                              class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                              >Log in</a
                            >
                        </p>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <div class="flex space-x-2 justify-center">
                                <button
                                  type="submit"
                                  data-mdb-ripple="true"
                                  data-mdb-ripple-color="light"
                                  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                >Register</button>
                              </div>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <?php

          if(isset($_POST['email']) && trim($_POST['password']) != "")
          {

          $email= mysqli_real_escape_string($conn, $_POST['email']);
          $query="SELECT * from users where uemail='$email'";
          $result = $conn->query($query);
          if ($result->num_rows < 1) 
            {
          $uname = mysqli_real_escape_string($conn, $_POST['fname']);
          $uname = strip_tags($uname);
          $uemail = mysqli_real_escape_string($conn, $_POST['email']);
          $uemail = strip_tags($uemail);
          $upass = mysqli_real_escape_string($conn, $_POST['password']);
          $upass = md5($upass);

          $sql = "INSERT INTO users (uname, uemail, upass)
          VALUES ('$uname','$uemail','$upass')";
          if ($conn->query($sql) === TRUE) 
            {
            echo '<div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Your account has been created successfully!
          </div>';
            } else 
            {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else
          {
            echo '<div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> You already have an account and can access from login form
          </div>';
          }
          }
      ?>

    <div class="alert alert-info" role="alert"> </div>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
    ></script>
</body>
</html>
