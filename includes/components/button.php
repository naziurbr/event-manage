<?php
// includes/components/button.php

function btn($label, $variant = 'primary', $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  // Base classes for all buttons
  $baseClasses = "inline-flex items-center justify-center font-medium rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white disabled:opacity-50 disabled:cursor-not-allowed group relative overflow-hidden";
  
  // Size classes
  $sizes = [
    'xs' => 'px-3 py-1.5 text-xs',
    'sm' => 'px-4 py-2 text-sm',
    'md' => 'px-5 py-2.5',
    'lg' => 'px-6 py-3 text-lg',
    'xl' => 'px-8 py-4 text-xl'
  ];
  
  // Variant classes with modern gradients and effects
  $variants = [
    'primary' => [
      'classes' => 'bg-gradient-to-r from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/25 hover:shadow-xl hover:shadow-brand-500/40 hover:-translate-y-0.5 active:translate-y-0 focus:ring-brand-500',
      'hoverEffect' => 'group-hover:from-brand-600 group-hover:to-brand-700',
      'shine' => true,
      'iconColor' => 'text-white'
    ],
    'secondary' => [
      'classes' => 'bg-white text-gray-800 border-2 border-gray-200 shadow-sm hover:shadow-md hover:border-brand-300 hover:bg-gray-50 hover:-translate-y-0.5 active:translate-y-0 focus:ring-brand-500',
      'hoverEffect' => 'group-hover:border-brand-400',
      'shine' => false,
      'iconColor' => 'text-gray-600 group-hover:text-brand-600'
    ],
    'danger' => [
      'classes' => 'bg-gradient-to-r from-rose-500 to-red-600 text-white shadow-lg shadow-rose-500/25 hover:shadow-xl hover:shadow-rose-500/40 hover:-translate-y-0.5 active:translate-y-0 focus:ring-rose-500',
      'hoverEffect' => 'group-hover:from-rose-600 group-hover:to-red-700',
      'shine' => true,
      'iconColor' => 'text-white'
    ],
    'success' => [
      'classes' => 'bg-gradient-to-r from-emerald-500 to-green-600 text-white shadow-lg shadow-emerald-500/25 hover:shadow-xl hover:shadow-emerald-500/40 hover:-translate-y-0.5 active:translate-y-0 focus:ring-emerald-500',
      'hoverEffect' => 'group-hover:from-emerald-600 group-hover:to-green-700',
      'shine' => true,
      'iconColor' => 'text-white'
    ],
    'warning' => [
      'classes' => 'bg-gradient-to-r from-amber-500 to-orange-600 text-white shadow-lg shadow-amber-500/25 hover:shadow-xl hover:shadow-amber-500/40 hover:-translate-y-0.5 active:translate-y-0 focus:ring-amber-500',
      'hoverEffect' => 'group-hover:from-amber-600 group-hover:to-orange-700',
      'shine' => true,
      'iconColor' => 'text-white'
    ],
    'outline' => [
      'classes' => 'bg-transparent text-brand-600 border-2 border-brand-500 hover:bg-brand-500/10 hover:-translate-y-0.5 active:translate-y-0 focus:ring-brand-500',
      'hoverEffect' => 'group-hover:bg-brand-500/20',
      'shine' => false,
      'iconColor' => 'text-brand-600'
    ],
    'ghost' => [
      'classes' => 'bg-transparent text-gray-600 hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-0.5 active:translate-y-0 focus:ring-gray-500',
      'hoverEffect' => '',
      'shine' => false,
      'iconColor' => 'text-gray-500 group-hover:text-gray-700'
    ],
    'glass' => [
      'classes' => 'backdrop-blur-sm bg-white/10 text-white border border-white/20 hover:bg-white/20 hover:border-white/30 hover:-translate-y-0.5 active:translate-y-0 focus:ring-white/50',
      'hoverEffect' => 'group-hover:bg-white/30',
      'shine' => false,
      'iconColor' => 'text-white'
    ]
  ];
  
  // Get the selected variant or default to primary
  $variantConfig = $variants[$variant] ?? $variants['primary'];
  $sizeClass = $sizes[$size] ?? $sizes['md'];
  
  // Build the button HTML
  $buttonHTML = '<button class="' . $baseClasses . ' ' . $variantConfig['classes'] . ' ' . $sizeClass . '" ' . $attrs . '>';
  
  // Add shine effect for certain variants
  if ($variantConfig['shine']) {
    $buttonHTML .= '<span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent group-hover:translate-x-full transition-transform duration-700"></span>';
  }
  
  // Add hover effect layer
  if (!empty($variantConfig['hoverEffect'])) {
    $buttonHTML .= '<span class="absolute inset-0 ' . $variantConfig['hoverEffect'] . ' opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></span>';
  }
  
  // Add icon if provided
  if ($icon) {
    $iconHTML = '<i class="' . $icon . ' ' . $variantConfig['iconColor'] . ' transition-colors duration-300"></i>';
    
    if ($iconPosition === 'left') {
      $buttonHTML .= $iconHTML . '<span class="ml-2">' . e($label) . '</span>';
    } else {
      $buttonHTML .= '<span class="mr-2">' . e($label) . '</span>' . $iconHTML;
    }
    
    // Add arrow icon for primary buttons
    if ($variant === 'primary' && $iconPosition === 'right') {
      $buttonHTML = str_replace(
        '</button>',
        '<i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i></button>',
        $buttonHTML
      );
    }
  } else {
    $buttonHTML .= e($label);
  }
  
  $buttonHTML .= '</button>';
  
  return $buttonHTML;
}

// Convenience functions for common button types
function btn_primary($label, $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  return btn($label, 'primary', $attrs, $icon, $iconPosition, $size);
}

function btn_secondary($label, $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  return btn($label, 'secondary', $attrs, $icon, $iconPosition, $size);
}

function btn_danger($label, $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  return btn($label, 'danger', $attrs, $icon, $iconPosition, $size);
}

function btn_success($label, $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  return btn($label, 'success', $attrs, $icon, $iconPosition, $size);
}

function btn_outline($label, $attrs = '', $icon = null, $iconPosition = 'left', $size = 'md') {
  return btn($label, 'outline', $attrs, $icon, $iconPosition, $size);
}
?>