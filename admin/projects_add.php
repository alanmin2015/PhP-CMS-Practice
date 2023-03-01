<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['title'] ) )
{
  
  
    
    $query = 'INSERT INTO projects (
        title,
        content,
        type,
        date,
        url
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been added' );
    
  

  header( 'Location: projects.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Projects</h2>

<form method="post">

 Title:
 <input type="text" name="title">

 <br>
 
Content:
<textarea type="text" name="content"></textarea>

<br>

Date:
<input type="date" name="date">

<br>

URL:
<input type="text" name="url">

<br>

Type:
<select name="type">
<?php

$values=array('Graphic Design','Website');

foreach($values as $key=>$value)

{
    echo '<option value="'.$value.'">'.$value.'</option>';
}
?>
</select>

<br>

<input type="submit" value="Submit">

</form>

<?php
include('includes/footer.php');
?>