<?php

namespace App\Http\Controllers;

use App\Models\KonselingBK;
use App\Models\SiswaKonseling;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $R){
        $user= User::where('email', $R->email)->first();

        if($user!='[]' && Hash::check($R->password,$user->password)){
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response= ['status'=>200,'token'=>$token,'user'=>$user,'message'=>'Successfully Login'];
            return response()->json($response); 
        }else if($user=='[]'){
            $response= ['status'=>500,'user'=>$user,'message'=>'Not Found Account found with this Email'];
            return response()->json($response); 
        }else{
            $response= ['status'=>500,'user'=>$user,'message'=>'Wrong Email Or Password, Try Again!'];
            return response()->json($response); 
        }
    }

    public function history($id){
        $user = User::find($id);
        $siswa = $user->siswa;
        $konselingBk = $siswa->konseling;
        $array = [];

        foreach ($konselingBk as $item) {
            array_push($array, [
                "nama_bk" => $item->guru->nama,
                'nama_layanan' => $item->layanan->jenis_layanan,
                'jam_mulai' => $item->jam_mulai,
                // "wali_kelas" => $item->konseling->walas->nama,
                // "jenis_layanan" => $item->konseling->layanan->jenis_layanan,
                // "siswa_konseling" => $item->siswa->nama,
                // "tanggal" => $item->konseling->tanggal_konseling,
                // "jam_mulai" => $item->konseling->jam_mulai,
                // "tempat" => $item->konseling->tempat,
                // "pesan" => $item->konseling->pesan,
                // "hasil" => $item->konseling->hasil_konseling,
                // "status" => $item->konseling->status,
            ]);
        }
        return response()->json(
            $array,
        );
    }

    public function history2() {
        $history = KonselingBK::all();
        $siswaKonseling = SiswaKonseling::all();
        return response()->json([
            'history' => $history,
        ]);
    }
}