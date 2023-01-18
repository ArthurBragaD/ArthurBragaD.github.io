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
    descricao TEXT,
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
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista Final De Homologação","00-00-0000","baixar",'ListaFinalDeHomologação.pdf','../upload/ListaFinalDeHomologação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Resultado Parcial De Habilitação","00-00-0000","baixar",'ResultadoParcialDeHabilitação.pdf','../upload/ResultadoParcialDeHabilitação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Resultado Final De Habilitação","00-00-0000","baixar",'ResultadoFinalDeHabilitação.pdf','../upload/ResultadoFinalDeHabilitação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo I - Anuencia Representação De Grupo","00-00-0000","andamento",'AnexoI-AnuenciaRepresentaçãoDeGrupo.docx','../upload/AnexoI-AnuenciaRepresentaçãoDeGrupo.docx',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo II - Declaração De Contrapartida","00-00-0000","andamento",'AnexoII-DeclaraçãoDeContrapartida.docx','../upload/AnexoII-DeclaraçãoDeContrapartida.docx',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Planilha De Gastos","00-00-0000","andamento",'PlanilhaDeGastos.docx','../upload/PlanilhaDeGastos.docx',"1");

INSERT INTO Edital (edital) VALUES ("Aldir Blanc Chamada Pública Nº02/2020");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("EDITAl INCISO III - PREMIAÇÕS","00-00-0000","andamento",'CP21 EDITAl INCISO III - PREMIAÇÕS.pdf','../upload/CP21 EDITAl INCISO III - PREMIAÇÕS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","baixar",'CP22 RETIFICAÇÃO Nº1.pdf','../upload/CP22 RETIFICAÇÃO Nº1.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº2","00-00-0000","baixar",'CP23 RETIFICAÇÃO Nº2.pdf','../upload/CP23 RETIFICAÇÃO Nº2.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº3","00-00-0000","baixar",'CP24 RETIFICAÇÃO Nº3.pdf','../upload/CP24 RETIFICAÇÃO Nº3.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA PARCIAL DE HOMOLOGADOS","00-00-0000","baixar",'CP25 LISTA PARCIAL DE HOMOLOGADOS.pdf','../upload/CP25 LISTA PARCIAL DE HOMOLOGADOS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA FINAL DE HOMOLOGADOS","00-00-0000","baixar",'CP26 LISTA FINAL DE HOMOLOGADOS.pdf','../upload/CP26 LISTA FINAL DE HOMOLOGADOS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("SELEÇÃO RESULTADO PARCIAL","00-00-0000","baixar",'CP27 SELEÇÃO RESULTADO PARCIAL.pdf','../upload/CP27 SELEÇÃO RESULTADO PARCIAL.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("SELEÇÃO RESULTADO FINAL","00-00-0000","baixar",'CP28 SELEÇÃO RESULTADO FINAL.pdf','../upload/CP28 SELEÇÃO RESULTADO FINAL.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO II - AUTODECLARAÇÃO COTISTA","00-00-0000","andamento",'CP29 ANEXO II - AUTODECLARAÇÃO COTISTA.docx','../upload/CP29 ANEXO II - AUTODECLARAÇÃO COTISTA.docx',"2");

INSERT INTO Edital (edital) VALUES ("Aldir Blanc Chamada Pública Nº03/2020");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("EDITAL INCISO III - FOMENTO E FORMAÇÃO","00-00-0000","andamento",'EDITAL INCISO III - FOMENTO E FORMAÇÃO.pdf','../upload/C31 EDITAL INCISO III - FOMENTO E FORMAÇÃO.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","baixar",'CP32 RETIFICAÇÃO Nº1.pdf','../upload/C32 RETIFICAÇÃO N º1.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº2","00-00-0000","baixar",'CP33 RETIFICAÇÃO Nº2.pdf','../upload/C33 RETIFICAÇÃO Nº2.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA PARCIAL DE HOMOLOGAÇÕES","00-00-0000","baixar",'CP34  LISTA PARCIAL DE HOMOLOGAÇÕES.pdf','../upload/C34 LISTA PARCIAL DE HOMOLOGAÇÕES.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA FINAL DE HOMOLOGAÇÕES","00-00-0000","baixar",'CP35  LISTA FINAL DE HOMOLOGAÇÕES.pdf','../upload/C35 LISTA FINAL DE HOMOLOGAÇÕES.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº3","00-00-0000","baixar",'CP36 RETIFICAÇÃO Nº3.pdf','../upload/C36 RETIFICAÇÃO Nº3.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("RESULTADO PARCIAL","00-00-0000","baixar",'CP37 RESULTADO PARCIAL.pdf','../upload/C37 RESULTADO PARCIAL.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("RESULTADO FINAL","00-00-0000","baixar",'CP38 RESULTADO FINAL.pdf','../upload/C38 RESULTADO FINAL.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("CONVOCAÇÃO DE SUPLÊNCIA.","00-00-0000","baixar",'CP39 CONVOCAÇÃO DE SUPLÊNCIA.pdf','../upload/C39 CONVOCAÇÃO DE SUPLÊNCIA.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO","00-00-0000","andamento",'C3ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO.docx','../upload/C3ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO.docx',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO II - AUTODECLARAÇÃO COTISTA","00-00-0000","andamento",'C3ANEXO II - AUTODECLARAÇÃO COTISTA.docx','../upload/C3ANEXO II - AUTODECLARAÇÃO COTISTA.docx',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO III - PROPOSTA DE PROJETO","00-00-0000","andamento",'C3ANEXO III - PROPOSTA DE PROJETO.docx','../upload/C3ANEXO III - PROPOSTA DE PROJETO.docx',"3");




INSERT INTO Funcionarios VALUES ("arthur","arthurbragadutra@gmail.com","arthur","arthur braga dutra","05204074074");
INSERT INTO Carrousel (link,imagem,localizado) VALUES ("",'Banner2000x500.png','../upload/Banner2000x500.png');

SELECT * FROM FUNCIONARIOS;

INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","2023-01-02","teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.",CURRENT_DATE,"teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
SELECT * FROM Noticias;
