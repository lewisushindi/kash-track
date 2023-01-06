<?php
include("functions.php");

$wrongpass = '';
$wronginfo = '<div class="alert alert-danger bg-red-200 h-10 w-68 flex justify-center align-middle items-center my-6 text-red-600" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login details</div>';

if(isloggedin()==FALSE)
{
}
else
{
header("location:home.php");  
  
}
  
  if(isset($_POST['email']) && ($_POST['pass']))
{

$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$query="SELECT * from users where uemail='$email'";
$result = $conn->query($query);

if ($result->num_rows < 1) 
  {
      $wrongpass = $wronginfo;
  }

 while($row = $result->fetch_assoc()) 
    {
  if(md5($pass)==$row['upass'])
  {
    $_SESSION['logged_in']=TRUE;
    $_SESSION['id']=$row['uid'];
    $_SESSION['uname']=$row['uname'];
    session_start();
    header("location:home.php");
  }
  else
   {
    $wrongpass = $wronginfo;
   }
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Log in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#name").keyup(function() {
        var name = $('#name').val();
        if(name=="")
        {
        $("#disp").html("");
        }
        else
        {
        $.ajax({
        type: "POST",
        url: "check.php",
        data: "name="+ name ,
        success: function(html){
        $("#disp").html(html);
        }
        });
        return false;
        }
        });
        });
    </script>
</head>
<body>
    <nav class="fixed w-full h-16 flex flex-wrap items-center justify-between py-3 bg-blue-500 text-white z-40 hover:text-gray-700 focus:text-gray-700 shadow-lg">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
          <div class="container-fluid">
            <a class="text-xl text-white font-semibold" href="#">Kash Track</a>
          </div>          
        </div>
    </nav>

    <section class="h-screen py-16">
        <div class="px-6 h-full text-gray-800">
          <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6" >
            
            <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
              <form name="login" action="login.php" method="post">             
                 

                <?php
                  echo $wrongpass;
                ?>
      
                <!-- user name input -->
                <div class="mb-6">
                  <input
                    type="email" 
                    name="email"
                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="email"
                    placeholder="email"
                    required
                  />
                </div>
      
                <!-- Password input -->
                <div class="mb-6">
                  <input
                    type="password"
                    name="pass"
                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="password"
                    placeholder="Password"
                  />
                </div>
                
      
                <div class="flex justify-between items-center mb-6">
                  <div class="form-group form-check">
                    <input
                      type="checkbox"
                      class="form-check-input  h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                      id="exampleCheck2"
                    >
                   
                    <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                      >Remember me</label
                    >
                  </div>
                  <a href="#!" class="text-gray-800">Forgot password?</a>
                </div>
      
                <div class="text-center lg:text-left">
                  <button
                    type="submit"
                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  >
                    Login
                  </button>
                  <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                    Don't have an account?
                    <a
                      href="index.php"
                      class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                      >Register</a
                    >
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </section>


    
</body>
</html>

