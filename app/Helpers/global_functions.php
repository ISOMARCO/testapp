<?php
function getCountryName($code)
{
 $countryEnum = \App\Enums\Country::tryFrom($code);
 return $countryEnum ? $countryEnum->value : 'Unknown Country';
}
