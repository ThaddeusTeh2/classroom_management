<?php

  session_start();

  require 'includes/functions.php';

  // load the class files
  require 'includes/class-auth.php';

  // initiatise the classes
  $auth = new Auth();

  //figure out the url the user is visiting
  $path = $_SERVER["REQUEST_URI"];
  // remove all the query strings(remove ? from edit)
  $path = parse_url($path, PHP_URL_PATH);

  switch ($path) {
    // Pages
    case '/login':
      require 'pages/login.php';
      break;
    case '/signup':
      require 'pages/signup.php';
      break;

      case'/logout';
      require 'pages/logout.php';
      break;

    // Student
    case '/student/add':
      require 'includes/student/add.php';
      break;
    case '/student/edit':
      require 'includes/student/edit.php';
      break;
    case '/student/delete':
      require 'includes/student/delete.php';
      break;

    // Auth
    case '/auth/login':
      $auth->login();
      break;
    case '/auth/signup':
      $auth->signup();
      break;
      
    // Default
    default:
      require 'pages/home.php';
      break;
  }

?>