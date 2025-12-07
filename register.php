<?php
$title = 'Register';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

$db = new Database(); // no need to pass $pdo
$userModel = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF token.');
        redirect(BASE_URL . '/register.php');
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if ($name === '' || $email === '' || $password === '') {
        flash('error', 'All fields are required.');
        redirect(BASE_URL . '/register.php');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        flash('error', 'Invalid email address.');
        redirect(BASE_URL . '/register.php');
    }
    if ($password !== $confirm) {
        flash('error', 'Passwords do not match.');
        redirect(BASE_URL . '/register.php');
    }
    if ($userModel->findByEmail($email)) {
        flash('error', 'Email already registered.');
        redirect(BASE_URL . '/register.php');
    }

    // ✅ Pass 3 arguments instead of array
    $id = $userModel->create($name, $email, $password);

    $_SESSION['user'] = $userModel->findById((int)$id);
    flash('success', 'Registration successful.');
    redirect(BASE_URL . '/index.php');
}
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<!-- Registration Page -->
<section class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl w-full mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <!-- Left Column - Registration Info -->
      <div class="text-center lg:text-left">
        <!-- Logo/Brand -->
        <a href="<?php echo BASE_URL; ?>/index.php" class="inline-flex items-center gap-3 mb-8 group">
          <div class="relative">
            <div class="absolute -inset-3 bg-gradient-to-r from-brand-500 to-purple-500 rounded-2xl opacity-0 group-hover:opacity-20 blur transition-opacity duration-300"></div>
            <span class="relative inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-2xl shadow-brand-500/30">
              <i class="fas fa-calendar-alt text-2xl"></i>
            </span>
          </div>
          <div>
            <span class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-brand-700 bg-clip-text text-transparent">EventFlow</span>
            <span class="block text-sm text-gray-500">Event Management System</span>
          </div>
        </a>

        <!-- Welcome Message -->
        <div class="mb-10">
          <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
            Join Our
            <span class="block bg-gradient-to-r from-brand-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
              Community!
            </span>
          </h1>
          <p class="text-xl text-gray-600 mb-8 max-w-lg">
            Create your account to discover amazing events, connect with organizers, and start your journey.
          </p>
        </div>

        <!-- Benefits -->
        <div class="space-y-6 max-w-md">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-brand-500/10 to-brand-600/10 border border-brand-500/20 flex items-center justify-center">
              <i class="fas fa-star text-brand-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Exclusive Access</h3>
              <p class="text-gray-600 text-sm">Get early access to premium events and special discounts.</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-purple-500/20 flex items-center justify-center">
              <i class="fas fa-bell text-purple-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Personalized Notifications</h3>
              <p class="text-gray-600 text-sm">Receive alerts for events matching your interests.</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-emerald-500/10 to-green-500/10 border border-emerald-500/20 flex items-center justify-center">
              <i class="fas fa-rocket text-emerald-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Quick Event Creation</h3>
              <p class="text-gray-600 text-sm">Host your own events and reach thousands of attendees.</p>
            </div>
          </div>
        </div>

        <!-- Testimonial -->
        <div class="mt-12 p-6 rounded-2xl bg-gradient-to-r from-brand-50 to-purple-50 border border-brand-100">
          <div class="flex items-center gap-4 mb-4">
            <div class="h-12 w-12 rounded-full bg-gradient-to-br from-brand-500 to-purple-500 flex items-center justify-center text-white font-bold">
              JS
            </div>
            <div>
              <div class="font-semibold text-gray-900">John Smith</div>
              <div class="text-sm text-gray-600">Event Organizer</div>
            </div>
          </div>
          <p class="text-gray-700 italic">
            "This platform transformed how I manage events. The community is amazing!"
          </p>
          <div class="flex text-amber-400 mt-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
      </div>

      <!-- Right Column - Registration Form -->
      <div class="flex justify-center lg:justify-end">
        <div class="w-full max-w-md">
          <!-- Registration Card -->
          <div class="glass p-8 md:p-10 rounded-3xl shadow-2xl border border-gray-200">
            <!-- Card Header -->
            <div class="text-center mb-10">
              <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
              <p class="text-gray-600">Join thousands of event enthusiasts</p>
            </div>

            <!-- Registration Form -->
            <form method="post" action="<?php echo BASE_URL; ?>/register.php" class="space-y-6" id="registrationForm">
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
                         placeholder="John Doe"
                         class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400"
                         autocomplete="name">
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
                         class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400"
                         autocomplete="email">
                  <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
                </div>
              </div>

              <!-- Password Field -->
              <div class="space-y-2 group/field">
                <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                  Password <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                  <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                    <i class="fas fa-lock"></i>
                  </div>
                  <input type="password" 
                         name="password" 
                         required 
                         placeholder="••••••••"
                         class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400"
                         autocomplete="new-password"
                         id="password-input"
                         oninput="checkPasswordStrength(this.value)">
                  <button type="button" 
                          class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-300"
                          onclick="togglePasswordVisibility('password-input', 'password-toggle-icon')">
                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                  </button>
                  <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
                </div>
                <!-- Password Strength Meter -->
                <div class="mt-2">
                  <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div id="password-strength" class="h-full rounded-full transition-all duration-300" style="width: 0%"></div>
                  </div>
                  <div id="password-strength-text" class="text-xs text-gray-500 mt-1"></div>
                </div>
                <!-- Password Requirements -->
                <div class="mt-2 space-y-1">
                  <div class="flex items-center text-xs">
                    <i class="fas fa-check text-gray-300 mr-2" id="req-length"></i>
                    <span class="text-gray-600">At least 8 characters</span>
                  </div>
                  <div class="flex items-center text-xs">
                    <i class="fas fa-check text-gray-300 mr-2" id="req-uppercase"></i>
                    <span class="text-gray-600">One uppercase letter</span>
                  </div>
                  <div class="flex items-center text-xs">
                    <i class="fas fa-check text-gray-300 mr-2" id="req-number"></i>
                    <span class="text-gray-600">One number</span>
                  </div>
                </div>
              </div>

              <!-- Confirm Password Field -->
              <div class="space-y-2 group/field">
                <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                  Confirm Password <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                  <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                    <i class="fas fa-lock"></i>
                  </div>
                  <input type="password" 
                         name="confirm_password" 
                         required 
                         placeholder="••••••••"
                         class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400"
                         autocomplete="new-password"
                         id="confirm-password-input"
                         oninput="checkPasswordMatch()">
                  <button type="button" 
                          class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-300"
                          onclick="togglePasswordVisibility('confirm-password-input', 'confirm-password-toggle-icon')">
                    <i class="fas fa-eye" id="confirm-password-toggle-icon"></i>
                  </button>
                  <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
                </div>
                <div id="password-match" class="text-xs mt-1 hidden">
                  <i class="fas fa-check text-emerald-500 mr-1"></i>
                  <span class="text-emerald-600">Passwords match!</span>
                </div>
                <div id="password-mismatch" class="text-xs mt-1 hidden">
                  <i class="fas fa-times text-rose-500 mr-1"></i>
                  <span class="text-rose-600">Passwords do not match</span>
                </div>
              </div>

              <!-- Terms and Conditions -->
              <div class="flex items-start">
                <input type="checkbox" 
                       name="terms" 
                       id="terms"
                       required
                       class="h-5 w-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 focus:ring-offset-0 transition-colors duration-300 mt-0.5">
                <label for="terms" class="ml-3 text-gray-700 hover:text-gray-900 cursor-pointer transition-colors duration-300 text-sm">
                  I agree to the 
                  <a href="#" class="text-brand-600 hover:text-brand-700 font-medium">Terms of Service</a>
                  and 
                  <a href="#" class="text-brand-600 hover:text-brand-700 font-medium">Privacy Policy</a>
                </label>
              </div>

              <!-- Submit Button -->
              <div class="pt-4">
                <button type="submit" 
                        class="group relative w-full inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white rounded-2xl shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 transform hover:-translate-y-1 transition-all duration-300 overflow-hidden"
                        id="submit-button">
                  <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 group-hover:from-brand-600 group-hover:to-brand-700 transition-all duration-300"></span>
                  <span class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                  <span class="relative flex items-center">
                    <i class="fas fa-user-plus mr-3"></i>
                    Create Account
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                  </span>
                </button>
              </div>

              <!-- Divider -->
              <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                  <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                  <span class="px-4 bg-white text-gray-500">Or sign up with</span>
                </div>
              </div>

              <!-- Social Registration Buttons -->
              <div class="grid grid-cols-2 gap-3">
                <button type="button" 
                        class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 group">
                  <i class="fab fa-google text-rose-500 mr-3"></i>
                  <span class="text-gray-700 group-hover:text-gray-900">Google</span>
                </button>
                <button type="button" 
                        class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 group">
                  <i class="fab fa-facebook text-blue-600 mr-3"></i>
                  <span class="text-gray-700 group-hover:text-gray-900">Facebook</span>
                </button>
              </div>
            </form>

            <!-- Login Link -->
            <div class="mt-10 pt-6 border-t border-gray-200 text-center">
              <p class="text-gray-600">
                Already have an account?
                <a href="<?php echo BASE_URL; ?>/login.php" 
                   class="font-semibold text-brand-600 hover:text-brand-700 ml-1 inline-flex items-center group/link transition-colors duration-300">
                  <span>Sign in</span>
                  <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                </a>
              </p>
            </div>
          </div>

          <!-- Security Notice -->
          <div class="mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200">
            <div class="flex items-start">
              <i class="fas fa-shield-alt text-emerald-500 mt-0.5 mr-3"></i>
              <div class="text-sm text-emerald-800">
                <span class="font-semibold">Your data is safe:</span> We use industry-standard encryption to protect your information.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Password visibility toggle
  function togglePasswordVisibility(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const passwordIcon = document.getElementById(iconId);
    
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      passwordIcon.classList.remove('fa-eye');
      passwordIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      passwordIcon.classList.remove('fa-eye-slash');
      passwordIcon.classList.add('fa-eye');
    }
  }

  // Password strength checker
  function checkPasswordStrength(password) {
    const strengthBar = document.getElementById('password-strength');
    const strengthText = document.getElementById('password-strength-text');
    const reqLength = document.getElementById('req-length');
    const reqUppercase = document.getElementById('req-uppercase');
    const reqNumber = document.getElementById('req-number');
    
    let strength = 0;
    let text = '';
    let color = '';
    
    // Check requirements
    const hasLength = password.length >= 8;
    const hasUppercase = /[A-Z]/.test(password);
    const hasNumber = /[0-9]/.test(password);
    
    // Update requirement icons
    reqLength.className = hasLength ? 'fas fa-check text-emerald-500 mr-2' : 'fas fa-times text-gray-300 mr-2';
    reqUppercase.className = hasUppercase ? 'fas fa-check text-emerald-500 mr-2' : 'fas fa-times text-gray-300 mr-2';
    reqNumber.className = hasNumber ? 'fas fa-check text-emerald-500 mr-2' : 'fas fa-times text-gray-300 mr-2';
    
    // Calculate strength
    if (password.length > 0) strength += 25;
    if (password.length >= 8) strength += 25;
    if (hasUppercase) strength += 25;
    if (hasNumber) strength += 25;
    
    // Set strength bar and text
    strengthBar.style.width = strength + '%';
    
    if (strength <= 25) {
      color = 'bg-rose-500';
      text = 'Very Weak';
    } else if (strength <= 50) {
      color = 'bg-amber-500';
      text = 'Weak';
    } else if (strength <= 75) {
      color = 'bg-blue-500';
      text = 'Good';
    } else {
      color = 'bg-emerald-500';
      text = 'Strong';
    }
    
    strengthBar.className = 'h-full rounded-full transition-all duration-300 ' + color;
    strengthText.textContent = text;
    strengthText.className = 'text-xs font-medium ' + color.replace('bg-', 'text-');
  }

  // Password match checker
  function checkPasswordMatch() {
    const password = document.getElementById('password-input').value;
    const confirmPassword = document.getElementById('confirm-password-input').value;
    const matchDiv = document.getElementById('password-match');
    const mismatchDiv = document.getElementById('password-mismatch');
    
    if (confirmPassword.length === 0) {
      matchDiv.classList.add('hidden');
      mismatchDiv.classList.add('hidden');
      return;
    }
    
    if (password === confirmPassword) {
      matchDiv.classList.remove('hidden');
      mismatchDiv.classList.add('hidden');
    } else {
      matchDiv.classList.add('hidden');
      mismatchDiv.classList.remove('hidden');
    }
  }

  // Form validation
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const submitButton = document.getElementById('submit-button');
    
    form.addEventListener('submit', function(e) {
      const nameInput = form.querySelector('input[name="name"]');
      const emailInput = form.querySelector('input[name="email"]');
      const passwordInput = form.querySelector('input[name="password"]');
      const confirmInput = form.querySelector('input[name="confirm_password"]');
      const termsInput = form.querySelector('input[name="terms"]');
      let isValid = true;
      
      // Reset all error states
      [nameInput, emailInput, passwordInput, confirmInput].forEach(input => {
        input.classList.remove('border-rose-400', 'shake-animation');
      });
      
      // Validate name
      if (!nameInput.value.trim()) {
        nameInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => nameInput.classList.remove('shake-animation'), 300);
      }
      
      // Validate email
      if (!emailInput.value || !emailInput.validity.valid) {
        emailInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => emailInput.classList.remove('shake-animation'), 300);
      }
      
      // Validate password
      if (!passwordInput.value || passwordInput.value.length < 8) {
        passwordInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => passwordInput.classList.remove('shake-animation'), 300);
      }
      
      // Validate password match
      if (passwordInput.value !== confirmInput.value) {
        confirmInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => confirmInput.classList.remove('shake-animation'), 300);
      }
      
      // Validate terms
      if (!termsInput.checked) {
        termsInput.classList.add('shake-animation');
        isValid = false;
        setTimeout(() => termsInput.classList.remove('shake-animation'), 300);
      }
      
      if (!isValid) {
        e.preventDefault();
        submitButton.classList.add('shake-animation');
        setTimeout(() => submitButton.classList.remove('shake-animation'), 300);
      } else {
        // Loading state for button
        const originalHTML = submitButton.innerHTML;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating account...';
        submitButton.disabled = true;
        
        // Revert after 5 seconds (in case form submission fails)
        setTimeout(() => {
          submitButton.innerHTML = originalHTML;
          submitButton.disabled = false;
        }, 5000);
      }
    });
  });
</script>

<style>
  /* Shake animation for validation */
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
  }
  
  .shake-animation {
    animation: shake 0.3s ease-in-out;
  }
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>