<?php
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

Здравствуйте, <?= $user->username ?>,
Перейдите по ссылке, чтобы восстановить пароль:

<?= $resetLink ?>