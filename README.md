# FriendZone Social Media Application

## Overview

FriendZone is a social media application that allows users to connect, share posts, and engage with each other. This README provides an overview of the key files and features in the application.

## Files and Directory Structure

### 1. **index.php**
   - Landing page and entry point to the application.
   - Includes options for user registration and login.

### 2. **register.php**
   - Handles user registration.
   - Collects user details, validates inputs, and creates a new user account.

### 3. **login.php**
   - Manages user authentication.
   - Validates user credentials and starts a session on successful login.

### 4. **dashboard.php**
   - User's home page after login.
   - Displays user-specific content, such as posts and profile information.

### 5. **create-post.php**
   - Allows users to create new posts.
   - Captures post content and associates it with the user.

### 6. **view-post.php**
   - Displays a single post along with comments.
   - Allows users to comment on the post.

### 7. **update-profile.php**
   - Enables users to update their profile information.
   - Handles changes to biography and contact details.

### 8. **view-profile.php**
   - Shows user profile information.
   - Displays user details, bio, and contact information.

### 9. **db.php**
   - Manages the database connection.
   - Contains configurations for connecting to the MySQL database.

### 10. **styles.css**
   - CSS file for styling the HTML pages.
   - Defines the layout and appearance of the application.

## Security Measures

1. **User Authentication:**
   - Secure password hashing using PHP's `password_hash()` function.
   - Verification of password using `password_verify()`.

2. **Data Validation:**
   - Validation of user inputs to prevent SQL injection and other attacks.

3. **Session Management:**
   - Secure session handling to prevent unauthorized access.
   - Implementation of session timeouts.

4. **Secure Communication:**
   - Usage of HTTPS to encrypt data transmitted between the user's browser and the server.

5. **Data Privacy:**
   - Implementation of privacy settings to control post visibility.
   - Compliance with data protection regulations.

6. **Prevent Cross-Site Scripting (XSS):**
   - Sanitization of user inputs and proper output encoding.

7. **Rate Limiting:**
   - Basic rate limiting mechanism to prevent brute force attacks on login attempts.

8. **User Authorization:**
   - Enforcement of proper user authorization to access and modify user-specific data.

9. **Backup and Recovery:**
   - Regular data backups and a disaster recovery plan in case of data loss.

10. **Monitoring and Logging:**
    - Implementation of monitoring tools for detecting unusual activities.
    - Detailed logging for auditing and analysis.

## Usage

1. Clone the repository.
2. Set up a MySQL database and update `db.php` with the appropriate credentials.
3. Run the application on a PHP-supported server.
