<?php
// includes/footer.php
?>
      </div>
    </main>

    <!-- Optional: Add a CTA section before footer if you want -->
    <?php if (!isset($hide_cta) || !$hide_cta): ?>
    <section class="bg-gradient-to-r from-brand-50 to-indigo-50 border-t border-brand-100">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-2xl font-bold text-gray-900 mb-4">Ready to Create Amazing Events?</h2>
          <p class="text-gray-600 mb-6">Join thousands of event organizers and attendees.</p>
          <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="<?php echo BASE_URL; ?>/events.php" 
               class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl shadow-lg hover:shadow-xl hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 group">
              <i class="fas fa-calendar-plus mr-2"></i>
              <span>Browse Events</span>
              <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <?php if (!is_logged_in()): ?>
              <a href="<?php echo BASE_URL; ?>/register.php" 
                 class="inline-flex items-center justify-center px-6 py-3 bg-white text-brand-600 border border-brand-300 rounded-xl hover:bg-brand-50 transition-all duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                <span>Join Free</span>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <footer class="relative bg-gradient-to-b from-white to-gray-50 border-t border-gray-200">
      <!-- Decorative gradient line -->
      <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-400/30 to-transparent"></div>
      
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row items-start justify-between gap-8">
          <!-- Brand/Logo Section -->
          <div class="md:w-1/3">
            <a href="<?php echo BASE_URL; ?>/index.php" class="inline-flex items-center gap-3 mb-4 group">
              <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-500/30 transform group-hover:scale-105 transition-transform duration-300">
                <i class="fas fa-calendar-alt"></i>
              </span>
              <div>
                <span class="text-xl font-bold text-gray-900">Event Management</span>
                <p class="text-sm text-gray-600 mt-1">Creating seamless event experiences</p>
              </div>
            </a>
            <p class="text-gray-600 text-sm mb-6">Platform for organizers and attendees to connect and create memorable events.</p>
            
            <!-- Social Media -->
            <div class="flex gap-3">
              <a href="https://twitter.com" target="_blank" 
                 class="h-10 w-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-500 hover:border-brand-300 hover:shadow-sm transition-all duration-300">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://facebook.com" target="_blank" 
                 class="h-10 w-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:border-brand-300 hover:shadow-sm transition-all duration-300">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://instagram.com" target="_blank" 
                 class="h-10 w-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-pink-600 hover:border-pink-300 hover:shadow-sm transition-all duration-300">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>

          <!-- Links Section -->
          <div class="md:w-2/3 grid grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Quick Links -->
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-link text-brand-500 mr-2 text-sm"></i>
                Quick Links
              </h3>
              <ul class="space-y-2">
                <li><a href="<?php echo BASE_URL; ?>/events.php" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Browse Events</a></li>
                <li><a href="<?php echo BASE_URL; ?>/about.php" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">About Us</a></li>
                <li><a href="<?php echo BASE_URL; ?>/contact.php" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Contact</a></li>
              </ul>
            </div>

            <!-- Legal -->
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-gavel text-brand-500 mr-2 text-sm"></i>
                Legal
              </h3>
              <ul class="space-y-2">
                <li><a href="<?php echo BASE_URL; ?>/terms.php" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Terms of Service</a></li>
                <li><a href="#" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Privacy Policy</a></li>
                <li><a href="#" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Cookie Policy</a></li>
              </ul>
            </div>

            <!-- Support -->
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-headset text-brand-500 mr-2 text-sm"></i>
                Support
              </h3>
              <ul class="space-y-2">
                <li><a href="#" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Help Center</a></li>
                <li><a href="#" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">FAQ</a></li>
                <li><a href="mailto:support@example.com" class="text-gray-600 hover:text-brand-600 transition-colors duration-200">Email Support</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-200 mt-8 pt-8">
          <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <div class="flex items-center gap-2 text-gray-500">
                <i class="fas fa-heart text-rose-500"></i>
                <span class="text-sm">Crafted with care for seamless event experiences</span>
              </div>
            </div>
            
            <div class="flex items-center gap-4 text-sm text-gray-600">
              <a href="<?php echo BASE_URL; ?>/about.php" class="hover:text-brand-600 transition-colors duration-200">About</a>
              <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
              <a href="<?php echo BASE_URL; ?>/contact.php" class="hover:text-brand-600 transition-colors duration-200">Contact</a>
              <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
              <a href="<?php echo BASE_URL; ?>/terms.php" class="hover:text-brand-600 transition-colors duration-200">Terms</a>
            </div>
          </div>
          
          <div class="mt-4 text-center md:text-left">
            <p class="text-sm text-gray-500">
              &copy; <?php echo date('Y'); ?> Event Management System. All rights reserved.
            </p>
          </div>
        </div>
      </div>

      <!-- Back to top button -->
      <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
              class="fixed bottom-6 right-6 h-12 w-12 bg-gradient-to-br from-brand-500 to-purple-500 text-white rounded-xl shadow-lg hover:shadow-xl hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center z-40 opacity-0 invisible transition-opacity duration-300"
              id="back-to-top"
              aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
      </button>

      <script>
        // Back to top button visibility
        window.addEventListener('scroll', function() {
          const backToTop = document.getElementById('back-to-top');
          if (window.scrollY > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
          } else {
            backToTop.classList.remove('opacity-100', 'visible');
            backToTop.classList.add('opacity-0', 'invisible');
          }
        });
      </script>
    </footer>
  </body>
</html>