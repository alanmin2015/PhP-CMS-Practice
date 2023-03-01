<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['name'] ) )
{
  if($_POST['name'] and $_POST['percent'])
  {
    $query = 'UPDATE skills SET 
        name ="'.$_POST['name'].'",
        url ="'.$_POST['url'].'",
        percent ="'.$_POST['percent'].'"
        WHERE id='.$_GET['id'];
    mysqli_query( $connect, $query );
    set_message($query );

    set_message( 'Skill has been updated' );
    header( 'Location: skills.php' );
    die();
}
}

include( 'includes/header.php' );

?>

<h2>Edit Skill</h2>

<?php
$query='SELECT *
FROM skills
WHERE id='.$_GET['id'].'
LIMIT 1';
$result=mysqli_query( $connect, $query );

$record=mysqli_fetch_assoc($result);
?>

<form method="post">

<label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo $record['name'];?>">
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url" value="<?php echo $record['url'] ; ?>">
  
  <br>
  
  <label for="percent">Percentage:</label>
  <input type="text" name="percent" id="percent" value="<?php echo $record['percent']; ?>">
  
  
  

<input type="submit" value="Update Skills">

<p><a href="skill.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>
</form>
<?php
include('includes/footer.php');
?>