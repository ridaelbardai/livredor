<?php

function url($url = '')
{
    echo BURL . $url;
}

function imageConvenable()
{

    $target_dir = "C:\\xampp\htdocs\livredor\public\uploads\\";
    $target_file = $target_dir . basename($_FILES['photo']['name']);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return 0;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
            return 1;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


function afficherEtat($etat)
{

    if ($etat == 'a') {
        echo "<i class=\"fa fa-check\" style=\"color:green\" ></i>";
    } else {
        echo " <i class=\"fa fa-times\" style=\"color:red\"></i>";
    }
}
