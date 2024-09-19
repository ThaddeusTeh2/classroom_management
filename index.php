<?php

  session_start();

  require 'includes/functions.php';

  // load the class files
  require 'includes/class-auth.php';
  require 'includes/class-student.php';

  // initiatise the classes
  $auth = new Auth();
  $studentactions = new StudentActions();

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
      $auth->logout();
      break;


    // Auth
    case '/auth/login':
      $auth->login();
      break;
    case '/auth/signup':
      $auth->signup();
      break;

      // Student Actions
    case '/actions/add':
      $studentactions->add();
      break;
    case '/actions/delete':
      $studentactions->delete();
      break;

    case '/actions/edit':
      $studentactions->edit();
      break;
      
    // Default
    default:
      require 'pages/home.php';
      break;
  }

?>