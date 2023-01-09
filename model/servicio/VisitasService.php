<?php

class VisitasService {

    private int $visitas = 0;

    public function __construct() {

        if (!isset($_COOKIE[VISITAS_COOKIE_KEY])) {
            $this->visitas++;
        } else {
            $this->visitas = $_COOKIE[VISITAS_COOKIE_KEY];
            $this->visitas++;
        }
        setcookie(VISITAS_COOKIE_KEY, $this->visitas, time() + 60 * 60 * 24 * 30);
    }

    public function reset() {
        if (isset($_COOKIE[VISITAS_COOKIE_KEY])) {
            $this->visitas = 0;
            setcookie(VISITAS_COOKIE_KEY, $this->visitas, time() + 60 * 60 * 24 * 30);
        }
    }

    public function getVisitas() {
        return $this->visitas;
    }

}
