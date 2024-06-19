<?php
session_start();
include 'connection.php'; // Inclui a conexão com o banco de dados

$username = '';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT username FROM clientes WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
    <div id="div-logo"><a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="">
          <div id="div-barra-pesquisa"><input type="search" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user"></a>
                        <div class="dropdown-menu">
                            <?php if ($username): ?>
                                <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span></div>
                                <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
                            <?php else: ?>
                                <a href="../html/Cadastro.html" class="login-drop">Cadastre-se</a>
                                <a href="../html/login.html" class="login-drop">Entrar</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="div-carrinho">
                <img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho">
            </div>
            <div id="div-favorito">
                <img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito">
            </div>
        </div>
    </header>
    <nav>
        <a href="#">Roupas Masculinas</a>
        <a href="#">Roupas Femininas</a>
        <a href="#">Roupas Infantis</a>
        <a href="#">Promoções</a>
    </nav>
    
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="height: 25em;">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../resources/images/banner-1.jpg" alt="Primeiro Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../resources/images/banner-2.jpg" alt="Segundo Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../resources/images/banner-3.jpg" alt="Terceiro Slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>

    <h1>Em destaque</h1>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="cards-wrapper">
          <div class="card-produto">
            <a href="produto-0001.php">
              <img src="../resources/images/roupas/0001.JPG" alt="imagem-roupa" style="width: 30vh;">
                <h2 class="titulo-produto">Camisa de Gola</h2>
                <h3 class="titulo-produto">R$56,90</h3>
            </a>
              <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button> 
                <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar" onclick="trocarImagem()"></div>
                <script>
                  function trocarImagem() {
                      var coracaofavoritar = document.getElementById('coracao-favoritar');
                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                      } else {
                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                      }
                  }
                </script>
          </div>
          <div class="card-produto d-none d-md-block">
            <a href="produto-0002.php">
              <img src="../resources/images/roupas/0002.jpeg" alt="imagem-roupa" style="width: 30vh;">
                <h2 class="titulo-produto">Camisa com Manga</h2>
                <h3 class="titulo-produto">R$42,30</h3>
            </a>
              <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar1" onclick="trocarImagem1()"></div>
                <script>
                  function trocarImagem1() {
                      var coracaofavoritar = document.getElementById('coracao-favoritar1');
                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                      } else {
                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                      }
                  }
                </script>
          </div>
          <div class="card-produto d-none d-md-block">
            <a href="produto-0003.php">
              <img src="../resources/images/roupas/0003.jpeg" alt="imagem-roupa" style="width: 30vh;">
                <h2 class="titulo-produto">Camisa Lilás</h2>
                <h3 class="titulo-produto">R$72,50</h3>
            </a>
              <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar2" onclick="trocarImagem2()"></div>
                <script>
                  function trocarImagem2() {
                      var coracaofavoritar = document.getElementById('coracao-favoritar2');
                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                      } else {
                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                      }
                  }
                </script>
          </div>
          <div class="card-produto d-none d-md-block">
            <a href="produto-0004.php">
              <img src="../resources/images/roupas/0004.jpeg" alt="imagem-roupa" style="width: 30vh;">
                <h2 class="titulo-produto">Camisa Curta</h2>
                <h3 class="titulo-produto">R$35,60</h3>
            </a>
              <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar3" onclick="trocarImagem3()">
                  <script>
                    function trocarImagem3() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar3');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
          </div>
          <div class="card-produto d-none d-md-block">
            <a href="produto-0005.php">
              <img src="../resources/images/roupas/0005.jpeg" alt="imagem-roupa" style="width: 30vh;">
                <h2 class="titulo-produto">Camiseta Oversized</h2>
                <h3 class="titulo-produto">R$98,20</h3>
            </a>
              <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar4" onclick="trocarImagem4()">
                <script>
                  function trocarImagem4() {
                      var coracaofavoritar = document.getElementById('coracao-favoritar4');
                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                      } else {
                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                      }
                  }
                </script></div>
          </div>
        </div>
        </div>
        <div class="carousel-item">
          <div class="cards-wrapper">
            <div class="card-produto">
              <a href="produto-0011.php">
                <img src="../resources/images/roupas/0011.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Camisa Verde</h2>
                  <h3 class="titulo-produto">R$72,50</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar5" onclick="trocarImagem5()">
                  <script>
                    function trocarImagem5() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar5');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0012.php">
                <img src="../resources/images/roupas/0012.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Camisa Oversized</h2>
                  <h3 class="titulo-produto">R$35,60</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar6" onclick="trocarImagem6()">
                  <script>
                    function trocarImagem6() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar6');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0013.php">
                <img src="../resources/images/roupas/0013.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Camisa com Botão</h2>
                  <h3 class="titulo-produto">R$98,20</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar7" onclick="trocarImagem7()">
                  <script>
                    function trocarImagem7() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar7');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            
            <div class="card-produto d-none d-md-block">
              <a href="produto-0014.php">
                <img src="../resources/images/roupas/0014.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Camisa Gola Alta</h2>
                  <h3 class="titulo-produto">R$125,40</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar8" onclick="trocarImagem8()">
                  <script>
                    function trocarImagem8() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar8');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0015.php">
                <img src="../resources/images/roupas/0015.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Camiseta Verde</h2>
                  <h3 class="titulo-produto">R$84,70</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar9" onclick="trocarImagem9()">
                  <script>
                    function trocarImagem9() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar9');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="cards-wrapper">
            <div class="card-produto">
              <a href="produto-0021.php">
                <img src="../resources/images/roupas/0021.JPG" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Macacão Feminino</h2>
                  <h3 class="titulo-produto">R$98,20</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar10" onclick="trocarImagem10()">
                  <script>
                    function trocarImagem10() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar10');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
                  
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0022.php">
                <img src="../resources/images/roupas/0022.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Conjunto Pijama</h2>
                  <h3 class="titulo-produto">R$125,40</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar11" onclick="trocarImagem11()">
                  <script>
                    function trocarImagem11() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar11');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0023.php">
                <img src="../resources/images/roupas/0023.JPG" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Conjunto Suéter</h2>
                  <h3 class="titulo-produto">R$84,70</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar12" onclick="trocarImagem12()">
                  <script>
                    function trocarImagem12() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar12');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0024.php">
                <img src="../resources/images/roupas/0024.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Vestido Cami </h2>
                  <h3 class="titulo-produto">R$63,80</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar13" onclick="trocarImagem13()">
                  <script>
                    function trocarImagem13() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar13');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
            <div class="card-produto d-none d-md-block">
              <a href="produto-0025.php">
                <img src="../resources/images/roupas/0025.jpeg" alt="imagem-roupa" style="width: 30vh;">
                  <h2 class="titulo-produto">Conjunto Saia e Top</h2>
                  <h3 class="titulo-produto">R$110,90</h3>
              </a>
                <div class="div-botao"><button class="button-card-outline">Adicionar ao Carrinho</button>
                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar14" onclick="trocarImagem14()">
                  <script>
                    function trocarImagem14() {
                        var coracaofavoritar = document.getElementById('coracao-favoritar14');
                        if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                            coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                        } else {
                            coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                        }
                    }
                  </script></div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <footer>
      <div id="footer-content">
          <div id="sobre-footer">
            <h4>Sobre nós</h4><br>
          </div>
          <div id="atendimento-footer">
            <h4>Atendimento ao Cliente: (21) 99818-2680</h4><br>
          </div>
          <div id="social-footer">
            <h4>Redes Sociais:</h4><br>
            <div id="logos-footer">
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" style="fill: #eeeeee;transform: ;msFilter:;"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" style="fill: #eeeeee;transform: ;msFilter:;"><path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path></svg>
          </div>
        </div>
      </div>
    </footer>
    
    
    <script>
      function trocarImagem() {
          var coracaofavoritar = document.getElementById('coracao-favoritar');
          if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
              coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
          } else {
              coracaofavoritar.src = "../resources/images/coracao-roxo.png";
          }
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>