<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Livewire Payload
    |--------------------------------------------------------------------------
    |
    | Default max nesting depth Livewire biasanya 10.
    | Karena error kamu bilang data.content.content... sudah melewati 10 level,
    | kita naikkan limit-nya supaya form/konten nested dari Filament/Livewire
    | tidak langsung error.
    |
    */

    'payload' => [
        'max_nesting_depth' => 50,
    ],

];