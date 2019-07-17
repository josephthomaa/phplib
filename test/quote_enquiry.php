<?php

    if(isset($_POST['get_submit'])){

      $name         = $_POST['name'];
      $email        = $_POST['email'];
      $mobile       = $_POST['phone'];
      $location     = $_POST['location'];
      $category     = $_POST['category'];
      $product     = $_POST['product'];
      $decs         = $_POST['requirement'];
      echo "<pre>";print_r($_POST);die;
    }
    ?>