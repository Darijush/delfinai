<?php

class Kibiras{
    private static $akmenuKiekisVisuoseKibiruose = 0;
    protected $akmenuKiekis;

    public function __construct()
    {
        $this->akmenuKiekis = 0;
    }

    public function prideti1Akmeni(): void{
        $this->akmenuKiekis++;
        self::$akmenuKiekisVisuoseKibiruose++;
    }
    public function pridetiDaugAkmenu(int $kiekis):void{
        $this->akmenuKiekis +=$kiekis;
        self::$akmenuKiekisVisuoseKibiruose +=$kiekis;
    }

    public function kiekPririnktaAkmenu(): int{
        return $this->akmenuKiekis;
    }
    public function kiekVisoAkmenu():int{
        return self::$akmenuKiekisVisuoseKibiruose;
    }




}