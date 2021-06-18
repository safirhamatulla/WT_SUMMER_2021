<?php
$Name="";
$email="";
$Comment="";
$validatepassword="";
$validatecomment="";
$validateradio="";
$validatecheckbox="";
$v1=$v2=$v3="";
$validateemail="";
$Password="";
$validatefile="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$Name=$_REQUEST["name"]; 
$email=$_REQUEST["email"]; 
$Comment=$_REQUEST["comment"];
$Password=$_REQUEST["password"];

if(empty($Name) || strlen($Name)<8) 
{
    $Name="Your name is ".$Name;
}

else if(empty($Name))
{
    $Name="Name Cant be empty ";
}
else if( strlen($Name)<8)
{
    $Name="Your Name Must contain 7 character";
}
else if(empty($Name) &&  strlen($Name)>=8)
{
    $Name="Invalid Name format";
}



if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $validateemail="You Must Enter Valid Email";
}
else{
    $validateemail= "Your Email is ".$email;
}


if(strlen($Password)<8)
{
    $validatepassword=" Password Must Contain 8 character";
}
else{
    $validatepassword=$Password;
}



if(strlen($Comment)<15)
{
    $validatecomment=" Comment Must Contain 15 character";
}
else{
    $validatecomment=$Comment;
}

if(isset($_REQUEST["gender"]))
{
    $validateradio= "Gender - ".$_REQUEST["gender"];
}
else{
    $validateradio= "Please Select Your Gender";
}



if(!isset($_REQUEST["Dancing"])&&!isset($_REQUEST["Singing"])&&!isset($_REQUEST["Reading"]))
{
    $validatecheckbox = "Please Select One Checkbox";
    
}
else{
    $validatecheckbox="Your Selected Hobby : ";
   if(isset($_REQUEST["Dancing"]))
   {
       $v1= $_REQUEST["Dancing"];
       $validatecheckbox=$validatecheckbox.$v1;
   }
   if(isset($_REQUEST["Singing"]))
   { 
       $v2= $_REQUEST["Singing"];
       $validatecheckbox=$validatecheckbox.$v2;
   }
   if(isset($_REQUEST["Reading"]))
   {
    $v3= $_REQUEST["Reading"];
    $validatecheckbox=$validatecheckbox.$v3;
   }

   $target_dir = "files/";
   $target_file ="files/" . $_FILES["filetoupload"]["name"];
   
   
   
       if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
          echo $_FILES["filetoupload"]["type"];
       } else {
           echo "Sorry, there was an error uploading your file.";
       }
      
}
} 
 ?>