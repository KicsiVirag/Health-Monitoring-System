-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: db:3306
-- Létrehozás ideje: 2024. Máj 05. 16:52
-- Kiszolgáló verziója: 8.0.30
-- PHP verzió: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `HealthDatabase`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eatings`
--

CREATE TABLE `eatings` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `calories_morning` double NOT NULL,
  `calories_evening` double NOT NULL,
  `calories_noon` double NOT NULL,
  `medicine` varchar(25) DEFAULT NULL,
  `amount_of_liquid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `eatings`
--

INSERT INTO `eatings` (`id`, `event_id`, `calories_morning`, `calories_evening`, `calories_noon`, `medicine`, `amount_of_liquid`) VALUES
(1, 1, 600, 900, 500, 'C-vitamin', 4),
(2, 2, 2842, 915, 3032, 'Nurofen', 0),
(3, 3, 445, 1167, 2049, 'Nurofen', 1),
(4, 4, 1638, 2165, 3051, 'C-vitamin', 0),
(5, 5, 2292, 2036, 3014, 'Nurofen', 0),
(6, 6, 1818, 3040, 2427, 'Nurofen', 4),
(7, 7, 299, 3390, 284, 'Nurofen', 2),
(8, 8, 2733, 1312, 945, 'C-vitamin', 2),
(9, 9, 3218, 2190, 2071, 'C-vitamin', 2),
(10, 10, 3022, 34, 1819, 'Algoflex', 2),
(11, 11, 805, 3181, 3143, 'Nurofen', 1),
(12, 12, 3213, 32, 321, NULL, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_date` date NOT NULL,
  `event_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `events`
--

INSERT INTO `events` (`id`, `user_id`, `event_date`, `event_description`) VALUES
(1, 1, '2024-04-30', 'Napi edzés - futás, kondi'),
(2, 1, '1993-05-14', 'Fugiat ut aut beatae dicta.'),
(3, 1, '2017-08-27', 'Voluptates sunt necessitatibus tempore quia.'),
(4, 1, '1974-09-08', 'Praesentium et iure recusandae.'),
(5, 1, '1986-10-17', 'Dolores molestias vitae voluptatem rerum odio.'),
(6, 1, '1987-08-14', 'Et quae omnis distinctio.'),
(7, 1, '1982-08-19', 'Placeat voluptatibus ipsa praesentium et aliquid.'),
(8, 1, '1993-10-22', 'Et nisi recusandae voluptatem dolor est porro ex.'),
(9, 1, '2011-06-26', 'Maiores natus laudantium doloribus aut et.'),
(10, 1, '2011-11-05', 'Non amet aperiam aliquid ex nisi nostrum.'),
(11, 1, '1990-08-11', 'Consequatur fugit rerum itaque praesentium aut.'),
(12, 1, '2011-02-02', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `healths`
--

CREATE TABLE `healths` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `healths`
--

INSERT INTO `healths` (`id`, `user_id`, `weight`, `height`, `date`) VALUES
(1, 1, 56, 171, '2024-04-30'),
(2, 1, 85.45, 193.52, '1990-08-11'),
(3, 1, 45.98, 157.79, '2005-09-07'),
(4, 1, 83.23, 179.44, '1989-12-25'),
(5, 1, 54.46, 161.47, '2015-08-04'),
(6, 1, 71.88, 160.98, '2002-01-18'),
(7, 1, 75.52, 198.27, '1984-05-30'),
(8, 1, 56.29, 189.57, '1975-08-18'),
(9, 1, 94.23, 155.07, '2014-08-29'),
(10, 1, 97.25, 186.43, '2010-02-13'),
(11, 1, 58.58, 154.24, '1975-04-08');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `measures`
--

CREATE TABLE `measures` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `pulse` int NOT NULL,
  `blood_pressure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `measures`
--

INSERT INTO `measures` (`id`, `event_id`, `pulse`, `blood_pressure`) VALUES
(1, 1, 95, '120/77'),
(2, 2, 102, '117/79'),
(3, 3, 133, '117/81'),
(4, 4, 149, '118/78'),
(5, 5, 101, '121/79'),
(6, 6, 138, '119/78'),
(7, 7, 142, '119/79'),
(8, 8, 137, '121/78'),
(9, 9, 120, '120/79'),
(10, 10, 112, '119/79'),
(11, 11, 111, '120/77'),
(12, 12, 101, '117/80');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_22_113046_create_healths_table', 1),
(6, '2024_03_22_113117_create_events_table', 1),
(7, '2024_03_22_113135_create_eatings_table', 1),
(8, '2024_03_22_113151_create_trainings_table', 1),
(9, '2024_03_22_113211_create_sleeps_table', 1),
(10, '2024_03_22_113230_create_measures_table', 1),
(11, '2024_04_23_150145_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'token', '8b70c3f0546fcd6cb61d7ab5147043593b76736094dbd1f1cea8ecb7bc91f8d0', '[\"*\"]', '2024-05-05 16:23:31', NULL, '2024-05-05 16:01:34', '2024-05-05 16:23:31'),
(2, 'App\\Models\\User', 1, 'token', '4e7d5ab08ebd83e553273e6961aadb5df6c8b647275b4ad53794f5e4ce81864d', '[\"*\"]', '2024-05-05 16:40:29', NULL, '2024-05-05 16:40:26', '2024-05-05 16:40:29');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sleeps`
--

CREATE TABLE `sleeps` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `sleep_durration` time NOT NULL,
  `number_of_awaking` int DEFAULT NULL,
  `sleep_quality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `sleeps`
--

INSERT INTO `sleeps` (`id`, `event_id`, `sleep_durration`, `number_of_awaking`, `sleep_quality`) VALUES
(1, 1, '08:02:00', 2, 'Szendergés'),
(2, 2, '00:43:00', 7, 'Mély alvás'),
(3, 3, '11:35:00', 5, 'Mély alvás'),
(4, 4, '21:33:00', 2, 'Felszínes'),
(5, 5, '04:07:00', 6, 'Mély alvás'),
(6, 6, '17:09:00', 8, 'Szendergés'),
(7, 7, '02:50:00', 7, 'Felszínes'),
(8, 8, '18:57:00', 6, 'Álomalvás'),
(9, 9, '04:32:00', 1, 'Álomalvás'),
(10, 10, '23:53:00', 2, 'Mély alvás'),
(11, 11, '14:07:00', 8, 'Álomalvás'),
(12, 12, '03:03:00', 3, 'Mély alvás');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `number_of_steps` int NOT NULL,
  `training_intensity` varchar(255) NOT NULL,
  `training_durration` time NOT NULL,
  `training_type` varchar(25) NOT NULL,
  `training_location` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `trainings`
--

INSERT INTO `trainings` (`id`, `event_id`, `number_of_steps`, `training_intensity`, `training_durration`, `training_type`, `training_location`) VALUES
(1, 1, 6502, 'Közepes', '03:03:00', 'Futás', 'Futópálya'),
(2, 2, 2421, 'Alacsony', '15:19:00', 'Futás', 'Futópálya'),
(3, 3, 19756, 'Közepes', '00:41:00', 'Túrázás', 'Futópálya'),
(4, 4, 22886, 'Alacsony', '18:22:00', 'Úszás', 'Uszoda'),
(5, 5, 691, 'Intenzív', '04:45:00', 'Túrázás', 'Uszoda'),
(6, 6, 10551, 'Közepes', '09:14:00', 'Túrázás', 'Uszoda'),
(7, 7, 3583, 'Közepes', '14:11:00', 'Túrázás', 'Uszoda'),
(8, 8, 995, 'Intenzív', '05:12:00', 'Túrázás', 'Falmászóterem'),
(9, 9, 2287, 'Közepes', '05:08:00', 'Futás', 'Futópálya'),
(10, 10, 3169, 'Alacsony', '00:04:00', 'Futás', 'Falmászóterem'),
(11, 11, 18628, 'Alacsony', '04:14:00', 'Futás', 'Falmászóterem'),
(12, 12, 3223, 'Alacsony', '23:03:00', 'dwq', 'dwq');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `birth_date`, `gender`, `role`) VALUES
(1, 'TestUser', 'UserTest', 'Test@example.com', '2024-05-05 15:46:09', '$2y$12$J7/WV82vJhGjr4jfxfjNv.U25gCqsi57ZVKrKUMNAW4QApMc6jyRy', '7dfpjxxxAg', '1999-01-01', 'nő', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `eatings`
--
ALTER TABLE `eatings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eatings_event_id_foreign` (`event_id`);

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `healths`
--
ALTER TABLE `healths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `healths_user_id_foreign` (`user_id`);

--
-- A tábla indexei `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measures_event_id_foreign` (`event_id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `sleeps`
--
ALTER TABLE `sleeps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sleeps_event_id_foreign` (`event_id`);

--
-- A tábla indexei `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_event_id_foreign` (`event_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `eatings`
--
ALTER TABLE `eatings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `healths`
--
ALTER TABLE `healths`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `measures`
--
ALTER TABLE `measures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `sleeps`
--
ALTER TABLE `sleeps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `eatings`
--
ALTER TABLE `eatings`
  ADD CONSTRAINT `eatings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Megkötések a táblához `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `healths`
--
ALTER TABLE `healths`
  ADD CONSTRAINT `healths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `measures`
--
ALTER TABLE `measures`
  ADD CONSTRAINT `measures_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Megkötések a táblához `sleeps`
--
ALTER TABLE `sleeps`
  ADD CONSTRAINT `sleeps_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Megkötések a táblához `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
