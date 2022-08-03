<?php
session_start();
if (session_destroy()) {
    header("Location: http://localhost/SWBD/esame-swbd/login_.php");
}
