<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\WilayahModel;
use App\Models\CategoryModel;
use App\Models\FacilityModel;
use App\Models\FavoriteModel;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Controllers\BaseController;

class Properti extends BaseController
{
    protected $userModel;
    protected $wilayahModel;
    protected $propertyModel;
    protected $categoryModel;
    protected $facilityModel;
    protected $favoriteModel;
    protected $propertyImageModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->wilayahModel = new WilayahModel();
        $this->favoriteModel = new FavoriteModel();
        $this->facilityModel = new FacilityModel();
        $this->categoryModel = new CategoryModel();
        $this->propertyModel = new PropertyModel();
        $this->propertyImageModel = new PropertyImageModel();
    }

    public function index()
    {
        $agen_id = session()->get('role') == 'agen' ? (int) (session()->get('id')) : null;
        $data = [
            'title' => 'Daftar Properti',
            'subtitle' => 'Kelola semua daftar properti Anda di Sini.',
            'data' => $this->propertyModel->getData($agen_id),
            'kategori' => $this->categoryModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'agens' => $this->userModel
                ->where('status', 'aktif')
                ->where('role', 'agen')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ];
        return $this->template->display('dashboard/properti', $data);
    }

    public function get_ajax()
    {
        $status = defaultValue($this->request->getPost('status'), null);
        $agen = defaultValue($this->request->getPost('agen'), null);
        $agen = session()->get('role') == 'agen' ? (int) (session()->get('id')) : $agen;
        $kategori = defaultValue($this->request->getPost('kategori'), null);

        $key = 'properti_' . $agen . '_' . $status . '_' . $kategori;
        $res = $this->cache->get($key);
        if (!$res) {
            $res = $this->propertyModel->getData($agen, $status, $kategori);
            $detik = 60 * 60;
            $this->cache->save($key, $res, $detik);
        }
        return $this->response->setJSON($res);
    }

    public function favorite($id)
    {
        $value = $this->request->getPost('value');
        if ($value == 1) {
            $this->favoriteModel->insert(['property_id' => $id,]);
            $hasil = 'success';
        } else {
            $this->favoriteModel->where('property_id', $id)->delete();
            $hasil = 'danger';
        }

        return $this->response->setJSON(['status' => 200, 'message' => $hasil]);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Properti',
            'subtitle' => 'Tambah properti baru di Sini.',
            'kategoris' => $this->categoryModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'fasilitas' => $this->facilityModel->where('status', 'aktif')->findAll(),
            'agens' => $this->userModel
                ->where('status', 'aktif')
                ->where('role', 'agen')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'provinsi' => $this->wilayahModel->where('level', 'provinsi')->findAll(),
            'kota' => $this->wilayahModel->where('level', 'kabupaten')->findAll(),
            'validation' => session('validation'),
        ];
        return $this->template->display('dashboard/properti/create', $data);
    }

    public function store()
    {
        // step 1
        $title = $this->request->getPost('title');
        $price = str_replace('.', '', $this->request->getPost('price'));
        $type = $this->request->getPost('type');
        $status = $this->request->getPost('status');
        $province = $this->request->getPost('province');
        $city = $this->request->getPost('city');
        $address = $this->request->getPost('address');
        $certificate = $this->request->getPost('certificate');
        // step 2
        $bedrooms = defaultValue($this->request->getPost('bedrooms'), 0);
        $bathrooms = defaultValue($this->request->getPost('bathrooms'), 0);
        $carport = defaultValue($this->request->getPost('carport'), 0);
        $building_area = defaultValue($this->request->getPost('building_area'), 0);
        $land_area = defaultValue($this->request->getPost('land_area'), 0);
        $floors = defaultValue($this->request->getPost('floors'), 0);
        // step 3
        $tempFasilitas = defaultValue($this->request->getPost('fasilitas'), []);
        $facilities = implode(',', $tempFasilitas);
        $images = defaultValue($this->request->getFileMultiple('images'), []);
        // step 4
        $user_id = $this->request->getPost('user_id');
        $description = $this->request->getPost('description');

        $data = [
            'title' => $title,
            'price' => $price,
            'type' => $type,
            'status' => $status,
            'province' => $province,
            'city' => $city,
            'address' => $address,
            'certificate' => $certificate,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'carport' => $carport,
            'building_area' => $building_area,
            'land_area' => $land_area,
            'floors' => $floors,
            'facilities' => $facilities,
            'description' => $description,
            'user_id' => $user_id,
        ];

        if (session()->get('role') == 'agen') {
            $data['publish'] = 0;
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]',
            'type' => 'required',
            'status' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            'certificate' => 'required',
            'user_id' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'Validasi gagal',
                'text' => $validation->getErrors()
            ]);
        }

        try {
            $this->propertyModel->insert($data);
            $id = $this->propertyModel->insertID();

            $fileName = $this->request->getPost('tipe');
            $uploaded = uploadPropertyImages($images, $id, $fileName);

            // contoh simpan ke DB
            foreach ($uploaded as $key => $imgUrl) {
                $this->propertyImageModel->insert([
                    'property_id' => $id,
                    'image_url' => $imgUrl,
                    'is_primary' => $key == 0 ? 1 : 0,
                ]);
            }

            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Properti berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Gagal menambahkan properti: ' . $e->getMessage()
            ]);
        }
        return redirect()->to('/dashboard/properti');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Properti',
            'subtitle' => 'Kelola detail properti Anda di Sini.',
            'data' => $this->propertyModel->getDataById($id),
            'kategoris' => $this->categoryModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'fasilitas' => $this->facilityModel->where('status', 'aktif')->findAll(),
            'agens' => $this->userModel
                ->where('status', 'aktif')
                ->where('role', 'agen')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'provinsi' => $this->wilayahModel->where('level', 'provinsi')->findAll(),
            'kota' => $this->wilayahModel->where('level', 'kabupaten')->findAll(),
            'validation' => session('validation'),
        ];

        return $this->template->display('dashboard/properti/detail', $data);
    }

    public function disabled($id)
    {
        if (!$id) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'ID properti tidak ditemukan'
            ]);
        }
        $property = $this->propertyModel->find($id);
        if (!$property) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Properti tidak ditemukan'
            ]);
        }
        $publish = $this->request->getPost('value');
        $data = [
            'publish' => $publish,
        ];

        try {
            $this->propertyModel->update($id, $data);
            return $this->response->setJSON([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Properti berhasil ' . ($publish == 0 ? 'dinonaktifkan' : 'diaktifkan') . '.',
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Gagal menonaktifkan properti: ' . $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        $property = $this->propertyModel->find($id);
        if (!$property) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Properti tidak ditemukan'
            ]);
        }
        $this->propertyModel->delete($id);
        return $this->response->setJSON([
            'title' => 'Berhasil',
            'icon' => 'success',
            'text' => 'Properti berhasil dihapus'
        ]);
    }
}
