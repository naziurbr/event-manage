<?php
// includes/components/card.php

function card($title, $body, $footer = '', $options = []) {
  // Default options
  $defaults = [
    'variant' => 'default', // default, glass, gradient, bordered, elevated
    'size' => 'md', // sm, md, lg, xl
    'image' => null,
    'imageAlt' => '',
    'imageHeight' => 'h-48',
    'icon' => null,
    'badge' => null,
    'badgeColor' => 'brand',
    'shadow' => true,
    'hover' => true,
    'padding' => null,
    'border' => true,
    'action' => null, // Array with ['label', 'url', 'variant']
    'actions' => [], // Multiple actions
    'headerAction' => null,
    'color' => null, // Custom gradient color
  ];
  
  $options = array_merge($defaults, $options);
  
  // Size classes
  $sizes = [
    'sm' => ['card' => 'p-4', 'title' => 'text-base', 'gap' => 'gap-2'],
    'md' => ['card' => 'p-6', 'title' => 'text-lg', 'gap' => 'gap-3'],
    'lg' => ['card' => 'p-8', 'title' => 'text-xl', 'gap' => 'gap-4'],
    'xl' => ['card' => 'p-10', 'title' => 'text-2xl', 'gap' => 'gap-5']
  ];
  $sizeConfig = $sizes[$options['size']] ?? $sizes['md'];
  
  // Variant classes
  $variants = [
    'default' => [
      'card' => 'bg-white border-gray-200',
      'header' => '',
      'footer' => 'bg-gray-50 border-gray-200'
    ],
    'glass' => [
      'card' => 'glass border-white/20 backdrop-blur-xl',
      'header' => '',
      'footer' => 'glass-dark border-white/10'
    ],
    'gradient' => [
      'card' => 'bg-gradient-to-br from-white to-gray-50 border-gray-300',
      'header' => '',
      'footer' => 'bg-gradient-to-r from-gray-50 to-gray-100 border-gray-300'
    ],
    'bordered' => [
      'card' => 'bg-white border-2 border-gray-300',
      'header' => '',
      'footer' => 'bg-gray-100 border-t-2 border-gray-300'
    ],
    'elevated' => [
      'card' => 'bg-white border-none',
      'header' => '',
      'footer' => 'bg-white'
    ]
  ];
  
  // Custom gradient color
  if ($options['color'] && $options['variant'] === 'gradient') {
    $colorMap = [
      'brand' => 'from-brand-50 to-white',
      'blue' => 'from-blue-50 to-white',
      'green' => 'from-emerald-50 to-white',
      'red' => 'from-rose-50 to-white',
      'purple' => 'from-purple-50 to-white',
      'amber' => 'from-amber-50 to-white'
    ];
    $variants['gradient']['card'] = 'bg-gradient-to-br ' . ($colorMap[$options['color']] ?? 'from-brand-50 to-white') . ' border-gray-300';
  }
  
  $variantConfig = $variants[$options['variant']] ?? $variants['default'];
  
  // Badge colors
  $badgeColors = [
    'brand' => 'bg-gradient-to-r from-brand-500 to-brand-600 text-white',
    'blue' => 'bg-gradient-to-r from-blue-500 to-cyan-600 text-white',
    'green' => 'bg-gradient-to-r from-emerald-500 to-green-600 text-white',
    'red' => 'bg-gradient-to-r from-rose-500 to-red-600 text-white',
    'purple' => 'bg-gradient-to-r from-purple-500 to-pink-600 text-white',
    'amber' => 'bg-gradient-to-r from-amber-500 to-orange-600 text-white',
    'gray' => 'bg-gradient-to-r from-gray-500 to-gray-600 text-white'
  ];
  
  // Build CSS classes
  $cardClasses = "rounded-2xl overflow-hidden transition-all duration-300 " . $variantConfig['card'];
  
  if ($options['shadow']) {
    $cardClasses .= " shadow-lg hover:shadow-xl";
  }
  
  if ($options['hover']) {
    $cardClasses .= " transform hover:-translate-y-1";
  }
  
  if ($options['border']) {
    $cardClasses .= " border";
  }
  
  // Override padding if specified
  $paddingClass = $options['padding'] ?? $sizeConfig['card'];
  
  // Start building HTML
  $html = '<div class="' . $cardClasses . ' group">';
  
  // Image section
  if ($options['image']) {
    $html .= '<div class="relative ' . $options['imageHeight'] . ' overflow-hidden">';
    $html .=   '<img src="' . e($options['image']) . '" alt="' . e($options['imageAlt']) . '" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">';
    $html .=   '<div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>';
    
    // Badge on image
    if ($options['badge']) {
      $html .= '<div class="absolute top-4 right-4">';
      $html .=   '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' . ($badgeColors[$options['badgeColor']] ?? $badgeColors['brand']) . ' shadow-md">';
      $html .=     e($options['badge']);
      $html .=   '</span>';
      $html .= '</div>';
    }
    $html .= '</div>';
  }
  
  // Card content
  $html .= '<div class="' . $paddingClass . '">';
  
  // Header section
  $html .= '<div class="flex items-start justify-between ' . $sizeConfig['gap'] . ' mb-4">';
  
  // Title with optional icon
  $html .= '<div class="flex items-center ' . $sizeConfig['gap'] . '">';
  if ($options['icon']) {
    $html .= '<div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white shadow-md">';
    $html .=   '<i class="' . e($options['icon']) . '"></i>';
    $html .= '</div>';
  }
  
  $html .= '<div>';
  $html .=   '<h3 class="' . $sizeConfig['title'] . ' font-bold text-gray-900">' . e($title) . '</h3>';
  
  // Badge (if not on image)
  if ($options['badge'] && !$options['image']) {
    $html .= '<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium mt-1 ' . ($badgeColors[$options['badgeColor']] ?? $badgeColors['brand']) . '">';
    $html .=   e($options['badge']);
    $html .= '</span>';
  }
  $html .= '</div>';
  
  $html .= '</div>'; // Close title/icon container
  
  // Header action
  if ($options['headerAction']) {
    $html .= '<div class="flex-shrink-0">';
    $html .=   '<button class="p-2 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors duration-300">';
    $html .=     '<i class="fas fa-ellipsis-h"></i>';
    $html .=   '</button>';
    $html .= '</div>';
  }
  
  $html .= '</div>'; // Close header section
  
  // Body content
  $html .= '<div class="text-gray-700 leading-relaxed ' . ($options['image'] ? 'mt-4' : '') . '">';
  $html .=   $body; // Body is already HTML, no escaping needed
  $html .= '</div>';
  
  // Actions section (if provided)
  if (!empty($options['actions']) || $options['action']) {
    $actions = !empty($options['actions']) ? $options['actions'] : [$options['action']];
    $html .= '<div class="mt-6 flex flex-wrap gap-3">';
    foreach ($actions as $action) {
      if ($action) {
        $variant = $action['variant'] ?? 'outline';
        $size = $action['size'] ?? 'sm';
        $icon = $action['icon'] ?? null;
        $iconPosition = $action['iconPosition'] ?? 'left';
        
        // Use the btn function from button.php if available
        if (function_exists('btn')) {
          $html .= btn($action['label'], $variant, 'href="' . e($action['url']) . '"', $icon, $iconPosition, $size);
        } else {
          // Fallback button
          $html .= '<a href="' . e($action['url']) . '" class="inline-flex items-center px-4 py-2 rounded-lg bg-brand-500 text-white hover:bg-brand-600 transition-colors duration-300">';
          if ($icon && $iconPosition === 'left') {
            $html .= '<i class="' . e($icon) . ' mr-2"></i>';
          }
          $html .= e($action['label']);
          if ($icon && $iconPosition === 'right') {
            $html .= '<i class="' . e($icon) . ' ml-2"></i>';
          }
          $html .= '</a>';
        }
      }
    }
    $html .= '</div>';
  }
  
  $html .= '</div>'; // Close card content
  
  // Footer section
  if ($footer) {
    $html .= '<div class="' . $paddingClass . ' pt-6 mt-6 border-t ' . $variantConfig['footer'] . '">';
    $html .=   $footer;
    $html .= '</div>';
  }
  
  $html .= '</div>'; // Close card
  
  return $html;
}

// Convenience functions for common card types
function event_card($event, $options = []) {
  $defaults = [
    'variant' => 'default',
    'showDate' => true,
    'showLocation' => true,
    'showOrganizer' => true,
    'showPrice' => true,
    'showAttendees' => false,
    'actionLabel' => 'View Details'
  ];
  
  $options = array_merge($defaults, $options);
  
  $body = '';
  
  // Event description
  if (!empty($event['description'])) {
    $description = strlen($event['description']) > 150 
      ? substr($event['description'], 0, 150) . '...' 
      : $event['description'];
    $body .= '<p class="text-gray-600 mb-4">' . e($description) . '</p>';
  }
  
  // Event details
  $body .= '<div class="space-y-3">';
  
  if ($options['showDate'] && !empty($event['date'])) {
    $body .= '<div class="flex items-center text-gray-700">';
    $body .=   '<i class="fas fa-calendar-day text-brand-500 mr-3 w-5"></i>';
    $body .=   '<span>' . e($event['date']) . '</span>';
    $body .= '</div>';
  }
  
  if ($options['showLocation'] && !empty($event['location'])) {
    $body .= '<div class="flex items-center text-gray-700">';
    $body .=   '<i class="fas fa-map-marker-alt text-brand-500 mr-3 w-5"></i>';
    $body .=   '<span>' . e($event['location']) . '</span>';
    $body .= '</div>';
  }
  
  if ($options['showOrganizer'] && !empty($event['organizer'])) {
    $body .= '<div class="flex items-center text-gray-700">';
    $body .=   '<i class="fas fa-user text-brand-500 mr-3 w-5"></i>';
    $body .=   '<span>By ' . e($event['organizer']) . '</span>';
    $body .= '</div>';
  }
  
  if ($options['showPrice'] && isset($event['price'])) {
    $priceText = $event['price'] == 0 ? 'Free' : '$' . number_format($event['price'], 2);
    $body .= '<div class="flex items-center text-gray-700">';
    $body .=   '<i class="fas fa-tag text-brand-500 mr-3 w-5"></i>';
    $body .=   '<span>' . e($priceText) . '</span>';
    $body .= '</div>';
  }
  
  $body .= '</div>';
  
  // Footer with action
  $footer = '';
  if (!empty($event['url'])) {
    $footer .= '<a href="' . e($event['url']) . '" class="inline-flex items-center justify-center w-full px-4 py-3 bg-gradient-to-r from-brand-500 to-brand-600 text-white rounded-xl hover:shadow-lg hover:shadow-brand-500/30 transform hover:-translate-y-0.5 transition-all duration-300 group">';
    $footer .=   '<span>' . e($options['actionLabel']) . '</span>';
    $footer .=   '<i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>';
    $footer .= '</a>';
  }
  
  // Set card options
  $cardOptions = [
    'variant' => $options['variant'],
    'image' => $event['image'] ?? null,
    'imageAlt' => $event['title'] ?? 'Event image',
    'badge' => $event['category'] ?? null,
    'badgeColor' => $event['categoryColor'] ?? 'brand',
    'hover' => true,
    'padding' => 'p-6'
  ];
  
  return card(
    $event['title'] ?? 'Event',
    $body,
    $footer,
    $cardOptions
  );
}

function info_card($title, $body, $icon = 'fas fa-info-circle', $variant = 'gradient') {
  $options = [
    'variant' => $variant,
    'icon' => $icon,
    'hover' => false,
    'shadow' => false,
    'border' => true
  ];
  
  return card($title, $body, '', $options);
}
?>