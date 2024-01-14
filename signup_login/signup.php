<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   
   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="../style/sign.css">

</head>
<body>
   

<section class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>
      
        <p>Username: <input type="text" name="username" size="15" maxlength="15" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" /></p>
        <p>Password: <input type="password" name="password1" size="10" maxlength="20" /></p>
        <p>Confirm Password: <input type="password" name="password2" size="10" maxlength="20" /></p>
        <p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
        <p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
        <p>Email Address: <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
        <p>Phone Number: <input type="text" name="phone_number" size="15" maxlength="15" value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>" /></p>
        <p><input type="submit" name="submit" value="Register" /></p>
        <input type="hidden" name="submitted" value="TRUE" />
      <p>Already have an account?</p>
      <a href="../log_folder/login.php" class="option-btn">Login Now</a>
   </form>

</section>


<script src="js/script.js"></script>

</body>
</html>
<?php

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

    require('../include/db_connect.php');


    $errors = array(); // Initialize error array.
    
    // Check for a username.
    if (empty($_POST['username'])) {
        $errors[] = 'You forgot to enter your username.';
    } else {
        $username = $_POST['username'];
    }

    // Check for a password and match against the confirmed password.
    if (!empty($_POST['password1'])) {
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
    
        if ($password1 != $password2) {
            $errors[] = 'Your password did not match the confirmed password.';
        } elseif (strlen($password1) < 8) {
            $errors[] = 'Your password must be at least 8 characters long.';
        } else {
            $password = $password1;
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    // Check for a first name.
    if (empty($_POST['first_name'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $first_name = $_POST['first_name'];
    }

    // Check for a last name.
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $last_name = $_POST['last_name'];
    }

    // Check for an email address.
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $email = $_POST['email'];
    }

    // Check for a phone number.
    if (empty($_POST['phone_number'])) {
        $errors[] = 'You forgot to enter your phone number.';
    } else {
        $phone_number = $_POST['phone_number'];
    }

    if(empty($errors)){

        // kalau semua okay validation
        $query = "SELECT id FROM users WHERE username='$username'";
        $result = @mysqli_query($dbc, $query); // Run the query.

        if (mysqli_num_rows($result) == 0) {
            $query = "INSERT INTO users (username, password, first_name, last_name, email, phone_number, role)
                      VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$phone_number', 'user')";
        
            // Execute the INSERT query
            $insert_result = mysqli_query($dbc, $query);
        
            if ($insert_result) {
                echo '<h1 id="mainhead">Success!</h1>
                      <p class="success">Registration successful!</p>';
            } else {
                echo '<h1 id="mainhead">Error!</h1>
                      <p class="error">Error inserting data into the database.</p>';
            }
        } else { // Already registered.
            echo '<h1 id="mainhead">Error!</h1>
                  <p class="error">The username has already been registered.</p>';
        }
        
  

            

} else { // Report the errors.
    echo '<h1 id="mainhead">Error!</h1>
    <p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) { // Print each error.
        echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p><p><br /></p>';
} // End of if (empty($errors)) IF.
mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.
?>


