<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create Task - Eraasoft</title>
  <?php include("./inc/links.php");  ?>
  <link rel="stylesheet" href="./assets/create_task.css">
</head>

<body>
  <!-- Navbar -->
  <?php include("./inc/nav.php"); ?>

  <!-- Page Header -->
  <div class="page-header">
    <div class="container">
      <h1 class="mb-0">
        <i class="fas fa-plus-circle me-3"></i>Create New Task
      </h1>
      <p class="mb-0 mt-2 opacity-75">Add a new task to your todo list and stay organized</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container main-content">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">
            <i class="fas fa-home me-1"></i>Dashboard
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Tasks</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Create Task</li>
      </ol>
    </nav>

    <div class="form-container">
      <div class="text-center mb-4">
        <i class="fas fa-plus-circle task-icon"></i>
        <h2 class="mb-0">Add New Task</h2>
        <p class="text-muted">Fill in the details below to create a new task</p>
      </div>

      <form action="./index.php?page=store_task" method="post">
        <?php if (!empty($_SESSION['errors'])): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= $error ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
          <div class="alert alert-success">
            <?= $_SESSION['success']; ?>
          </div>
          <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <div class="mb-4">
          <label for="taskInput" class="form-label">
            <i class="fas fa-tasks me-2"></i>Task Description
          </label>
          <input
            type="text"
            class="form-control"
            id="taskInput"
            name="titel"
            placeholder="Enter a clear and descriptive task..."
            maxlength="255" />
          <div class="form-text">
            <i class="fas fa-info-circle me-1"></i>
            Describe what needs to be done clearly and concisely
          </div>
        </div>

        <div class="mb-4">
          <label for="taskPriority" class="form-label">
            <i class="fas fa-flag me-2"></i>Priority Level
          </label>
          <select class="form-control" name="Priority" id="taskPriority">
            <option value="">Select priority level</option>
            <option value="high">High Priority</option>
            <option value="medium">Medium Priority</option>
            <option value="low">Low Priority</option>
          </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="index.php?page=home" class="btn btn-secondary me-md-2">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Task
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include("./inc/footer.php"); ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Enable/disable submit button based on task input
    // document.getElementById('taskInput').addEventListener('input', function() {
    // const submitBtn = document.querySelector('button[type="submit"]');
    //   const taskInput = this.value.trim();

    //   if (taskInput.length > 0) {
    //     submitBtn.disabled = false;
    //     submitBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Add Task';
    //   } else {
    //     submitBtn.disabled = true;
    //     submitBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Add Task';
    //   }
    // });

    // Form submission handler
    // document.querySelector('form').addEventListener('submit', function(e) {
    //   e.preventDefault();

    //   const taskInput = document.getElementById('taskInput').value.trim();
    //   const priority = document.getElementById('taskPriority').value;
    //   const category = document.getElementById('taskCategory').value;
    //   const notes = document.getElementById('taskNotes').value.trim();

    //   if (taskInput) {
    //     // Here you would typically send the data to your backend
    //     alert('Task created successfully!\n\nTask: ' + taskInput + 
    //           '\nPriority: ' + (priority || 'Not specified') + 
    //           '\nCategory: ' + (category || 'Not specified'));

    //     // Redirect to index page
    //     window.location.href = 'index.html';
    //   }
    // });
  </script>
</body>

</html>