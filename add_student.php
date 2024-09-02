<?php
  // put your backend code

  // 1. collect database info
  // $host = "localhost"; // for windows user
  // $host = "127.0.0.1";  // for mac user
  $host ="127.0.0.1";
  $database_name = "classroom_management"; // connecting to which database 
  $database_user = "root";
  $database_password = "";

   // 2. connect to database (PDO - PHP database object)
   $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password
  );

  // 3. get students data from the database
  // 3.1 - SQL command (recipe)
  $sql = "SELECT * FROM students";
  // 3.2 - prepare SQL query (prepare your material)
  $query = $database->prepare($sql); 
  // 3.3 - execute SQL query (to cook)
  $query->execute();
  // 3.4 - fetch all the results (eat)
  $students = $query->fetchAll();


  
  $name = $_POST["student_name"];

  if ( empty( $name ) ) {
    echo "Please insert a name";
} else {
    // 2. add the student name to database
    // 2.1 (recipe)
    $sql = 'INSERT INTO students (`name`) VALUES (:name)';
    // 2.2 (prepare)
    $query = $database->prepare( $sql );
    // 2.3 (execute)
    $query->execute([
        'name' => $name
    ]);
    
    // 3. redirect the user back to index.php
    header("Location: index.php");
    exit;
}