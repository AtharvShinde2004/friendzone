# Friendzone Social Media Application

### Introduction

Welcome to the "Friendzone" Social Media Application repository. This application is a PHP-based social media platform that allows users to create posts, make comments, and connect with others. This README file provides an overview of the PHP files in the project and their functionalities.

### File Structure

The repository includes the following PHP files:

1. **index.php**

   - **Description:** The main landing page of the application, displaying posts, search functionality, and user login/register options.
   - **Dependencies:** Requires `db.php`, `add-comment.php`, `create-post.php`, `dashboard.php`, `login.php`, `register.php`, `update-profile.php`, `view-profile.php`, and Bootstrap library.

2. **login.php**

   - **Description:** Handles user login functionality.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Implements password hashing using `password_verify()` to secure user passwords.
     - Utilizes session management to ensure secure user sessions.

3. **register.php**

   - **Description:** Manages user registration and account creation.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Implements password hashing using `password_hash()` to secure user passwords.
     - Validates and sanitizes user inputs to prevent SQL injection.

4. **update-profile.php**

   - **Description:** Allows users to update their profile information.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Validates and sanitizes user inputs to prevent potential security vulnerabilities.

5. **view-profile.php**

   - **Description:** Displays user profiles and their information.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Ensures proper authorization to view user profiles.
     - Validates and sanitizes user inputs.

6. **add-comment.php**

   - **Description:** Manages the addition of comments to posts.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Validates and sanitizes user inputs to prevent potential security vulnerabilities.

7. **create-post.php**

   - **Description:** Handles the creation of new posts.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Validates and sanitizes user inputs.
     - Ensures proper authorization to create posts.

8. **dashboard.php**

   - **Description:** User dashboard displaying user-specific information and options.
   - **Dependencies:** Requires `db.php`.
   - **Security Measures:**
     - Ensures proper authorization for dashboard access.
     - Validates and sanitizes user inputs.

9. **db.php**
   - **Description:** Contains database connection details. Used by various PHP files.
   - **Security Measures:**
     - Encourages the use of parameterized queries to prevent SQL injection.

### Setup and Configuration

1. Ensure you have a PHP environment set up.
2. Import the database schema using the provided SQL script (`friendzone_db.sql`).
3. Update the database connection details in `db.php` with your database credentials.

### Marker Login Details

1. Username: Atharv
2. Email: shindeatharv576@gmail.com
3. Password: Atharv

### Security Considerations

- Implement secure password hashing for user authentication.
- Validate user inputs to prevent SQL injection and other forms of attacks.
- Ensure proper session management to prevent unauthorized access.
- Use HTTPS to encrypt data transmitted between the user's browser and the server.
- Regularly update server software, frameworks, and libraries to address security vulnerabilities.
