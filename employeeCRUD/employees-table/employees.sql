create table if not exists `employees` (
    `id` int(11) not null AUTO_INCREMENT,
    `name` varchar(100) not null,
    `address` varchar(255) not null,
    `salary` int(10) not null,
    primary key (`id`)
) engine=InnoDB default charset=latin1 AUTO_INCREMENT =4;


insert into `employees` (`id`, `name`, `address`, `salary`) values
(1, 'Roland Mendel', 'C/ Araquil, 67, Madrid', 5000),
(2, 'Victoria Ashworth', '35 King George, London', 6500),
(3, 'Martin Blank', '25 Rue Lauriston, Paris', 8000);