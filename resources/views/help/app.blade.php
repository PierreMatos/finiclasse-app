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

    <title>Supp APP Finiclasse</title>
</head>

<body>
    <div class="container-fluid blacksection">
        <div class="row">
            <img src="{{ asset('storage/images/Logo.svg') }}" height="35px">
            <h3><br>Olá, precisa de ajuda a navegar na APP?</h3>

        </div>
    </div>

    <div class="container imagenslinks" style="text-align: center;">
        <div class="row">
            <div class="col">
                <a href="#home-anchor"><img src="{{ asset('storage/images/Grupo 17.svg') }}"></a>
            </div>
            <div class="col">
                <a href="#vendas-anchor"> <img src="{{ asset('storage/images/Grupo 26.png') }}"></a>
            </div>
            <div class="col">
                <a href="#clientes-anchor"><img src="{{ asset('storage/images/Grupo 29.png') }}"></a>
            </div>


        </div>

        <div class="row">
            <div class="col">
                <a href="#viaturas-anchor"><img src="{{ asset('storage/images/Grupo 27.png') }}"></a>
            </div>

            <div class="col">
                <a href="#relatorios-anchor"> <img src="{{ asset('storage/images/Grupo 28.png') }}"> </a>
            </div>
            <div class="col">
                <a href="#adicionar-anchor"> <img src="{{ asset('storage/images/Grupo 30.png') }}"> </a>
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
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                        presentes na Home?</h2>
                    <p> Na home é onde está presente os campos que nos redirecionada para as <b>Vendas</b> <img
                            src="{{ asset('storage/images/vendas1.png') }}" style="width: 25px;">,
                        <b>Viaturas</b> <img src="{{ asset('storage/images/viaturas2.png') }}" style="width: 25px;">,
                        <b>Clientes</b><img src="{{ asset('storage/images/clientes1.png') }}" style="width: 25px;">,
                        <b>Relatórios</b> <img src="{{ asset('storage/images/relatorios1.png') }}" style="width: 25px;">,
                        <b>Adicionar </b> <img src="{{ asset('storage/images/add1.png') }}" style="width: 25px;">,
                        o Perfil do utilizador <img src="{{ asset('storage/images/user.png') }}" style="width: 20px;">
                        e Notificações <img src="{{ asset('storage/images/notificação.png') }}" style="width: 20px;">.


                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/home.png') }}">
                </div>
            </div>

            <!--vendas -->
            <div id="vendas-anchor">
                <img src="{{ asset('storage/images/vendas1.png') }}" style="width: 30px;">
                <hr>
                <h1>Vendas</h1>
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais são funcionalidades
                        presentes no campo de Vendas?</h2>
                    <p> No campo de Vendas existem três (3) tipos de estados para as Propostas:
                        <br> <b>Proposta Aberta</b>, significa que o vendedor ainda está a construir a proposta.
                        <br> <b>Proposta Pendente</b>, significa que a proposta já foi criada porém tem pontos pendentes
                        no Estado da Proposta, isto
                        pode acontecer quando um dos pontos está em fase de validação por parte do Chefe de Vendas, como
                        por exemplo o ponto da Retoma
                        ou mesmo quando a percentagem do Estudo de Mercado não tiver dentro do intervalo verde para que
                        o vendedor possa partilhar.
                        <br> <b>Proposta Partilhada</b>, significa que a proposta já foi criada, preenchida e partilhada
                        com o cliente.
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/mobile-vendas.png') }}">

                    <p> No canto inferior direito de cada proposta, podemos encontrar um icon <img
                            src="{{ asset('storage/images/chevron-right-solid.png') }}" width="15px"> que nos permite
                        ver o <b>Estado da Proposta</b>.
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/mobile-vendas-proposta-de-vendas.png') }}">

                </div>
            </div>


            <!--Clientes-->
            <div id="clientes-anchor">
                <img src="{{ asset('storage/images/clientes1.png') }}" style="width: 35px;">
                <hr>
                <h1>Clientes</h1>
                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quando entramos na área
                        dos clientes o que encontramos?</h2>
                    <p> Quando entramos neste campo, podemos ver a <b>Listagem de clientes</b>, onde estão presentes as
                        informações correspondentes a cada cliente
                        como: se o <b>RGPD </b> foi validado, <b>Número de telefone</b> , <b>Número de contribuinte</b>,
                        <b>E-mail</b> e o <b>Histórico de compras</b> e <b>Compras agendadas</b>.
                        <br> No canto inferior direito temos um icon <img src="{{ asset('storage/images/add1.png') }}" style="width: 25px;">
                        que nos permite adicionar novos clientes à listagem.
                    </p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-cliente-1.png') }}">
                    <br>
                    <p>Com o auxilio da barra de pesquisa, podemos encontrar um cliente em especifico através de algum
                        dado como nome, e-mail, número de telefone ou número de contribuinte.</p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/clientes-barra-de-pesquisa.png') }}">
                </div>

                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como se processa a
                        criação de um novo cliente?</h2>
                    <p>Ao carregar no icon <img src="{{ asset('storage/images/add1.png') }}" style="width: 25px;">vai permitir adicionar novos
                        clientes à listagem, vai nos redirecionar para um
                        formulário onde se deve preencher com os dados do cliente, há vários tipos de cliente como:
                        <b>Particular</b>, <b>Empresa</b>
                        <b>Frotista</b>, <b>Grande Frotista</b> e <b>ENI</b>.
                    </p>
                    <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/clientes-criação.png') }}"> <img
                        class="prints-img-desktop" src="{{ asset('storage/images/clientes-criação2.png') }}">
                    <p> Após os campos serem preenchidos temos de selecionar o tipo de validação de RGPD, se a opção PDF
                        for selecionada vai aparecer após guardar a informação uma Declaração de Consentimento e
                        informação sobre Proteção de Dados que o cliente deve assinar.
                        Quando este processo estiver finalizado, iremos encontrar o novo cliente adicionado presente na
                        <b>Listagem de Clientes</b>.


                    </p>
                    <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/cliente-criação-RGPD.png') }}">
                </div>

                <div>
                    <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Qual a função do RGPD e
                        como saber se está validado?</h2>
                    <p> RGPD é um Regulamento Geral de Proteção de Dados que entrou em vigor a 25 de maio 2018,
                        centra-se na proteção na recolha e na
                        gestão de dados pessoais e aplica-se a todas as empresas e organizações da UE. </p>

                    <p> <b>Para saber se o RGPD foi validado</b>, é só selecionar o cliente e caso o RGPD tenha sido
                        validado vai aparecer um icon <img src="{{ asset('storage/images/check-circle-solid.png') }}"> acompanhado por <b>"RGPD
                            VALIDADO" </b>que irá confirmar esse estado.
                    </p>
                    <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/Mobile-RGPD-Validação.png') }}">

                    <p> <b>Caso o RGPD não tenha sido validado</b> irá aparecer a informação de: <b>"RGPD NÃO
                            VALIDADO"</b> e irá estar presente as formas possíveis de proceder à validação
                        por: <b>E-mail</b>, é enviado para o cliente um e-mail, <b>PDF</b>, abre uma Declaração de
                        Consentimento e informação sobre Proteção de Dados onde o cliente tem
                        de assinar e por fim por meio de <b>SMS</b>, o cliente recebe uma sms a pedir a validação.
                    </p>

                    <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/Mobile-RGPD-NãoValidado.png') }}">
                </div>
            </div>


        </div>


        <!--Viaturas-->

        <div id="viaturas-anchor">
            <img src="{{ asset('storage/images/viaturas2.png') }}" style="width:32px;">
            <hr>
            <h1>Viaturas</h1>
            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais são as funcionalidades
                    presentes no campo das Viaturas?</h2>
                <p> No campo das Viaturas existem quatro (4) tipos de estados:
                    <br> <b>Novos</b>, todas as viaturas novas que estão em stock.
                    <br> <b>Usados</b>, todas as viaturas usadas que estão disponíveis para venda (mostra todas as
                    viaturas de todos os Concessionários).
                    <br> <b>Semi-novos</b> --
                    <br> <b>Pedidos</b> --
                </p>
                <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/Mobile-viaturas.png') }}">
                <p>Para <b>consultar</b> as informações sobre as viaturas, ao carregar em cima delas podemos ver as
                    caraterísticas mais detalhadas, seu o estado e qual é Stand.</p>
                <img class="prints-img-desktop mt-2" src="{{ asset('storage/images/Mobile-viaturas-consulta.png') }}">
            </div>
        </div>



        <!--Relatórios -->
        <div id="relatorio-anchor">
            <img src="{{ asset('storage/images/relatorios1.png') }}" style="width: 30px;">
            <hr>
            <h1>Relatórios</h1>
            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                    presentes no campo dos Relatórios?</h2>
                <p> No campo do relatório temos acesso a várias informações sobre o vendedor como:
                    <br> <img src="{{ asset('storage/images/viaturas2.png') }}" style="width: 25px;"> <b>Viatura de serviço</b>, qual é o
                    veiculo que está a ser usado pelo vendedor.
                    <br> <img src="{{ asset('storage/images/cadeado.png') }}" style="width: 14px;"> <b> Alterar password</b>, permite ao
                    utilizar fazer a mudança da sua passe de segurança.
                    <br> <img src="{{ asset('storage/images/question-circle-solid.png') }}" style="width: 16px;"> <b>Contactar Suporte</b>,
                    permite o utilizador pedir auxilio para algum problema que esteja a ter.


                </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-relatorios.png') }}">
            </div>
        </div>


        <!-- Proposta -->
        <div id="adicionar-anchor">
            <img src="{{ asset('storage/images/add1.png') }}" style="width: 30px;">
            <hr>
            <h1>Proposta</h1>
            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Quais as funcionalidades
                    presentes no campo das Propostas?</h2>
                <p>Neste campo é onde se cria uma <b>Proposta</b> nova.
                    Neste está presente o processo desde o inicio até ao fim da criação de uma proposta
                    e para isso temos várias estados que temos de definir como: <b>Cliente</b>, <b>Viatura</b>,
                    <b>Retoma</b>, <b>Campanhas</b>, <b>Financiamento</b>, <b>Apoios</b> e <b>Proposta</b>.
                </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/mobile-proposta-estados1.png') }}">
                <img class="prints-img-desktop" src="{{ asset('storage/images/mobile-proposta-estados2.png') }}">
                <img class="prints-img-desktop" src="{{ asset('storage/images/mobile-proposta-estados3.png') }}">

            </div>

            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado do
                    Cliente?</h2>
                <p>Para conseguirmos validar o estado do <b>Cliente</b> temos que começar por selecionar o cliente a
                    qual se destina a <b>Proposta</b>. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-cliente-1.png') }}">

                <p>Com o auxilio da barra de pesquisa, podemos encontrar um cliente em especifico através de algum dado
                    como <b>nome, e-mail, número de telefone ou número de contribuinte</b>.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-adicionar-pesquisar.png') }}"> </p>


                <p> Caso o cliente ainda não tenha sido adicionado à <b>Listagem de clientes</b> podemos adicionar um
                    novo cliente
                    selecionando o icon <img src="{{ asset('storage/images/Mobile-proposta-adicionar.png') }}" style="width: 40px;">, depois de
                    preencher os campos com os dados do cliente, gravamos e o novo cliente já irá aparecer na
                    <b>Listagem de Clientes</b>.
                </p> <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-cliente-adicionarnovo.png') }}">

                <p>Para visualizar a ficha do cliente é só selecionar o icon <img src="{{ asset('storage/images/eye-solid.svg') }}"
                        style="width: 20px;">.</p>

                <p>Após o cliente ser selecionado vai aparecer ao lado da ficha do cliente a cor verde <img
                        src="{{ asset('storage/images/verde.png') }}"> que indica a seleção do cliente.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-cliente-2.png') }}">
                <p>Para avançar para o estado seguinte temos que <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                        style="width: 70px;"> para que fique gravado e o estado do cliente fique validado <img
                        src="{{ asset('storage/images/check-circle-regular.svg') }}">, que significa que o cliente já está vinculado na
                    proposta. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-cliente-3.png') }}">
            </div>

            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado da
                    Viatura?</h2>
                <p>Neste estado vamos selecionar a viatura e adiciona-la à proposta para o Cliente. Para auxiliar numa
                    pesquisa mais eficiente, temos presente uma barra de pesquisa e um sistema de filtragem
                    onde estão presentes quatro (4) filtros: <b>Todos</b>, <b>Novo</b>, <b>Usado</b> e <b>Semi-Novo</b>,
                    este permite-nos ter uma visão das viaturas de forma mais segmentada ou generalizada.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura.png') }}"> <img
                    class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura2.png') }}">

                <p>Para visualizar a ficha da viatura é só selecionar o icon <img src="{{ asset('storage/images/eye-solid.svg') }}"
                        style="width: 20px;">.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura4.png') }}">

                <p>Quando selecionamos uma viatura à proposta aparece no lado direito a cor verde <img
                        src="{{ asset('storage/images/verde.png') }}"> que indica a seleção da ficha viatura. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura3.png') }}">

                <p>Para avançar para o estado seguinte temos que <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                        style="width: 70px;"> para que fique gravado e o estado da Viatura fique validado <img
                        src="{{ asset('storage/images/check-circle-regular.svg') }}">, que significa que a viatura já está vinculado à
                    proposta. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura5.png') }}">

                <p> <b>Quando o cliente faz um pedido de uma viatura com caraterísticas específicas e essa mesma viatura
                        ainda não existe</b>, temos que criar uma simulação do pedido do cliente com a opção de <img
                        src="{{ asset('storage/images/Mobile-proposta-viatura5-adicionarpos.png') }}" style="width: 110px;"></p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura5.png') }}">

                <p>Após a opção de <img src="{{ asset('storage/images/Mobile-proposta-viatura5-adicionarpos.png') }}" style="width: 110px;"> ser selecionada, vai nos rederecionar
                para um formulário para preencher com as caraterísticas específicas da viatura pedidas pelo o cliente.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura5-adicionarpos2.png') }}">
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-viatura5-adicionarpos3.png') }}">
                
                <p >No final de preencher os dados, temos que <img src="{{ asset('storage/images/Mobile-proposta-viatura5-adicionarpos-escolherficheiro.png') }}"> para anexar à proposta.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/documento-viaturas.png') }}">
                
                <p> Neste sentido, quando tudo tiver concluído seleciona-se o <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                    style="width: 70px;"> para gravar a informação deste pedido de viatura com caraterísticas específicas à proposta do Cliente. Depois desta simulação ser criada, vai aparecer na listagem das viaturas, esta vai ter a possibilidade de edição após estar criada, caso haja necessidade de fazer alterações nos dados preenchidos.  </p>

            </div>

            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado da Retoma?</h2>
                <p>Este campo serve para apontar se o cliente tem algum carro para dar à troca. 
                    <br> Se o cliente não tiver selecionamos a opção <img src="{{ asset('storage/images/Mobile-retoma-não.png') }}" style="width: 110px;"> 
                    <br> Se o cliente tiver algum carro para troca, selecionamos a opção <img src="{{ asset('storage/images/Mobile-retoma-sim.png') }}" style="width: 110px;"></p>

                <p> Ao selecionar a opção  <img src="{{ asset('storage/images/Mobile-retoma-sim.png') }}" style="width: 110px;"> vai automaticamente aparecer um formulário para colocar as caraterísticas da viatura como: 
                <br> Marca, Modelo, Categorias, Km, Motorização, Matrícula, Combustível, Valor de compra (valor que vai ser comprado ao cliente), Valor de venda (valor que vai ser vendido posteriormente), Observações (danos que o carro tenha ou outros aspectos). </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-retoma-sim-preencher.png') }}">
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-retoma-sim-preencher2.png') }}">
                <p> Após ser preenchido os dados da viatura, temos uma possibilidade de marcar <img src="{{ asset('storage/images/Mobile-retoma-comprador.png') }}">caso tenhamos um potencial cliente para comprar a viatura.
                <br>E por fim temos a opção de adicionar as fotos da viatura para a sua avaliação. De seguida deve-se selecionar o botão <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                style="width: 70px;"> para que as informações fiquem gravadas e o campo da Retoma fique validado <img src="{{ asset('storage/images/check-circle-regular.svg') }}">.
             </p>
             <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-retoma-validar.png') }}">
            </div>

            
            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado da Campanha?</h2>
                <p>Ficheiros que são atualizados pelos Chefes de vendas, que ficam automáticamente disponíveis na aplicação do vendedor. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-campanhas1.png') }}">

                <p> Existe um campo onde se pode ver as campanhas disponíveis. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-campanhas2.png') }}">

                <p>Após selecionar-mos a campanha, vai ser apresentada a Tabela respetiva àquela campanha, onde irá estar presente os valores de apoio.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-campanhas3.png') }}">

                <p>Esta Tabela vai permitir ao vendedor ter acesso aos dados para <img src="{{ asset('storage/images/Mobile-campanhas-adicionar.png') }}"  style="width: 80px;"> os Valores da Campanha. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-campanhas4.png') }}">

                <p>  Para gravar este processo devemos selecionar o botão de <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                    style="width: 70px;"> para que o campo da Campanha fique validado <img src="{{ asset('storage/images/check-circle-regular.svg') }}">.</p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-campanha-apoios.png') }}">
        
            </div>

            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado do Financiamento?</h2>
                <p>Caso o vendedor obte por apresentar os tipos de financiamentos que o cliente pode ter.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-financiamento.png') }}">
                <p>Ao selecionar <img src="{{ asset('storage/images/Mobile-financiamento-selecionar.png') }}"> a campanha, vai nos permitir anexar o PDF <img src="{{ asset('storage/images/Mobile-financiamento-PDF.png') }}" style="width: 50px;"> à proposta.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-financiamento-opçõesselecionadas.png') }}">
                <p>Depois é só preciso <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                    style="width: 70px;"> para gravar o contéudo selecionado e anexado para que o campo do financiamento fique validado. <img src="{{ asset('storage/images/check-circle-regular.svg') }}"></p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-financiamento-opçõesselecionadas.png') }}">
            </div>








            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado dos Apoios?</h2>
                <p>Ficheiros que são atualizados pelos Chefes de vendas, que ficam automáticamente disponíveis na aplicação do vendedor. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-apoios-1.png') }}">

                <p> Existe um campo onde se pode ver as opções de apoios disponíveis. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-apoios-2.png') }}">

                <p>Após selecionar-mos uma das opções, vai ser apresentada a Tabela respetiva àquele apoio, onde irá estar presente os valores de apoio.</p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-apoios-3-tabela.png') }}">

                <p>Esta Tabela vai permitir ao vendedor ter acesso aos dados para <img src="{{ asset('storage/images/Mobile-campanhas-adicionar.png') }}"  style="width: 80px;"> os Valores do Apoio. </p>
                <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-apoios-4-preencher1.png') }}">

                <p>  Para gravar este processo devemos selecionar o botão de <img src="{{ asset('storage/images/Mobile-proposta-guardar.png') }}"
                    style="width: 70px;"> para que o campo do Apoio fique validado <img src="{{ asset('storage/images/check-circle-regular.svg') }}">.</p>
                    <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-apoios-4-preencher.png') }}">
                
        
            </div>

            <div>
                <h2><img class="answerline" src="{{ asset('storage/images/Caminho6.svg') }}" style="width: 17px;">Como funciona o estado das Propostas?</h2>
                <p> Resumo de todos os estados anteriores da proposta, este permite-nos aceder à informação sobre a proposta em geral como: informação sobre o cliente,
                     a viatura que foi proposta, a retoma e o valor que estamos a propor pela viatura, a camapanha, apoios, financiamentos selecionados e <b>avaliação da proposta</b>. 
                     <br>É na avaliação da proposta que vai estar presente as informações de validações relevantes como: se o RGPD foi validado pelo cliente e se a Retoma e o Estudo de Negócio foram validados pelo Chefe de Vendas. </p>
                     <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-1.png') }}">
                     <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-2.png') }}">
                     <img class="prints-img-desktop" src="{{ asset('storage/images/Mobile-proposta-3.png') }}">

                     <p>Para ver o Estudo de Negócio, basta selecionar o botão <img src="{{ asset('storage/images/Mobile-proposta-4-estudodemercado.png') }}"  style="width: 130px;">, este vai permitir ao vendedor definir alguns campos como o IVA e também alterar alguns campos caso haja necessidade de ajustar dados referentes à proposta. </p>
                     <p>Caso esteja tudo retificado e validado, o vendedor pode partilhar a proposta com o cliente selecionando o botão <img src="{{ asset('storage/images/Mobile-proposta-partilharbotão.png') }}"  style="width: 130px;">. </p>
            </div>

        </div>





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