<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();


if( isset( $_FILES['photo'] ) )
{
  switch( $_FILES['photo']['type'] )
  {
    case 'image/png': $type = 'png';  break;
    case 'image/jpg':
    case 'image/jpeg': $type = 'jpeg';  break;
    case 'image/gif': $type = 'gif'; break;  
      default: header( 'Location: projects.php' );    
  }
  

  $query = 'UPDATE projects SET
  photo = "data:image/'.$type.';base64,'.base64_encode( file_get_contents( $_FILES['photo']['tmp_name'] ) ).'"
  WHERE id = '.$_GET['id'].'
  LIMIT 1';
  mysqli_query( $connect, $query );

    set_message( 'Project photo has been updated' );
    header( 'Location: projects.php' );
    die();
  
}

include( 'includes/header.php' );

?>

<h2>Edit Photo</h2>

<?php
$query='SELECT *
FROM projects
WHERE id='.$_GET['id'].'
LIMIT 1';
$result=mysqli_query( $connect, $query );

$record=mysqli_fetch_assoc($result);
?>





<form method="post"  enctype="multipart/form-data">

<label for="photo">Photo:</label>
  <input type="file" name="photo" id="photo">
  
  <br>

<input type="submit" value="Add Photo">

</form>
<?php
include('includes/footer.php');
?>