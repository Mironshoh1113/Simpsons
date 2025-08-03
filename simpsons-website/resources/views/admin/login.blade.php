<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kirish - Simpsonlar</title>
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="simpson-card p-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">🔐 Admin Kirish</h2>

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label for="password" class="block text-lg font-semibold text-gray-700 mb-2">🔑 Admin Paroli</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-input"
                           placeholder="Parolni kiriting..."
                           required>
                </div>

                <div class="flex justify-center space-x-4">
                    <button type="submit" 
                            class="bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition-colors">
                        ✅ Kirish
                    </button>
                    <a href="{{ route('home') }}" 
                       class="bg-gray-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-600 transition-colors">
                        ❌ Bekor qilish
                    </a>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    💡 Admin paroli: <strong>admin123</strong>
                </p>
            </div>
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