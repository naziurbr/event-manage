<?php
$title = 'Home';
require_once __DIR__ . '/config/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="relative overflow-hidden">
  <!-- Background elements -->
  <div class="absolute inset-0 -z-10">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-brand-500/10 to-purple-500/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
    <div class="text-center">
      <!-- Badge -->
      <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-brand-500/10 to-purple-500/10 border border-brand-500/20 text-brand-700 font-medium text-sm mb-8 animate-pulse-slow">
        <i class="fas fa-star mr-2 text-brand-500"></i>
        <span>Join thousands of event enthusiasts</span>
      </div>

      <!-- Main headline -->
      <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
        <span class="block text-gray-900">Discover & Book</span>
        <span class="bg-gradient-to-r from-brand-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient-shift">Amazing Events</span>
      </h1>

      <!-- Subtitle -->
      <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-10 leading-relaxed">
        From concerts to conferences, find the perfect events to attend or create unforgettable experiences.
        <span class="block text-lg text-gray-500 mt-2">Simple, fast, and hassle-free booking.</span>
      </p>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
        <a href="<?php echo BASE_URL; ?>/events.php" 
           class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white rounded-2xl shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
          <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 group-hover:from-brand-600 group-hover:to-brand-700 transition-all duration-300"></span>
          <span class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          <span class="relative flex items-center">
            <i class="fas fa-calendar-week mr-3"></i>
            Browse Events
            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
          </span>
        </a>

        <?php if (!is_logged_in()): ?>
          <div class="flex gap-4">
            <a href="<?php echo BASE_URL; ?>/login.php" 
               class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-brand-600 border-2 border-brand-500 rounded-2xl hover:bg-brand-50 hover:border-brand-600 transition-all duration-300">
              <i class="fas fa-sign-in-alt mr-3"></i>
              Login
            </a>
            <a href="<?php echo BASE_URL; ?>/register.php" 
               class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl shadow-lg shadow-purple-500/25 hover:shadow-xl hover:shadow-purple-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
              <i class="fas fa-user-plus mr-3"></i>
              Join Free
            </a>
          </div>
        <?php else: ?>
          <a href="<?php echo BASE_URL; ?>/user/dashboard.php" 
             class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-emerald-500 to-green-600 rounded-2xl shadow-lg shadow-emerald-500/25 hover:shadow-xl hover:shadow-emerald-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Go to Dashboard
          </a>
        <?php endif; ?>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-20">
        <div class="glass p-6 rounded-2xl text-center transform hover:scale-105 transition-transform duration-300">
          <div class="text-3xl md:text-4xl font-bold text-brand-600 mb-2">1,000+</div>
          <div class="text-gray-600">Events Listed</div>
        </div>
        <div class="glass p-6 rounded-2xl text-center transform hover:scale-105 transition-transform duration-300">
          <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">10K+</div>
          <div class="text-gray-600">Happy Attendees</div>
        </div>
        <div class="glass p-6 rounded-2xl text-center transform hover:scale-105 transition-transform duration-300">
          <div class="text-3xl md:text-4xl font-bold text-emerald-600 mb-2">500+</div>
          <div class="text-gray-600">Organizers</div>
        </div>
        <div class="glass p-6 rounded-2xl text-center transform hover:scale-105 transition-transform duration-300">
          <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">24/7</div>
          <div class="text-gray-600">Support</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Wave separator -->
  <div class="absolute bottom-0 left-0 right-0">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-current text-white">
      <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
    </svg>
  </div>
</section>

<!-- Featured Events Section -->
<section class="bg-gradient-to-b from-white to-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Events</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Handpicked events you don't want to miss</p>
    </div>

    <!-- Event cards grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
      <!-- Event Card 1 -->
      <div class="group relative overflow-hidden rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <div class="relative h-64 overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute top-4 right-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-500 to-cyan-600 text-white shadow-lg">
              Music
            </span>
          </div>
          <div class="absolute bottom-4 left-4 right-4">
            <h3 class="text-xl font-bold text-white">Summer Music Festival</h3>
            <p class="text-white/90 text-sm mt-1">Live performances • Outdoor • All ages</p>
          </div>
        </div>
        <div class="p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center text-gray-600">
              <i class="fas fa-calendar-day text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">June 15, 2024</span>
            </div>
            <div class="flex items-center text-gray-600">
              <i class="fas fa-map-marker-alt text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">Central Park</span>
            </div>
          </div>
          <p class="text-gray-600 mb-6">Join us for the biggest music festival of the summer with top artists from around the world.</p>
          <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-gray-900">$49.99</div>
            <a href="<?php echo BASE_URL; ?>/events.php" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
              <span>Book Now</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Event Card 2 -->
      <div class="group relative overflow-hidden rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <div class="relative h-64 overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 to-green-500/20"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute top-4 right-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-emerald-500 to-green-600 text-white shadow-lg">
              Business
            </span>
          </div>
          <div class="absolute bottom-4 left-4 right-4">
            <h3 class="text-xl font-bold text-white">Tech Conference 2024</h3>
            <p class="text-white/90 text-sm mt-1">Networking • Workshops • Innovation</p>
          </div>
        </div>
        <div class="p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center text-gray-600">
              <i class="fas fa-calendar-day text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">July 22, 2024</span>
            </div>
            <div class="flex items-center text-gray-600">
              <i class="fas fa-map-marker-alt text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">Convention Center</span>
            </div>
          </div>
          <p class="text-gray-600 mb-6">Annual technology conference featuring industry leaders and cutting-edge innovations.</p>
          <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-gray-900">$199.99</div>
            <a href="<?php echo BASE_URL; ?>/events.php" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
              <span>Book Now</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Event Card 3 -->
      <div class="group relative overflow-hidden rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <div class="relative h-64 overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 to-orange-500/20"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute top-4 right-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-600 text-white shadow-lg">
              Food
            </span>
          </div>
          <div class="absolute bottom-4 left-4 right-4">
            <h3 class="text-xl font-bold text-white">Food & Wine Festival</h3>
            <p class="text-white/90 text-sm mt-1">Tastings • Chefs • Live Cooking</p>
          </div>
        </div>
        <div class="p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center text-gray-600">
              <i class="fas fa-calendar-day text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">August 10, 2024</span>
            </div>
            <div class="flex items-center text-gray-600">
              <i class="fas fa-map-marker-alt text-brand-500 mr-2"></i>
              <span class="text-sm font-medium">Downtown Plaza</span>
            </div>
          </div>
          <p class="text-gray-600 mb-6">Experience culinary excellence with top chefs and premium wine selections.</p>
          <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-gray-900">$35.00</div>
            <a href="<?php echo BASE_URL; ?>/events.php" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
              <span>Book Now</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- View all events button -->
    <div class="text-center">
      <a href="<?php echo BASE_URL; ?>/events.php" 
         class="inline-flex items-center px-8 py-4 text-lg font-semibold text-brand-600 border-2 border-brand-500 rounded-2xl hover:bg-brand-50 hover:border-brand-600 transition-all duration-300 group">
        <span>View All Events</span>
        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
      </a>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Our Platform?</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Everything you need for perfect event management</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="group p-8 rounded-3xl border-2 border-gray-200 hover:border-brand-500 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-search text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Easy Discovery</h3>
        <p class="text-gray-600">Find events tailored to your interests with our smart filtering and recommendations.</p>
      </div>

      <!-- Feature 2 -->
      <div class="group p-8 rounded-3xl border-2 border-gray-200 hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 text-white shadow-lg shadow-purple-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-ticket-alt text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Instant Booking</h3>
        <p class="text-gray-600">Secure your spot in seconds with our fast, reliable booking system.</p>
      </div>

      <!-- Feature 3 -->
      <div class="group p-8 rounded-3xl border-2 border-gray-200 hover:border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 text-white shadow-lg shadow-emerald-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-shield-alt text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Secure & Reliable</h3>
        <p class="text-gray-600">Your data and payments are protected with enterprise-grade security.</p>
      </div>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="relative overflow-hidden py-20 bg-gradient-to-br from-brand-500 via-purple-500 to-pink-500">
  <div class="absolute inset-0 bg-black/20"></div>
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
  
  <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
    <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">Join thousands of event organizers and attendees creating amazing experiences.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?php echo BASE_URL; ?>/events.php" 
         class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-brand-600 bg-white rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 group">
        <i class="fas fa-calendar-week mr-3"></i>
        <span>Explore Events</span>
        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
      </a>
      <?php if (!is_logged_in()): ?>
        <a href="<?php echo BASE_URL; ?>/register.php" 
           class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-2xl hover:bg-white/10 transition-all duration-300 group">
          <i class="fas fa-user-plus mr-3"></i>
          <span>Create Account</span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>