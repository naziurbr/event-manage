<?php
$title = 'About';
require_once __DIR__ . '/config/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-brand-500 via-purple-500 to-pink-500 py-16 md:py-24">
  <div class="absolute inset-0 bg-black/20"></div>
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
  
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">About EventFlow</h1>
    <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10">
      We're revolutionizing how people discover, create, and experience events.
      Our mission is to connect organizers with attendees through seamless technology.
    </p>
    
    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
      <div class="glass p-6 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <div class="text-3xl md:text-4xl font-bold text-white mb-2">5+</div>
        <div class="text-white/90">Years Experience</div>
      </div>
      <div class="glass p-6 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <div class="text-3xl md:text-4xl font-bold text-white mb-2">1K+</div>
        <div class="text-white/90">Events Hosted</div>
      </div>
      <div class="glass p-6 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <div class="text-3xl md:text-4xl font-bold text-white mb-2">50K+</div>
        <div class="text-white/90">Happy Users</div>
      </div>
      <div class="glass p-6 rounded-2xl text-center backdrop-blur-sm bg-white/10 border border-white/20">
        <div class="text-3xl md:text-4xl font-bold text-white mb-2">100+</div>
        <div class="text-white/90">Cities Covered</div>
      </div>
    </div>
  </div>
</section>

<!-- Our Story -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-brand-500/10 to-purple-500/10 border border-brand-500/20 text-brand-700 font-medium text-sm mb-6">
          <i class="fas fa-history mr-2"></i>
          Our Journey
        </div>
        
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">From Idea to Impact</h2>
        <p class="text-gray-600 text-lg mb-6">
          EventFlow was born from a simple observation: event management was too complicated for organizers and finding events was too difficult for attendees.
        </p>
        <p class="text-gray-600 mb-8">
          Founded in 2019, we set out to create a platform that simplifies the entire event lifecycle. From discovery to booking, management to analytics, we've built tools that empower both organizers and attendees.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="<?php echo BASE_URL; ?>/events.php" 
             class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 group">
            <i class="fas fa-calendar-week mr-2"></i>
            <span>Explore Events</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
          </a>
          <a href="<?php echo BASE_URL; ?>/contact.php" 
             class="inline-flex items-center justify-center px-6 py-3 bg-white text-brand-600 border border-brand-300 rounded-xl hover:bg-brand-50 transition-all duration-300">
            <i class="fas fa-envelope mr-2"></i>
            <span>Contact Us</span>
          </a>
        </div>
      </div>
      
      <div class="relative">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
          <div class="aspect-video bg-gradient-to-br from-brand-500/20 to-purple-500/20"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
          <div class="absolute bottom-6 left-6 right-6">
            <div class="glass p-6 rounded-2xl backdrop-blur-sm border border-white/20">
              <div class="flex items-center gap-4">
                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white">
                  <i class="fas fa-quote-left"></i>
                </div>
                <div>
                  <p class="text-white font-medium">"EventFlow transformed how we manage our annual conference."</p>
                  <p class="text-white/80 text-sm mt-1">- Sarah Johnson, Tech Conference Organizer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Decorative elements -->
        <div class="absolute -top-6 -right-6 w-32 h-32 bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-full blur-2xl -z-10"></div>
        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-brand-500/5 to-blue-500/5 rounded-full blur-2xl -z-10"></div>
      </div>
    </div>
  </div>
</section>

<!-- Our Mission -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-emerald-500/10 to-green-500/10 border border-emerald-500/20 text-emerald-700 font-medium text-sm mb-6">
        <i class="fas fa-bullseye mr-2"></i>
        Our Purpose
      </div>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Mission & Vision</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Building connections through memorable event experiences</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Mission -->
      <div class="group p-8 rounded-3xl bg-white border-2 border-gray-200 hover:border-brand-500 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-flag text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
        <p class="text-gray-600">
          To democratize event management by providing powerful, accessible tools that enable anyone to create, discover, and attend amazing events.
        </p>
      </div>
      
      <!-- Vision -->
      <div class="group p-8 rounded-3xl bg-white border-2 border-gray-200 hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 text-white shadow-lg shadow-purple-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-eye text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
        <p class="text-gray-600">
          A world where event discovery is effortless, event creation is accessible, and every gathering creates lasting memories and meaningful connections.
        </p>
      </div>
      
      <!-- Values -->
      <div class="group p-8 rounded-3xl bg-white border-2 border-gray-200 hover:border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 transform hover:-translate-y-2">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 text-white shadow-lg shadow-emerald-500/30 mb-6 group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-heart text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Values</h3>
        <p class="text-gray-600">
          Innovation, accessibility, community, and integrity guide everything we do. We believe in building technology that serves people first.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-amber-500/10 to-orange-500/10 border border-amber-500/20 text-amber-700 font-medium text-sm mb-6">
        <i class="fas fa-users mr-2"></i>
        The Team
      </div>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Meet Our Leadership</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Passionate individuals dedicated to transforming the event industry</p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Team Member 1 -->
      <div class="group text-center">
        <div class="relative mb-6">
          <div class="aspect-square rounded-2xl overflow-hidden mx-auto">
            <div class="w-full h-full bg-gradient-to-br from-brand-500/20 to-purple-500/20"></div>
          </div>
          <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-brand-500 to-brand-600 border-4 border-white flex items-center justify-center text-white text-2xl font-bold shadow-lg">
              AJ
            </div>
          </div>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Alex Johnson</h3>
        <p class="text-brand-600 font-medium mb-3">CEO & Founder</p>
        <p class="text-gray-600 text-sm">Former event organizer with 10+ years in the industry</p>
        <div class="flex justify-center gap-3 mt-4">
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
      </div>
      
      <!-- Team Member 2 -->
      <div class="group text-center">
        <div class="relative mb-6">
          <div class="aspect-square rounded-2xl overflow-hidden mx-auto">
            <div class="w-full h-full bg-gradient-to-br from-purple-500/20 to-pink-500/20"></div>
          </div>
          <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 border-4 border-white flex items-center justify-center text-white text-2xl font-bold shadow-lg">
              MS
            </div>
          </div>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Maria Smith</h3>
        <p class="text-brand-600 font-medium mb-3">CTO</p>
        <p class="text-gray-600 text-sm">Tech visionary with expertise in scalable platforms</p>
        <div class="flex justify-center gap-3 mt-4">
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </div>
      
      <!-- Team Member 3 -->
      <div class="group text-center">
        <div class="relative mb-6">
          <div class="aspect-square rounded-2xl overflow-hidden mx-auto">
            <div class="w-full h-full bg-gradient-to-br from-emerald-500/20 to-green-500/20"></div>
          </div>
          <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 border-4 border-white flex items-center justify-center text-white text-2xl font-bold shadow-lg">
              DW
            </div>
          </div>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">David Wilson</h3>
        <p class="text-brand-600 font-medium mb-3">Head of Product</p>
        <p class="text-gray-600 text-sm">User experience expert focused on intuitive design</p>
        <div class="flex justify-center gap-3 mt-4">
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-dribbble"></i>
          </a>
        </div>
      </div>
      
      <!-- Team Member 4 -->
      <div class="group text-center">
        <div class="relative mb-6">
          <div class="aspect-square rounded-2xl overflow-hidden mx-auto">
            <div class="w-full h-full bg-gradient-to-br from-amber-500/20 to-orange-500/20"></div>
          </div>
          <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-4 border-white flex items-center justify-center text-white text-2xl font-bold shadow-lg">
              SC
            </div>
          </div>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Sarah Chen</h3>
        <p class="text-brand-600 font-medium mb-3">Head of Community</p>
        <p class="text-gray-600 text-sm">Community builder passionate about engagement</p>
        <div class="flex justify-center gap-3 mt-4">
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-brand-600 transition-colors duration-300">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Technology -->
<section class="py-20 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-500/10 to-cyan-500/10 border border-blue-500/20 text-blue-700 font-medium text-sm mb-6">
        <i class="fas fa-cogs mr-2"></i>
        Our Technology
      </div>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Built with Modern Technology</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Powering seamless event experiences with cutting-edge solutions</p>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="p-6 rounded-2xl bg-white border border-gray-200 text-center group hover:shadow-xl hover:border-brand-500 transition-all duration-300">
        <div class="h-16 w-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-brand-500/10 to-brand-600/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-shield-alt text-brand-600 text-2xl"></i>
        </div>
        <h3 class="font-bold text-gray-900 mb-2">Bank-Level Security</h3>
        <p class="text-gray-600 text-sm">256-bit encryption & PCI compliance</p>
      </div>
      
      <div class="p-6 rounded-2xl bg-white border border-gray-200 text-center group hover:shadow-xl hover:border-purple-500 transition-all duration-300">
        <div class="h-16 w-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-purple-500/10 to-pink-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-bolt text-purple-600 text-2xl"></i>
        </div>
        <h3 class="font-bold text-gray-900 mb-2">High Performance</h3>
        <p class="text-gray-600 text-sm">99.9% uptime & fast loading times</p>
      </div>
      
      <div class="p-6 rounded-2xl bg-white border border-gray-200 text-center group hover:shadow-xl hover:border-emerald-500 transition-all duration-300">
        <div class="h-16 w-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-emerald-500/10 to-green-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-mobile-alt text-emerald-600 text-2xl"></i>
        </div>
        <h3 class="font-bold text-gray-900 mb-2">Mobile First</h3>
        <p class="text-gray-600 text-sm">Fully responsive on all devices</p>
      </div>
      
      <div class="p-6 rounded-2xl bg-white border border-gray-200 text-center group hover:shadow-xl hover:border-amber-500 transition-all duration-300">
        <div class="h-16 w-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-amber-500/10 to-orange-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
          <i class="fas fa-chart-line text-amber-600 text-2xl"></i>
        </div>
        <h3 class="font-bold text-gray-900 mb-2">Smart Analytics</h3>
        <p class="text-gray-600 text-sm">Real-time insights & reporting</p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="relative overflow-hidden py-20 bg-gradient-to-br from-brand-500 via-purple-500 to-pink-500">
  <div class="absolute inset-0 bg-black/20"></div>
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
  
  <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Join Our Community?</h2>
    <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">Whether you're an organizer or attendee, we have the perfect tools for your event journey.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?php echo BASE_URL; ?>/register.php" 
         class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-brand-600 bg-white rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 group">
        <i class="fas fa-user-plus mr-3"></i>
        <span>Join Free</span>
        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
      </a>
      <a href="<?php echo BASE_URL; ?>/contact.php" 
         class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-2xl hover:bg-white/10 transition-all duration-300 group">
        <i class="fas fa-comments mr-3"></i>
        <span>Contact Sales</span>
      </a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>