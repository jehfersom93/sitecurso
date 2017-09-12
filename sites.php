<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="UTF-8">
            <meta name="description" content="CNEC/IESA - Análise e Desenvolvimento de Sistemas">
                <meta name="keywords" content="CNEC,IESA,TI,ADS,Tecnologia,Computação,Informática">
                    <meta name="author" content="Matheus Nascimento Cavallini">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Faculdade CNEC - Análise e Desenvolvimento de Sistemas</title>

                        <link href="css/select2.css" rel="stylesheet" />
                        <link href="css/bootstrap.min.css" rel="stylesheet" />
                        <link href="css/sites.css" rel="stylesheet" />

                        <script src="js/jquery-3.2.1.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/select2.js"></script>
                        <script src="js/lista.js"></script>
                        </head>
                        <body>
                            <div class="col-xs-12">
                                <div class="container">
                                    <div class="card card-container">
                                        <img id="profile-img" class="profile-img-card" src="/images/logo_ads.png" />
                                        <p id="profile-name" class="profile-name-card"></p>
                                        <form class="form-signin">
                                            <div id="selecao">
                                                <select class="selecao-customizada" id="listagem">
                                                    <option value="" disabled selected>Selecione um site</option>
                                                    <?php
                                                    $dir = '/home';
                                                    $usrs = scandir($dir);
                                                    $limite = count($usrs);

                                                    for ($i = 0; $i < $limite; $i++) {
                                                        if ($usrs[$i] != "." && $usrs[$i] != ".." && $usrs[$i] != "aquota.user" && $usrs[$i] != "quota.user" && $usrs[$i] != "quotas.sh" && $usrs[$i] != "livros" && $usrs[$i] != "lost+found") {

                                                            $user = $usrs[$i];
                                                            $user2 = $user . ":";
                                                            $xyz = system("grep $user2 /etc/passwd | cut -d: -f5 | tr -d ,");
                                                            ?>
                                                            <option value="http://www.ads.cnecsan.edu.br/~<?php print $user; ?>" target="_blank"><?php print $user; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" onclick="acessarSite()">ACESSAR O SITE</button>
                                        </form><!-- /form -->
                                        <div id="footer">
                                            <p>Desenvolvido com muito amor pelos alunos do curso de Análise e Desenvolvimento de Sistemas.</p>
                                        </div>
                                    </div><!-- /card-container -->
                                </div><!-- /container -->
                            </div>
                        </body>
                        <?php // abaixo, logar atividade no piwik  ?>

                        <!-- Piwik -->
                        <script type="text/javascript">
                            var _paq = _paq || [];
                            _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
                            _paq.push(["setDomains", ["*.ads.cnecsan.edu.br", "*.kraft.ads.cnecsan.edu.br", "*.www.ads.cnecsan.edu.br"]]);
                            _paq.push(['trackPageView']);
                            _paq.push(['enableLinkTracking']);
                            (function () {
                                var u = "//ads.cnecsan.edu.br/piwik/";
                                _paq.push(['setTrackerUrl', u + 'piwik.php']);
                                _paq.push(['setSiteId', '2']);
                                var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                                g.type = 'text/javascript';
                                g.async = true;
                                g.defer = true;
                                g.src = u + 'piwik.js';
                                s.parentNode.insertBefore(g, s);
                            })();
                        </script>
                        <noscript><p><img src="//ads.cnecsan.edu.br/piwik/piwik.php?idsite=2" style="border:0;" alt="" /></p></noscript>
                        <!-- End Piwik Code -->
                        <br>

                            <?php //abaixo, codigo para permitir a analise  ?>
                            <a href="http://www.beyondsecurity.com/vulnerability-scanner-verification/kraft.ads.cnecsan.edu.br"><img src="https://seal.beyondsecurity.com/verification-images/kraft.ads.cnecsan.edu.br/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" /></a>

                            </html>