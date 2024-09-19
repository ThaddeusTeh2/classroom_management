<?php

class StudentActions {

    public $database;

    function __construct() {
        $this->database = connectToDB();
    }

    //add
    public function add() {

        $name = $_POST["student_name"];

        // 1. check whether the user insert a name
        if ( empty( $name ) ) {
            echo "Please insert a name";
        } else {
            // 2. add the student name to database
            // 2.1 (recipe)
            $sql = 'INSERT INTO students (`name`) VALUES (:name)';
            // 2.2 (prepare)
            $query = $this->database->prepare( $sql );
            // 2.3 (execute)
            $query->execute([
                'name' => $name
            ]);
            
            // 3. redirect the user back to index.php
            header("Location: /home");
            exit;
        }
    }

    //delete
    public function delete() {

        $id = $_POST["student_id"];

    // delete the selected student from the table using student ID
    // sql command (recipe)
    $sql = "DELETE FROM students where id = :id";
    // prepare 
    $query = $this->database->prepare( $sql );
    // execute
    $query->execute([
        'id' => $id
    ]);

    // redirect back to index.php
    header("Location: /home");
    exit;
    }

    public function edit() {

    $name = $_POST["student_name"];
    $id = $_POST["student_id"];

    // check if name is not empty
    if ( empty( $name ) ) {
        echo 'Please insert a name';
    } else {
        // update the name of the student
        // sql command (recipe)
        $sql = "UPDATE students SET name = :name WHERE id = :id";
        // prepare
        $query = $this->database->prepare( $sql );
        // execute
        $query->execute([
            'name' => $name,
            'id' => $id
        ]);

        // redirect
        header("Location: /home");
        exit;
    }
    }
}
