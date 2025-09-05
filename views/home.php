<?php 
$sql = "SELECT * FROM `tasks`;";
$res = mysqli_query($conn,$sql);
$data =mysqli_fetch_all($res,MYSQLI_ASSOC);
// $data = mysqli_fetch_assoc($res);
// var_dump($data)


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Todo List - Eraasoft</title>
  <?php include("./inc/links.php");  ?>
  <link rel="stylesheet" href="./assets/index.css">
</head>
<body>

   <?php include("./inc/nav.php"); ?>
  <!-- Page Header -->
  <div class="page-header">
    <div class="container">
      <h1 class="mb-0">
        <i class="fas fa-list-check me-3"></i>Todo List Management
      </h1>
      <p class="mb-0 mt-2 opacity-75">Manage your tasks efficiently and stay organized</p>
    </div>
  </div>

  <!-- Main Content -->
 <div class="container main-content">
    <div class="table-container">
      <div class="table-responsive">
        <?php showMessage('success'); ?>
        <table class="table table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th><i class="fas fa-hashtag me-2"></i>ID</th>
              <th><i class="fas fa-tasks me-2"></i>Task</th>
              <th><i class="fas fa-flag me-2"></i>Priority</th>
              <th><i class="fas fa-calendar me-2"></i>Created At</th>
              <th><i class="fas fa-cogs me-2"></i>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $task):?>

            <tr>
              <td><?= $task['id']  ?></td>
              <td>
                <div class="d-flex align-items-center">
                  <!-- <i class="fas fa-shopping-cart text-primary me-2"></i> -->
                  <?= $task['titel']  ?>
                </div>
              </td>
              <td>
                <span class="badge bg-<?= getPriorityColor(  $task['priority'] ); ?>">
                  <i class="fas fa-exclamation me-1"></i>
                 <?= $task['priority']  ?>
                </span>
              </td>
              <td>
                <small class="text-muted">
                  <i class="fas fa-clock me-1"></i>
                  <?= $task['created_at']  ?>

                </small>
              </td>
              <td>
                <a href="index.php?page=edit_task&task_id=<?= $task['id'] ?>"  class="btn btn-sm btn-warning action-btn" disabled>
                  <i class="fas fa-edit me-1"></i>Edit
            </a>

            <form action="index.php?page=delete-task" class="d-inline" method="POST">
              <input type="hidden" name="task_id" value="<?= $task['id'] ?>">

              <button type="submit"  class="btn btn-sm btn-danger action-btn" >
                <i class="fas fa-trash me-1"></i>Delete
              </button>
            </form>
              </td>
            </tr>
                        
           <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
     <?php include("./inc/footer.php"); ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>