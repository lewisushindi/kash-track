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
    <title>Analytics</title>
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
    <section class="text-sm">
        <div class="h-12 flex justify-between align-middle items-center px-2 bg-blue-600 text-white fixed top-0 left-0 right-0">
            <div class="flex justify-center items-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <?php echo $_SESSION['uname']; ?> 
            </div>            
            <a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a>
        </div>
        <div class="h-16 fixed top-0 left-0 right-0 mt-12 flex justify-between items-center w-full px-2 text-white bg-blue-400">
            <div class="flex items-center justify-center align-middle bg-gray-100 text-blue-500 px-1 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                    <path d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                <a href="#">Expenses</a>
            </div>
            <div class="flex items-center justify-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                    <path fill-rule="evenodd" d="M1 4a1 1 0 011-1h16a1 1 0 011 1v8a1 1 0 01-1 1H2a1 1 0 01-1-1V4zm12 4a3 3 0 11-6 0 3 3 0 016 0zM4 9a1 1 0 100-2 1 1 0 000 2zm13-1a1 1 0 11-2 0 1 1 0 012 0zM1.75 14.5a.75.75 0 000 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 00-1.5 0v.784a.272.272 0 01-.35.25A49.043 49.043 0 001.75 14.5z" clip-rule="evenodd" />
                </svg>
                <a href="#">Income</a>
            </div>
            <div class="flex items-center justify-center align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                    <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 01.652 0l7.25 3.5A.75.75 0 0117 6.957V16.5h.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H3V6.957a.75.75 0 01-.576-1.382l7.25-3.5zM11 6a1 1 0 11-2 0 1 1 0 012 0zM7.5 9.75a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5zm3.25 0a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5zm3.25 0a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5z" clip-rule="evenodd" />
                </svg>
                <a href="#">Trends</a>
            </div>

        </div>


        <?php
            if (!empty($_POST["endd"])) {
            $dstart = $_POST['startd'];
            $dend = $_POST['endd'];

            $dstart = strtotime($dstart);
            $dend = strtotime($dend);

            $dstart= date('Y-m-d', $dstart);
            $dend = date('Y-m-d', $dend);
            }
            else
            {
                $dstart = date("Y-m-01");
                $dend = date("Y-m-d");
            }
            $expdetail = '';
            if(!empty($_POST['expdetail']))
            {
            $expdetail = mysqli_real_escape_string($conn, $_POST['expdetail']);
            }
            $dstartn = strtotime($dstart);
            $dstartn = date('d M Y', $dstartn);
            $dendn = strtotime($dend);
            $dendn = date('d M Y', $dendn);
        ?>

        <div class="flex flex-col p-1 bg-blue-100 min-h-screen mt-28 pb-12">
            <section>
                <h4 class="mb-2">
                    Expense Report from <?php echo $dstartn; ?> - <?php echo $dendn; ?>
                </h4>
            </section>
          
            <div class="flex justify-between items-center">
                <div class="flex flex-col justify-center items-center w-full h-12 bg-blue-200 border-r-2 border-solid border-r-zinc-50" >Date</div>
                <div class="flex flex-col justify-center items-center w-full h-12 bg-blue-200 border-r-2 border-solid border-r-zinc-50">Expense</div>      
                <div class="flex flex-col justify-center items-center w-full h-12 bg-blue-200">amount</div>
            </div>
            <?php 

            $sql = "SELECT * FROM expense WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND pname LIKE '%$expdetail%' AND isdel=0 ORDER by date ";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                while($row = $result->fetch_assoc()) 
                {
                $exdate = strtotime($row["date"]);
                $exdate = date('d M Y', $exdate);
                    echo "<div class='flex justify-between items-center w-full h-auto'> <div class='flex flex-col justify-center items-center w-full h-14 bg-blue-300  border-b-2 border-solid border-b-white border-r-2 border-r-zinc-50'> " . $exdate. "</div> <div class='flex justify-center flex-col items-center w-full bg-blue-300 h-14 border-b-2 border-solid border-b-white border-r-2 border-r-zinc-50'> " . $row["pname"]. " </div> <div class='flex flex-col justify-center align-middle items-center bg-blue-300 w-full h-14 border-b-2 border-solid border-b-white'> Kshs ". $row["pprice"]. "</div> </div>";
                }
            } else {
                    echo "<div class='flex justify-center items-center '> <div> </div> <div class='alert alert-danger' role='alert'> No Expense in given Dates </div><div> </div></div>";
            }
     

            ?>     
            

        </div>


        <div class="flex justify-between fixed left-0 bottom-0 right-0 items-center h-11 text-white bg-blue-600 align-middle px-4">
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
                <div class="flex"><a href="wallet.php">Wallet</a></div>            
            </div>
            <div class="flex flex-col justify-center align-middle items-center">
                <div class="img">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                    </svg>
                </div>
                <div class="flex"><a href="analytics.php">Analytics</a></div>                      
            </div>
        </div>

    </section>  
</body>
</html>