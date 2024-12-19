<?php

namespace App\Infrastructure\queries;

use App\Core\DTO\PertanyaanItemDTO;
use App\Core\DTO\PertanyaanSlugDTO;
use App\Core\DTO\PrediksiDTO;
use App\Core\Interfaces\IHasilPrediksiQuery;
use App\Http\Request\PrediksiRequest;
use App\Infrastructure\Models\MasterAsesmen;
use Exception;

class HasilPrediksiQuery implements IHasilPrediksiQuery
{
    public function prediksi(string $pertanyaan_json): PrediksiDTO
    {
        $scriptDir = base_path('app/Infrastructure/external/project_ai');
        $pythonPath = base_path('app/Infrastructure/external/project_ai/venv/bin/python');
        $scriptMain = base_path('app/Infrastructure/external/project_ai/main.py');
        $scriptEncoder = base_path('app/Infrastructure/external/project_ai/encoder.py');
        chdir($scriptDir);

        $commandEncoder = "$pythonPath $scriptEncoder '$pertanyaan_json'";
        $outputEncoder = shell_exec($commandEncoder);

        $commandMain = "$pythonPath $scriptMain '$outputEncoder'";
        $outputMain = shell_exec($commandMain);
        $prediksi = json_decode($outputMain);

        return new PrediksiDTO($prediksi->rekomendasi, $prediksi->kategori);
    }

    public function getPertanyaanSlug(PrediksiRequest $request): PertanyaanSlugDTO
    {
        $surveys = json_decode($request->surveys);
        $surveys_slugs = [];
        foreach ($surveys as $item) {
            $slug = MasterAsesmen::where('id', $item->id_pertanyaan)->first();
            if ($slug == null) {
                throw new Exception("id pertanyaan not found");
            }
            $tmp = new PertanyaanItemDTO($slug->pertanyaan_slug, $item->jawaban);
            $surveys_slugs[] = $tmp;
        }
        return new PertanyaanSlugDTO($surveys_slugs);
    }
}
