``
  CREATE SCHEMA IF NOT EXISTS `sgea` DEFAULT CHARACTER SET latin1; 
  USE `sgea`;
``<br/><br/>

``CREATE TABLE IF NOT EXISTS `coordenadores` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(150) NOT NULL,
    `senha` VARCHAR(150) NOT NULL,
    `nome` VARCHAR(150) NOT NULL,
    `dataNascimento` DATE NOT NULL,
    `telefoneCelular` VARCHAR(191) NOT NULL,
    `rg` VARCHAR(191) NOT NULL,
    `cpf` VARCHAR(15) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC)) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
``<br/><br/>

``CREATE TABLE IF NOT EXISTS `professores` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(150) NOT NULL,
    `dataNascimento` DATE NOT NULL,
    `telefoneCelular` VARCHAR(50) NOT NULL,
    `rg` VARCHAR(150) NOT NULL,
    `cpf` VARCHAR(15) NOT NULL,
    `login` VARCHAR(150) NOT NULL,
    `senha` VARCHAR(150) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC)) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;``<br/><br/>

``CREATE TABLE IF NOT EXISTS `modulos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`modulo` VARCHAR(150) NOT NULL,
	`professorId` INT(11) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `Modulos_professorId_fkey` (`professorId`) USING BTREE,
	CONSTRAINT `Modulos_professorId_fkey` FOREIGN KEY (`professorId`) REFERENCES `sgea`.`professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;``<br/><br/>

``CREATE TABLE IF NOT EXISTS `alunos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL,
	`dataNascimento` DATE NOT NULL,
	`telefoneCelular` VARCHAR(191) NOT NULL,
	`rg` VARCHAR(150) NOT NULL,
	`cpf` VARCHAR(15) NOT NULL,
	`moduloId` INT(11) NOT NULL,
	`dataInicioCurso` DATE NOT NULL,
	`dataFinalCurso` DATE NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `Alunos_moduloId_fkey` (`moduloId`) USING BTREE,
	CONSTRAINT `Alunos_moduloId_fkey` FOREIGN KEY (`moduloId`) REFERENCES `sgea`.`modulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) 
  ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
``<br/><br/>

``
  INSERT INTO `coordenadores` (`nome`, `dataNascimento`, `telefoneCelular`, `rg`, `cpf`, `login`, `senha`) VALUES  
  ('Marina Lima', '1998-12-03', '1111111111', '3463433', '114635512311', 'coordenador1', '123456');
``
<br /><br />

``
  INSERT INTO `professores` (`nome`, `dataNascimento`, `telefoneCelular`, `rg`, `cpf`, `login`, `senha`) VALUES  
  ('Marianaa Braga', '1998-12-03', '1111111111', '3463433', '114635512311', 'professor1', '123456'), 
  ('Pedro Alves', '1981-01-20', '1111111111', '43473-24', '18521111111', 'professor2', '123456'), 
  ('Marcelo da Costa', '1978-04-13', '1111111111', '52545', '11111111111', 'professor3', '123456'), 
  ('Maria Joana Pedroso', '1998-07-14', '1111111111', '23523465', '111323111111', 'professor4', '123456');
``
<br /><br />

``
  INSERT INTO `modulos` (`modulo`, `professorId`) VALUES  
    ('Desenho Artístico', 1), 
    ('Mangá', 2), 
    ('Ilustração', 1), 
    ('HQ', 2),
    ('Modelagem digital', 4),
    ('Pintura Digital', 3);
``
<br /><br />

``
  INSERT INTO `alunos` (`nome`, `dataNascimento`, `telefoneCelular`, `rg`, `cpf`, `moduloId`, `dataInicioCurso`, `dataFinalCurso`) VALUES  
  ('Maria Alice da Silva', '2002-02-13', '1111111111', '3463433', '11111183511', 1, '2018-05-10', '2020-01-11'), 
  ('Pedro Alvares', '2001-04-23', '1111111111', '43473-24', '18521111111', 1, '2018-05-10', '2020-01-11'), 
  ('João Macedo da Costa', '2000-04-13', '1111111111', '52545', '11111111111', 1, '2018-05-10', '2020-01-11'), 
  ('Maria Joana Pedroso', '1998-07-14', '1111111111', '23523465', '111323111111', 1, '2018-05-10', '2020-01-11'),
  ('Ana Clara Lima', '2000-01-05', '1111111111', '4124124', '4224232634673', 1, '2018-05-10', '2020-01-11'),
  ('Joana da Silva', '2002-09-18', '1111111111', '6326246', '215413535235', 1, '2018-05-10', '2020-01-11'),
  ('Alice Silveira', '2005-02-03', '1111111111', '12314', '32523523525', 1, '2018-05-10', '2020-01-11');
``
<br /><br />

