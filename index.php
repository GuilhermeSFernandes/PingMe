<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
    <header style="color:white;">PingMe</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Nome</label>
            <input type="text" name="fname" placeholder="Nome" required>
          </div>
          <div class="field input">
            <label>Sobrenome</label>
            <input type="text" name="lname" placeholder="Sobrenome" required>
          </div>
        </div>
        <div class="field input">
          <label style ="color:white;">Email</label>
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="field input">
          <label style="color:white;">Senha</label>
          <input type="password" name="password" placeholder="Senha" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label style = "color:white;">Selecione uma Imagem</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Ja tem Cadastro? <a href="login.php">Faca Login</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
