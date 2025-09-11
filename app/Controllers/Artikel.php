<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Artikel extends BaseController
{
  protected $ArticleModel;

  public function __construct()
  {
    $this->ArticleModel = new ArticleModel();
  }

  public function index()
  {
    // Ambil filter dari request
    $filters = [
      'search' => $this->request->getGet('search'),
      'category' => $this->request->getGet('category'),
      'period' => $this->request->getGet('period'),
      'sort' => $this->request->getGet('sort') ?? 'latest'
    ];

    // Ambil data artikel
    $articles = $this->ArticleModel->getDataForLanding(6, 0, $filters);

    // Ambil data kategori
    $categories = $this->ArticleModel->getCategories();

    // Ambil artikel populer
    $popularArticles = $this->ArticleModel->getPopularArticles(5);

    // Ambil statistik artikel
    $stats = $this->ArticleModel->getArticleStats();

    $data = [
      'articles' => $articles,
      'categories' => $categories,
      'popularArticles' => $popularArticles,
      'stats' => $stats,
      'filters' => $filters
    ];

    return $this->template->displayLanding('artikel', $data);
  }

  public function get_ajax()
  {
    // Ambil filter dari request
    $filters = [
      'search' => $this->request->getGet('search'),
      'category' => $this->request->getGet('category'),
      'period' => $this->request->getGet('period'),
      'sort' => $this->request->getGet('sort') ?? 'latest'
    ];

    $page = $this->request->getGet('page') ?? 1;
    $limit = 6;
    $offset = ($page - 1) * $limit;

    // Ambil data artikel
    $articles = $this->ArticleModel->getDataForLanding($limit, $offset, $filters);

    return $this->response->setJSON([
      'success' => true,
      'data' => $articles,
      'page' => $page,
      'has_more' => count($articles) == $limit
    ]);
  }

  public function search()
  {
    // Ambil filter dari request
    $filters = [
      'search' => $this->request->getGet('search'),
      'category' => $this->request->getGet('category'),
      'period' => $this->request->getGet('period'),
      'sort' => $this->request->getGet('sort') ?? 'latest'
    ];

    // Ambil data artikel dengan filter
    $articles = $this->ArticleModel->getDataForLanding(12, 0, $filters);

    // Ambil data kategori
    $categories = $this->ArticleModel->getCategories();

    // Ambil artikel populer
    $popularArticles = $this->ArticleModel->getPopularArticles(5);

    // Ambil statistik artikel
    $stats = $this->ArticleModel->getArticleStats();

    $data = [
      'articles' => $articles,
      'categories' => $categories,
      'popularArticles' => $popularArticles,
      'stats' => $stats,
      'filters' => $filters,
      'search_results' => true
    ];

    return $this->template->displayLanding('artikel', $data);
  }

  public function detail($slug)
  {
    // Ambil artikel berdasarkan slug
    $article = $this->ArticleModel->getArticleBySlug($slug);

    if (!$article) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
    }

    // Tingkatkan view artikel
    $this->ArticleModel->incrementViews($article['id']);

    // Ambil artikel terkait
    $relatedArticles = $this->ArticleModel->getDataForLanding(3, 0, [
      'category' => $article['category']
    ]);

    // Ambil artikel populer
    $popularArticles = $this->ArticleModel->getPopularArticles(5);

    $data = [
      'article' => $article,
      'relatedArticles' => $relatedArticles,
      'popularArticles' => $popularArticles
    ];

    return $this->template->displayLanding('artikel_detail', $data);
  }
}
