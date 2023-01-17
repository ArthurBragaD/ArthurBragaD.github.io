PRAGMA foreign_keys = OFF;
-- SELECT * FROM Funcionarios;
DROP TABLE IF EXISTS Funcionarios;
-- SELECT * FROM Noticias;
DROP TABLE IF EXISTS Noticias;
-- SELECT * FROM Carrousel;
DROP TABLE IF EXISTS Carrousel;
-- SELECT * FROM Edital;
DROP TABLE IF EXISTS Edital;
-- SELECT * FROM EditalArquivos;
DROP TABLE IF EXISTS EditalArquivos;
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
    id INTEGER NOT NULL UNIQUE,
    titulo TEXT NOT NULL,
    descricao TEXT NOT NULL,
    hora DATE NOT NULL, 
    autor TEXT,
    sympla TEXT,
    secoes TEXT,
    imagem BLOB,
    localizado TEXT,
    PRIMARY KEY (id)
    );
    CREATE TABLE Carrousel(
    id INTEGER NOT NULL UNIQUE,
    link TEXT,
    imagem BLOB,
    localizado TEXT,
    PRIMARY KEY (id)
    );

    CREATE TABLE Edital(
    idEdital INTEGER NOT NULL,
    edital TEXT NOT NULL,
    PRIMARY KEY(idEdital)
    );
     CREATE TABLE EditalArquivos(
    idArquivo INTEGER NOT NULL,
    nome TEXT NOT NULL,
    hora TEXT NOT NULL,
    tipo TEXT NOT NULL,
    arquivo BLOB NOT NULL,
    localizado TEXT NOT NULL,
    editalRelacionado NOT NULL,
    PRIMARY KEY (idArquivo),
    FOREIGN KEY (editalRelacionado) REFERENCES Edital(idEdital) ON DELETE CASCADE
    );

INSERT INTO Edital (edital) VALUES ("Aldir Blanc Chamada Pública Nº01/2020");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Espaços Culturais","00-00-0000","andamento",'EditalEspaçosCulturais.pdf','../upload/EditalEspaçosCulturais.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","baixar",'RETIFICAÇÃONº1.pdf','../upload/RETIFICAÇÃONº1.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista De Homologação Parcial","00-00-0000","baixar",'ListaDeHomologaçãoParcial.pdf','../upload/ListaDeHomologaçãoParcial.pdf',"1");
-- INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","baixar",'RETIFICAÇÃONº1.pdf','../upload/RETIFICAÇÃONº1.pdf',"1");
-- INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","baixar",'RETIFICAÇÃONº1.pdf','../upload/RETIFICAÇÃONº1.pdf',"1");



INSERT INTO Funcionarios VALUES ("arthur","arthurbragadutra@gmail.com","arthur","arthur braga dutra","05204074074");
INSERT INTO Carrousel (link,imagem,localizado) VALUES ("",'Banner2000x500.png','../upload/Banner2000x500.png');

SELECT * FROM FUNCIONARIOS;

INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","2023-01-02","teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.",CURRENT_DATE,"teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
SELECT * FROM Noticias;
