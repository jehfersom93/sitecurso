<?php
include_once './Util/Connect.php';
$idProfessor = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = $mysqli->query("SELECT * FROM professor WHERE id=" . $idProfessor);
while ($row = $sql->fetch_array()) {
    $nomeProfessor = $row['nomeProfessor'];
    $facebookProfessor = $row['facebookProfessor'];
    $twitterProfessor = $row['twitterProfessor'];
    $googleProfessor = $row['googleProfessor'];
    $instagramProfessor = $row['instagramProfessor'];
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
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/layout.css">
    <?php
    if (!is_null($cssStyleProfessor) || !empty($cssStyleProfessor)) {
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
            if (!is_null($urlCapaProfessor) || !empty($urlCapaProfessor)) {
                echo "background: #161415 url(" . $urlCapaProfessor . ") no-repeat top center;";
            } else {
                echo "background: #161416 url(images/header-background_1.jpg) no-repeat top center;";
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
    <link rel="shortcut icon" href="favicon.png" >

</head>

<body>

    <!-- Header
    ================================================== -->
    <header id="home">

        <nav id="nav-wrap">

            <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Mostrar Navegação</a>
            <a class="mobile-btn" href="#" title="Hide navigation">Esconder Navegação</a>

            <ul id="nav" class="nav">
                <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
                <li><a class="smoothscroll" href="#about">Perfil</a></li>
                <li><a class="smoothscroll" href="#resume">Currículo</a></li>
                <li><a class="smoothscroll" href="#portfolio">Disciplinas</a></li>
                <li><a class="smoothscroll" href="#contact">Contato</a></li>
            </ul> <!-- end #nav -->

        </nav> <!-- end #nav-wrap -->

        <div class="row banner">
            <div class="banner-text">
                <h1 class="responsive-headline"><?php echo $nomeProfessor ?></h1>
                <hr />
                <ul class="social">
                    <?php
                    if (!is_null($facebookProfessor) || !empty($facebookProfessor)) {
                        echo "<li><a href='" . $facebookProfessor . "' target='_blank'><i class='fa fa-facebook'></i></a></li>";
                    }
                    if (!is_null($twitterProfessor) || !empty($twitterProfessor)) {
                        echo "<li><a href='" . $twitterProfessor . "' target='_blank'><i class='fa fa-twitter'></i></a></li>";
                    }
                    if (!is_null($googleProfessor) || !empty($googleProfessor)) {
                        echo "<li><a href='" . $googleProfessor . "' target='_blank'><i class='fa fa-google-plus'></i></a></li>";
                    }
                    if (!is_null($instagramProfessor) || !empty($instagramProfessor)) {
                        echo "<li><a href='" . $instagramProfessor . "' target='_blank'><i class='fa fa-instagram'></i></a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <p class="scrolldown">
            <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
        </p>

    </header> <!-- Header End -->


    <!-- About Section
    ================================================== -->
    <section id="about">

        <div class="row">

            <div class="three columns">

                <img class="profile-pic"  src="<?php echo $urlFotoProfessor ?>" alt="" />

            </div>

            <div class="nine columns main-col">

                <h2>Sobre </h2>

                <p><?php echo $textoSobreProfessor ?></p>

                <div class="row">

                    <div class="columns contact-details">
                        <br>
                        <h2>Contato</h2>
                        <p class="address">
                            <span><?php echo $nomeProfessor ?></span><br>
                            <span> <?php echo $cidadeProfessor ?></span><br>
                            <?php
                            if (!is_null($telefoneProfessor) || !empty($telefoneProfessor)) {
                                echo "<span>" . $telefoneProfessor . " </span><i class='fa fa-whatsapp'></i><br>";
                            }
                            ?>
                            <span><?php echo $emailProfessor ?></span>
                        </p>

                    </div>
                </div> <!-- end row -->

            </div> <!-- end .main-col -->

        </div>

    </section> <!-- About Section End-->


    <!-- Resume Section
    ================================================== -->
    <section id="resume">

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

                <div>
                    <h1>
                        <i class="fa fa-address-card-o" aria-hidden="true"></i><a href="<?php echo $urlCurriculumProfessor ?>"> Currículo Lattes</a>
                    </h1>
                </div>
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
                            if (!is_null($row['dataFinal']) || !empty($row['dataFinal'])) {
                                $dataFinal = ucfirst(utf8_encode(strftime("%B de %Y", strtotime($row['dataFinal']))));
                            } else {
                                $dataFinal = "Atual";
                            }

                            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            echo "<h3>" . $row['nomeInstituicao'] . "</h3>";
                            echo "<p class='info'>" . $row['cargoProfessor'] . " <span>&bull;</span> <em class='date'>" . ucfirst(utf8_encode(strftime("%B de %Y", strtotime($dataInicial)))) . " - " . $dataFinal . "</em></p>";
                        }

                        $sql = $mysqli->query("SELECT descricaoAtividade FROM professor_atividade WHERE idProfessor=" . $idProfessor . " AND idInstituicao=" . $idInstituicao);
                        while ($row = $sql->fetch_array()) {
                            echo "<p>";
                            echo "<i class='fa fa-circle' aria-hidden='true'></i> " . $row['descricaoAtividade'];
                            echo "</p>";
                        }
                        ?>

                    </div>

                </div> <!-- item end -->
            </div>
        </div>

        <!-- Projetos
        ----------------------------------------------- -->
        <div class="row projetos">

            <div class="three columns header-col">
                <h1><i class="fa fa-paperclip" aria-hidden="true"></i><span>Projetos</span></h1>
            </div>

            <div class="nine columns main-col">

                <div class="row item">

                    <div class="twelve columns">

                        <?php
                        $sql = $mysqli->query("SELECT descricaoProjeto FROM professor_projeto WHERE idProfessor=" . $idProfessor);
                        while ($row = $sql->fetch_array()) {
                            echo "<p>";
                            echo "<i class='fa fa-circle' aria-hidden='true'></i> " . $row['descricaoProjeto'];
                            echo "</p>";
                        }
                        ?>

                    </div>

                </div> <!-- item end -->
            </div>
        </div>
    </section> <!-- Resume Section End-->


    <!-- Portfolio Section
    ================================================== -->
    <section id="portfolio">

        <div class="row">

            <div class="twelve columns collapsed">

                <h1>Disciplinas do professor</h1>

                <!-- portfolio-wrapper -->
                <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">

                    <?php
                    $sql = $mysqli->query("SELECT disciplina.nomeDisciplina, disciplina.descricaoDisciplina, disciplina.urlFotoDisciplina, disciplina.urlThumbDisciplina, disciplina.tagsDisciplina, disciplina.urlSiteDisciplina FROM disciplina INNER JOIN professor_disciplina ON professor_disciplina.idDisciplina=disciplina.id WHERE professor_disciplina.idProfessor=" . $idProfessor);
                    $i = 0;
                    while ($row = $sql->fetch_array()) {
                        $nomeDisciplina = $row['nomeDisciplina'];
                        $descricaoDisciplina = $row['descricaoDisciplina'];
                        $tagsDisciplina = $row['tagsDisciplina'];
                        $urlFotoDisciplina = $row['urlFotoDisciplina'];
                        $urlThumbDisciplina = $row['urlThumbDisciplina'];
                        $urlSiteDisciplina = $row['urlSiteDisciplina'];
                        echo "<div class='columns portfolio-item'>";
                        echo "<div class='item-wrap'>";
                        echo "<a href='#modal-" . $i . "' title=" . $nomeDisciplina . ">";
                        echo "<img alt='' src='" . $urlThumbDisciplina . "'>";
                        echo "<div class='overlay'>";
                        echo "<div class='portfolio-item-meta'>";
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
                <!-- Modal Popup
                     --------------------------------------------------------------- -->

                <?php
                $j = 0;

                if (is_null($tagsDisciplina) || empty($tagsDisciplina)) {
                    $tagsDisciplina = "Sem tags";
                }

                while ($j <= $i) {
                    echo "<div id='modal-" . $j . "' class='popup-modal mfp-hide'>";
                    echo "<img class='scale-with-grid' src='" . $urlFotoDisciplina . "' alt='' />";
                    echo "<div class='description-box'>";
                    echo "<h4>" . $nomeDisciplina . "</h4>";
                    echo "<p>" . $descricaoDisciplina . "</p>";
                    echo "<span class='categories'><i class='fa fa-tag'></i>" . $tagsDisciplina . "</span>";
                    echo "</div>";
                    echo "<div class='link-box'>";
                    echo "<a href='" . $urlSiteDisciplina . "' target='_blank'>Site</a>";
                    echo "<a class='popup-modal-dismiss'>Fechar</a>";
                    echo "</div>";
                    echo "</div>";
                    $j++;
                }
                ?>

                </section> <!-- Portfolio Section End-->


                <!-- Contact Section
                ================================================== -->
                <section id="contact">

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
                            <form action="" method="post" id="contactForm" name="contactForm">
                                <fieldset>

                                    <div>
                                        <label for="contactName"> Nome <span class="required">*</span></label>
                                        <input type="text" value="" size="15" id="contactName" name="contactName">
                                    </div>

                                    <div>
                                        <label for="contactEmail"> Email <span class="required">*</span></label>
                                        <input type="text" value="" size="15" id="contactEmail" name="contactEmail">
                                    </div>

                                    <div>
                                        <label for="contactSubject"> Assunto </label>
                                        <input type="text" value="" size="15" id="contactSubject" name="contactSubject">
                                    </div>

                                    <div>
                                        <label for="contactMessage"> Mensagem <span class="required">*</span></label>
                                        <textarea cols="30" rows="10" id="contactMessage" name="contactMessage"></textarea>
                                    </div>

                                    <div>
                                        <button class="submit">Enviar</button>
                                        <span id="image-loader">
                                            <img alt="" src="images/loader.gif">
                                        </span>
                                    </div>

                                </fieldset>
                            </form> <!-- Form End -->

                            <!-- contact-warning -->
                            <div id="message-warning"> Erro </div>
                            <!-- contact-success -->
                            <div id="message-success">
                                <i class="fa fa-check"></i> Mensagem enviada!<br>
                            </div>
                        </div>
                    </div>
                </section> <!-- Contact Section End-->


                <!-- footer
                ================================================== -->
                <footer>

                    <div class="row">

                        <div class="twelve columns">

                            <ul class="social-links">
                                <?php
                                if (!is_null($facebookProfessor) || !empty($facebookProfessor)) {
                                    echo "<li><a href='" . $facebookProfessor . "' target='_blank'><i class='fa fa-facebook'></i></a></li>";
                                }
                                if (!is_null($twitterProfessor) || !empty($twitterProfessor)) {
                                    echo "<li><a href='" . $twitterProfessor . "' target='_blank'><i class='fa fa-twitter'></i></a></li>";
                                }
                                if (!is_null($googleProfessor) || !empty($googleProfessor)) {
                                    echo "<li><a href='" . $googleProfessor . "' target='_blank'><i class='fa fa-google-plus'></i></a></li>";
                                }
                                if (!is_null($instagramProfessor) || !empty($instagramProfessor)) {
                                    echo "<li><a href='" . $instagramProfessor . "' target='_blank'><i class='fa fa-instagram'></i></a></li>";
                                }
                                ?>
                            </ul>
                            <ul class="copyright">
                                <li>©2017 Todos os direitos reservados| CNEC-IESA Santo Ângelo. </li>
                                <li>Desenvolvido por <a title="Styleshout" href="http://kraft.ads.cnecsan.edu.br/~jefersonrodrigues/" target='_blank'>Jeferson Rodrigues</a> e <a title="Styleshout" href="http://kraft.ads.cnecsan.edu.br/~matheuscavallini/" target='_blank'>Matheus Cavallini</a></li>   
                            </ul>

                        </div>

                        <div id="go-top"><a class="smoothscroll" title="Voltar para o topo" href="#home"><i class="icon-up-open"></i></a></div>

                    </div>

                </footer> <!-- Footer End-->

                <!-- Java Script
                ================================================== -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
                <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

                <script src="js/jquery.flexslider.js"></script>
                <script src="js/waypoints.js"></script>
                <script src="js/jquery.fittext.js"></script>
                <script src="js/magnific-popup.js"></script>
                <script src="js/init.js"></script>

                </body>

                </html>
