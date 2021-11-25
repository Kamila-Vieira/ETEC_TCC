``
  INSERT INTO `modulos` (`id`, `modulo`, `professorId`) VALUES  
    ('1', 'Desenho Artístico', '1'), 
    ('2', 'Mangá', '2'), 
    ('3', 'Ilustração', '1'), 
    ('4', 'HQ', '2'),
    ('5', 'Modelagem digital', '4'),
    ('6', 'Pintura Digital', '3');
``
<br /><br />
``
  INSERT INTO `alunos` (`id`, `nome`, `dataNascimento`, `telefoneCelular`, `rg`, `cpf`, `moduloId`, `dataInicioCurso`, `dataFinalCurso`) VALUES  
  ('1', 'João Macedo da Costa', '2000-04-13', '1111111111', '52545', '11111111111', '1', '2018-05-10', '2020-01-11'), 
  ('2', 'Maria Alice da Silva', '2002-02-13', '1111111111', '3463433', '11111183511', '1', '2018-05-10', '2020-01-11'), 
  ('3', 'Pedro Alvares', '2001-04-23', '1111111111', '43473-24', '18521111111', '1', '2018-05-10', '2020-01-11'), 
  ('4', 'Maria Joana Pedroso', '1998-07-14', '1111111111', '23523465', '111323111111', '1', '2018-05-10', '2020-01-11'),
  ('5', 'Ana Clara Lima', '2000-01-05', '1111111111', '4124124', '4224232634673', '1', '2018-05-10', '2020-01-11'),
  ('6', 'Joana da Silva', '2002-09-18', '1111111111', '6326246', '215413535235', '1', '2018-05-10', '2020-01-11'),
  ('7', 'Alice Silveira', '2005-02-03', '1111111111', '12314', '32523523525', '1', '2018-05-10', '2020-01-11');
``

"UPDATE `alunos` SET `nome` = 'João Macedo das Costas', `dataNascimento` = '2000-04-13', `telefoneCelular` = '1111111111', `rg` = '52545', 
      `cpf`= '11111111111', `moduloId` = '1', `dataInicioCurso` = '2018-05-10', `dataFinalCurso` = '2020-01-11' WHERE `id` ='1'"