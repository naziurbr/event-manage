<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 - Page Not Found | EventFlow</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              brand: {
                500: '#6366f1',
                600: '#4f46e5',
                700: '#4338ca',
              }
            },
            animation: {
              'float': 'float 6s ease-in-out infinite',
              'bounce-slow': 'bounceSlow 2s infinite',
              'wiggle': 'wiggle 1s ease-in-out infinite',
              'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
              'confetti-fall': 'confettiFall 5s linear infinite',
            },
            keyframes: {
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-20px)' },
              },
              bounceSlow: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-10px)' },
              },
              wiggle: {
                '0%, 100%': { transform: 'rotate(-3deg)' },
                '50%': { transform: 'rotate(3deg)' },
              },
              confettiFall: {
                '0%': { transform: 'translateY(-100vh) rotate(0deg)' },
                '100%': { transform: 'translateY(100vh) rotate(360deg)' },
              }
            }
          }
        }
      }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts (Cartoon style) -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
      body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        overflow-x: hidden;
      }
      
      .comic-font {
        font-family: 'Comic Neue', cursive;
      }
      
      .balloon {
        background: white;
        border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        position: relative;
      }
      
      .balloon:after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: 50%;
        width: 2px;
        height: 40px;
        background: white;
        transform: translateX(-50%);
      }
      
      .cloud {
        background: white;
        border-radius: 100px;
        position: relative;
      }
      
      .cloud:before, .cloud:after {
        content: '';
        position: absolute;
        background: white;
        border-radius: 50%;
      }
      
      .cloud:before {
        width: 60px;
        height: 60px;
        top: -30px;
        left: 20px;
      }
      
      .cloud:after {
        width: 40px;
        height: 40px;
        top: -20px;
        right: 20px;
      }
      
      /* Custom scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
      }
    </style>
</head>
<body class="text-white">
    <!-- Animated background elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Balloons -->
        <div class="absolute top-1/4 left-10 w-16 h-20 balloon animate-float" style="animation-delay: 0s; background: #ff6b6b;"></div>
        <div class="absolute top-1/3 right-20 w-20 h-24 balloon animate-float" style="animation-delay: 1s; background: #4ecdc4;"></div>
        <div class="absolute top-1/2 left-20 w-18 h-22 balloon animate-float" style="animation-delay: 2s; background: #ffd166;"></div>
        <div class="absolute top-2/3 right-10 w-14 h-18 balloon animate-float" style="animation-delay: 3s; background: #06d6a0;"></div>
        
        <!-- Clouds -->
        <div class="absolute top-10 left-1/4 w-40 h-20 cloud opacity-30 animate-pulse-slow"></div>
        <div class="absolute top-20 right-1/4 w-32 h-16 cloud opacity-40 animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/3 w-36 h-18 cloud opacity-30 animate-pulse-slow" style="animation-delay: 2s;"></div>
        
        <!-- Confetti -->
        <div class="absolute top-0 left-1/4 w-4 h-4 bg-yellow-400 rounded-full animate-confetti-fall" style="animation-delay: 0s;"></div>
        <div class="absolute top-0 left-1/2 w-3 h-3 bg-pink-400 rounded-full animate-confetti-fall" style="animation-delay: 0.5s;"></div>
        <div class="absolute top-0 left-2/3 w-4 h-4 bg-cyan-400 rounded-full animate-confetti-fall" style="animation-delay: 1s;"></div>
        <div class="absolute top-0 left-1/3 w-3 h-3 bg-purple-400 rounded-full animate-confetti-fall" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Main Content -->
    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-12">
        <!-- Event-themed 404 Character -->
        <div class="relative mb-8">
            <!-- Character Body -->
            <div class="relative">
                <!-- Head -->
                <div class="w-48 h-48 mx-auto bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full border-8 border-white shadow-2xl mb-6 animate-bounce-slow">
                    <!-- Eyes -->
                    <div class="absolute top-12 left-12 w-12 h-12 bg-white rounded-full">
                        <div class="absolute top-4 left-4 w-6 h-6 bg-blue-600 rounded-full"></div>
                        <div class="absolute top-1 left-1 w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    <div class="absolute top-12 right-12 w-12 h-12 bg-white rounded-full">
                        <div class="absolute top-4 right-4 w-6 h-6 bg-blue-600 rounded-full"></div>
                        <div class="absolute top-1 right-1 w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    
                    <!-- Mouth -->
                    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 w-24 h-8 bg-red-400 rounded-full"></div>
                    <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gray-800"></div>
                    
                    <!-- Event-themed accessories -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-16 h-8 bg-gradient-to-r from-brand-500 to-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ticket-alt text-white text-sm"></i>
                    </div>
                </div>
                
                <!-- Body -->
                <div class="w-64 h-40 mx-auto bg-gradient-to-br from-blue-400 to-cyan-500 rounded-2xl border-8 border-white shadow-xl relative">
                    <!-- 404 Display -->
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-48 h-20 bg-gradient-to-r from-rose-500 to-pink-600 rounded-2xl border-4 border-white shadow-lg flex items-center justify-center">
                        <span class="comic-font text-4xl font-bold text-white">404</span>
                    </div>
                    
                    <!-- Event Items in hands -->
                    <div class="absolute -left-8 top-1/2 transform -translate-y-1/2 w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-500 rounded-full border-4 border-white flex items-center justify-center animate-wiggle">
                        <i class="fas fa-calendar text-white text-xl"></i>
                    </div>
                    
                    <div class="absolute -right-8 top-1/2 transform -translate-y-1/2 w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full border-4 border-white flex items-center justify-center animate-wiggle" style="animation-delay: 0.5s;">
                        <i class="fas fa-music text-white text-xl"></i>
                    </div>
                    
                    <!-- Speech Bubble -->
                    <div class="absolute -top-32 right-0">
                        <div class="relative bg-white rounded-2xl p-4 shadow-xl">
                            <div class="text-gray-800 text-center font-semibold">Oops! Event not found!</div>
                            <div class="absolute -bottom-4 right-6 w-0 h-0 border-l-8 border-r-8 border-t-8 border-l-transparent border-r-transparent border-t-white"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Legs -->
                <div class="flex justify-center gap-12 mt-4">
                    <div class="w-12 h-20 bg-gradient-to-b from-blue-500 to-blue-600 rounded-b-full border-4 border-white"></div>
                    <div class="w-12 h-20 bg-gradient-to-b from-blue-500 to-blue-600 rounded-b-full border-4 border-white"></div>
                </div>
            </div>
        </div>

        <!-- Message -->
        <div class="text-center mb-12 max-w-2xl">
            <h1 class="comic-font text-5xl md:text-6xl font-bold mb-6 text-white drop-shadow-lg">
                Whoops! Lost Your Way?
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed">
                Looks like this event page has gone on an adventure!<br>
                Maybe it's at another venue or taking a little break.
            </p>
            
            <!-- Fun Event-themed Facts -->
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-white/20 backdrop-blur-sm rounded-2xl border border-white/30 mb-8">
                <i class="fas fa-lightbulb text-yellow-300 text-xl"></i>
                <span class="text-white">Did you know? 404 is also the number of minutes in some concerts!</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-6 mb-16">
            <!-- Home Button -->
            <a href="/" 
               class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <span class="absolute inset-0 bg-gradient-to-r from-brand-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                <span class="relative flex items-center">
                    <i class="fas fa-home mr-3"></i>
                    Back to Home
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </span>
            </a>
            
            <!-- Events Button -->
            <a href="/events.php" 
               class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-brand-600 bg-white rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-calendar-week mr-3"></i>
                Browse Events
                <i class="fas fa-search ml-3 transform group-hover:scale-110 transition-transform duration-300"></i>
            </a>
            
            <!-- Help Button -->
            <a href="/contact.php" 
               class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-2xl hover:bg-white/10 transition-all duration-300">
                <i class="fas fa-question-circle mr-3"></i>
                Need Help?
            </a>
        </div>

        <!-- Fun Event Search -->
        <div class="glass p-8 rounded-3xl backdrop-blur-sm bg-white/10 border border-white/20 max-w-2xl w-full">
            <h3 class="text-2xl font-bold text-white mb-4 text-center">Find Your Event Instead!</h3>
            <div class="relative">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white/70">
                    <i class="fas fa-search"></i>
                </div>
                <input type="text" 
                       placeholder="Search for events, concerts, workshops..." 
                       class="w-full pl-12 pr-4 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent">
                <button class="absolute right-2 top-1/2 transform -translate-y-1/2 px-6 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-lg hover:shadow-lg transition-all duration-300">
                    Search
                </button>
            </div>
            <p class="text-white/70 text-sm mt-4 text-center">
                Try searching for "music", "conference", "workshop", or browse by category
            </p>
        </div>

        <!-- Fun Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 max-w-4xl w-full">
            <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">1K+</div>
                <div class="text-white/80">Events Happening</div>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">99%</div>
                <div class="text-white/80">Pages Found</div>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">24/7</div>
                <div class="text-white/80">Support Available</div>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">100%</div>
                <div class="text-white/80">Fun Guaranteed</div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="mt-12 text-center text-white/60 text-sm">
            <p>EventFlow 404 - The event you're looking for might be in another castle! 🏰</p>
            <p class="mt-2">Powered by imagination and a touch of event magic ✨</p>
        </div>
    </div>

    <!-- Background Music Toggle (Optional) -->
    <button class="fixed bottom-6 right-6 h-14 w-14 rounded-full bg-gradient-to-br from-brand-500 to-purple-500 text-white shadow-2xl flex items-center justify-center hover:scale-110 transition-transform duration-300"
            onclick="toggleMusic()"
            aria-label="Toggle background music">
        <i class="fas fa-music text-xl"></i>
    </button>

    <script>
        // Simple interaction for the character
        document.addEventListener('DOMContentLoaded', function() {
            const character = document.querySelector('.animate-bounce-slow');
            
            // Make character wiggle on hover
            character.addEventListener('mouseenter', function() {
                this.style.animation = 'wiggle 0.5s ease-in-out';
            });
            
            character.addEventListener('mouseleave', function() {
                this.style.animation = 'bounceSlow 2s infinite';
            });
            
            // Confetti effect on click
            document.body.addEventListener('click', function(e) {
                if (e.target.tagName === 'BUTTON' || e.target.tagName === 'A') {
                    createConfetti(e.clientX, e.clientY);
                }
            });
            
            function createConfetti(x, y) {
                for (let i = 0; i < 5; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'fixed w-3 h-3 rounded-full z-50 animate-confetti-fall';
                    confetti.style.left = x + 'px';
                    confetti.style.top = y + 'px';
                    confetti.style.background = ['#ff6b6b', '#4ecdc4', '#ffd166', '#06d6a0', '#118ab2'][i % 5];
                    confetti.style.animationDelay = (i * 0.1) + 's';
                    document.body.appendChild(confetti);
                    
                    // Remove after animation
                    setTimeout(() => confetti.remove(), 5000);
                }
            }
        });
        
        function toggleMusic() {
            const button = document.querySelector('[onclick="toggleMusic()"]');
            const icon = button.querySelector('i');
            
            if (icon.classList.contains('fa-music')) {
                icon.classList.remove('fa-music');
                icon.classList.add('fa-volume-mute');
                // In a real implementation, you would stop background music here
            } else {
                icon.classList.remove('fa-volume-mute');
                icon.classList.add('fa-music');
                // In a real implementation, you would play background music here
            }
            
            // Add confetti effect
            const rect = button.getBoundingClientRect();
            createConfetti(rect.left + rect.width/2, rect.top + rect.height/2);
        }
        
        function createConfetti(x, y) {
            for (let i = 0; i < 8; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'fixed w-4 h-4 rounded-full z-50';
                confetti.style.left = x + 'px';
                confetti.style.top = y + 'px';
                confetti.style.background = ['#ff6b6b', '#4ecdc4', '#ffd166', '#06d6a0', '#118ab2', '#ef476f', '#ffd166', '#06d6a0'][i % 8];
                confetti.style.transform = `translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) scale(0)`;
                document.body.appendChild(confetti);
                
                // Animate
                confetti.animate([
                    { transform: 'translate(0, 0) scale(1)', opacity: 1 },
                    { transform: `translate(${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px) scale(0)`, opacity: 0 }
                ], {
                    duration: 1000,
                    easing: 'cubic-bezier(0.2, 0.8, 0.4, 1)'
                });
                
                // Remove after animation
                setTimeout(() => confetti.remove(), 1000);
            }
        }
    </script>
</body>
</html>