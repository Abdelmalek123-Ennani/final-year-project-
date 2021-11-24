<?php

session_unset();
session_destroy(); // destroy session
header("Location: ./../index.html");
