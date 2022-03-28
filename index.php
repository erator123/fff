<?php
class main{

    private $private;
    private $public;

    public function __brm()
    {
        $this->get_keys();
        $result = $this->post_data();
        $this->check_code($result);
        $this->validation_date($result);
    }

    private function get_keys(){
        $this->private = openssl_pkey_get_private(file_get_contents("bfa87fee-private-key.key"));
        $this->public = openssl_pkey_get_public(file_get_contents("bfa87fee-public-key.pub"));
    }
    private function post_data(): string{
        $date = date("YmdHis");
        $url = 'http://payway.bubileg.cz/api/echo';
        $data = ("bfa87fee|" . $date);
        openssl_sign($data, $signature, $this->private);