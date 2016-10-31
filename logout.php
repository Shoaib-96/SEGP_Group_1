<html>
<body>

<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['psw']);
session_destroy();

header("Location: index.php");
exit;
?>
</body>

</html>