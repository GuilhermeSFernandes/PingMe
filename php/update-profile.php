<?php
session_start();
include_once "config.php";

if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

$outgoing_id = $_SESSION['unique_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar senha atual
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $sql = mysqli_query($conn, "SELECT password FROM users WHERE unique_id = {$outgoing_id}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        if (password_verify($current_password, $row['password'])) {
            if ($new_password === $confirm_password) {
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password = '{$new_password_hash}' WHERE unique_id = {$outgoing_id}";
                if (mysqli_query($conn, $update_sql)) {
                    echo "success";
                } else {
                    echo "Erro ao atualizar a senha.";
                }
            } else {
                echo "As senhas não coincidem.";
            }
        } else {
            echo "Senha atual incorreta.";
        }
    }

    // Atualizar foto do perfil
    if (!empty($_FILES['image']['name'])) {
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions)) {
            $time = time();
            $new_img_name = $time . $img_name;
            if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                $update_img_sql = "UPDATE users SET img = '{$new_img_name}' WHERE unique_id = {$outgoing_id}";
                if (mysqli_query($conn, $update_img_sql)) {
                    echo "success";
                } else {
                    echo "Erro ao atualizar a foto.";
                }
            }
        } else {
            echo "Formato de imagem inválido. Use jpeg, png ou jpg.";
        }
    }
}
?>