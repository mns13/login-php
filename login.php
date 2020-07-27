<?php include_once "header.php"; // you've got to have a header and footer ofcourse =) ?> 
<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //method to check database user
    $user_found = User::verifyUser($username, $password);

    if ($user_found) {
        if ($user_found->role == 'admin') {
            $session->login($user_found);
            redirect("index.php");
        } else {
            redirect("../account.php"); // some direction
        }
        
    } else {
        $the_message = "Your password or username are incorrect";
    }
} else {
    $the_message = '';
    $username = "";
    $password = "";
}

?>

<h1>Login</h1>
<h4><?php echo $the_message; ?></h4>

    <!-- form -->  
<form action="" method="post">
    <label for="username"></label>
    <input type="text"  name="username" value="<?php htmlentities($username); ?>">
    
    <label for="password"></label>
    <input type="password" name="password" value="<?php htmlentities($password); ?>">
    
    <input type="submit" name="submit" value="Войти">
</form>


<?php include_once "footer.php"; ?>