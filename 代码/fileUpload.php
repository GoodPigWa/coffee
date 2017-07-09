<?php
set_time_limit(0);
move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
echo "uploads/".$_FILES["image"]["name"];