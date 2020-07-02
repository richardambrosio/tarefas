CREATE DATABASE tarefas;
USE tarefas;

CREATE TABLE anexos (
  id int(11) NOT NULL,
  tarefa_id int(11) NOT NULL,
  nome varchar(255) NOT NULL,
  arquivo varchar(255) NOT NULL
);

CREATE TABLE tarefas (
  id int(11) NOT NULL,
  nome varchar(20) NOT NULL,
  descricao text DEFAULT NULL,
  prazo date DEFAULT NULL,
  prioridade int(1) DEFAULT NULL,
  concluida tinyint(1) DEFAULT NULL
);

ALTER TABLE anexos
  ADD PRIMARY KEY (id),
  ADD KEY fk_idTarefa_anexos (tarefa_id);

ALTER TABLE tarefas
  ADD PRIMARY KEY (id);

ALTER TABLE anexos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE tarefas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

ALTER TABLE anexos
  ADD CONSTRAINT fk_idTarefa_anexos FOREIGN KEY (tarefa_id) REFERENCES tarefas (id);

GRANT ALL PRIVILEGES ON tarefas.* TO 'sistema_tarefas'@'localhost' IDENTIFIED BY 'sistema';