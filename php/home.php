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


<div class="flex justify-center">
  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
    <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Card title</h5>
    <p class="text-gray-700 text-base mb-4">
      Page coming soon
    </p>
    <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href='signout.php' class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium md:text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" >Logout</a></button>
  </div>
</div>


