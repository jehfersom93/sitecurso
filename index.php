<?php
include_once './util/Connect.php';

if (!isset($_GET['id'])) {
    header('Location: sites.php');
}

$idProfessor = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = $mysqli->query("SELECT * FROM professor WHERE id=" . $idProfessor);
while ($row = $sql->fetch_array()) {
    $nomeProfessor = $row['nomeProfessor'];
    $facebookProfessor = $row['facebookProfessor'];
    $twitterProfessor = $row['twitterProfessor'];
    $googleProfessor = $row['googleProfessor'];
    $instagramProfessor = $row['instagramProfessor'];
    $linkedinProfessor = $row['linkedinProfessor'];
    $urlFotoProfessor = $row['urlFotoProfessor'];
    $urlCapaProfessor = $row['urlCapaProfessor'];
    $cssStyleProfessor = $row['cssStyleProfessor'];
    $urlCurriculumProfessor = $row['urlCurriculumProfessor'];
    $textoSobreProfessor = $row['textoSobreProfessor'];
    $cidadeProfessor = $row['cidadeProfessor'];
    $telefoneProfessor = $row['telefoneProfessor'];
    $emailProfessor = $row['emailProfessor'];
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php echo $nomeProfessor ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/login.css">
    <?php
    if (!is_null($cssStyleProfessor) && !empty($cssStyleProfessor)) {
        echo "<link rel='stylesheet' href='css/cores/" . $cssStyleProfessor . "'>";
    }
    ?>
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <style>
        header {
            <?php
            if (!is_null($urlCapaProfessor) && !empty($urlCapaProfessor)) {
                echo "background: #161415 url(painel/" . $urlCapaProfessor . ") no-repeat top center;";
            } else {
                echo "background: #161416 url(images/padrao-iesa.jpg) no-repeat top center;";
            }
            ?>
        }
    </style>



    <!-- Script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Favicons
         ================================================== -->
    <link rel="shortcut icon" href="images/favicon.png" >

    <script src="js/login.js"></script>
    <script src="js/pages/index.js"></script>


</head>

<body>

    <!-- Header
    ================================================== -->
    <header id="home">

        <nav id="nav-wrap">

            <a class="mobile-btn" href="#nav-wrap" title="Mostrar Navegação">Mostrar Navegação</a>
            <a class="mobile-btn" href="#" title="Esconder Navegação">Esconder Navegação</a>

            <ul id="nav" class="nav">
                <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
                <li><a class="smoothscroll" href="#perfil">Perfil</a></li>
                <li><a class="smoothscroll" href="#curriculo">Currículo</a></li>
                <li><a class="smoothscroll" href="#disciplinas">Disciplinas</a></li>
                <li><a class="smoothscroll" href="#contato">Contato</a></li>
                <li><a class="smoothscroll" href="javascript:;" data-toggle="modal" data-target="#login-modal">Acesso Professor</a></li>
            </ul> <!-- end #nav -->
        </nav> <!-- end #nav-wrap -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Área do Professor</h1>
                    <div id="msgLogin" style="color: red"></div><br>
                    <form>
                        <input id="inputEmail" type="text" placeholder="E-mail">
                        <input id="inputSenha" type="password" placeholder="Senha">
                        <input type="button" class="login loginmodal-submit" onclick="efetuarLogin()" value="Login">
                    </form>
                    <div class="login-help">
                        <a href="javascript:;">Esqueceu a senha?</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row banner">
            <img src="images/Logo-IESA.png" width="400" height="400">
            <div class="banner-text">
                <h1 class="responsive-headline"><?php echo $nomeProfessor ?></h1>
                <hr />
                <ul class="social">
                    <?php
                    if (!is_null($facebookProfessor) && !empty($facebookProfessor)) {
                        echo "<li><a href='" . $facebookProfessor . "' target='_blank'><i class='fa fa-facebook'></i></a></li>";
                    }
                    if (!is_null($twitterProfessor) && !empty($twitterProfessor)) {
                        echo "<li><a href='" . $twitterProfessor . "' target='_blank'><i class='fa fa-twitter'></i></a></li>";
                    }
                    if (!is_null($googleProfessor) && !empty($googleProfessor)) {
                        echo "<li><a href='" . $googleProfessor . "' target='_blank'><i class='fa fa-google-plus'></i></a></li>";
                    }
                    if (!is_null($instagramProfessor) && !empty($instagramProfessor)) {
                        echo "<li><a href='" . $instagramProfessor . "' target='_blank'><i class='fa fa-instagram'></i></a></li>";
                    }
                    if (!is_null($instagramProfessor) && !empty($instagramProfessor)) {
                        echo "<li><a href='" . $linkedinProfessor . "' target='_blank'><i class='fa fa-linkedin'></i></a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <p class="scrolldown">
            <a class="smoothscroll" href="#perfil"><i class="icon-down-circle"></i></a>
        </p>

    </header> <!-- Header End -->


    <!-- perfil Section
    ================================================== -->
    <section id="perfil">

        <div class="row">

            <div class="three columns">

                <?php
                if (!is_null($urlFotoProfessor) && !empty($urlFotoProfessor)) {
                    ?>
                    <img class="profile-pic"  src="painel/<?php echo $urlFotoProfessor ?>" alt="" />
                    <?php
                } else {
                    ?>
                    <img class="profile-pic"  src="painel/assets/img/default-avatar.png" alt="" />
                    <?php
                }
                ?>
            </div>

            <div class="nine columns main-col">

                <h2>Sobre </h2>

                <p><?php echo $textoSobreProfessor ?></p>

                <div class="row">

                    <div class="columns contato-details">
                        <br>
                        <h2>Contato</h2>
                        <p class="address">
                            <span><?php echo $nomeProfessor ?></span><br>
                            <span> <?php echo $cidadeProfessor ?></span><br>
                            <?php
                            if (!is_null($telefoneProfessor) && !empty($telefoneProfessor)) {
                                echo "<span>" . $telefoneProfessor . " </span><i class='fa fa-whatsapp'></i><br>";
                            }
                            ?>
                            <span><?php echo $emailProfessor ?></span>
                        </p>

                    </div>
                </div> <!-- end row -->

            </div> <!-- end .main-col -->

        </div>

    </section> <!-- perfil Section End-->


    <!-- curriculo Section
    ================================================== -->
    <section id="curriculo">

        <!-- Education
        ----------------------------------------------- -->
        <div class="row education">

            <div class="three columns header-col">
                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Formação</span></h1>
            </div>

            <div class="nine columns main-col">

                <?php
                $sql = $mysqli->query("SELECT formacao.nomeFormacao FROM formacao INNER JOIN professor_formacao ON professor_formacao.idFormacao=formacao.id WHERE professor_formacao.idProfessor=" . $idProfessor);
                while ($row = $sql->fetch_array()) {
                    echo "<div class='row item'>";
                    echo "<div class='twelve columns'>";
                    echo "<h1><i class='fa fa-circle' aria-hidden='true'></i> " . $row['nomeFormacao'] . "</h1>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>

                <?php
                if (!is_null($urlCurriculumProfessor) && !empty($urlCurriculumProfessor)) {
                    ?>
                    <div>
                        <h1>
                            <i class="fa fa-address-card-o" aria-hidden="true"></i><a href="<?php echo $urlCurriculumProfessor ?>"> Currículo Lattes</a>
                        </h1>
                    </div>
                    <?php
                }
                ?>
            </div> <!-- item end -->

        </div> <!-- main-col end -->


        <!-- Work
        ----------------------------------------------- -->
        <div class="row work">

            <div class="three columns header-col">
                <h1><i class="fa fa-adn" aria-hidden="true"></i><span>Atividades</span></h1>
            </div>

            <div class="nine columns main-col">

                <div class="row item">

                    <div class="twelve columns">

                        <?php
                        $sql = $mysqli->query("SELECT instituicao.id, instituicao.nomeInstituicao, professor_instituicao.cargoProfessor, professor_instituicao.dataInicial, professor_instituicao.dataFinal FROM professor_instituicao INNER JOIN instituicao ON instituicao.id=professor_instituicao.idInstituicao WHERE professor_instituicao.idProfessor=" . $idProfessor);
                        while ($row = $sql->fetch_array()) {
                            $idInstituicao = $row['id'];

                            setlocale(LC_ALL, 'ptb');
                            $dataInicial = $row['dataInicial'];
                            if ($row['dataFinal'] == '0000-00-00') {
                                $dataFinal = "Atual";
                            } else {
                                $dataFinal = ucfirst(utf8_encode(strftime("%B de %Y", strtotime($row['dataFinal']))));
                            }

                            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            echo "<h4>" . $row['nomeInstituicao'] . "</h4>";
                            echo "<p class='info'>" . $row['cargoProfessor'] . " <span>&bull;</span> <em class='date'>" . ucfirst(utf8_encode(strftime("%B de %Y", strtotime($dataInicial)))) . " - " . $dataFinal . "</em></p>";
                        }

                        $sql = $mysqli->query("SELECT atividadeProfessor FROM professor_instituicao WHERE idProfessor=" . $idProfessor . " AND idInstituicao=" . $idInstituicao);
                        while ($row = $sql->fetch_array()) {
                            echo "<p>";
                            echo "<i class='fa fa-circle' aria-hidden='true'></i> " . $row['atividadeProfessor'];
                            echo "</p>";
                        }
                        ?>

                    </div>

                </div> <!-- item end -->
            </div>
        </div>

        <?php
        if ($result = $mysqli->query("SELECT descricaoProjeto FROM professor_projeto WHERE idProfessor=" . $idProfessor)) {
            $row_cnt = $result->num_rows;
            $result->close();
        }
        if ($row_cnt != 0) {
            ?>
            <!-- Projetos
            ----------------------------------------------- -->
            <div class="row projetos" id="projetos">

                <div class="three columns header-col">
                    <h1><i class="fa fa-paperclip" aria-hidden="true"></i><span>Projetos</span></h1>
                </div>

                <div class="nine columns main-col">

                    <div class="row item">

                        <div class="twelve columns">

                            <?php
                            $sql = $mysqli->query("SELECT * FROM professor_projeto WHERE idProfessor=" . $idProfessor);
                            while ($row = $sql->fetch_array()) {
                                echo "<h4>" . $row['tituloProjeto'] . "</h4>";
                                echo "<p>";
                                echo "<i class='fa fa-circle' aria-hidden='true'></i> " . $row['descricaoProjeto'];
                                echo "</p>";
                            }
                            ?>

                        </div>

                    </div> <!-- item end -->
                </div>
            </div>
            <?php
        }
        ?>
    </section> <!-- curriculo Section End-->


    <!-- disciplinas Section
    ================================================== -->
    <section id="disciplinas">

        <div class="row">

            <div class="twelve columns collapsed">

                <h1>Disciplinas do professor</h1>

                <!-- disciplinas-wrapper -->
                <div id="disciplinas-wrapper" class="bgrid-quarters s-bgrid-thirds cf">

                    <?php
                    $sql = $mysqli->query("SELECT disciplina.nomeDisciplina, disciplina.descricaoDisciplina, disciplina.urlFotoDisciplina, disciplina.urlThumbDisciplina, disciplina.tagsDisciplina, disciplina.urlSiteDisciplina FROM disciplina INNER JOIN professor_disciplina ON professor_disciplina.idDisciplina=disciplina.id WHERE professor_disciplina.idProfessor=" . $idProfessor);
                    $i = 0;
                    while ($row = $sql->fetch_array()) {
                        $nomeDisciplina = $row['nomeDisciplina'];
                        $urlThumbDisciplina = $row['urlThumbDisciplina'];
                        echo "<div class='columns disciplinas-item'>";
                        echo "<div class='item-wrap'>";
                        echo "<a href='#modal-" . $i . "' title=" . $nomeDisciplina . ">";
                        echo "<img alt='' src='" . $urlThumbDisciplina . "'>";
                        echo "<div class='overlay'>";
                        echo "<div class='disciplinas-item-meta'>";
                        echo "<h5>" . $nomeDisciplina . "</h5>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='link-icon'><i style='position:absolute; right: 20px; bottom: 00px; top: 55px; left: 60px' class='icon-plus'></i></div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                        $i++;
                    }
                    ?>

                </div>
                <!-- Modal Popup -->

                <?php
                $sql = $mysqli->query("SELECT disciplina.nomeDisciplina, disciplina.descricaoDisciplina, disciplina.urlFotoDisciplina, disciplina.urlThumbDisciplina, disciplina.tagsDisciplina, disciplina.urlSiteDisciplina FROM disciplina INNER JOIN professor_disciplina ON professor_disciplina.idDisciplina=disciplina.id WHERE professor_disciplina.idProfessor=" . $idProfessor);
                $i = 0;
                while ($row = $sql->fetch_array()) {
                    $nomeDisciplina = $row['nomeDisciplina'];
                    $descricaoDisciplina = $row['descricaoDisciplina'];
                    $tagsDisciplina = $row['tagsDisciplina'];
                    $urlSiteDisciplina = $row['urlSiteDisciplina'];
                    $urlFotoDisciplina = $row['urlFotoDisciplina'];

                    if (is_null($tagsDisciplina) || empty($tagsDisciplina)) {
                        $tagsDisciplina = "Sem tags";
                    }

                    echo "<div id='modal-" . $i . "' class='popup-modal mfp-hide'>";
                    echo "<img class='scale-with-grid' src='" . $urlFotoDisciplina . "' alt='' />";
                    echo "<div class='description-box'>";
                    echo "<h4>" . $nomeDisciplina . "</h4>";
                    echo "<p>" . $descricaoDisciplina . "</p>";
                    echo "<span class='categories'><i class='fa fa-tag'></i>" . $tagsDisciplina . "</span>";
                    echo "</div>";
                    echo "<div class='link-box'>";
                    if (!is_null($urlSiteDisciplina) && !empty($urlSiteDisciplina)) {
                        echo "<a href='" . $urlSiteDisciplina . "' target='_blank'>Site</a>";
                    } else {
                        echo "<a href='javascript:;'>Sem Site</a>";
                    }
                    echo "<a class='popup-modal-dismiss'>Fechar</a>";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
                ?>

                </section> <!-- disciplinas Section End-->


                <!-- contato Section
                ================================================== -->
                <section id="contato">

                    <div class="row section-head">

                        <div class="two columns header-col">

                            <h1><span> Entrar em contato.</span></h1>

                        </div>

                        <div class="ten columns">

                            <p class="lead"> Preencha os campos abaixo para entrar em contato com o professor.</p>

                        </div>

                    </div>

                    <div class="row">

                        <div class="eight columns">

                            <!-- form -->
                            <form action="" method="post" id="contatoForm" name="contatoForm">
                                <fieldset>

                                    <div>
                                        <label for="contatoName"> Nome <span class="required">*</span></label>
                                        <input type="text" value="" size="15" id="contatoName" name="contatoName">
                                    </div>

                                    <div>
                                        <label for="contatoEmail"> Email <span class="required">*</span></label>
                                        <input type="text" value="" size="15" id="contatoEmail" name="contatoEmail">
                                    </div>

                                    <div>
                                        <label for="contatoSubject"> Assunto </label>
                                        <input type="text" value="" size="15" id="contatoSubject" name="contatoSubject">
                                    </div>

                                    <div>
                                        <label for="contatoMessage"> Mensagem <span class="required">*</span></label>
                                        <textarea cols="30" rows="10" id="contatoMessage" name="contatoMessage"></textarea>
                                    </div>

                                    <div>
                                        <button class="submit">Enviar</button>
                                        <span id="image-loader">
                                            <img alt="" src="images/loader.gif">
                                        </span>
                                    </div>

                                </fieldset>
                            </form> <!-- Form End -->

                            <!-- contato-warning -->
                            <div id="message-warning"> Erro </div>
                            <!-- contato-success -->
                            <div id="message-success">
                                <i class="fa fa-check"></i> Mensagem enviada!<br>
                            </div>
                        </div>
                    </div>
                </section> <!-- contato Section End-->


                <!-- footer
                ================================================== -->
                <footer>

                    <div class="row">

                        <div class="twelve columns">
                            <br>
                            <ul class="social">
                                <?php
                                echo '<a href="http://cnecsan.cnec.br/"><img src="images/logo-cnec.png" width="35" height="35" /></a>';
                                ?>
                            </ul>

                            <ul class="copyright">
                                <li>©2017 Todos os direitos reservados | Instituto Cenecista de Ensino Superior de Santo Ângelo. </li>
                                <li>Desenvolvido por <a title="Styleshout" href="http://kraft.ads.cnecsan.edu.br/~jefersonrodrigues/" target='_blank'>Jeferson Rodrigues</a> e <a title="Styleshout" href="http://kraft.ads.cnecsan.edu.br/~matheuscavallini/" target='_blank'>Matheus Cavallini</a></li>   
                            </ul>

                        </div>

                        <div id="go-top"><a style=" right: 100px; " class="smoothscroll" title="Voltar para o topo" href="#home"><i class="icon-up-open"></i></a></div>

                    </div>

                </footer> <!-- Footer End-->

                <!-- Java Script
                ================================================== -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
                <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.flexslider.js"></script>
                <script src="js/waypoints.js"></script>
                <script src="js/jquery.fittext.js"></script>
                <script src="js/magnific-popup.js"></script>
                <script src="js/init.js"></script>

                </body>

                </html>
