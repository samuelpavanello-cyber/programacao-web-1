
-- =============================================
-- BANCO DE DADOS - Trabalho Semestral (Programação Web 1)
-- =============================================

DROP TABLE IF EXISTS respostas CASCADE;
DROP TABLE IF EXISTS perguntas CASCADE;
DROP TABLE IF EXISTS setores CASCADE;
DROP TABLE IF EXISTS usuarios CASCADE;

-- Perguntas
CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    escala INTEGER NOT NULL CHECK (escala IN (5, 10)),
    ordem INTEGER NOT NULL DEFAULT 0
);

-- Setores
CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

-- Respostas
CREATE TABLE respostas (
    id SERIAL PRIMARY KEY,
    pergunta_id INTEGER NOT NULL REFERENCES perguntas(id) ON DELETE CASCADE,
    nota INTEGER NOT NULL CHECK (nota >= 0 AND nota <= 10),
    feedback TEXT,
    setor_id INTEGER NOT NULL REFERENCES setores(id),
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuários
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL
);

-- Perguntas (criadas por padrão)
INSERT INTO perguntas (texto, escala, ordem) VALUES
('Que nota você daria para o atendimento?', 10, 1),
('Como avalia a limpeza do ambiente?', 10, 2),
('Os funcionários foram presativos?', 10, 3),
('De 0 a 10 qual a chance de você voltar novamente?', 10, 4);

-- Setores / Tablets
INSERT INTO setores (nome) VALUES
('Recepção'),
('Caixa'),
('Vendas'),
('Estacionamento'),
('Geral');

-- Usuário admin padrão
INSERT INTO usuarios (login, senha) VALUES ('admin', 'admin123');

