<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>CADASTRO</title>
</head>

<header class="o-header">
    <center>
        <h3>CADASTRO</h3>
    </center>

</header>

<aside class="o-aside">
    <div class="navbar">
        <h2>TECH LADIES</h2>
        <hr>
        <br>
        Conecte-se com <br>comunidade feminina <br> de TI e saiba de<br> vagas, eventos, <br>entre outros.
        <br>
        <hr>
        <br>
        <a href="login.html">LOGIN</a>
    </div>

</aside>

<body>
<main class="o-main">
    <form action = "gravar.php" method = "post">
        Nome:
        <br>
        <input type="text" name="nome">
        <br>
        Sobrenome:
        <br>
        <input type="text" name="sobrenome">
        <br>
        E-mail:
        <br>
        <input type="text" name="email">
        <br>
        Senha:
        <br>
        <input type="password" name="senha">
        <br>
        Confirmar senha:
        <br>
        <input type="password" name="confsenha">
        <br>
        <br>
        <input type="submit" class="botao" value="CADASTRAR">
    </form>
    </main>

    <footer class="o-footer">
    <center>
        <a href="https://github.com/adudars/mulheresDeTI">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"></image>
        </a>
    </center>
</footer>
</body>
</html>
