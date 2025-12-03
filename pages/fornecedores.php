<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
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
            <li><a href="produtos.php" class="hover:text-gray-500/80 transition">Produtos</a></li>
            <li><a href="#"
                    class="text-(--corPrincipal) underline underline-offset-8 decoration-(--corPrincipal)">Fornecedores</a>
            </li>
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
                <li><a href="produtos.php" class="text-sm ">Produtos</a></li>
                <li><a href="#" class="text-sm text-(--corPrincipal)">Fornecedores</a></li>
            </ul>

            <button onclick="location.href='../index.html'" type="button"
                class="bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-40 h-11 rounded-full">
                Sair
            </button>
        </div>
    </nav>

    <main>
        <section class="container mx-auto mt-10 gap-3 flex flex-col max-lg:justify-center max-lg:items-center lg:px-24 xl:px-32 lg:grid lg:grid-cols-3 lg:gap-2">

            <button class="js-abrir-modal shadow-xl text-xl border border-gray-300 active:scale-95 transition-all rounded-full flex justify-center items-center text-white bg-(--corPrincipal) hover:text-(--corPrincipal) hover:bg-white w-15 h-15 sm:w-20 sm:h-20 sm:mx-0 lg:w-25 lg:h-25 fixed bottom-5 right-5 sm:bottom-10 sm:right-10 lg:bottom-25 lg:right-25 z-20" data-target="Modal3">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
            </button>

            <?php
                include_once "../database/conexao.php";
                $stmt = $conexao->prepare("SELECT * FROM fornecedores_tbl ORDER BY for_nome ASC");
                if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo "
                            <div class='mb-2'>
                                <div class='font-(family-name:--fontePrincipal) w-60 h-auto max-h-40 p-4 bg-white shadow-xl rounded-xl border-l-12 border-[#2503a4] sm:w-120 sm:mx-0 lg:w-80 lg:min-h-40 relative'>
                                    <form method='get' action='../database/fornecedoresCRUD.php'>
                                        <input type='hidden' name='idFornecedores' value='{$row->for_id}'>
                                        <button type='submit' id='botaoExcluirCard' class='absolute bottom-4 right-4 text-gray-400 hover:text-red-500 transition-colors duration-200 p-1 rounded-full z-2' aria-label='Excluir Fornecedor'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24'
                                                stroke='currentColor' stroke-width='2'>
                                                <path stroke-linecap='round' stroke-linejoin='round'
                                                    d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                            </svg>
                                        </button>
                                    </form>
                                    <h2 class='text-2xl mb-3'>{$row->for_nome}</h2>
                                    <p><span class='text-(--corSecundaria) ms-1'>CNPJ:</span> {$row->for_cnpj}/14</p>
                                    <p><span class='text-(--corSecundaria) ms-1'>Cidade:</span> {$row->for_cidade}</p>
                                </div>
                            </div>
                        ";
                    }
                }
            ?>

        </section>
    </main>

    <dialog id="Modal3"
        class="font-(family-name:--fontePrincipal) w-200 shadow-[0px_4px_25px_0px_#0000000D] rounded-xl p-12 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">

        <div class="flex flex-col justify-center gap-2">

            <h2 class="text-lg border-b-2 border-gray-300/60 mb-3">Cadastre um Fornecedor</h2>

            <form id="formularioFornecedores" action="../database/fornecedoresCRUD.php" method="post">

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M87.24,52.59a8,8,0,0,0-14.48,0l-64,136a8,8,0,1,0,14.48,6.81L39.9,160h80.2l16.66,35.4a8,8,0,1,0,14.48-6.81ZM47.43,144,80,74.79,112.57,144ZM200,96c-12.76,0-22.73,3.47-29.63,10.32a8,8,0,0,0,11.26,11.36c3.8-3.77,10-5.68,18.37-5.68,13.23,0,24,9,24,20v3.22A42.76,42.76,0,0,0,200,128c-22.06,0-40,16.15-40,36s17.94,36,40,36a42.73,42.73,0,0,0,24-7.25,8,8,0,0,0,16-.75V132C240,112.15,222.06,96,200,96Zm0,88c-13.23,0-24-9-24-20s10.77-20,24-20,24,9,24,20S213.23,184,200,184Z">
                        </path>
                    </svg>
                    <!-- Input do Nome do Fornecedor -->
                    <input id="input_Nome_Fornecedor" name="nomeFornecedores" type="text" placeholder="Nome"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M232,96a7.89,7.89,0,0,0-.3-2.2L217.35,43.6A16.07,16.07,0,0,0,202,32H54A16.07,16.07,0,0,0,38.65,43.6L24.31,93.8A7.89,7.89,0,0,0,24,96h0v16a40,40,0,0,0,16,32v72a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8V144a40,40,0,0,0,16-32V96ZM54,48H202l11.42,40H42.61Zm50,56h48v8a24,24,0,0,1-48,0Zm-16,0v8a24,24,0,0,1-35.12,21.26,7.88,7.88,0,0,0-1.82-1.06A24,24,0,0,1,40,112v-8ZM200,208H56V151.2a40.57,40.57,0,0,0,8,.8,40,40,0,0,0,32-16,40,40,0,0,0,64,0,40,40,0,0,0,32,16,40.57,40.57,0,0,0,8-.8Zm4.93-75.8a8.08,8.08,0,0,0-1.8,1.05A24,24,0,0,1,168,112v-8h48v8A24,24,0,0,1,204.93,132.2Z">
                        </path>
                    </svg>
                    <!-- Input do CNPJ -->
                    <input id="input_CNPJ_Fornecedor" name="cnpjFornecedores" type="text" placeholder="CNPJ" maxlength="18"
                        class="bg-transparent text-gray-500/80     placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md" required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z">
                        </path>
                    </svg>
                    <!-- Input da Cidade do Fornecedor -->
                    <input id="input_Cidade_Fornecedor" name="cidadeFornecedores" type="text" placeholder="Cidade"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div class="flex gap-1 justify-end">

                    <button
                        class="js-fechar-modal bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Cancelar</button>
                    <button type="submit" id="AceitarModalBotao3"
                        class="bg-(--corPrincipal) text-white border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Aceitar</button>

                </div>

            </form>
        </div>

    </dialog>

    <script src="../js/script.js"></script>
</body>

</html>