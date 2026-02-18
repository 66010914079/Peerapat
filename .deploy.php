<?php
$output = shell_exec('cd /var/www/html/Peerapat && git pull origin main 2>&1');
echo "<pre>$output</pre>";
?>