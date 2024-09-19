<?php
  // Connecting to database   
  $database = connectToDB();

  // Get students data from the database
  // SQL command (recipe)
  $sql = "SELECT * FROM students";
  // Prepare SQL query (prepare your material)
  $query = $database->prepare($sql); 
  // Execute SQL query (to cook)
  $query->execute();
  // Fetch all the results (eat)
  $students = $query->fetchAll();
?>
<?php require "parts/header.php"; ?>
    <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px">
      <div class="card-body">
        <h3 class="card-title mb-3">My Classroom</h3>
        <?php if ( isset( $_SESSION['user'] ) ) : ?>
          <h4>Welcome back, <?= $_SESSION['user']['name']; ?></h4>
          <a href="/logout">Logout</a>
          <form method="POST" action="/actions/add">
            <div class="mt-4 d-flex justify-content-between align-items-center">
              <input
                type="text"
                class="form-control"
                placeholder="Add new student..."
                name="student_name"
              />
              <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
            </div>
          </form>
        <?php else : ?>
          <p>Please login to continue</p>
          <a href="/login">Login</a>
          <a href="/signup">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>

    <?php if ( isset( $_SESSION['user'] ) ) : ?>
      <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px">
        <div class="card-body">
          <h3 class="card-title mb-3">Students</h3>
          <?php foreach ($students as $index => $student) : ?>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <h5 class="me-1"><?= $index+1; ?>.</h5>
              <div class="d-flex gap-1 w-100">
                <!-- UPDATE -->
                <form
                  method="POST"
                  action="/actions/edit"
                  >
                  <input type="text" name="student_name" value="<?= $student["name"]; ?>" style="width: 300px;" />
                  <input type="hidden" name="student_id" value="<?= $student["id"]; ?>" />
                  <button class="btn btn-success btn-sm">Update</button>
                </form>
                <!-- DELETE -->
                <form
                  method="POST"
                  action="/actions/delete"
                  >
                  <input type="hidden" name="student_id" value="<?= $student["id"]; ?>" />
                  <button class="btn btn-danger btn-sm">Delete</button>
                </form>  
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
<?php require "parts/footer.php"; ?>