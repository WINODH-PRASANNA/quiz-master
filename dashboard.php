<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
        header("Location: auth.php");
        exit();
}

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
?>

<!DOCTYPE html>
<html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="theme-color" content="#2ecc71">
                <link rel="shortcut icon" href="assets/images/logo1.png" type="image/x-icon">
                <title>Quiz Master ||| Student Dashboard</title>
                <link rel="stylesheet" href="assets/css/dashboard.css">
                <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        </head>

        <body>
                <div class="dashboard-container">
                        <nav class="dashboard-nav">
                                <div class="logo">
                                        <a href="index.html">
                                                <img src="assets/images/logo.png" alt="Quiz Master Logo">
                                                <h1>Quiz Master</h1>
                                        </a>
                                </div>
                                <div>
                                        <a href="logout.php" class="logout-btn"><i class="ri-logout-box-r-line"></i>
                                                Logout</a>
                                </div>
                        </nav>

                        <div class="dashboard-header">
                                <h1>Welcome Back,
                                        <span>
                                                <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
                                        </span>
                                </h1>
                                <p>
                                        <?php echo htmlspecialchars($_SESSION['user_email']); ?>
                                </p>
                        </div>

                        <div class="dashboard-content">
                                <h2 class="main-heading">Course Categories</h2>
                                <div class="courses">

                                        <!-- Programming Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-code-line"></i> Programming
                                                </div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-braces-line"></i>
                                                                </div>
                                                                <h3>Python</h3>
                                                                <p>Master Python programming from basics to advanced
                                                                        concepts including OOP and frameworks</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.9
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/python.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-cup-line"></i>
                                                                </div>
                                                                <h3>Java</h3>
                                                                <p>Test your Java knowledge including core concepts,
                                                                        collections, and multithreading</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.5
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/java.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-brackets-line"></i></div>
                                                                <h3>C</h3>
                                                                <p>Challenge your understanding of C programming,
                                                                        pointers, memory management</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.0
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/c.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-add-line"></i>
                                                                </div>
                                                                <h3>C++</h3>
                                                                <p>Evaluate your C++ skills including OOP, STL, and
                                                                        modern C++ features</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.2
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/c++.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-microsoft-line"></i></div>
                                                                <h3>C#</h3>
                                                                <p>Test your .NET framework knowledge and C# programming
                                                                        concepts</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/cs.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-node-tree"></i>
                                                                </div>
                                                                <h3>DSA</h3>
                                                                <p>Data Structures and Algorithms challenges covering
                                                                        all major concepts</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.5
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/dsa.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Computer Science Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-cpu-line"></i> Computer Science
                                                </div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-window-line"></i>
                                                                </div>
                                                                <h3>Operating System</h3>
                                                                <p>Test your knowledge of processes, threads, memory
                                                                        management, and file systems</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.5
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/os.html" class="course-btn">Start Quiz</a>
                                                        </div>

                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-computer-line"></i></div>
                                                                <h3>Computer Architecture</h3>
                                                                <p>Evaluate your understanding of CPU design, memory
                                                                        hierarchy, and I/O systems</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.6
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/ca.html" class="course-btn">Start Quiz</a>
                                                        </div>

                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-flow-chart"></i>
                                                                </div>
                                                                <h3>Software Engineering</h3>
                                                                <p>SDLC, design patterns, testing methodologies, and
                                                                        project management</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/se.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Artificial Intelligence Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-brain-line"></i> Artificial
                                                        Intelligence</div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-robot-line"></i>
                                                                </div>
                                                                <h3>Introduction to AI</h3>
                                                                <p>Fundamental concepts, history, and applications of
                                                                        artificial intelligence</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.6
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/iai.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-ai-generate"></i>
                                                                </div>
                                                                <h3>Machine Learning</h3>
                                                                <p>Supervised, unsupervised learning, neural networks,
                                                                        and model evaluation</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.8
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/ml.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-chat-4-line"></i>
                                                                </div>
                                                                <h3>NLP</h3>
                                                                <p>Natural Language Processing techniques including text
                                                                        processing and transformers</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.6
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/npl.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Cybersecurity Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-shield-keyhole-line"></i>
                                                        Cybersecurity</div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-shield-check-line"></i></div>
                                                                <h3>Fundamentals</h3>
                                                                <p>Core security principles, cryptography, and security
                                                                        protocols</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.5
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/fun.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-bug-line"></i>
                                                                </div>
                                                                <h3>Penetration Testing</h3>
                                                                <p>Ethical hacking techniques, vulnerability assessment,
                                                                        and exploitation</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.9
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/pt.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-wifi-line"></i>
                                                                </div>
                                                                <h3>Network Security</h3>
                                                                <p>Firewalls, intrusion detection, VPNs, and secure
                                                                        network architectures</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.9
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/ns.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-virus-line"></i>
                                                                </div>
                                                                <h3>Malware Analysis</h3>
                                                                <p>Malware types, reverse engineering, and analysis
                                                                        techniques</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/ma.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Data Science Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-database-2-line"></i> Data
                                                        Science</div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-database-line"></i></div>
                                                                <h3>Introduction to Data Science</h3>
                                                                <p>Data science workflow, tools, and fundamental
                                                                        methodologies</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.6
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/ids.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-line-chart-line"></i></div>
                                                                <h3>Data Analysis</h3>
                                                                <p>Data cleaning, exploration, statistical analysis, and
                                                                        hypothesis testing</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/da.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-bar-chart-2-line"></i></div>
                                                                <h3>Data Visualization</h3>
                                                                <p>Principles of effective visualization and tools like
                                                                        Matplotlib and Tableau</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.8
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/dv.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Web Development Section -->
                                        <div class="course">
                                                <div class="course-heading"><i class="ri-global-line"></i> Web
                                                        Development</div>
                                                <div class="course-cards-container">
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-html5-fill"></i>
                                                                </div>
                                                                <h3>HTML</h3>
                                                                <p>HTML5 semantic elements, forms, accessibility, and
                                                                        best practices</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.9
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/html.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-css3-fill"></i>
                                                                </div>
                                                                <h3>CSS</h3>
                                                                <p>CSS3 features, flexbox, grid, animations, and
                                                                        responsive design</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/css.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-javascript-fill"></i></div>
                                                                <h3>JavaScript</h3>
                                                                <p>ES6+ features, DOM manipulation, async programming,
                                                                        and APIs</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.6
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/js.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-reactjs-line"></i>
                                                                </div>
                                                                <h3>React.js</h3>
                                                                <p>Components, hooks, state management, and React
                                                                        ecosystem</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.5
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/react.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i class="ri-nodejs-line"></i>
                                                                </div>
                                                                <h3>Node.js</h3>
                                                                <p>Server-side JavaScript, Express, REST APIs, and
                                                                        authentication</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.7
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/node.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                        <div class="course-card">
                                                                <div class="course-icon"><i
                                                                                class="ri-database-2-line"></i></div>
                                                                <h3>Database Management</h3>
                                                                <p>SQL, NoSQL, database design, and query optimization
                                                                        techniques</p>
                                                                <div class="course-meta">
                                                                        <span><i class="ri-stack-line"></i> 4
                                                                                Sections</span>
                                                                        <span><i class="ri-star-line"></i> 4.8
                                                                                </span>
                                                                </div>
                                                                <a href="assets/courses/database.html" class="course-btn">Start Quiz</a>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                        </div>
                </div>

                <script src="assets/js/dashboard.js"></script>
        </body>

</html>