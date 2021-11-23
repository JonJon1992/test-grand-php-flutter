CREATE DATABASE test_php;
USE test_php;
CREATE TABLE tb_news
(
    id          BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title       TEXT               NOT NULL,
    notice      TEXT               NOT NULL,
    date_notice VARCHAR(10)        NOT NULL

);
CREATE TABLE tb_events
(
    id         BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title      VARCHAR(100)       NOT NULL,
    desc_event VARCHAR(100)       NOT NULL,
    date_event VARCHAR(20)        NOT NULL,
    hour_event VARCHAR(20)        NOT NULL

);
CREATE TABLE tb_users
(
    id    BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name  VARCHAR(200)       NOT NULL,
    email VARCHAR(30)        NOT NULL,
    pass  VARCHAR(60)        NOT NULL


);
CREATE TABLE tb_tokens
(
    id      BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userId  BIGINT             NOT NULL,
    token   VARCHAR(1000)      NOT NULL,
    refresh VARCHAR(1000)      NOT NULL,
    expired DATETIME           NOT NULL,
    FOREIGN KEY (userId)
);

INSERT INTO tb_news(title, notice, date_notice)
VALUES ('A franquia Fallout é recheada...',
        'A franquia Fallout é recheada com histórias bem interessantes e principalmente side-quests cheias de mistérios do início ao fim. Sabendo disso muitas das informações que existem nas side-quests não são exatamente explicadas e deixam muitas pontas soltas que nem sempre são respondidas.',
        '2021-11-20');
INSERT INTO tb_news(title, notice, date_notice)
VALUES ('Dólar tem mais chances de ir a R$ 7 do que a R$ 5, avalia Wells Fargo',
        '“Embora a regra fiscal possa estar intacta por enquanto, continuamos a acreditar que Bolsonaro buscará melhorar ainda mais as transferências monetárias à medida que as eleições se aproximam. À medida que a dívida e a trajetória fiscal do Brasil pioram com o tempo, acreditamos que o sentimento do mercado financeiro pode ficar negativo em relação ao Brasil e ao real brasileiro”, dizem os economistas.',
        '2021-11-21');
INSERT INTO tb_news(title, notice, date_notice)
VALUES ('Oficial! Solskjaer é demitido do Manchester United depois de goleada para o Watford',
        'No comunicado oficial da demissão, o time de Cristiano Ronaldo justificou que a decisão foi por causa dos resultados “desapontantes” das últimas semanas, mas frisando que isso não deve apagar todo o trabalho realizado pelo norueguês ao longo dos três últimos anos para “reconstruir as bases para um sucesso a longo-prazo”',
        '2021-11-21');
INSERT INTO tb_news(title, notice, date_notice)
VALUES ('Como seria o mundo se outras espécies humanas tivessem sobrevivido?',
        'Assim como acontece com qualquer outra adaptação complexa — uma asa de pássaro, uma cauda de baleia, nossos próprios dedos —, nossa humanidade evoluiu passo a passo, ao longo de milhões de anos.',
        '2021-10-20');
INSERT INTO tb_news(title, notice, date_notice)
VALUES ('Filhote de elefante morre após perder metade da tromba em armadilha de caçadores',
        'O filhote de um ano foi deixado para trás por seu bando quando ficou preso na armadilha e foi encontrado depois por moradores da cidade de Aceh Jaya. Após encontrarem o filhote, os moradores o levaram para uma entidade de conservação para que ele recebesse cuidados veterinário',
        '2021-08-20');
