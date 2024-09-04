<?php
   require_once 'login.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VesteVerso</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="container">
        <div id="logo"><a href="index.php"><img src="../resources/images/logo-roxa-grande.png" alt="Logo VesteVerso"></a></div>       
            <form method="POST" id="loginForm">
                    <div id="titulo">
                        <h1 id="tiulo-login">Login</h1>
                    </div>
                    <div id="usuario">
                        <span>Usuário</span> <br>
                    </div>
                        <div id="usuario-input">
                            <input type="text" name="Usuario" class="input-usuario-senha"> <br>
                        </div>
                    <div id="senha">
                        <span>Senha</span> <br>
                    </div>
                        <div id="senha-input">
                            <input type="password" name="Password" class="input-usuario-senha">
                        </div>
                    <div id="checkbox"><input type="checkbox" id="checkbox-lembrar"> <span>Lembrar de mim</span><br> </div>
                    <div id="esqueceu-a-senha">
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                    <div id="botao"><button id="enviar" onclick="logar()">Entrar</button> <br></div>
                    <div id="inscrever-se"><span>Não tem uma conta? <a href="cadastro.php">Inscrever-se</a></span> <br></div>
            </form>
    </div>

    <script>

        function logar(){
            var login = document.querySelector("input[name='Usuario']").value;
            var senha = document.querySelector("input[name='Password']").value;

            if(login == "<?php $usuario ?>" && senha == "<?php $Senha ?>"){
                alert('Sucesso');
                location.href = "login.php";
            } else if (login !== "<?php $usuario ?>" || senha !== "<?php $Senha ?>") {
                alert('erro')
            }else {
                const alertaErro = document.createElement("div")
                alertaErro.className = "div-erro"
                alertaErro.innerHTML = "<span>Usuário ou senha incorretos</span>"
                document.body.appendChild(alertaErro)
            } 

        }

    </script>

</body>
</html>