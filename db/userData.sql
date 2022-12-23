PRAGMA foreign_keys = OFF;
DROP TABLE IF EXISTS Funcionarios;
SELECT * FROM Noticias;
DROP TABLE IF EXISTS Noticias;
PRAGMA foreign_keys = ON;

CREATE TABLE Funcionarios (
    user TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    nomeReal TEXT NOT NULL UNIQUE,
    cpf TEXT NOT NULL UNIQUE
);
CREATE TABLE Noticias(
    titulo TEXT NOT NULL,
    descricao TEXT NOT NULL,
    data DATETIME NOT NULL, 
    autor TEXT,
    sympla TEXT,
    imagem BLOB
    );


INSERT INTO Funcionarios VALUES ("a","aa","a","a","a");

SELECT * FROM FUNCIONARIOS;

INSERT INTO Noticias VALUES ("Teste","Teste",CURRENT_DATE,"teste","teste","teste.png");

SELECT * FROM Noticias;