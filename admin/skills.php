<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM skills
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'Skills has been deleted' );
  
  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Manage Skills</h2>
<?php
$query='SELECT *
FROM skills
ORDER BY name ASC';
$result=mysqli_query($connect, $query);
?>

<table border="1">
    <tr>
       <th>ID</th>
        <th>Name</th>
        <th>URL</th>
        <th>Percent</th>
        <th></th>
        <th></th>
        <th></th>
</tr>

<?php while($record=mysqli_fetch_assoc($result)):?>
    <tr>
       <!--<td><img src="<?php echo $record['photo']; ?>" width="300"></td>-->
        <td><?php echo $record['id']; ?></td>
        <td><?php echo $record['name']; ?></td>
        <td><?php echo $record['url']; ?></td>
        <td><?php echo $record['percent']; ?></td>
        <td><a href="skills_photo.php?id=<?php echo $record['id']; ?>">Photo</a></td>
        <td><a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
        <td><a href="skills.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
    
</tr>
<?php endwhile; ?>
</table>
<p>
 <a href="skills_add.php">Add Skill</a>
</p>

<?php
include('includes/footer.php');
?>