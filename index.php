<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php 
        require 'class/perso.php';
        require 'class/formulaire.php';

        function formCreate () {
            $formu[1] = new formulaire(1);
            $formu[2] = new formulaire(2);

            $formu[1]->addI();
            $formu[2]->addI();

            return ($formu);
        }

        $myForm = formCreate();

        echo '<form action="./create.php" method="get" name="monForm"><ul>';
        echo $myForm[1]->echoForm().$myForm[2]->echoForm().'<li><input type="submit" value="creer"></li></ul></form>';

        ?>
    </main>
    
</body>
</html>