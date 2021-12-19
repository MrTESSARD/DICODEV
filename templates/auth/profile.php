<div class="container-auth">
<?php
    if (!empty($_SESSION['userId'])) 
    {
?>
    <div class="h2">
        <h2>Profile Informations</h2>
    </div>
    <div class="auth-form">
        <div><?= htmlspecialchars($_SESSION['userName']); ?></div>
        <div><?= htmlspecialchars($_SESSION['userSurname']); ?></div>
        <div><?= htmlspecialchars($_SESSION['userUsername']); ?></div>
        <div><?= htmlspecialchars($_SESSION['userEmail']); ?></div>
    </div>
    <a class="btn-nav-edit" href="?auth=profile/update">Modifier</a>
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