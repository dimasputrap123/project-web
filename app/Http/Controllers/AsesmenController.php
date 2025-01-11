<?php

namespace App\Http\Controllers;

use App\Core\Interfaces\IDaftarKpmQuery;
use App\Core\Interfaces\IDashboardQuery;
use App\Core\Interfaces\IHasilPrediksiQuery;
use App\Core\UseCases\TambahSurveyUseCase;
use App\Core\UseCases\UpdateStatusKpmUseCase;
use App\Http\Request\ListRequest;
use App\Http\Request\PrediksiRequest;
use App\Http\Request\TambahSurveyRequest;
use App\Http\Request\UpdateKpmRequest;
use App\Infrastructure\Models\Kpm;
use App\Infrastructure\Models\MasterAsesmen;
use App\Infrastructure\Models\MasterBantuan;
use App\Infrastructure\Models\MasterKategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsesmenController extends Controller
{
    private TambahSurveyUseCase $tambahSurveyUseCase;
    private IHasilPrediksiQuery $prediksiQuery;
    private IDashboardQuery $dashboardQuery;
    private IDaftarKpmQuery $daftarKpmQuery;
    private UpdateStatusKpmUseCase $updateStatusKpmUseCase;

    public function __construct(
        TambahSurveyUseCase $tambahSurveyUseCase,
        IHasilPrediksiQuery $prediksiQuery,
        IDashboardQuery $dashboardQuery,
        IDaftarKpmQuery $daftarKpmQuery,
        UpdateStatusKpmUseCase $updateStatusKpmUseCase
    ) {
        $this->tambahSurveyUseCase = $tambahSurveyUseCase;
        $this->prediksiQuery = $prediksiQuery;
        $this->dashboardQuery = $dashboardQuery;
        $this->daftarKpmQuery = $daftarKpmQuery;
        $this->updateStatusKpmUseCase = $updateStatusKpmUseCase;
    }

    function add_master_bantuan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bantuan' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            $master_bantuan = MasterBantuan::create([
                'bantuan' => $request->bantuan,
            ]);
            if ($master_bantuan == null) {
                throw new Exception("failed create");
            }
            return response()->json(['status' => true, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function add_master_kategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            $master_kategori = MasterKategori::create([
                'kategori' => $request->kategori,
            ]);
            if ($master_kategori == null) {
                throw new Exception("failed create");
            }
            return response()->json(['status' => true, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function add_master_asesmen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string|max:255',
            'pertanyaan_slug' => 'required|string|max:255',
            'status' => 'required|string|max:30|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            $master_asesmen = MasterAsesmen::create([
                'pertanyaan' => $request->pertanyaan,
                'pertanyaan_slug' => $request->pertanyaan_slug,
                'status' => $request->status,
            ]);
            if ($master_asesmen == null) {
                throw new Exception("failed create");
            }
            return response()->json(['status' => true, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function add_kpm(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255|',
            'alamat' => 'required|string|max:255|',
            'status' => 'required|string|max:30|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            $kpm = Kpm::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'updated_by' => $user->id,
            ]);
            if ($kpm == null) {
                throw new Exception("failed create");
            } else {
                return response()->json(['status' => true, 'message' => 'success']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function tambahSurvey(Request $request)
    {
        try {
            $tambahsurvey_request = TambahSurveyRequest::fromArray($request->all());
            $user = $request->user();
            $this->tambahSurveyUseCase->execute($tambahsurvey_request, $user->id);
            return response()->json(['status' => true, 'data' => json_decode($tambahsurvey_request->surveys)]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function prediksiHasil(Request $request)
    {
        try {
            $prediksi_request = PrediksiRequest::fromArray($request->all());
            $pertanyaan_slug = $this->prediksiQuery->getPertanyaanSlug($prediksi_request);
            $prediksi = $this->prediksiQuery->prediksi($pertanyaan_slug->pertanyaan_json);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $prediksi]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
    
    function dashboard()
    {
        try {
            $result = $this->dashboardQuery->getRekapDashboard();
            return response()->json(['status' => true, 'message' => 'success', 'data' => $result]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function daftarKpmBelumAsesmen(Request $request)
    {
        try {
            $listRequest = ListRequest::fromArray($request->all());
            $result = $this->daftarKpmQuery->getBelumAsesmen($listRequest);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $result]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function daftarKpmSudahAsesmen(Request $request)
    {
        try {
            $listRequest = ListRequest::fromArray($request->all());
            $result = $this->daftarKpmQuery->getSudahAsesmen($listRequest);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $result]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function daftarKpmTidakDitemukan(Request $request)
    {
        try {
            $listRequest = ListRequest::fromArray($request->all());
            $result = $this->daftarKpmQuery->getTidakDitemukan($listRequest);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $result]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function daftarKpmMeninggal(Request $request)
    {
        try {
            $listRequest = ListRequest::fromArray($request->all());
            $result = $this->daftarKpmQuery->getMeninggal($listRequest);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $result]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    function updateStatusKpm(Request $request)
    {
        try {
            $updateRequest = UpdateKpmRequest::fromArray($request->all());
            $user = $request->user();
            $result = $this->updateStatusKpmUseCase->execute($updateRequest->id, $updateRequest->status, $user->id);
            if (!$result) {
                return response()->json(['status' => false, 'message' => 'kpm tidak ditemukan']);
            }
            return response()->json(['status' => true, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
}
