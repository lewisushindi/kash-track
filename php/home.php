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
<section class=" h-screen overflow-y-hidden">

    <section class="bg-blue-300 pb-4">
        <div class="h-12 flex justify-between align-middle items-center mb-2 px-2 bg-blue-600 text-white">
            <div class="flex justify-center items-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <?php echo $_SESSION['uname']; ?> 
            </div>            
            <a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a>
        </div> 
        <div class="flex flex-col  pl-4">
            <div class="flex">
                <p class="flex mr-4 justify-center items-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>

                    Total Earning :
                </p> 
            
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
                    {echo "Nil";}
                    else
                    {echo $tisum;}
                    } 
                    ?>
                </span>
            </div>       

            <!-- Today's Expenses Start-->        
            <div class="flex">
                <p class="flex mr-4 justify-center items-center align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Today's Expenses :
                </p> 
                <span class="label label-danger" id='exptop'>
                    <?php 
                        // CALL `add`();
                        $query = "SELECT SUM(pprice) FROM expense WHERE date = '$today' AND uid='$sid' AND isdel=0"; 
                        $result = $conn->query($query);
                            while($psum = $result->fetch_assoc()) 
                        {
                        $tesum = $psum['SUM(pprice)']; 
                        if ($tesum== '')
                        {echo "Nil";}
                        else
                        {echo $tesum;}
                        } 
                    ?>
                </span>
            </div>        

            <!-- total expenses start -->     
            <div class="flex">
                <p class="flex mr-4 justify-center items-center align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Total Expenses :
                </p> 
                <span class="label label-danger" id='exptop'>
                    <?php 
                        $query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
                        $result = $conn->query($query);
                            while($psum = $result->fetch_assoc()) 
                        {
                            $tesum = $psum['SUM(pprice)']; 
                            if ($tesum== '')
                            {echo "Nil";}
                            else
                            {echo $tesum;}
                        } 
                    ?>
                </span>
            </div>
            
            <!-- total balance start -->            
            <div class="flex">
            <p class="flex mr-4 justify-center items-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
                    Total Balance :
                </p>   
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
        
    <section class="bg-blue-300">
        <div class="col-md-6 pt-2 px-4 bg-white pb-4 rounded-t-3xl">
            <div class="panel panel-warning">
                <div class="panel-heading mb-2">
                    <span class="glyphicon glyphicon-copy" aria-hidden="true"></span>
                    <p>Add Expense/Income Detail</p> 
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
                                <div class="flex mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>

                                <input type="text" class="form-control" size="20"  name="entrydate" required placeholder="Choose Date" id="datepicker3" readonly  aria-label="..." value="<?php $thisday = strtotime($today);
                                    $thisday= date('d-m-Y', $thisday); echo $thisday; ?>">
                                </div>

                                <div class="flex flex-col mt-2">
                                <input type="text" class="form-control mb-2 p-3 bg-blue-100 h-8 text-black" size="20" id="edetail"   name="edetail" required placeholder="Enter Detail/Source" title="Please Enter Source"  aria-label="..." autofocus>
                                <input type="text" class="form-control mb-2 p-3 bg-blue-100 h-8 text-black" size="20" id="eamount" name="eamount" required placeholder="Enter Amount" aria-label="..." title="Please enter Amount"  onkeypress="return isNumberKey(event)"  >
                                </div>
                        </div>

                        <div class="input-group flex flex-col">
                            <span class="input-group-addon mb-2">Choose Type:
                                <label><input type="radio"  name="enttype"  value="1" aria-label="..." checked="">Expense</label>
                                <label><input type="radio" name="enttype"   value="2" aria-label="...">Income</label>
                            </span>
                            <span class="input-group-btn mt-2 flex justify-center items-center align-middle">
                                <button  type="submit" class="btn bg-blue-600 w-24 h-8" onClick="window.location.reload()" ><p class="text-white">Save</p>  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
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
    
    <div class="flex justify-between absolute left-0 bottom-0 right-0 items-center h-11 text-white bg-blue-600 align-middle px-4">
        <div class="flex flex-col justify-center align-middle items-center" >
            <div class="img mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <div class="flex"><a href="home.php">Book</a></div>            
        </div>
        <div class="flex flex-col justify-center align-middle items-center">
            <div class="img mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                </svg>
            </div>
            <div class="flex">Wallet</div>            
        </div>
        <div class="flex flex-col justify-center align-middle items-center">
            <div class="img">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                </svg>
            </div>
            <div class="flex">Analytics</div>            
        </div>
    </div>

</section>
</body>
</html>


