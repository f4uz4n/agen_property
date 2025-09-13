<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\ContactModel;
use App\Models\CategoryModel;
use App\Models\PropertyModel;
use App\Controllers\BaseController;

class Sewa extends BaseController
{
  protected $articleModel;
  protected $contactModel;
  protected $PropertyModel;
  protected $CategoryModel;

  public function __construct()
  {
    $this->articleModel = new ArticleModel();
    $this->contactModel = new ContactModel();
    $this->PropertyModel = new PropertyModel();
    $this->CategoryModel = new CategoryModel();
  }

  public function index()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    // Ambil data properti untuk disewakan
    $properties = $this->PropertyModel->getDataForRental(6, 0, $filters);

    // Ambil data kategori untuk filter
    $categories = $this->PropertyModel->getCategoriesForRentalFilter();

    // Ambil statistik properti sewa
    $stats = $this->PropertyModel->getRentalStats();
    $articles = $this->articleModel->getDataForLanding(3, 0, []);

    $data = [
      'contact' => $this->contactModel->getData(),
      'properties' => $properties,
      'categories' => $categories,
      'stats' => $stats,
      'filters' => $filters,
      'articles' => $articles,
      'page' => 1
    ];

    return $this->template->displayLanding('sewa', $data);
  }

  public function get_ajax()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    $page = $this->request->getGet('page') ?? 1;
    $limit = 6;
    $offset = ($page - 1) * $limit;

    // Ambil data properti untuk disewakan
    $properties = $this->PropertyModel->getDataForRental($limit, $offset, $filters);

    return $this->response->setJSON([
      'success' => true,
      'data' => $properties,
      'page' => $page,
      'has_more' => count($properties) == $limit
    ]);
  }

  public function search()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    // Ambil data properti untuk disewakan dengan filter
    $properties = $this->PropertyModel->getDataForRental(12, 0, $filters);

    // Ambil data kategori untuk filter
    $categories = $this->PropertyModel->getCategoriesForRentalFilter();

    $data = [
      'contact' => $this->contactModel->getData(),
      'properties' => $properties,
      'categories' => $categories,
      'filters' => $filters,
      'search_results' => true
    ];

    return $this->template->displayLanding('sewa', $data);
  }
}
