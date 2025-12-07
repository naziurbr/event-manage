-- Create Database
CREATE DATABASE event_management;
USE event_management;

-- ========================================
-- USERS TABLE
-- ========================================
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('user', 'admin') DEFAULT 'user',
    avatar VARCHAR(255) DEFAULT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ========================================
-- CATEGORIES TABLE
-- ========================================
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ========================================
-- EVENTS TABLE
-- ========================================
CREATE TABLE events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    category_id INT,
    venue VARCHAR(255) NOT NULL,
    address TEXT,
    city VARCHAR(100),
    event_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME,
    price DECIMAL(10,2) DEFAULT 0.00,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL,
    image VARCHAR(255),
    organizer_id INT,
    status ENUM('draft', 'published', 'cancelled', 'completed') DEFAULT 'draft',
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (organizer_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ========================================
-- BOOKINGS TABLE
-- ========================================
CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_code VARCHAR(50) UNIQUE NOT NULL,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    tickets_count INT NOT NULL DEFAULT 1,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    payment_method VARCHAR(50),
    booking_status ENUM('confirmed', 'cancelled', 'attended') DEFAULT 'confirmed',
    booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

-- ========================================
-- TICKETS TABLE
-- ========================================
CREATE TABLE tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ticket_number VARCHAR(50) UNIQUE NOT NULL,
    booking_id INT NOT NULL,
    qr_code VARCHAR(255),
    is_used BOOLEAN DEFAULT FALSE,
    used_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);

-- ========================================
-- CONTACT MESSAGES TABLE
-- ========================================
CREATE TABLE contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ========================================
-- SITE SETTINGS TABLE
-- ========================================
CREATE TABLE settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ========================================
-- INSERT DEFAULT DATA
-- ========================================

-- Default Admin User (Password: admin123)
INSERT INTO users (name, email, password, role) VALUES 
('Admin', 'admin@eventmanagement.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Default Categories
INSERT INTO categories (name, slug, description) VALUES 
('Music', 'music', 'Live concerts, music festivals, and performances'),
('Sports', 'sports', 'Sports events, tournaments, and competitions'),
('Technology', 'technology', 'Tech conferences, hackathons, and workshops'),
('Business', 'business', 'Business seminars, networking events'),
('Education', 'education', 'Educational workshops and training'),
('Art & Culture', 'art-culture', 'Art exhibitions, cultural festivals'),
('Food & Drink', 'food-drink', 'Food festivals, culinary events'),
('Health & Wellness', 'health-wellness', 'Yoga, fitness, and wellness events');

-- Default Site Settings
INSERT INTO settings (setting_key, setting_value) VALUES 
('site_name', 'EventHub'),
('site_email', 'info@eventhub.com'),
('site_phone', '+1 234 567 8900'),
('site_address', '123 Event Street, City, Country'),
('currency', 'USD'),
('currency_symbol', '$');