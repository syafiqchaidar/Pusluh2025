<?php

namespace App\Imports;

use App\Models\Bpp;
use App\Models\EImport;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\StatusPenyuluh;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Filament\Notifications\Actions\Action;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use App\Models\Desa;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    private $errorCount = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        HeadingRowFormatter::default('none');
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $successCount = 0;
        $errorCount = 0;
        
        foreach ($rows as $row) {
            $prov = Provinsi::where('nama',$row['Provinsi'])->first();
            $kab1 = Kabupaten::where('nama',$row['Kabupaten'])->first();
            $bpp1 = Bpp::where('nama',$row['Bpp'])->first();
            $role = new \Spatie\Permission\Models\Role;
            if(null!==$kab1){
                $kab = $kab1->id;
            }else{
                $kab = null;
            }
            if(null!==$bpp1){
                $bpp = $bpp1->id;
            }else{
                $bpp = null;
            }
            if($row['Jenis user']=="ADMIN PROVINSI"){
                $roll = "Provinsi";
            }elseif($row['Jenis user']=="ADMIN KABKOTA"){
                $roll = "Kabupaten";
            }elseif($row['Jenis user']=="ADMIN BPP"){
                $roll = "Bpp";
            }
            try {
                set_time_limit(600);
                User::create([
                    'name' => $row['Nama'],
                    'email' => $row['Email'],
                    'password' => Hash::make($row['Password']),
                    'username' => $row['Username'],
                    'nomor' => $row['Nomor'],
                    'nik' => $row['Nik'],
                    'provinsi_id' => $prov->id,
                    'kabupaten_id' => $kab,
                    'bpp_id' => $bpp,
                    'jenis_user' => $row['Jenis user']
                ])->assignRole($role::findByName($roll));
                

                
                // Increment the success count
                $successCount++;
            } catch (\Throwable $e) {
                // Increment the error count
                $errorCount++;
                
                

                // Log the error to your EImport model
                EImport::create([
                    'user_id' => auth()->user()->id,
                    'modul' => "Import User",
                    'error_messages' => $e->getMessage(),
                ]);
            }
        }
        if ($errorCount > 0) {
            Notification::make()
                ->title('Data Gagal Tersimpan')
                ->body("$errorCount data gagal tersimpan.")
                ->color('danger') 
                ->persistent()
                ->actions([
                    Action::make('view')
                        //->url(route('e-imports.index'), shouldOpenInNewTab: true)
                        ->button(),
                ])
                ->send();
        }
        if ($successCount > 0) {
            Notification::make()
                ->title('Data Tersimpan')
                ->body("$successCount data berhasil tersimpan")
                ->color('success') 
                ->persistent()
                ->send();
        }
    }
    /**
     * @return int
     */
    public function headingRow(): int
    {
        return 2;
    }

    public function onError(\Throwable $e)
    {
        // Log error details to e_import table

    }
}
