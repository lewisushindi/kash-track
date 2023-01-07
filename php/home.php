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
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    
</body>
</html>
<button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium md:text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a></button>

