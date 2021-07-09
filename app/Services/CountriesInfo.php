<?php

namespace App\Services;
class CountriesInfo
{
  

    const COUNTRIES_ENUM = array
    (
        "+237" => array
                      (
                        "country" => "Cameroon",
                        "regex" => "\(237\)\ ?[2368]\d{7,8}$"
                      ),
        "+251" => array
                      (
                        "country" => "Ethiopia",
                        "regex" => "\(251\)\ ?[1-59]\d{8}$",
                      ),
        "+212" => array
                      (
                        "country" => "Morocco",
                        "regex" => "\(212\)\ ?[5-9]\d{8}$",
                      ),
        "+258" => array
                      (
                        "country" => "Mozambique",
                        "regex" => "\(258\)\ ?[28]\d{7,8}$",
                      ),
        "+256" => array
                      (
                        "country" => "Uganda",
                        "regex" => "\(256\)\ ?\d{9}$",
                      )
    );
}
