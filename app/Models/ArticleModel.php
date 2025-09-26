<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
  protected $table = 'articles';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'user_id',
    'title',
    'slug',
    'content',
    'thumbnail',
    'status',
    'category',
    'excerpt',
    'views',
    'featured',
  ];

  // Timestamps
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getData($filters = [])
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');

    // Filter berdasarkan kategori
    if (!empty($filters['status'])) {
      $builder->where('a.status', $filters['status']);
    }
    if (!empty($filters['category'])) {
      $builder->where('a.category', $filters['category']);
    }

    $builder->orderBy('a.created_at', 'DESC');

    return $builder->get()->getResultArray();
  }
  /**
   * Mendapatkan data artikel untuk halaman landing
   */
  public function getDataForLanding($limit = 6, $offset = 0, $filters = [])
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');
    $builder->where('a.status', 'published');

    // Filter berdasarkan pencarian
    if (!empty($filters['search'])) {
      $builder->groupStart();
      $builder->like('a.title', $filters['search']);
      $builder->orLike('a.content', $filters['search']);
      $builder->orLike('a.excerpt', $filters['search']);
      $builder->groupEnd();
    }

    // Filter berdasarkan kategori
    if (!empty($filters['category'])) {
      $builder->where('a.category', $filters['category']);
    }

    // Filter berdasarkan periode
    if (!empty($filters['period'])) {
      switch ($filters['period']) {
        case 'today':
          $builder->where('DATE(a.created_at)', date('Y-m-d'));
          break;
        case 'week':
          $builder->where('a.created_at >=', date('Y-m-d', strtotime('-7 days')));
          break;
        case 'month':
          $builder->where('a.created_at >=', date('Y-m-d', strtotime('-30 days')));
          break;
        case 'quarter':
          $builder->where('a.created_at >=', date('Y-m-d', strtotime('-90 days')));
          break;
      }
    }

    // Sorting
    $sort = $filters['sort'] ?? 'latest';
    switch ($sort) {
      case 'popular':
        $builder->orderBy('a.views', 'DESC');
        break;
      case 'alphabetical':
        $builder->orderBy('a.title', 'ASC');
        break;
      case 'reverse_alphabetical':
        $builder->orderBy('a.title', 'DESC');
        break;
      case 'latest':
      default:
        $builder->orderBy('a.created_at', 'DESC');
        break;
    }

    $builder->limit($limit, $offset);

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan data kategori artikel
   */
  public function getCategories()
  {
    $builder = $this->db->table($this->table);
    $builder->select('category, COUNT(*) as article_count');
    $builder->where('status', 'published');
    $builder->where('category IS NOT NULL');
    $builder->where('category !=', '');
    $builder->groupBy('category');
    $builder->orderBy('article_count', 'DESC');

    return $builder->get()->getResultArray();
  }

  public function getAllCategories()
  {
    $builder = $this->db->table($this->table);
    $builder->select('category');
    $builder->where('category IS NOT NULL');
    $builder->where('category !=', '');
    $builder->groupBy('category');
    $builder->orderBy('category', 'ASC');

    $res = $builder->get()->getResultArray();

    return array_column($res, 'category');
  }

  /**
   * Mendapatkan artikel populer
   */
  public function getPopularArticles($limit = 5)
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');
    $builder->where('a.status', 'published');
    $builder->orderBy('a.views', 'DESC');
    $builder->limit($limit);

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan artikel terbaru
   */
  public function getLatestArticles($limit = 5)
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');
    $builder->where('a.status', 'published');
    $builder->orderBy('a.created_at', 'DESC');
    $builder->limit($limit);

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan statistik artikel
   */
  public function getArticleStats()
  {
    $builder = $this->db->table($this->table);
    $builder->select('
      COUNT(*) as total_articles,
      AVG(views) as average_views,
      MAX(views) as max_views,
      SUM(views) as total_views
    ');
    $builder->where('status', 'published');

    return $builder->get()->getRowArray();
  }

  /**
   * Meningkatkan view artikel
   */
  public function incrementViews($id)
  {
    $builder = $this->db->table($this->table);
    $builder->set('views', 'views + 1', false);
    $builder->where('id', $id);
    return $builder->update();
  }

  /**
   * Mendapatkan artikel berdasarkan slug
   */
  public function getArticleBySlug($slug)
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');
    $builder->where('a.slug', $slug);
    $builder->where('a.status', 'published');

    return $builder->get()->getRowArray();
  }

  public function getArticleById($id)
  {
    $builder = $this->db->table($this->table . ' a');
    $builder->select('a.*, u.name as author_name');
    $builder->join('users u', 'a.user_id = u.id', 'left');
    $builder->where('a.id', $id);

    return $builder->get()->getRowArray();
  }
}


