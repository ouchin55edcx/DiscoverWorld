CREATE TABLE Destination (
    id INT PRIMARY KEY,
    country VARCHAR(255) NOT NULL
);

CREATE TABLE Photo (
    id INT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    adventure_id INT,
    FOREIGN KEY (adventure_id) REFERENCES Adventure(id)
);

CREATE TABLE Adventure (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    tips TEXT,
    placeName VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    destination_id INT,
    FOREIGN KEY (destination_id) REFERENCES Destination(id)
);
