<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="shortcut icon" href="../images/logo/favicon/logoSimplificadoICO.ico" type="image/x-icon">

</head>

<body class="scroll-smooth">

    <nav class="h-[70px] relative w-full px-6 md:px-16 lg:px-24 xl:px-32 flex items-center justify-between z-20 bg-white font-(family-name:--fontePrincipal) shadow-[0px_4px_25px_0px_#0000000D] transition-all">

        <figure>
            <img src="../images/logo/logoPNG.png" alt="Logo da Empresa" class="w-35">
        </figure>

        <ul class="md:flex hidden items-center gap-10">
            <li><a href="pedidos.php" class="hover:text-gray-500/80 transition">Pedidos</a></li>
            <li><a href="#"
                    class="text-(--corPrincipal) underline underline-offset-8 decoration-(--corPrincipal)">Produtos</a>
            </li>
            <li><a href="fornecedores.php" class="hover:text-gray-500/80 transition">Fornecedores</a></li>
        </ul>

        <button onclick="location.href='../index.html'" type="button"
            class="bg-white hover:bg-(--corPrincipal) hover:text-white text-gray-600 border border-gray-300 md:inline hidden text-sm active:scale-95 transition-all w-40 h-11 rounded-full cursor-pointer">
            Sair
        </button>

        <button aria-label="menu-btn" type="button" class="menu-btn inline-block md:hidden active:scale-90 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="#000">
                <path
                    d="M 3 7 A 1.0001 1.0001 0 1 0 3 9 L 27 9 A 1.0001 1.0001 0 1 0 27 7 L 3 7 z M 3 14 A 1.0001 1.0001 0 1 0 3 16 L 27 16 A 1.0001 1.0001 0 1 0 27 14 L 3 14 z M 3 21 A 1.0001 1.0001 0 1 0 3 23 L 27 23 A 1.0001 1.0001 0 1 0 27 21 L 3 21 z">
                </path>
            </svg>
        </button>

        <div class="mobile-menu absolute top-[70px] left-0 w-full bg-white p-6 hidden md:hidden">
            <ul class="flex flex-col space-y-4 text-lg">
                <li><a href="pedidos.php" class="text-sm ">Pedidos</a></li>
                <li><a href="#" class="text-sm text-(--corPrincipal)">Produtos</a></li>
                <li><a href="fornecedores.php" class="text-sm">Fornecedores</a></li>
            </ul>

            <button onclick="location.href='../index.html'" type="button"
                class="bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-40 h-11 rounded-full">
                Sair
            </button>
        </div>
    </nav>

    <main>
        <section class="container mx-auto my-10 gap-3 flex flex-col max-lg:justify-center max-lg:items-center lg:px-24 xl:px-32 lg:grid lg:grid-cols-3 lg:gap-2">
            <button class="js-abrir-modal shadow-xl text-xl border border-gray-300 active:scale-95 transition-all rounded-full flex justify-center items-center text-white bg-(--corPrincipal) hover:text-(--corPrincipal) hover:bg-white w-15 h-15 sm:w-20 sm:h-20 sm:mx-0 lg:w-25 lg:h-25 fixed bottom-5 right-5 sm:bottom-10 sm:right-10 lg:bottom-25 lg:right-25 z-20"
                data-target="Modal2">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
            </button>

            <?php
                include_once "../database/conexao.php";

                $stmt = $conexao->prepare("SELECT * FROM produtos_tbl ORDER BY pro_nome ASC");

                if($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo "
                            <div class='mb-2'>
                                <div class='font-(family-name:--fontePrincipal) w-60 h-auto max-h-40 p-4 bg-white shadow-xl rounded-xl border-l-12 border-[#2503a4] sm:w-120 sm:mx-0 lg:w-80 lg:min-h-40 relative'>
                                    <form method='get' action='../database/produtosCRUD.php'>
                                        <input type='hidden' name='idProduto' value='{$row->pro_id}'>
                                        <button type='submit' id='botaoExcluirCard' class='absolute bottom-4 right-4 text-gray-400 hover:text-red-500 transition-colors duration-200 p-1 rounded-full z-2' aria-label='Excluir Produto'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24'
                                                stroke='currentColor' stroke-width='2'>
                                                <path stroke-linecap='round' stroke-linejoin='round'
                                                    d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                            </svg>
                                        </button>
                                    </form>
                                    <h2 class='text-2xl mb-3 tituloCard'>{$row->pro_nome}</h2>
                                    <p><span class='text-(--corSecundaria) ms-1'>Categoria:</span> {$row->pro_categoria}</p>
                                    <p><span class='text-(--corSecundaria) ms-1'>Preço:</span> R$ {$row->pro_preco}</p>
                                    <p><span class='text-(--corSecundaria) ms-1'>Estoque:</span> {$row->pro_estoque}</p>
                                </div>
                            </div>
                        ";
                    }
                } else {
                    echo "<p>Erro ao recuperar os produtos.</p>";
                }
            ?>

        </section>
    </main>

    <dialog id="Modal2"
        class="font-(family-name:--fontePrincipal) w-200 shadow-[0px_4px_25px_0px_#0000000D] rounded-xl p-12 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">

        <div class="flex flex-col justify-center gap-2">

            <h2 class="text-lg border-b-2 border-gray-300/60 mb-3">Cadastre um Produto</h2>

            <form id="formularioProdutos" action="../database/produtosCRUD.php" method="post">

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M87.24,52.59a8,8,0,0,0-14.48,0l-64,136a8,8,0,1,0,14.48,6.81L39.9,160h80.2l16.66,35.4a8,8,0,1,0,14.48-6.81ZM47.43,144,80,74.79,112.57,144ZM200,96c-12.76,0-22.73,3.47-29.63,10.32a8,8,0,0,0,11.26,11.36c3.8-3.77,10-5.68,18.37-5.68,13.23,0,24,9,24,20v3.22A42.76,42.76,0,0,0,200,128c-22.06,0-40,16.15-40,36s17.94,36,40,36a42.73,42.73,0,0,0,24-7.25,8,8,0,0,0,16-.75V132C240,112.15,222.06,96,200,96Zm0,88c-13.23,0-24-9-24-20s10.77-20,24-20,24,9,24,20S213.23,184,200,184Z">
                        </path>
                    </svg>
                    <!-- Input do Nome do Produto -->
                    <input id="input_Nome_Produto" name="nomeProduto" type="text" placeholder="Nome"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M216,72H131.31L104,44.69A15.86,15.86,0,0,0,92.69,40H40A16,16,0,0,0,24,56V200.62A15.4,15.4,0,0,0,39.38,216H216.89A15.13,15.13,0,0,0,232,200.89V88A16,16,0,0,0,216,72ZM40,56H92.69l16,16H40ZM216,200H40V88H216Z">
                        </path>
                    </svg>
                    <!-- Input da Categoria -->
                    <input id="input_Categoria_Produto" name="categoriaProduto" type="text" placeholder="Categoria"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M200,168a48.05,48.05,0,0,1-48,48H136v16a8,8,0,0,1-16,0V216H104a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,32,32h48a32,32,0,0,0,0-64H112a48,48,0,0,1,0-96h8V24a8,8,0,0,1,16,0V40h8a48.05,48.05,0,0,1,48,48,8,8,0,0,1-16,0,32,32,0,0,0-32-32H112a32,32,0,0,0,0,64h40A48.05,48.05,0,0,1,200,168Z">
                        </path>
                    </svg>
                    <!-- Input do Preço -->
                    <input id="input_Preco_Produto" name="precoProduto" type="number" placeholder="Preço"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md lg:pe-5"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M223.68,66.15,135.68,18a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32l80.34,44-29.77,16.3-80.35-44ZM128,120,47.66,76l33.9-18.56,80.34,44ZM40,90l80,43.78v85.79L40,175.82Zm176,85.78h0l-80,43.79V133.82l32-17.51V152a8,8,0,0,0,16,0V107.55L216,90v85.77Z">
                        </path>
                    </svg>
                    <!-- Input do Estoque do Produto -->
                    <input id="input_Estoque_Produto" name="estoqueProduto" type="number" placeholder="Estoque"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md lg:pe-5"
                        required>
                    <!---->
                </div>



                <div class="flex gap-1 justify-end">

                    <button class="js-fechar-modal bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Cancelar</button>
                    <button type="submit" id="AceitarModalBotao2" class="bg-(--corPrincipal) text-white border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Aceitar</button>

                </div>

            </form>
        </div>

    </dialog>

    <script src="../js/script.js"></script>
</body>

</html>