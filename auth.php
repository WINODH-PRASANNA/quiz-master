<?php
session_start();

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'quiz_master');

// Connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];
$email = $password = $full_name = '';
$formType = isset($_GET['form']) ? $_GET['form'] : 'login';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (empty($email)) {
            $errors['login']['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['login']['email'] = 'Invalid email format';
        }
        
        if (empty($password)) {
            $errors['login']['password'] = 'Password is required';
        }
        
        if (empty($errors['login'])) {
            $stmt = $conn->prepare("SELECT id, password, full_name FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_email'] = $email;
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $errors['login']['password'] = 'Incorrect password';
                }
            } else {
                $errors['login']['email'] = 'Email not found';
            }
        }
        
    } elseif (isset($_POST['register'])) {
        $full_name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (empty($full_name)) {
            $errors['register']['full_name'] = 'Full name is required';
        }
        
        if (empty($email)) {
            $errors['register']['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['register']['email'] = 'Invalid email format';
        } else {
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $errors['register']['email'] = 'Email already exists';
            }
        }
        
        if (empty($password)) {
            $errors['register']['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['register']['password'] = 'Password must be at least 8 characters';
        }
        
        if (empty($errors['register'])) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Registration successful! Please login.';
                header("Location: auth.php?form=login");
                exit();
            } else {
                $errors['register']['general'] = 'Registration failed. Please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <meta name="theme-color" content="#67a8f0">
        <title>Quiz Master ||| Authentication</title>
        <link rel="stylesheet" href="assets/css/auth.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>

    <body>
        <div class="auth-wrapper">
            <div class="auth-card">
                <div class="auth-brand">
                    <h1>Quiz Master</h1>
                    <p>Test your knowledge</p>
                </div>

                <div class="forms-container">
                    <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                    <?php endif; ?>

                    <div class="auth-form <?php echo $formType === 'login' ? 'active' : ''; ?>" id="loginForm">
                        <h2><i class="ri-login-box-line"></i> Login</h2>
                        <form method="POST" action="">
                            <div class="input-group">
                                <i class="ri-mail-line"></i>
                                <input type="email" name="email" placeholder="Email"
                                    value="<?php echo htmlspecialchars($email); ?>" required>
                                <?php if (isset($errors['login']['email'])): ?>
                                <span class="error">
                                    <?php echo $errors['login']['email']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                <i class="ri-lock-2-line"></i>
                                <input type="password" name="password" placeholder="Password" required
                                    id="loginPassword">
                                <i class="ri-eye-line toggle-password" data-target="loginPassword"></i>
                                <?php if (isset($errors['login']['password'])): ?>
                                <span class="error">
                                    <?php echo $errors['login']['password']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <button type="submit" name="login" class="auth-btn">Login</button>
                            <div class="form-footer">
                                <p>New user? <a href="?form=register" id="showRegister">Register</a></p>
                                <p>Go to <a href="index.html">Home</a> page</p>
                            </div>
                        </form>
                    </div>

                    <div class="auth-form <?php echo $formType === 'register' ? 'active' : ''; ?>" id="registerForm">
                        <h2><i class="ri-user-add-line"></i> Register</h2>
                        <form method="POST" action="">
                            <div class="input-group">
                                <i class="ri-user-line"></i>
                                <input type="text" name="full_name" placeholder="Full Name"
                                    value="<?php echo htmlspecialchars($full_name); ?>" required>
                                <?php if (isset($errors['register']['full_name'])): ?>
                                <span class="error">
                                    <?php echo $errors['register']['full_name']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                <i class="ri-mail-line"></i>
                                <input type="email" name="email" placeholder="Email"
                                    value="<?php echo htmlspecialchars($email); ?>" required>
                                <?php if (isset($errors['register']['email'])): ?>
                                <span class="error">
                                    <?php echo $errors['register']['email']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                <i class="ri-lock-2-line"></i>
                                <input type="password" name="password" placeholder="Password" required
                                    id="registerPassword">
                                <i class="ri-eye-line toggle-password" data-target="registerPassword"></i>
                                <?php if (isset($errors['register']['password'])): ?>
                                <span class="error">
                                    <?php echo $errors['register']['password']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <button type="submit" name="register" class="auth-btn">Register</button>
                            <div class="form-footer">
                                <p>Already registered? <a href="?form=login" id="showLogin">Login</a></p>
                                <p>Go to <a href="index.html">Home</a> page</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/auth.js"></script>
    </body>

</html>