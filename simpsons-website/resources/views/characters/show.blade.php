<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $character->name }} - Simpsonlar</title>
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
        .character-card {
            background: rgba(255, 255, 255, 0.95);
            border: 3px solid #FF6B35;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
        }
        .character-image {
            border: 4px solid #FF6B35;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 12px;
            object-fit: contain;
            width: 320px !important;
            height: 320px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .character-image:hover {
            transform: scale(1.05);
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
        .action-button {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .placeholder-image {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            font-weight: bold;
            border: 4px solid #FF6B35;
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
            width: 320px !important;
            height: 320px !important;
        }
        @media (max-width: 768px) {
            .character-image {
                width: 240px !important;
                height: 240px !important;
            }
            .placeholder-image {
                width: 240px !important;
                height: 240px !important;
                font-size: 4rem;
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <a href="{{ route('characters.index') }}" 
               class="text-white hover:text-yellow-200 font-semibold text-lg">
                ← Qahramonlar ro'yxatiga qaytish
            </a>
        </div>

        <div class="character-card p-10">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Character Image -->
                <div class="text-center">
                    @php
                        $imagePath = 'images/characters/' . $character->image;
                        $svgPath = 'images/characters/' . str_replace('.jpg', '.svg', $character->image);
                        $imageExists = file_exists(public_path($imagePath));
                        $svgExists = file_exists(public_path($svgPath));
                        $imageSize = $imageExists ? filesize(public_path($imagePath)) : 0;
                        $hasValidImage = $imageExists && $imageSize > 1000; // More than 1KB
                        $hasSvgPlaceholder = $svgExists;
                    @endphp
                    
                    @if($hasValidImage)
                        <img src="{{ asset($imagePath) }}" 
                             alt="{{ $character->name }}" 
                             class="character-image mx-auto">
                    @elseif($hasSvgPlaceholder)
                        <img src="{{ asset($svgPath) }}" 
                             alt="{{ $character->name }}" 
                             class="character-image mx-auto">
                    @else
                        <div class="character-image mx-auto placeholder-image">
                            {{ substr($character->name, 0, 1) }}
                        </div>
                    @endif
                </div>

                <!-- Character Details -->
                <div>
                    <h1 class="text-5xl font-bold mb-8 text-gray-800">{{ $character->name }}</h1>
                    
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-orange-600 mb-3">📝 Tavsif</h3>
                            <p class="text-gray-700 leading-relaxed text-lg">{{ $character->description }}</p>
                        </div>

                        @if($character->voice_actor)
                        <div>
                            <h3 class="text-2xl font-semibold text-orange-600 mb-3">🎭 Ovoz beruvchi</h3>
                            <p class="text-gray-700 text-lg">{{ $character->voice_actor }}</p>
                        </div>
                        @endif

                        @if($character->first_appearance)
                        <div>
                            <h3 class="text-2xl font-semibold text-orange-600 mb-3">📺 Birinchi ko'rinish</h3>
                            <p class="text-gray-700 text-lg">{{ $character->first_appearance }}</p>
                        </div>
                        @endif

                        @if($character->occupation)
                        <div>
                            <h3 class="text-2xl font-semibold text-orange-600 mb-3">💼 Kasbi</h3>
                            <p class="text-gray-700 text-lg">{{ $character->occupation }}</p>
                        </div>
                        @endif

                        @if($character->family)
                        <div>
                            <h3 class="text-2xl font-semibold text-orange-600 mb-3">👨‍👩‍👧‍👦 Oilasi</h3>
                            <p class="text-gray-700 text-lg">{{ $character->family }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    @if(session('is_admin'))
                    <div class="flex space-x-4 mt-10">
                        <a href="{{ route('characters.edit', $character) }}" 
                           class="action-button bg-yellow-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-yellow-600 transition-colors text-lg">
                            ✏️ Tahrirlash
                        </a>
                        <form action="{{ route('characters.destroy', $character) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="action-button bg-red-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-red-600 transition-colors text-lg"
                                    onclick="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">
                                🗑️ O'chirish
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
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