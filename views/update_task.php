<?php
if (isset($_GET['task_id'])) {
  # code...
  $id = $_GET['task_id'];
  $sql = "SELECT * FROM `tasks`WHERE id=$id";
  $res = mysqli_query($conn, $sql);
  $task = mysqli_fetch_assoc($res);
} else {
  die("400 bad request");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Task - Eraasoft</title>
  <?php include("./inc/links.php");  ?>
  <link rel="stylesheet" href="./assets/update_task.css">
</head>

<body>
  <!-- Navbar -->
  <?php include("./inc/nav.php"); ?>


  <!-- Page Header -->
  <div class="page-header">
    <div class="container">
      <h1 class="mb-0">
        <i class="fas fa-edit me-3"></i>Update Task
      </h1>
      <p class="mb-0 mt-2 opacity-75">Modify your existing task details and keep everything up to date</p>
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
        <li class="breadcrumb-item active" aria-current="page">Update Task</li>
      </ol>
    </nav>

    <div class="form-container">
      <!-- Task Info Badge -->
      <div class="task-info-badge">
        <h6><i class="fas fa-info-circle me-2"></i>Task Information</h6>
        <div class="row">
          <div class="col-md-6">
            <small><strong>Task ID:</strong> #<?= $task['id'] ?></small>
          </div>
          <div class="col-md-6">
            <small><strong>Created At:</strong> <?= $task['created_at'] ?></small>
          </div>
        </div>
      </div>

      <div class="text-center mb-4">
        <i class="fas fa-edit task-icon"></i>
        <h2 class="mb-0">Update Task</h2>
        <p class="text-muted">Modify the details below to update your task</p>
      </div>

      <form action="index.php?page=update-task" method="post">
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
            placeholder="Enter a clear and descriptive task..."
            maxlength="255"
            value="<?= $task['titel'] ?>"
            name="titel" />
          <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
          <div class="form-text">
            <i class="fas fa-info-circle me-1"></i>
            Describe what needs to be done clearly and concisely
          </div>
        </div>

        <div class="mb-4">
          <label for="taskPriority" class="form-label">
            <i class="fas fa-flag me-2"></i>Priority Level
          </label>
          <select class="form-control" id="taskPriority" name="priority">
            <option value="">Select priority level</option>
            <option value="high" <?= $task['priority'] == "high" ? "selected" : "" ?>>High Priority</option>
            <option value="medium" <?= $task['priority'] == "medium" ? "selected" : "" ?>>Medium Priority</option>
            <option value="low" <?= $task['priority'] == "low" ? "selected" : "" ?>>Low Priority</option>
          </select>
        </div>

        <!-- <div class="mb-4">
          <label for="taskStatus" class="form-label">
            <i class="fas fa-check-circle me-2"></i>Task Status
          </label>
          <select class="form-control" id="taskStatus">
            <option value="pending" selected>Pending</option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
          </select> 
          <div class="form-text">
            <i class="fas fa-info-circle me-1"></i>
            Update the current status of this task
          </div>
        </div> -->

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="index.php?page=home" class="btn btn-secondary me-md-2">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Task
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include("./inc/footer.php"); ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Pre-populate form with existing task data (in real app, this would come from URL params or API)
    // const taskData = {
    //   id: 2,
    //   task: "Finish project report",
    //   priority: "medium",
    //   status: "pending",
    //   createdAt: "2024-06-02 02:30 PM"
    // };

    // // Initialize form with existing data
    // document.addEventListener('DOMContentLoaded', function() {
    //   document.getElementById('taskInput').value = taskData.task;
    //   document.getElementById('taskPriority').value = taskData.priority;
    //   document.getElementById('taskStatus').value = taskData.status;
    // });

    // // Enable/disable submit button based on task input
    // document.getElementById('taskInput').addEventListener('input', function() {
    //   const submitBtn = document.querySelector('button[type="submit"]');
    //   const taskInput = this.value.trim();

    //   if (taskInput.length > 0) {
    //     submitBtn.disabled = false;
    //     submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Task';
    //   } else {
    //     submitBtn.disabled = true;
    //     submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Task';
    //   }
    // });

    // // Form submission handler
    // document.querySelector('form').addEventListener('submit', function(e) {
    //   e.preventDefault();

    //   const taskInput = document.getElementById('taskInput').value.trim();
    //   const priority = document.getElementById('taskPriority').value;
    //   const status = document.getElementById('taskStatus').value;

    //   if (taskInput) {
    //     // Here you would typically send the updated data to your backend
    //     alert('Task updated successfully!\n\nTask: ' + taskInput + 
    //           '\nPriority: ' + (priority || 'Not specified') + 
    //           '\nStatus: ' + status);

    //     // Redirect to index page
    //     window.location.href = 'index.html';
    //   }
    // });

    // // Get URL parameters (in real app, you'd use this to load the specific task)
    // function getTaskIdFromURL() {
    //   const urlParams = new URLSearchParams(window.location.search);
    //   return urlParams.get('id');
    // }

    // // Simulate loading task data based on ID
    // const taskId = getTaskIdFromURL();
    // if (taskId) {
    //   console.log('Loading task with ID:', taskId);
    //   // In real app, you'd make an API call here to load the task data
    // }
  </script>
</body>

</html>