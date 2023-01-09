<?php
session_start();
session_destroy();
header("Location: http://localhost/lk/kursach/index.php", true, 303);