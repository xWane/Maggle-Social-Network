<?php
function reinit(){
  $link = mysqli_connect('localhost', 'root', '', '');
  if ($link) {
    echo "All good";
  }
  mysqli_query($link, "CREATE DATABASE IF NOT EXISTS profil;");
  $link2 = mysqli_connect('localhost', 'root', '', 'profil');
  mysqli_query($link2, "CREATE TABLE IF NOT EXISTS profil_info ( mail text(40), mdp text(40) ) ");
}
?>
