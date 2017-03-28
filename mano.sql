SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `admin_users` (
  `id` int(100) NOT NULL,
  `admin_firstname` varchar(200) NOT NULL,
  `admin_lastname` varchar(200) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_gender` tinyint(3) NOT NULL,
  `admin_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE TABLE `admin_users`;
INSERT INTO `admin_users` (`id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_email`, `admin_password`, `admin_gender`, `admin_image`) VALUES
(4, 'John Robert', 'Jerodiaz', 'johnrobert', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '');

CREATE TABLE `admin_user_logs` (
  `id` int(100) NOT NULL,
  `admin_token` varchar(250) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `admin_created` date NOT NULL,
  `admin_modified` date NOT NULL,
  `admin_last_login` date NOT NULL,
  `admin_last_logout` date NOT NULL,
  `admin_status` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE TABLE `admin_user_logs`;
INSERT INTO `admin_user_logs` (`id`, `admin_token`, `admin_id`, `admin_created`, `admin_modified`, `admin_last_login`, `admin_last_logout`, `admin_status`) VALUES
(2, '3gFlah6pRdFObct73xzvhNrvvpPM2ZF5fkqqBxPtKviVHL3KjCfAqH6V7VI9UnfaIFAkdqOXV6TDSWnbzDMZlSVt', 4, '2017-03-27', '2017-03-28', '2017-03-28', '2017-03-28', 1);


ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin_user_logs`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `admin_user_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;