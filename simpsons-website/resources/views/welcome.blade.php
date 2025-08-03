<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpsonlar - Barcha Qahramonlar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF6347 100%);
            font-family: 'Comic Sans MS', cursive, sans-serif;
            min-height: 100vh;
        }
        .simpson-header {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
            box-shadow: 0 4px 20px rgba(255, 107, 53, 0.3);
        }
        .hero-section {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 165, 0, 0.1) 50%, rgba(255, 99, 71, 0.1) 100%);
            backdrop-filter: blur(10px);
        }
        .character-card {
            background: rgba(255, 255, 255, 0.95);
            border: 3px solid #FF6B35;
            border-radius: 25px;
            transition: all 0.4s ease;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.2);
            position: relative;
            z-index: 1;
        }
        .character-name-badge {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            font-weight: bold;
            border: 2px solid #FF4500;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .action-button-enhanced {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            font-weight: bold;
            border: 2px solid #FF4500;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .text-enhanced {
            color: #1a202c !important;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
            font-weight: 900;
        }
        .character-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(255, 107, 53, 0.4);
        }
        .character-image {
            border: 4px solid #FF6B35;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 12px;
            object-fit: contain;
            width: 192px !important;
            height: 192px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .character-image:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(255, 107, 53, 0.5);
        }
        .character-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            padding: 1.5rem;
        }
        .placeholder-image {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            font-weight: bold;
            border: 4px solid #FF6B35;
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
            width: 192px !important;
            height: 192px !important;
        }
        .about-card {
            background: rgba(255, 255, 255, 0.95);
            border: 3px solid #FF6B35;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
        }
        .cta-button {
            background: linear-gradient(45deg, #FFD700, #FFA500);
            border: 3px solid #FF6B35;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 107, 53, 0.5);
        }
        .nav-link {
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px 16px;
        }
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        @media (min-width: 768px) {
            .character-grid {
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            }
        }
        @media (min-width: 1024px) {
            .character-grid {
                grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            }
        }
        @media (min-width: 1280px) {
            .character-grid {
                grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            }
        }
        @media (max-width: 640px) {
            .character-image {
                width: 160px !important;
                height: 160px !important;
            }
            .placeholder-image {
                width: 160px !important;
                height: 160px !important;
                font-size: 3rem;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="simpson-header shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-4xl font-bold text-white">🍩 Simpsonlar</h1>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('home') }}" class="nav-link text-white hover:text-yellow-200 font-semibold">🏠 Bosh Sahifa</a>
                    <a href="{{ route('characters.index') }}" class="nav-link text-white hover:text-yellow-200 font-semibold">🌟 Qahramonlar</a>
                    @if(session('is_admin'))
                        <a href="{{ route('admin.logout') }}" class="nav-link text-white hover:text-yellow-200 font-semibold">🔓 Chiqish</a>
                    @else
                        <a href="{{ route('admin.login') }}" class="nav-link text-white hover:text-yellow-200 font-semibold">🔐 Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section relative py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-6xl md:text-7xl font-bold text-white mb-8 drop-shadow-lg">
                🍩 Simpsonlar Oilasi
            </h1>
            <p class="text-2xl text-white mb-10 max-w-4xl mx-auto drop-shadow-md leading-relaxed">
                Springfield shahridagi eng mashhur oila haqida barcha ma'lumotlar. 
                Homer, Marge, Bart, Lisa va Maggie Simpsonlar oilasining sarguzashtlari.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('characters.index') }}" 
                   class="cta-button text-gray-800 px-8 py-4 rounded-xl text-xl font-bold inline-block">
                    🌟 Barcha Qahramonlarni Ko'rish
                </a>
            </div>
        </div>
    </div>

    <!-- About The Simpsons -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="about-card p-10 mb-16">
            <h2 class="text-4xl font-bold text-center mb-8 text-gray-800">
                🎬 Simpsonlar Seriali Haqida
            </h2>
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-orange-600">📺 Serial Tarixi</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        Simpsonlar 1989-yilda Matt Groening tomonidan yaratilgan animatsion komediya serialidir. 
                        Serial Springfield shahridagi Simpsonlar oilasining kundalik hayotini ko'rsatadi. 
                        Bu serial dunyodagi eng uzoq davom etgan animatsion serial hisoblanadi va 30+ yildan beri davom etmoqda.
                    </p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-orange-600">👨‍👩‍👧‍👦 Asosiy Qahramonlar</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        <strong>Homer Simpson</strong> - oilaning boshlig'i, Springfield Atom Elektr Stansiyasida ishlaydi. 
                        <strong>Marge Simpson</strong> - uy bekasi, ko'k sochli va sokin xarakter. 
                        <strong>Bart Simpson</strong> - 10 yoshli o'g'il, do'stona va qiziq. 
                        <strong>Lisa Simpson</strong> - 8 yoshli qiz, aqlli va saxovatli.
                    </p>
                </div>
            </div>
        </div>

        <!-- Featured Characters -->
        <div class="mb-16">
            <h2 class="text-4xl font-bold text-center mb-12 text-white drop-shadow-lg">
                🌟 Mashhur Qahramonlar
            </h2>
            <div class="character-grid">
                @forelse($characters as $character)
                @php
                    $imagePath = 'images/characters/' . $character->image;
                    $svgPath = 'images/characters/' . str_replace('.jpg', '.svg', $character->image);
                    $imageExists = file_exists(public_path($imagePath));
                    $svgExists = file_exists(public_path($svgPath));
                    $imageSize = $imageExists ? filesize(public_path($imagePath)) : 0;
                    $hasValidImage = $imageExists && $imageSize > 1000; // More than 1KB
                    $hasSvgPlaceholder = $svgExists;
                @endphp
                <div class="character-card p-8 text-center">
                    <div class="relative mb-8">
                        @if($hasValidImage)
                            <img src="{{ asset($imagePath) }}" 
                                 alt="{{ $character->name }}" 
                                 class="character-image w-48 h-48 mx-auto object-contain shadow-lg">
                        @elseif($hasSvgPlaceholder)
                            <img src="{{ asset($svgPath) }}" 
                                 alt="{{ $character->name }}" 
                                 class="character-image w-48 h-48 mx-auto object-contain shadow-lg">
                        @else
                            <div class="character-image w-48 h-48 mx-auto placeholder-image">
                                {{ substr($character->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 character-name-badge px-4 py-2 rounded-full text-sm font-bold z-30">
                            {{ $character->name }}
                        </div>
                    </div>
                    <div class="space-y-6">
                        <p class="text-gray-700 leading-relaxed text-base">
                            {{ strlen($character->description) > 150 ? substr($character->description, 0, 150) . '...' : $character->description }}
                        </p>
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('characters.show', $character) }}" 
                               class="action-button-enhanced px-6 py-3 rounded-lg hover:bg-orange-700 transition-colors font-semibold relative z-20">
                                👁️ Batafsil
                            </a>
                            @if(session('is_admin'))
                            <a href="{{ route('characters.edit', $character) }}" 
                               class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors font-semibold shadow-lg">
                                ✏️ Tahrirlash
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="bg-white bg-opacity-95 rounded-3xl p-12 max-w-lg mx-auto shadow-2xl">
                        <div class="text-8xl mb-6">🍩</div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-6">Hali qahramonlar qo'shilmagan</h3>
                        <p class="text-gray-600 mb-8 text-lg">Birinchi qahramonni qo'shish orqali sahifani to'ldiring!</p>
                        <a href="{{ route('characters.create') }}" 
                           class="bg-orange-500 text-white px-10 py-4 rounded-xl hover:bg-orange-600 transition-colors inline-block font-bold text-xl shadow-lg">
                            ➕ Qahramon Qo'shish
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <a href="{{ route('characters.index') }}" 
               class="cta-button text-gray-800 px-12 py-6 rounded-xl text-2xl font-bold inline-block">
                🍩 Barcha Qahramonlarni Ko'rish
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="simpson-header mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center text-white">
                <p class="text-2xl font-bold mb-4">© 2024 Simpsonlar Fan Sahifasi</p>
                <p class="text-lg">Springfield shahri, USA</p>
                <div class="mt-6 text-3xl">
                    🍩 🌟 🎬
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
