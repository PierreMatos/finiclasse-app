<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - RGPD</title>
</head>

<body>
    <div class="container">
        <h1>Finiclasse</h1>
    </div>

    <div class="container">
        <h5>Declaração de Consentimento e informação sobre Proteção de Dados</h5>

        <form>
            <div class="input-group mb-3">
                <div class="input-group-prepend divInlineBlock labelWidth">
                    <span class="input-group-text">Nome:</span>
                </div>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control w90" readonly>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend divInlineBlock labelWidth">
                    <span class="input-group-text">Morada:</span>
                </div>
                <input type="text" name="address"
                    value="{{ $user->adress }} {{ $user->zip_code }} {{ $user->city }}" class="form-control w90"
                    readonly>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend divInlineBlock">
                    <span class="input-group-text">Telefone:</span>
                </div>
                <input type="text" name="phone"
                    value="{{ $user->phone }} @if ($user->phone)/@endif {{ $user->mobile_phone }}"
                    class="form-control w25" readonly>

                <div class="input-group-prepend divInlineBlock">
                    <span class="input-group-text">E-mail:</span>
                </div>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control w30" readonly>

                <div class="input-group-prepend divInlineBlock">
                    <span class="input-group-text">NIF:</span>
                </div>
                <input type="text" name="nif" value="{{ $user->nif }}" class="form-control w23" readonly>
            </div>
        </form>

        <p>Porque para nós é muito importante prestar-lhe informação e aconselhamento personalizados e de acordo com os
            seus interesses específicos,
            gostaríamos de solicitar o seu consentimento para utilização dos seus dados. Iremos salvaguardar devida e
            diligentemente a sua privacidade e
            confidencialidade. </p>

        <p>
            Como usamos os seus dados pessoais
            <br><br>
            Para este efeito dou o meu consentimento expresso e de forma livre e esclarecida, à Finiclasse, para que os
            seguintes dados pessoais:
            <br>
            <b>1) O meu nome e contatos</b> (por exemplo, morada, endereço de e-mail, número de telefone, ID de
            mensagens
            instantâneas, contatos de redes sociais),
            <br>
            <b>2) informações pessoais que tenha fornecido</b> (por exemplo, atividades, interesses, agregado familiar),
            <br>
            <b>3) informação sobre o meu veículo</b> (por exemplo, configuração do veículo, quilometragem, informação
            digital
            sobre serviços efetuados) e
            <br>
            <b>4) informação sobre produtos usados e serviços subscritos</b> (exemplo, contratos de financiamento e
            seguro,
            serviços agendados com Mercedes me,
            configurações de veículos armazenadas) <b>sejam recolhidos, processados e utilizados</b>

            <br><br>
            Os dados serão usados para a apresentação de informações e ofertas personalizadas aos meus interesses (por
            exemplo, test drives, eventos, ofertas
            especiais, serviços nos concessionários e divulgação de novos produtos e serviços), que podem ser
            apresentadas por escrito, pessoalmente ou através
            dos canais de contato selecionados. Para esta finalidade, podem ser usados processos analíticos de criação
            de perfis para avaliar os meus interesses.
            Para mais informações, consulte a nossa Política de Privacidade, em <a
                href="http://www.finiclasse.pt/">Finiclasse</a>.

            <br><br>
            Como atualizar as suas preferências

            <br><br>
            O tratamento dos seus dados pessoais para as finalidades indicadas é baseado no nosso interesse legítimo e
            no seu consentimento. A prestação de
            consentimento é voluntária, só processaremos os seus dados pessoais com base no consentimento dado para as
            finalidades indicadas, e até que este
            consentimento seja revogado ou haja oposição ao tratamento.

            <br><br>
            Para o efeito, poderá a qualquer momento contatar-nos através do e-mail: <b>rgpd@finiclasse.pt</b> ou para a
            morada:

            <br><br>
            Variante à A25 – Cruzamento do Alvendre
            <br>
            6300 – 860 Guarda

        <div class="page"></div>

        <br><br>
        A retirada de consentimento não afeta a legalidade dos tratamentos anteriormente efetuados com base no
        consentimento ou de outras atividades de
        tratamento legalmente efetuadas. Poderá solicitar o acesso, a retificação, a eliminação de dados pessoais ou
        ainda a limitação do tratamento de dados
        pessoais e poderá, a qualquer momento, apresentar-nos uma reclamação, ou à autoridade de supervisão. Poderá
        exercer o direito à portabilidade dos
        dados.

        <br><br>
        Os seus dados pessoais serão conservados por cada responsável de tratamento pelo tempo necessário à
        prossecução das finalidades descritas, pelo
        prazo de conservação exigível para o cumprimento de obrigações legais por parte do responsável de
        tratamento. Para o tratamento de dados descrito
        anteriormente, os responsáveis de tratamento podem subcontratar terceiros para a prestação de serviços, tais
        como prestadores de serviços
        informáticos e agências de marketing. Para mais informações, consulte a nossa Política de Privacidade, em
        <a href="http://www.finiclasse.pt/">Finiclasse</a>.
        </p>

        <form>
            <div class="input-group mb-3 signForm">
                <div class="input-group-prepend divInlineBlock labelWidthSign">
                    <span class="input-group-text">Assinatura:</span>
                </div>
                    <div>
                        @if ($user->gdpr_type === 'email') 
                            <p class="mbMinus">RGPD confirmado por e-mail</p>
                        @elseif($user->gdpr_type === 'pdf')
                            <br><br>
                            <img src="data:image/jpeg;base64, {{ base64_encode(@file_get_contents(url($user->getFirstMediaUrl('signatures')))) }}" class="signature mbMinus" />
                        @elseif($user->gdpr_type === 'sms')
                            <p class="mbMinus">RGPD confirmado por sms</p>
                        @endif
                        <input type="text" name="sign" value="" class="form-control w100" readonly>
                    </div>
            </div>
        </form>

    </div>

    <div class="container footer">
        <p class="divInlineBlock">
            Finiclasse 2000 Comércio e Gestão
            <br>
            Automóvel Intermercados, SA
            <br><br>
            Capital Social: 1.110.200,00 Euros
            <br>
            NIPC 504 601 725 – C.R.C. Guarda
        </p>
        <p class="divInlineBlock">
            Sede: Variante A25 Cruz
            <br>
            Alvendre 6300-860 Guarda
            <br>
            Telefone: +351271 210 400
            <br>
            Fax: +351 271 210 401
            <br>
            <a href="http://www.finiclasse.pt/">www.finiclasse.pt</a>
        </p>
        <p class="divInlineBlock">
            Avenida São Miguel, 7
            <br>
            6300-864 Guarda
            <br>
            Telefone: +351271 093 031
            <br>
            Fax: +351 271 093 032
            <br>
            <a href="http://www.finiclasse.pt/">www.finiclasse.pt</a>
        </p>
        <p class="divInlineBlock">
            Edifício Finiclasse EN 231
            <br>
            Ranhado 3500-631 Viseu
            <br>
            Telefone: +351232470930
            <br>
            Fax: +351 232 470 931
            <br>
            <a href="http://www.finiclasse.pt/">www.finiclasse.pt</a>
        </p>
    </div>
</body>

</html>

<style>
    body {
        font-family: serif;
        font-size: 18px;
    }

    .container {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    h5 {
        padding-bottom: 50px;
        text-align: center;
        font-size: 25px;
    }

    form {
        padding-bottom: 10px;
    }

    .input-group {
        display: flex;
        padding-bottom: 10px;
    }

    .input-group-text {
        border: none;
        background-color: inherit;
    }

    .form-control {
        border: none;
        border-radius: inherit;
        border-bottom: 1px solid #000;
    }

    .divInlineBlock {
        position: relative;
        display: inline-block;
    }

    .labelWidth {
        min-width: 75px;
    }

    .labelWidthSign {
        min-width: 100px;
    }

    .w90 {
        width: 90%;
    }

    .w25 {
        width: 25%;
    }

    .w30 {
        width: 30%;
    }

    .w23 {
        width: 23.5%;
    }

    .w100 {
        width: 100%;
    }

    .signForm {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .page {
        overflow: hidden;
        page-break-after: always;
    }

    .footer {
        font-size: 17px;
    }

    .mbMinus {
        margin-bottom: -4px;
    }
    
</style>
