# MEDCASE loyihasi uchun texnik topshiriq

## 1. Hujjat maqsadi

Ushbu texnik topshiriq MEDCASE Clinical Simulation loyihasining mavjud kod bazasi asosida tizimning vazifasi, funksional va nofunksional talablari, arxitekturasi, ma'lumotlar modeli, API talablari, xavfsizlik, testlash va qabul mezonlarini belgilaydi.

Hujjat quyidagi manbalarga tayangan holda tuzildi:

- `README.md` - loyiha tavsifi va backend arxitekturasi.
- `database/medcase.sql` - MySQL sxemasi va demo klinik keyslar.
- `api/index.php` - API marshrutlari.
- `app/` - controller, service, repository va core qatlamlari.
- `index.php`, `login.php`, `dashboard.php`, `patients.php`, `simulation.php`, `history.php` - foydalanuvchi interfeysi.
- `admin/` - administrator interfeysi.
- `design/` - dizayn prototiplari va dizayn tizimi.

## 2. Loyiha haqida umumiy ma'lumot

MEDCASE - klinik fikrlashni mashq qilish uchun mo'ljallangan veb-simulyator. Tizim tibbiyot talabalari, rezidentlar, instruktorlar va administratorlarga virtual bemor ssenariylari orqali diagnostika, anamnez yig'ish va qaror qabul qilish ko'nikmalarini rivojlantirish imkonini beradi.

Mavjud loyiha oddiy PHP asosida server-side render qilingan sahifalar, MySQL ma'lumotlar bazasi va REST uslubidagi JSON API dan iborat. Frontend Tailwind CSS CDN, Google Fonts va Material Symbols orqali qurilgan.

## 3. Maqsad va kutilayotgan natija

### 3.1. Asosiy maqsad

MEDCASE platformasi orqali klinik keyslar kutubxonasini ko'rish, tanlangan keys bo'yicha simulyatsiya boshlash, bemor bilan chat ko'rinishida muloqot qilish, vital ko'rsatkichlarni ko'rish va foydalanuvchi progressini kuzatish imkonini beruvchi veb-ilovani ishlab chiqish va qo'llab-quvvatlash.

### 3.2. Kutilayotgan natijalar

- Foydalanuvchi ro'yxatdan o'tishi va tizimga kirishi mumkin bo'ladi.
- Sessiya orqali himoyalangan dashboard, keyslar ro'yxati, simulyatsiya va tarix sahifalari ishlaydi.
- Klinik keyslar MySQL bazasidan olinadi, DB mavjud bo'lmaganda demo keyslar bilan fallback ishlaydi.
- Administrator foydalanuvchilar va klinik keyslar ro'yxatini ko'ra oladi.
- Tizim API orqali autentifikatsiya, keyslar va foydalanuvchi statistikasi ma'lumotlarini beradi.
- Loyiha uchun aniq o'rnatish, konfiguratsiya, testlash va qabul mezonlari belgilangan bo'ladi.

## 4. Foydalanuvchi rollari

| Rol | Tavsif | Asosiy imkoniyatlar |
| --- | --- | --- |
| Mehmon | Tizimga kirmagan foydalanuvchi | Landing sahifani va login sahifani ko'rish |
| Student | Klinik mashg'ulot ishtirokchisi | Dashboard, keyslar, simulyatsiya, progress tarixini ko'rish |
| Instructor | O'qituvchi yoki mentor | Student imkoniyatlari, kelgusida guruh/progress nazorati |
| Admin | Tizim administratori | Admin panel, foydalanuvchilar va keyslar ro'yxatini ko'rish |

Eslatma: mavjud kodda `student`, `instructor`, `admin` rollari `users.role` maydonida saqlanadi. Hozirgi `register` API role parametrini qabul qiladi, lekin production talabida ochiq ro'yxatdan o'tishda role faqat `student` bo'lishi tavsiya etiladi.

## 5. Funksional talablar

### 5.1. Landing sahifa

Manba: `index.php`.

- Tizim brendi, qiymat taklifi va foydalanuvchini login sahifaga yo'naltiruvchi elementlar bo'lishi kerak.
- Sahifa barcha asosiy qurilmalarda responsiv ko'rinishi kerak.
- Tashqi media resurslar yuklanmasa, asosiy matn va navigatsiya ishlashda davom etishi kerak.

### 5.2. Autentifikatsiya

Manbalar: `login.php`, `api/auth/login.php`, `api/auth/register.php`, `api/auth/logout.php`, `app/Services/AuthService.php`.

- Foydalanuvchi email va parol orqali tizimga kiradi.
- Email formati server tomonda tekshiriladi.
- Parol kamida 8 belgidan iborat bo'lishi kerak.
- Parollar bazada `password_hash()` orqali xeshlangan holda saqlanishi kerak.
- Login muvaffaqiyatli bo'lsa, sessiyada `user_id`, `role`, `email` saqlanadi.
- Logout sessiyani tozalaydi va foydalanuvchini tizimdan chiqaradi.
- Noto'g'ri email/parol uchun umumiy xatolik xabari qaytariladi.
- Himoyalangan sahifalarga sessiyasiz kirilganda foydalanuvchi `login.php` ga yo'naltiriladi.

### 5.3. Dashboard

Manba: `dashboard.php`.

- Foydalanuvchi umumiy progress ko'rsatkichlarini ko'rishi kerak.
- Tavsiya etilgan klinik keyslar `api/cases/list.php` orqali yuklanishi kerak.
- Har bir keys kartasida kamida quyidagi ma'lumotlar ko'rsatiladi:
  - nomi;
  - mutaxassislik;
  - qiyinlik darajasi;
  - qisqa tavsif;
  - taxminiy davomiylik.
- Keys kartasini bosish `simulation.php?id={id}` sahifasiga o'tkazishi kerak.

### 5.4. Keyslar va demografiya tanlash

Manba: `patients.php`.

- Foydalanuvchi pediatrik, katta yoshli yoki geriatrik bemor demografiyasini tanlay oladi.
- Tanlov brauzer `sessionStorage` ga yoziladi.
- Tanlovdan so'ng foydalanuvchi simulyatsiya sahifasiga o'tkaziladi.
- Kelgusi talablarda demografiya tanlovi real keys filtri bilan bog'lanishi kerak.

### 5.5. Klinik simulyatsiya

Manba: `simulation.php`.

- Simulyatsiya sahifasi tanlangan keysni `api/cases/get.php?id={id}` orqali yuklaydi.
- Sahifada quyidagilar ko'rsatilishi kerak:
  - bemor ismi;
  - yoshi va jinsi;
  - asosiy shikoyat;
  - keys statusi;
  - yurak urishi;
  - qon bosimi;
  - bemorning boshlang'ich bayonoti.
- Foydalanuvchi chat maydoniga savol yozishi mumkin.
- Mavjud holatda bemor javoblari frontend mock ko'rinishida qaytariladi.
- Kelgusi production talabida chat javoblari server tomondagi klinik ssenariy, qoidaviy dialog yoki LLM integratsiyasi orqali boshqarilishi kerak.
- "Submit Diagnosis" tugmasi diagnostika yuborish va baholash jarayoniga ulanadigan endpoint bilan bog'lanishi kerak.

### 5.6. Progress va tarix

Manba: `history.php`, `api/user/state.php`, `app/Services/UserStatsService.php`.

- Foydalanuvchi daraja, XP, streak, aniqlik foizi va yakunlangan keyslar sonini ko'ra olishi kerak.
- Mavjud sahifada bir qator ko'rsatkichlar statik/maket ko'rinishida.
- Production talabida tarix jadvali real yakunlangan simulyatsiyalar asosida shakllanishi kerak.
- Har bir tarix yozuvida keys nomi, mutaxassislik, sana, ball va ko'rib chiqish amali bo'lishi kerak.

### 5.7. Admin panel

Manbalar: `admin/index.php`, `admin/users.php`, `admin/cases.php`.

- Admin panelga faqat `role === 'admin'` bo'lgan foydalanuvchilar kira oladi.
- Admin dashboard tizim umumiy ko'rsatkichlarini ko'rsatadi.
- `admin/users.php` foydalanuvchilar ro'yxatini ko'rsatadi.
- `admin/cases.php` klinik keyslar ro'yxatini ko'rsatadi.
- Mavjud dashboarddagi ayrim KPI qiymatlari maket; production talabida ular real bazadan olinishi kerak.
- Kelgusi talablarda admin foydalanuvchi yaratish/tahrirlash, role boshqaruvi, keys CRUD va audit log imkoniyatlari qo'shilishi kerak.

## 6. API talablari

API marshrutlari `api/index.php` orqali ro'yxatdan o'tkaziladi. Moslik uchun alohida entrypoint fayllar ham mavjud.

### 6.1. Autentifikatsiya API

#### POST `/auth/login`

Mos entrypoint: `api/auth/login.php`.

So'rov:

```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

Muvaffaqiyatli javob:

```json
{
  "success": true,
  "message": "Login successful"
}
```

Xatoliklar:

- `422` - email/parol noto'g'ri yoki autentifikatsiya servisi mavjud emas.

#### POST `/auth/register`

Mos entrypoint: `api/auth/register.php`.

So'rov:

```json
{
  "email": "user@example.com",
  "password": "password123",
  "role": "student"
}
```

Muvaffaqiyatli javob:

```json
{
  "success": true,
  "message": "User registered successfully"
}
```

Xatoliklar:

- `422` - email noto'g'ri, parol qisqa yoki ro'yxatdan o'tkazish bajarilmadi.

Security talabi: public register endpoint role parametrini `student` bilan cheklashi yoki role belgilashni faqat admin panelga o'tkazishi kerak.

#### GET/POST `/auth/logout`

Mos entrypoint: `api/auth/logout.php`.

Javob:

```json
{
  "success": true,
  "message": "Logged out"
}
```

`redirect` query parametri faqat xavfsiz lokal path formatida qabul qilinadi.

### 6.2. Keyslar API

#### GET `/cases`

Mos entrypoint: `api/cases/list.php`.

Ruxsat: autentifikatsiya talab qilinadi.

Javob:

```json
{
  "success": true,
  "cases": [
    {
      "id": 1,
      "title": "68-F Exertional Chest Pain",
      "specialty": "Cardiology",
      "difficulty": "Medium",
      "description": "Patient presents with radiating jaw pain during exercise.",
      "est_time": 15
    }
  ]
}
```

Xatoliklar:

- `401` - sessiya mavjud emas.

#### GET `/cases/{id}`

Mos entrypoint: `api/cases/get.php?id={id}`.

Ruxsat: autentifikatsiya talab qilinadi.

Javob:

```json
{
  "success": true,
  "case": {
    "id": 1,
    "title": "68-F Exertional Chest Pain",
    "patient_name": "Helen Morris",
    "age": 68,
    "gender": "Female",
    "complaint": "Radiating chest pressure",
    "specialty": "Cardiology",
    "difficulty": "Medium",
    "description": "Patient presents with radiating jaw pain during exercise.",
    "est_time": 15,
    "initial_statement": "Doctor, my chest gets tight whenever I walk up stairs, and today it moved into my jaw.",
    "vitals": {
      "hr": 104,
      "sbp": 148,
      "dbp": 88
    }
  }
}
```

Xatoliklar:

- `401` - sessiya mavjud emas.
- `404` - keys topilmadi.

### 6.3. Foydalanuvchi statistikasi API

#### GET `/user/stats`

Mos entrypoint: `api/user/state.php`.

Ruxsat: autentifikatsiya talab qilinadi.

Javob:

```json
{
  "success": true,
  "stats": {
    "level": 24,
    "xp": 2450,
    "next_level_xp": 3000,
    "streak": 5,
    "accuracy": 92,
    "cases_completed": 148,
    "role_title": "Senior Attending"
  }
}
```

Xatoliklar:

- `401` - sessiya mavjud emas.

## 7. Ma'lumotlar bazasi talablari

Manba: `database/medcase.sql`.

DBMS: MySQL, charset `utf8mb4`, collation `utf8mb4_unicode_ci`.

### 7.1. `users`

| Maydon | Tur | Talab |
| --- | --- | --- |
| `id` | INT UNSIGNED | Primary key, auto increment |
| `email` | VARCHAR(191) | Unique, majburiy |
| `password` | VARCHAR(255) | Xeshlangan parol, majburiy |
| `role` | ENUM | `student`, `instructor`, `admin`; default `student` |
| `created_at` | TIMESTAMP | Yaratilgan vaqt |
| `updated_at` | TIMESTAMP | Yangilangan vaqt |

### 7.2. `cases`

| Maydon | Tur | Talab |
| --- | --- | --- |
| `id` | INT UNSIGNED | Primary key, auto increment |
| `title` | VARCHAR(191) | Keys nomi |
| `patient_name` | VARCHAR(191) | Bemor ismi |
| `age` | TINYINT UNSIGNED | Bemor yoshi |
| `gender` | VARCHAR(32) | Bemor jinsi |
| `complaint` | VARCHAR(191) | Asosiy shikoyat |
| `specialty` | VARCHAR(100) | Mutaxassislik |
| `difficulty` | ENUM | `Easy`, `Medium`, `Hard` |
| `description` | TEXT | Qisqa klinik tavsif |
| `est_time` | SMALLINT UNSIGNED | Taxminiy davomiylik, minut |
| `initial_statement` | TEXT | Bemor boshlang'ich gapi |
| `heart_rate` | SMALLINT UNSIGNED | Yurak urishi |
| `systolic_bp` | SMALLINT UNSIGNED | Sistolik qon bosimi |
| `diastolic_bp` | SMALLINT UNSIGNED | Diastolik qon bosimi |
| `created_at`, `updated_at` | TIMESTAMP | Audit vaqt maydonlari |

Indekslar:

- `idx_cases_specialty`
- `idx_cases_difficulty`

### 7.3. `user_stats`

| Maydon | Tur | Talab |
| --- | --- | --- |
| `user_id` | INT UNSIGNED | Primary key, `users.id` ga foreign key |
| `level` | SMALLINT UNSIGNED | Foydalanuvchi darajasi |
| `xp` | INT UNSIGNED | Joriy XP |
| `next_level_xp` | INT UNSIGNED | Keyingi daraja uchun XP |
| `streak` | SMALLINT UNSIGNED | Ketma-ket faol kunlar |
| `accuracy` | TINYINT UNSIGNED | Aniqlik foizi |
| `cases_completed` | INT UNSIGNED | Yakunlangan keyslar soni |
| `role_title` | VARCHAR(100) | Klinik unvon |

Muhim talab: yangi foydalanuvchi yaratilganda `user_stats` qatori ham avtomatik yaratilishi yoki `UserStatsService` real default qiymatlarni DB ga yozishi kerak.

### 7.4. Kelgusi kengaytirish uchun tavsiya etiladigan jadvallar

Mavjud kod bazasida hali yo'q, lekin to'liq production simulyatsiya uchun kerak bo'lishi mumkin:

- `case_sessions` - boshlangan/yakunlangan simulyatsiyalar.
- `case_messages` - doctor/patient chat tarixi.
- `diagnosis_submissions` - yuborilgan tashxislar va baholash.
- `case_scores` - ball, feedback va rubrika natijalari.
- `audit_logs` - admin amallari tarixi.

## 8. Arxitektura va komponentlar

### 8.1. Qatlamlar

| Qatlam | Joylashuv | Vazifa |
| --- | --- | --- |
| UI | Root PHP fayllar, `admin/`, `includes/` | Server-rendered sahifalar va JS fetch chaqiruvlari |
| API | `api/index.php`, `api/*/*.php` | Marshrutlash va JSON javoblar |
| Controllers | `app/Controllers/` | Request/response orkestratsiyasi |
| Services | `app/Services/` | Biznes logika |
| Repositories | `app/Repositories/` | DB bilan ishlash |
| Core | `app/Core/` | Router, Request, Response, Session, Database |
| Support | `app/Support/` | Env va demo keyslar |

### 8.2. Backend prinsiplari

- Frameworksiz, `declare(strict_types=1)` ishlatiladi.
- Autoload `app/bootstrap.php` orqali PSR-4 uslubida bajariladi.
- DB ulanish PDO orqali yaratiladi.
- Querylar prepared statement bilan bajariladi.
- API javoblari JSON formatida bo'ladi.
- DB xatoligida ayrim modullar demo ma'lumotlar bilan fallback qiladi.

### 8.3. Frontend prinsiplari

- UI server-rendered PHP sahifalar orqali shakllanadi.
- Dinamik data fetch orqali API dan olinadi.
- Tailwind CSS CDN ishlatiladi.
- Dizayn tokenlari `includes/head.php` ichidagi Tailwind konfiguratsiyasida saqlanadi.
- Tizim desktop va mobil ekranlarda moslashuvchan bo'lishi kerak.

## 9. Konfiguratsiya va ishga tushirish talablari

### 9.1. Minimal runtime

- PHP 8.x yoki undan yuqori versiya.
- MySQL 8.x yoki mos keluvchi versiya.
- PHP PDO MySQL extension.
- Web server: Apache, Nginx yoki PHP built-in server.

### 9.2. DB konfiguratsiyasi

`config.php` fayli:

```php
return [
    'db' => [
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'medcase_db',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'dsn' => null,
    ],
];
```

Muhit o'zgaruvchilari orqali override:

```bash
DB_HOST=localhost
DB_PORT=3306
DB_NAME=medcase_db
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
DB_DSN=
```

### 9.3. DB import

```sql
SOURCE database/medcase.sql;
```

### 9.4. Deployment talablari

- Production muhitda `config.php` ichida maxfiy parollar commit qilinmasligi kerak.
- HTTPS majburiy bo'lishi kerak.
- PHP error display productionda o'chirilgan bo'lishi kerak.
- Loglar server yoki markazlashgan logging tizimiga yozilishi kerak.
- Static asset CDN ishlamasa, fallback yoki lokal asset strategiyasi ko'rib chiqilishi kerak.

## 10. Xavfsizlik talablari

- Parollar faqat `password_hash()` bilan saqlanadi.
- Login paytida `password_verify()` ishlatiladi.
- Sessiya login paytida `session_regenerate_id(true)` bilan yangilanadi.
- Himoyalangan API endpointlar sessiya talab qiladi.
- Admin sahifalar role asosida himoyalanadi.
- Public register endpoint orqali `admin` yoki `instructor` role berish taqiqlanishi kerak.
- CSRF himoyasi formalar va state-changing endpointlar uchun qo'shilishi kerak.
- Rate limiting login/register endpointlarida bo'lishi kerak.
- Session cookie uchun `HttpOnly`, `Secure`, `SameSite=Lax` yoki `SameSite=Strict` sozlanishi kerak.
- XSS xavfini kamaytirish uchun foydalanuvchi kiritgan matnlar HTML ga chiqarilishidan oldin escape qilinishi kerak.
- Open redirect oldini olish uchun logout `redirect` parametri faqat lokal path bilan cheklanishi kerak.
- DB xatoliklari foydalanuvchiga to'liq texnik tafsilot bilan qaytarilmasligi kerak.

## 11. Nofunksional talablar

### 11.1. Ishlash tezligi

- Oddiy sahifa yuklanishi normal server sharoitida 2 soniyadan oshmasligi kerak.
- API list endpointlari 50 ta keysni tez qaytarishi kerak.
- DB so'rovlari indekslangan maydonlardan foydalanishi kerak.

### 11.2. Ishonchlilik

- DB vaqtincha mavjud bo'lmasa, keyslar uchun demo fallback ishlashi mumkin.
- Fallback ishlatilgani logda qayd etilishi kerak.
- Sessiya tugagan holatlar foydalanuvchiga tushunarli yo'naltirish bilan yakunlanishi kerak.

### 11.3. Kengayuvchanlik

- Yangi API endpointlar `api/index.php` routeriga qo'shilishi kerak.
- Biznes logika controller ichida emas, service qatlamida saqlanishi kerak.
- DB logikasi repository qatlamida saqlanishi kerak.
- Klinik simulyatsiya real sessiya modeli bilan kengaytirilishi kerak.

### 11.4. Qo'llab-quvvatlash

- Kod qatlamlari mavjud strukturaga mos saqlanishi kerak.
- Muhim konfiguratsiyalar README yoki alohida deployment hujjatida ko'rsatilishi kerak.
- Xatoliklar server loglariga yozilishi kerak.

## 12. Testlash talablari

Mavjud repoda avtomatlashtirilgan test infratuzilmasi topilmadi. Productionga yaqinlashtirish uchun quyidagi testlar talab qilinadi:

### 12.1. Unit testlar

- `AuthService`:
  - invalid email;
  - qisqa parol;
  - noto'g'ri login;
  - muvaffaqiyatli login;
  - role cheklovi.
- `CaseService` va `CaseRepository`:
  - keyslar ro'yxati;
  - bitta keys topish;
  - mavjud bo'lmagan keys;
  - DB fallback.
- `UserStatsService`:
  - DB dan stats o'qish;
  - stats topilmaganda default qiymat.

### 12.2. Integration testlar

- Login -> dashboard -> cases -> simulation oqimi.
- Sessiyasiz `/cases` API chaqiruvi `401` qaytarishi.
- Admin bo'lmagan foydalanuvchi `admin/` ga kira olmasligi.
- DB importdan so'ng demo keyslar mavjudligi.

### 12.3. Manual QA

- Mobil va desktop responsivlik.
- Login form xatoliklari.
- Keys kartalarini bosish.
- Simulyatsiyada chat input va vital panel.
- Logout oqimi.
- Admin users/cases sahifalari.

## 13. Qabul mezonlari

Loyiha quyidagi mezonlar bajarilganda qabul qilinadi:

1. `database/medcase.sql` import qilingandan so'ng tizim MySQL bilan ishga tushadi.
2. Yaratilgan foydalanuvchi email/parol orqali login qila oladi.
3. Sessiyasiz foydalanuvchi dashboard, cases, simulation va history sahifalariga kira olmaydi.
4. Login qilingan foydalanuvchi dashboardda keyslar ro'yxatini ko'radi.
5. Keys tanlanganda simulyatsiya sahifasi bemor ma'lumotlari va vital ko'rsatkichlarini yuklaydi.
6. `/api/cases/list.php` va `/api/cases/get.php?id=1` endpointlari sessiya bilan JSON qaytaradi.
7. `/api/user/state.php` foydalanuvchi statistikasi obyektini qaytaradi.
8. Admin role bo'lgan foydalanuvchi `admin/` sahifalarini ko'ra oladi.
9. Admin bo'lmagan foydalanuvchi admin sahifalardan login sahifaga yo'naltiriladi.
10. Parollar bazada plain text ko'rinishida saqlanmaydi.
11. Basic XSS va open redirect xavflari nazorat qilingan bo'ladi.
12. README yoki alohida hujjatda konfiguratsiya va ishga tushirish qadamlari bor bo'ladi.

## 14. Hozirgi cheklovlar va aniqlangan bo'shliqlar

- `user_stats` jadvali bor, lekin yangi user uchun avtomatik stats yaratish mexanizmi yo'q.
- Dashboard va history sahifalaridagi ayrim ko'rsatkichlar statik.
- Simulyatsiya chat javoblari real backend orqali boshqarilmaydi.
- `Submit Diagnosis` tugmasi baholash endpointiga ulanmagan.
- Admin dashboard KPI qiymatlari real DB dan olinmaydi.
- Admin CRUD endpointlari mavjud emas.
- Composer, Docker, CI/CD va avtomatlashtirilgan testlar mavjud emas.
- CSRF, rate limiting va session cookie hardening alohida sozlanmagan.
- Tashqi rasmlar va CDN resurslariga bog'liqlik mavjud.

## 15. Tavsiya etiladigan keyingi ishlar

1. Ro'yxatdan o'tishda role parametrini server tomonda `student` bilan cheklash.
2. Yangi foydalanuvchi uchun `user_stats` qatorini avtomatik yaratish.
3. Simulyatsiya sessiyalari va chat tarixini DB da saqlash.
4. Diagnostika yuborish va baholash endpointlarini ishlab chiqish.
5. Admin uchun users/cases CRUD amallarini qo'shish.
6. PHPUnit yoki boshqa test infratuzilmasini qo'shish.
7. Docker yoki deployment qo'llanmasini tayyorlash.
8. CSRF, rate limiting va cookie security sozlamalarini joriy etish.
9. Dashboard/history sahifalarini real API ma'lumotlariga ulash.
10. UI matnlarini yagona til strategiyasiga moslashtirish.

## 16. Loyiha chegaralari

Ushbu texnik topshiriq mavjud MEDCASE kod bazasini hujjatlashtirish va uni productionga yaqinlashtirish uchun talablarni belgilaydi. Hujjat tibbiy diagnozlarni real klinik qaror sifatida ishlatishni nazarda tutmaydi; tizim o'quv va simulyatsiya maqsadida qo'llanadi.

Tizimdagi klinik kontent tibbiy mutaxassislar tomonidan tekshirilishi va tasdiqlanishi kerak.
