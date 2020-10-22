CREATE TABLE `admin_whitelist` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin_whitelist`
--

INSERT INTO `admin_whitelist` (`id`, `username`, `password`) VALUES
(1, 'redven', '3c4ae26dad3a3e0e05b250857b2da911f5637c74');


CREATE TABLE `users_whitelist` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_whitelist`
--

CREATE TABLE `whitelist` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `discord_id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Index pour la table `admin_whitelist`
--
ALTER TABLE `admin_whitelist`
  ADD PRIMARY KEY (`id`);


--
-- Index pour la table `users_whitelist`
--
ALTER TABLE `users_whitelist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT pour la table `admin_whitelist`
--
ALTER TABLE `admin_whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users_whitelist`
--
ALTER TABLE `users_whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;