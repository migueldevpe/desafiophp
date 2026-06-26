<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Cadastro de produtos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <? 
    require_once("cadProd.php");

    if (isset($_SESSION["mensagem"])) {
      echo "
        <div 
          id=\"mensagem\"
          class=\"" . ($_SESSION["mensagem"]["tipo"] ===  "sucesso" ? "bg-[green]" : "bg-[red]") . " fixed bottom-4 right-4 w-fit text-white font-semibold rounded-md !p-2\"
        >
          <span>&#8505 {$_SESSION["mensagem"]["texto"]}</span>
        </div>

        <script>
          setTimeout(() => {
            const msg = document.getElementById(\"mensagem\");
            if (msg) {
              msg.remove();
            }
          }, 8000)
        </script>
      ";

      unset($_SESSION["mensagem"]);
    }
  ?>
  <header class="sticky top-0 z-1">
    <div class="flex items-center justify-between mx-auto !p-4 bg-[#00BB77]">
      <h1 class="text-white font-semibold">Projeto 1</h1>
      <nav>
        <ul class="flex items-center justify-center flex-row gap-4">
          <li class="text-white font-semibold hover:underline"><li class="text-white font-semibold hover:underline"><a href="index.php" target="_parent" rel="referrer">Cadastrar</a></li></li>
          <li class="text-white font-semibold hover:underline"><a href="telaProd.php" target="_parent" rel="referrer">Produtos</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="grid [grid-template-columns:auto_1fr] gap-4 !p-4">
      <form 
        action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" 
        method="post"
        enctype="multipart/form-data"
        class="sticky top-[72px] h-fit w-fit min-w-[215px]"
      >
        <fieldset class="[all:revert] !w-fit !rounded-lg">
          <legend class="[all:revert] !text-xl !font-semibold">Cadastrar novo produto</legend>
          <div class="flex items-center flex-col gap-3 !mt-1.5">
            <div>
              <label 
                for="imagem" 
                class="flex items-center justify-center self-center aspect-1/1 h-32 w-32 rounded-lg bg-[#DDDDDD] hover:bg-[#CCCCCC] text-sm text-[#999999] font-semibold border border-black cursor-pointer transition-[background-color] duration-300 ease-in-out"
              >Escolher imagem</label>
              <input 
                type="file" 
                accept=".webm,.jpg,.jpeg,.png"
                name="imagem" 
                id="imagem" 
                class="hidden"
              >
            </div>
            <div class="relative w-full max-w-64">
              <input 
                type="text" 
                name="nome" 
                id="nome" 
                value="<?= htmlspecialchars($_POST["nome"] ?? "") ?>"
                minlength="3"
                placeholder=""
                required
                class="peer flex flex-1 h-8 w-full border border-[gray] rounded-md !pl-1 transition-all duration-300 ease-in-out"
              >
              <label 
                for="nome"
                class="peer-focus:text-black peer-focus:text-xs peer-focus:top-0 peer-focus:pointer-events-auto peer-focus:bg-white peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-black peer-not-placeholder-shown:pointer-events-auto peer-not-placeholder-shown:bg-white text-[gray] absolute top-1/2 left-1 -translate-y-1/2 bg-transparent rounded-md !px-1 transition-[font-size,top,background-color,color] duration-300 ease-in-out pointer-events-none"
              >Nome do produto</label>
              <!-- value="<? //htmlspecialchars($_POST["nome"]) ?>" -->
            </div>
            <div class="relative w-full max-w-64">
              <textarea
                name="descricao" 
                id="descricao" 
                value="<?= htmlspecialchars($_POST["nome"] ?? "") ?>"
                minlength="3" 
                placeholder=""
                class="peer flex flex-1 h-8 w-full border border-[gray] rounded-md !pl-1 transition-all duration-300 ease-in-out"
              ></textarea>
              <label 
                for="descricao"
                class="peer-focus:text-black peer-focus:text-xs peer-focus:top-0 peer-focus:pointer-events-auto peer-focus:bg-white peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-black peer-not-placeholder-shown:pointer-events-auto peer-not-placeholder-shown:bg-white text-[gray] absolute top-1/2 left-1 -translate-y-1/2 bg-transparent rounded-md !px-1 transition-[font-size,top,background-color,color] duration-300 ease-in-out pointer-events-none"
              >Descrição do produto</label>
            </div>
            <div class="relative w-full max-w-64">
              <input 
                type="number" 
                name="preco" 
                id="preco" 
                placeholder=""
                value="<?= htmlspecialchars($_POST["preco"] ?? "") ?>"
                min="1"
                step="0.01"
                required
                class="peer h-8 w-full border border-[gray] rounded-md !pl-1"
              >
              <label 
                for="preco"
                class="peer-focus:text-black peer-focus:text-xs peer-focus:top-0 peer-focus:pointer-events-auto peer-focus:bg-white peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-black peer-not-placeholder-shown:pointer-events-auto peer-not-placeholder-shown:bg-white text-[gray] absolute top-1/2 left-1 -translate-y-1/2 bg-transparent rounded-md !px-1 transition-[font-size,top,background-color,color] duration-300 ease-in-out pointer-events-none"
              >Preço do produto</label>
            </div>
            <div class="relative w-full max-w-64">
              <input 
                type="number" 
                name="estoque" 
                id="estoque" 
                placeholder=""
                min="1"
                value="<?= htmlspecialchars($_POST["estoque"] ?? "") ?>"
                required
                class="peer h-8 w-full border border-[gray] rounded-md !pl-1"
              >
              <label 
                for="estoque"
                class="peer-focus:text-black peer-focus:text-xs peer-focus:top-0 peer-focus:pointer-events-auto peer-focus:bg-white peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-black peer-not-placeholder-shown:pointer-events-auto peer-not-placeholder-shown:bg-white text-[gray] absolute top-1/2 left-1 -translate-y-1/2 bg-transparent rounded-md !px-1 transition-[font-size,top,background-color,color] duration-300 ease-in-out pointer-events-none"
              >Estoque do produto</label>
            </div>
            <button 
              type="submit"
              class="h-8 w-full bg-[#00BB77] hover:bg-[#008000] text-white max-w-64 border border-black rounded-md font-semibold cursor-pointer transition-[background-color] duration-300 ease-in-out"
            >&#x002B Cadastrar</button>
          </div>
        </fieldset>
      </form>
      <div class="flex flex-col gap-2">
        <div class="flex items-center flex-row gap-2">
          <h1 class="[all:revert] !leading-1">Lista de produtos</h1>
          <form method="post">
            <button 
              type="submit" 
              name="limpar" 
              id="limpar"
              class="!px-4 !py-1 bg-[#FF2C2C] hover:bg-[#D20A2E] text-white font-semibold border border-black rounded-md cursor-pointer transition-[background-color] duration-300 ease-in-out"
            >&#x1F5D1 Limpar tudo</button>
          </form>
        </div>
        <div class="flex flex-row gap-2 flex-wrap">
          <?php 
            if (isset($_SESSION["produtos"])) {
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
                      <a 
                        href=\"?remover=$i\"
                        class=\"w-fit bg-[#FF2C2C] hover:bg-[#D20A2E] !p-2 border border-black rounded-md !mt-auto transition-[background-color] duration-300 ease-in-out\"
                      >&#x1F5D1</a>
                    </div>
                  </div>
                ";
              }
            } 
            
            if (isset($_SESSION["produtos"]) && count($_SESSION["produtos"]) === 0) {
              echo "<pre>Não há produtos cadastrados.</pre>";
            }

            // echo "<pre>";
            // var_dump($_SESSION["produtos"]);
            // echo "</pre>"
          ?>          
        </div>
      </div>
    </section>
  </main>
  <footer>

  </footer>
</body>
</html>