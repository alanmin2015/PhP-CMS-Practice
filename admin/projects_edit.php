<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['title'] ) )
{
  
    $query = 'UPDATE projects SET 
        title ="'.$_POST['title'].'",
        content ="'.$_POST['content'].'",
        url ="'.$_POST['url'].'",
        type ="'.$_POST['type'].'",
        date ="'.$_POST['date'].'"
        WHERE id='.$_GET['id'];
    mysqli_query( $connect, $query );


    set_message( 'Project has been updated' );
    header( 'Location: projects.php' );
    die();
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<?php
$query='SELECT *
FROM projects
WHERE id='.$_GET['id'].'
LIMIT 1';
$result=mysqli_query( $connect, $query );

$record=mysqli_fetch_assoc($result);
?>

<form method="post">

<label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo $record['title'];?>">
  
  <br>
  
  <label for="content">Content:</label>
  <input type="text" name="content" id="content" value="<?php echo $record['content'] ; ?>">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo $record['date']; ?>">
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url" value="<?php echo $record['url']; ?>">
  
  
  <br>

  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Graphic Design', 'Website' );
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['type'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  ?>
<br>

<input type="submit" value="Update Project">

</form>
<?php
include('includes/footer.php');
?>