<?php
// includes/flash.php

function flash($type, $message) {
  $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

function render_flash() {
  if (empty($_SESSION['flash'])) return;
  
  // Predefined styles for each type
  $styles = [
    'success' => [
      'bg' => 'bg-gradient-to-r from-emerald-500 to-green-600',
      'icon' => 'fas fa-check-circle',
      'border' => 'border-emerald-500/20',
      'progress' => 'bg-emerald-400',
    ],
    'error' => [
      'bg' => 'bg-gradient-to-r from-rose-500 to-red-600',
      'icon' => 'fas fa-exclamation-circle',
      'border' => 'border-rose-500/20',
      'progress' => 'bg-rose-400',
    ],
    'warning' => [
      'bg' => 'bg-gradient-to-r from-amber-500 to-orange-600',
      'icon' => 'fas fa-exclamation-triangle',
      'border' => 'border-amber-500/20',
      'progress' => 'bg-amber-400',
    ],
    'info' => [
      'bg' => 'bg-gradient-to-r from-blue-500 to-cyan-600',
      'icon' => 'fas fa-info-circle',
      'border' => 'border-blue-500/20',
      'progress' => 'bg-blue-400',
    ],
    'default' => [
      'bg' => 'bg-gradient-to-r from-gray-600 to-gray-700',
      'icon' => 'fas fa-bell',
      'border' => 'border-gray-500/20',
      'progress' => 'bg-gray-400',
    ]
  ];

  echo '<div class="fixed top-4 right-4 z-[100] space-y-3 w-full max-w-sm">';
  
  foreach ($_SESSION['flash'] as $index => $f) {
    $type = $f['type'];
    $config = isset($styles[$type]) ? $styles[$type] : $styles['default'];
    $message = e($f['message']);
    
    echo '
    <div class="animate-slide-in-right animate-duration-300" style="animation-delay: ' . ($index * 100) . 'ms">
      <div class="relative glass-dark rounded-xl border ' . $config['border'] . ' shadow-float overflow-hidden group">
        <!-- Progress bar -->
        <div class="absolute top-0 left-0 right-0 h-1 ' . $config['progress'] . '">
          <div class="h-full w-full origin-left toast-progress"></div>
        </div>
        
        <!-- Toast content -->
        <div class="p-4">
          <div class="flex items-start">
            <!-- Icon -->
            <div class="flex-shrink-0">
              <div class="h-10 w-10 rounded-lg ' . $config['bg'] . ' flex items-center justify-center text-white shadow-inner">
                <i class="' . $config['icon'] . ' text-lg"></i>
              </div>
            </div>
            
            <!-- Message -->
            <div class="ml-3 flex-1">
              <p class="text-sm font-medium text-white">' . $message . '</p>
            </div>
            
            <!-- Close button -->
            <button onclick="this.closest(\'[role=\\\'alert\\\']\').remove()" 
                    class="ml-4 flex-shrink-0 h-8 w-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-white/10 transition-all duration-200">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        
        <!-- Auto-close timer indicator -->
        <div class="absolute bottom-2 left-4 right-4 h-1 bg-white/10 rounded-full overflow-hidden">
          <div class="h-full ' . $config['progress'] . ' rounded-full toast-timer"></div>
        </div>
      </div>
    </div>';
  }
  
  echo '</div>';
  
  // Add JavaScript for auto-dismiss and animations
  echo '
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toasts = document.querySelectorAll(".toast-progress");
      const timers = document.querySelectorAll(".toast-timer");
      
      toasts.forEach((toast, index) => {
        // Start progress animation
        toast.style.animation = "progress 5s linear forwards";
        
        // Auto remove after 5 seconds
        const toastElement = toast.closest(".animate-slide-in-right");
        setTimeout(() => {
          if (toastElement && toastElement.parentNode) {
            toastElement.style.animation = "slideOutRight 0.3s ease-out forwards";
            setTimeout(() => {
              if (toastElement.parentNode) {
                toastElement.parentNode.removeChild(toastElement);
              }
            }, 300);
          }
        }, 5000);
        
        // Timer bar animation
        if (timers[index]) {
          timers[index].style.animation = "shrink 5s linear forwards";
        }
      });
      
      // Pause animations on hover
      const toastContainers = document.querySelectorAll(".glass-dark");
      toastContainers.forEach(container => {
        container.addEventListener("mouseenter", function() {
          const progress = this.querySelector(".toast-progress");
          const timer = this.querySelector(".toast-timer");
          if (progress) progress.style.animationPlayState = "paused";
          if (timer) timer.style.animationPlayState = "paused";
        });
        
        container.addEventListener("mouseleave", function() {
          const progress = this.querySelector(".toast-progress");
          const timer = this.querySelector(".toast-timer");
          if (progress) progress.style.animationPlayState = "running";
          if (timer) timer.style.animationPlayState = "running";
        });
      });
    });
    
    // Add CSS animations
    const style = document.createElement("style");
    style.textContent = `
      @keyframes progress {
        from { transform: scaleX(1); }
        to { transform: scaleX(0); }
      }
      
      @keyframes shrink {
        from { width: 100%; }
        to { width: 0%; }
      }
      
      @keyframes slideOutRight {
        from { 
          transform: translateX(0);
          opacity: 1;
          max-height: 200px;
          margin-bottom: 12px;
        }
        to { 
          transform: translateX(100%);
          opacity: 0;
          max-height: 0;
          margin-bottom: 0;
          padding: 0;
        }
      }
      
      .toast-progress {
        transform-origin: left center;
      }
      
      .animate-slide-in-right {
        animation: slideInRight 0.3s ease-out forwards;
      }
      
      @keyframes slideInRight {
        from { 
          transform: translateX(100%);
          opacity: 0;
        }
        to { 
          transform: translateX(0);
          opacity: 1;
        }
      }
    `;
    document.head.appendChild(style);
  </script>';
  
  unset($_SESSION['flash']);
}
?>