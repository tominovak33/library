<?php

if (file_exists("pr.txt")) {
  $pr_file_content = file_get_contents('pr.txt');
  $pr = unserialize($pr_file_content);
  var_dump($pr);
}


echo "Check done";

echo "\n";
