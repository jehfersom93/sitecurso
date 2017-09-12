
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="UTF-8">
            <meta name="description" content="CNEC/IESA - Análise e Desenvolvimento de Sistemas">
                <meta name="keywords" content="CNEC,IESA,TI,ADS,Tecnologia,Computação,Informática">
                    <meta name="author" content="Curt Geesdorf">
                        <title>Faculdade CNEC - Análise e Desenvolvimento de Sistemas</title>

                        <style>
                            body {
                                background-color: #2c3e50 !important;
                                font-family: sans-serif;
                            }
                            #main {
                                background-color: white;
                                border-radius: 5px;
                                height: 370px;
                                width: 700px;
                                position: absolute;
                                top:0;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                margin: auto;
                                -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
                                box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
                            }
                            #botao {
                                padding-top: 10px;
                            }
                            #footer {
                                font-size: 10px;
                                color: silver;
                                padding-top: 20px;
                            }
                            .botao-acessar {
                                display: inline-block;
                                -webkit-box-sizing: content-box;
                                -moz-box-sizing: content-box;
                                box-sizing: content-box;
                                cursor: pointer;
                                padding: 10px 20px;
                                border: 1px solid #018dc4;
                                -webkit-border-radius: 2px;
                                border-radius: 2px;
                                font: normal 16px/normal "coda", Helvetica, sans-serif;
                                color: rgba(255,255,255,0.9);
                                text-align: center;
                                -o-text-overflow: clip;
                                text-overflow: clip;
                                background: #0199d9;
                                -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
                                -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
                                -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
                                transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
                            }
                            .botao-acessar:hover {
                                background: #11ABB0;
                                border: 1px solid #11ABB0;
                            }
                        </style>

                        <link href="css/select2.css" rel="stylesheet" />
                        <link href="css/bootstrap.min.css" rel="stylesheet" />

                        <script src="js/jquery-3.2.1.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/select2.js"></script>
                        <script src="js/lista.js"></script>

                        </head>
                        <body>
                            <div class="col-md-4 col-md-offset-4" id="main" align="center">
                                <div id="logo">
                                    <img src="images/Logo-IESA.png" height="200px"/>
                                </div>
                                <div id="sites">
                                    <select class="selecao-customizada" id="listagem">
                                        <option value="" disabled selected>Selecione um site que deseja visualizar</option>
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
                                    <div id="botao">
                                        <input type="button" class="botao-acessar" value="ACESSAR O SITE" onclick="acessarSite()"/>
                                    </div>
                                    <script type="text/javascript" script-name="coda" src="http://use.edgefonts.net/coda.js"></script>
                                </div>
                                <div id="footer">
                                    <footer>
                                        <p>Desenvolvido com muito amor pelos alunos do curso de ADS.</p>
                                    </footer>
                                </div>
                            </div>
                            <br>
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

                                <?php //abaixo, codigo para mostrar o selo  ?>
                                <!--<a target="_blank" href="http://www.beyondsecurity.com/vulnerability-scanner-verification/kraft.ads.cnecsan.edu.br" >
                                    <img src="http://seal.beyondsecurity.com/verification-images/kraft.ads.cnecsan.edu.br/vulnerability-scanner-3.gif" alt="Vulnerability Scanner" border="0" />
                                </a>-->
                                <br><br><br>
                                            <?php //abaixo, codigo para permitir a analise  ?>
                                            <a href="http://www.beyondsecurity.com/vulnerability-scanner-verification/kraft.ads.cnecsan.edu.br"><img src="https://seal.beyondsecurity.com/verification-images/kraft.ads.cnecsan.edu.br/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" /></a>
                                            </body>
                                            </html>

