<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/fini/styles.css') }}">

    <title>Supp Finiclasse</title>
</head>

<body>
    <div class="container-fluid blacksection">
        <div class="row">
            <img src="{{ asset('storage/images/Logo.svg') }}" height="35px">
            <h3><br>Olá, como podemos ajudar?</h3>

        </div>
    </div>

    <div class="container imagenslinks">
        <div class="row">

            <div class="col">
                <a href="#home-anchor"> <img src="{{ asset('storage/images/Grupo 17.svg') }}"></a>
            </div>
            <div class="col">
                <a href="#proposta-anchor"><img src="{{ asset('storage/images/Grupo 18.svg') }}"></a>
            </div>
            <div class="col">
                <a href="#financiamento-anchor"><img src="{{ asset('storage/images/Grupo 19.svg') }}"></a>
            </div>
            <div class="col">
                <a href="#campanhas-anchor"> <img src="{{ asset('storage/images/Grupo 20.svg') }}"> </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="#beneficios-anchor"> <img src="{{ asset('storage/images/Grupo 24.svg') }}"> </a>
            </div>
            <div class="col">
                <a href="#viaturas-anchor"> <img src="{{ asset('storage/images/Grupo 23.svg') }}"> </a>
            </div>
            <div class="col">
                <a href="#clientes-anchor"> <img src="{{ asset('storage/images/Grupo 22.svg') }}"> </a>
            </div>
            <div class="col">
                <a href="#vendedores-anchor"> <img src="{{ asset('storage/images/Grupo 21.svg') }}"> </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!--Home -->
            <div id="home-anchor">
                <img src="{{ asset('storage/images/home-solid.svg') }}" style="width: 23px;">
                <hr>
                <h1>Home</h1>
                <div></div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais são funcionalidades dos
                    campos presentes no Dashboard?</h2>
                <p> <button type="button" class="btn" id="viatura-color">Viaturas <img
                            src="{{ asset('storage/images/car-solid1.svg') }}"></button> Redireciona para a página das viaturas (1) dá para
                    Adicionar novas viaturas, Visualizar, Editar informações do veiculo e Eliminar.</p>
                <p> <button type="button" class="btn  btn-warning" style="color: white;">Clientes <img
                            src="{{ asset('storage/images/users-solid1.svg') }}"></button> Redireciona para a página dos Clientes (2), dá para
                    Adicionar, Visualizar, Editar e Eliminar fichas de clientes.</p>
                <p> <button type="button" class="btn  btn-success">Propostas Abertas <img
                            src="{{ asset('storage/images/grafico-de-crescimento.svg') }}"></button> Este apresenta a número de Propostas
                    Abertas e redireciona para a página das Propostas (3) - filtro nas Propostas Abertas.</p>
                <p> <button type="button" class="btn btn-danger">Propostas Fechadas <img
                            src="{{ asset('storage/images/data-management1.svg') }}"></button> Este apresenta a número de Propostas Fechadas e
                    redireciona para a página das Propostas (3) - filtro nas Propostas Fechadas.</p>
                <a>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/dashboard-home.png') }}">

                </a>
            </div>


            <!--Proposta -->
            <div id="proposta-anchor">
                <img src="{{ asset('storage/images/file-contract-solid.svg') }}" style="width: 17px;">
                <hr>
                <h1>Proposta</h1>
                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais são as
                        funcionalidades das abas
                        existentes na Proposta ?</h2>
                    <p> <button type="button" class="btn btn-primary">Todos</button> Mostra todas as propostas</p>
                    <p> <button type="button" class="btn btn-success">Aberto</button> Mostra apenas as propostas abertas
                    </p>
                    <p> <button type="button" class="btn btn-warning">Pendente</button> Mostra apenas as propostas
                        pendentes</p>
                    <p> <button type="button" class="btn btn-secondary">Perdido</button> Mostra apenas as propostas
                        perdidas</p>
                    <p> <button type="button" class="btn btn-danger">Fechado</button> Mostra apenas as propostas que
                        foram fechadas</p>
                </div>

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como visualizar e
                        eliminar uma
                        Proposta?</h2>
                    <p> Na secção das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">
                        e Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as informações das propostas.</p>
                </div>

                <img class="prints-img-desktop" src="{{ asset('storage/images/prpostanew.png') }}">
            </div>


            <!--Financiamento -->

            <div id="financiamento-anchor">
                <img src="{{ asset('storage/images/credit-card-solid.svg') }}" style="width: 21px;">
                <hr>
                <h1>Financiamento</h1>
                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        gerais do campo do Financiamento?</h2>
                    <p> Temos várias funcionalidades presentes como: <button type="button"
                            class="btn btn-primary">Adicionar</button> novos Financiamentos.
                        <br> Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar
                        <img src="{{ asset('storage/images/edit-regular.svg') }}"> e Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                        informações do veiculo.
                    </p>

                    <img class="prints-img-desktop" src="{{ asset('storage/images/print-financiamento.png') }}">


                </div>

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;"> Como adicionar um
                        Financiamento?</h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button> <br> Ao carregar no botão
                        adicionar permite-nos anexar o contrato feito, o nome e a descrição referente ao financiamento
                        <br>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/financiamentonew.png') }}">
                </div>
            </div>


            <!--Campanhas -->
            <div id="campanhas-anchor">
                <img src="{{ asset('storage/images/percent-solid.svg') }}" style="width: 13px;">
                <hr>
                <h1>Campanhas</h1>
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        gerais do campo das Campanhas?</h2>
                    <p> Temos várias funcionalidades presentes como: <button type="button"
                            class="btn btn-primary">Adicionar</button> novas campanhas.
                        <br> Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar
                        <img src="{{ asset('storage/images/edit-regular.svg') }}"> e Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                        informações das campanhas.

                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/campanhas.png') }}">
                </div>

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;"> Como adicionar uma nova
                        Campanha?</h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button> <br> Ao carregar no botão
                        adicionar permite-nos anexar o documento referente à campanha, o nome e a sua descrição.
                        <br>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/campanhas-criar.png') }}">
                </div>
            </div>

            <!--Beneficios -->
            <div id="beneficios-anchor">
                <img src="{{ asset('storage/images/euro-sign-solid.svg') }}" style="width: 12px;">
                <hr>
                <h1>Benefícios</h1>
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        gerais do campo benefícios?</h2>
                    <p> Temos várias funcionalidades presentes como: <button type="button"
                            class="btn btn-primary">Adicionar</button> novas campanhas.
                        <br> Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar
                        <img src="{{ asset('storage/images/edit-regular.svg') }}"> e Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                        informações sobre os benefícios.

                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/2.png') }}">
                </div>

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;"> Como adicionar um novo
                        Benefício?</h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button> <br> Ao carregar no botão
                        adicionar permite-nos anexar o documento referente à campanha e dar um nome.
                        <br>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/1.png') }}">
                </div>
            </div>

            <!--Viaturas-->
            <div id="viaturas-anchor">
                <img src="{{ asset('storage/images/car-solid.svg') }}" style="width: 23px;">
                <hr>
                <h1>Viaturas</h1>
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        gerais do campo das Viaturas?</h2>
                    <p> (1) Temos várias funcionalidades presentes como: <button type="button"
                            class="btn btn-primary">Adicionar</button> novos veículos, onde temos campos para a
                        informação
                        <u>Geral</u>, <u>Caraterísticas</u>, <u>Equipamentos</u> e <u>fotos</u> do carro. <br>
                        Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar <img
                            src="{{ asset('storage/images/edit-regular.svg') }}"> e Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                        informações do veiculo.
                        <br>Para auxiliar numa navegação mais rápida temos dois tipos de filtros:
                        <br> <b>Filtro 1</b> ver <span class="border-black ">Todos</span> os Carros, <span
                            class="border-black ">Usados</span> ou <span class="border-black ">Semi-Novos</span>;
                        <br> <b> Filtro 2</b> ver <span class="border-black ">Todos</span>os carros, <span
                            class="border-black ">Mercedez </span> ou <span class="border-black ">Seat</span> .
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/viaturas1.png') }}">
                </div>

                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais os campos a se
                        preencher para Adicionar uma Viatura?
                    </h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button>

                    <p><b>Geral</b> - campo da informação geral da viatura, que é onde irá estar presente a info da
                        viatura,
                        neste existem campos de preenchimento obrigatório como é o caso da Marca, Modelo e Motorização
                        para
                        se conseguir guardar o conteúdo adicionado à base de dados.</p>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/viatuaras-adicionar1.png') }}">

                    <br>
                    <p><b>Características</b> - campo de informação onde especifica as caraterísticas da viatura</p>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/viatuaras-adicionar2.png') }}">

                    <br>
                    <p><b>Equipamentos </b> - campo de informação adicional sobre a viatura e os seus extras</p>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/viatuaras-adicionar3.png') }}">

                    <br>
                    <p><b>Fotos </b> - campo para adicionar as fotográficas referentes à viatura, esta tem máximo de 4
                        fotos
                    </p>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/viatuaras-adicionar4.png') }}">

                </div>
            </div>


            <!--Clientes -->
            <div id="clientes-anchor">
                <img src="{{ asset('storage/images/users-solid.svg') }}" style="width: 23px;">
                <hr>
                <h1>Clientes</h1>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                    gerais
                    do campo dos Clientes?</h2>
                <p>(2) Temos várias funcionalidades presentes como: <button type="button"
                        class="btn btn-primary">Adicionar</button> novos Clientes.
                    <br> Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar <img
                        src="{{ asset('storage/images/edit-regular.svg') }}"> ou Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                    informações
                    do Cliente.
                    <br>Para auxiliar numa navegação mais rápida existe o sistema de filtragem:Todos, Particular,
                    Empresa,
                    Frotista, Grande Frotista e ENI
                    <br>Também existe o sistema de validação: Validado <img src="{{ asset('storage/images/verde.png') }}"> Não Validado <img
                        src="{{ asset('storage/images/vermelho.png') }}">
                </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/clientes.png') }}">

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;"> Como adicionar novos
                        Clientes?</h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button> <br> Ao carregar no botão
                        adicionar temos acesso a vários campos de preenchimento, que tem como finalidade serem preenchidas com
                        os dados do novo cliente.
                        <br>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/clientes-criar.png') }}">
                </div>
            </div>


            <!--Vendedores-->

            <div id="vendedores-anchor">
                <img src="{{ asset('storage/images/user-tie-solid.svg') }}" style="width: 17px;">
                <hr>
                <h1>Vendedores</h1>
                <div>
                    <p>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        gerais
                        do campo dos Vendedores?</h2>
                    <p> Temos várias funcionalidades presentes como: <button type="button"
                            class="btn btn-primary">Adicionar</button> novos Vendedores.
                        <br> Na parte das <b>Ações</b> podemos Visualizar <img src="{{ asset('storage/images/eye-regular.svg') }}">, Editar
                        <img src="{{ asset('storage/images/edit-regular.svg') }}"> ou Eliminar <img src="{{ asset('storage/images/trash-alt-regular.svg') }}"> as
                        informações
                        do Vendedor.
                    </p>

                    <img class="prints-img-desktop" src="{{ asset('storage/images/vendedores.png') }}">
                </div>

                <div>
                    <h2> <img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;"> Como adicionar novos Vendedores?</h2>
                    <p> <button type="button" class="btn btn-primary">Adicionar</button> <br> Ao carregar no botão
                        adicionar temos acesso a vários campos de preenchimento, que tem como finalidade preencher com
                        os dados de um novo vendedor.
                        <br>
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/criar-vendedor.png') }}">
                </div>

            </div>
</body>
            <!--Footer-->
          <footer>
                <div class="container-fluid blacksection">
                    <div class="row">
                        <img src="{{ asset('storage/images/Logo.svg') }}" height="35px">
                     
            
                    </div>
                </div>
                </footer>
            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</html>