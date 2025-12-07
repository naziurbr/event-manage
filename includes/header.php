<?php
// includes/header.php
?>
<!doctype html>
<html lang="en" class="h-full scroll-smooth">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title><?php echo isset($title) ? e($title) . ' — ' : ''; ?>Event Management</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              brand: {
                50: '#eef2ff',
                100: '#e0e7ff',
                200: '#c7d2fe',
                300: '#a5b4fc',
                400: '#818cf8',
                500: '#6366f1',
                600: '#4f46e5',
                700: '#4338ca',
                800: '#3730a3',
                900: '#312e81',
              }
            },
            boxShadow: {
              'soft': '0 8px 24px rgba(17, 24, 39, 0.08)',
              'glow': '0 0 40px rgba(99, 102, 241, 0.15)',
              'inner-glow': 'inset 0 2px 4px 0 rgba(255, 255, 255, 0.05)',
              'float': '0 20px 40px rgba(0, 0, 0, 0.1)',
            },
            borderRadius: {
              'xl': '1rem',
              '2xl': '1.5rem',
              '3xl': '2rem',
            },
            animation: {
              'fade-in': 'fadeIn 0.5s ease-out',
              'slide-up': 'slideUp 0.4s ease-out',
              'slide-in-right': 'slideInRight 0.3s ease-out',
              'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
              'bounce-smooth': 'bounceSmooth 1s infinite',
              'shimmer': 'shimmer 2s infinite',
              'float': 'float 6s ease-in-out infinite',
              'gradient-shift': 'gradientShift 3s ease infinite',
            },
            keyframes: {
              fadeIn: {
                '0%': { opacity: '0' },
                '100%': { opacity: '1' },
              },
              slideUp: {
                '0%': { transform: 'translateY(10px)', opacity: '0' },
                '100%': { transform: 'translateY(0)', opacity: '1' },
              },
              slideInRight: {
                '0%': { transform: 'translateX(20px)', opacity: '0' },
                '100%': { transform: 'translateX(0)', opacity: '1' },
              },
              bounceSmooth: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-10px)' },
              },
              shimmer: {
                '0%': { backgroundPosition: '-200px 0' },
                '100%': { backgroundPosition: 'calc(200px + 100%) 0' },
              },
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-20px)' },
              },
              gradientShift: {
                '0%, 100%': { backgroundPosition: '0% 50%' },
                '50%': { backgroundPosition: '100% 50%' },
              }
            },
            backgroundImage: {
              'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
              'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
              'gradient-shiny': 'linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent)',
            },
            backdropBlur: {
              'xs': '2px',
            }
          }
        }
      }
    </script>

    <!-- Inter font with variable font for better performance -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
      html, body { 
        font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
        scroll-behavior: smooth;
      }
      
      /* Custom scrollbar */
      ::-webkit-scrollbar {
        width: 10px;
      }
      ::-webkit-scrollbar-track {
        background: #f1f5f9;
      }
      ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #6366f1, #8b5cf6);
        border-radius: 5px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #4f46e5, #7c3aed);
      }
      
      /* Selection color */
      ::selection {
        background-color: rgba(99, 102, 241, 0.2);
        color: #1f2937;
      }
      
      /* Smooth transitions */
      * {
        transition: background-color 0.3s ease, border-color 0.3s ease;
      }
      
      /* Loading skeleton animation */
      @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
      }
      
      /* Glass morphism effect */
      .glass {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
      }
      
      .glass-dark {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      /* Gradient text */
      .gradient-text {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      
      /* Shimmer effect */
      .shimmer {
        background: linear-gradient(90deg, 
          rgba(255,255,255,0) 0%, 
          rgba(255,255,255,0.2) 50%, 
          rgba(255,255,255,0) 100%);
        background-size: 200% 100%;
        animation: shimmer 2s infinite;
      }
    </style>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🎯</text></svg>">
    
    <!-- PWA manifest (optional) -->
    <meta name="theme-color" content="#6366f1">
    <meta name="description" content="Modern Event Management System">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" as="style">
  </head>
  <body class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-indigo-50 text-gray-900 antialiased">
    <!-- Animated background elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
      <div class="absolute -top-40 -right-40 w-80 h-80 bg-brand-400/10 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-400/10 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-400/5 rounded-full blur-3xl"></div>
    </div>
    
    <?php include __DIR__ . '/navbar.php'; ?>
    
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
      <?php 
      if (function_exists('render_flash')) {
        render_flash(); 
      }
      ?>
      <div class="py-8 md:py-12">