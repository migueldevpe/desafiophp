<? 
  session_start();

  $_SESSION["mensagem"];

  if (!isset($_SESSION["produtos"])) {
    $_SESSION["produtos"] = [];
  }

  if (isset($_POST["limpar"])) {
    $_SESSION["produtos"] = [];

    $_SESSION["mensagem"] = [
      "tipo" => "limpado",
      "texto" => "Lista de produtos limpa."
    ];

    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
    exit;
  }

  if (isset($_GET["remover"])) {
    $i = $_GET["remover"];

    unset($_SESSION["produtos"][$i]);

    $_SESSION["produtos"] = array_values($_SESSION["produtos"]);

    $_SESSION["mensagem"] = [
      "tipo" => "removido",
      "texto" => "Você removeu um produto."
    ];

    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
    exit;
  }
 
  if (isset($_POST["nome"], $_POST["preco"], $_POST["estoque"])) {
    $imagemNome = null;

    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === 0) {
      $pasta = "uploads/";

      if (!is_dir($pasta)) {
        mkdir($pasta);
      }

      $imagemNome = time() . "_" . $_FILES["imagem"]["name"];

      $caminhoFinal = $pasta . $imagemNome;

      move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoFinal);
    }

    $_SESSION["produtos"][] = [
      "imagem" => $imagemNome,
      "nome" => $_POST["nome"],
      "descricao" => $_POST["descricao"],
      "preco" => $_POST["preco"],
      "estoque" => $_POST["estoque"]
    ];

    $_SESSION["mensagem"] = [
      "tipo" => "sucesso",
      "texto" => "Produto cadastrado com sucesso."
    ];

    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
    exit;
  }

  $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY)
?>