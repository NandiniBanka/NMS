
<?php //session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once(dirname(__DIR__).'/config.php') ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>includes/css/style.css?v=2">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
 <div class="container3">
            <div class="text"><h2> Alert Management <h2></div>
                  <?php $statement = "SELECT id,first_name,last_name,contact_number,email_id,Device_id,Device_Issue FROM users";
                   $run_query = mysqli_query($db_connect,$statement);
                  
                    if ($run_query->num_rows>0) { ?>
                      <table border="1">
                        <tr>
                            <th>Mail id </th>
                            <th>Device id</th>
                            <th>Device issue</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            
                        </tr>
                    <?php 

                    $counter = 1;

                    while ($row = mysqli_fetch_object($run_query)) { ?>
                        <tr>

                            <td><?php echo $row->email_id  ?></td>
                            <td><?php echo $row->Device_id  ?></td>
                            <td><?php echo $row->Device_Issue ?></td>
                            <td><a href="employees/delete.php?id=<?php echo $row->id ?>" class="btn btn-outline-primary btn" >Delete </a>
                              </td>
                            <td><a href="employees/sendmail.php?id=<?php echo $row->id ?>" class="btn btn-outline-primary btn" >edit </a></td>
                            
                        </tr>
                    <?php $counter++; } ?>
                    </table>
                <?php } else {
                    echo 'No data found.';
                }
                 ?>
    
                </div>