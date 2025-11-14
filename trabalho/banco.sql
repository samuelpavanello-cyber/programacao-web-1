
CREATE DATABASE trabalhosemestral;

CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    escala INTEGER NOT NULL CHECK (escala IN (5, 10)),
    ordem INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE respostas (
    id SERIAL PRIMARY KEY,
    pergunta_id INTEGER REFERENCES perguntas(id) ON DELETE CASCADE,
    nota INTEGER NOT NULL,
    feedback TEXT,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO perguntas (texto, escala, ordem) VALUES ('Que nota você daria pro estabelecimento?', 10, 1);
INSERT INTO perguntas (texto, escala, ordem) VALUES ('O que você acha do chefe?', 10, 2);
INSERT INTO perguntas (texto, escala, ordem) VALUES ('Qual a nota para a agilidade de nossos funcionários?', 10, 3);
INSERT INTO perguntas (texto, escala, ordem) VALUES ('Qual a nota que você daria para o atendimento?', 10, 4);