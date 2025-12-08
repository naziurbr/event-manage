<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

// Create database instance
$db = new Database();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (empty($email) || empty($password)) {
    $error = "Please enter both email and password.";
  } else {
    // MD5 hash the password
    $hashed = md5($password);

    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->execute([$email, $hashed]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      // Login successful
      $_SESSION['user'] = [
        'id'    => $user['id'],
        'name'  => $user['name'],
        'email' => $user['email'],
        'role'  => $user['role'] ?? 'user',
        'avatar' => $user['avatar'] ?? null
      ];

      if ($user['role'] === 'admin') {
        header("Location: admindashboard.php");
      } else {
        header("Location: dashboard.php");
      }
      exit;
    } else {
      echo "Invalid email or password.";
    }
  }
}
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<!-- Login Page -->
<section class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl w-full mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <!-- Left Column - Welcome/Info -->
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
            Welcome
            <span class="block bg-gradient-to-r from-brand-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
              Back!
            </span>
          </h1>
          <p class="text-xl text-gray-600 mb-8 max-w-lg">
            Sign in to access your events, manage bookings, and discover new experiences.
          </p>
        </div>

        <!-- Features -->
        <div class="space-y-6 max-w-md">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-emerald-500/10 to-green-500/10 border border-emerald-500/20 flex items-center justify-center">
              <i class="fas fa-calendar-check text-emerald-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Manage Your Events</h3>
              <p class="text-gray-600 text-sm">Create, edit, and track all your events in one place.</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-purple-500/20 flex items-center justify-center">
              <i class="fas fa-ticket-alt text-purple-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Easy Booking</h3>
              <p class="text-gray-600 text-sm">Book tickets to amazing events with just a few clicks.</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/20 flex items-center justify-center">
              <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900 mb-1">Secure & Private</h3>
              <p class="text-gray-600 text-sm">Your data is protected with enterprise-grade security.</p>
            </div>
          </div>
        </div>

        <!-- Decorative Elements -->
        <div class="mt-12 relative">
          <div class="absolute -top-6 -left-6 w-32 h-32 bg-gradient-to-br from-brand-500/5 to-purple-500/5 rounded-full blur-2xl"></div>
          <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-emerald-500/5 to-green-500/5 rounded-full blur-2xl"></div>
        </div>
      </div>

      <!-- Right Column - Login Form -->
      <div class="flex justify-center lg:justify-end">
        <div class="w-full max-w-md">
          <!-- Login Card -->
          <div class="glass p-8 md:p-10 rounded-3xl shadow-2xl border border-gray-200">
            <!-- Card Header -->
            <div class="text-center mb-10">
              <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
              <p class="text-gray-600">Enter your credentials to access your account</p>
            </div>

            <!-- Login Form -->
            <form method="post" action="<?php echo BASE_URL; ?>/login.php" class="space-y-6">
              <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">

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
                <div class="flex items-center justify-between">
                  <label class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600">
                    Password <span class="text-rose-500">*</span>
                  </label>
                  <a href="#" class="text-sm text-brand-600 hover:text-brand-700 transition-colors duration-300">
                    Forgot password?
                  </a>
                </div>
                <div class="relative">
                  <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 transition-colors duration-300">
                    <i class="fas fa-lock"></i>
                  </div>
                  <input type="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-300 bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500 transition-all duration-300 placeholder-gray-400"
                    autocomplete="current-password"
                    id="password-input">
                  <button type="button"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-300"
                    onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                  </button>
                  <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>
                </div>
              </div>

              <!-- Remember Me -->
              <div class="flex items-center">
                <input type="checkbox"
                  name="remember"
                  id="remember"
                  class="h-5 w-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 focus:ring-offset-0 transition-colors duration-300">
                <label for="remember" class="ml-3 text-gray-700 hover:text-gray-900 cursor-pointer transition-colors duration-300">
                  Remember me
                </label>
              </div>

              <!-- Submit Button -->
              <div class="pt-4">
                <button type="submit"
                  class="group relative w-full inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white rounded-2xl shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                  <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 group-hover:from-brand-600 group-hover:to-brand-700 transition-all duration-300"></span>
                  <span class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                  <span class="relative flex items-center">
                    <i class="fas fa-sign-in-alt mr-3"></i>
                    Sign In
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
                  <span class="px-4 bg-white text-gray-500">Or continue with</span>
                </div>
              </div>

              <!-- Social Login Buttons -->
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

            <!-- Sign Up Link -->
            <div class="mt-10 pt-6 border-t border-gray-200 text-center">
              <p class="text-gray-600">
                Don't have an account?
                <a href="<?php echo BASE_URL; ?>/register.php"
                  class="font-semibold text-brand-600 hover:text-brand-700 ml-1 inline-flex items-center group/link transition-colors duration-300">
                  <span>Create account</span>
                  <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                </a>
              </p>
            </div>
          </div>

          <!-- Security Notice -->
          <div class="mt-6 p-4 rounded-xl bg-amber-50 border border-amber-200">
            <div class="flex items-start">
              <i class="fas fa-shield-alt text-amber-500 mt-0.5 mr-3"></i>
              <div class="text-sm text-amber-800">
                <span class="font-semibold">Security notice:</span> Always ensure you're on the correct website before entering your credentials.
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
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password-input');
    const passwordIcon = document.getElementById('password-toggle-icon');

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

  // Form validation animation
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitButton = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(e) {
      const emailInput = form.querySelector('input[name="email"]');
      const passwordInput = form.querySelector('input[name="password"]');
      let isValid = true;

      // Simple validation with visual feedback
      if (!emailInput.value || !emailInput.validity.valid) {
        emailInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => emailInput.classList.remove('shake-animation'), 300);
      }

      if (!passwordInput.value) {
        passwordInput.classList.add('border-rose-400', 'shake-animation');
        isValid = false;
        setTimeout(() => passwordInput.classList.remove('shake-animation'), 300);
      }

      if (!isValid) {
        e.preventDefault();

        // Button shake animation
        submitButton.classList.add('shake-animation');
        setTimeout(() => submitButton.classList.remove('shake-animation'), 300);
      } else {
        // Loading state for button
        const originalHTML = submitButton.innerHTML;
        submitButton.innerHTML = `
          <i class="fas fa-spinner fa-spin mr-2"></i>
          Signing in...
        `;
        submitButton.disabled = true;

        // Revert after 3 seconds (in case form submission fails)
        setTimeout(() => {
          submitButton.innerHTML = originalHTML;
          submitButton.disabled = false;
        }, 3000);
      }
    });

    // Remove error styles on input
    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
      input.addEventListener('input', function() {
        this.classList.remove('border-rose-400');
      });
    });
  });
</script>

<style>
  /* Shake animation for validation */
  @keyframes shake {

    0%,
    100% {
      transform: translateX(0);
    }

    10%,
    30%,
    50%,
    70%,
    90% {
      transform: translateX(-5px);
    }

    20%,
    40%,
    60%,
    80% {
      transform: translateX(5px);
    }
  }

  .shake-animation {
    animation: shake 0.3s ease-in-out;
  }
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>