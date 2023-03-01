<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['first'] ) )
{
  
    $query = 'UPDATE users SET 
        first ="'.$_POST['first'].'",
        last ="'.$_POST['last'].'",
        email ="'.$_POST['email'].'",
        active ="'.$_POST['active'].'"
        WHERE id='.$_GET['id'];
    mysqli_query( $connect, $query );

    echo $query;
    echo mysqli_error($connect);

    if($_POST['password'])
    {
     $query = 'UPDATE users SET 
       password="'.md5($_POST['password']).'"
       WHERE= id = '.$_GET['id'].'
       LIMIT 1';
    mysqli_query( $connect, $query );
    }

    set_message( 'User has been updated' );

    header( 'Location: users.php' );
    die();
  
}

include( 'includes/header.php' );

?>

<h2>Edit User</h2>

<?php
$query='SELECT *
FROM users
WHERE id='.$_GET['id'].'
LIMIT 1';
$result=mysqli_query( $connect, $query );

$record=mysqli_fetch_assoc($result);
?>

<form method="post">

<label for="first">First:</label>
  <input type="text" name="first" id="first" value="<?php echo $record['first'];?>">
  
  <br>
  
  <label for="last">Last:</label>
  <input type="text" name="last" id="last" value="<?php echo $record['last'] ; ?>">
  
  <br>
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo $record['email']; ?>">
  
  <br>
  
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  
  <br>

  <label for="active">Active:</label>
  <?php
  
  $values = array( 'Yes', 'No' );
  
  echo '<select name="active" id="active">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['active'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  ?>
<br>

<input type="submit" value="Update User">

</form>

<?php
include('includes/footer.php');
?>