<?php
// process_category.php

// Include your database connection
include_once("./Model/Connect.php");

// Include your Product class
include_once("./Model/Product.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the category name is set and not empty
    if (isset($_POST["category_name"]) && !empty($_POST["category_name"])) {
        $categoryName = $_POST["category_name"];

        // Create an instance of the database connection
        $conn = connect(); // Sử dụng hàm connect() trong file Model/Connect.php

        if ($conn) {
            // Create an instance of the Product class with the database connection
            $product = new Product($conn);

            // Data for adding a new category
            $categoryData = array(
                "tenloai" => $categoryName
            );

            // Call the addCategory method to add the new category
            $categoryId = $product->addCategory($categoryData);

            if ($categoryId) {
                // Redirect the user to index.php?controller=loaisanpham&action=SuaLoaiSanPham
                header("Location: index.php?controller=loaisanpham&action=SuaLoaiSanPham");
                exit();
            } else {
                // Handle the case where the category couldn't be added
                echo "Failed to add category.";
            }
        } else {
            // Handle the case where database connection failed
            echo "Failed to connect to the database.";
        }
    } else {
        // Handle the case where the category name is not set or empty
        echo "Category name is required.";
    }
} else {
    // Include the view EditLoaiSanPham.php if the form was not submitted
    include_once('View/EditLoaiSanPham.php');
}
