<?php

if (empty($_SESSION['login'])) {
    redirect("login");
    return;
}