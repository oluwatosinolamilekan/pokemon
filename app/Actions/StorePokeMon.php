<?php

namespace App\Actions;

use App\Models\PokeMon;
use Illuminate\Support\Facades\DB;

class StorePokeMon extends FilterPokeMon
{
    public function run()
    {
        $start = microtime(true);
        DB::beginTransaction();
        $results = $this->formatKeys();
        foreach ($results as $result){
            PokeMon::create($result);
        }
        DB::commit();
        return (float) microtime(true) - $start;
    }
}
