<?php
function getCountryName($code)
{
    return \App\Enums\Country::fromName($code);
}
