<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="Sesión cerrada";
?>
<script language="javascript">
document.location="index.php";
</script>
