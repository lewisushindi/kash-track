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
    <h4 class="h-12 flex justify-between align-middle items-center mb-2 px-2 bg-blue-300 text-white">Welcome <?php    echo $_SESSION['uname']; ?> <a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a></h4> 
    Total Earning : <span class="label label-success">
    <?php 
    $today = date("Y-m-d");
    $dtstart = date("1950-m-d");
    $thiyear = date("y-01-01");


    $query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
    $result = $conn->query($query);
        while($psum = $result->fetch_assoc()) 
    {
    $tisum = $psum['SUM(tvalue)']; 
    if ($tisum == '')
    {echo "Add income to display here";}
    else
    {echo $tisum;}
    } 

    ?></span>
    <!-- Today's Expenses Start-->
    <br>Today's Expenses : <span class="label label-danger" id='exptop'><?php 
    // CALL `add`();
    $query = "SELECT SUM(pprice) FROM expense WHERE date = '$today' AND uid='$sid' AND isdel=0"; 
    $result = $conn->query($query);
        while($psum = $result->fetch_assoc()) 
    {
    $tesum = $psum['SUM(pprice)']; 
    if ($tesum== '')
    {echo "No Expense Today";}
    else
    {echo $tesum;}
    } 

    ?></span>
    <!-- Today's Expenses End -->

    <br>Total Expenses : <span class="label label-danger" id='exptop'><?php 
    $query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
    $result = $conn->query($query);
        while($psum = $result->fetch_assoc()) 
    {
        $tesum = $psum['SUM(pprice)']; 
        if ($tesum== '')
        {echo "Add expenses to display here";}
        else
        {echo $tesum;}
    } 
    ?></span>
        <br>Total Balance : <span class="label label-default"><?php $rbalance = $tisum - $tesum;
        //  tisum->
        if ($tisum == '')
        {echo "NIL";}
        else
        {echo $rbalance;}
    ?></span>
</section>
    
</body>
</html>


