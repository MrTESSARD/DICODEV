<div class="container-auth">
<?php
    if(!empty($_SESSION['userId']))
    {
?>
    <form method="POST" class="auth-form">
        <input class="input-form" type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($_SESSION['userName']); ?>">
        <input class="input-form" type="text" name="surname" placeholder="Surname" value="<?= htmlspecialchars($_SESSION['userSurname']); ?>">
        <input class="input-form" type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($_SESSION['userUsername']); ?>">
        <input class="input-form" type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_SESSION['userEmail']); ?>">
        <!-- <input type="password" name="newPassword" placeholder="New password">
        <input type="password" name="newPasswordVerify" placeholder="Verify your new password"> -->
        <label for="password">If u need to do any changes please enter your password :</label>
        <input class="input-form" type="password" name="password" placeholder="Password">
        <input class="btn-input" type="submit" name="update" value="Update">
        <input class="btn-input" type="submit" name="return" value="Return">
    </form>
<?php
    }
    else
    {
?>
    <h3>Veuillez vous connecter pour avoir accés à votre profil !<h3>
<?php
    }
?>
</div>