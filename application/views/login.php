<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php
$SeoDetails = is_array($SeoDetails ?? null) ? $SeoDetails : array();
$seo_title = $SeoDetails['seotitle'] ?? '';
$seo_desc  = $SeoDetails['seodescription'] ?? '';
$seo_keys  = $SeoDetails['seokeywords'] ?? '';
$firm_name = defined('FIRM_NAME') ? FIRM_NAME : 'Venus Products';
$initial_mode = isset($initial_mode) ? $initial_mode : 'login';
?>
<title><?php echo !empty($seo_title) ? ($seo_title . " | " . $firm_name) : ("Login & Registration | " . $firm_name); ?></title>
<meta name="description" content="<?php echo $seo_desc; ?>">
<meta name="keywords" content="<?php echo $seo_keys; ?>">
<meta name="author" content="<?php echo $firm_name; ?>">
<meta property="og:title" content="<?php echo !empty($seo_title) ? ($seo_title . " | " . $firm_name) : ("Login & Registration | " . $firm_name); ?>" />
<meta property="og:description" content="<?php echo $seo_desc; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $this->load->view('common/common_css.php');?>

<!-- FontAwesome 4.7 for input field prefix icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assest/frontend/css/font-awesome.min.css">

<style type="text/css">
/* ==========================================================================
   Venus Products - Native Theme Extension for Login & Registration
   ========================================================================== */
:root {
  --vp-brand-green: #134d47;
  --vp-brand-dark: #0a2d2a;
  --vp-brand-mint: #f3fffa;
  --vp-brand-accent: #d4af37;
  --vp-text-dark: #1b2826;
  --vp-border: #dce7e4;
  --vp-card-shadow: 0 15px 35px rgba(19, 77, 71, 0.08);
}

.page-secton-wrapper {
  background-color: #f8fafc;
  padding: 50px 0 80px 0;
}

/* Split Hero Card Container */
.vp-auth-split-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid var(--vp-border);
  box-shadow: var(--vp-card-shadow);
  overflow: hidden;
  max-width: 1050px;
  margin: 0 auto;
}

/* Left Brand Visual Column */
.vp-auth-brand-col {
  background: linear-gradient(135deg, rgba(19, 77, 71, 0.91) 0%, rgba(10, 45, 42, 0.95) 100%), 
              url('<?php echo base_url(); ?>assest/frontend/images/banners/login_hero.jpg') center center / cover no-repeat;
  padding: 45px 35px;
  color: #ffffff;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
}

.vp-logo-badge-wrap {
  background: #ffffff;
  padding: 10px 18px;
  border-radius: 10px;
  display: inline-block;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
}
.vp-logo-badge-wrap img {
  max-height: 44px;
  width: auto;
  display: block;
}

.vp-brand-badge {
  display: inline-block;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(5px);
  padding: 5px 14px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--vp-brand-accent);
  border: 1px solid rgba(255, 255, 255, 0.2);
  margin-top: 15px;
}

.vp-brand-hero-title {
  color: #ffffff;
  font-weight: 800;
  font-size: 1.85rem;
  line-height: 1.3;
  margin-top: 20px;
  margin-bottom: 10px;
}
.vp-brand-hero-desc {
  color: rgba(255, 255, 255, 0.85);
  font-size: 0.92rem;
  line-height: 1.6;
}

.vp-brand-feature-list {
  list-style: none;
  padding: 0;
  margin: 25px 0 0 0;
}
.vp-brand-feature-item {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.92);
  margin-bottom: 14px;
  font-weight: 600;
}
.vp-brand-feature-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--vp-brand-accent);
  font-size: 0.9rem;
  flex-shrink: 0;
}

.vp-brand-footer-text {
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  padding-top: 18px;
  margin-top: 25px;
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.8);
}

/* Right Form Column */
.vp-auth-form-col {
  padding: 45px 35px;
  background: #ffffff;
}

/* Segmented Mode Switcher */
.vp-mode-switcher {
  display: flex;
  background: #e2ece8;
  border-radius: 12px;
  padding: 5px;
  margin-bottom: 30px;
}
.vp-mode-btn {
  flex: 1;
  padding: 10px 16px;
  border: none;
  background: transparent;
  color: #475569;
  font-weight: 700;
  font-size: 0.95rem;
  border-radius: 8px;
  transition: all 0.25s ease;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}
.vp-mode-btn.active {
  background: #ffffff;
  color: var(--vp-brand-green);
  box-shadow: 0 3px 10px rgba(19, 77, 71, 0.12);
}

/* Form Panel Visibilities */
.vp-form-panel {
  display: none;
  animation: vpFadeIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.vp-form-panel.active {
  display: block;
}

@keyframes vpFadeIn {
  from { opacity: 0; transform: translateY(8px); }
  to { opacity: 1; transform: translateY(0); }
}

.vp-card-heading {
  color: var(--vp-brand-green);
  font-weight: 800;
  font-size: 1.55rem;
  margin-bottom: 4px;
}
.vp-card-desc {
  color: #64748b;
  font-size: 0.9rem;
  margin-bottom: 25px;
}

/* Step Bar for Registration */
.vp-reg-step-bar {
  display: flex;
  align-items: center;
  margin-bottom: 25px;
}
.vp-reg-step-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 700;
  font-size: 0.85rem;
  color: #94a3b8;
  padding: 6px 14px;
  border-radius: 20px;
  background: #f1f5f9;
}
.vp-reg-step-item.active {
  background: var(--vp-brand-mint);
  color: var(--vp-brand-green);
}
.vp-reg-step-number {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #cbd5e1;
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
}
.vp-reg-step-item.active .vp-reg-step-number {
  background: var(--vp-brand-green);
}
.vp-reg-step-line {
  height: 2px;
  width: 30px;
  background: #e2e8f0;
  margin: 0 8px;
}

/* Input Fields & Icon Wrapper */
.vp-form-group {
  margin-bottom: 18px;
  position: relative;
}
.vp-form-group label {
  font-weight: 600;
  font-size: 0.88rem;
  color: #334155;
  margin-bottom: 6px;
  display: block;
}
.vp-form-group label .req {
  color: #e11d48;
  font-weight: 700;
}

.vp-input-box {
  position: relative;
  display: flex;
  align-items: center;
}
.vp-input-box .field-icon {
  position: absolute;
  left: 14px;
  color: #94a3b8;
  font-size: 1.05rem;
  pointer-events: none;
  z-index: 2;
}
.vp-input-box .form-control {
  width: 100%;
  height: 46px;
  padding: 10px 42px 10px 44px;
  font-size: 0.92rem;
  color: #1e293b;
  background-color: #ffffff;
  border: 1.5px solid var(--vp-border);
  border-radius: 8px;
  transition: all 0.25s ease;
  outline: none;
}
.vp-input-box select.form-control {
  appearance: auto;
  cursor: pointer;
}
.vp-input-box .form-control:focus {
  border-color: var(--vp-brand-green);
  box-shadow: 0 0 0 4px rgba(19, 77, 71, 0.12);
}
.vp-input-box.is-valid .form-control {
  border-color: #10b981;
}
.vp-input-box.is-invalid .form-control {
  border-color: #f43f5e;
}

.validation-feedback-text {
  font-size: 0.82rem;
  font-weight: 600;
  margin-top: 4px;
  display: none;
}
.validation-feedback-text.invalid-msg {
  color: #f43f5e;
  display: block;
}

.vp-pwd-toggle {
  position: absolute;
  right: 12px;
  background: transparent;
  border: none;
  color: #94a3b8;
  font-size: 1.05rem;
  cursor: pointer;
  padding: 6px;
  z-index: 3;
}
.vp-pwd-toggle:hover {
  color: var(--vp-brand-green);
}

/* Shipping Extra Box */
.shipping-extra-card {
  background: var(--vp-brand-mint);
  border: 1px solid var(--vp-border);
  border-radius: 8px;
  padding: 14px;
  margin-top: 15px;
}
.shipping-extra-card label {
  font-weight: 600;
  color: var(--vp-brand-green);
  cursor: pointer;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 10px;
}
.shipping-extra-card input[type="checkbox"] {
  width: 18px;
  height: 18px;
  accent-color: var(--vp-brand-green);
}

.extra-shipping-panel {
  display: none;
  margin-top: 12px;
  padding-top: 12px;
  border-top: 1px dashed var(--vp-border);
}

/* Action Buttons */
.btn-vp-action {
  width: 100%;
  height: 48px;
  background: linear-gradient(135deg, var(--vp-brand-green) 0%, var(--vp-brand-dark) 100%);
  color: #ffffff;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  font-size: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  cursor: pointer;
  box-shadow: 0 8px 18px rgba(19, 77, 71, 0.2);
  transition: all 0.25s ease;
}
.btn-vp-action:hover {
  background: linear-gradient(135deg, var(--vp-brand-dark) 0%, var(--vp-brand-green) 100%);
  transform: translateY(-2px);
  box-shadow: 0 12px 24px rgba(19, 77, 71, 0.28);
  color: #ffffff;
}

.btn-vp-secondary {
  height: 48px;
  background: #e2ece8;
  color: var(--vp-brand-green);
  border: none;
  border-radius: 8px;
  font-weight: 700;
  font-size: 0.95rem;
  padding: 0 20px;
  cursor: pointer;
  transition: all 0.25s ease;
}

.auth-switch-prompt {
  text-align: center;
  margin-top: 25px;
  padding-top: 18px;
  border-top: 1px solid #f1f5f9;
  color: #64748b;
  font-size: 0.9rem;
}
.auth-switch-prompt a {
  color: var(--vp-brand-green);
  font-weight: 700;
  text-decoration: none;
}
.auth-switch-prompt a:hover {
  text-decoration: underline;
}

/* Hide Left Portion on Mobile / Small Screens (< 992px) */
@media (max-width: 991.98px) {
  .vp-auth-brand-col {
    display: none !important;
  }
  .vp-auth-form-col {
    padding: 30px 20px !important;
  }
  .vp-auth-split-card {
    border-radius: 14px;
    margin: 0 5px;
  }
  .page-secton-wrapper {
    padding: 20px 0 40px 0;
  }
}
</style>
</head>
<body>

<header class="header">
  <?php $this->load->view('common/header.php');?>
</header>

<main>
  <!-- Standard Venus Breadcrumb Start -->
  <section class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <h1 class="page-title"><?php echo ($initial_mode == 'register') ? 'New Registration' : 'Account Login'; ?></h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Login / Registration</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->

  <!-- Page Main Section -->
  <section class="page-secton-wrapper section-space-ptb">
    <div class="container">
      
      <!-- Session Error Messages -->
      <div class="row justify-content-center">
        <div class="col-md-10">
          <?php $this->load->view('common/errors'); ?>
        </div>
      </div>

      <!-- VENUS SPLIT CARD WRAPPER -->
      <div class="vp-auth-split-card row g-0">

        <!-- LEFT BRAND VISUAL COLUMN (Hidden on Mobile < 992px) -->
        <div class="col-lg-5 vp-auth-brand-col d-none d-lg-flex">
          <div>
            <div class="vp-logo-badge-wrap">
              <img src="<?php echo base_url(); ?>assest/frontend/images/logo.svg" alt="Venus Products Logo" title="Venus Products">
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap mt-3">
              <span class="vp-brand-badge"><i class="fa fa-leaf me-1"></i> Since 1987</span>
              <span class="vp-brand-badge" style="color:#ffffff; border-color:rgba(255,255,255,0.3);"><i class="fa fa-certificate me-1"></i> GMP Certified</span>
            </div>

            <h2 class="vp-brand-hero-title">Goodness of Pure Ayurveda</h2>
            <p class="vp-brand-hero-desc">100% Herbal &amp; Natural formulations approved by FDA, rooted in <strong>Swadeshi &amp; Natural</strong> principles since 1987.</p>

            <!-- Feature Bullet List -->
            <ul class="vp-brand-feature-list">
              <li class="vp-brand-feature-item">
                <div class="vp-brand-feature-icon"><i class="fa fa-leaf"></i></div>
                <span>100% Herbal &amp; Natural Formulations</span>
              </li>
              <li class="vp-brand-feature-item">
                <div class="vp-brand-feature-icon"><i class="fa fa-check-square-o"></i></div>
                <span>GMP Certified &amp; FDA Approved</span>
              </li>
              <li class="vp-brand-feature-item">
                <div class="vp-brand-feature-icon"><i class="fa fa-flag"></i></div>
                <span>Swadeshi &amp; Natural Heritage</span>
              </li>
              <li class="vp-brand-feature-item">
                <div class="vp-brand-feature-icon"><i class="fa fa-truck"></i></div>
                <span>Fast Express Delivery across India</span>
              </li>
              <li class="vp-brand-feature-item">
                <div class="vp-brand-feature-icon"><i class="fa fa-shield"></i></div>
                <span>100% Secure &amp; Encrypted Account</span>
              </li>
            </ul>
          </div>

          <div class="vp-brand-footer-text">
            <i class="fa fa-star text-warning me-1"></i> Top Ayurvedic Products Manufacturer in Gujarat, India.
          </div>
        </div>
        <!-- LEFT COLUMN END -->


        <!-- RIGHT FORM COLUMN -->
        <div class="col-12 col-lg-7 vp-auth-form-col">

          <!-- Segmented Mode Switcher -->
          <div class="vp-mode-switcher">
            <button type="button" class="vp-mode-btn <?php echo ($initial_mode != 'register') ? 'active' : ''; ?>" id="mode-btn-login" onclick="switchAuthMode('login')">
              <i class="fa fa-sign-in"></i> Sign In
            </button>
            <button type="button" class="vp-mode-btn <?php echo ($initial_mode == 'register') ? 'active' : ''; ?>" id="mode-btn-register" onclick="switchAuthMode('register')">
              <i class="fa fa-user-plus"></i> Create Account
            </button>
          </div>

          <!-- PANEL 1: LOGIN FORM -->
          <div class="vp-form-panel <?php echo ($initial_mode != 'register') ? 'active' : ''; ?>" id="panel-login">
            <div class="mb-4">
              <h2 class="vp-card-heading">Welcome Back</h2>
              <p class="vp-card-desc">Enter your email and password to access your account</p>
            </div>

            <form action="<?php echo base_url()."login"; ?>" method="POST" id="form_login_submit" autocomplete="off" onsubmit="return validateLoginForm();">
              <input type="hidden" name="btn" value="Login">

              <!-- Email Input -->
              <div class="vp-form-group">
                <label for="login_email">Email Address <span class="req">*</span></label>
                <div class="vp-input-box" id="box_login_email">
                  <i class="fa fa-envelope-o field-icon"></i>
                  <input type="email" name="email" id="login_email" class="form-control" placeholder="yourname@example.com" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" onblur="validateEmailField(this, 'msg_login_email')">
                </div>
                <span class="validation-feedback-text invalid-msg" id="msg_login_email"></span>
                <?php echo form_error('email', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
              </div>

              <!-- Password Input -->
              <div class="vp-form-group">
                <label for="login_password">Password <span class="req">*</span></label>
                <div class="vp-input-box" id="box_login_password">
                  <i class="fa fa-lock field-icon"></i>
                  <input type="password" name="password" id="login_password" class="form-control" placeholder="Enter your password" required onblur="validateRequiredField(this, 'msg_login_pwd')">
                  <button type="button" class="vp-pwd-toggle" onclick="togglePasswordVisibility('login_password', 'pwd_eye_login')">
                    <i id="pwd_eye_login" class="fa fa-eye"></i>
                  </button>
                </div>
                <span class="validation-feedback-text invalid-msg" id="msg_login_pwd"></span>
                <?php echo form_error('password', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
              </div>

              <!-- Remember & Forgot Password Utility -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="remember_me" style="accent-color: var(--vp-brand-green); cursor: pointer;">
                  <label class="form-check-label text-secondary small ms-1" for="remember_me" style="cursor: pointer;">Remember me</label>
                </div>
                <a href="<?php echo base_url();?>forgot-password" class="small fw-semibold text-decoration-none" style="color: var(--vp-brand-green);">
                  <i class="fa fa-key me-1"></i>Forgot password?
                </a>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn-vp-action" name="btn" value="Login">
                Sign In Now <i class="fa fa-arrow-right ms-1"></i>
              </button>
            </form>

            <div class="auth-switch-prompt">
              Don't have an account? <a href="javascript:void(0);" onclick="switchAuthMode('register')">Register Now →</a>
            </div>
          </div>
          <!-- PANEL 1 END -->


          <!-- PANEL 2: REGISTRATION FORM -->
          <div class="vp-form-panel <?php echo ($initial_mode == 'register') ? 'active' : ''; ?>" id="panel-register">
            <div class="mb-3">
              <h2 class="vp-card-heading">Register Account</h2>
              <p class="vp-card-desc">Join Venus Products for fast checkout &amp; order tracking</p>
            </div>

            <!-- Step Indicator Bar -->
            <div class="vp-reg-step-bar">
              <div class="vp-reg-step-item active" id="step-indicator-1">
                <span class="vp-reg-step-number">1</span> Account Details
              </div>
              <div class="vp-reg-step-line"></div>
              <div class="vp-reg-step-item" id="step-indicator-2">
                <span class="vp-reg-step-number">2</span> Shipping &amp; Address
              </div>
            </div>

            <form action="<?php echo base_url()."login/signup"; ?>" method="POST" id="form_reg_submit" autocomplete="off" onsubmit="return validateRegForm();">

              <!-- STEP 1: ACCOUNT DETAILS -->
              <div id="reg-step-1-content">
                <div class="row g-2">
                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>First Name <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-user-o field-icon"></i>
                        <input type="text" name="first_name" id="reg_first_name" class="form-control" placeholder="First Name" required value="<?php echo isset($first_name) ? htmlspecialchars($first_name) : ''; ?>" onblur="validateRequiredField(this, 'msg_fname')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_fname"></span>
                      <?php echo form_error('first_name', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Last Name <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-user-o field-icon"></i>
                        <input type="text" name="last_name" id="reg_last_name" class="form-control" placeholder="Last Name" required value="<?php echo isset($last_name) ? htmlspecialchars($last_name) : ''; ?>" onblur="validateRequiredField(this, 'msg_lname')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_lname"></span>
                      <?php echo form_error('last_name', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Mobile Number <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-phone field-icon"></i>
                        <input type="text" name="mobile" id="reg_mobile" class="form-control" placeholder="10-digit mobile" maxlength="10" required value="<?php echo isset($mobile) ? htmlspecialchars($mobile) : ''; ?>" onblur="validateMobileField(this, 'msg_mobile')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_mobile"></span>
                      <?php echo form_error('mobile', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Email Address <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-envelope-o field-icon"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="yourname@example.com" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" onchange="checkDuplicateEmail()" onkeyup="checkDuplicateEmail()" onblur="validateEmailField(this, 'msg_email')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_email"></span>
                      <span class="validation-feedback-text invalid-msg" id="email_errormsg"></span>
                      <?php echo form_error('email', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Password <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-lock field-icon"></i>
                        <input type="password" name="password" id="reg_password" class="form-control" placeholder="Min. 6 characters" required value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" onblur="validatePasswordField(this, 'msg_pwd')">
                        <button type="button" class="vp-pwd-toggle" onclick="togglePasswordVisibility('reg_password', 'pwd_eye_reg')">
                          <i id="pwd_eye_reg" class="fa fa-eye"></i>
                        </button>
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_pwd"></span>
                      <?php echo form_error('password', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Confirm Password <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-lock field-icon"></i>
                        <input type="password" name="confirm_password" id="reg_confirm_password" class="form-control" placeholder="Re-enter password" required value="<?php echo isset($confirm_password) ? htmlspecialchars($confirm_password) : ''; ?>" onblur="validateConfirmPwd(this, 'reg_password', 'msg_cpwd')">
                        <button type="button" class="vp-pwd-toggle" onclick="togglePasswordVisibility('reg_confirm_password', 'pwd_eye_conf')">
                          <i id="pwd_eye_conf" class="fa fa-eye"></i>
                        </button>
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_cpwd"></span>
                      <?php echo form_error('confirm_password', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>
                </div>

                <div class="mt-4">
                  <button type="button" class="btn-vp-action" onclick="goToRegStep(2)">
                    Continue to Address Details <i class="fa fa-arrow-right ms-1"></i>
                  </button>
                </div>
              </div>
              <!-- STEP 1 END -->


              <!-- STEP 2: ADDRESS & LOCATION -->
              <div id="reg-step-2-content" style="display: none;">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="vp-form-group">
                      <label>Street Address <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-home field-icon"></i>
                        <input type="text" name="address" id="reg_address" class="form-control" placeholder="House/Flat No, Building, Street" required value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>" onblur="validateRequiredField(this, 'msg_address')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_address"></span>
                      <?php echo form_error('address', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="vp-form-group">
                      <label>Landmark <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-map-marker field-icon"></i>
                        <input type="text" name="landmark" id="reg_landmark" class="form-control" placeholder="Nearby landmark or area" required value="<?php echo isset($landmark) ? htmlspecialchars($landmark) : ''; ?>" onblur="validateRequiredField(this, 'msg_landmark')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_landmark"></span>
                      <?php echo form_error('landmark', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Country <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-globe field-icon"></i>
                        <input type="text" name="country" class="form-control" value="India" readonly style="background-color: #f1f5f9;">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>State <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-map field-icon"></i>
                        <select id="state" name="state" class="form-control" required onChange="get_shiping_charge(this.value);" onblur="validateRequiredField(this, 'msg_state')">
                          <option value="">Select State</option>
                        </select>
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_state"></span>
                      <?php echo form_error('state', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>City <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-building-o field-icon"></i>
                        <input type="text" name="city" id="reg_city" class="form-control" placeholder="City name" required value="<?php echo isset($city) ? htmlspecialchars($city) : ''; ?>" onblur="validateRequiredField(this, 'msg_city')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_city"></span>
                      <?php echo form_error('city', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="vp-form-group">
                      <label>Pincode <span class="req">*</span></label>
                      <div class="vp-input-box">
                        <i class="fa fa-location-arrow field-icon"></i>
                        <input type="text" name="pincode" id="reg_pincode" class="form-control" placeholder="6-digit pincode" maxlength="6" required value="<?php echo isset($pincode) ? htmlspecialchars($pincode) : ''; ?>" onblur="validatePincodeField(this, 'msg_pincode')">
                      </div>
                      <span class="validation-feedback-text invalid-msg" id="msg_pincode"></span>
                      <?php echo form_error('pincode', '<div class="validation-feedback-text invalid-msg">', '</div>'); ?>
                    </div>
                  </div>
                </div>

                <!-- Different Shipping Box -->
                <div class="shipping-extra-card">
                  <label for="diffrent_ship">
                    <input type="checkbox" name="diffrent_ship" id="diffrent_ship" onchange="toggleExtraShipping(this.checked)">
                    <span><i class="fa fa-truck me-1"></i> Ship to a different address?</span>
                  </label>

                  <div class="extra-shipping-panel" id="extra_shipping_container">
                    <div class="row g-2">
                      <div class="col-12">
                        <div class="vp-form-group mb-2">
                          <label>Shipping Address <span class="req">*</span></label>
                          <input type="text" name="address_extra" id="address_extra" class="form-control" placeholder="Street address" value="<?php echo isset($address_extra) ? htmlspecialchars($address_extra) : ''; ?>">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="vp-form-group mb-2">
                          <label>Shipping Landmark <span class="req">*</span></label>
                          <input type="text" name="landmark_extra" id="landmark_extra" class="form-control" placeholder="Landmark" value="<?php echo isset($landmark_extra) ? htmlspecialchars($landmark_extra) : ''; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="vp-form-group mb-2">
                          <label>Country</label>
                          <input type="text" name="country_extra" class="form-control" value="India" readonly style="background-color: #f1f5f9;">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="vp-form-group mb-2">
                          <label>State <span class="req">*</span></label>
                          <select id="state_extra" name="state_extra" class="form-control" onChange="get_shiping_charge(this.value);">
                            <option value="">Select State</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="vp-form-group mb-2">
                          <label>City <span class="req">*</span></label>
                          <input type="text" name="city_extra" id="city_extra" class="form-control" placeholder="City" value="<?php echo isset($city_extra) ? htmlspecialchars($city_extra) : ''; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="vp-form-group mb-2">
                          <label>Pincode <span class="req">*</span></label>
                          <input type="text" name="pincode_extra" id="pincode_extra" class="form-control" placeholder="Pincode" maxlength="6" value="<?php echo isset($pincode_extra) ? htmlspecialchars($pincode_extra) : ''; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex gap-3 mt-4">
                  <button type="button" class="btn-vp-secondary" onclick="goToRegStep(1)">
                    <i class="fa fa-arrow-left me-1"></i> Back
                  </button>
                  <button type="submit" class="btn-vp-action flex-grow-1" id="btn_submit">
                    Complete Registration <i class="fa fa-check-circle ms-1"></i>
                  </button>
                </div>
              </div>
              <!-- STEP 2 END -->

            </form>

            <div class="auth-switch-prompt">
              Already have an account? <a href="javascript:void(0);" onclick="switchAuthMode('login')">Sign In Now →</a>
            </div>
          </div>
          <!-- PANEL 2 END -->

        </div>
        <!-- RIGHT COLUMN END -->

      </div>
    </div>
  </section>

  <!-- Newsletter Start-->
  <?php $this->load->view('common/newsletter.php');?>
  <!-- Newsletter End -->
  
  <!-- Features Section Start -->
  <?php $this->load->view('common/features.php');?>
  <!-- Features Section End -->
</main>

<?php $this->load->view('common/footer.php');?>
<?php $this->load->view('common/cart.php');?>
<?php $this->load->view('common/quick_view_modal.php');?>
<?php $this->load->view('common/login_modal.php');?>
<?php $this->load->view('common/footer_js.php');?>

<script type="text/javascript">
$(document).ready(function() {
    // Automatically pre-populate Indian states (Country ID 101)
    var defaultCid = '101';
    var defaultState = '<?php echo isset($state) ? $state : ""; ?>';
    get_states(defaultCid, defaultState);
    get_states_extra(defaultCid, defaultState);
});

// Switch Mode (Login vs Register)
function switchAuthMode(mode) {
    var loginPanel = document.getElementById("panel-login");
    var regPanel = document.getElementById("panel-register");
    var btnLogin = document.getElementById("mode-btn-login");
    var btnReg = document.getElementById("mode-btn-register");

    if (mode === 'register') {
        if (loginPanel) loginPanel.classList.remove("active");
        if (regPanel) regPanel.classList.add("active");
        if (btnLogin) btnLogin.classList.remove("active");
        if (btnReg) btnReg.classList.add("active");
    } else {
        if (regPanel) regPanel.classList.remove("active");
        if (loginPanel) loginPanel.classList.add("active");
        if (btnReg) btnReg.classList.remove("active");
        if (btnLogin) btnLogin.classList.add("active");
    }
}

// Multi-step Registration Navigation
function goToRegStep(step) {
    var step1 = document.getElementById("reg-step-1-content");
    var step2 = document.getElementById("reg-step-2-content");
    var ind1 = document.getElementById("step-indicator-1");
    var ind2 = document.getElementById("step-indicator-2");

    if (step === 2) {
        var fName = document.getElementById("reg_first_name");
        var lName = document.getElementById("reg_last_name");
        var mob = document.getElementById("reg_mobile");
        var email = document.getElementById("email");
        var pwd = document.getElementById("reg_password");
        var cpwd = document.getElementById("reg_confirm_password");

        var valid = true;
        if (!validateRequiredField(fName, 'msg_fname')) valid = false;
        if (!validateRequiredField(lName, 'msg_lname')) valid = false;
        if (!validateMobileField(mob, 'msg_mobile')) valid = false;
        if (!validateEmailField(email, 'msg_email')) valid = false;
        if (!validatePasswordField(pwd, 'msg_pwd')) valid = false;
        if (!validateConfirmPwd(cpwd, 'reg_password', 'msg_cpwd')) valid = false;

        if (!valid) {
            return false;
        }

        if (step1) step1.style.display = "none";
        if (step2) step2.style.display = "block";
        if (ind1) ind1.classList.remove("active");
        if (ind2) ind2.classList.add("active");
    } else {
        if (step2) step2.style.display = "none";
        if (step1) step1.style.display = "block";
        if (ind2) ind2.classList.remove("active");
        if (ind1) ind1.classList.add("active");
    }
}

// Toggle Password Visibility
function togglePasswordVisibility(fieldId, iconId) {
    var field = document.getElementById(fieldId);
    var icon = document.getElementById(iconId);
    if (field && icon) {
        if (field.type === "password") {
            field.type = "text";
            icon.className = "fa fa-eye-slash";
        } else {
            field.type = "password";
            icon.className = "fa fa-eye";
        }
    }
}

// Toggle Extra Shipping
function toggleExtraShipping(isChecked) {
    var panel = document.getElementById("extra_shipping_container");
    if (panel) {
        panel.style.display = isChecked ? "block" : "none";
    }
}

/* Validation Utilities */
function setFieldStatus(inputEl, msgElId, isValid, message) {
    var wrapper = inputEl ? inputEl.closest('.vp-input-box') : null;
    var msgEl = document.getElementById(msgElId);

    if (wrapper) {
        if (isValid) {
            wrapper.classList.remove('is-invalid');
            wrapper.classList.add('is-valid');
        } else {
            wrapper.classList.remove('is-valid');
            wrapper.classList.add('is-invalid');
        }
    }

    if (msgEl) {
        if (!isValid && message) {
            msgEl.className = "validation-feedback-text invalid-msg";
            msgEl.innerHTML = '<i class="fa fa-exclamation-circle me-1"></i> ' + message;
        } else {
            msgEl.className = "validation-feedback-text valid-msg";
            msgEl.innerHTML = '';
        }
    }
    return isValid;
}

function validateRequiredField(inputEl, msgElId) {
    if (!inputEl) return false;
    var val = inputEl.value ? inputEl.value.trim() : '';
    if (val === '') {
        return setFieldStatus(inputEl, msgElId, false, 'This field is required');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validateEmailField(inputEl, msgElId) {
    if (!inputEl) return false;
    var email = inputEl.value ? inputEl.value.trim() : '';
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        return setFieldStatus(inputEl, msgElId, false, 'Email address is required');
    } else if (!regex.test(email)) {
        return setFieldStatus(inputEl, msgElId, false, 'Please enter a valid email address');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validateMobileField(inputEl, msgElId) {
    if (!inputEl) return false;
    var mobile = inputEl.value ? inputEl.value.trim() : '';
    var regex = /^[6-9]\d{9}$/;
    if (mobile === '') {
        return setFieldStatus(inputEl, msgElId, false, 'Mobile number is required');
    } else if (!regex.test(mobile)) {
        return setFieldStatus(inputEl, msgElId, false, 'Enter a valid 10-digit mobile number');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validatePincodeField(inputEl, msgElId) {
    if (!inputEl) return false;
    var pin = inputEl.value ? inputEl.value.trim() : '';
    var regex = /^\d{6}$/;
    if (pin === '') {
        return setFieldStatus(inputEl, msgElId, false, 'Pincode is required');
    } else if (!regex.test(pin)) {
        return setFieldStatus(inputEl, msgElId, false, 'Enter a valid 6-digit pincode');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validatePasswordField(inputEl, msgElId) {
    if (!inputEl) return false;
    var pwd = inputEl.value ? inputEl.value : '';
    if (pwd.length < 6) {
        return setFieldStatus(inputEl, msgElId, false, 'Password must be at least 6 characters');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validateConfirmPwd(inputEl, targetPwdId, msgElId) {
    if (!inputEl) return false;
    var target = document.getElementById(targetPwdId);
    var pwd = target ? target.value : '';
    var cpwd = inputEl.value ? inputEl.value : '';
    if (cpwd === '') {
        return setFieldStatus(inputEl, msgElId, false, 'Please confirm your password');
    } else if (cpwd !== pwd) {
        return setFieldStatus(inputEl, msgElId, false, 'Passwords do not match');
    }
    return setFieldStatus(inputEl, msgElId, true, '');
}

function validateLoginForm() {
    var email = document.getElementById("login_email");
    var pwd = document.getElementById("login_password");
    var v1 = validateEmailField(email, 'msg_login_email');
    var v2 = validateRequiredField(pwd, 'msg_login_pwd');
    return v1 && v2;
}

function validateRegForm() {
    var address = document.getElementById("reg_address");
    var landmark = document.getElementById("reg_landmark");
    var state = document.getElementById("state");
    var city = document.getElementById("reg_city");
    var pincode = document.getElementById("reg_pincode");

    var v1 = validateRequiredField(address, 'msg_address');
    var v2 = validateRequiredField(landmark, 'msg_landmark');
    var v3 = validateRequiredField(state, 'msg_state');
    var v4 = validateRequiredField(city, 'msg_city');
    var v5 = validatePincodeField(pincode, 'msg_pincode');

    return v1 && v2 && v3 && v4 && v5;
}

function get_states(cid, sts) {
    sts = sts || 0;
    if (cid) {
        $.ajax({  
             url: "<?php echo base_url(); ?>ajax/get_states",  
             method: "POST",  
             dataType: 'JSON',
             data: {cid: cid, sts: sts},  
             success: function(data) {  
                  $("#state").empty().append(data.sts_list);
             }  
        });  
    } else {
        $("#state").empty().append('<option value="">Select State</option>');
    }
}

function get_states_extra(cid, sts) {
    sts = sts || 0;
    if (cid) {
        $.ajax({  
             url: "<?php echo base_url(); ?>ajax/get_states",  
             method: "POST",  
             dataType: 'JSON',
             data: {cid: cid, sts: sts},  
             success: function(data) {  
                  $("#state_extra").empty().append(data.sts_list);
             }  
        });  
    } else {
        $("#state_extra").empty().append('<option value="">Select State</option>');
    }
}

function checkDuplicateEmail() {
    var email = $("#email").val();
    if (!email) return;
    
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>ajax/check_duplicate_email',
        data: {'email': email},
        dataType: 'JSON',
        success: function(data) {
            if (data.error == 1) {            
                $("#email_errormsg").show().text('Error: Email already registered. Enter another email ID.');
                $("#btn_submit").prop('disabled', true);
            } else {
                $("#email_errormsg").hide().text('');
                $("#btn_submit").prop('disabled', false);
            }
        }
    });
}

function get_shiping_charge(val) {
    // Optional helper
}
</script>
</body>
</html>