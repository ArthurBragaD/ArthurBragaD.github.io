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

INSERT INTO Edital (edital,descricao) VALUES ("Aldir Blanc Chamada Pública Nº01/2020","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Espaços Culturais","00-00-0000","baixar",'EditalEspaçosCulturais.pdf','../upload/EditalEspaçosCulturais.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","andamento",'RETIFICAÇÃONº1.pdf','../upload/RETIFICAÇÃONº1.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista De Homologação Parcial","00-00-0000","andamento",'ListaDeHomologaçãoParcial.pdf','../upload/ListaDeHomologaçãoParcial.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista Final De Homologação","00-00-0000","andamento",'ListaFinalDeHomologação.pdf','../upload/ListaFinalDeHomologação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Resultado Parcial De Habilitação","00-00-0000","andamento",'ResultadoParcialDeHabilitação.pdf','../upload/ResultadoParcialDeHabilitação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Resultado Final De Habilitação","00-00-0000","andamento",'ResultadoFinalDeHabilitação.pdf','../upload/ResultadoFinalDeHabilitação.pdf',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo I - Anuencia Representação De Grupo","00-00-0000","baixar",'AnexoI-AnuenciaRepresentaçãoDeGrupo.docx','../upload/AnexoI-AnuenciaRepresentaçãoDeGrupo.docx',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo II - Declaração De Contrapartida","00-00-0000","baixar",'AnexoII-DeclaraçãoDeContrapartida.docx','../upload/AnexoII-DeclaraçãoDeContrapartida.docx',"1");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Planilha De Gastos","00-00-0000","baixar",'PlanilhaDeGastos.docx','../upload/PlanilhaDeGastos.docx',"1");

INSERT INTO Edital (edital,descricao) VALUES ("Aldir Blanc Chamada Pública Nº02/2020","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("EDITAl INCISO III - PREMIAÇÕS","00-00-0000","baixar",'CP21 EDITAl INCISO III - PREMIAÇÕS.pdf','../upload/CP21 EDITAl INCISO III - PREMIAÇÕS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","andamento",'CP22 RETIFICAÇÃO Nº1.pdf','../upload/CP22 RETIFICAÇÃO Nº1.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº2","00-00-0000","andamento",'CP23 RETIFICAÇÃO Nº2.pdf','../upload/CP23 RETIFICAÇÃO Nº2.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº3","00-00-0000","andamento",'CP24 RETIFICAÇÃO Nº3.pdf','../upload/CP24 RETIFICAÇÃO Nº3.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA PARCIAL DE HOMOLOGADOS","00-00-0000","andamento",'CP25 LISTA PARCIAL DE HOMOLOGADOS.pdf','../upload/CP25 LISTA PARCIAL DE HOMOLOGADOS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA FINAL DE HOMOLOGADOS","00-00-0000","andamento",'CP26 LISTA FINAL DE HOMOLOGADOS.pdf','../upload/CP26 LISTA FINAL DE HOMOLOGADOS.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("SELEÇÃO RESULTADO PARCIAL","00-00-0000","andamento",'CP27 SELEÇÃO RESULTADO PARCIAL.pdf','../upload/CP27 SELEÇÃO RESULTADO PARCIAL.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("SELEÇÃO RESULTADO FINAL","00-00-0000","andamento",'CP28 SELEÇÃO RESULTADO FINAL.pdf','../upload/CP28 SELEÇÃO RESULTADO FINAL.pdf',"2");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO II - AUTODECLARAÇÃO COTISTA","00-00-0000","baixar",'CP29 ANEXO II - AUTODECLARAÇÃO COTISTA.docx','../upload/CP29 ANEXO II - AUTODECLARAÇÃO COTISTA.docx',"2");

INSERT INTO Edital (edital,descricao) VALUES ("Aldir Blanc Chamada Pública Nº03/2020","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("EDITAL INCISO III - FOMENTO E FORMAÇÃO","00-00-0000","baixar",'EDITAL INCISO III - FOMENTO E FORMAÇÃO.pdf','../upload/C31 EDITAL INCISO III - FOMENTO E FORMAÇÃO.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº1","00-00-0000","andamento",'CP32 RETIFICAÇÃO Nº1.pdf','../upload/C32 RETIFICAÇÃO N º1.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº2","00-00-0000","andamento",'CP33 RETIFICAÇÃO Nº2.pdf','../upload/C33 RETIFICAÇÃO Nº2.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA PARCIAL DE HOMOLOGAÇÕES","00-00-0000","andamento",'CP34  LISTA PARCIAL DE HOMOLOGAÇÕES.pdf','../upload/C34 LISTA PARCIAL DE HOMOLOGAÇÕES.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("LISTA FINAL DE HOMOLOGAÇÕES","00-00-0000","andamento",'CP35  LISTA FINAL DE HOMOLOGAÇÕES.pdf','../upload/C35 LISTA FINAL DE HOMOLOGAÇÕES.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação Nº3","00-00-0000","andamento",'CP36 RETIFICAÇÃO Nº3.pdf','../upload/C36 RETIFICAÇÃO Nº3.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("RESULTADO PARCIAL","00-00-0000","andamento",'CP37 RESULTADO PARCIAL.pdf','../upload/C37 RESULTADO PARCIAL.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("RESULTADO FINAL","00-00-0000","andamento",'CP38 RESULTADO FINAL.pdf','../upload/C38 RESULTADO FINAL.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("CONVOCAÇÃO DE SUPLÊNCIA.","00-00-0000","andamento",'CP39 CONVOCAÇÃO DE SUPLÊNCIA.pdf','../upload/C39 CONVOCAÇÃO DE SUPLÊNCIA.pdf',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO","00-00-0000","baixar",'C3ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO.docx','../upload/C3ANEXO 1 ANUENCIA REPRETAÇÃO DE GRUPO.docx',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO II - AUTODECLARAÇÃO COTISTA","00-00-0000","baixar",'C3ANEXO II - AUTODECLARAÇÃO COTISTA.docx','../upload/C3ANEXO II - AUTODECLARAÇÃO COTISTA.docx',"3");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("ANEXO III - PROPOSTA DE PROJETO","00-00-0000","baixar",'C3ANEXO III - PROPOSTA DE PROJETO.docx','../upload/C3ANEXO III - PROPOSTA DE PROJETO.docx',"3");

INSERT INTO Edital (edital,descricao) VALUES ("Chamada Pública nº 05/2019 - Programa Municipal de Fomento e Incentivo à Arte e à Cultura (PROCULTURA)","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Projetos Selecionados","18-11-2019","andamento",'Lista de Projetos Selecionados.pdf','../upload/Lista de Projetos Selecionados.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Cronograma de Defesa dos Projetos","07-11-2019","andamento",'Cronograma de Defesa dos Projetos.pdf','../upload/Cronograma de Defesa dos Projetos.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação nº02","01-11-2019","andamento",'PCRetificação nº02.pdf','../upload/PCRetificação nº02.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Resultado dos Recursos","17-10-2019","andamento",'PCLista de Resultado dos Recursos.pdf','../upload/PCLista de Resultado dos Recursos.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Habilitados/Segmento","16-10-2019","andamento",'PCLista de HabilitadosSegmento.pdf','../upload/PCLista de HabilitadosSegmento.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Propostas Habilitadas e Inabilitadas","26-09-2019","andamento",'PCLista de Propostas Habilitadas e Inabilitadas.pdf','../upload/PCLista de Propostas Habilitadas e Inabilitadas.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Termo Aditivo ao Edital nº05/2019","13-09-2019","andamento",'PCTermo Aditivo ao Edital nº052019.pdf','../upload/PCTermo Aditivo ao Edital nº052019.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação nº01","19-08-2019","andamento",'PCRetificação nº01.pdf','../upload/PCRetificação nº01.pdf',"4");


INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Manual de Aplicação de Marca","08-08-2019","baixar",'PCManual de Aplicação de Marca.doc','../upload/PCManual de Aplicação de Marca.doc',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Modelo de Carta de Anuência","08-08-2019","baixar",'PCModelo de Carta de Anuência.pdf','../upload/PCModelo de Carta de Anuência.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo VII Declaração de compromisso e responsabilidade","08-08-2019","baixar",'PCAnexo VII Declaração de compromisso e responsabilidade.pdf','../upload/PCAnexo VII Declaração de compromisso e responsabilidade.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo VI Modelo de Declaração  Negativa","08-08-2019","baixar",'PCAnexo VI Modelo de Declaração  Negativa.pdf','../upload/PCAnexo VI Modelo de Declaração  Negativa.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo V Modelo de Declaração de Idoneidade","08-08-2019","baixar",'PCAnexo V Modelo de Declaração de Idoneidade.pdf','../upload/PCAnexo V Modelo de Declaração de Idoneidade.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo IV Instrução Normativa sobre veiculação das marcas","08-08-2019","baixar",'PCAnexo IV Instrução Normativa sobre veiculação das marcas.pdf','../upload/PCAnexo IV Instrução Normativa sobre veiculação das marcas.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo III Instrução Normativa sobre Prestação de Contas Simplificada","08-08-2019","baixar",'PCAnexo III Instrução Normativa sobre Prestação de Contas Simplificada.pdf','../upload/PCAnexo III Instrução Normativa sobre Prestação de Contas Simplificada.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo II Requerimento da SECULT para ingresso no Protocolo","08-08-2019","baixar",'PCAnexo II Requerimento da SECULT para ingresso no Protocolo.pdf','../upload/PCAnexo II Requerimento da SECULT para ingresso no Protocolo.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo I Modelo de formulário de apresentação dos projetos","08-08-2019","baixar",'PCAnexo I Modelo de formulário de apresentação dos projetos.pdf','../upload/PCAnexo I Modelo de formulário de apresentação dos projetos.pdf',"4");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Edital nº05/2019 Programa Municipal de Fomento e Incentivo à Arte e à Cultura","08-08-2019","baixar",'PCEdital nº052019 Programa Municipal de Fomento e Incentivo à Arte e à Cultura.pdf','../upload/PCEdital nº052019 Programa Municipal de Fomento e Incentivo à Arte e à Cultura.pdf',"4");

INSERT INTO Edital (edital,descricao) VALUES ("Chamada Pública nº 04/2021 - Auxílio Emergencial da Cultura","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista Final de Homologações","11-02-2022","andamento",'CPECLista Final de Homologações.pdf','../upload/CPECLista Final de Homologações.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista Parcial de Homologação","09-02-2022","andamento",'CPECLista Parcial de Homologação.pdf','../upload/CPECLista Parcial de Homologação.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Homologação","18-02-2022","andamento",'CPECLista de Homologação.pdf','../upload/CPECLista de Homologação.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação nº02","04-01-2022","andamento",'CPECRetificação nº02.pdf','../upload/CPECRetificação nº02.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Retificação nº01","24-01-2022","andamento",'CPECRetificação nº01.pdf','../upload/CPECRetificação nº01.pdf',"5");

INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo II Declaração de Ausência de Renda","02-09-2021","baixar",'CPECAnexo II Declaração de Ausência de Renda.pdf','../upload/CPECAnexo II Declaração de Ausência de Renda.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo I Declaração  de Contemplação e Veracidade de Informação","02-09-2021","baixar",'CPECAnexo I Declaração  de Contemplação e Veracidade de Informação.pdf','../upload/CPECAnexo I Declaração  de Contemplação e Veracidade de Informação.pdf',"5");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Chamada Pública nº03/2021","02-09-2021","baixar",'CPECChamada Pública nº032021.pdf','../upload/CPECChamada Pública nº032021.pdf',"5");

INSERT INTO Edital (edital,descricao) VALUES ("Chamada Pública nº 03/2021 - Auxílio Emergencial do Esporte","Edital Concluído");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Lista de Homologações","15-09-2021","andamento",'CPEELista de Homologações.pdf','../upload/CPEELista de Homologações.pdf',"6");

INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Anexo I Declaração ","02-09-2021","baixar",'CPEEAnexo I Declaração.pdf','../upload/CPEEAnexo I Declaração.pdf',"6");
INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ("Chamada Pública nº03/2021","02-09-2021","baixar",'CPEEChamada Pública nº032021.pdf','../upload/CPEEChamada Pública nº032021.pdf',"6");


INSERT INTO Funcionarios VALUES ("arthur","arthurbragadutra@gmail.com","arthur","arthur braga dutra","05204074074");
INSERT INTO Carrousel (link,imagem,localizado) VALUES ("",'Banner2000x500.png','../upload/Banner2000x500.png');

SELECT * FROM FUNCIONARIOS;

INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","2023-01-02","teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ("Teatro municipal esta disponibilizando entrada gratuita nesse sabado.","Teatro municipal esta disponibilizando entrada gratuita nesse sabado. Teatro municipal esta disponibilizando entrada gratuita nesse sabado.",CURRENT_DATE,"teste","teste","teste",'DesignPlaceHolder.png','../upload/DesignPlaceholder.png');
SELECT * FROM Noticias;
