-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para homestead
DROP DATABASE IF EXISTS `homestead`;
CREATE DATABASE IF NOT EXISTS `homestead` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `homestead`;

-- Copiando estrutura para tabela homestead.alunos
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.alunos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `nome`, `situacao`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 'Lucas', 'on', NULL, '2019-08-06 19:01:57', '2019-08-06 19:01:58'),
	(2, 'thiago', 'off', NULL, '2019-08-06 19:11:34', '2019-08-06 19:11:34'),
	(8, 'Lucas Vilhena Rocha', NULL, NULL, '2019-08-06 22:43:58', '2019-08-06 22:43:58'),
	(9, 'Lucas Vilhena Rocha', NULL, NULL, '2019-08-06 22:44:42', '2019-08-06 22:44:42');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.aluno_turma_cursos
DROP TABLE IF EXISTS `aluno_turma_cursos`;
CREATE TABLE IF NOT EXISTS `aluno_turma_cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data_matricula` date NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `turma_id` bigint(20) unsigned NOT NULL,
  `curso_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_turma_cursos_aluno_id_foreign` (`aluno_id`),
  KEY `aluno_turma_cursos_turma_id_foreign` (`turma_id`),
  KEY `aluno_turma_cursos_curso_id_foreign` (`curso_id`),
  CONSTRAINT `aluno_turma_cursos_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `aluno_turma_cursos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `aluno_turma_cursos_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.aluno_turma_cursos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno_turma_cursos` DISABLE KEYS */;
INSERT INTO `aluno_turma_cursos` (`id`, `data_matricula`, `aluno_id`, `turma_id`, `curso_id`, `created_at`, `updated_at`) VALUES
	(1, '2019-08-06', 1, 1, 2, '2019-08-06 21:55:45', '2019-08-06 21:55:46'),
	(2, '2019-08-06', 2, 2, 4, '2019-08-06 22:08:18', '2019-08-06 22:08:19');
/*!40000 ALTER TABLE `aluno_turma_cursos` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.cursos
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.cursos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Curso A', '2019-08-06 21:50:58', '2019-08-06 21:50:58'),
	(2, 'Curso B', '2019-08-06 21:51:04', '2019-08-06 21:51:18'),
	(4, 'Curso C', '2019-08-06 21:51:27', '2019-08-06 21:51:27');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.enderecos
DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enderecos_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `enderecos_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.enderecos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` (`id`, `cep`, `logradouro`, `cidade`, `estado`, `bairro`, `numero`, `complemento`, `aluno_id`, `created_at`, `updated_at`) VALUES
	(1, '334000', 'alameda dos botanicos', 'lagoa santa', 'mg', 'lundceia', '625', 'ap 101', 1, '2019-08-06 19:02:33', '2019-08-06 19:02:34'),
	(2, '33400000', 'aquiles de lisboa ', 'lagoa santa', 'mg', 'lundceia', '289', 'casa', 2, '2019-08-06 19:12:02', '2019-08-06 19:12:03'),
	(4, '33400-000', 'Aquiles de Lisboa', 'lagoa santa', 'MG', 'lundceia', '289', 'casa', 8, '2019-08-06 22:43:58', '2019-08-06 22:43:58'),
	(5, '33400-000', 'Aquiles de Lisboa', 'lagoa santa', 'MG', 'lundceia', '289', 'casa', 9, '2019-08-06 22:44:42', '2019-08-06 22:44:42');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.migrations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(25, '2014_10_12_000000_create_users_table', 1),
	(26, '2014_10_12_100000_create_password_resets_table', 1),
	(27, '2019_08_06_033619_create_alunos_table', 1),
	(28, '2019_08_06_123706_create_cursos_table', 1),
	(29, '2019_08_06_140255_create_turmas_table', 1),
	(30, '2019_08_06_180517_create_enderecos_table', 1),
	(31, '2019_08_06_180834_create_aluno_turma_cursos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.turmas
DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.turmas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Turma A', '2019-08-06 21:51:35', '2019-08-06 21:51:35'),
	(2, 'Turma B', '2019-08-06 21:51:40', '2019-08-06 21:51:40');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;

-- Copiando estrutura para tabela homestead.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela homestead.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Lucas Vilhena Rocha', 'contato@lucasvilhena.com.br', NULL, '$2y$10$H/6yet.gx7aYwSV6UE.X5eBkEDOCBLOcNd/45Dptsa5hZNWtZ8aGy', NULL, '2019-08-06 21:49:09', '2019-08-06 21:49:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
