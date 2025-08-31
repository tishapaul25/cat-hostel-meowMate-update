<?php
// Redirect legacy "products-page.php" link to the real products page
// Works no matter where the section is included from.
header('Location: product.php', true, 302);
exit;
