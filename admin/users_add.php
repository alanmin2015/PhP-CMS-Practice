<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
secure();

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] and $_POST['password'] )
  {
    
    $query = 'INSERT INTO users (
        first,
        last,
        email,
        password,
        active
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['active'].'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );
    
  }

  header( 'Location: users.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add User</h2>

<form method="post">

 First:
 <input type="text" name="first">

 <br>
 
 Last:
<input type="text" name="last">

<br>

Email Address:
<input type="text" name="email">

<br>

Passowrd:
<input type="password" name="password">

<br>

Active:
<select name="active">
<?php

$values=array('Yes','No');

foreach($values as $key=>$value)

{
    echo '<option value="'.$value.'">'.$value.'</option>';
}
?>
</select>

<br>

<input type="submit" value="Add User">

</form>

<?php
include('includes/footer.php');
?>