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
<section class="bg-blue-300 h-screen">

    <section class="bg-blue-300 pb-4">
        <h4 class="h-12 flex justify-between align-middle items-center mb-2 px-2 bg-blue-600 text-white">Welcome <?php 
        echo $_SESSION['uname']; ?> <a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a></h4> 
        <div class="flex flex-col  pl-4">
            <div class="flex">
                <p class="mr-2">Total Earning :</p>
            
                <span class="label label-success">
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
                    ?>
                </span>
            </div>       

            <!-- Today's Expenses Start-->        
            <div class="flex">
                <p class="mr-4"> Today's Expenses : </p> 
                <span class="label label-danger" id='exptop'>
                    <?php 
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
                    ?>
                </span>
            </div>        

            <!-- total expenses start -->     
            <div class="flex">
                <p class="mr-4">Total Expenses :</p> 
                <span class="label label-danger" id='exptop'>
                    <?php 
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
                    ?>
                </span>
            </div>
            
            <!-- total balance start -->            
            <div class="flex">
                <p class="mr-4">Total Balance :</p>  
                <span class="label label-default">
                    <?php $rbalance = $tisum - $tesum;
                        //  tisum->
                        if ($tisum == '')
                        {echo "NIL";}
                        else
                        {echo $rbalance;}
                    ?>
                </span>
            </div>
            <!-- total balance end -->
        </div>
    </section>
        

    <div class="col-md-6 pt-2 px-4 bg-white pb-4 rounded-t-3xl">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Add Expenses/Income Detail
        </div>
        <div class="panel-body">

            <form action="home.php" class="form-horizontal"  name="showexp" method="post" id="myForm" >
            <div class="col-lg-8">
                <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
                        return false;
                        return true;
                    }    
                </script>
                <div class="flex flex-col">
                        <div class="flex">
                        <input type="text" class="form-control" size="20"  name="entrydate" required placeholder="Choose Date" id="datepicker3" readonly  aria-label="..." value="<?php $thisday = strtotime($today);
                            $thisday= date('d-m-Y', $thisday); echo $thisday; ?>">
                        </div>

                        <div class="flex flex-col mt-2">
                        <input type="text" class="form-control mb-2 p-3 bg-blue-100 h-8 text-black" size="20" id="edetail"   name="edetail" required placeholder="Enter Detail/Source" title="Please Enter Source"  aria-label="..." autofocus>
                        <input type="text" class="form-control mb-2 p-3 bg-blue-100 h-8 text-black" size="20" id="eamount" name="eamount" required placeholder="Enter Amount" aria-label="..." title="Please enter Amount"  onkeypress="return isNumberKey(event)"  >
                        </div>
                </div>

                <div class="input-group flex flex-col">
                    <span class="input-group-addon">Choose Type:
                        <label><input type="radio"  name="enttype"  value="1" aria-label="..." checked="">Expense</label>
                        <label><input type="radio" name="enttype"   value="2" aria-label="...">Income</label>
                    </span>
                    <span class="input-group-btn mt-2 flex justify-center items-center align-middle">
                        <button  type="submit" class="btn bg-blue-600 w-24 h-8" ><p class="text-white">Save</p>  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                    </span>
                </div>  
            </div>
            </form>

            <?php
            $uid=$sid;
            if(isset($_POST["entrydate"]) && trim($_POST["entrydate"]) != "") 
                {

                $entrydate = $_POST["entrydate"];
                $entrydate = strtotime($entrydate);
                $entrydate= date('Y-m-d', $entrydate);
                $enttype = mysqli_real_escape_string($conn, $_POST["enttype"]);
                $edetail = mysqli_real_escape_string($conn,$_POST["edetail"]);
                $eamount = mysqli_real_escape_string($conn, $_POST["eamount"]);
                $edetail = strip_tags($edetail);
                $eamount = strip_tags($eamount);
                $eamount = floatval($eamount);

                if (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "1") 
                        
                {
            $sql = "INSERT INTO expense (pname, pprice, uid, date )
            VALUES ('$edetail','$eamount','$uid','$entrydate')";
            if ($conn->query($sql) === TRUE) 
            {
                echo "";
            } 

            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
                }

                elseif (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "2") 
                {
            $sql = "INSERT INTO income (income, tvalue, uid, date )
            VALUES ('$edetail','$eamount','$uid','$entrydate')";
            if ($conn->query($sql) === TRUE) {

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

                }

                }


            ?>

        </div>  
        </div>
    </div>
    

</section>
</body>
</html>


