PRAGMA foreign_keys = OFF;
SELECT * FROM Funcionarios;
DROP TABLE IF EXISTS Funcionarios;
SELECT * FROM Noticias;
DROP TABLE IF EXISTS Noticias;
PRAGMA foreign_keys = ON;

CREATE TABLE Funcionarios (
    user TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    senha TEXT NOT NULL,
    nomeReal TEXT NOT NULL UNIQUE,
    cpf TEXT NOT NULL UNIQUE,
    PRIMARY KEY (cpf)
);
CREATE TABLE Noticias(
    id INTEGER NOT NULL,
    titulo TEXT NOT NULL,
    descricao TEXT NOT NULL,
    hora DATE NOT NULL, 
    autor TEXT,
    sympla TEXT,
    secoes TEXT,
    imagem BLOB,
    PRIMARY KEY (id)
    );


INSERT INTO Funcionarios VALUES ("a","aa","a","a","11111111111");

SELECT * FROM FUNCIONARIOS;

INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.",CURRENT_DATE,"teste","teste","teste","teste.png");

SELECT * FROM Noticias;