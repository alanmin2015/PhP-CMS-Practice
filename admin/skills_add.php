<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['name'] ) )
{
  
  if($_POST['name'] and $_POST['percent'])
    {
    $query = 'INSERT INTO skills (
        name,
        url,
        percent
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['percent'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been added' );
    set_message( $query );
      }
  

  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Skills</h2>

<form method="post">

Skills:
 <input type="text" name="name">

 <br>
 
URL:
<textarea type="text" name="url"></textarea>

<br>

Percentage:
<input type="text" name="percent">


</select>

<br>

<input type="submit" value="Submit">
<p><a href="skill.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>

</form>

<?php
include('includes/footer.php');
?>


