<?php
$title = 'Contact';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF token.');
        redirect(BASE_URL . '/contact.php');
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        flash('error', 'Name, email, and message are required.');
        redirect(BASE_URL . '/contact.php');
    }

    $db = new Database(); // uses internal PDO from db.php
    $db->insert(
        'INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())',
        [$name, $email, $subject, $message]
    );

    flash('success', 'Message sent. We will contact you soon.');
    redirect(BASE_URL . '/contact.php');
}
?>

<!-- Contact Page Header -->
<section class="relative overflow-hidden bg-gradient-to-br from-brand-500 via-purple-500 to-pink-500 py-16 md:py-20">
  <div class="absolute inset-0 bg-black/20"></div>
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
  
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">Get in Touch</h1>
    <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10">Have questions? We're here to help. Send us a message and we'll respond as soon as possible.</p>
    
    <!-- Contact Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
      <div class="glass p-4 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <i class="fas fa-clock text-white text-2xl mb-2"></i>
        <div class="text-white font-bold">24h Response</div>
      </div>
      <div class="glass p-4 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <i class="fas fa-headset text-white text-2xl mb-2"></i>
        <div class="text-white font-bold">Support 24/7</div>
      </div>
      <div class="glass p-4 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <i class="fas fa-check-circle text-white text-2xl mb-2"></i>
        <div class="text-white font-bold">99% Satisfaction</div>
      </div>
      <div class="glass p-4 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <i class="fas fa-users text-white text-2xl mb-2"></i>
        <div class="text-white font-bold">Dedicated Team</div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="py-16 md:py-20 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
      <!-- Contact Information -->
      <div class="lg:col-span-1">
        <div class="sticky top-24">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Contact Information</h2>
          
          <!-- Contact Cards -->
          <div class="space-y-6">
            <!-- Email -->
            <div class="group p-6 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-xl hover:border-brand-500 transition-all duration-500 transform hover:-translate-y-1">
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 h-14 w-14 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white shadow-lg shadow-brand-500/30 group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-envelope text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Us</h3>
                  <p class="text-gray-600 mb-3">Send us an email anytime</p>
                  <a href="mailto:support@eventmanagement.com" class="text-brand-600 hover:text-brand-700 font-medium inline-flex items-center group/link">
                    <span>support@eventmanagement.com</span>
                    <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Phone -->
            <div class="group p-6 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-xl hover:border-purple-500 transition-all duration-500 transform hover:-translate-y-1">
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 h-14 w-14 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-phone text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-gray-900 mb-2">Call Us</h3>
                  <p class="text-gray-600 mb-3">Mon-Fri from 9am to 6pm</p>
                  <a href="tel:+15551234567" class="text-brand-600 hover:text-brand-700 font-medium inline-flex items-center group/link">
                    <span>+1 (555) 123-4567</span>
                    <i class="fas fa-phone ml-2 transform group-hover/link:scale-110 transition-transform duration-300"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Location -->
            <div class="group p-6 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-xl hover:border-emerald-500 transition-all duration-500 transform hover:-translate-y-1">
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 h-14 w-14 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-map-marker-alt text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-gray-900 mb-2">Visit Us</h3>
                  <p class="text-gray-600 mb-3">Our office location</p>
                  <address class="text-gray-700 not-italic">
                    123 Event Street<br>
                    San Francisco, CA 94107<br>
                    United States
                  </address>
                </div>
              </div>
            </div>

            <!-- Social Media -->
            <div class="group p-6 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-xl hover:border-amber-500 transition-all duration-500 transform hover:-translate-y-1">
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 h-14 w-14 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-share-alt text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-gray-900 mb-4">Connect With Us</h3>
                  <div class="flex gap-3">
                    <a href="https://twitter.com" target="_blank" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:text-white hover:bg-twitter transition-all duration-300">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:text-white hover:bg-facebook transition-all duration-300">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:text-white hover:bg-instagram transition-all duration-300">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:text-white hover:bg-linkedin transition-all duration-300">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="lg:col-span-2">
        <div class="glass p-8 md:p-10 rounded-3xl shadow-xl border border-gray-200">
          <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Send a Message</h2>
            <p class="text-gray-600">Fill out the form below and we'll get back to you as soon as possible.</p>
          </div>

          <form method="post" action="<?php echo BASE_URL; ?>/contact.php" class="space-y-6">
            <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">

            <!-- Name Field -->
            <div class="space-y-2 group/field">
              <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                Full Name <span class="text-rose-500">*</span>
              </label>
              <div class="relative">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                  <i class="fas fa-user"></i>
                </div>
                <input type="text" 
                       name="name" 
                       required 
                       placeholder="Enter your full name"
                       class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400">
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
              </div>
            </div>

            <!-- Email Field -->
            <div class="space-y-2 group/field">
              <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                Email Address <span class="text-rose-500">*</span>
              </label>
              <div class="relative">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                  <i class="fas fa-envelope"></i>
                </div>
                <input type="email" 
                       name="email" 
                       required 
                       placeholder="you@example.com"
                       class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400">
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
              </div>
            </div>

            <!-- Subject Field -->
            <div class="space-y-2 group/field">
              <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                Subject <span class="text-gray-400">(Optional)</span>
              </label>
              <div class="relative">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                  <i class="fas fa-tag"></i>
                </div>
                <input type="text" 
                       name="subject" 
                       placeholder="What is this regarding?"
                       class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400">
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
              </div>
            </div>

            <!-- Message Field -->
            <div class="space-y-2 group/field">
              <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                Message <span class="text-rose-500">*</span>
              </label>
              <div class="relative">
                <div class="absolute left-4 top-4 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                  <i class="fas fa-comment-alt"></i>
                </div>
                <textarea name="message" 
                          required 
                          rows="6"
                          placeholder="Tell us how we can help you..."
                          class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400 resize-none"
                          oninput="this.style.height = 'auto'; this.style.height = (this.scrollHeight) + 'px'"></textarea>
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
              <button type="submit" 
                      class="group relative w-full inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white rounded-2xl shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 group-hover:from-brand-600 group-hover:to-brand-700 transition-all duration-300"></span>
                <span class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                <span class="relative flex items-center">
                  <i class="fas fa-paper-plane mr-3"></i>
                  Send Message
                  <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </span>
              </button>
            </div>

            <!-- Form Note -->
            <p class="text-sm text-gray-500 text-center pt-4">
              By submitting this form, you agree to our 
              <a href="<?php echo BASE_URL; ?>/privacy.php" class="text-brand-600 hover:text-brand-700 underline">Privacy Policy</a>. 
              We'll never share your information.
            </p>
          </form>
        </div>

        <!-- FAQ Section -->
        <div class="mt-12">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h3>
          <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="group rounded-2xl border border-gray-200 hover:border-brand-500 transition-all duration-300">
              <button class="w-full px-6 py-4 text-left flex items-center justify-between group" onclick="toggleFAQ(1)">
                <span class="text-lg font-medium text-gray-900 group-hover:text-brand-600 transition-colors duration-300">How long does it take to get a response?</span>
                <i class="fas fa-chevron-down text-gray-400 group-hover:text-brand-500 transition-all duration-300 transform group-[.active]:rotate-180"></i>
              </button>
              <div class="px-6 pb-4 hidden group-[.active]:block">
                <p class="text-gray-600">We typically respond within 24 hours during business days. For urgent matters, please call our support line.</p>
              </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="group rounded-2xl border border-gray-200 hover:border-brand-500 transition-all duration-300">
              <button class="w-full px-6 py-4 text-left flex items-center justify-between group" onclick="toggleFAQ(2)">
                <span class="text-lg font-medium text-gray-900 group-hover:text-brand-600 transition-colors duration-300">Can I request a custom event solution?</span>
                <i class="fas fa-chevron-down text-gray-400 group-hover:text-brand-500 transition-all duration-300 transform group-[.active]:rotate-180"></i>
              </button>
              <div class="px-6 pb-4 hidden group-[.active]:block">
                <p class="text-gray-600">Yes! We offer custom event management solutions. Please describe your needs in detail in the message field above.</p>
              </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="group rounded-2xl border border-gray-200 hover:border-brand-500 transition-all duration-300">
              <button class="w-full px-6 py-4 text-left flex items-center justify-between group" onclick="toggleFAQ(3)">
                <span class="text-lg font-medium text-gray-900 group-hover:text-brand-600 transition-colors duration-300">Do you offer technical support?</span>
                <i class="fas fa-chevron-down text-gray-400 group-hover:text-brand-500 transition-all duration-300 transform group-[.active]:rotate-180"></i>
              </button>
              <div class="px-6 pb-4 hidden group-[.active]:block">
                <p class="text-gray-600">Yes, we provide 24/7 technical support for all our platform users. Contact us anytime for assistance.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // FAQ toggle functionality
  function toggleFAQ(number) {
    const faqItem = document.querySelector(`[onclick="toggleFAQ(${number})"]`).parentElement;
    faqItem.classList.toggle('active');
  }

  // Initialize textarea auto-resize
  document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('textarea[name="message"]');
    if (textarea) {
      textarea.style.height = 'auto';
      textarea.style.height = (textarea.scrollHeight) + 'px';
    }
  });
</script>

<style>
  /* Custom colors for social media hover effects */
  .hover\:bg-twitter:hover { background-color: #1DA1F2; }
  .hover\:bg-facebook:hover { background-color: #1877F2; }
  .hover\:bg-instagram:hover { background-color: #E4405F; }
  .hover\:bg-linkedin:hover { background-color: #0A66C2; }
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>