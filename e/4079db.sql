CREATE TABLE register (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(200) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    height INT(3),
    fav_color VARCHAR(10),
    major VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE job_applications (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(100) NOT NULL,
    title VARCHAR(20) NOT NULL,
    fullname VARCHAR(200) NOT NULL,
    birthday DATE,
    education VARCHAR(100),
    skill TEXT,
    experience TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;