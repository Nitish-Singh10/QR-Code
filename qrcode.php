<?php

    include('phpqrcode/qrlib.php');
    require_once('config.php');
    
    // Getting Values from Form
    $Name = $_POST['Name'];
    $Designation = $_POST['Designation'];
    $NOC = $_POST['NOC'];
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $pname= "Name:- $Name.".`<br>`.
    "Designation:- $Desigination".`<br>`.
    "Name of Company:- $NOC.".`<br>`.
    "Address:- $Address.".`<br>`.
    "Phone:- $Phone.".`<br>`.
    "Email:- $Email";
    
    $path = 'image/';
    $file = $path.$Name.".png";

    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 10;

    $query = "INSERT INTO Registration VALUES('','$Name','$Designation','$NOC','$Address','$Phone','$Email','$file')";
    // mysqli_query($mysqli,$query);
    if($mysqli->query($query)==true)
    {
        Qrcode::png($pname,$file,$ecc,$pixel_Size,$frame_Size);
        header('location:index.php?msg=data added successfully');
    }
    else{
        header('location:index.php?msg=data failed ');
    }
    
   

    
?>