<?php

namespace Service;

class Utils {

    public static function formaterDateFr(string $date) {

        $datetime = new \DateTime($date);
        $formatter = new \IntlDateFormatter (
            'fr_FR',
            \IntlDateFormatter::LONG,
            \IntlDateFormatter::NONE,
            "Europe/Paris",
            \IntlDateFormatter::GREGORIAN
        );

        return $formatter->format($datetime);
    }
}