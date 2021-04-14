<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);


.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="password"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
  cursor: pointer;
  margin-top: 10px;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

.error{
  color: #e86464;
}

.copyright a{
  color: #333;
}

</style>


<div class="section">
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Cadastre-se</h3>
    <h4>Preencha o formulário abaixo para fazer o cadastro</h4>
    <?= Session::message('usuario') ?>
    <fieldset>
      <span class="error"><?= isset($dados['nameErr']) ? $dados['nameErr'] : '' ?></span>
      <input placeholder="Seu nome" type="text" tabindex="1" name="name" autofocus>
    </fieldset>
    <fieldset>
      <span class="error"><?= isset($dados['emailErr']) ? $dados['emailErr'] : '' ?></span>
      <input placeholder="Seu E-mail" type="email" tabindex="2" name="email">
    </fieldset>
    <fieldset>
      <span class="error"><?= isset($dados['passwordErr']) ? $dados['passwordErr'] : '' ?></span>
      <input placeholder="Sua Senha" type="password" tabindex="3" name="password">
    </fieldset>
    <fieldset>
      <span class="error"><?= isset($dados['checkPasswordErr']) ? $dados['checkPasswordErr'] : '' ?></span>
      <input placeholder="Confirme a sua senha" type="password" tabindex="4" name="checkPassword">
    </fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Cadastrar</button>
    </fieldset>
    <a href='<?= URL ?>./usuarios/login'><p class="copyright">Você ja tem uma conta? Faça login</p></a>
  </form>
</div>
</div>