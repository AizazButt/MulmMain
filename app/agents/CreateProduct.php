<?php

class CreateProduct extends ElectroApi {

    protected function onDevise() {
        $this->resSendOK([
            'eevee' => 'Hi i\'m CreateProduct agent.'
        ]);
    }
}
