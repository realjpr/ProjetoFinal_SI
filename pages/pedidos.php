<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
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
            <li><a href="#"
                    class="text-(--corPrincipal) underline underline-offset-8 decoration-(--corPrincipal)">Pedidos</a>
            </li>
            <li><a href="produtos.php" class="hover:text-gray-500/80 transition">Produtos</a></li>
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
                <li><a href="#" class="text-sm text-(--corPrincipal)">Pedidos</a></li>
                <li><a href="produtos.php" class="text-sm">Produtos</a></li>
                <li><a href="fornecedores.php" class="text-sm">Fornecedores</a></li>
            </ul>

            <button onclick="location.href='../index.html'" type="button"
                class="bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-40 h-11 rounded-full">
                Sair
            </button>
        </div>
    </nav>

    <main>
        <section class="container mx-auto mt-10 gap-3 flex flex-col max-lg:justify-center max-lg:items-center lg:px-24 xl:px-32 lg:grid lg:grid-cols-3 lg:gap-2">
            <button class="js-abrir-modal shadow-xl text-xl border border-gray-300 active:scale-95 transition-all rounded-full flex justify-center items-center text-white bg-(--corPrincipal) hover:text-(--corPrincipal) hover:bg-white w-15 h-15 sm:w-20 sm:h-20 sm:mx-0 lg:w-25 lg:h-25 fixed bottom-5 right-5 sm:bottom-10 sm:right-10 lg:bottom-25 lg:right-25 z-20" data-target="Modal1">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                    <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
            </button>
        <?php
            include_once "../database/conexao.php";
            $stmt = $conexao -> prepare("SELECT ped_id, pro_nome, for_nome, ped_quantidade, ped_data FROM pedido_tbl INNER JOIN produtos_tbl USING (pro_id) INNER JOIN fornecedores_tbl USING (for_id) ORDER BY ped_id DESC");
            if($stmt -> execute()){
                while($row = $stmt -> fetch(PDO::FETCH_OBJ)){
                    echo"
                        <div class='mb-2'>
                            <div class='font-(family-name:--fontePrincipal) w-60 h-auto max-h-40 p-4 bg-white shadow-xl rounded-xl border-l-12 border-[#2503a4] sm:w-120 sm:mx-0 lg:w-80 lg:min-h-42 relative'>
                                <form method='get' action='../database/pedidosCRUD.php'>
                                        <input type='hidden' name='idPedido' value='{$row->ped_id}'>
                                        <button type='submit' id='botaoExcluirCard' class='absolute bottom-4 right-4 text-gray-400 hover:text-red-500 transition-colors duration-200 p-1 rounded-full z-2' aria-label='Excluir Pedido'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24'
                                                stroke='currentColor' stroke-width='2'>
                                                <path stroke-linecap='round' stroke-linejoin='round'
                                                    d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                            </svg>
                                        </button>
                                    </form>
                                <h2 class='text-2xl mb-3'>Pedido {$row->ped_id}</h2>
                                <p class='tituloCard'><span class='text-(--corSecundaria) ms-1'>Produto:</span> {$row->pro_nome}</p>
                                <p class='tituloCard'><span class='text-(--corSecundaria) ms-1'>Fornecedor:</span> {$row->for_nome}</p>
                                <p><span class='text-(--corSecundaria) ms-1'>Quantidade:</span> {$row->ped_quantidade}</p>
                                <p><span class='text-(--corSecundaria) ms-1'>Data:</span> {$row->ped_data}</p>
                            </div>
                        </div>
                    ";
                }
            }
        ?>

        </section>
    </main>

    <dialog id="Modal1"
        class="font-(family-name:--fontePrincipal) w-200 shadow-[0px_4px_25px_0px_#0000000D] rounded-xl p-12 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">

        <div class="flex flex-col justify-center gap-2">

            <h2 class="text-lg border-b-2 border-gray-300/60 mb-3">Cadastre um Pedido</h2>

            <form id="formularioPedidos" action="../database/pedidosCRUD.php" method="post">
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M232,48V88a8,8,0,0,1-16,0V56H184a8,8,0,0,1,0-16h40A8,8,0,0,1,232,48ZM72,200H40V168a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H72a8,8,0,0,0,0-16Zm152-40a8,8,0,0,0-8,8v32H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V168A8,8,0,0,0,224,160ZM32,96a8,8,0,0,0,8-8V56H72a8,8,0,0,0,0-16H32a8,8,0,0,0-8,8V88A8,8,0,0,0,32,96ZM80,80a8,8,0,0,0-8,8v80a8,8,0,0,0,16,0V88A8,8,0,0,0,80,80Zm104,88V88a8,8,0,0,0-16,0v80a8,8,0,0,0,16,0ZM144,80a8,8,0,0,0-8,8v80a8,8,0,0,0,16,0V88A8,8,0,0,0,144,80Zm-32,0a8,8,0,0,0-8,8v80a8,8,0,0,0,16,0V88A8,8,0,0,0,112,80Z">
                        </path>
                    </svg>
                    <!-- Input do produto pedido -->
                    <input id="input_Produto_Pedido" name="produtoPedido" type="text" placeholder="Produto"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M248,208H232V96a8,8,0,0,0,0-16H184V48a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16V208H24a8,8,0,0,0,0,16H248a8,8,0,0,0,0-16ZM216,96V208H184V96ZM56,48H168V208H144V160a8,8,0,0,0-8-8H88a8,8,0,0,0-8,8v48H56Zm72,160H96V168h32ZM72,80a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,80Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,80ZM72,120a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,120Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,120Z">
                        </path>
                    </svg>
                    <!-- Input do Fornecedor -->
                    <input id="input_Fornecedor_Pedido" name="fornecedorPedido" type="text" placeholder="Fornecedor"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M223.68,66.15,135.68,18a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32l80.34,44-29.77,16.3-80.35-44ZM128,120,47.66,76l33.9-18.56,80.34,44ZM40,90l80,43.78v85.79L40,175.82Zm176,85.78h0l-80,43.79V133.82l32-17.51V152a8,8,0,0,0,16,0V107.55L216,90v85.77Z">
                        </path>
                    </svg>
                    <!-- Input da quantidade pedida -->
                    <input id="input_Quantidade_Pedido" name="quantidadePedido" type="number" placeholder="Quantidade"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md lg:pe-5"
                        required>
                    <!---->
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#6B7280" viewBox="0 0 256 256">
                        <path
                            d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z">
                        </path>
                    </svg>
                    <!-- Input da data do pedido -->
                    <input id="input_Data_Pedido" name="dataPedido" type="date" placeholder="Data"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full md:text-md lg:pe-5"
                        required>
                    <!---->
                </div>



                <div class="flex gap-1 justify-end">

                    <button
                        class="js-fechar-modal bg-white text-gray-600 border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Cancelar</button>
                    <button type="submit" id="AceitarModalBotao1"
                        class="bg-(--corPrincipal) text-white border border-gray-300 mt-6 text-sm active:scale-95 transition-all w-25 h-11 rounded-full">Aceitar</button>

                </div>

            </form>
        </div>

    </dialog>

    <script src="../js/script.js"></script>
</body>

</html>