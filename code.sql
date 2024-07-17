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
('To Kill a Mockingbird', 'Harper Lee', '1960-07-11', 'uploads\To Kill A Mockingbird.jpg', 'A novel about the serious issues of rape and racial inequality.'),
('The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-21', 'uploads\The Great Gatsby.jpg', 'A story about the young and mysterious millionaire Jay Gatsby and his quixotic passion for the beautiful Daisy Buchanan.'),
('Pride and Prejudice', 'Jane Austen', '1813-01-28', 'uploads\Pride and Prejudice.jpg', 'A romantic novel that charts the emotional development of the protagonist Elizabeth Bennet.'),
('Moby-Dick', 'Herman Melville', '1851-10-18', 'uploads\Moby Dick.jpg', 'The narrative of Captain Ahabs obsessive quest to kill the white whale, Moby Dick.'),
('Die Wolke', 'Gudrun Pausewang', '1987-12-12', 'uploads\Die Wolke.jpg', 'The story was written after the 1986 Chernobyl nuclear disaster in Ukraine, with a 14-year-old girl having to deal with the consequences of a fictional similar disaster in Germany.'),
('Effi Briest', 'Theodor Fontan', '1895-05-05', 'uploads\Effi Briest.jpg', 'Effi Briest is a realist novel by Theodor Fontane. Published in book form in 1895, Effi Briest marks both a watershed and a climax in the poetic realism of literature.'),
('Reminders of him', 'Colleen Hoover', '2022-01-18', 'uploads\Reminders Of Him.jpg', 'It was about a young mother reaching out for her daughter shes never met, after serving time for a tragic mistake.'),
('Löcher: Die Geheimnisse von Green Lake', 'Louis Sachar', '1998-05-06', 'uploads\Locher.jpg', 'The book centers on Stanley Yelnats, who is sent to Camp Green Lake, a correctional boot camp in a desert in Texas, after being falsely accused of theft.'),
('November 9', 'Colleen Hoover', '2015-11-10', 'uploads\November 9.jpg', 'The novel centres on an 18-year-old woman who moves to Michigan with her family after the death of her father. Once there, she becomes romantically involved with her neighbour, but a startling discovery forces them apart. Things are further complicated by another family tragedy.'),
('The Seven Husbands of Evelyn Hugo', 'Taylor Jenkins Reid', '2017-06-13', 'uploads\The Seven Husbands of Evelyn Hugo.jpg', 'Hugo comes from a poor background, but marries the first of her many husbands in order to move to Hollywood and pursue her career. The novel spans over the entirety of Hugos life, and revolves around the circumstances surrounding each of her marriages.'),
('Animal Farm', 'George Orwell', '1945-08-17', 'uploads\Animal Farm.jpg', 'It tells the story of a group of anthropomorphic farm animals who rebel against their human farmer, hoping to create a society where the animals can be equal, free, and happy.'),
('The Giver', 'Lois Lowry', '1993-02-16', 'uploads\The Giver.jpg', 'The Giver is a 1993 American young adult dystopian novel written by Lois Lowry, set in a society which at first appears to be utopian but is revealed to be dystopian as the story progresses.'),
('The Lord of the Rings', 'J. R. R. Tolkien', '1954-07-29', 'uploads\The Lord of the Rings.jpg', 'The Lord of the Rings is the saga of a group of sometimes reluctant heroes who set forth to save their world from consummate evil.');
