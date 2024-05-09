<?php
namespace App\Services\Backend\Countries;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountriesService
{
    /**
     * @return object|Collection
     */
    public function getCountries() : Collection
    {
        return Country::all();
    }
}
