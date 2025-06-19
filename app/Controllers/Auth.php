<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $user;
    protected $pelamar;
    public function __construct()
    {
        $this->user = new \App\Models\UsersModel();
        $this->pelamar = new \App\Models\PelamarModel();
    }
    public function index(): string
    {
        if ($this->user->where('role', 'Pimpinan')->countAllResults() == 0) {
            $this->user->insert(['username' => 'Pimpinan', 'password' => password_hash('Pimpinan#1', PASSWORD_DEFAULT), 'role' => 'Pimpinan']);
        }
        if ($this->user->countAllResults() == 0) {
            $this->user->insert(['username' => 'Administrator', 'password' => password_hash('Administrator#1', PASSWORD_DEFAULT), 'role' => 'Admin']);
        }
        return view('login');
    }

    function login()
    {
        $user = $this->user->where('username', $this->request->getVar('username'))->first();
        if ($user) {
            if (password_verify($this->request->getVar('password'), $user->password)) {
                if ($user->role == 'Pelamar') {
                    $pelamar = $this->pelamar->where('id_users', $user->id_users)->first();
                    $sessi = ['nama' => $pelamar->nama_pelamar, 'uid' => $user->id_users, 'isLogin' => true, 'role' => $user->role, 'email' => $pelamar->email];
                    session()->set($sessi);
                } else {
                    $sessi = ['nama' => $user->username, 'uid' => $user->id_users, 'isLogin' => true, 'role' => $user->role];
                    session()->set($sessi);
                }
                return redirect()->to(base_url('beranda'))->with('success', 'Login berhasil.');
            }
            return redirect()->to(base_url('auth'))->with('error', 'Password yang anda masukkan salah.');
        }
        return redirect()->to(base_url('auth'))->with('error', 'Username tidak ditemukan.');
    }

    public function reg()
    {
        return view('register');
    }

    public function daftar()
    {
        try {
            if ($this->request->getMethod() === 'POST') {
                $validation = \Config\Services::validation();

                $rules = [
                    'nik' => 'required|numeric|is_unique[pelamar.nik]',
                    'nama_pelamar' => 'required|string',
                    'telepon' => 'required|numeric',
                    'username' => 'required|is_unique[users.username]',
                    'password' => 'required',
                    'email' => 'required',
                    'confirm_password' => 'required|matches[password]',
                ];

                if (!$this->validate($rules)) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                // Simpan ke tabel user
                $userData = [
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role'     => 'Pelamar'
                ];
                $this->user->insert($userData);
                $userId = $this->user->insertID();

                // Simpan ke tabel pelamar
                $pelamarData = [
                    'nik'          => $this->request->getPost('nik'),
                    'nama_pelamar' => $this->request->getPost('nama_pelamar'),
                    'telepon'      => $this->request->getPost('telepon'),
                    'email'      => $this->request->getPost('email'),
                    'id_users'     => $userId
                ];
                $this->pelamar->insert($pelamarData);
                $mail = new \App\Libraries\MyMailer();
                $to      = $this->request->getPost('email');
                $subject = 'Success Registrasi';
                $message = view('mail/email', [
                    'nama_pelamar' => $this->request->getPost('nama_pelamar'),
                    'nik'=>$this->request->getPost('nik'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'email' => $this->request->getPost('email'),
                    'link_login' => base_url('/auth'),
                    'nama_perusahaan' => 'PT. Bintoro Indah Group',
                    'tahun' => date('Y'),
                ]);

                $result = $mail->send($to, $subject, $message);

                if ($result === true) {
                    return redirect()->to(base_url('success'));
                    // return 'Email berhasil dikirim!';
                } else {
                    return 'Gagal mengirim: ' . $result;
                }
            }
            return view('register');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'))->with('success', 'Anda telah logout');
    }
}
