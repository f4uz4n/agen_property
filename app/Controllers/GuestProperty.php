<?php

namespace App\Controllers;

use App\Models\PropertyModel;
use App\Models\CategoryModel;
use App\Models\FacilityModel;
use App\Models\ContactModel;
use App\Controllers\BaseController;

class GuestProperty extends BaseController
{
  protected $propertyModel;
  protected $categoryModel;
  protected $facilityModel;
  protected $contactModel;

  public function __construct()
  {
    $this->propertyModel = new PropertyModel();
    $this->categoryModel = new CategoryModel();
    $this->facilityModel = new FacilityModel();
    $this->contactModel = new ContactModel();
  }

  public function index()
  {
    // Ambil data kategori dan fasilitas untuk form
    $categories = $this->categoryModel->where('status', 'aktif')->findAll();
    $facilities = $this->facilityModel->where('status', 'aktif')->findAll();
    $contact = $this->contactModel->getData();

    $data = [
      'title' => 'Input Properti',
      'subtitle' => 'Masukkan detail properti Anda',
      'categories' => $categories,
      'facilities' => $facilities,
      'contact' => $contact,
      'validation' => \Config\Services::validation()
    ];

    return $this->template->displayLanding('guest_property', $data);
  }

  public function submit()
  {
    // Validasi input
    $rules = [
      'title' => 'required|min_length[10]|max_length[200]',
      'description' => 'required|min_length[20]',
      'type' => 'required',
      'price' => 'required|numeric|greater_than[0]',
      'address' => 'required|min_length[10]',
      'city' => 'required',
      'province' => 'required',
      'certificate' => 'required',
      'status' => 'required',
      'owner_name' => 'required',
      'owner_phone' => 'required|min_length[10]',
      'owner_email' => 'required|valid_email'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    // Ambil data dari form
    $propertyData = [
      'title' => $this->request->getPost('title'),
      'description' => $this->request->getPost('description'),
      'type' => $this->request->getPost('type'),
      'price' => str_replace(['.', ','], '', $this->request->getPost('price')),
      'address' => $this->request->getPost('address'),
      'city' => $this->request->getPost('city'),
      'province' => $this->request->getPost('province'),
      'certificate' => $this->request->getPost('certificate'),
      'status' => $this->request->getPost('status'),
      'bedrooms' => $this->request->getPost('bedrooms') ?: 0,
      'bathrooms' => $this->request->getPost('bathrooms') ?: 0,
      'carport' => $this->request->getPost('carport') ?: 0,
      'building_area' => $this->request->getPost('building_area') ?: 0,
      'land_area' => $this->request->getPost('land_area') ?: 0,
      'floors' => $this->request->getPost('floors') ?: 1,
      'facilities' => $this->request->getPost('facilities') ? implode(',', $this->request->getPost('facilities')) : '',
      'publish' => 0, // Default tidak dipublikasi untuk guest
      // masukkan owner ke deskripsi
      'owner_name' => $this->request->getPost('owner_name'),
      'owner_phone' => $this->request->getPost('owner_phone'),
      'owner_email' => $this->request->getPost('owner_email')
    ];

    // Simpan ke database
    if ($this->propertyModel->insert($propertyData)) {
      $propertyId = $this->propertyModel->getInsertID();

      // Handle upload gambar jika ada
      $this->handleImageUpload($propertyId);

      return redirect()->to('/guest-property/success')->with('success', 'Properti berhasil disubmit! Tim kami akan menghubungi Anda untuk verifikasi.');
    } else {
      return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
  }

  public function success()
  {
    $contact = $this->contactModel->getData();

    $data = [
      'title' => 'Terima Kasih',
      'subtitle' => 'Properti Anda telah berhasil disubmit',
      'contact' => $contact
    ];

    return $this->template->displayLanding('guest_property_success', $data);
  }

  private function handleImageUpload($propertyId)
  {
    $files = $this->request->getFiles();

    if (!empty($files['images'])) {
      $uploadPath = FCPATH . 'public/uploads/properties/';

      // Pastikan direktori upload ada
      if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0755, true);
      }

      foreach ($files['images'] as $index => $file) {
        if ($file->isValid() && !$file->hasMoved()) {
          // Validasi ukuran file (max 5MB)
          if ($file->getSize() > 5 * 1024 * 1024) {
            continue; // Skip file yang terlalu besar
          }

          // Validasi tipe file
          $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
          if (!in_array($file->getMimeType(), $allowedTypes)) {
            continue; // Skip file yang bukan gambar
          }

          $newName = $propertyId . '_' . ($index + 1) . '_' . time() . '.' . $file->getExtension();

          if ($file->move($uploadPath, $newName)) {
            // Simpan informasi gambar ke database
            $imageData = [
              'property_id' => $propertyId,
              'image_url' => 'uploads/properties/' . $newName,
              'is_primary' => $index == 0 ? 1 : 0
            ];

            $this->db->table('property_images')->insert($imageData);
          }
        }
      }
    }
  }
}
