DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS user; 
CREATE TABLE IF NOT EXISTS messages (
                        id INTEGER PRIMARY KEY, 
                        title TEXT, 
                        message TEXT, 
                        time TEXT,
                        sender TEXT,
                        receiver TEXT);

CREATE TABLE IF NOT EXISTS user (
                        id INTEGER PRIMARY KEY, 
                        username TEXT, 
                        password TEXT, 
                        validity INTEGER,
                        role TEXT);
                        
INSERT INTO messages (title, message,time,sender) 
                VALUES ('Bienvenue','Bienvenue sur le site, ceci est un message de deployement',strftime('%Y-%m-%d %H:%M:%S', datetime('now')),'SERVER_MSG');

INSERT INTO messages (title, message,time,sender) 
                VALUES ("Besoin d'aide ?",'veuillez consulter le fichier README',strftime('%Y-%m-%d %H:%M:%S', datetime('now')),'SERVER_MSG');


INSERT INTO user (id, username, password, validity, role)
                VALUES ('0','admin','admin',1,'admin');
                
INSERT INTO user (id, username, password, validity, role)
                VALUES ('1','user','user',1,'user');
