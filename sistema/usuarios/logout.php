<?php
session_start();

session_destroy();

echo "<script>
alert('Logout exitoso');
window.location.href = '/usuarios';
</script>";
exit;