<?php
$files = glob(__DIR__ . '/resources/views/pages/treatments/*.blade.php');

foreach ($files as $file) {
    if (strpos($file, 'index.blade.php') !== false || strpos($file, 'check-my-teeth.blade.php') !== false) {
        // We will fix check-my-teeth separately just to be safe, actually let's fix all of them.
    }
    
    $content = file_get_contents($file);
    
    // Check if it already has @if($category
    if (strpos($content, '@if($category && $category->treatments)') !== false) {
        continue;
    }
    
    // Replace @foreach($category... with @if... @foreach
    $find = "@foreach(\$category->treatments->where('is_published', true) as \$treatment)";
    $replace = "@if(isset(\$category) && \$category->treatments)\n                @foreach(\$category->treatments->where('is_published', true) as \$treatment)";
    
    $content = str_replace($find, $replace, $content);
    
    // Now replace the @endforeach with @endforeach \n @endif
    // We only want to replace the first @endforeach that comes AFTER the newly placed @if
    // A simple regex to find the matching @endforeach for this specific block:
    $pattern = '/(@if\(isset\(\$category\) && \$category->treatments\)\s*@foreach\(\$category->treatments->where\(\'is_published\', true\) as \$treatment\).*?)@endforeach/s';
    
    $newContent = preg_replace($pattern, "$1@endforeach\n                @endif", $content);
    
    if ($newContent !== $content && $newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Fixed: " . basename($file) . "\n";
    }
}
