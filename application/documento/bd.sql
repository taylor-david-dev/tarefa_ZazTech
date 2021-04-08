--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `dataHora` datetime DEFAULT NULL,
  `pessoa_id` int(11) NULL,
  `prioridade` int(11) NULL,
  `estado` int(11) NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarefa_pessoa_idx` (`pessoa_id`);
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
