# 🍩 Simpsonlar Veb Sayti

Bu Laravel 10 da yaratilgan Simpsonlar seriali qahramonlari haqida ma'lumot beruvchi veb sayt.

## 🚀 Xususiyatlar

- **Bosh sahifa**: Simpsonlar seriali haqida umumiy ma'lumot
- **Qahramonlar ro'yxati**: Barcha qahramonlarni ko'rish
- **Qahramon ma'lumotlari**: Har bir qahramon haqida batafsil ma'lumot
- **Qahramon qo'shish**: Yangi qahramon qo'shish imkoniyati
- **Qahramon tahrirlash**: Mavjud qahramonlarni tahrirlash
- **Qahramon o'chirish**: Qahramonlarni o'chirish

## 🛠️ Texnologiyalar

- **Laravel 10** - Backend framework
- **PHP 8.1+** - Programming language
- **MySQL** - Database
- **Tailwind CSS** - Frontend styling
- **Blade Templates** - View engine

## 📋 O'rnatish

1. **Loyihani klonlash**:
```bash
git clone <repository-url>
cd simpsons-website
```

2. **Dependencylarni o'rnatish**:
```bash
composer install
```

3. **Environment faylini sozlash**:
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database sozlash**:
```bash
php artisan migrate
php artisan db:seed
```

5. **Loyihani ishga tushirish**:
```bash
php artisan serve
```

## 📁 Loyiha tuzilishi

```
simpsons-website/
├── app/
│   ├── Http/Controllers/
│   │   ├── CharacterController.php
│   │   └── HomeController.php
│   └── Models/
│       └── Character.php
├── database/
│   ├── migrations/
│   │   └── create_characters_table.php
│   └── seeders/
│       ├── CharacterSeeder.php
│       └── DatabaseSeeder.php
├── resources/views/
│   ├── welcome.blade.php
│   └── characters/
│       ├── index.blade.php
│       ├── show.blade.php
│       ├── create.blade.php
│       └── edit.blade.php
├── public/
│   └── images/
│       └── characters/
└── routes/
    └── web.php
```

## 🎨 Dizayn

Sayt Simpsonlar serialiga mos ravishda dizayn qilingan:
- **Ranglar**: Sariq, to'q sariq va qizil gradient
- **Font**: Comic Sans MS
- **Elementlar**: Yumshoq burchaklar va Simpsonlar mavzusiga mos

## 📊 Database tuzilishi

**Characters jadvali**:
- `id` - Asosiy kalit
- `name` - Qahramon nomi
- `description` - Qahramon tavsifi
- `image` - Qahramon rasmi
- `voice_actor` - Ovoz beruvchi
- `first_appearance` - Birinchi ko'rinish
- `occupation` - Kasbi
- `family` - Oilasi
- `created_at` - Yaratilgan vaqt
- `updated_at` - Yangilangan vaqt

## 🎯 API Endpointlar

- `GET /` - Bosh sahifa
- `GET /characters` - Qahramonlar ro'yxati
- `GET /characters/create` - Yangi qahramon qo'shish sahifasi
- `POST /characters` - Yangi qahramon saqlash
- `GET /characters/{id}` - Qahramon ma'lumotlari
- `GET /characters/{id}/edit` - Qahramon tahrirlash sahifasi
- `PUT /characters/{id}` - Qahramon yangilash
- `DELETE /characters/{id}` - Qahramon o'chirish

## 🎭 Namuna qahramonlar

Seeder orqali quyidagi qahramonlar qo'shiladi:
- Homer Simpson
- Marge Simpson
- Bart Simpson
- Lisa Simpson
- Maggie Simpson
- Mr. Burns

## 🔧 Rasm qo'shish

Qahramon rasmlarini `public/images/characters/` papkasiga joylashtiring.

## 📝 Muallif

Bu loyiha Simpsonlar serialining muxlislari uchun yaratilgan.

## 📄 Litsenziya

MIT License
