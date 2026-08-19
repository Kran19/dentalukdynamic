@props([
    'title' => 'Icon Dental- Wembley | Exceptional Dental Care',
    'description' => 'At Icon Dental- Wembley, we combine advanced technology with a gentle, personal touch to create healthy, confident smiles that last a lifetime.'
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=18') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css?v=4') }}">
</head>
<body>

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Component -->
    <x-footer />

</body>
</html>
