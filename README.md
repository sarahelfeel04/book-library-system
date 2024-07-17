# Book Library System

Welcome to the Book Library System project! This is a simple library management application built using PHP and MySQL. Below are the steps to set up and run the application on your local machine using Laragon.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Setting Up the Project](#setting-up-the-project)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Application Structure](#application-structure)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

Make sure you have the following installed on your machine:

- [Laragon](https://laragon.org/download/)
- PHP (included with Laragon)
- MySQL (included with Laragon)

## Setting Up the Project

1. **Clone the Repository**

   Clone the repository to your local machine:

   ```bash
   git clone https://github.com/sarah.elfeel/book-library-system.git
   cd book-library-system
   ```

2. **Open Laragon**

   - Start Laragon and open the Laragon terminal.

3. **Set Up the Environment**

   - Navigate to the project directory:

     ```bash
     cd C:\laragon\www\book-library-system
     ```

4. **Set Up Database connection on TablePlus or HeidiSQL in Laragon**
    - use port 3306
    - connect on localhost
    - user should be root
    - database name: library

## Database Setup

1. **Create Database**

   Open the Laragon MySQL console or phpMyAdmin and run the following SQL commands to create and populate the database:

   ```sql
   CREATE DATABASE library;

   USE library;

   CREATE TABLE books (
       id INT PRIMARY KEY AUTO_INCREMENT,
       title VARCHAR(255),
       author VARCHAR(255),
       publishing_date DATE,
       cover_image VARCHAR(255),
       summary TEXT
   );

   INSERT INTO books (title, author, publishing_date, cover_image, summary)
   VALUES
   ('To Kill a Mockingbird', 'Harper Lee', '1960-07-11', 'uploads\\To Kill A Mockingbird.jpg', 'A novel about the serious issues of rape and racial inequality.'),
   ('The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-21', 'uploads\\The Great Gatsby.jpg', 'A story about the young and mysterious millionaire Jay Gatsby and his quixotic passion for the beautiful Daisy Buchanan.'),
   ('Pride and Prejudice', 'Jane Austen', '1813-01-28', 'uploads\\Pride and Prejudice.jpg', 'A romantic novel that charts the emotional development of the protagonist Elizabeth Bennet.'),
   ('Moby-Dick', 'Herman Melville', '1851-10-18', 'uploads\\Moby Dick.jpg', 'The narrative of Captain Ahabs obsessive quest to kill the white whale, Moby Dick.'),
   ('Die Wolke', 'Gudrun Pausewang', '1987-12-12', 'uploads\\Die Wolke.jpg', 'The story was written after the 1986 Chernobyl nuclear disaster in Ukraine, with a 14-year-old girl having to deal with the consequences of a fictional similar disaster in Germany.'),
   ('Effi Briest', 'Theodor Fontan', '1895-05-05', 'uploads\\Effi Briest.jpg', 'Effi Briest is a realist novel by Theodor Fontane. Published in book form in 1895, Effi Briest marks both a watershed and a climax in the poetic realism of literature.'),
   ('Reminders of him', 'Colleen Hoover', '2022-01-18', 'uploads\\Reminders Of Him.jpg', 'It was about a young mother reaching out for her daughter shes never met, after serving time for a tragic mistake.'),
   ('Löcher: Die Geheimnisse von Green Lake', 'Louis Sachar', '1998-05-06', 'uploads\\Locher.jpg', 'The book centers on Stanley Yelnats, who is sent to Camp Green Lake, a correctional boot camp in a desert in Texas, after being falsely accused of theft.'),
   ('November 9', 'Colleen Hoover', '2015-11-10', 'uploads\\November 9.jpg', 'The novel centres on an 18-year-old woman who moves to Michigan with her family after the death of her father. Once there, she becomes romantically involved with her neighbour, but a startling discovery forces them apart. Things are further complicated by another family tragedy.'),
   ('The Seven Husbands of Evelyn Hugo', 'Taylor Jenkins Reid', '2017-06-13', 'uploads\\The Seven Husbands of Evelyn Hugo.jpg', 'Hugo comes from a poor background, but marries the first of her many husbands in order to move to Hollywood and pursue her career. The novel spans over the entirety of Hugos life, and revolves around the circumstances surrounding each of her marriages.'),
   ('Animal Farm', 'George Orwell', '1945-08-17', 'uploads\\Animal Farm.jpg', 'It tells the story of a group of anthropomorphic farm animals who rebel against their human farmer, hoping to create a society where the animals can be equal, free, and happy.'),
   ('The Giver', 'Lois Lowry', '1993-02-16', 'uploads\\The Giver.jpg', 'The Giver is a 1993 American young adult dystopian novel written by Lois Lowry, set in a society which at first appears to be utopian but is revealed to be dystopian as the story progresses.'),
   ('The Lord of the Rings', 'J. R. R. Tolkien', '1954-07-29', 'uploads\\The Lord of the Rings.jpg', 'The Lord of the Rings is the saga of a group of sometimes reluctant heroes who set forth to save their world from consummate evil.');
   ```

## Running the Application

1. **Start the Server**

   Open the Laragon terminal and navigate to the project directory. Run the following command:

   ```bash
   cd book-library-system
   php -S localhost:8888 -t public
   ```

2. **Access the Application**

   Open your web browser and go to `http://localhost:8888`.

## Application Structure

- **Controllers:** PHP files handling the business logic.
- **Views:** Templates for the HTML output.
- **Core:** Contains core functionalities such as routing, database connection, and helper functions.
- **Config:** Configuration files like database settings.
- **Public:** Includes index file and uploads folder with images for simplicity

## Contributing

Contributions are welcome! Please feel free to fork the repository and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Feel free to modify or extend any section as needed!
