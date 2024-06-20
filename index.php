<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    integrity="sha512-CF9AQLJt4HTJ0eWkz5R2K1p0lCXFrA5VUOnLw+ZnXX2TkV2egFfdCUUgDkm/E5Nw2Y4jRXo5rEtjU9W9bnXv6g==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <h1>Welcome to My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="#about" class="nav-link" data-target="about">About Me</a></li>
                <li><a href="#projects" class="nav-link" data-target="projects">Projects</a></li>
                <li><a href="#experience" class="nav-link" data-target="experience">Experience</a></li>
                <li><a href="#skills" class="nav-link" data-target="skills">Skills</a></li>
                <li><a href="#contact" class="nav-link" data-target="contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div id="content-container">
        <!-- Dynamic content will be loaded here -->
    </div>

    <section id="about" class="content-section" style="display: none;">
        <img src="photoo.jpg" alt="My Photo" class="profile-photo">
        <h2>About Me</h2>
        <p>Hi! I'm Najwa Syifa,</p>
        <p>
            a technology enthusiast and student majoring in Information Technology (IT).<br>   
            The world of IT has been my passion for a long time, and I have always been eager to explore every aspect of it. <br>
            From programming to networking, I love digging deep and finding innovative solutions to technological challenges.
        </p>
        <p>
            One of the programming languages ​​that I like the most is Python. Python is not only powerful and flexible, <br>
            but also allows me to be creative in various projects ranging from web development, data analysis, to machine learning.<br> 
            I am always interested in learning new techniques and applying them to real projects.
        </p>
        <p>
            Apart from that, I am actively involved in the IT community, attending seminars, workshops, and collaborating on open source projects. <br>
            This experience not only enhanced my technical skills, but also expanded my professional network.
        </p>
    </section>

    <section id="projects" class="content-section" style="display: none;">
        <h2>Projects</h2>
        <div id="project-list">
        <?php
            include 'db_connection.php';

            $sql = "SELECT id, image, title, message FROM projects";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='project'>";
                    echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '" class="project-image">';
                    echo "<h3>" . $row["title"]. "</h3>";
                    echo "<p>" . $row["message"]. "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        </div>
        <div class="crud-forms">
            <!-- Create Project Form -->
            <form action="create_project.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <input type="text" name="title" placeholder="Project Title" required>
                <textarea name="message" placeholder="Project Description" required></textarea>
                <button type="submit">Create</button>
            </form>
            <!-- Update Project Form -->
            <form action="update_project.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="project_id" placeholder="Project ID" required>
                <input type="file" name="image">
                <input type="text" name="title" placeholder="New Project Title">
                <textarea name="message" placeholder="New Project Description"></textarea>
                <button type="submit">Update</button>
            </form>
            <!-- Delete Project Form -->
            <form action="delete_project.php" method="POST">
                <input type="text" name="project_id" placeholder="Project ID" required>
                <button type="submit">Delete</button>
            </form>
        </div>
    </section>

    <section id="experience" class="content-section" style="display: none;">
        <h2>Experience</h2>
        <div id="experience-list">
        <?php
            include 'db_connection.php';

            $sql = "SELECT id, image, title, message FROM experience";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='experience'>";
                    echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '" class="experience-image">';
                    echo "<h3>" . $row["title"]. "</h3>";
                    echo "<p>" . $row["message"]. "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        </div>
        <div class="crud-forms">
            <form action="create_experience.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <input type="text" name="title" placeholder="Experience Title" required>
                <textarea name="message" placeholder="Experience Description" required></textarea>
                <button type="submit">Create</button>
            </form>
            <form action="update_experience.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="experience_id" placeholder="Experience ID" required>
                <input type="file" name="image">
                <input type="text" name="title" placeholder="New Experience Title">
                <textarea name="message" placeholder="New Experience Description"></textarea>
                <button type="submit">Update</button>
            </form>
            <form action="delete_experience.php" method="POST">
                <input type="text" name="experience_id" placeholder="Experience ID" required>
                <button type="submit">Delete</button>
            </form>
        </div>
    </section>

    <section id="skills" class="content-section" style="display: none;">
        <h2>Skills</h2>
        <p>Pemrograman: Python, Java, JavaScript, SQL</p>
        <p>Web Development: Django, Flask, HTML, CSS, React</p>
        <p>Data Analysis & Machine Learning: Pandas, NumPy, Scikit-learn, TensorFlow</p>
        <p>Database Management: MySQL, PostgreSQL</p>
        <p>Tools & Technologies: Git, Docker, Kubernetes</p>
    </section>

    <section id="contact" class="content-section" style="display: none;">
        <div class="contact-container">
            <h2>Contact</h2>
            <p>If you would like to get in touch, please contact me via:</p>
            <ul>
                <li>Email: <a href="mailto:dinah04ary@gmail.com">dinah04ary@gmail.com</a></li>
                <li>Phone: +6281220318947</li>
                <li>Social Media:
                    <ul>
                    <li><a href="https://www.linkedin.com/in/dinah-aryani" target="_blank" rel="noopener">
                        <i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    <li><a href="https://www.instagram.com/dinahazzr" target="_blank" rel="noopener">
                        <i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Najwa Syifa. All rights reserved.</p>
    </footer>

    <script>
    // Function to load content
    function loadContent(sectionId) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.style.display = 'block';
        }
    }

    // Konfirmasi sebelum menghapus proyek
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('form[action="delete_project.php"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                const confirmation = confirm('Are you sure you want to delete this project?');
                if (!confirmation) {
                    event.preventDefault(); // Menghentikan pengiriman form jika pengguna membatalkan konfirmasi
                }
            });
        });

        // Event listeners for navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const target = this.getAttribute('data-target');
                loadContent(target);
            });
        });

        // Load default content
        loadContent('about'); // Load the 'about' section by default
    });
    </script>

</body>
</html>
