INSERT INTO categorias(nom)  VALUES  
('Fiction'), ('Non-Fiction'), ( 'Science & Technology'), ('History & Politics'), ('Art & Photography');


INSERT INTO users (name, email, password, telefon) VALUES 
('Ermengol', 'ermengol@gmail.com', '1234556', '123456789'),
('Alvaro', 'alvaro@gmail.com', 123456, 987654321);


INSERT INTO llibres (titol, autor, descripcio, editorial, any, preu, isbn, img_url, categoria_id) 
VALUES 
('The Mountain Shadow', 'Gregory David Roberts', 'This sequel to "Shantaram" continues the story of Lin, an escaped convict with a false passport who flees maximum security prison in Australia to the bustling streets of Mumbai. "The Mountain Shadow" follows Lin through the city\'s underworld, dealing with the mafia, love, and personal redemption, as he struggles with his identity and purpose in a world that\'s constantly changing.', 'Grove Press', 2015, 14.99, 'ISBN00001', './img/mountain-shadow.jpg', 1),
('Origin', 'Dan Brown', 'In this thriller, Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the Guggenheim Museum Bilbao to attend the unveiling of a discovery that promises to "change the face of science forever." The evening\'s host is murdered, and Langdon must flee Bilbao with Ambra Vidal, the museum director, to uncover a trail of clues that point toward a shocking scientific breakthrough and a conspiracy that has profound implications for humanity\'s beliefs.', 'Doubleday', 2017, 18.99, 'ISBN00002', './img/origin.jpg', 2),
('The Goldfinch', 'Donna Tartt', 'This novel revolves around Theo Decker, who survives a terrorist bombing at an art museum—a tragedy that kills his mother and profoundly changes the course of his life. He inadvertently steals a painting, "The Goldfinch," setting him on an odyssey of grief, guilt, reinvention, and redemption. The story explores themes of fate and the complex nature of art and human relationships.', 'Little, Brown and Company', 2013, 12.99, 'ISBN00003', './img/goldfinch.jpg', 3),
('Circe', 'Madeline Miller', 'A reimagining of the life of Circe, the enchantress from Homer\'s "Odyssey," this novel paints a vivid picture of a misunderstood goddess who turns to the world of mortals after being banished by Zeus. It\'s a tale of family rivalry, power struggles among the gods, and Circe\'s own personal journey towards empowerment and independence.', 'Little, Brown and Company', 2018, 16.99, 'ISBN00004', './img/circe.jpg', 4),
('Becoming', 'Michelle Obama', 'In her memoir, the former First Lady of the United States, Michelle Obama, recounts her life from her childhood on the South Side of Chicago to her years as an executive balancing the demands of motherhood and work, to her time spent at the world’s most famous address. She describes her triumphs and disappointments, both public and private, telling her full story as she has lived it.', 'Crown', 2018, 20.99, 'ISBN00005', './img/becoming.jpg', 5),
('Educated', 'Tara Westover', 'This memoir tells the story of Tara Westover, who was born to survivalists in the mountains of Idaho. She was seventeen the first time she set foot in a classroom. Despite her isolated and brutal upbringing, Westover eventually earned a PhD from Cambridge University. Her book is a testament to the desire for knowledge and the power of education to change a life.', 'Random House', 2018, 13.99, 'ISBN00006', './img/educated.jpg', 1),
('Sapiens', 'Yuval Noah Harari', 'Harari takes readers on a journey through the history of our species, from the emergence of Homo sapiens in the savannahs of Africa to the present. He explores how humans have succeeded in dominating the planet through cognitive, agricultural, and scientific revolutions, examining how our societies and personal behaviors have evolved through time.', 'Harper', 2015, 17.99, 'ISBN00007', './img/sapiens.jpg', 2),
('Where the Crawdads Sing', 'Delia Owens', 'This novel is a mystery, a love story, and a courtroom drama. It follows Kya, known as the "Marsh Girl" of North Carolina, who grows up isolated from the community. When a local man is found dead, Kya becomes the prime suspect. The book weaves together a coming-of-age story with a murder mystery and a deep appreciation of nature.', 'G.P. Putnam’s Sons', 2018, 15.99, 'ISBN00008', './img/where-crawdads-sing.jpg', 3),
('The Night Circus', 'Erin Morgenstern', 'This fantasy novel tells the story of Le Cirque des Rêves, a magical traveling circus that operates only at night. Unknown to the visitors, the circus is actually a venue for a magical competition between two young illusionists, Celia and Marco, who have been trained since childhood for this purpose by their mercurial instructors. Their story becomes a duel of love and destiny.', 'Doubleday', 2011, 10.99, 'ISBN00009', './img/night-circus.jpg', 4),
('The Great Alone', 'Kristin Hannah', 'Set in the 1970s, this novel follows Ernt Allbright, a former POW, who moves his family to Alaska in an attempt to find peace and freedom. His daughter Leni hopes for a new beginning but soon discovers that the wild is harsh and unforgiving. The family struggles with survival in the untamed beauty of Alaska, and the volatile human emotions that isolation can bring to the surface.', 'St. Martin’s Press', 2018, 11.99, 'ISBN00010', './img/great-alone.jpg', 5),
('Gone Girl', 'Gillian Flynn', 'In this psychological thriller, Amy Dunne disappears on her fifth wedding anniversary, and all fingers point to her husband, Nick. As the investigation unfolds, the couple\'s secrets and deceptions are laid bare, narrated through their dual perspectives. The novel explores the complexities of marriage and media influence on public perception.', 'Crown', 2012, 14.99, 'ISBN00011', './img/gone-girl.jpg', 1),
('The Road', 'Cormac McCarthy', 'This post-apocalyptic novel tells the story of a father and his young son as they traverse a desolate landscape, covered with ash and devoid of life, presumably after a cataclysmic event. They head south to the sea, surviving through scavenging, while evading bands of cannibals. It\'s a grim tale of love, despair, and the bonds between parent and child.', 'Knopf', 2006, 12.99, 'ISBN00012', './img/road.jpg', 2),
('Room', 'Emma Donoghue', 'Narrated by five-year-old Jack, who lives in a single room with his mother, Ma, this novel explores their life in captivity and their escape. Jack is content with his world, but Ma knows they cannot remain confined. The room is all Jack has ever known, but Ma devises a risky escape plan, thrusting them into the overwhelming reality of the outside world.', 'Little, Brown and Company', 2010, 10.99, 'ISBN00013', './img/room.jpg', 3),
('The Silent Patient', 'Alex Michaelides', 'Alicia Berenson\'s life seems perfect until she shoots her husband five times and then never speaks another word. Theo Faber is a criminal psychotherapist who becomes obsessed with the case and the silent patient. He is determined to unravel Alicia\'s motives for the murder and break through her silence, leading to a startling conclusion.', 'Celadon Books', 2019, 13.99, 'ISBN00014', './img/silent-patient.jpg', 4),
('The Martian', 'Andy Weir', 'Astronaut Mark Watney is presumed dead and left behind on Mars after a fierce storm. With only a meager amount of supplies, his ingenuity, wit, and spirit, he must find a way to signal to Earth that he is alive and survive on a hostile planet. The novel is a detailed survival story with elements of humor and science.', 'Crown', 2014, 16.99, 'ISBN00015', './img/martian.jpg', 5),
('Life After Life', 'Kate Atkinson', 'This novel follows Ursula Todd as she lives through the events of the 20th century again and again, dying and being reborn with each iteration. With each life, Ursula experiences variations, making small changes that lead to different paths. It\'s a narrative about the roles fate, choice, and consequence play in our lives.', 'Reagan Arthur Books', 2013, 12.99, 'ISBN00016', './img/life-after-life.jpg', 1),
('The Fifth Season', 'N.K. Jemisin', 'This fantasy novel begins with the end of the world in the Stillness, a land familiar with catastrophe, where society is maintained by Orogenes—individuals who can control the energy of the earth. The story follows three female Orogenes, across time and perspectives, as they navigate through political unrest, environmental disaster, and personal betrayal.', 'Orbit', 2015, 14.99, 'ISBN00017', './img/fifth-season.jpg', 2),
('Station Eleven', 'Emily St. John Mandel', 'After a devastating flu pandemic wipes out most of civilization, a small troupe of actors and musicians travel between settlements, performing Shakespeare. The novel weaves together the stories of several characters both before and after the pandemic, exploring the enduring nature of art and humanity in the face of collapse.', 'Knopf', 2014, 15.99, 'ISBN00018', './img/station-eleven.jpg', 3),
('The Name of the Wind', 'Patrick Rothfuss', 'This is the first book in \'The Kingkiller Chronicle\' series, narrating the story of Kvothe, an adventurer and musician. The tale is told in the first person as he recounts his journey from a trouper\'s son to a notorious figure in the world. Magic, legend, love, and loss are beautifully interwoven in this detailed and immersive fantasy world.', 'DAW', 2007, 12.99, 'ISBN00019', './img/name-of-the-wind.jpg', 4),
('Little Fires Everywhere', 'Celeste Ng', 'Set in Shaker Heights, Ohio, this novel explores the intertwined fates of the picture-perfect Richardson family and an enigmatic mother and daughter who upend their lives. The story addresses issues of race, class, and the pain of unmet expectations, all beginning with a custody battle over a Chinese-American baby that dramatically divides the town.', 'Penguin Press', 2017, 13.99, 'ISBN00020', './img/little-fires-everywhere.jpg', 5),
('A Gentleman in Moscow', 'Amor Towles', 'In "A Gentleman in Moscow", Amor Towles tells the story of Count Alexander Rostov. When he is deemed an unrepentant aristocrat by a Bolshevik tribunal, the count is sentenced to house arrest in the Metropol, a grand hotel across the street from the Kremlin. Rostov, an indomitable man of erudition and wit, has never worked a day in his life, and must now live in an attic room while some of the most tumultuous decades in Russian history unfold.', 'Viking', 2016, 17.00, 'ISBN00021', './img/gentleman-moscow.jpg', 1),
('The Midnight Library', 'Matt Haig', 'Between life and death there is a library. Up until now, Nora Seed\'s life has been full of misery and regret. She feels she has let everyone down, including herself. But things are about to change when she finds herself in the Midnight Library. Here, each book provides a chance to try another life she could have lived, to see how things would be different if she had made other choices.', 'Canongate Books', 2020, 15.99, 'ISBN00022', './img/midnight-library.jpg', 2),
('The Water Dancer', 'Ta-Nehisi Coates', 'Young Hiram Walker was born into bondage. When his mother was sold away, Hiram was robbed of all memory of her—but gifted with a mysterious power. This begins an odyssey that takes Hiram from the corrupt grandeur of Virginia’s proud plantations to desperate guerrilla cells in the wilderness, as he struggles to escape the bonds of his past and embrace his full humanity.', 'One World', 2019, 17.50, 'ISBN00023', './img/water-dancer.jpg', 3),
('Project Hail Mary', 'Andy Weir', 'Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the Earth itself will perish. Except that right now, he doesn\'t know that. He can\'t even remember his own name, let alone the nature of his assignment or how to complete it. This is the story of a man who has to remember his mission to save the world.', 'Ballantine Books', 2021, 14.95, 'ISBN00024', './img/project-hail-mary.jpg', 4),
('The Four Winds', 'Kristin Hannah', 'From the number-one bestselling author of "The Nightingale" and "The Great Alone" comes a powerful American epic about love and heroism and hope, set during the Great Depression, a time when the country was in crisis and at war with itself, when millions were out of work and even the land seemed to have turned against them.', 'St. Martin\'s Press', 2021, 17.99, 'ISBN00025', './img/four-winds.jpg', 5),
('The Vanishing Half', 'Brit Bennett', 'The Vignes twin sisters will always be identical. But after growing up together in a small, southern black community and running away at age sixteen, it\'s not just the shape of their daily lives that is different as adults, it\'s everything: their families, their communities, their racial identities. Many years later, one sister lives with her black daughter in the same southern town she once tried to escape. The other secretly passes for white, and her white husband knows nothing of her past.', 'Riverhead Books', 2020, 18.99, 'ISBN00026', './img/vanishing-half.jpg', 1),
('The Overstory', 'Richard Powers', 'An enthralling novel that weaves the stories of nine characters to paint a wide and vivid canvas of humans in the world of trees. Spanning a century and stretching across continents, "The Overstory" is a sweeping, impassioned work of activism and resistance that is also a stunning evocation of the natural world.', 'W. W. Norton & Company', 2018, 18.95, 'ISBN00027', './img/overstory.jpg', 2),
('The Invisible Life of Addie LaRue', 'V.E. Schwab', 'In France, 1714, a young woman makes a desperate bargain to live forever and is cursed to be forgotten by everyone she meets. Thus begins the extraordinary life of Addie LaRue, and a dazzling adventure that will play out across centuries and continents, until one day, in a New York City bookstore, someone remembers her name.', 'Tor Books', 2020, 16.99, 'ISBN00028', './img/invisible-life-addie.jpg', 3),
('The Beekeeper of Aleppo', 'Christy Lefteri', 'Nuri is a beekeeper and Afra, his wife, is an artist. Mornings, they care for the hives in the garden while evenings, they take their produce to market. They live a simple life, rich in family and friends, until the unthinkably violent. Everything changes when their beloved homeland of Syria is torn apart by war. As they journey through a broken world, they must confront not only the pain of their unbearable loss but also the horrors they have seen.', 'Ballantine Books', 2019, 15.99, 'ISBN00029', './img/beekeeper-aleppo.jpg', 4),
('The Book Thief', 'Markus Zusak', 'This is a story narrated by Death, set in Nazi Germany. Liesel Meminger, the book thief, finds solace by stealing books and sharing them with others. Under the stairs in her home, a Jewish refugee is being sheltered by her adoptive parents. It\'s a tale of the ability of books to feed the soul.', 'Knopf Books for Young Readers', 2006, 12.99, 'ISBN00030', './img/book-thief.jpg', 5),
('All the Light We Cannot See', 'Anthony Doerr', 'This Pulitzer Prize-winning novel is set during World War II in occupied France. It follows Marie-Laure, a blind French girl, and Werner, a German boy, whose paths eventually cross as they both try to survive the devastation of the war around them.', 'Scribner', 2014, 16.99, 'ISBN00031', './img/all-light-cannot-see.jpg', 1),
('The Nightingale', 'Kristin Hannah', 'The Nightingale tells the stories of two sisters, separated by years and experience, by ideals, passion and circumstance, each embarking on her own dangerous path toward survival, love, and freedom in German-occupied, war-torn France—a heartbreakingly beautiful novel that celebrates the resilience of the human spirit and the durability of women.', 'St. Martin\'s Press', 2015, 15.99, 'ISBN00032', './img/nightingale.jpg', 2);


INSERT INTO comandas(estat, user_id) VALUES 
('Pendent', 1),('Processant', 1),('Recollida', 2);


INSERT INTO llibre_comanda (comanda_id, llibre_id, quantitat, preu) VALUES
(1, 5, 1, 20.99),(1,8,2, 15.99),(2,12,1, 12.99),(3,18,2, 15.99),(3,15,3, 16.99),(3,1,1, 14.99),(3,6,1, 13.99)
