<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'php_cafeteria_app');

// $id = 0;
// $title = '';
// $content = '';


// if (isset($_POST['save'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $date = date('Y-m-d');

//     $_SESSION['message'] = "Article Posted!";
//     $_SESSION['msg_type'] = "success";
//     $mysqli->query("INSERT INTO articles (article_title, date_created, article_content) VALUES ('$title', '$date','$content')") or die($mysqli->error);

//     header("Location: http://cosmodev.com/bulletinboard/");
// };

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $_SESSION['message'] = "Article Deleted!";
//     $_SESSION['msg_type'] = "danger";
//     $mysqli->query("DELETE FROM articles WHERE id=$id") or die($mysqli->error());
//     header("Location: http://cosmodev.com/bulletinboard/");
// }

// if (isset($_GET['edit'])) {
//     $id = $_GET['edit'];
//     $result = $mysqli->query("SELECT * FROM articles WHERE id=$id") or die($mysqli->error());
//     if (count($result) == 1) {
//         $row = $result->fetch_array();
//         $title = $row['article_title'];
//         $content = $row['article_content'];
//     }
// }

// if (isset($_POST['edit'])) {
//     $id = $_POST['id'];
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $mysqli->query("UPDATE articles SET article_title='$title', article_content='$content' WHERE id=$id") or die($mysqli->error());
//     $_SESSION['message'] = "Article Edited!";
//     $_SESSION['msg_type'] = "success";
//     header("Location: http://cosmodev.com/bulletinboard/");
// }

// if (isset($_GET['view'])) {
//     $id = $_GET['view'];
//     $result = $mysqli->query("SELECT * FROM articles WHERE id=$id") or die($mysqli->error());
//     if (count($result) == 1) {
//         $row = $result->fetch_array();
//         $title = $row['article_title'];
//         $content = $row['article_content'];
//         $date = $row['date_created'];
//     }
// }
