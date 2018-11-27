<?php
    require 'class/perso.php';

    $perso1 = new personnage ($_GET['nom1'], $_GET['vie1'], $_GET['armure1'], $_GET['forceMagique1'], $_GET['forceBrute1'], $_GET['soin1']);
    $perso2 = new personnage ($_GET['nom2'], $_GET['vie2'], $_GET['armure2'], $_GET['forceMagique2'], $_GET['forceBrute2'], $_GET['soin2']);
    $perso1 ->decrire();
    $perso2 ->decrire();

    if (rand(1, 2)) {
        while ($perso1->alive() && $perso2->alive()) {
            $perso1 ->random($perso2);
           if (($perso1->alive() && $perso2->alive())) {
            $perso2->random($perso1);
           } 
        }
    } else {
        while ($perso1->alive() && $perso2->alive()) {
            $perso2->random($perso1);
            if ($perso1->alive() && $perso2->alive()) {
                $perso1 ->random($perso2);
            }
        }
    }
?>