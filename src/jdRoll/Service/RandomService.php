<?php

namespace jdRoll\service;

class RandomService {

    public function getValue(min, max) {
        return rand(min, max);
    }
}
