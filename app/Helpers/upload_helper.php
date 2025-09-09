<?php

use CodeIgniter\Files\File;

/**
 * Upload multiple images for a property
 *
 * @param array $images   List of UploadedFile dari request
 * @param int   $propertyId  ID properti
 * @param string $type    Nama kategori/tipe properti
 * @param object|null $categoryModel  Model kategori (opsional)
 *
 * @return array  Daftar nama file yang berhasil diupload
 */
function uploadPropertyImages(array $images, int $propertyId, string $fileName): array
{
  $uploadedFiles = [];

  $uploadPath = FCPATH . 'public/uploads/properties/' . $propertyId . '/';

  // cek & buat folder jika belum ada
  if (!is_dir($uploadPath)) {
    mkdir($uploadPath, 0777, true);
    activity_log('create', 'folder ' . $uploadPath);
  }

  // hapus semua isi folder jika ada
  if (is_dir($uploadPath)) {
    array_map('unlink', glob($uploadPath . '*'));
  }

  foreach ($images as $key => $img) {
    if ($img->isValid() && !$img->hasMoved()) {
      // sanitize nama file
      $safeType = preg_replace('/[^a-zA-Z0-9_-]/', '', strtolower($fileName));
      activity_log('upload', $safeType);
      $nameFile = $safeType . '-' . ($key + 1) . '.' . $img->getExtension();
      $img->move($uploadPath, $nameFile);

      $uploadedFiles[] = 'public/uploads/properties/' . $propertyId . '/' . $nameFile;
      activity_log('terupload', 'public/uploads/properties/' . $propertyId . '/' . $nameFile);
    }
  }

  return $uploadedFiles;
}

function folder_delete($path)
{
  // Validasi dasar
  if (empty($path) || !file_exists($path)) {
    return true; // Dianggap berhasil jika tidak ada
  }

  if (!is_dir($path)) {
    return false;
  }

  $files = @scandir($path);
  if ($files === false) {
    return false;
  }

  $files = array_diff($files, ['.', '..']);

  foreach ($files as $file) {
    $filePath = $path . DIRECTORY_SEPARATOR . $file;

    // Skip jika tidak ada
    if (!file_exists($filePath)) {
      continue;
    }

    if (is_dir($filePath)) {
      // Rekursif, tapi continue jika gagal
      if (!folder_delete($filePath)) {
        continue;
      }
    } else {
      // Hapus file, continue jika gagal
      @unlink($filePath);
    }
  }

  return @rmdir($path);
}
