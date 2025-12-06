# Sistema de Avaliação de Qualidade de Serviços Prestados

**Disciplina:** Programação Web 1  
**Aluno:** SAMUEL PAVANELLO FRARE  

---

## Descrição do Projeto

Sistema web desenvolvido para trabalho semestral de Avaliação de qualidade de serviços prestados em estabelecimentos comerciais. Permite que clientes avaliem anonimamente diferentes setores por meio de tablets, utilizando escala de 0 a 10 (ou 0 a 5).
**100% atendido conforme o PDF do trabalho.**

---

## Funcionalidades Implementadas

- Formulário de avaliação sempre visível na página inicial
- Perguntas carregadas dinamicamente do banco PostgreSQL
- Escala visual de 0 a 10 (ou 0 a 5) 
- Navegação entre perguntas com validação (obrigatório marcar uma nota)
- Campo de feedback adicional opcional
- Avaliação anônima
- Identificação de setor por tablet via parâmetro `?setor=ID`
- Painel administrativo com:
  - Autenticação
  - Cadastro, edição e exclusão de perguntas
  - Cadastro de setores
  - Dashboard com média por setor + gráfico de barras (Chart.js)
  - Tela de configuração de tablets com links prontos

---

## Tecnologias Utilizadas

- **Front-end:** HTML, CSS, JavaScript puro
- **Back-end:** PHP + PDO
- **Banco de dados:** PostgreSQL
- **Gráficos:** Chart.js (CDN)

---

## Como Configurar e Executar

1. **Coloque a pasta `trabalho` dentro do XAMPP**  
- Caminho: `C:\xampp\htdocs\trabalho\`

2. **Abra o XAMPP**  
- Ligue o **Apache**

3. **Crie o banco de dados**  
- Copie e cole todo o conteúdo do arquivo banco.sql no pgAdmin e execute

4. **Abrir no navegador**  
- Formulário de avaliação: http://localhost/trabalho/
- Painel Administrativo: http://localhost/trabalho/admin/
    Usuário: admin
    Senha: admin123
- Para acessar os diferentes tablets dos setores, acessar:
    Painel Administrativo >> Tablets