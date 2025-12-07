<?php
// includes/navbar.php
?>
<header class="sticky top-0 z-50 animate-slide-up">
  <nav class="glass border-b border-white/20 shadow-soft backdrop-blur-xl bg-white/90 supports-backdrop-blur:bg-white/90">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 md:h-20 items-center justify-between">
        <!-- Logo/Brand -->
        <a href="<?php echo BASE_URL; ?>/index.php" class="flex items-center gap-3 group">
          <div class="relative">
            <div class="absolute -inset-3 bg-gradient-to-r from-brand-500 to-purple-500 rounded-2xl opacity-0 group-hover:opacity-20 blur transition-opacity duration-300"></div>
            <span class="relative inline-flex h-10 w-10 md:h-12 md:w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-500/30 transform group-hover:scale-105 transition-all duration-300">
              <i class="fas fa-calendar-alt text-sm md:text-base"></i>
            </span>
          </div>
          <div class="flex flex-col">
            <span class="text-lg sm:text-xl md:text-2xl font-bold bg-gradient-to-r from-gray-900 to-brand-700 bg-clip-text text-transparent">Event Management</span>
            <span class="text-xs text-gray-500 hidden sm:block">Connect • Create • Celebrate</span>
          </div>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center gap-1">
          <div class="flex items-center gap-1 bg-white/50 rounded-2xl p-1 border border-gray-200/50">
            <a href="<?php echo BASE_URL; ?>/index.php" 
               class="relative px-4 py-2.5 text-gray-700 hover:text-brand-600 rounded-xl transition-all duration-200 group/nav">
              <i class="fas fa-home mr-2"></i>
              <span>Home</span>
              <span class="absolute bottom-1 left-4 right-4 h-0.5 bg-gradient-to-r from-brand-500 to-purple-500 transform scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-300"></span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/events.php" 
               class="relative px-4 py-2.5 text-gray-700 hover:text-brand-600 rounded-xl transition-all duration-200 group/nav">
              <i class="fas fa-calendar-week mr-2"></i>
              <span>Events</span>
              <span class="absolute bottom-1 left-4 right-4 h-0.5 bg-gradient-to-r from-brand-500 to-purple-500 transform scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-300"></span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/about.php" 
               class="relative px-4 py-2.5 text-gray-700 hover:text-brand-600 rounded-xl transition-all duration-200 group/nav">
              <i class="fas fa-info-circle mr-2"></i>
              <span>About</span>
              <span class="absolute bottom-1 left-4 right-4 h-0.5 bg-gradient-to-r from-brand-500 to-purple-500 transform scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-300"></span>
            </a>
            
            <a href="<?php echo BASE_URL; ?>/contact.php" 
               class="relative px-4 py-2.5 text-gray-700 hover:text-brand-600 rounded-xl transition-all duration-200 group/nav">
              <i class="fas fa-envelope mr-2"></i>
              <span>Contact</span>
              <span class="absolute bottom-1 left-4 right-4 h-0.5 bg-gradient-to-r from-brand-500 to-purple-500 transform scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-300"></span>
            </a>
            
            <?php if (is_logged_in()): ?>
              <div class="relative group/dropdown">
                <button class="flex items-center px-4 py-2.5 text-gray-700 hover:text-brand-600 rounded-xl transition-all duration-200">
                  <i class="fas fa-user-circle mr-2"></i>
                  <span>Account</span>
                  <i class="fas fa-chevron-down ml-2 text-xs transition-transform duration-200 group-hover/dropdown:rotate-180"></i>
                </button>
                <div class="absolute top-full right-0 mt-2 w-48 opacity-0 invisible group-hover/dropdown:opacity-100 group-hover/dropdown:visible transition-all duration-200 transform translate-y-2 group-hover/dropdown:translate-y-0">
                  <div class="glass-dark rounded-xl p-2 shadow-float border border-white/10">
                    <a href="<?php echo BASE_URL; ?>/user/my-events.php" 
                       class="flex items-center px-3 py-2.5 text-gray-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 mb-1">
                      <i class="fas fa-calendar-check mr-3"></i>
                      <span>My Events</span>
                    </a>
                    <?php if (is_admin()): ?>
                      <a href="<?php echo BASE_URL; ?>/admin/dashboard.php" 
                         class="flex items-center px-3 py-2.5 text-gray-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 mb-1">
                        <i class="fas fa-crown mr-3 text-amber-400"></i>
                        <span>Admin Panel</span>
                      </a>
                    <?php endif; ?>
                    <div class="border-t border-white/10 my-2"></div>
                    <a href="<?php echo BASE_URL; ?>/logout.php" 
                       class="flex items-center px-3 py-2.5 text-rose-300 hover:text-rose-100 hover:bg-rose-500/20 rounded-lg transition-all duration-200">
                      <i class="fas fa-sign-out-alt mr-3"></i>
                      <span>Logout</span>
                    </a>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <div class="flex items-center gap-2 ml-2">
                <a href="<?php echo BASE_URL; ?>/login.php" 
                   class="px-4 py-2.5 text-gray-700 hover:text-brand-600 hover:bg-white/80 rounded-xl transition-all duration-200">
                  <i class="fas fa-sign-in-alt mr-2"></i>
                  <span>Login</span>
                </a>
                <a href="<?php echo BASE_URL; ?>/register.php" 
                   class="px-4 py-2.5 bg-gradient-to-r from-brand-500 to-purple-500 text-white rounded-xl shadow-lg hover:shadow-xl hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 group/register">
                  <i class="fas fa-user-plus mr-2"></i>
                  <span>Register</span>
                  <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-600 to-purple-600 opacity-0 group-hover/register:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>
              </div>
            <?php endif; ?>
          </div>
          
          <!-- Theme Toggle (Optional) -->
          <button class="ml-4 p-2.5 rounded-xl bg-white/50 border border-gray-200/50 text-gray-600 hover:text-brand-600 hover:bg-white/80 transition-all duration-200" 
                  id="theme-toggle" 
                  aria-label="Toggle theme">
            <i class="fas fa-sun text-lg"></i>
          </button>
        </div>

        <!-- Mobile menu button -->
        <button class="md:hidden p-2.5 rounded-xl bg-white/50 border border-gray-200/50 text-gray-700 hover:text-brand-600 hover:bg-white/80 transition-all duration-200"
                id="mobile-menu-button"
                aria-label="Open menu">
          <i class="fas fa-bars text-lg"></i>
        </button>
      </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden hidden glass border-t border-white/20" id="mobile-menu">
      <div class="container mx-auto px-4 py-4">
        <div class="space-y-1">
          <a href="<?php echo BASE_URL; ?>/index.php" 
             class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
            <i class="fas fa-home w-6 mr-3"></i>
            <span>Home</span>
          </a>
          <a href="<?php echo BASE_URL; ?>/events.php" 
             class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
            <i class="fas fa-calendar-week w-6 mr-3"></i>
            <span>Browse Events</span>
          </a>
          <a href="<?php echo BASE_URL; ?>/about.php" 
             class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
            <i class="fas fa-info-circle w-6 mr-3"></i>
            <span>About</span>
          </a>
          <a href="<?php echo BASE_URL; ?>/contact.php" 
             class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
            <i class="fas fa-envelope w-6 mr-3"></i>
            <span>Contact</span>
          </a>
          
          <?php if (is_logged_in()): ?>
            <div class="border-t border-gray-200/50 my-2 pt-2">
              <a href="<?php echo BASE_URL; ?>/user/my-events.php" 
                 class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
                <i class="fas fa-calendar-check w-6 mr-3"></i>
                <span>My Events</span>
              </a>
              <?php if (is_admin()): ?>
                <a href="<?php echo BASE_URL; ?>/admin/dashboard.php" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
                  <i class="fas fa-crown w-6 mr-3 text-amber-500"></i>
                  <span>Admin Panel</span>
                </a>
              <?php endif; ?>
              <a href="<?php echo BASE_URL; ?>/logout.php" 
                 class="flex items-center px-4 py-3 text-rose-600 hover:text-rose-700 hover:bg-rose-50 rounded-xl transition-all duration-200 mt-2">
                <i class="fas fa-sign-out-alt w-6 mr-3"></i>
                <span>Logout</span>
              </a>
            </div>
          <?php else: ?>
            <div class="border-t border-gray-200/50 my-2 pt-2 space-y-2">
              <a href="<?php echo BASE_URL; ?>/login.php" 
                 class="flex items-center px-4 py-3 text-gray-700 hover:text-brand-600 hover:bg-white/50 rounded-xl transition-all duration-200">
                <i class="fas fa-sign-in-alt w-6 mr-3"></i>
                <span>Login</span>
              </a>
              <a href="<?php echo BASE_URL; ?>/register.php" 
                 class="flex items-center px-4 py-3 bg-gradient-to-r from-brand-500 to-purple-500 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 justify-center">
                <i class="fas fa-user-plus w-6 mr-3"></i>
                <span>Create Account</span>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</header>

<script>
  // Mobile menu toggle
  document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    const icon = this.querySelector('i');
    
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
      menu.classList.add('animate-slide-in-right');
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-times');
    } else {
      menu.classList.add('hidden');
      icon.classList.remove('fa-times');
      icon.classList.add('fa-bars');
    }
  });

  // Theme toggle functionality (optional - can be enhanced)
  document.getElementById('theme-toggle').addEventListener('click', function() {
    const icon = this.querySelector('i');
    const html = document.documentElement;
    
    if (html.classList.contains('dark')) {
      html.classList.remove('dark');
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
      localStorage.setItem('theme', 'light');
    } else {
      html.classList.add('dark');
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
      localStorage.setItem('theme', 'dark');
    }
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobile-menu');
    const button = document.getElementById('mobile-menu-button');
    
    if (!menu.classList.contains('hidden') && 
        !menu.contains(event.target) && 
        !button.contains(event.target)) {
      menu.classList.add('hidden');
      button.querySelector('i').classList.remove('fa-times');
      button.querySelector('i').classList.add('fa-bars');
    }
  });

  // Check for saved theme preference
  if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
    document.getElementById('theme-toggle').querySelector('i').classList.remove('fa-sun');
    document.getElementById('theme-toggle').querySelector('i').classList.add('fa-moon');
  }
</script>