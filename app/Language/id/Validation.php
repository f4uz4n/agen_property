<?php

// app/Language/id/Validation.php

return [
  // Aturan umum
  'required' => 'Field {field} wajib diisi.',
  'isset' => 'Field {field} harus memiliki nilai.',
  'valid_email' => 'Field {field} harus berupa alamat email yang valid.',
  'valid_emails' => 'Field {field} harus berisi semua alamat email yang valid.',
  'valid_url' => 'Field {field} harus berupa URL yang valid.',
  'valid_ip' => 'Field {field} harus berupa IP yang valid.',
  'min_length' => 'Field {field} harus memiliki panjang minimal {param} karakter.',
  'max_length' => 'Field {field} tidak boleh lebih dari {param} karakter.',
  'exact_length' => 'Field {field} harus memiliki panjang tepat {param} karakter.',
  'alpha' => 'Field {field} hanya boleh berisi huruf.',
  'alpha_space' => 'Field {field} hanya boleh berisi huruf dan spasi.',
  'alpha_numeric' => 'Field {field} hanya boleh berisi huruf dan angka.',
  'alpha_numeric_space' => 'Field {field} hanya boleh berisi huruf, angka, dan spasi.',
  'alpha_dash' => 'Field {field} hanya boleh berisi huruf, angka, garis bawah, dan tanda minus.',
  'numeric' => 'Field {field} hanya boleh berisi angka.',
  'integer' => 'Field {field} harus berupa bilangan bulat.',
  'decimal' => 'Field {field} harus berupa bilangan desimal.',
  'greater_than' => 'Field {field} harus lebih besar dari {param}.',
  'greater_than_equal_to' => 'Field {field} harus lebih besar atau sama dengan {param}.',
  'less_than' => 'Field {field} harus lebih kecil dari {param}.',
  'less_than_equal_to' => 'Field {field} harus lebih kecil atau sama dengan {param}.',
  'in_list' => 'Field {field} harus salah satu dari: {param}.',
  'not_in_list' => 'Field {field} tidak boleh salah satu dari: {param}.',
  'matches' => 'Field {field} harus sama dengan field {param}.',
  'differs' => 'Field {field} harus berbeda dengan field {param}.',

  // Khusus angka
  'is_natural' => 'Field {field} hanya boleh berisi angka positif.',
  'is_natural_no_zero' => 'Field {field} hanya boleh berisi angka lebih besar dari nol.',
  'greater_than_field' => 'Field {field} harus lebih besar dari field {param}.',
  'greater_than_equal_to_field' => 'Field {field} harus lebih besar atau sama dengan field {param}.',
  'less_than_field' => 'Field {field} harus lebih kecil dari field {param}.',
  'less_than_equal_to_field' => 'Field {field} harus lebih kecil atau sama dengan field {param}.',

  // Khusus string / format
  'valid_date' => 'Field {field} harus berisi tanggal yang valid.',
  'valid_json' => 'Field {field} harus berisi JSON yang valid.',
  'regex_match' => 'Field {field} tidak sesuai format yang benar.',

  // Database
  'is_unique' => 'Field {field} sudah digunakan.',
  'db_unique' => 'Field {field} sudah ada di database.',
  'db_exists' => 'Field {field} tidak ditemukan di database.',

  // File upload
  'uploaded' => 'Field {field} wajib diupload.',
  'max_size' => 'File {field} terlalu besar. Maksimal {param} KB.',
  'max_dims' => 'File {field} bukan gambar dengan dimensi yang sesuai.',
  'mime_in' => 'File {field} harus bertipe: {param}.',
  'ext_in' => 'File {field} harus memiliki ekstensi: {param}.',
  'is_image' => 'File {field} harus berupa gambar yang valid.',
];
