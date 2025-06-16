<?php

namespace App\Controllers;

use App\Controllers\Admin\Pelamar;
use App\Controllers\Admin\Tahapan;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index(): string
    {
        return view('pelamar/profile');
    }

    public function store(): ResponseInterface
    {
        $pelamar = new \App\Models\PelamarModel();
        $data = $pelamar->where('id_users', session()->get('uid'))->first();
        return $this->response->setJSON($data);
    }

    public function edit(): ResponseInterface
    {
        $lib = new \App\Libraries\Decode();
        $pelamar = new \App\Models\PelamarModel();
        $param = $this->request->getJSON();
        $mail = new \App\Libraries\MyMailer();
        try {
            $param->foto = isset($param->berkas_foto) ? $lib->decodebase64($param->berkas_foto->base64, $param->foto ?? null) : $param->foto;
            $param->ktp = isset($param->berkas_ktp) ? $lib->decodebase64($param->berkas_ktp->base64, $param->ktp ?? null) : $param->ktp;
            $param->kk = isset($param->berkas_kk) ? $lib->decodebase64($param->berkas_kk->base64, $param->kk ?? null) : $param->kk;
            $param->ijazah = isset($param->berkas_ijazah) ? $lib->decodebase64($param->berkas_ijazah->base64, $param->ijazah ?? null) : $param->ijazah;
            $param->skck = isset($param->berkas_skck) ? $lib->decodebase64($param->berkas_skck->base64, $param->skck ?? null) : $param->skck;
            $param->cv = isset($param->berkas_cv) ? $lib->decodebase64($param->berkas_cv->base64, $param->cv ?? null) : $param->cv;
            $pelamar->update($param->id_pelamar, $param);
            $mail = new \App\Libraries\MyMailer();
            $to      = session()->get('email');
            $subject = 'Profil dan Dokumen Anda Sudah Lengkap';
            $message = view('mail/profile', [
                'nama_pelamar' => session()->get('nama'),
                'link_login' => base_url('/auth'),
                'tahun' => date('Y'),
            ]);
            $result = $mail->send($to, $subject, $message);
            return $this->response->setJSON($pelamar->where('id_users', session()->get('uid'))->first());
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
