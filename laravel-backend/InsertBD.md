INSERT INTO categorias(nom)  VALUES  
('Fiction'), ('Non-Fiction'), ( 'Science & Technology'), ('History & Politics'), ('Art & Photography');


INSERT INTO users (name, email, password, telefon) VALUES 
('Ermengol', 'ermengol@gmail.com', '1234556', '123456789'),
('Alvaro', 'alvaro@gmail.com', 123456, 987654321);


INSERT INTO llibres (titol, autor, descripcio, editorial, any, preu, isbn, img_url, categoria_id) 
VALUES 
('The Mountain Shadow', 'Gregory David Roberts', 'The sequel to the international bestseller Shantaram', 'Grove Press', 2015, 14.99, 'ISBN00001', './mountain_shadow.jpg', 1),
('Origin', 'Dan Brown', 'Robert Langdon, Harvard professor of symbology, arrives at the ultramodern Guggenheim Museum Bilbao', 'Doubleday', 2017, 18.99, 'ISBN00002', './origin.jpg', 2),
('The Goldfinch', 'Donna Tartt', 'A young boy in New York City survives an accident that kills his mother', 'Little, Brown and Company', 2013, 12.99, 'ISBN00003', './goldfinch.jpg', 3),
('Circe', 'Madeline Miller', 'The daughter of Helios, god of the sun and mightiest of the Titans', 'Little, Brown and Company', 2018, 16.99, 'ISBN00004', './circe.jpg', 4),
('Becoming', 'Michelle Obama', 'The memoir by the former First Lady of the United States', 'Crown', 2018, 20.99, 'ISBN00005', './becoming.jpg', 5),
('Educated', 'Tara Westover', 'A memoir about a woman who grows up in a strict and abusive household in rural Idaho', 'Random House', 2018, 13.99, 'ISBN00006', './educated.jpg', 1),
('Sapiens', 'Yuval Noah Harari', 'A brief history of humankind', 'Harper', 2015, 17.99, 'ISBN00007', './sapiens.jpg', 2),
('Where the Crawdads Sing', 'Delia Owens', 'A mystery and coming-of-age novel set in the marshes of North Carolina', 'G.P. Putnam’s Sons', 2018, 15.99, 'ISBN00008', './crawdads.jpg', 3),
('The Night Circus', 'Erin Morgenstern', 'A phantasmagorical fairy tale set near an ahistorical Victorian London', 'Doubleday', 2011, 10.99, 'ISBN00009', './night_circus.jpg', 4),
('The Great Alone', 'Kristin Hannah', 'A family moves to Alaska, unprepared for the wild nature and isolation', 'St. Martin’s Press', 2018, 11.99, 'ISBN00010', './great_alone.jpg', 5),
('Gone Girl', 'Gillian Flynn', 'A thriller that examines the complexities of marriage', 'Crown', 2012, 14.99, 'ISBN00011', './gone_girl.jpg', 1),
('The Road', 'Cormac McCarthy', 'A post-apocalyptic tale of a man and his son trying to survive', 'Knopf', 2006, 12.99, 'ISBN00012', './the_road.jpg', 2),
('Room', 'Emma Donoghue', 'A harrowing tale of a boy raised in a small shed', 'Little, Brown and Company', 2010, 10.99, 'ISBN00013', './room.jpg', 3),
('The Silent Patient', 'Alex Michaelides', 'A woman shoots her husband and then never speaks again', 'Celadon Books', 2019, 13.99, 'ISBN00014', './silent_patient.jpg', 4),
('The Martian', 'Andy Weir', 'An astronaut stranded on Mars struggles to survive', 'Crown', 2014, 16.99, 'ISBN00015', './martian.jpg', 5),
('Life After Life', 'Kate Atkinson', 'A historical novel that plays with the concept of reincarnation', 'Reagan Arthur Books', 2013, 12.99, 'ISBN00016', './life_after_life.jpg', 1),
('The Fifth Season', 'N.K. Jemisin', 'The start of a fantasy trilogy in a land plagued with seismic activity', 'Orbit', 2015, 14.99, 'ISBN00017', './fifth_season.jpg', 2),
('Station Eleven', 'Emily St. John Mandel', 'A novel about a fictional swine flu pandemic', 'Knopf', 2014, 15.99, 'ISBN00018', './station_eleven.jpg', 3),
('The Name of the Wind', 'Patrick Rothfuss', 'The first of a three-part series chronicling the life of Kvothe', 'DAW', 2007, 12.99, 'ISBN00019', './name_of_wind.jpg', 4),
('Little Fires Everywhere', 'Celeste Ng', 'A drama that explores the weight of secrets', 'Penguin Press', 2017, 13.99, 'ISBN00020', './little_fires.jpg', 5);


INSERT INTO comandas(estat, user_id) VALUES 
('Pendent de preparació', 1),('En repartiment', 1),('Entregat', 2);


INSERT INTO llibre_comanda (comanda_id, llibre_id, quantitat, preu) VALUES
(1, 5, 1, 20.99),(1,8,2, 15.99),(2,12,1, 12.99),(3,18,2, 15.99),(3,15,3, 16.99),(3,1,1, 14.99),(3,6,1, 13.99)

