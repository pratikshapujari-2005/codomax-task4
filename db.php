<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}

// Create database if not exists
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS blog_app_db");
mysqli_select_db($conn, "blog_app_db");

// Create users table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)");

// Create blogs table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    tag VARCHAR(50) DEFAULT 'General',
    created_at VARCHAR(50) NOT NULL
)");
?>