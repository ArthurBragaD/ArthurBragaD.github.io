PRAGMA foreign_keys = OFF;
DROP TABLE IF EXISTS Funcionarios;
PRAGMA foreign_keys = ON;

CREATE TABLE Funcionarios (
    user TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    nomeReal TEXT NOT NULL UNIQUE,
    cpf TEXT NOT NULL UNIQUE
);


INSERT INTO Funcionarios VALUES ("a","aa","a","a","a");

SELECT * FROM FUNCIONARIOS;