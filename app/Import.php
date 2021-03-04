<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    public function import()
    {
        $row = 1;
        if (($handle = fopen("[^.csv]", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num champs à la ligne $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }
    }
}



//dd($request->input("csv"));
$files = $request->input("csv");
// dd($request->request);
//$preview = new Import();
//dd($_FILES);
//dd($request->input());

if (($handle = file($files, FILE_USE_INCLUDE_PATH | FILE_SKIP_EMPTY_LINES)) !== FALSE){
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        dd($handle);
        
        $num = count($data);
        
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />";
            
        }
    }
    fclose($handle);
    dd($num);
}

return redirect()->route('multiHikes.index')->with(compact('preview'));