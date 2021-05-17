<?php 

class ControladorCategorias {

    static public function ctrConsultarIconos(){
        $iconos = ['fas fa-tshirt','fas fa-shoe-prints','fas fa-socks','fas fa-desktop','fas fa-book-reader','fas fa-music','fas fa-glasses','fas fa-apple-alt',
                    'fas fa-birthday-cake', 'fas fa-cookie-bite', 'fas fa-ice-cream', 'fas fa-gamepad', 'fas fa-bicycle', 'fas fa-mobile-alt', 'fas fa-laptop',
                    'fas fa-mouse', 'fas fa-hard-hat', 'fas fa-tools', 'fas fa-clock', 'fas fa-pizza-slice', 'fas fa-hamburger', 'fas fa-coffee', 'fas fa-clinic-medical'
                ];
        return $iconos;       
    }

}