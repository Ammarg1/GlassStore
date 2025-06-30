<?php
session_start();

// إعدادات الموقع
$site_settings = [
    'title' => [
        'ar' => 'متجر الزجاج الفاخر',
        'en' => 'Luxury Glass Store'
    ],
    'default_lang' => 'ar',
    'admin_email' => 'ffoxy0577@gmail.com'
];

// تحديد اللغة الحالية
$current_lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : $site_settings['default_lang'];
if (isset($_GET['lang']) && in_array($_GET['lang'], ['ar', 'en'])) {
    $current_lang = $_GET['lang'];
    setcookie('lang', $current_lang, time() + (86400 * 30), "/");
}

// نصوص متعددة اللغات
$translations = [
    'home' => ['ar' => 'الرئيسية', 'en' => 'Home'],
    'products' => ['ar' => 'المنتجات', 'en' => 'Products'],
    'services' => ['ar' => 'الخدمات', 'en' => 'Services'],
    'contact' => ['ar' => 'اتصل بنا', 'en' => 'Contact Us'],
    'login' => ['ar' => 'تسجيل الدخول', 'en' => 'Login'],
    'logout' => ['ar' => 'تسجيل الخروج', 'en' => 'Logout'],
    'dashboard' => ['ar' => 'لوحة التحكم', 'en' => 'Dashboard'],
    'welcome' => ['ar' => 'مرحباً بك في متجر الزجاج الفاخر', 'en' => 'Welcome to Luxury Glass Store'],
    'about_us' => ['ar' => 'نحن متخصصون في بيع أجود أنواع الزجاج والمرايا بأسعار تنافسية.', 'en' => 'We specialize in selling the finest types of glass and mirrors at competitive prices.'],
    'view_details' => ['ar' => 'عرض التفاصيل', 'en' => 'View Details'],
    'contact_us' => ['ar' => 'للتواصل معنا', 'en' => 'Contact Us'],
    'name' => ['ar' => 'الاسم', 'en' => 'Name'],
    'email' => ['ar' => 'البريد الإلكتروني', 'en' => 'Email'],
    'phone' => ['ar' => 'الهاتف', 'en' => 'Phone'],
    'message' => ['ar' => 'الرسالة', 'en' => 'Message'],
    'send' => ['ar' => 'إرسال', 'en' => 'Send'],
    'our_products' => ['ar' => 'منتجاتنا', 'en' => 'Our Products'],
    'our_services' => ['ar' => 'خدماتنا', 'en' => 'Our Services'],
    'price' => ['ar' => 'السعر', 'en' => 'Price'],
    'add_to_cart' => ['ar' => 'إضافة إلى السلة', 'en' => 'Add to Cart'],
    'admin_panel' => ['ar' => 'لوحة الإدارة', 'en' => 'Admin Panel'],
    'manage_products' => ['ar' => 'إدارة المنتجات', 'en' => 'Manage Products'],
    'manage_services' => ['ar' => 'إدارة الخدمات', 'en' => 'Manage Services'],
    'manage_contacts' => ['ar' => 'إدارة الرسائل', 'en' => 'Manage Messages'],
    'add_product' => ['ar' => 'إضافة منتج', 'en' => 'Add Product'],
    'add_service' => ['ar' => 'إضافة خدمة', 'en' => 'Add Service'],
    'edit' => ['ar' => 'تعديل', 'en' => 'Edit'],
    'delete' => ['ar' => 'حذف', 'en' => 'Delete'],
    'product_name' => ['ar' => 'اسم المنتج', 'en' => 'Product Name'],
    'description' => ['ar' => 'الوصف', 'en' => 'Description'],
    'image' => ['ar' => 'الصورة', 'en' => 'Image'],
    'submit' => ['ar' => 'حفظ', 'en' => 'Submit'],
    'service_title' => ['ar' => 'عنوان الخدمة', 'en' => 'Service Title'],
    'actions' => ['ar' => 'الإجراءات', 'en' => 'Actions'],
    'no_products' => ['ar' => 'لا توجد منتجات متاحة', 'en' => 'No products available'],
    'no_services' => ['ar' => 'لا توجد خدمات متاحة', 'en' => 'No services available'],
    'no_messages' => ['ar' => 'لا توجد رسائل', 'en' => 'No messages'],
    'contact_messages' => ['ar' => 'رسائل العملاء', 'en' => 'Customer Messages'],
    'view_all' => ['ar' => 'عرض الكل', 'en' => 'View All'],
    'latest_products' => ['ar' => 'أحدث المنتجات', 'en' => 'Latest Products'],
    'latest_services' => ['ar' => 'أحدث الخدمات', 'en' => 'Latest Services'],
    'register' => ['ar' => 'تسجيل حساب', 'en' => 'Register'],
    'username' => ['ar' => 'اسم المستخدم', 'en' => 'Username'],
    'password' => ['ar' => 'كلمة المرور', 'en' => 'Password'],
    'confirm_password' => ['ar' => 'تأكيد كلمة المرور', 'en' => 'Confirm Password'],
    'already_have_account' => ['ar' => 'لديك حساب بالفعل؟', 'en' => 'Already have an account?'],
    'dont_have_account' => ['ar' => 'ليس لديك حساب؟', 'en' => 'Don\'t have an account?'],
    'remember_me' => ['ar' => 'تذكرني', 'en' => 'Remember me'],
    'forgot_password' => ['ar' => 'نسيت كلمة المرور؟', 'en' => 'Forgot password?'],
    'search' => ['ar' => 'بحث', 'en' => 'Search'],
    'all_rights_reserved' => ['ar' => 'جميع الحقوق محفوظة', 'en' => 'All rights reserved'],
    'switch_language' => ['ar' => 'English', 'en' => 'العربية'],
    'copyright' => ['ar' => '© 2023 متجر الزجاج. جميع الحقوق محفوظة.', 'en' => '© 2023 Glass Store. All rights reserved.']
];

// دالة للترجمة
function t($key) {
    global $translations, $current_lang;
    return $translations[$key][$current_lang] ?? $key;
}

// اتصال قاعدة البيانات
$host = 'localhost';
$dbname = 'glass_store';
$db_username = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// إنشاء الجداول إذا لم تكن موجودة
function createTables($pdo) {
    $tables = [
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin', 'customer') DEFAULT 'customer',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        
        "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name_ar VARCHAR(100) NOT NULL,
            name_en VARCHAR(100) NOT NULL,
            description_ar TEXT,
            description_en TEXT,
            price DECIMAL(10,2) NOT NULL,
            image VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        
        "CREATE TABLE IF NOT EXISTS services (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title_ar VARCHAR(100) NOT NULL,
            title_en VARCHAR(100) NOT NULL,
            description_ar TEXT,
            description_en TEXT,
            price DECIMAL(10,2),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        
        "CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )"
    ];

    foreach ($tables as $table) {
        $pdo->exec($table);
    }

    // إضافة المدير الافتراضي إذا لم يكن موجودًا
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$site_settings['admin_email']]);
    if ($stmt->rowCount() == 0) {
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')")
            ->execute(['Admin', $site_settings['admin_email'], $hashed_password]);
    }
}

createTables($pdo);

// التحقق من صلاحيات المدير
function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';
}

// إعادة توجيه إذا لم يكن مديراً
function redirectIfNotAdmin() {
    if (!isAdmin()) {
        header("Location: ?");
        exit();
    }
}

// معالجة تسجيل الدخول
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: ?");
        exit();
    } else {
        $login_error = t('login_error');
    }
}

// معالجة تسجيل الخروج
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ?");
    exit();
}

// معالجة إرسال رسالة الاتصال
if (isset($_POST['send_message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $message]);
    
    $contact_success = t('message_sent_success');
}

// إدارة المنتجات (إضافة/تعديل/حذف)
if (isAdmin()) {
    // إضافة منتج جديد
    if (isset($_POST['add_product'])) {
        $name_ar = $_POST['name_ar'];
        $name_en = $_POST['name_en'];
        $description_ar = $_POST['description_ar'];
        $description_en = $_POST['description_en'];
        $price = $_POST['price'];
        
        // معالجة رفع الصورة
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $image = $target_file;
        }
        
        $stmt = $pdo->prepare("INSERT INTO products (name_ar, name_en, description_ar, description_en, price, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name_ar, $name_en, $description_ar, $description_en, $price, $image]);
        
        header("Location: ?admin=products");
        exit();
    }
    
    // حذف منتج
    if (isset($_GET['delete_product'])) {
        $id = $_GET['delete_product'];
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: ?admin=products");
        exit();
    }
    
    // إضافة خدمة جديدة
    if (isset($_POST['add_service'])) {
        $title_ar = $_POST['title_ar'];
        $title_en = $_POST['title_en'];
        $description_ar = $_POST['description_ar'];
        $description_en = $_POST['description_en'];
        $price = $_POST['price'];
        
        $stmt = $pdo->prepare("INSERT INTO services (title_ar, title_en, description_ar, description_en, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title_ar, $title_en, $description_ar, $description_en, $price]);
        
        header("Location: ?admin=services");
        exit();
    }
    
    // حذف خدمة
    if (isset($_GET['delete_service'])) {
        $id = $_GET['delete_service'];
        $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: ?admin=services");
        exit();
    }
    
    // حذف رسالة
    if (isset($_GET['delete_message'])) {
        $id = $_GET['delete_message'];
        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: ?admin=messages");
        exit();
    }
}

// جلب البيانات
$products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 6")->fetchAll();
$services = $pdo->query("SELECT * FROM services ORDER BY created_at DESC LIMIT 6")->fetchAll();

if (isAdmin()) {
    $all_products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
    $all_services = $pdo->query("SELECT * FROM services ORDER BY created_at DESC")->fetchAll();
    $messages = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC")->fetchAll();
}

// تحديد الصفحة الحالية
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$admin_page = isset($_GET['admin']) ? $_GET['admin'] : '';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>" dir="<?php echo $current_lang == 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_settings['title'][$current_lang]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .product-card, .service-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .product-card:hover, .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
        .contact-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .admin-sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .admin-sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        .rtl {
            direction: rtl;
            text-align: right;
        }
        .ltr {
            direction: ltr;
            text-align: left;
        }
        .lang-switcher {
            cursor: pointer;
        }
    </style>
</head>
<body class="<?php echo $current_lang == 'ar' ? 'rtl' : 'ltr'; ?>">
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="?"><?php echo $site_settings['title'][$current_lang]; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="?"><?php echo t('home'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'products' ? 'active' : ''; ?>" href="?page=products"><?php echo t('products'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'services' ? 'active' : ''; ?>" href="?page=services"><?php echo t('services'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'contact' ? 'active' : ''; ?>" href="?page=contact"><?php echo t('contact'); ?></a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="nav-link lang-switcher" href="?lang=<?php echo $current_lang == 'ar' ? 'en' : 'ar'; ?>">
                        <?php echo t('switch_language'); ?>
                    </a>
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php if (isAdmin()): ?>
                            <a class="nav-link" href="?admin=dashboard"><i class="fas fa-cog"></i> <?php echo t('admin_panel'); ?></a>
                        <?php endif; ?>
                        <a class="nav-link" href="?logout"><i class="fas fa-sign-out-alt"></i> <?php echo t('logout'); ?></a>
                    <?php else: ?>
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-sign-in-alt"></i> <?php echo t('login'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- المحتوى الرئيسي -->
    <main class="container my-5">
        <?php if (!isset($_GET['admin'])): ?>
            <!-- الواجهة الأمامية -->
            <?php if ($page == 'home'): ?>
                <!-- الصفحة الرئيسية -->
                <section class="hero-section mb-5 rounded">
                    <div class="container">
                        <h1><?php echo t('welcome'); ?></h1>
                        <p class="lead"><?php echo t('about_us'); ?></p>
                        <a href="?page=products" class="btn btn-primary btn-lg"><?php echo t('view_details'); ?></a>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="text-center mb-4"><?php echo t('latest_products'); ?></h2>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <?php if ($product['image']): ?>
                                        <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $current_lang == 'ar' ? $product['name_ar'] : $product['name_en']; ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Placeholder">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $current_lang == 'ar' ? $product['name_ar'] : $product['name_en']; ?></h5>
                                        <p class="card-text"><?php echo $current_lang == 'ar' ? substr($product['description_ar'], 0, 100) : substr($product['description_en'], 0, 100); ?>...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-primary fw-bold"><?php echo $product['price']; ?> <?php echo t('currency'); ?></span>
                                            <a href="?page=product&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-primary"><?php echo t('view_details'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-4">
                        <a href="?page=products" class="btn btn-outline-primary"><?php echo t('view_all'); ?></a>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="text-center mb-4"><?php echo t('latest_services'); ?></h2>
                    <div class="row">
                        <?php foreach ($services as $service): ?>
                            <div class="col-md-4">
                                <div class="card service-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $current_lang == 'ar' ? $service['title_ar'] : $service['title_en']; ?></h5>
                                        <p class="card-text"><?php echo $current_lang == 'ar' ? substr($service['description_ar'], 0, 100) : substr($service['description_en'], 0, 100); ?>...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if ($service['price']): ?>
                                                <span class="text-primary fw-bold"><?php echo $service['price']; ?> <?php echo t('currency'); ?></span>
                                            <?php endif; ?>
                                            <a href="?page=service&id=<?php echo $service['id']; ?>" class="btn btn-sm btn-outline-primary"><?php echo t('view_details'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-4">
                        <a href="?page=services" class="btn btn-outline-primary"><?php echo t('view_all'); ?></a>
                    </div>
                </section>

            <?php elseif ($page == 'products'): ?>
                <!-- صفحة المنتجات -->
                <h2 class="mb-4"><?php echo t('our_products'); ?></h2>
                <div class="row">
                    <?php if (count($products) > 0): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card product-card h-100">
                                    <?php if ($product['image']): ?>
                                        <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $current_lang == 'ar' ? $product['name_ar'] : $product['name_en']; ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Placeholder">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $current_lang == 'ar' ? $product['name_ar'] : $product['name_en']; ?></h5>
                                        <p class="card-text"><?php echo $current_lang == 'ar' ? $product['description_ar'] : $product['description_en']; ?></p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-primary fw-bold"><?php echo $product['price']; ?> <?php echo t('currency'); ?></span>
                                            <a href="#" class="btn btn-sm btn-primary"><?php echo t('add_to_cart'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info"><?php echo t('no_products'); ?></div>
                        </div>
                    <?php endif; ?>
                </div>

            <?php elseif ($page == 'services'): ?>
                <!-- صفحة الخدمات -->
                <h2 class="mb-4"><?php echo t('our_services'); ?></h2>
                <div class="row">
                    <?php if (count($services) > 0): ?>
                        <?php foreach ($services as $service): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card service-card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $current_lang == 'ar' ? $service['title_ar'] : $service['title_en']; ?></h5>
                                        <p class="card-text"><?php echo $current_lang == 'ar' ? $service['description_ar'] : $service['description_en']; ?></p>
                                        <?php if ($service['price']): ?>
                                            <p class="text-primary fw-bold"><?php echo $service['price']; ?> <?php echo t('currency'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info"><?php echo t('no_services'); ?></div>
                        </div>
                    <?php endif; ?>
                </div>

            <?php elseif ($page == 'contact'): ?>
                <!-- صفحة الاتصال -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <h2 class="text-center mb-4"><?php echo t('contact_us'); ?></h2>
                            <?php if (isset($contact_success)): ?>
                                <div class="alert alert-success"><?php echo $contact_success; ?></div>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label"><?php echo t('name'); ?></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><?php echo t('email'); ?></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><?php echo t('phone'); ?></label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label"><?php echo t('message'); ?></label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" name="send_message" class="btn btn-primary w-100"><?php echo t('send'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- لوحة الإدارة -->
            <?php if (!isAdmin()): ?>
                <div class="alert alert-danger"><?php echo t('access_denied'); ?></div>
            <?php else: ?>
                <div class="row">
                    <!-- القائمة الجانبية -->
                    <div class="col-md-3">
                        <div class="admin-sidebar p-3 rounded">
                            <h4 class="text-center mb-4"><?php echo t('admin_panel'); ?></h4>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $admin_page == 'dashboard' ? 'active' : ''; ?>" href="?admin=dashboard">
                                        <i class="fas fa-tachometer-alt me-2"></i> <?php echo t('dashboard'); ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $admin_page == 'products' ? 'active' : ''; ?>" href="?admin=products">
                                        <i class="fas fa-boxes me-2"></i> <?php echo t('manage_products'); ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $admin_page == 'services' ? 'active' : ''; ?>" href="?admin=services">
                                        <i class="fas fa-concierge-bell me-2"></i> <?php echo t('manage_services'); ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $admin_page == 'messages' ? 'active' : ''; ?>" href="?admin=messages">
                                        <i class="fas fa-envelope me-2"></i> <?php echo t('manage_contacts'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- محتوى لوحة التحكم -->
                    <div class="col-md-9">
                        <?php if ($admin_page == 'dashboard'): ?>
                            <!-- لوحة التحكم الرئيسية -->
                            <h3><?php echo t('dashboard'); ?></h3>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo t('products'); ?></h5>
                                            <p class="card-text display-6"><?php echo count($all_products); ?></p>
                                            <a href="?admin=products" class="text-white"><?php echo t('view_all'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo t('services'); ?></h5>
                                            <p class="card-text display-6"><?php echo count($all_services); ?></p>
                                            <a href="?admin=services" class="text-white"><?php echo t('view_all'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo t('contact_messages'); ?></h5>
                                            <p class="card-text display-6"><?php echo count($messages); ?></p>
                                            <a href="?admin=messages" class="text-white"><?php echo t('view_all'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($admin_page == 'products'): ?>
                            <!-- إدارة المنتجات -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3><?php echo t('manage_products'); ?></h3>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    <i class="fas fa-plus me-2"></i> <?php echo t('add_product'); ?>
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo t('product_name'); ?></th>
                                            <th><?php echo t('price'); ?></th>
                                            <th><?php echo t('image'); ?></th>
                                            <th><?php echo t('actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($all_products) > 0): ?>
                                            <?php foreach ($all_products as $product): ?>
                                                <tr>
                                                    <td><?php echo $product['id']; ?></td>
                                                    <td><?php echo $current_lang == 'ar' ? $product['name_ar'] : $product['name_en']; ?></td>
                                                    <td><?php echo $product['price']; ?></td>
                                                    <td>
                                                        <?php if ($product['image']): ?>
                                                            <img src="<?php echo $product['image']; ?>" width="50" height="50" class="img-thumbnail">
                                                        <?php else: ?>
                                                            <span class="text-muted"><?php echo t('no_image'); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="?admin=edit_product&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning"><?php echo t('edit'); ?></a>
                                                        <a href="?admin=products&delete_product=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo t('confirm_delete'); ?>')"><?php echo t('delete'); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center"><?php echo t('no_products'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- نموذج إضافة منتج -->
                            <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo t('add_product'); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name_ar" class="form-label"><?php echo t('product_name'); ?> (العربية)</label>
                                                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name_en" class="form-label"><?php echo t('product_name'); ?> (English)</label>
                                                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="description_ar" class="form-label"><?php echo t('description'); ?> (العربية)</label>
                                                        <textarea class="form-control" id="description_ar" name="description_ar" rows="3" required></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="description_en" class="form-label"><?php echo t('description'); ?> (English)</label>
                                                        <textarea class="form-control" id="description_en" name="description_en" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="form-label"><?php echo t('price'); ?></label>
                                                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label"><?php echo t('image'); ?></label>
                                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo t('close'); ?></button>
                                                <button type="submit" name="add_product" class="btn btn-primary"><?php echo t('submit'); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($admin_page == 'services'): ?>
                            <!-- إدارة الخدمات -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3><?php echo t('manage_services'); ?></h3>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                    <i class="fas fa-plus me-2"></i> <?php echo t('add_service'); ?>
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo t('service_title'); ?></th>
                                            <th><?php echo t('price'); ?></th>
                                            <th><?php echo t('actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($all_services) > 0): ?>
                                            <?php foreach ($all_services as $service): ?>
                                                <tr>
                                                    <td><?php echo $service['id']; ?></td>
                                                    <td><?php echo $current_lang == 'ar' ? $service['title_ar'] : $service['title_en']; ?></td>
                                                    <td><?php echo $service['price'] ? $service['price'] : '-'; ?></td>
                                                    <td>
                                                        <a href="?admin=edit_service&id=<?php echo $service['id']; ?>" class="btn btn-sm btn-warning"><?php echo t('edit'); ?></a>
                                                        <a href="?admin=services&delete_service=<?php echo $service['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo t('confirm_delete'); ?>')"><?php echo t('delete'); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center"><?php echo t('no_services'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- نموذج إضافة خدمة -->
                            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo t('add_service'); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="title_ar" class="form-label"><?php echo t('service_title'); ?> (العربية)</label>
                                                        <input type="text" class="form-control" id="title_ar" name="title_ar" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="title_en" class="form-label"><?php echo t('service_title'); ?> (English)</label>
                                                        <input type="text" class="form-control" id="title_en" name="title_en" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="description_ar" class="form-label"><?php echo t('description'); ?> (العربية)</label>
                                                        <textarea class="form-control" id="description_ar" name="description_ar" rows="3" required></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="description_en" class="form-label"><?php echo t('description'); ?> (English)</label>
                                                        <textarea class="form-control" id="description_en" name="description_en" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="form-label"><?php echo t('price'); ?></label>
                                                    <input type="number" step="0.01" class="form-control" id="price" name="price">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo t('close'); ?></button>
                                                <button type="submit" name="add_service" class="btn btn-primary"><?php echo t('submit'); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($admin_page == 'messages'): ?>
                            <!-- إدارة الرسائل -->
                            <h3 class="mb-4"><?php echo t('contact_messages'); ?></h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo t('name'); ?></th>
                                            <th><?php echo t('email'); ?></th>
                                            <th><?php echo t('phone'); ?></th>
                                            <th><?php echo t('message'); ?></th>
                                            <th><?php echo t('actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($messages) > 0): ?>
                                            <?php foreach ($messages as $message): ?>
                                                <tr>
                                                    <td><?php echo $message['id']; ?></td>
                                                    <td><?php echo $message['name']; ?></td>
                                                    <td><?php echo $message['email']; ?></td>
                                                    <td><?php echo $message['phone'] ? $message['phone'] : '-'; ?></td>
                                                    <td><?php echo substr($message['message'], 0, 50); ?>...</td>
                                                    <td>
                                                        <a href="mailto:<?php echo $message['email']; ?>" class="btn btn-sm btn-info"><?php echo t('reply'); ?></a>
                                                        <a href="?admin=messages&delete_message=<?php echo $message['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo t('confirm_delete'); ?>')"><?php echo t('delete'); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center"><?php echo t('no_messages'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <!-- تذييل الصفحة -->
    <footer class="text-center py-4">
        <div class="container">
            <p><?php echo t('copyright'); ?></p>
            <div class="social-links">
                <a href="#" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <!-- نموذج تسجيل الدخول -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo t('login'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <?php if (isset($login_error)): ?>
                            <div class="alert alert-danger"><?php echo $login_error; ?></div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label"><?php echo t('email'); ?></label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label"><?php echo t('password'); ?></label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe"><?php echo t('remember_me'); ?></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo t('close'); ?></button>
                        <button type="submit" name="login" class="btn btn-primary"><?php echo t('login'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // تغيير اتجاه الصفحة عند تغيير اللغة
        document.querySelector('.lang-switcher').addEventListener('click', function() {
            setTimeout(() => {
                const lang = document.cookie.replace(/(?:(?:^|.*;\s*)lang\s*=\s*([^;]*).*$|^.*$/, '$1') || '<?php echo $site_settings['default_lang']; ?>';
                document.body.className = lang === 'ar' ? 'rtl' : 'ltr';
            }, 100);
        });
    </script>
</body>
</html>