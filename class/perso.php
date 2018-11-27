<?php

class personnage {
    
    public $nom = 'pas de nom';
    public $vie = 100;
    public $armure = 20;
    public $forceMagique = 20;
    public $forceBrute = 25;
    public $soin = 20;

    public function __construct($nom, $vie, $armure, $forceMagique, $forceBrute, $soin) {
        
        $this->nom = $nom;
        $this->vie = $vie;
        $this->armure = $armure;
        $this->forceMagique = $forceMagique;
        $this->forceBrute = $forceBrute;
        $this->soin = $soin;
    }

    public function regen($bonusVie=0) {
        if ($bonusVie == 0) {
            $bonusVie = $this->soin;
        }
        $this->vie += $bonusVie;
        echo $this->nom.' '.'régénère de'.' '.$bonusVie.'points de vie <br>';
        echo 'Il dispose de'.' '.$this->vie.' '.'point de vie'.'<br>';

        echo '<hr>';
    }

    public function decrire() {
        echo 'personnage :'.' '.$this->nom.'<br>';
        echo 'Dispose de'.' '.$this->vie.' '.'points de vie'.'<br>';
        echo 'Il a'.' '.$this->forceMagique.' '.'de puissance magique !'.'<br>';

        echo '<hr>';
    }

    public function attMag(personnage $defenseur) {
        echo $this->nom.' '.'lance un sort de puissance'.' '.$this->forceMagique.' '.'magique'.'<br>';
        echo $defenseur->nom.' '.'subit des dégats direct'.'<br>';
        $defenseur->vie -= $this->forceMagique;
        echo $defenseur->nom.' '.'perds'.' '.$this->forceMagique.' '.' points de vie, il lui reste donc'.' '.$defenseur->vie.' '.'points de santé'.'<br>'.'<br>';
        $this->alive();
        $defenseur->alive();

        echo '<hr>';
    }

    public function attPhy(personnage $defenseur) {
        echo $this->nom.' '.'frappe violemment'.' '.$defenseur->nom.' '.'avec une force de'.' '.$this->forceBrute.'<br>';
        $degatsPris = $this->forceMagique-$defenseur->armure;
        $defenseur->vie -= $degatsPris;
        echo 'Heureusement que'.' '.$defenseur->nom.' '.'a une armure !'.'<br>';
        echo $defenseur->nom.' '.'perd quand même'.' '.$degatsPris.' '.'points de vie'.'<br>';
        echo 'Il lui reste donc'.' '.$defenseur->vie.' '.'points de santé'.'<br>'.'<br>';
        $this->alive();
        $defenseur->alive();

        echo '<hr>';
    }

    public function alive() {
        if ($this->vie >0) {
            echo $this->nom.' '.'est toujours vivant avec'.' '.$this->vie.' '.'HP'.'<br>';
            return true;
        } else {
            echo $this->nom.' '.'n\'a pas survécu aux dégats'.'<br>';
            return false;
        }
    }

    public function random($defenseur) {

        $whatNow =rand(0,2);
        if (!$whatNow) {
            $this->regen();
        } elseif ($whatNow == 1) {
            $this->attMag($defenseur);
        } else {
            $this->attPhy($defenseur);
        }
    }
}

?>