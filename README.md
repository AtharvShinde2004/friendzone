# FriendZone Social Media Application

## Overview

FriendZone is a social media application that allows users to connect, share posts, and engage with each other. This README provides an overview of the key files, features, and information about contributing to the application.

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

## Contribution Guidelines

Thank you for considering contributing to FriendZone! To contribute, follow these steps:

1. Fork the repository on GitHub.
2. Clone the forked repository to your local machine.
3. Create a new branch for your contribution: `git checkout -b feature/new-feature`.
4. Make your changes and commit them with descriptive commit messages.
5. Push your changes to your forked repository: `git push origin feature/new-feature`.
6. Create a pull request on the original repository.

Please adhere to the [Code of Conduct](CODE_OF_CONDUCT.md) and follow the [Contribution Guidelines](CONTRIBUTING.md).

## License

FriendZone is licensed under the [MIT License](LICENSE).
