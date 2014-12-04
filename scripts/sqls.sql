-- Todos las columnas de una tabla
SELECT * FROM events;

-- Insert en una tabla
INSERT INTO events SET 
				start_date = '2014-10-1',
				end_date = '2014-10-2',
                headline = '55555556',
                text = 'asdasd',
                types_idtype = 2,
                users_iduser = 1;
 
 -- Update de una fila
 UPDATE events SET 
				text = 'kakakakaka'
	WHERE idevent = 2;
    
-- Delete de una fila
DELETE FROM events WHERE idevent = 4;

-- Consulta con where
SELECT idevent, headline, types_idtype FROM events
WHERE types_idtype = 2;

-- Insertar tags
INSERT INTO tags SET tag ='tag1';
INSERT INTO tags SET tag ='tag2';
INSERT INTO tags SET tag ='tag3';

-- Insertar eventos
INSERT INTO events_has_tags SET events_idevent = 2, tags_idtag = 1;
INSERT INTO events_has_tags SET events_idevent = 2, tags_idtag = 2;
INSERT INTO events_has_tags SET events_idevent = 2, tags_idtag = 3;

-- Eventos con tags separados por comas
SELECT headline, group_concat(tag) 
FROM events 
JOIN events_has_tags ON
idevent = events_idevent 
JOIN tags ON
idtag = tags_idtag
GROUP BY headline

-- Crear usuario php desde localhost
CREATE USER 'php'@'localhost' IDENTIFIED BY '1234';

-- Permisos sobre timeline desde localhost
GRANT ALL ON timeline.* TO 'php'@'localhost';









                

