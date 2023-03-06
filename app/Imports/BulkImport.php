<?php

namespace App\Imports;

use App\Clip;
use App\Zone;
use App\Tehsil;
use App\District;
use App\UC;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BulkImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

//   $date  = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])) ;



       $i = 0 ;
        foreach ($rows as $row)
        {


            if($i > 0 )
            {
                $uc = new UC();
                $uc->uc_no =  trim($row[0]);
                $uc->uc_name_eng =  trim($row[1]);
                $uc->uc_name_ur =  trim($row[2]);
                $uc->prov_no =  trim($row[3]);
                $uc->id_tsl =  trim($row[5]);
                $uc->tehsil_tanzimi =  trim($row[7]);

                $uc->id_dist =  $row[8] ;
                $uc->district_tanzimi =  trim($row[9]);

                $uc->save();


            }

             $i++;
        }
    }
}
