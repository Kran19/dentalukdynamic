<?php
$files = glob(__DIR__ . '/resources/views/pages/treatments/*.blade.php');
$replacement = <<<EOF
            <div class="row g-4 justify-content-center mb-5">
                @foreach(\$category->treatments->where('is_published', true) as \$treatment)
                <div class="col-md-6 col-lg-3" id="treatment-{{ \$treatment->id }}">
                    <div class="why-choose-card text-center p-4">
                        <i class="{{ \$treatment->icon_class }} mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>{{ \$treatment->name }}</h3>
                        <p>{{ \$treatment->short_desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
EOF;

foreach ($files as $file) {
    if (strpos($file, 'index.blade.php') !== false || strpos($file, 'check-my-teeth.blade.php') !== false) {
        continue;
    }
    $content = file_get_contents($file);
    
    // Use regex to replace the specific row block
    $pattern = '/<div class="row g-4 justify-content-center mb-5">.*?<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*(?=<div class="mb-5">|<!--|<div class="cta-banner|<section)/s';
    
    $newContent = preg_replace($pattern, $replacement . "\n\n            ", $content);
    if ($newContent !== $content && $newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Updated: " . basename($file) . "\n";
    } else {
        echo "Failed or unchanged: " . basename($file) . "\n";
    }
}
