import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';

createApp({
    data() {
        return {
            botigaStatus: 'landing',
            llibres: [
                {
                    "id": 1,
                    "titol": "Harry Potter i la Pedra Filosofal",
                    "autor": "J K Rowling",
                    "any": 1997,
                    "editorial": "Empuries",
                    "isbn": "9788475967745",
                    "descripcio": "Harry Potter és orfe i viu en unes condicions infrahumanes a casa d'uns tiets despietats fins al dia que descobreix els seus dots de bruixot i és convidat a estudiar a una escola de màgia i bruixeria. Allà, a més d'aprendre l'ofici, haurà de combatre Voldemort, que encarna les forces del mal, i defensar la joia de l'escola, una pedra filosofal que, segons sembla, n'hi ha més d'un que vol trobar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788475967745-es.jpg",
                    "preu": 4.66,
                    "categories": [
                        "Aventura",
                        "Fantasia"
                    ]
                },
                {
                    "id": 2,
                    "titol": "El Gran Gatsby",
                    "autor": "F. Scott Fitzgerald",
                    "any": 1925,
                    "editorial": "Scribner",
                    "isbn": "9780743273565",
                    "descripcio": "El Gran Gatsby es una novela que explora la decadencia de la sociedad estadounidense en la década de 1920. La historia sigue a Jay Gatsby y su obsesión por Daisy Buchanan en un mundo lleno de excesos y corrupción.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780743273565-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Ficció",
                        "Clàssics"
                    ]
                },
                {
                    "id": 3,
                    "titol": "Cien años de soledad",
                    "autor": "Gabriel García Márquez",
                    "any": 1967,
                    "editorial": "Sudamericana",
                    "isbn": "9788437604947",
                    "descripcio": "Esta obra maestra del realismo mágico narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo de Macondo. Una epopeya que combina la fantasía con la crónica de la realidad latinoamericana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788437604947-es.jpg",
                    "preu": 12.50,
                    "categories": [
                        "Realisme Màgic",
                        "Literatura Llatinoamericana"
                    ]
                },
                {
                    "id": 4,
                    "titol": "Matar a un ruiseñor",
                    "autor": "Harper Lee",
                    "any": 1960,
                    "editorial": "J. B. Lippincott & Co.",
                    "isbn": "9780061120084",
                    "descripcio": "La novela relata la historia de una niña llamada Scout Finch y su hermano Jem mientras su padre, el abogado Atticus Finch, defiende a un hombre negro acusado de violar a una mujer blanca en el sur de Estados Unidos durante la década de 1930.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780061120084-es.jpg",
                    "preu": 8.75,
                    "categories": [
                        "Drama"
                    ]
                },
                {
                    "id": 5,
                    "titol": "1984",
                    "autor": "George Orwell",
                    "any": 1949,
                    "editorial": "Secker & Warburg",
                    "isbn": "9780451524935",
                    "descripcio": "Una novela distópica que presenta un mundo totalitario en el que el Gran Hermano vigila a todos. Winston Smith, el protagonista, lucha contra la opresión del Estado y busca la verdad en un mundo de propaganda y control absoluto.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451524935-es.jpg",
                    "preu": 7.99,
                    "categories": [
                        "Distopia",
                        "Política"
                    ]
                },
                {
                    "id": 6,
                    "titol": "Crimen y castigo",
                    "autor": "Fyodor Dostoevsky",
                    "any": 1866,
                    "editorial": "The Russian Messenger",
                    "isbn": "9781983488024",
                    "descripcio": "La novela sigue la vida de Raskolnikov, un estudiante que comete un asesinato por razones filosóficas. A medida que la culpa lo atormenta, enfrenta las consecuencias de su crimen en la Rusia del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781983488024-es.jpg",
                    "preu": 10.25,
                    "categories": [
                        "Psicològica",
                        "Literatura Rusa"
                    ]
                },
                {
                    "id": 7,
                    "titol": "Moby-Dick",
                    "autor": "Herman Melville",
                    "any": 1851,
                    "editorial": "Richard Bentley",
                    "isbn": "9781503280784",
                    "descripcio": "La historia del capitán Ahab y su obsesión por cazar a la ballena blanca Moby-Dick. La novela es una exploración épica de la obsesión y la venganza en alta mar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781503280784-es.jpg",
                    "preu": 11.75,
                    "categories": [
                        "Aventura",
                        "Clàssics Americans"
                    ]
                },
                {
                    "id": 8,
                    "titol": "Orgullo y prejuicio",
                    "autor": "Jane Austen",
                    "any": 1813,
                    "editorial": "T. Egerton, Whitehall",
                    "isbn": "9780141439518",
                    "descripcio": "Una novela romántica que sigue la vida de Elizabeth Bennet y su complicada relación con el señor Darcy. La obra critica la sociedad y las convenciones de la Inglaterra del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780141439518-es.jpg",
                    "preu": 6.99,
                    "categories": [
                        "Romàntica",
                        "Clàssics"
                    ]
                },
                {
                    "id": 9,
                    "titol": "Ulises",
                    "autor": "James Joyce",
                    "any": 1922,
                    "editorial": "Sylvia Beach",
                    "isbn": "9780141197419",
                    "descripcio": "Ulises es una obra maestra de la literatura moderna que narra un día en la vida de Leopold Bloom en Dublín. A través de su estilo experimental y simbolismo, James Joyce exploró la conciencia humana y la condición humana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780141197419-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Modernisme",
                        "Literatura Irlandesa"
                    ]
                },
                {
                    "id": 10,
                    "titol": "En busca del tiempo perdido",
                    "autor": "Marcel Proust",
                    "any": 1913,
                    "editorial": "Grasset",
                    "isbn": "9788432061271",
                    "descripcio": "Esta monumental obra literaria consta de siete partes y narra la vida del narrador y su búsqueda de la verdad y el significado de la vida a través de la memoria y la introspección.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788432061271-es.jpg",
                    "preu": 19.99,
                    "categories": [
                        "Modernista"
                    ]
                },
                {
                    "id": 11,
                    "titol": "Don Quijote de la Mancha",
                    "autor": "Miguel de Cervantes",
                    "any": 1605,
                    "editorial": "Juan de la Cuesta",
                    "isbn": "9788420673054",
                    "descripcio": "La historia de Don Quijote y su fiel escudero Sancho Panza es una sátira de las novelas de caballerías y una exploración de la locura y la imaginación. Es una de las obras más importantes de la literatura española.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788420673054-es.jpg",
                    "preu": 8.25,
                    "categories": [
                        "Aventura",
                        "Clássics"
                    ]
                },
                {
                    "id": 12,
                    "titol": "Cien años de soledad",
                    "autor": "Gabriel García Márquez",
                    "any": 1967,
                    "editorial": "Sudamericana",
                    "isbn": "9788437604947",
                    "descripcio": "Esta obra maestra del realismo mágico narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo de Macondo. Una epopeya que combina la fantasía con la crónica de la realidad latinoamericana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788437604947-es.jpg",
                    "preu": 12.50,
                    "categories": [
                        "Realisme Màgic",
                        "Literatura Llatinoamericana"
                    ]
                },
                {
                    "id": 13,
                    "titol": "Matar a un ruiseñor",
                    "autor": "Harper Lee",
                    "any": 1960,
                    "editorial": "J. B. Lippincott & Co.",
                    "isbn": "9780061120084",
                    "descripcio": "La novela relata la historia de una niña llamada Scout Finch y su hermano Jem mientras su padre, el abogado Atticus Finch, defiende a un hombre negro acusado de violar a una mujer blanca en el sur de Estados Unidos durante la década de 1930.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780061120084-es.jpg",
                    "preu": 8.75,
                    "categories": [
                        "Drama"
                    ]
                },
                {
                    "id": 14,
                    "titol": "1984",
                    "autor": "George Orwell",
                    "any": 1949,
                    "editorial": "Secker & Warburg",
                    "isbn": "9780451524935",
                    "descripcio": "Una novela distópica que presenta un mundo totalitario en el que el Gran Hermano vigila a todos. Winston Smith, el protagonista, lucha contra la opresión del Estado y busca la verdad en un mundo de propaganda y control absoluto.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451524935-es.jpg",
                    "preu": 7.99,
                    "categories": [
                        "Distopia",
                        "Política"
                    ]
                },
                {
                    "id": 15,
                    "titol": "Crimen y castigo",
                    "autor": "Fyodor Dostoevsky",
                    "any": 1866,
                    "editorial": "The Russian Messenger",
                    "isbn": "9781983488024",
                    "descripcio": "La novela sigue la vida de Raskolnikov, un estudiante que comete un asesinato por razones filosóficas. A medida que la culpa lo atormenta, enfrenta las consecuencias de su crimen en la Rusia del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781983488024-es.jpg",
                    "preu": 10.25,
                    "categories": [
                        "Psicològica",
                        "Literatura Russa"
                    ]
                },
                {
                    "id": 16,
                    "titol": "Moby-Dick",
                    "autor": "Herman Melville",
                    "any": 1851,
                    "editorial": "Richard Bentley",
                    "isbn": "9781503280784",
                    "descripcio": "La historia del capitán Ahab y su obsesión por cazar a la ballena blanca Moby-Dick. La novela es una exploración épica de la obsesión y la venganza en alta mar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781503280784-es.jpg",
                    "preu": 11.75,
                    "categories": [
                        "Aventura",
                        "Clássics Americans"
                    ]
                },
                {
                    "id": 17,
                    "titol": "Orgullo y prejuicio",
                    "autor": "Jane Austen",
                    "any": 1813,
                    "editorial": "T. Egerton, Whitehall",
                    "isbn": "9780141439518",
                    "descripcio": "Una novela romántica que sigue la vida de Elizabeth Bennet",
                    "img_url": "https://pictures.abebooks.com/isbn/9780261102217-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Fantasia",
                        "Aventura"
                    ]
                },
                {
                    "id": 18,
                    "titol": "El Hobbit",
                    "autor": "J.R.R. Tolkien",
                    "any": 1937,
                    "editorial": "Allen & Unwin",
                    "isbn": "9780261102217",
                    "descripcio": "La historia de Bilbo Bolsón, un hobbit que se embarca en una aventura inesperada para recuperar un tesoro guardado por el dragón Smaug. En su viaje, se encuentra con elfos, enanos y un anillo mágico.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780261102217-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Fantasia",
                        "Aventura"
                    ]
                },
                {
                    "id": 19,
                    "titol": "Mujer en punto cero",
                    "autor": "Nawal El Saadawi",
                    "any": 1975,
                    "editorial": "Dar el Helal",
                    "isbn": "9781842778739",
                    "descripcio": "La novela narra la historia de Firdaus, una mujer egipcia que lucha contra la opresión y la injusticia en una sociedad patriarcal. Una obra que critica la desigualdad de género y la opresión de las mujeres.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781842778739-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Ficció Feminista",
                        "Literatura Àrab"
                    ]
                },
                {
                    "id": 20,
                    "titol": "Los pilares de la Tierra",
                    "autor": "Ken Follett",
                    "any": 1989,
                    "editorial": "William Morrow",
                    "isbn": "9780451232816",
                    "descripcio": "Una epopeya histórica que sigue la construcción de una catedral en la Inglaterra del siglo XII. La novela abarca generaciones y se entrelaza con la política, la religión y la lucha por el poder.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451232816-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Històrica",
                        "Èpica"
                    ]
                },
                {
                    "id": 21,
                    "titol": "El nombre del viento",
                    "autor": "Patrick Rothfuss",
                    "any": 2007,
                    "editorial": "DAW Books",
                    "isbn": "9780756404741",
                    "descripcio": "La historia de Kvothe, un músico y mago legendario, que narra sus propias aventuras desde su infancia en una troupe de artistas hasta sus proezas mágicas y la búsqueda de la verdad.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780756404741-es.jpg",
                    "preu": 12.99,
                    "categories": [
                        "Fantasia",
                        "Aventuras"
                    ]
                },
                {
                    "id": 22,
                    "titol": "La sombra del viento",
                    "autor": "Carlos Ruiz Zafón",
                    "any": 2001,
                    "editorial": "Planeta",
                    "isbn": "9788408058260",
                    "descripcio": "Una novela que explora el misterio y la magia de los libros. La historia sigue a Daniel Sempere mientras descubre un libro que lo lleva a investigar el pasado de un autor olvidado.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788408058260-es.jpg",
                    "preu": 9.75,
                    "categories": [
                        "Misteri",
                        "Gótica"
                    ]
                },
                {
                    "id": 23,
                    "titol": "Cazadores de sombras: Ciudad de hueso",
                    "autor": "Cassandra Clare",
                    "any": 2007,
                    "editorial": "Margaret K. McElderry Books",
                    "isbn": "9781416914280",
                    "descripcio": "La primera entrega de la serie Cazadores de sombras. La protagonista, Clary Fray, descubre un mundo de sombras y demonios cuando su madre desaparece, y se une a un grupo de cazadores de sombras para encontrarla.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781416914280-es.jpg",
                    "preu": 8.99,
                    "categories": [
                        "Fantasía Urbana",
                        "Jóvenes Adultos"
                    ]
                },
                {
                    "id": 24,
                    "titol": "El código Da Vinci",
                    "autor": "Dan Brown",
                    "any": 2003,
                    "editorial": "Doubleday",
                    "isbn": "9780385504201",
                    "descripcio": "Un thriller que sigue al profesor Robert Langdon mientras investiga un asesinato en el Louvre y descubre una conspiración que involucra códigos secretos y simbología religiosa.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780385504201-es.jpg",
                    "preu": 10.50,
                    "categories": [
                        "Thriller",
                        "Misteri"
                    ]
                },
                {
                    "id": 25,
                    "titol": "El retrato de Dorian Gray",
                    "autor": "Oscar Wilde",
                    "any": 1890,
                    "editorial": "Ward, Lock & Co.",
                    "isbn": "9781493750596",
                    "descripcio": "La historia de Dorian Gray, un joven que vende su alma para preservar su belleza eterna mientras su retrato envejece en su lugar. Una exploración de la moralidad y la decadencia.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781493750596-es.jpg",
                    "preu": 6.75,
                    "categories": [
                        "Gótica",
                        "Clásicos Literarios"
                    ]
                },
                {
                    "id": 26,
                    "titol": "Mujer en punto cero",
                    "autor": "Nawal El Saadawi",
                    "any": 1975,
                    "editorial": "Dar el Helal",
                    "isbn": "9781842778739",
                    "descripcio": "La novela narra la historia de Firdaus, una mujer egipcia que lucha contra la opresión y la injusticia en una sociedad patriarcal. Una obra que critica la desigualdad de género y la opresión de las mujeres.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781842778739-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Ficción Feminista",
                        "Literatura Árabe"
                    ]
                },
                {
                    "id": 27,
                    "titol": "Los pilares de la Tierra",
                    "autor": "Ken Follett",
                    "any": 1989,
                    "editorial": "William Morrow",
                    "isbn": "9780451232816",
                    "descripcio": "Una epopeya histórica que sigue la construcción de una catedral en la Inglaterra del siglo XII. La novela abarca generaciones y se entrelaza con la política, la religión y la lucha por el poder.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451232816-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Històrica",
                        "Épica"
                    ]
                },
                {
                    "id": 28,
                    "titol": "Los juegos del hambre",
                    "autor": "Suzanne Collins",
                    "any": 2008,
                    "editorial": "Scholastic Press",
                    "isbn": "9780439023481",
                    "descripcio": "La primera entrega de la trilogía Los juegos del hambre. Katniss Everdeen se convierte en voluntaria en un peligroso concurso televisado donde los tributos luchan por sobrevivir.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780439023481-es.jpg",
                    "preu": 7.50,
                    "categories": [
                        "Ciència-Ficció",
                        "Jóvenes Adultos"
                    ]
                },
                {
                    "id": 29,
                    "titol": "La carretera",
                    "autor": "Cormac McCarthy",
                    "any": 2006,
                    "editorial": "Knopf",
                    "isbn": "9780307265432",
                    "descripcio": "La historia de un padre y su hijo que viajan a través de un mundo postapocalíptico en busca de seguridad y supervivencia. Una obra desgarradora sobre el amor y la esperanza en medio de la desolación.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780307265432-es.jpg",
                    "preu": 8.99,
                    "categories": [
                        "Ficción Apocalíptica",
                        "Drama"
                    ]
                },
                {
                    "id": 30,
                    "titol": "El perfume",
                    "autor": "Patrick Süskind",
                    "any": 1985,
                    "editorial": "Diogenes",
                    "isbn": "9788426412274",
                    "descripcio": "La historia de Jean-Baptiste Grenouille, un asesino obsesionado con la creación del perfume perfecto a partir del aroma de las mujeres. Una novela oscura y perturbadora sobre la obsesión y la belleza.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788426412274-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Gótica",
                        "Satira"
                    ]
                },
                {
                    "id": 31,
                    "titol": "Gente Normal",
                    "autor": "Sally Rooney",
                    "any": 2019,
                    "editorial": "Literatura Random House",
                    "isbn": "9788439736318",
                    "descripcio": "Marianne y Connell son compañeros de instituto pero no se cruzan  palabra. Él es uno de los populares y ella, una chica solitaria que ha  aprendido a mantenerse alejada del resto de la gente. Todos saben que  Marianne vive en una mansión y que la madre de Connell se encarga de su  limpieza, pero nadie imagina que cada tarde los dos jóvenes coinciden.  Uno de esos días, una conversación torpe dará comienzo a una relación que podría cambiar sus vidas.",
                    "img_url": "https://imagessl8.casadellibro.com/a/l/s7/18/9788439736318.webp",
                    "preu": 18.90,
                    "categories": [
                        "Romàntica"
                    ]
                }
            ],
            llibresFiltrats: [
                {
                    "id": 1,
                    "titol": "Harry Potter i la Pedra Filosofal",
                    "autor": "J K Rowling",
                    "any": 1997,
                    "editorial": "Empuries",
                    "isbn": "9788475967745",
                    "descripcio": "Harry Potter és orfe i viu en unes condicions infrahumanes a casa d'uns tiets despietats fins al dia que descobreix els seus dots de bruixot i és convidat a estudiar a una escola de màgia i bruixeria. Allà, a més d'aprendre l'ofici, haurà de combatre Voldemort, que encarna les forces del mal, i defensar la joia de l'escola, una pedra filosofal que, segons sembla, n'hi ha més d'un que vol trobar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788475967745-es.jpg",
                    "preu": 4.66,
                    "categories": [
                        "Aventura",
                        "Fantasia"
                    ]
                },
                {
                    "id": 2,
                    "titol": "El Gran Gatsby",
                    "autor": "F. Scott Fitzgerald",
                    "any": 1925,
                    "editorial": "Scribner",
                    "isbn": "9780743273565",
                    "descripcio": "El Gran Gatsby es una novela que explora la decadencia de la sociedad estadounidense en la década de 1920. La historia sigue a Jay Gatsby y su obsesión por Daisy Buchanan en un mundo lleno de excesos y corrupción.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780743273565-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Ficció",
                        "Clàssics"
                    ]
                },
                {
                    "id": 3,
                    "titol": "Cien años de soledad",
                    "autor": "Gabriel García Márquez",
                    "any": 1967,
                    "editorial": "Sudamericana",
                    "isbn": "9788437604947",
                    "descripcio": "Esta obra maestra del realismo mágico narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo de Macondo. Una epopeya que combina la fantasía con la crónica de la realidad latinoamericana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788437604947-es.jpg",
                    "preu": 12.50,
                    "categories": [
                        "Realisme Màgic",
                        "Literatura Llatinoamericana"
                    ]
                },
                {
                    "id": 4,
                    "titol": "Matar a un ruiseñor",
                    "autor": "Harper Lee",
                    "any": 1960,
                    "editorial": "J. B. Lippincott & Co.",
                    "isbn": "9780061120084",
                    "descripcio": "La novela relata la historia de una niña llamada Scout Finch y su hermano Jem mientras su padre, el abogado Atticus Finch, defiende a un hombre negro acusado de violar a una mujer blanca en el sur de Estados Unidos durante la década de 1930.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780061120084-es.jpg",
                    "preu": 8.75,
                    "categories": [
                        "Drama"
                    ]
                },
                {
                    "id": 5,
                    "titol": "1984",
                    "autor": "George Orwell",
                    "any": 1949,
                    "editorial": "Secker & Warburg",
                    "isbn": "9780451524935",
                    "descripcio": "Una novela distópica que presenta un mundo totalitario en el que el Gran Hermano vigila a todos. Winston Smith, el protagonista, lucha contra la opresión del Estado y busca la verdad en un mundo de propaganda y control absoluto.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451524935-es.jpg",
                    "preu": 7.99,
                    "categories": [
                        "Distopia",
                        "Política"
                    ]
                },
                {
                    "id": 6,
                    "titol": "Crimen y castigo",
                    "autor": "Fyodor Dostoevsky",
                    "any": 1866,
                    "editorial": "The Russian Messenger",
                    "isbn": "9781983488024",
                    "descripcio": "La novela sigue la vida de Raskolnikov, un estudiante que comete un asesinato por razones filosóficas. A medida que la culpa lo atormenta, enfrenta las consecuencias de su crimen en la Rusia del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781983488024-es.jpg",
                    "preu": 10.25,
                    "categories": [
                        "Psicològica",
                        "Literatura Rusa"
                    ]
                },
                {
                    "id": 7,
                    "titol": "Moby-Dick",
                    "autor": "Herman Melville",
                    "any": 1851,
                    "editorial": "Richard Bentley",
                    "isbn": "9781503280784",
                    "descripcio": "La historia del capitán Ahab y su obsesión por cazar a la ballena blanca Moby-Dick. La novela es una exploración épica de la obsesión y la venganza en alta mar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781503280784-es.jpg",
                    "preu": 11.75,
                    "categories": [
                        "Aventura",
                        "Clàssics Americans"
                    ]
                },
                {
                    "id": 8,
                    "titol": "Orgullo y prejuicio",
                    "autor": "Jane Austen",
                    "any": 1813,
                    "editorial": "T. Egerton, Whitehall",
                    "isbn": "9780141439518",
                    "descripcio": "Una novela romántica que sigue la vida de Elizabeth Bennet y su complicada relación con el señor Darcy. La obra critica la sociedad y las convenciones de la Inglaterra del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780141439518-es.jpg",
                    "preu": 6.99,
                    "categories": [
                        "Romàntica",
                        "Clàssics"
                    ]
                },
                {
                    "id": 9,
                    "titol": "Ulises",
                    "autor": "James Joyce",
                    "any": 1922,
                    "editorial": "Sylvia Beach",
                    "isbn": "9780141197419",
                    "descripcio": "Ulises es una obra maestra de la literatura moderna que narra un día en la vida de Leopold Bloom en Dublín. A través de su estilo experimental y simbolismo, James Joyce exploró la conciencia humana y la condición humana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780141197419-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Modernisme",
                        "Literatura Irlandesa"
                    ]
                },
                {
                    "id": 10,
                    "titol": "En busca del tiempo perdido",
                    "autor": "Marcel Proust",
                    "any": 1913,
                    "editorial": "Grasset",
                    "isbn": "9788432061271",
                    "descripcio": "Esta monumental obra literaria consta de siete partes y narra la vida del narrador y su búsqueda de la verdad y el significado de la vida a través de la memoria y la introspección.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788432061271-es.jpg",
                    "preu": 19.99,
                    "categories": [
                        "Modernista"
                    ]
                },
                {
                    "id": 11,
                    "titol": "Don Quijote de la Mancha",
                    "autor": "Miguel de Cervantes",
                    "any": 1605,
                    "editorial": "Juan de la Cuesta",
                    "isbn": "9788420673054",
                    "descripcio": "La historia de Don Quijote y su fiel escudero Sancho Panza es una sátira de las novelas de caballerías y una exploración de la locura y la imaginación. Es una de las obras más importantes de la literatura española.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788420673054-es.jpg",
                    "preu": 8.25,
                    "categories": [
                        "Aventura",
                        "Clássics"
                    ]
                },
                {
                    "id": 12,
                    "titol": "Cien años de soledad",
                    "autor": "Gabriel García Márquez",
                    "any": 1967,
                    "editorial": "Sudamericana",
                    "isbn": "9788437604947",
                    "descripcio": "Esta obra maestra del realismo mágico narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo de Macondo. Una epopeya que combina la fantasía con la crónica de la realidad latinoamericana.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788437604947-es.jpg",
                    "preu": 12.50,
                    "categories": [
                        "Realisme Màgic",
                        "Literatura Llatinoamericana"
                    ]
                },
                {
                    "id": 13,
                    "titol": "Matar a un ruiseñor",
                    "autor": "Harper Lee",
                    "any": 1960,
                    "editorial": "J. B. Lippincott & Co.",
                    "isbn": "9780061120084",
                    "descripcio": "La novela relata la historia de una niña llamada Scout Finch y su hermano Jem mientras su padre, el abogado Atticus Finch, defiende a un hombre negro acusado de violar a una mujer blanca en el sur de Estados Unidos durante la década de 1930.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780061120084-es.jpg",
                    "preu": 8.75,
                    "categories": [
                        "Drama"
                    ]
                },
                {
                    "id": 14,
                    "titol": "1984",
                    "autor": "George Orwell",
                    "any": 1949,
                    "editorial": "Secker & Warburg",
                    "isbn": "9780451524935",
                    "descripcio": "Una novela distópica que presenta un mundo totalitario en el que el Gran Hermano vigila a todos. Winston Smith, el protagonista, lucha contra la opresión del Estado y busca la verdad en un mundo de propaganda y control absoluto.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451524935-es.jpg",
                    "preu": 7.99,
                    "categories": [
                        "Distopia",
                        "Política"
                    ]
                },
                {
                    "id": 15,
                    "titol": "Crimen y castigo",
                    "autor": "Fyodor Dostoevsky",
                    "any": 1866,
                    "editorial": "The Russian Messenger",
                    "isbn": "9781983488024",
                    "descripcio": "La novela sigue la vida de Raskolnikov, un estudiante que comete un asesinato por razones filosóficas. A medida que la culpa lo atormenta, enfrenta las consecuencias de su crimen en la Rusia del siglo XIX.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781983488024-es.jpg",
                    "preu": 10.25,
                    "categories": [
                        "Psicològica",
                        "Literatura Russa"
                    ]
                },
                {
                    "id": 16,
                    "titol": "Moby-Dick",
                    "autor": "Herman Melville",
                    "any": 1851,
                    "editorial": "Richard Bentley",
                    "isbn": "9781503280784",
                    "descripcio": "La historia del capitán Ahab y su obsesión por cazar a la ballena blanca Moby-Dick. La novela es una exploración épica de la obsesión y la venganza en alta mar.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781503280784-es.jpg",
                    "preu": 11.75,
                    "categories": [
                        "Aventura",
                        "Clássics Americans"
                    ]
                },
                {
                    "id": 17,
                    "titol": "Orgullo y prejuicio",
                    "autor": "Jane Austen",
                    "any": 1813,
                    "editorial": "T. Egerton, Whitehall",
                    "isbn": "9780141439518",
                    "descripcio": "Una novela romántica que sigue la vida de Elizabeth Bennet",
                    "img_url": "https://pictures.abebooks.com/isbn/9780261102217-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Fantasia",
                        "Aventura"
                    ]
                },
                {
                    "id": 18,
                    "titol": "El Hobbit",
                    "autor": "J.R.R. Tolkien",
                    "any": 1937,
                    "editorial": "Allen & Unwin",
                    "isbn": "9780261102217",
                    "descripcio": "La historia de Bilbo Bolsón, un hobbit que se embarca en una aventura inesperada para recuperar un tesoro guardado por el dragón Smaug. En su viaje, se encuentra con elfos, enanos y un anillo mágico.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780261102217-es.jpg",
                    "preu": 9.99,
                    "categories": [
                        "Fantasia",
                        "Aventura"
                    ]
                },
                {
                    "id": 19,
                    "titol": "Mujer en punto cero",
                    "autor": "Nawal El Saadawi",
                    "any": 1975,
                    "editorial": "Dar el Helal",
                    "isbn": "9781842778739",
                    "descripcio": "La novela narra la historia de Firdaus, una mujer egipcia que lucha contra la opresión y la injusticia en una sociedad patriarcal. Una obra que critica la desigualdad de género y la opresión de las mujeres.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781842778739-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Ficció Feminista",
                        "Literatura Àrab"
                    ]
                },
                {
                    "id": 20,
                    "titol": "Los pilares de la Tierra",
                    "autor": "Ken Follett",
                    "any": 1989,
                    "editorial": "William Morrow",
                    "isbn": "9780451232816",
                    "descripcio": "Una epopeya histórica que sigue la construcción de una catedral en la Inglaterra del siglo XII. La novela abarca generaciones y se entrelaza con la política, la religión y la lucha por el poder.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451232816-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Històrica",
                        "Èpica"
                    ]
                },
                {
                    "id": 21,
                    "titol": "El nombre del viento",
                    "autor": "Patrick Rothfuss",
                    "any": 2007,
                    "editorial": "DAW Books",
                    "isbn": "9780756404741",
                    "descripcio": "La historia de Kvothe, un músico y mago legendario, que narra sus propias aventuras desde su infancia en una troupe de artistas hasta sus proezas mágicas y la búsqueda de la verdad.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780756404741-es.jpg",
                    "preu": 12.99,
                    "categories": [
                        "Fantasia",
                        "Aventuras"
                    ]
                },
                {
                    "id": 22,
                    "titol": "La sombra del viento",
                    "autor": "Carlos Ruiz Zafón",
                    "any": 2001,
                    "editorial": "Planeta",
                    "isbn": "9788408058260",
                    "descripcio": "Una novela que explora el misterio y la magia de los libros. La historia sigue a Daniel Sempere mientras descubre un libro que lo lleva a investigar el pasado de un autor olvidado.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788408058260-es.jpg",
                    "preu": 9.75,
                    "categories": [
                        "Misteri",
                        "Gótica"
                    ]
                },
                {
                    "id": 23,
                    "titol": "Cazadores de sombras: Ciudad de hueso",
                    "autor": "Cassandra Clare",
                    "any": 2007,
                    "editorial": "Margaret K. McElderry Books",
                    "isbn": "9781416914280",
                    "descripcio": "La primera entrega de la serie Cazadores de sombras. La protagonista, Clary Fray, descubre un mundo de sombras y demonios cuando su madre desaparece, y se une a un grupo de cazadores de sombras para encontrarla.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781416914280-es.jpg",
                    "preu": 8.99,
                    "categories": [
                        "Fantasía Urbana",
                        "Jóvenes Adultos"
                    ]
                },
                {
                    "id": 24,
                    "titol": "El código Da Vinci",
                    "autor": "Dan Brown",
                    "any": 2003,
                    "editorial": "Doubleday",
                    "isbn": "9780385504201",
                    "descripcio": "Un thriller que sigue al profesor Robert Langdon mientras investiga un asesinato en el Louvre y descubre una conspiración que involucra códigos secretos y simbología religiosa.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780385504201-es.jpg",
                    "preu": 10.50,
                    "categories": [
                        "Thriller",
                        "Misteri"
                    ]
                },
                {
                    "id": 25,
                    "titol": "El retrato de Dorian Gray",
                    "autor": "Oscar Wilde",
                    "any": 1890,
                    "editorial": "Ward, Lock & Co.",
                    "isbn": "9781493750596",
                    "descripcio": "La historia de Dorian Gray, un joven que vende su alma para preservar su belleza eterna mientras su retrato envejece en su lugar. Una exploración de la moralidad y la decadencia.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781493750596-es.jpg",
                    "preu": 6.75,
                    "categories": [
                        "Gótica",
                        "Clásicos Literarios"
                    ]
                },
                {
                    "id": 26,
                    "titol": "Mujer en punto cero",
                    "autor": "Nawal El Saadawi",
                    "any": 1975,
                    "editorial": "Dar el Helal",
                    "isbn": "9781842778739",
                    "descripcio": "La novela narra la historia de Firdaus, una mujer egipcia que lucha contra la opresión y la injusticia en una sociedad patriarcal. Una obra que critica la desigualdad de género y la opresión de las mujeres.",
                    "img_url": "https://pictures.abebooks.com/isbn/9781842778739-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Ficción Feminista",
                        "Literatura Árabe"
                    ]
                },
                {
                    "id": 27,
                    "titol": "Los pilares de la Tierra",
                    "autor": "Ken Follett",
                    "any": 1989,
                    "editorial": "William Morrow",
                    "isbn": "9780451232816",
                    "descripcio": "Una epopeya histórica que sigue la construcción de una catedral en la Inglaterra del siglo XII. La novela abarca generaciones y se entrelaza con la política, la religión y la lucha por el poder.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780451232816-es.jpg",
                    "preu": 14.99,
                    "categories": [
                        "Històrica",
                        "Épica"
                    ]
                },
                {
                    "id": 28,
                    "titol": "Los juegos del hambre",
                    "autor": "Suzanne Collins",
                    "any": 2008,
                    "editorial": "Scholastic Press",
                    "isbn": "9780439023481",
                    "descripcio": "La primera entrega de la trilogía Los juegos del hambre. Katniss Everdeen se convierte en voluntaria en un peligroso concurso televisado donde los tributos luchan por sobrevivir.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780439023481-es.jpg",
                    "preu": 7.50,
                    "categories": [
                        "Ciència-Ficció",
                        "Jóvenes Adultos"
                    ]
                },
                {
                    "id": 29,
                    "titol": "La carretera",
                    "autor": "Cormac McCarthy",
                    "any": 2006,
                    "editorial": "Knopf",
                    "isbn": "9780307265432",
                    "descripcio": "La historia de un padre y su hijo que viajan a través de un mundo postapocalíptico en busca de seguridad y supervivencia. Una obra desgarradora sobre el amor y la esperanza en medio de la desolación.",
                    "img_url": "https://pictures.abebooks.com/isbn/9780307265432-es.jpg",
                    "preu": 8.99,
                    "categories": [
                        "Ficción Apocalíptica",
                        "Drama"
                    ]
                },
                {
                    "id": 30,
                    "titol": "El perfume",
                    "autor": "Patrick Süskind",
                    "any": 1985,
                    "editorial": "Diogenes",
                    "isbn": "9788426412274",
                    "descripcio": "La historia de Jean-Baptiste Grenouille, un asesino obsesionado con la creación del perfume perfecto a partir del aroma de las mujeres. Una novela oscura y perturbadora sobre la obsesión y la belleza.",
                    "img_url": "https://pictures.abebooks.com/isbn/9788426412274-es.jpg",
                    "preu": 11.25,
                    "categories": [
                        "Gótica",
                        "Satira"
                    ]
                },
                {
                    "id": 31,
                    "titol": "Gente Normal",
                    "autor": "Sally Rooney",
                    "any": 2019,
                    "editorial": "Literatura Random House",
                    "isbn": "9788439736318",
                    "descripcio": "Marianne y Connell son compañeros de instituto pero no se cruzan  palabra. Él es uno de los populares y ella, una chica solitaria que ha  aprendido a mantenerse alejada del resto de la gente. Todos saben que  Marianne vive en una mansión y que la madre de Connell se encarga de su  limpieza, pero nadie imagina que cada tarde los dos jóvenes coinciden.  Uno de esos días, una conversación torpe dará comienzo a una relación que podría cambiar sus vidas.",
                    "img_url": "https://imagessl8.casadellibro.com/a/l/s7/18/9788439736318.webp",
                    "preu": 18.90,
                    "categories": [
                        "Romàntica"
                    ]
                }
            ],
            indexLlibres: 0,
            llibresMostrats: 6,
            categories: [],
            carrito: [],
            comanda: { productes: [] },
            idActual: 0,
            quantitat: 0,
            previewCarrito: false,
            localhost: window.location.hostname == '127.0.0.1',
            usuari: null,
            errorMsg: "",
            previewCategories: false,
            textBuscat: "",
            categoriaActual:0
        }
    },

    created() {
        this.getLlibres()
        this.fetchCategories()
    },

    methods: {
        async getLlibres() {
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/llibres"
            } else {
                url = '../../laravel-backend/public/api/llibres'
            }
            let response = await fetch(url)
            let productes = await response.json()
            console.log(productes)
            this.llibres = productes
            this.llibresFiltrats = productes
        },
        async fetchCategories() {
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/categories"
            } else {
                url = '../../laravel-backend/public/api/categories'
            }
            let response = await fetch(url)
            let categoriesProductes = await response.json()
            console.log(categoriesProductes)
            this.categories = categoriesProductes
        },
        async crearComanda() {
            if (!this.usuari) {
                this.errorMsg = "Inicia sessió per a crear una comanda!"
                return
            }

            let carrito = JSON.parse(JSON.stringify(this.carrito));
            let jsonObject = { "carrito": carrito }
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/novaComanda"
            } else {
                url = '../../laravel-backend/public/api/novaComanda'
            }

            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${this.usuari.token}`
                },
                body: JSON.stringify(jsonObject)
            })

            const jsonResponse = await response.json();
            console.log(jsonResponse);
            this.crearNovaComanda(jsonResponse);
        },
        cambiarDiv(id) {
            if (id === 'validacio' && this.carrito.length === 0) return;
            this.errorMsg = ""
            this.botigaStatus = id;
        },
        mostrar(id) {
            return this.botigaStatus === id;
        },
        getCarrito() {
            return this.carrito;
        },
        getCategories() {
            return this.categories;
        },
        canviarCat(id) {
            this.categoriaActual = id;
            if (this.categoriaActual === 0) {
                this.llibresFiltrats = this.llibres
            } else {

                this.llibresFiltrats = this.llibres.filter(llibre => llibre.categoria_id === this.categoriaActual)
            }
        },
        getComanda() {
            return this.comanda;
        },
        togglePreviewCarrito() {
            this.previewCategories = false
            this.previewCarrito = !this.previewCarrito;
        },
        togglePreviewCategories() {
            this.previewCarrito = false
            this.previewCategories = !this.previewCategories
        },
        mostrarLlibre(index) {
            this.idActual = index;
            let llibre = this.carrito.find(llibre => llibre.id === index)
            this.quantitat = llibre ? llibre.quantitat : 0;
        },
        getLlibreActual() {
            return this.llibres.find(llibre => llibre.id === this.idActual)
        },
        getLlibrePerId(id) {
            return this.llibres.find(llibre => llibre.id === id)
        },
        buscarLlibres(){
            this.indexLlibres = 0;
            if(this.textBuscat == ""){
                if(this.categoriaActual == 0){
                    this.llibresFiltrats = this.llibres
                } else{
                    this.llibresFiltrats = this.llibres.filter(llibre => llibre.categoria_id == this.categoriaActual);
                }
            } else{
                if(this.categoriaActual == 0){
                    this.llibresFiltrats = this.llibres.filter(llibre => llibre.titol.toLowerCase().includes(this.textBuscat.toLowerCase()));
                } else{
                    this.llibresFiltrats = this.llibresFiltrats.filter(llibre => llibre.titol.toLowerCase().includes(this.textBuscat.toLowerCase()) && llibre.categoria_id == this.categoriaActual );
                }
            }
         },
        getQuantitatTotalCarrito() {
            let quantitat = 0
            this.carrito.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        getPreuTotalCarrito() {
            let preu = 0
            this.carrito.forEach(llibre => {
                preu += llibre.preu * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        getPreuTotalComanda() {
            let preu = 0
            this.comanda.productes.forEach(llibre => {
                preu += parseInt(llibre.preu) * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        getQuantitatTotalComanda() {
            let quantitat = 0
            this.comanda.productes.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        crearNovaComanda(objecteComanda) {
            let novaComanda = {
                id: objecteComanda.id,
                estat: objecteComanda.estat,
                productes: this.carrito
            }
            this.comanda = novaComanda
            this.carrito = []
            console.log("creada")
            this.cambiarDiv('estat')
        },
        sumarQuantitat(id) {
            this.quantitat++;
            this.afegirLlibreCarrito(id);
        },
        restarQuantitat(id, comprovacio) {
            if (comprovacio && this.quantitat !== 0) {
                this.quantitat--
                this.treureLlibreCarrito(id)
            } else {
                this.treureLlibreCarrito(id)
            }

        },
        afegirLlibreCarrito(id) {
            let llibre = this.carrito.find(item => item.id === id)

            if (llibre) {
                this.carrito.forEach(item => {
                    if (item.id === id) {
                        item.quantitat++
                    }
                })
            } else {
                let llibreCarrito = {
                    "id": id,
                    "preu": this.getLlibreActual().preu,
                    "quantitat": 1
                };
                this.carrito.push(llibreCarrito);
            }
        },
        treureLlibreCarrito(id) {
            // Restar quantitat
            this.carrito.forEach(item => {
                if (item.id === id) {
                    item.quantitat--
                }
            })
            // Filtrar llibres amb quantitat zero
            let newCarrito = this.carrito.filter(item => item.quantitat != 0)
            this.carrito = newCarrito
        },
        guardarUsuari(dadesUsuari) {
            this.usuari = {
                id: dadesUsuari.user.id,
                nom: dadesUsuari.user.name,
                email: dadesUsuari.user.email,
                telefon: dadesUsuari.user.telefon,
                token: dadesUsuari.token.split('|')[1]
            }
            console.log(this.usuari)
            this.errorMsg = ""
            if (this.carrito.length > 0) {
                this.cambiarDiv('validacio')
            } else {
                this.cambiarDiv('landing')
            }
        },

        async getComandaPerUsuari() {
            let url;
            if (this.localhost) {
                url = `http://localhost:8000/api/comandes/user/${this.usuari.id}`
            } else {
                url = `../../laravel-backend/public/api/comandes/user/${this.usuari.id}`
            }
            let response = await fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            this.comanda = {
                id: jsonResponse[0].id,
                estat: jsonResponse[0].estat,
                productes: jsonResponse[0].llibres
            }
        },

        // USUARIS
        async registrarUsuari() {
            let jsonObject = {
                name: document.getElementById("nomRegistre").value,
                email: document.getElementById("correuRegistre").value,
                password: document.getElementById("passwordRegistre").value,
                password_confirmation: document.getElementById("password2Registre").value,
                telefon: document.getElementById("telefonRegistre").value
            }
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/registre"
            } else {
                url = '../../laravel-backend/public/api/registre'
            }

            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(jsonObject)
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
            } else {
                this.errorMsg = jsonResponse.message
            }
        },

        async iniciarSessio() {
            let jsonObject = {
                email: document.getElementById("correuIniciSessio").value,
                password: document.getElementById("passwordIniciSesio").value
            }
            console.log(jsonObject)
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/login"
            } else {
                url = '../../laravel-backend/public/api/login'
            }
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(jsonObject)
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
                this.getComandaPerUsuari()
            } else {
                this.errorMsg = jsonResponse.message
            }
        },

        async tancarSessio() {
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/logout"
            } else {
                url = '../../laravel-backend/public/api/logout'
            }
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${this.usuari.token}`
                },
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            this.usuari = null
            this.comanda = { productes: [] }
        },
        endevant() {
            if (this.indexLlibres < this.llibresFiltrats.length - this.llibresMostrats) {
                this.indexLlibres += this.llibresMostrats;
            }
        },
        enrere() {
            if (this.indexLlibres >= this.llibresMostrats) {
                this.indexLlibres -= this.llibresMostrats;
            }
        }
    }
}).mount('#app');
