<?php
    // Souvent on identifie cet objet par la variable $conn ou $db
    try
    {
        $dsn = 'mysql:host=sql11.freemysqlhosting.net;dbname=sql11493623;port=3306;charset=UTF8';
        $bdd = new PDO($dsn,'sql11493623','aR7jHuVJU5');
    }
    catch (Exception $e)
    {
	    die('Erreur : ' . $e->getMessage());
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Hurflym</title>
        <link rel= "stylesheet" href= "quizz.css">

        
        
    </head>
    <body>
        <div class = "header">
            <h1>Partagez-nous votre expérience ! </h1>
        </div>
        <div class = "main">
            <div class = "table">
                <form action="projet_transverse.php" method="post" class="form-quizz">
                    
                    <label for="reponse_sol">Qu'elle est la qualité du sol?</label> <br>   
                    <input type="range" name="reponse_sol" id="reponse_sol" min="0" max="11"><br> 

                    <br> 
                    <br> 
                    

                    <label for="reponse_odeur">Y avait-il des odeurs?</label> <br>  
                    <input type="range" min="0" max="11" name="reponse_odeur" id="reponse_odeur"><br> 

                    <label for="reponse_cuvette">La cuvette était-elle sale?</label>   <br> 
                    <input type="range" min="0" max="11" name="reponse_cuvette" id="reponse_cuvette"><br> 

                    <label for="reponse_bouchees">Les toillettes étaient-elles bouchées?</label>   <br> 
                    <input type="range" min="0" max="11" name="reponse_bouchees" id="reponse_bouchees"><br> 

                    <br> 
                    <br> 



                    <label for="reponse_chasse_deau">La chasse d'eau était-elles cassée?</label>   <br> 
                    <input type="range" min="0" max="1" name="reponse_chasse_deau" id="reponse_chasse_deau"><br> 

                    <label for="reponse_porte">La porte était-elle cassée?</label>   <br> 
                    <input type="range" min="0" max="1" name="reponse_porte" id="reponse_porte"><br> 

                    <label for="reponse_abattant_casse">L'abattant était-il cassé?</label>   <br> 
                    <input type="range" min="0" max="1" name="reponse_abattant_casse" id="reponse_abattant_casse"><br> 

                    <label for="reponse_papier_toillette">Manqu'ait-il du papier toillettes ?</label>  <br> 
                    <input type="range" min="0" max="11" name="reponse_papier_toillette" id="reponse_papier_toillette"><br> 

                    <br> 
                    <br> 



                    <label for="reponse_papiers_mains">Y avait-il du papier pour ce laver les mains?</label>   <br> 
                    <input type="range" min="0" max="11" name="reponse_papier_mains" id="reponse_papier_main"><br> 

                    <label for="reponse_lavabo_bouche">Est-ce que le lavabo était bouché?</label>   <br> 
                    <input type="range" min="0" max="1" name="reponse_lavabo_bouche" id="reponse_lavano_bouche"><br> 

                    <label for="reponse_lavabo_savon">Y'avait-il du savon pour vous l'avez les mains ?</label>   <br> 
                    <input type="range" min="0" max="1" name="reponse_lavabo_savon" id="reponse_lavabo_savon"><br> 

                    <label for="reponse_lavabo_sale">Le lavabo était-il sale?</label>   <br> 
                    <input type="range" min="0" max="11" name="reponse_lavabo_sale" id="reponse_lavabo_sale"><br> 


                    <br> 
                    <br> 


                    <input type="submit" name="submit">
                </form>
                <?php
                    if (isset($_POST['submit'])){

                        if(isset($_POST["reponse_sol"])){
                            $reponse_sol = $_POST["reponse_sol"];
                            $reponse_quest_sol = $bdd->query(" INSERT INTO `Sol` (`Id_sol`, `Sol_salete`) VALUES ('','$reponse_sol')");
                        }
                        
                        if(isset($_POST["reponse_odeur"]) && isset($_POST["reponse_cuvette"]) && isset($_POST["reponse_bouchees"])){
                            $reponse_odeur = $_POST["reponse_odeur"];
                            $reponse_cuvette = $_POST["reponse_cuvette"];
                            $reponse_bouchees = $_POST["reponse_bouchees"];
                            $reponse_quest_proprete = $bdd->query(" INSERT INTO `Proprete` (`ID`, `Salete`, 'Odeurs', 'Toilettes_bouches') VALUES ('','$reponse_odeur', '$reponse_cuvette', '$reponse_bouchees')");
                        }
                        

                        if(isset($_POST["reponse_chasse_deau"]) && isset($_POST["reponse_porte"]) && isset($_POST["reponse_abattant_casse"]) && isset($_POST["reponse_papier_toillette"])){
                            $reponse_chasse_deau = $_POST["reponse_chasse_deau"];
                            $reponse_porte = $_POST["reponse_porte"];
                            $reponse_abattant_casse = $_POST["reponse_abattant_casse"];
                            $reponse_papier_toillette = $_POST["reponse_papier_toillette"];
                            $reponse_quest_tech = $bdd->query(" INSERT INTO `P_Techniques` (`ID_Tech`, `Chasse_d_eau`, 'Porte_casee', 'Abatant_cassee', 'Papier_toilettes') VALUES ('','$reponse_chasse_deau', '$reponse_porte', '$reponse_abattant_casse', '$reponse_papier_toillette')");
                        }
                        

                        if(isset($_POST["reponse_papier_main"]) && isset($_POST["reponse_lavano_bouche"]) && isset($_POST["reponse_lavabo_savon"]) && isset($_POST["reponse_lavabo_sale"])){
                            $reponse_papier_main = $_POST["reponse_papier_main"];
                            $reponse_lavano_bouche = $_POST["reponse_lavano_bouche"];
                            $reponse_lavabo_savon = $_POST["reponse_lavabo_savon"];
                            $reponse_lavabo_sale = $_POST["reponse_lavabo_sale"];
                            $reponse_quest_Lav = $bdd->query(" INSERT INTO `Lavabo` (`ID_lav`, `Papier`, 'Lavabo_bouche', 'Savon', 'Salete') VALUES ('','$reponse_papier_main', '$reponse_lavano_bouche', '$reponse_lavabo_savon', '$reponse_lavabo_sale')");
                        }
                        

                        echo("votre formulaire à bien été envoyé, merci!");
                    }
                    
                ?>
            </div>
        </div>
        <div class = "footer">

        </div>
    </body>
</html>
