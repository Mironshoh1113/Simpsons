<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $character->name }}ni Tahrirlash - Simpsonlar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF6347 100%);
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .simpson-card {
            background: rgba(255, 255, 255, 0.9);
            border: 3px solid #FF6B35;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .simpson-header {
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            color: white;
        }
        .form-input {
            border: 2px solid #FF6B35;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
        }
        .form-input:focus {
            outline: none;
            border-color: #F7931E;
            box-shadow: 0 0 5px rgba(255, 107, 53, 0.3);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="simpson-header shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-3xl font-bold text-white">🍩 Simpsonlar</h1>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-white hover:text-yellow-200 font-semibold">Bosh Sahifa</a>
                    <a href="{{ route('characters.index') }}" class="text-white hover:text-yellow-200 font-semibold">Qahramonlar</a>
                    @if(session('is_admin'))
                        <a href="{{ route('admin.logout') }}" class="text-white hover:text-yellow-200 font-semibold">🔓 Chiqish</a>
                    @else
                        <a href="{{ route('admin.login') }}" class="text-white hover:text-yellow-200 font-semibold">🔐 Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="{{ route('characters.show', $character) }}" 
               class="text-white hover:text-yellow-200 font-semibold">
                ← {{ $character->name }} sahifasiga qaytish
            </a>
        </div>

        <div class="simpson-card p-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">✏️ {{ $character->name }}ni Tahrirlash</h2>

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('characters.update', $character) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">🌟 Qahramon nomi</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $character->name) }}" 
                               class="form-input"
                               required>
                    </div>

                    <div>
                        <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">🖼️ Rasm (ixtiyoriy)</label>
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="form-input">
                        @if($character->image)
                        <p class="text-sm text-gray-600 mt-1">Hozirgi rasm: {{ $character->image }}</p>
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-lg font-semibold text-gray-700 mb-2">📝 Tavsif</label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4" 
                                  class="form-input"
                                  required>{{ old('description', $character->description) }}</textarea>
                    </div>

                    <div>
                        <label for="voice_actor" class="block text-lg font-semibold text-gray-700 mb-2">🎭 Ovoz beruvchi</label>
                        <input type="text" 
                               id="voice_actor" 
                               name="voice_actor" 
                               value="{{ old('voice_actor', $character->voice_actor) }}" 
                               class="form-input">
                    </div>

                    <div>
                        <label for="first_appearance" class="block text-lg font-semibold text-gray-700 mb-2">📺 Birinchi ko'rinish</label>
                        <input type="text" 
                               id="first_appearance" 
                               name="first_appearance" 
                               value="{{ old('first_appearance', $character->first_appearance) }}" 
                               class="form-input"
                               placeholder="Masalan: Season 1, Episode 1">
                    </div>

                    <div>
                        <label for="occupation" class="block text-lg font-semibold text-gray-700 mb-2">💼 Kasbi</label>
                        <input type="text" 
                               id="occupation" 
                               name="occupation" 
                               value="{{ old('occupation', $character->occupation) }}" 
                               class="form-input"
                               placeholder="Masalan: Springfield Atom Elektr Stansiyasi">
                    </div>

                    <div>
                        <label for="family" class="block text-lg font-semibold text-gray-700 mb-2">👨‍👩‍👧‍👦 Oilasi</label>
                        <input type="text" 
                               id="family" 
                               name="family" 
                               value="{{ old('family', $character->family) }}" 
                               class="form-input"
                               placeholder="Masalan: Homer, Marge, Bart, Lisa, Maggie">
                    </div>
                </div>

                <div class="flex justify-center space-x-4 mt-8">
                    <button type="submit" 
                            class="bg-blue-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-600 transition-colors">
                        ✅ Yangilash
                    </button>
                    <a href="{{ route('characters.show', $character) }}" 
                       class="bg-gray-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-600 transition-colors">
                        ❌ Bekor qilish
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="simpson-header mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-white">
                <p class="text-lg">© 2024 Simpsonlar Fan Sahifasi</p>
                <p class="text-sm mt-2">Springfield shahri, USA</p>
            </div>
        </div>
    </footer>
</body>
</html> 