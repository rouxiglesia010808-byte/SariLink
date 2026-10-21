<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, intial-scale=1.0">
    <title>Account</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="assets/files/Secondstyles.css">
    <script type="text/javascript" src="validation.js" defer></script>
</head>

<body>
        <div class="wrapper <?= isActiveForm('register', $activeForm); ?>" id="signup-form">
        <form action="sarilink.php" method="post">
            <h1>Sign-up</h1>
            <?= showError($errors['register']); ?>
            <div class="input-box">
                <input type="text" name="name" id="name_input" placeholder="Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="email" id="email_input" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="Password" name="password" id="password_input" placeholder="Password" required>
            </div>    
            <select name="role" required>
                <option value="sari">Store owner</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" name="register">Sign-up</button>   
            <p>Already have an account? PLEASE WORK <a href="#" onclick="showForm('login-form')">log-in now!</a><br><a href="Sarilink.html">"Go back?</a></p>        
        </form>
        
        </div>

        <div class="wrapper <?= isActiveForm('login', $activeForm); ?>" id="login-form">
        <form action="sarilink.php" method="post">
            <h1>Log-in</h1>
            <?= showError($errors['login']); ?>
            <div class="input-box">
                <input type="email" name="email" id="email_input" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="Password" name="password" id="password_input" placeholder="Password" required>
            </div>    
            <button type="submit" name="login">Log-in</button>
            <p>Don't have an account? <a href="#" onclick="showForm('signup-form')">sign-up now!</a><br><a href="Sarilink.html">"Go back?</a></p>   
        </form>

        
        </div>

        <script src="script.js"></script>
</body>
</html>