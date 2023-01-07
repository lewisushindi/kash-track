<?php

include("functions.php");

if(isloggedin()==FALSE)
{
header("location:index.php");  
}
else
{
  
}
$sid=$_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <script>
    $(function() {
    $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker2" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker3" ).datepicker({dateFormat: "dd-mm-yy"});

  });
  </script>

   <script> 
        $(document).ready(function() { 
            $('#myForm').ajaxForm(function() { 
                 alert("Given information Successfully Saved"); 
                 location.href = 'home.php';
            }); 
        }); 
    </script>

  <script>
  $(function() {
    $( "#edetail" ).autocomplete({
      source: 'readxp.php'
    });
  });
  </script>
</head>
<body onLoad="document.showexp.edetail.focus()">
    <section>

        <div class="h-12 flex justify-between align-middle items-center mb-2 px-2 bg-blue-600 text-white">
            <div class="flex justify-center items-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <?php echo $_SESSION['uname']; ?> 
            </div>            
            <a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a>
        </div> 






    </section>  
</body>
</html>