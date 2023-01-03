<?php

namespace App\Actions;

use Exception;
use Illuminate\Support\Str;

class FilterPokeMon
{
    /**
     * @throws Exception
     */
    public function run()
    {
        return $this->formatKeys();
    }

    /**
     * @throws Exception
     */
    private function loadFile(): array
    {
        $fileName = 'pokemon.csv';
        $file = public_path() . "/{$fileName}";
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $data = [];
        foreach ($rows as $row) {
            $data[] = array_combine($header, $row);
        }
        return collect($data)->filter(function ($value){
            return collect($value)->where('Legendary', '!=','True')
                && collect($value)->where('Type 1', '!=', 'Ghost')
                && collect($value)->where('Type 2', '!=', 'Ghost');
        })->all();
    }

    /**
     * @throws Exception
     */
    private function doubleHpAndIncreasePercentage(): array
    {
        $results = [];
        foreach ($this->loadFile() as $data){
            if ($data['Type 1'] || $data['Type 2'] === 'Steel'){
               $data['HP'] = strval ($data['HP'] * 2);
            }else{
                $data = $data['HP'];
            }
            if($data['Type 1']  === 'Bug' && $data['Type 2'] === 'Flying'){
                $data['Sp. Atk'] = $this->increasePercentage($data['Sp. Atk']);
            }
            if(str_starts_with($data['Name'], 'G')) $data['Sp. Def'] = strval ($data['Sp. Def'] + 5);
            $results[] = $data;
        }
        return $results;
    }

    /**
     * @param $originalNumber
     * @return string
     */
    private  function increasePercentage($originalNumber): string
    {
        $numberToAdd = ($originalNumber / 100) * 10;
        return strval ($originalNumber + $numberToAdd);
    }

    /**
     * @throws Exception
     */
    public function formatKeys(): array
    {
        $collection = [];
        $results = $this->doubleHpAndIncreasePercentage();
        foreach ($results as $index => $result){
            foreach ($result as  $array){
                $collection[$index] = [
                    'name' => $result['Name'],
                    'type_one' => $result['Type 1'],
                    'type_two' => $result['Type 2'],
                    'total'  => $result['Total'],
                    'hp'  => $result['HP'],
                    'attack'  => $result['Attack'],
                    'defense'  => $result['Defense'],
                    'sp_atk'  => $result['Sp. Atk'],
                    'sp_def'  => $result['Sp. Def'],
                    'speed'  => $result['Speed'],
                    'generation'  => $result['Generation'],
                    'legendary'  => $result['Legendary'],

                ];
            }
        }
        return  $collection;
    }
}
