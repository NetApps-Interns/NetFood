<?php
    $id=$_GET['id'];

    $sql="SELECT * FROM tbladmin WHERE id=$id";

    $res=mysqli_query($db, $sql);

    if($res==TRUE){
        $count = mysqli_num_rows($res);

        if($count==1){

        }
        else{

        }
    }
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $sql= "UPDATE tbladmin SET
         admin_full_name='$name',
            email_address='$email',
            contact='$contact'
            WHERE id='$id'
        ";

        $res = mysqli_query($db, $sql);
    }
?>