CREATE TABLE IF NOT EXISTS `_players` (
  `player` varchar(256) NOT NULL,
  `x` int(200) NOT NULL,
  `y` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `_blocks` (
  `c` varchar(256) NOT NULL,
  `x` int(200) NOT NULL,
  `y` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
