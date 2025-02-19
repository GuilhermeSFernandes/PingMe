<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form settings">
      <header style="color:white;">Configurações do Perfil</header>
      <form action="#" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label style="color:white;">Foto do Perfil</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field input">
          <label style="color:white;">Senha Atual</label>
          <input type="password" name="current_password" placeholder="Digite sua senha atual">
        </div>
        <div class="field input">
          <label style="color:white;">Nova Senha</label>
          <input type="password" name="new_password" placeholder="Digite a nova senha">
        </div>
        <div class="field input">
          <label style="color:white;">Confirmar Nova Senha</label>
          <input type="password" name="confirm_password" placeholder="Confirme a nova senha">
        </div>
        <div class="field button">
          <input type="submit" value="Salvar Alterações">
        </div>
      </form>
      <div class="link"><a href="users.php">Voltar para o Chat</a></div>
    </section>
  </div>

  <script src="javascript/settings.js"></script>
</body>
</html>