<?php
$files = glob(__DIR__ . '/resources/views/pages/treatments/*.blade.php');
foreach ($files as $file) {
    $content = file_get_contents($file);
    // Find all <p> tags inside the cards and add inline style
    $pattern = '/(<div class="why-choose-card.*?<\/h3>\s*)<p>/s';
    $newContent = preg_replace($pattern, '$1<p style="text-align: center !important;">', $content);
    if ($newContent !== $content && $newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Updated: " . basename($file) . "\n";
    }
}
