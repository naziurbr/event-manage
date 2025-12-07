<?php
// includes/components/input.php
// Assumes a global helper e($value) for HTML escaping.

/**
 * Text-like input field (text, email, password, number, date, time, etc.)
 */
function input_field(
  $type,
  $name,
  $label,
  $value = '',
  $required = false,
  $extraAttrs = '',
  $hint = '',
  $error = '',
  $icon = null,
  $size = 'md'
) {
  $reqAttr = $required ? 'required' : '';
  $ariaInvalid = $error ? 'aria-invalid="true"' : '';
  
  // Size classes
  $sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-3',
    'lg' => 'px-5 py-4 text-lg'
  ];
  $sizeClass = $sizes[$size] ?? $sizes['md'];
  
  // Base classes
  $baseClasses = "block w-full rounded-xl border bg-white/90 backdrop-blur-sm transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-1 shadow-sm";
  
  // State-specific classes
  $normalClasses = "border-gray-300 text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:ring-brand-500/50";
  $errorClasses = "border-rose-400 text-gray-900 placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500/50";
  $inputClasses = $error ? $errorClasses : $normalClasses;
  
  // Generate field ID
  $fieldId = $name . '_' . uniqid();
  
  $html  = '<div class="space-y-2 group/field">';
  
  // Label with floating effect
  $html .=   '<label for="' . e($fieldId) . '" class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600 ' . ($error ? 'text-rose-600' : '') . '">' . e($label);
  if ($required) {
    $html .= '<span class="text-rose-500 ml-1">*</span>';
  }
  $html .=   '</label>';
  
  // Input wrapper with icon support
  $html .=   '<div class="relative">';
  
  // Icon on left if provided
  if ($icon && strpos($extraAttrs, 'icon-position') === false) {
    $html .= '<div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 ' . ($error ? 'text-rose-500' : '') . ' transition-colors duration-300">';
    $html .=   '<i class="' . e($icon) . '"></i>';
    $html .= '</div>';
  }
  
  // The input field
  $html .=     '<input id="' . e($fieldId) . '" type="' . e($type) . '" name="' . e($name) . '" value="' . e($value) . '" ' . $reqAttr . ' ' . $ariaInvalid . ' ' . $extraAttrs . ' ';
  $html .=           'class="' . $baseClasses . ' ' . $inputClasses . ' ' . $sizeClass . ($icon && strpos($extraAttrs, 'icon-position') === false ? ' pl-11' : '') . '" ';
  $html .=           'placeholder="' . ($type === 'password' ? '••••••••' : '') . '" />';
  
  // Password visibility toggle
  if ($type === 'password') {
    $html .= '<button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-300 password-toggle" data-target="' . e($fieldId) . '">';
    $html .=   '<i class="fas fa-eye"></i>';
    $html .= '</button>';
  }
  
  // Clear button for text inputs
  if (in_array($type, ['text', 'email', 'search', 'tel', 'url']) && !empty($value)) {
    $html .= '<button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-300 clear-input" data-target="' . e($fieldId) . '">';
    $html .=   '<i class="fas fa-times-circle"></i>';
    $html .= '</button>';
  }
  
  // Gradient border effect
  $html .= '<div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>';
  
  $html .=   '</div>';
  
  // Hint and error messages
  if ($hint) {
    $html .= '<p class="text-xs text-gray-500 ml-1">' . e($hint) . '</p>';
  }
  if ($error) {
    $html .= '<div class="flex items-center text-xs text-rose-600 ml-1 animate-pulse-slow">';
    $html .=   '<i class="fas fa-exclamation-circle mr-2"></i>';
    $html .=   '<span>' . e($error) . '</span>';
    $html .= '</div>';
  }
  
  $html .= '</div>';
  
  return $html;
}

/**
 * Textarea field with auto-resize
 */
function textarea_field(
  $name,
  $label,
  $value = '',
  $required = false,
  $extraAttrs = '',
  $hint = '',
  $error = '',
  $rows = 4,
  $size = 'md'
) {
  $reqAttr = $required ? 'required' : '';
  $ariaInvalid = $error ? 'aria-invalid="true"' : '';
  
  // Size classes
  $sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-3',
    'lg' => 'px-5 py-4 text-lg'
  ];
  $sizeClass = $sizes[$size] ?? $sizes['md'];
  
  // Base classes
  $baseClasses = "block w-full rounded-xl border bg-white/90 backdrop-blur-sm transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-1 shadow-sm resize-y";
  
  // State-specific classes
  $normalClasses = "border-gray-300 text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:ring-brand-500/50";
  $errorClasses = "border-rose-400 text-gray-900 placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500/50";
  $inputClasses = $error ? $errorClasses : $normalClasses;
  
  // Generate field ID
  $fieldId = $name . '_' . uniqid();
  
  $html  = '<div class="space-y-2 group/field">';
  
  // Label
  $html .=   '<label for="' . e($fieldId) . '" class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600 ' . ($error ? 'text-rose-600' : '') . '">' . e($label);
  if ($required) {
    $html .= '<span class="text-rose-500 ml-1">*</span>';
  }
  $html .=   '</label>';
  
  // Textarea wrapper
  $html .=   '<div class="relative">';
  
  // Textarea field
  $html .=     '<textarea id="' . e($fieldId) . '" name="' . e($name) . '" ' . $reqAttr . ' ' . $ariaInvalid . ' ' . $extraAttrs . ' ';
  $html .=           'class="' . $baseClasses . ' ' . $inputClasses . ' ' . $sizeClass . '" ';
  $html .=           'rows="' . e($rows) . '" ';
  $html .=           'oninput="this.style.height = \'auto\'; this.style.height = (this.scrollHeight) + \'px\'">' . e($value) . '</textarea>';
  
  // Character counter (if maxlength is set)
  if (strpos($extraAttrs, 'maxlength') !== false) {
    preg_match('/maxlength="(\d+)"/', $extraAttrs, $matches);
    if (!empty($matches[1])) {
      $maxLength = $matches[1];
      $currentLength = strlen($value);
      $html .= '<div class="absolute bottom-2 right-3 text-xs text-gray-400">';
      $html .=   '<span id="counter_' . e($fieldId) . '">' . $currentLength . '</span>/' . $maxLength;
      $html .= '</div>';
    }
  }
  
  // Gradient border effect
  $html .= '<div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>';
  
  $html .=   '</div>';
  
  // Hint and error messages
  if ($hint) {
    $html .= '<p class="text-xs text-gray-500 ml-1">' . e($hint) . '</p>';
  }
  if ($error) {
    $html .= '<div class="flex items-center text-xs text-rose-600 ml-1 animate-pulse-slow">';
    $html .=   '<i class="fas fa-exclamation-circle mr-2"></i>';
    $html .=   '<span>' . e($error) . '</span>';
    $html .= '</div>';
  }
  
  $html .= '</div>';
  
  return $html;
}

/**
 * Select field with custom dropdown styling
 * $options: array like [ 'value' => 'Label', ... ]
 * $selected: currently selected value
 */
function select_field(
  $name,
  $label,
  $options = [],
  $selected = '',
  $required = false,
  $extraAttrs = '',
  $hint = '',
  $error = '',
  $icon = null,
  $size = 'md'
) {
  $reqAttr = $required ? 'required' : '';
  $ariaInvalid = $error ? 'aria-invalid="true"' : '';
  
  // Size classes
  $sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-3',
    'lg' => 'px-5 py-4 text-lg'
  ];
  $sizeClass = $sizes[$size] ?? $sizes['md'];
  
  // Base classes
  $baseClasses = "block w-full rounded-xl border bg-white/90 backdrop-blur-sm transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-1 shadow-sm appearance-none cursor-pointer";
  
  // State-specific classes
  $normalClasses = "border-gray-300 text-gray-900 focus:border-brand-500 focus:ring-brand-500/50";
  $errorClasses = "border-rose-400 text-gray-900 focus:border-rose-500 focus:ring-rose-500/50";
  $inputClasses = $error ? $errorClasses : $normalClasses;
  
  // Generate field ID
  $fieldId = $name . '_' . uniqid();
  
  $html  = '<div class="space-y-2 group/field">';
  
  // Label
  $html .=   '<label for="' . e($fieldId) . '" class="block text-sm font-medium text-gray-700 ml-1 transition-all duration-300 group-focus-within/field:text-brand-600 ' . ($error ? 'text-rose-600' : '') . '">' . e($label);
  if ($required) {
    $html .= '<span class="text-rose-500 ml-1">*</span>';
  }
  $html .=   '</label>';
  
  // Select wrapper
  $html .=   '<div class="relative">';
  
  // Icon if provided
  if ($icon) {
    $html .= '<div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within/field:text-brand-500 ' . ($error ? 'text-rose-500' : '') . ' transition-colors duration-300">';
    $html .=   '<i class="' . e($icon) . '"></i>';
    $html .= '</div>';
  }
  
  // Select field
  $html .=     '<select id="' . e($fieldId) . '" name="' . e($name) . '" ' . $reqAttr . ' ' . $ariaInvalid . ' ' . $extraAttrs . ' ';
  $html .=           'class="' . $baseClasses . ' ' . $inputClasses . ' ' . $sizeClass . ($icon ? ' pl-11 pr-10' : ' pr-10') . '">';
  
  // Add placeholder option if no option selected
  if (empty($selected) && !$required) {
    $html .= '<option value="" disabled selected class="text-gray-400">' . e($label) . '...</option>';
  }
  
  foreach ($options as $value => $text) {
    $isSelected = ((string)$value === (string)$selected) ? 'selected' : '';
    $html .= '<option value="' . e($value) . '" ' . $isSelected . ' class="py-2">' . e($text) . '</option>';
  }
  $html .=   '</select>';
  
  // Custom dropdown arrow
  $html .= '<div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">';
  $html .=   '<i class="fas fa-chevron-down transition-transform duration-300 group-focus-within/field:rotate-180"></i>';
  $html .= '</div>';
  
  // Gradient border effect
  $html .= '<div class="absolute inset-0 rounded-xl bg-gradient-to-r from-brand-500/0 via-purple-500/0 to-pink-500/0 group-focus-within/field:from-brand-500/5 group-focus-within/field:via-purple-500/5 group-focus-within/field:to-pink-500/5 pointer-events-none -z-10 transition-all duration-500"></div>';
  
  $html .=   '</div>';
  
  // Hint and error messages
  if ($hint) {
    $html .= '<p class="text-xs text-gray-500 ml-1">' . e($hint) . '</p>';
  }
  if ($error) {
    $html .= '<div class="flex items-center text-xs text-rose-600 ml-1 animate-pulse-slow">';
    $html .=   '<i class="fas fa-exclamation-circle mr-2"></i>';
    $html .=   '<span>' . e($error) . '</span>';
    $html .= '</div>';
  }
  
  $html .= '</div>';
  
  // Add JavaScript for interactive features
  if (!defined('INPUT_JS_ADDED')) {
    $html .= '
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Password visibility toggle
        document.querySelectorAll(".password-toggle").forEach(button => {
          button.addEventListener("click", function() {
            const targetId = this.getAttribute("data-target");
            const input = document.getElementById(targetId);
            const icon = this.querySelector("i");
            if (input.type === "password") {
              input.type = "text";
              icon.classList.remove("fa-eye");
              icon.classList.add("fa-eye-slash");
            } else {
              input.type = "password";
              icon.classList.remove("fa-eye-slash");
              icon.classList.add("fa-eye");
            }
          });
        });
        
        // Clear input button
        document.querySelectorAll(".clear-input").forEach(button => {
          button.addEventListener("click", function() {
            const targetId = this.getAttribute("data-target");
            const input = document.getElementById(targetId);
            input.value = "";
            input.focus();
            this.remove();
          });
        });
        
        // Character counter for textareas
        document.querySelectorAll("textarea[maxlength]").forEach(textarea => {
          const maxLength = textarea.getAttribute("maxlength");
          const counter = document.getElementById("counter_" + textarea.id);
          if (counter) {
            textarea.addEventListener("input", function() {
              counter.textContent = this.value.length;
              if (this.value.length > maxLength * 0.9) {
                counter.classList.add("text-amber-500");
              } else {
                counter.classList.remove("text-amber-500");
              }
            });
          }
        });
        
        // Auto-resize textareas
        document.querySelectorAll("textarea").forEach(textarea => {
          textarea.addEventListener("input", function() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
          });
          // Trigger once on load
          setTimeout(() => {
            textarea.style.height = "auto";
            textarea.style.height = (textarea.scrollHeight) + "px";
          }, 100);
        });
      });
    </script>';
    define('INPUT_JS_ADDED', true);
  }
  
  return $html;
}
?>