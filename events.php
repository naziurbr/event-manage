<?php
$title = 'Events';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/header.php';

$db = new Database($pdo);
$eventModel = new Event($db);
$events = $eventModel->allPublished();
?>

<!-- Page Header -->
<section class="relative overflow-hidden bg-gradient-to-br from-brand-500 via-purple-500 to-pink-500 py-16 md:py-24">
  <div class="absolute inset-0 bg-black/20"></div>
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
  
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">Discover Events</h1>
      <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10">Find amazing events happening near you or create your own unforgettable experience.</p>
      
      <!-- Search and Filter Bar -->
      <div class="max-w-3xl mx-auto">
        <div class="glass p-4 rounded-2xl shadow-2xl">
          <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       name="search" 
                       placeholder="Search events by title, venue, or description..." 
                       class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all duration-300"
                       value="<?php echo isset($_GET['search']) ? e($_GET['search']) : ''; ?>">
              </div>
            </div>
            
            <div class="md:w-48">
              <div class="relative">
                <select name="category" 
                        class="w-full pl-3 pr-10 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent appearance-none bg-white cursor-pointer">
                  <option value="">All Categories</option>
                  <option value="music" <?php echo isset($_GET['category']) && $_GET['category'] === 'music' ? 'selected' : ''; ?>>Music</option>
                  <option value="business" <?php echo isset($_GET['category']) && $_GET['category'] === 'business' ? 'selected' : ''; ?>>Business</option>
                  <option value="food" <?php echo isset($_GET['category']) && $_GET['category'] === 'food' ? 'selected' : ''; ?>>Food & Drink</option>
                  <option value="sports" <?php echo isset($_GET['category']) && $_GET['category'] === 'sports' ? 'selected' : ''; ?>>Sports</option>
                  <option value="arts" <?php echo isset($_GET['category']) && $_GET['category'] === 'arts' ? 'selected' : ''; ?>>Arts & Culture</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <i class="fas fa-chevron-down text-gray-400"></i>
                </div>
              </div>
            </div>
            
            <div class="md:w-40">
              <div class="relative">
                <input type="date" 
                       name="date" 
                       class="w-full px-3 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent"
                       value="<?php echo isset($_GET['date']) ? e($_GET['date']) : ''; ?>">
              </div>
            </div>
            
            <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center">
              <i class="fas fa-filter mr-2"></i>
              Filter
            </button>
            
            <button type="button" 
                    onclick="window.location.href='<?php echo BASE_URL; ?>/events.php'"
                    class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition-all duration-300">
              <i class="fas fa-redo mr-2"></i>
              Reset
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Events Grid Section -->
<section class="py-16 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header Stats -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12">
      <div>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">All Events</h2>
        <p class="text-gray-600 mt-2">Discover events that match your interests</p>
      </div>
      
      <div class="flex items-center gap-4 mt-4 md:mt-0">
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600">View:</span>
          <button class="p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors duration-300" id="grid-view">
            <i class="fas fa-th-large"></i>
          </button>
          <button class="p-2 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-700 transition-colors duration-300" id="list-view">
            <i class="fas fa-list"></i>
          </button>
        </div>
        
        <div class="relative">
          <select class="pl-3 pr-10 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent appearance-none bg-white cursor-pointer text-sm">
            <option>Sort by: Date</option>
            <option>Sort by: Price</option>
            <option>Sort by: Popularity</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <i class="fas fa-sort text-gray-400 text-sm"></i>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Events Grid/List -->
    <div id="events-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php if (empty($events)): ?>
        <!-- No events message -->
        <div class="col-span-full text-center py-16">
          <div class="inline-flex h-20 w-20 items-center justify-center rounded-full bg-gray-100 mb-6">
            <i class="fas fa-calendar-times text-gray-400 text-3xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">No events found</h3>
          <p class="text-gray-600 mb-8 max-w-md mx-auto">There are currently no events available. Check back later or create your own event!</p>
          <?php if (is_logged_in()): ?>
            <a href="<?php echo BASE_URL; ?>/create-event.php" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
              <i class="fas fa-plus mr-2"></i>
              Create Event
            </a>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <?php foreach ($events as $e): ?>
          <?php
          // Determine badge color based on status
          $badgeColors = [
            'published' => 'from-emerald-500 to-green-600',
            'draft' => 'from-amber-500 to-orange-600',
            'cancelled' => 'from-rose-500 to-red-600',
            'sold_out' => 'from-purple-500 to-pink-600'
          ];
          $badgeColor = $badgeColors[$e['status']] ?? 'from-gray-500 to-gray-600';
          
          // Format date
          $eventDate = date('M j, Y', strtotime($e['event_date']));
          $eventTime = date('g:i A', strtotime($e['event_date']));
          
          // Determine category icon
          $categoryIcons = [
            'music' => 'fas fa-music',
            'business' => 'fas fa-briefcase',
            'food' => 'fas fa-utensils',
            'sports' => 'fas fa-running',
            'arts' => 'fas fa-palette'
          ];
          $categoryIcon = $categoryIcons[$e['category']] ?? 'fas fa-calendar';
          ?>
          
          <!-- Event Card -->
          <div class="group relative overflow-hidden rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200">
            <!-- Status Badge -->
            <div class="absolute top-4 right-4 z-10">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r <?php echo $badgeColor; ?> text-white shadow-lg">
                <?php echo ucfirst(str_replace('_', ' ', $e['status'])); ?>
              </span>
            </div>
            
            <!-- Card Image/Header -->
            <div class="relative h-56 overflow-hidden">
              <!-- Placeholder image with gradient -->
              <div class="absolute inset-0 bg-gradient-to-br from-brand-500/20 to-purple-500/20"></div>
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
              
              <!-- Category Icon -->
              <div class="absolute top-4 left-4">
                <div class="h-12 w-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                  <i class="<?php echo $categoryIcon; ?> text-white text-xl"></i>
                </div>
              </div>
              
              <!-- Event Info Overlay -->
              <div class="absolute bottom-4 left-4 right-4">
                <h3 class="text-xl font-bold text-white line-clamp-1"><?php echo e($e['title']); ?></h3>
                <div class="flex items-center text-white/90 text-sm mt-2">
                  <i class="fas fa-map-marker-alt mr-2"></i>
                  <span class="line-clamp-1"><?php echo e($e['venue']); ?></span>
                </div>
              </div>
            </div>
            
            <!-- Card Content -->
            <div class="p-6">
              <!-- Date and Time -->
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center text-gray-700">
                  <div class="flex items-center">
                    <i class="fas fa-calendar-day text-brand-500 mr-2"></i>
                    <span class="font-medium"><?php echo $eventDate; ?></span>
                  </div>
                  <div class="mx-4 text-gray-300">|</div>
                  <div class="flex items-center">
                    <i class="fas fa-clock text-brand-500 mr-2"></i>
                    <span class="font-medium"><?php echo $eventTime; ?></span>
                  </div>
                </div>
              </div>
              
              <!-- Short Description -->
              <?php if (!empty($e['short_description'])): ?>
                <p class="text-gray-600 mb-6 line-clamp-2"><?php echo e($e['short_description']); ?></p>
              <?php endif; ?>
              
              <!-- Tags/Categories -->
              <?php if (!empty($e['category'])): ?>
                <div class="flex flex-wrap gap-2 mb-6">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-brand-100 text-brand-800">
                    <i class="fas fa-tag mr-1 text-xs"></i>
                    <?php echo ucfirst(e($e['category'])); ?>
                  </span>
                  <?php if (!empty($e['tags'])): ?>
                    <?php 
                    $tags = explode(',', $e['tags']);
                    foreach (array_slice($tags, 0, 2) as $tag):
                    ?>
                      <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        <?php echo e(trim($tag)); ?>
                      </span>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              
              <!-- Card Footer -->
              <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <!-- Price -->
                <?php if (isset($e['price']) && $e['price'] > 0): ?>
                  <div class="text-2xl font-bold text-gray-900">$<?php echo number_format($e['price'], 2); ?></div>
                <?php else: ?>
                  <div class="text-2xl font-bold text-emerald-600">FREE</div>
                <?php endif; ?>
                
                <!-- Action Buttons -->
                <div class="flex gap-2">
                  <!-- Quick View -->
                  <button class="p-2 rounded-lg text-gray-400 hover:text-brand-600 hover:bg-brand-50 transition-colors duration-300"
                          onclick="quickViewEvent(<?php echo $e['id']; ?>)"
                          title="Quick view">
                    <i class="fas fa-eye"></i>
                  </button>
                  
                  <!-- Save/Bookmark -->
                  <button class="p-2 rounded-lg text-gray-400 hover:text-rose-600 hover:bg-rose-50 transition-colors duration-300"
                          title="Save event">
                    <i class="far fa-bookmark"></i>
                  </button>
                  
                  <!-- Main Action Button -->
                  <a href="<?php echo BASE_URL; ?>/event-details.php?slug=<?php echo e($e['slug']); ?>" 
                     class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 group">
                    <span>Details</span>
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    
    <!-- Pagination (if needed) -->
    <?php if (!empty($events) && count($events) >= 9): ?>
      <div class="mt-12 flex justify-center">
        <nav class="flex items-center gap-2">
          <button class="h-10 w-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-left"></i>
          </button>
          
          <button class="h-10 w-10 rounded-xl flex items-center justify-center bg-gradient-to-r from-brand-500 to-brand-600 text-white shadow-md">1</button>
          
          <?php for ($i = 2; $i <= 4; $i++): ?>
            <button class="h-10 w-10 rounded-xl flex items-center justify-center text-gray-700 hover:text-brand-600 hover:bg-gray-100 transition-colors duration-300">
              <?php echo $i; ?>
            </button>
          <?php endfor; ?>
          
          <span class="px-2 text-gray-400">...</span>
          
          <button class="h-10 w-10 rounded-xl flex items-center justify-center text-gray-700 hover:text-brand-600 hover:bg-gray-100 transition-colors duration-300">
            10
          </button>
          
          <button class="h-10 w-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors duration-300">
            <i class="fas fa-chevron-right"></i>
          </button>
        </nav>
      </div>
    <?php endif; ?>
    
    <!-- Create Event CTA -->
    <?php if (is_logged_in()): ?>
      <div class="mt-16 text-center">
        <div class="glass p-8 rounded-3xl max-w-2xl mx-auto">
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Ready to host your own event?</h3>
          <p class="text-gray-600 mb-6">Share your passion with the world and connect with like-minded people.</p>
          <a href="<?php echo BASE_URL; ?>/create-event.php" 
             class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-2xl shadow-lg hover:shadow-xl hover:shadow-brand-500/30 transform hover:-translate-y-1 transition-all duration-300 group">
            <i class="fas fa-plus mr-3"></i>
            <span class="text-lg font-semibold">Create New Event</span>
            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Quick View Modal (hidden by default) -->
<div id="quickViewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen px-4">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closeQuickView()"></div>
    
    <!-- Modal Content -->
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full mx-auto overflow-hidden">
      <!-- Modal content will be loaded via JavaScript -->
    </div>
  </div>
</div>

<script>
  // View toggle functionality
  document.getElementById('grid-view').addEventListener('click', function() {
    document.getElementById('events-container').className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8';
    this.classList.add('bg-gray-100', 'text-gray-700');
    this.classList.remove('text-gray-400');
    document.getElementById('list-view').classList.remove('bg-gray-100', 'text-gray-700');
    document.getElementById('list-view').classList.add('text-gray-400');
  });
  
  document.getElementById('list-view').addEventListener('click', function() {
    document.getElementById('events-container').className = 'grid grid-cols-1 gap-6';
    this.classList.add('bg-gray-100', 'text-gray-700');
    this.classList.remove('text-gray-400');
    document.getElementById('grid-view').classList.remove('bg-gray-100', 'text-gray-700');
    document.getElementById('grid-view').classList.add('text-gray-400');
  });
  
  // Quick view modal functions
  function quickViewEvent(eventId) {
    // In a real application, you would fetch event details via AJAX
    const modal = document.getElementById('quickViewModal');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  
  function closeQuickView() {
    const modal = document.getElementById('quickViewModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
  
  // Close modal on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeQuickView();
  });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>