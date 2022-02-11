<?php
function redirect($page, $data = [])
{
  header("Location:" . URLROOT . "/" . $page);
}