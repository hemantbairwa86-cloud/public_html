# AGENTS.md - Developer & AI Agent Guide for Venus Products

> **Important**: This document serves as the primary guidance for AI agents and human developers working on the **Venus Products** codebase. All future changes, enhancements, and bug fixes MUST strictly follow the structure, coding patterns, architectural decisions, and safety rules described herein.

---

## 1. Project Understanding

### Project Name and Purpose  
- **Project Name**: Venus Products
- **Purpose**: A full-featured E-commerce Web Application for Venus Products (established 1987), enabling customers to browse, search, and purchase consumer products (e.g., Ayurvedic/cosmetic/household products), manage orders, and track deliveries, along with an Admin Panel for managing products, orders, categories, customer feedback, sliders, and site configuration.

### Frontend Technology & Stack
- **Languages**: HTML5, CSS3, JavaScript (ES5/ES6)
- **UI Libraries & Frameworks**:
  - Custom Responsive Stylesheet (`assest/frontend/css/style.css`)
  - FontAwesome icons (`font-awesome.min.css`)
  - jQuery
  - Slick Carousel (`slick.css`, Slick JS)
  - Magnific Popup (`magnific-popup.css`)
  - SweetAlert2 (`sweetalert2@10.js`, `sweetalert2.min.css`) for toast notifications and popups
  - Image Cropper (`assest/cropper/`) for admin image uploads
  - PrefixFree (`prefixfree.min.js`)

### Backend Technology & Stack
- **Language**: PHP (>= 5.3.7 / 7.x compatible)
- **Framework**: CodeIgniter Framework v3 (CI 3.x)
- **Architecture**: Model-View-Controller (MVC)
- **Dependencies & Utilities**:
  - Composer managed packages: `phpunit/phpunit`, `mikey179/vfsStream`
  - Libraries: `dompdf` / `Pdf.php` (PDF Invoice generation), `Phpmailer_lib.php` (Email notifications), `image_lib` (CI Image manipulation), `cart` (CI Cart Library)

### Database Technology
- **Database Engine**: MySQL / MariaDB (Driver: `mysqli`)
- **Database Name**: `u826608559_venusp`
- **Schema Reference**: Defined in `-- phpMyAdmin SQL Dump.sql`
- **Query Builder**: CodeIgniter Active Record / Query Builder

### Project Architecture
- **Base Controller**: [MY_Controller.php](file:///c:/venus/public_html/application/core/MY_Controller.php) extends `CI_Controller` and pre-loads global helpers, libraries, website information, categories, header/footer menu structures, and cart totals into `$this->data`.
- **Public Frontend**: Controllers located in [application/controllers/](file:///c:/venus/public_html/application/controllers/), views in [application/views/](file:///c:/venus/public_html/application/views/).
- **Admin Panel**: Controllers located in [application/controllers/administrator/](file:///c:/venus/public_html/application/controllers/administrator/), views in [application/views/administrator/](file:///c:/venus/public_html/application/views/administrator/).
- **Data Layer & Models**:
  - [Crud_Model.php](file:///c:/venus/public_html/application/models/administrator/Crud_Model.php): Primary model handling generic database queries (`getDatafromtable`, `getDatafromtablewhere`, `InsertData`, `Updatedata`, `DeletData`, pagination helpers).
  - [User.php](file:///c:/venus/public_html/application/models/administrator/User.php): Admin authentication and verification.
  - [order_model.php](file:///c:/venus/public_html/application/models/order_model.php): Complex order queries, item variations, and addons.

### Main Folders & Responsibilities
- `application/config/`: Configuration files (`routes.php`, `database.php`, `config.php`, `autoload.php`, `constants.php`).
- `application/controllers/`: Public storefront controllers (`Home`, `Products`, `Cart`, `Checkout`, `Order`, `Login`, `User`, `Ajax`, `Razorpay`, `Phonepay`, `About`, `Contact`, `Terms`).
- `application/controllers/administrator/`: Admin section controllers (`Home`, `Dashboard`, `Product`, `Order`, `Customer`, `Master`, `Slider`, `Offerzone`, `Advertisement`, `Gallery`, `Rating`, `Report`, `Seo`, `Subscription`, `Testimonial`).
- `application/core/`: Extension of core CI framework files (`MY_Controller.php`).
- `application/helpers/`: Custom procedural helpers ([common_function_helper.php](file:///c:/venus/public_html/application/helpers/common_function_helper.php)).
- `application/libraries/`: Custom libraries (`Pdf.php`, `Phpmailer_lib.php`, `dompdf`).
- `application/models/`: Database models (`Crud_Model.php`, `User.php`, `order_model.php`).
- `application/views/`: HTML template views for public storefront and admin dashboard.
- `assest/`: Public CSS, JavaScript, fonts, images, cropper libraries.
- `uploads/`: Media storage directory (product images, thumbnails, banners, gallery images).
- `system/`: CodeIgniter core system directory.

### Main Application Entry Points
- [index.php](file:///c:/venus/public_html/index.php): Front controller loading system files, defining `ENVIRONMENT` ('production'/'development'), and routing HTTP requests.

### Configuration Files
- [application/config/config.php](file:///c:/venus/public_html/application/config/config.php): Base URL, session configs, security settings.
- [application/config/database.php](file:///c:/venus/public_html/application/config/database.php): Database credentials, hostname, driver (`mysqli`), collation.
- [application/config/routes.php](file:///c:/venus/public_html/application/config/routes.php): Clean URI mapping (e.g. `terms-and-conditions`, `shopping-cart`, `products/(:any)`, `our-products`, `forgot-password`).
- [application/config/autoload.php](file:///c:/venus/public_html/application/config/autoload.php): Auto-loaded libraries (`database`, `form_validation`, `session`, `email`), helpers (`form`, `url`, `file`, `common_function`).

### Environment & Configuration Handling
- Controlled via `define('ENVIRONMENT', 'production');` in `index.php`.
- Toggles `error_reporting` and `display_errors` as well as database debugging status (`db_debug`).

### Authentication & Authorization Flow
- **Admin Auth**: `VenusProductSession` session key stores logged-in admin details. Guarded by `$this->is_admin_logged_in()` method in `MY_Controller`.
- **Customer Auth**: `user_front_session` session key stores user data and default address ID (`cur_sel_address`). Guarded by helper `is_login_user_front()`.

### API & AJAX Communication Structure
- Web controller endpoints returning JSON objects (e.g. `{"error": 0, "msg": "..."}`) or HTML view fragments.
- AJAX requests are processed via `Ajax.php` (frontend cart/state/rating actions) and `administrator/Ajax.php` (admin status toggles).

### State Management Approach
- Server-side CodeIgniter Session library (`$this->session->userdata()`).
- Native CodeIgniter Cart library (`$this->cart`) for cart item storage, total calculations, and item counts.

### UI & Component Architecture
- PHP view partial inclusion model:
  - Header: `application/views/common/header.php`
  - Footer: `application/views/common/footer.php`
  - Modals: `quick_view_modal.php`, `login_modal.php`
  - Common CSS/JS: `common_css.php`, `footer_js.php`
  - Admin Header/Sidebar/Footer: `application/views/administrator/common/`

### Common Utilities & Helpers
- Located in [common_function_helper.php](file:///c:/venus/public_html/application/helpers/common_function_helper.php):
  - `number_to_word($num)`: Converts monetary values to words for invoices.
  - `WebsiteInformation()`, `CategoryDetails()`, `CollectionDetails()`, `PriceRangeDetails()`, `WelcomeNoteDetails()`: Global data fetchers.
  - `send_mail($to, $message, $subject)`: PHPMailer integration helper.
  - `is_login_user_front()`: Session authentication check.

### Notifications, Errors & Validation
- **Flashdata**: `$this->session->set_flashdata('errors'|'success', 'Message')`.
- **Form Validation**: Standard CodeIgniter Form Validation (`$this->form_validation->set_rules()`).
- **Toasts & Popups**: SweetAlert2 for interactive alerts.

---

## 2. Existing Modules

### 1. Storefront & Home Module
- **Purpose**: Displays brand homepage, hero banner slider, category highlights, new arrivals, best sellers, testimonials, welcome note.
- **Main Pages**: `home.php`, `about_us.php`, `contact_us.php`, `our_products.php`, `tearms_conditions.php`, `privacy_policy.php`, `refund_policy.php`, `shipping_policy.php`.
- **Main Files**:
  - Controller: [application/controllers/Home.php](file:///c:/venus/public_html/application/controllers/Home.php), [About.php](file:///c:/venus/public_html/application/controllers/About.php), [Contact.php](file:///c:/venus/public_html/application/controllers/Contact.php), [Terms.php](file:///c:/venus/public_html/application/controllers/Terms.php).
  - Views: `home.php`, `about_us.php`, `contact_us.php`, `tearms_conditions.php`, `privacy_policy.php`, etc.
- **Models/Services**: `Crud_Model.php`, `common_function_helper.php`.
- **Navigation Routes**: `/`, `/about/company`, `/terms-and-conditions`, `/privacy-policy`, `/refund-policy`, `/shipping-policy`.
- **Dependencies**: Cart Library, `Crud_Model`.

### 2. Product Catalog & Details Module
- **Purpose**: Product browsing, category filtering, search, pagination, detailed product view, price variants, weight options, customer reviews and ratings.
- **Main Pages**: `product-listing.php`, `product-detail.php`.
- **Main Files**:
  - Controller: [application/controllers/Products.php](file:///c:/venus/public_html/application/controllers/Products.php).
  - Views: `product-listing.php`, `product-detail.php`.
- **Routes**:
  - `/products/(:any)` -> `products/index/$1`
  - `/product/(:any)/(:any)` -> `products/product/$1/$2`
  - `/our-products` -> `ourproducts/index`
- **Dependencies**: `Crud_Model`, pagination library, product reviews table (`product_reviews`).

### 3. Shopping Cart & Wishlist Module
- **Purpose**: Item addition to cart, quantity updates, removal, price calculation based on selected weight/variant, cart sidebar modal.
- **Main Pages**: `cart.php`, cart dropdown modal in header.
- **Main Files**:
  - Controller: [application/controllers/Cart.php](file:///c:/venus/public_html/application/controllers/Cart.php).
  - Views: `cart.php`, `application/views/common/cart.php`.
- **Routes**: `/shopping-cart`.
- **Dependencies**: CodeIgniter `cart` library, `Crud_Model`.

### 4. Checkout & Order Processing Module
- **Purpose**: Address selection/addition, state/city dynamic loading, order summary calculation, shipping threshold calculation, coupon/discount evaluation, payment mode selection.
- **Main Pages**: `checkout.php`.
- **Main Files**:
  - Controller: [application/controllers/Checkout.php](file:///c:/venus/public_html/application/controllers/Checkout.php), [Order.php](file:///c:/venus/public_html/application/controllers/Order.php).
  - Views: `checkout.php`.
- **Database Tables**: `customer_bill`, `customer_order_details`, `users_address`, `billing_address`, `own_states`, `own_countries`, `festival_discount`, `free_shipping`.
- **Dependencies**: Customer Auth session, `cart` library, `Crud_Model`.

### 5. Payment Gateway Integration Module
- **Purpose**: Online payment integration with Razorpay and PhonePe. Webhook/callback validation, payment verification, order generation, confirmation emails.
- **Main Files**:
  - Controllers: [application/controllers/Razorpay.php](file:///c:/venus/public_html/application/controllers/Razorpay.php), [Phonepay.php](file:///c:/venus/public_html/application/controllers/Phonepay.php).
- **Dependencies**: Razorpay API SDK / curl, PhonePe SHA256 signature payload verification, `PHPMailer`.

### 6. User Account & Dashboard Module
- **Purpose**: Customer signup, login, profile edit, password reset, address management, order history viewing.
- **Main Pages**: `login.php`, `dashboard.php`, `forgot_password.php`.
- **Main Files**:
  - Controllers: [Login.php](file:///c:/venus/public_html/application/controllers/Login.php), [Dashboard.php](file:///c:/venus/public_html/application/controllers/Dashboard.php), [User.php](file:///c:/venus/public_html/application/controllers/User.php).
  - Views: `login.php`, `dashboard.php`, `forgot_password.php`.
- **Routes**: `/forgot-password`, `/reset-password`, `/profile/change-password`.

### 7. Admin Dashboard & Authentication Module
- **Purpose**: Admin login, password reset, main metrics overview (total orders, revenues, products, registered customers).
- **Main Files**:
  - Controllers: [administrator/Home.php](file:///c:/venus/public_html/application/controllers/administrator/Home.php), [administrator/Dashboard.php](file:///c:/venus/public_html/application/controllers/administrator/Dashboard.php).
  - Model: [administrator/User.php](file:///c:/venus/public_html/application/models/administrator/User.php).
  - Views: `administrator/home.php`, `administrator/dashboard.php`.

### 8. Admin Product Management Module
- **Purpose**: Full CRUD for products, price variants, weight options, image thumbnail generation, status toggles, product extra specs.
- **Main Files**:
  - Controller: [administrator/Product.php](file:///c:/venus/public_html/application/controllers/administrator/Product.php).
  - Views: `administrator/products.php`, `administrator/product_details.php`.

### 9. Admin Order & Sales Management Module
- **Purpose**: View customer orders, datatable server-side pagination, view invoice, update payment/shipping status, sales report generation.
- **Main Files**:
  - Controllers: [administrator/Order.php](file:///c:/venus/public_html/application/controllers/administrator/Order.php), [administrator/Report.php](file:///c:/venus/public_html/application/controllers/administrator/Report.php).
  - Views: `administrator/view_order.php`, `administrator/view_order_details.php`, `administrator/order-detail.php`, `administrator/report.php`.

### 10. Admin Master Data & Content Management Module
- **Purpose**: Manage categories, offer banners, sliders, advertisements, testimonials, photo gallery, SEO meta tags, product reviews approval, customer subscriptions.
- **Main Controllers**:
  - `Master.php` (Categories & Weights)
  - `Slider.php` (Home Sliders)
  - `Offerzone.php` (Special Offers)
  - `Advertisement.php` (Banners)
  - `Gallery.php` (Photo Gallery)
  - `Testimonial.php` (Customer Feedback)
  - `Seo.php` (Meta Title/Keywords/Description)
  - `Rating.php` (Product Reviews Management)
  - `Subscription.php` (Newsletter Subscribers)

---

## 3. Coding Patterns & Conventions

### Naming Conventions
- **Controllers**: PascalCase class & file name (`Home.php`, `Products.php`, `MY_Controller.php`).
- **Models**: PascalCase or snake_case file name (`Crud_Model.php`, `User.php`, `order_model.php`). Class names inherit from `CI_Model`.
- **Views**: Lowercase with hyphens or underscores (`product-detail.php`, `product-listing.php`, `about_us.php`).
- **Helpers**: Function names in `snake_case` or `PascalCase` (`number_to_word`, `WebsiteInformation`, `send_mail`).
- **Database Tables**: `snake_case` (`users`, `customer_bill`, `customer_order_details`, `product`, `product_price`, `product_image`, `category`, `slider`, `admin`).
- **Variables & Input Fields**: `snake_case` (e.g. `$product_id`, `$ins_data`, `$customer_info`).

### Controller & View Pattern
- All public controllers extend `MY_Controller`.
- Common view data is injected into `$this->data` before passing to `$this->load->view('view_name', $this->data)`.
- Admin controllers extend `MY_Controller` and call `$this->is_admin_logged_in();` inside `__construct()`.

### Database & Repository Pattern
- Primary DB interactions use `$this->Crud_Model` wrapper functions:
  ```php
  // Single record lookup
  $item = $this->Crud_Model->getDatafromtablewheresingle('table_name', array('id' => $id));

  // Multi record array lookup with order
  $items = $this->Crud_Model->getDatafromtablewhere('table_name', array('status' => 1), 'ASC');

  // Insert & Update
  $ins_id = $this->Crud_Model->InsertData('table_name', $data);
  $this->Crud_Model->Updatedata($id, 'id', 'table_name', $update_data);
  ```
- Complex queries use CodeIgniter Active Record Query Builder (`$this->db->select()->from()->join()->where()->get()`).

### Session & Auth Check Pattern
- Check customer login: `is_login_user_front()`
- Check admin login: `$this->is_admin_logged_in()`

### Validation & Response Pattern
- Controllers validate POST input with `$this->form_validation->run()`.
- AJAX actions return JSON: `echo json_encode(array('error' => 0, 'msg' => 'Success message')); exit;`

---

## 4. Existing Functionality Protection Rules

To prevent regressions and maintain code quality, all AI agents and developers must obey:

1. **Do Not Rewrite Working Code**: Modify only the code necessary to implement the requested feature or fix the bug.
2. **Preserve Database Structure**: Do NOT drop, alter, or rename existing columns/tables without explicit user instructions.
3. **Preserve API Contracts**: Keep existing controller endpoints, parameter names, and AJAX response schemas intact.
4. **Maintain State Architecture**: Do NOT replace CodeIgniter's native Session or Cart library with alternative session mechanisms.
5. **Reuse Existing Utilities**: Always check [common_function_helper.php](file:///c:/venus/public_html/application/helpers/common_function_helper.php) and [Crud_Model.php](file:///c:/venus/public_html/application/models/administrator/Crud_Model.php) before writing new helper functions or queries.
6. **Protect Shared View Components**: When editing `common/header.php`, `common/footer.php`, `common_css.php`, or `footer_js.php`, test across all pages to ensure no site-wide visual breakages occur.

---

## 5. Workflow Before Starting Any Task

Before making code edits on this repository, complete the following steps:

1. **Read `AGENTS.md`**: Understand existing architectural decisions and patterns.
2. **Locate Target Files**: Find the relevant Controller, Model, and View using code search.
3. **Trace Data Flow**: Trace how `$this->data` is constructed in the Controller and consumed in the View.
4. **Verify Existing Helper Functions**: Check if a function performing the needed query or utility already exists in `Crud_Model.php` or `common_function_helper.php`.
5. **Check Routes**: Review `application/config/routes.php` if creating new pages or URL endpoints.
6. **Plan Minimal Changes**: Determine the minimum required modifications without touching unrelated modules.
7. **Verify & Test**: Check page rendering, form submission, and session stability after changes.
