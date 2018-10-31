@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Checkout
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        Termos e Condições
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="outer">
            <div class="inner bg-container">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <h2>Leia com Atenção</h2><br>
                        </div>
                        <section class="m-t-30">
                            <h5>Esta Declaração de privacidade explica as práticas do aplicativo Vitrine, incluindo as suas escolhas como cliente, referentes à coleta, utilização e divulgação de certas informações, incluindo suas informações pessoais.</h5>
                            <br>

                            <h4>Coleta de Informações</h4>
                                <p>O aplicativo recebe e armazena informações sobre você, tais como:<p>
                                <p>Informações que você nos fornece: seu nome, endereço de email, endereço ou código postal, número de telefone, data de nascimento e gênero.
                                Informações quando você opta por classificar serviços ou produtos, define suas preferências e configurações ou, de outra forma, fornece informações ao aplicativo, seja por intermédio do serviço Vitrine ou outros.<br>
                                Informações coletadas automaticamente pela aplicativo: o aplicativo coleta informações sobre você e seu uso do aplicativo, suas interações com o app, assim como informações sobre seu dispositivo. Tais informações incluem:<br>
                                Suas atividades no app, como os produtos visualizados, o histórico de visualizações e buscas;<br>
                                Suas interações com nossas mensagens de email, push e texto;<br>
                                IDs ou outros identificadores únicos de aparelhos;<br>
                                Características de aparelhos e software (tais como o tipo e configuração), informações sobre a conexão e estatísticas sobre visualizações de página.<br>
                                Informações de outras fontes: O app também obtém informações de outras fontes. Protegemos essas informações de acordo com as práticas descritas nesta Declaração de privacidade, além de respeitar as restrições adicionais impostas pela fonte dos dados. Essas fontes variam no decorrer do tempo, mas podem incluir:<br>
                                O Google Analytics para identificar uma localização baseada do seu endereço para personalizar o nosso serviço e para outros fins compatíveis com esta política de privacidade;</p><br>

                            <h4>Uso de Informações</h4>
                                <p>O aplicativo utiliza as informações para oferecer, analisar, administrar, aprimorar e personalizar nossos serviços e esforços de marketing, para processar seu perfil e preferências, e para nos comunicarmos com você sobre esses e outros assuntos. Por exemplo, o Vitrine utiliza as informações para:<br>
                                Determinar sua localização geográfica aproximada, oferecer conteúdo localizado, oferecer recomendações personalizadas e customizadas de produtos que, na nossa avaliação, poderiam ser do seu interesse, determinar o seu provedor de serviços de Internet e ajudar nossa equipe a responder de forma rápida e eficiente às suas dúvidas e solicitações;<br>
                                Analisar e entender nosso público, melhorar o serviço (inclusive a interface do usuário) e otimizar a seleção de conteúdo, os algoritmos de recomendação e a transmissão;<br>
                                Comunicar-se com você sobre o serviço (por exemplo, por email, notificações push, mensagens de texto e canais de mensagens online), para que possamos comunicar novidades sobre o aplicativo, detalhes sobre novas funcionalidades, conteúdos disponíveis, ofertas especiais, anúncios sobre promoções e pesquisas de mercado, e para ajudar você com pedidos de natureza operacional, como pedidos de redefinição de senha.<br>
                                Você também poderá optar por divulgar informações suas das seguintes maneiras:<br>
                                Enquanto estiver usando o aplicativo, você poderá postar ou publicar opiniões ou outras informações, e terceiros poderão utilizar as informações divulgadas por você;<br>
                                Plugins de redes sociais e tecnologias similares permitem o compartilhamento de informações.<br>
                                Plugins e aplicativos de redes sociais são operados pelas próprias redes sociais e estão sujeitos aos seus respectivos termos de uso e políticas de privacidade.</p><br>
                                
                            <h4>Acesso à Conta e Perfis</h4>
                                <p>Essa função utiliza tecnologia que nos permite dar acesso direto à conta e ajuda a administrar o serviço Vitrine sem redigitar a senha ou identificação do usuário ao retornar ao aplicativo.<br>
                                Para excluir o acesso à sua conta Vitrine de seus aparelhos: (a) acesse a seção “Conta” e selecione “Encerrar a sessão em todos os aparelhos” e siga as instruções para desativar os aparelhos (a desativação poderá não ocorrer imediatamente) ou (b) remova as configurações da sua conta Vitrine no seu aparelho (as instruções variam segundo o aparelho, e esta opção não está disponível em todos os aparelhos).<br>
                                Se você compartilhar ou permitir que outras pessoas tenham acesso à sua conta, elas poderão ver suas informações, inclusive algumas informações pessoais, como seu histórico de produtos visualizados, classificações, opiniões e informações da sua conta (inclusive seu endereço de email e outros dados na seção "Conta"). Isso ocorre mesmo utilizando o recurso de perfis.</p><br>
                            
                            <h4>Suas opções</h4>
                                <p>Mensagens de email e texto. Se você não quiser mais receber determinados comunicados do aplicativo por email ou mensagens de texto, acesse a opção "Configurações de comunicação" na seção “Conta” e desmarque as opções que deseja cancelar.<br>
                                Notificações push. Você pode optar por receber notificações push do aplicativo. Caso decidir posteriormente que já não deseja receber essas notificações, você poderá utilizar as configurações do seu aparelho móvel para desativá-las.<br>

                            <h4>Suas informações e direitos</h4>
                                <p>Você pode solicitar acesso às suas informações pessoais, bem como pode corrigir ou atualizar informações pessoais desatualizadas ou incorretas que temos sobre você.<br>
                                Para isso, basta acessar a seção “Conta” no aplicativo, onde você pode acessar e atualizar uma série de informações sobre sua conta, inclusive suas informações de contato.</p><br>

                            <h4>Segurança</h4>
                                <p>O aplicativo emprega medidas administrativas, lógicas, gerenciais e físicas razoáveis para proteger suas informações pessoais contra perdas, roubos e acesso, uso e alterações não autorizados. Essas medidas são elaboradas para oferecer um nível de segurança adequado aos riscos de processamento de suas informações pessoais.</p><br>

                            <h4>Alterações à presente política de privacidade</h4>
                                <p>O aplicativo Vitrine poderá periodicamente alterar esta política de privacidade para atender a mudanças na legislação, exigências regulatórias ou operacionais. Comunicaremos qualquer alteração (inclusive a data em que as mesmas entrarão em vigor) conforme previsto por lei. Caso você não queira reconhecer ou aceitar nenhuma das atualizações desta política de privacidade, você poderá cancelar sua conta.</p><br>
                            <p>Última atualização: 21 de junho de 2018</p> 
                        </section>
                        <div>
                            <a href="javascript:window.history.go(-1)">
                                <button type="button" class="btn btn-dark" style="width:100px;">Voltar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @stop
