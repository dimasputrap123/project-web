<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('tes', function () {
    $scriptDir = base_path('app/Infrastructure/external/project_ai');
    $pythonPath = base_path('app/Infrastructure/external/project_ai/venv/bin/python');
    $scriptPath = base_path('app/Infrastructure/external/project_ai/main.py');
    $arguments = json_encode(["anggota_kk" => 4, "pendapatan" => 1, "kondisi_rumah" => 1, "sumber_air_minum" => 1, "akses_listrik" => 2, "kepemilikan_aset" => 1, "pekerjaan" => 3, "status_kepemilikan_rumah" => 0, "penghasilan_dibawah_ump" => 0, "aset_produktif" => 1, "akses_pendidikan" => 0, "akses_kesehatan" => 0, "akses_sanitasi" => 1, "akses_listrik_ump" => 1, "rumah_tidak_layak_huni" => 1]);
    chdir($scriptDir);
    $command = "$pythonPath $scriptPath '$arguments'";
    $output = shell_exec($command);
    var_dump($output);
});
