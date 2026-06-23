<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Tela de Produtos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="sticky top-0 z-1">
    <div class="flex items-center justify-between mx-auto !p-4 bg-[#00BB77]">
      <h1 class="text-white font-semibold">Projeto 1</h1>
      <nav>
        <ul class="flex items-center justify-center flex-row gap-4">
          <li class="text-white font-semibold hover:underline"><a href="index.php" target="_parent" rel="referrer">Cadastrar</a></li>
          <li class="text-white font-semibold hover:underline"><a href="telaProd.php" target="_parent" rel="referrer">Produtos</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="flex flex-col gap-2 !p-4">
      <div class="flex items-center flex-row gap-2">
        <h1 class="[all:revert] !leading-1">Produtos</h1>
        <a 
          href="index.php"
          class="bg-[#008cff] hover:bg-[#0000ff] text-white font-semibold border border-black rounded-md !p-2 transistion-[background-color] duration-300 ease-in-out"
        >
          &#x270F Editar
        </a>
      </div>
      <div class="flex flex-row gap-2 flex-wrap">
        <?php 
          require_once("cadProd.php");

          foreach ($_SESSION["produtos"] as $i => $produto) {
            echo "
              <div
                key=\"$i\"
                class=\"grid [grid-template-rows:auto_1fr] gap-2 w-fit max-w-[258px] border border-[gray] !p-2 rounded-md\"
              >
                <div class=\"relative\">
                  <pre class=\"absolute top-1 left-1 bg-[#00000085] text-white rounded-md text-xs font-semibold !px-2\">ID do Produto: $i</pre>
                  <img 
                    src=\"" . ($produto["imagem"] ? "uploads/{$produto["imagem"]}" : "https://placehold.co/600x600?text={$produto["nome"]}") . "\" 
                    loading=\"eager\" 
                    fetchpriority=\"high\"
                    decoding=\"sync\"
                    class=\"aspect-1/1 max-w-60 w-full object-cover border border-[gray] rounded-md overflow-hidden select-none pointer-events-none\"
                  >
                </div>
                <div class=\"flex flex-col self-start gap-2 h-full\">
                  <h1>Produto: <strong>{$produto["nome"]}</strong></h1>
                  <h1>Descrição: 
                    <strong 
                      title=\"" . ($produto["descricao"] ? $produto["descricao"] : "N/A") . "\" 
                      class=\"line-clamp-2 break-all wrap-break-word wrap-anywhere\"
                    >
                      " . ($produto["descricao"] ? $produto["descricao"] : "N/A") . "
                    </strong>
                  </h1>
                  <h1>Valor: <strong>" . numfmt_format_currency($padrao, $produto["preco"], "BRL") . "</strong></h1>
                  <h1>Quantidade: <strong>{$produto["estoque"]}x</strong></h1>
                </div>
              </div>
            ";
          }
        ?>
      </div>
    </section>
  </main>
</body>
</html>