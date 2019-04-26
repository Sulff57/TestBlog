<p>
<?php

function verifierMail($mail) {
  if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) { return 1; }
  else { return 0; }
}
?>
