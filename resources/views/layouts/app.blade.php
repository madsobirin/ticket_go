<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title ?? 'Lintas Lampung' }} — Layanan Travel Antar Kota</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'forest-900': '#173B35',
                        'forest-700': '#285A4E',
                        'sage-100': '#E8EFE8',
                        'surface-container-low': '#f0f5ee',
                        'surface-container': '#ebefe8',
                        'paper-0': '#ffffff',
                        'ink-900': '#202521',
                        'ink-600': '#65716A',
                        'amber-500': '#D9953D',
                        'red-600': '#B94B43',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        serif: ['Source Serif 4', 'serif'],
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>
<body class="bg-[#f6fbf4] text-ink-900 font-sans antialiased min-h-screen flex flex-col">
    @yield('body')

    @includeWhen(view()->exists('partials.role-switcher'), 'partials.role-switcher')

    @stack('scripts')
</body>
</html>
