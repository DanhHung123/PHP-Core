create table if not exists `Music` (
    `id` int(11) not null AUTO_INCREMENT,
    `name` varchar(100) not null,
    `author` varchar(255) not null,
    `year` int(10) not null,
    primary key (`id`)
    ) engine=InnoDB default charset=utf8 AUTO_INCREMENT =11;

insert into `Music` (`id`, `name`, `author`, `year`) values
                        (1, 'There are no one at all','Sơn Tùng MTP' , 2022),
                        (2, 'Bên trên tầng lầu', 'Tăng Duy Tân', 2022),
                        (3, 'Bắt cóc con tim', 'Lou Hoàng', 2022),
                        (4, 'ThichThich', 'Phương Ly', 2022),
                        (5, 'Hoa Bấy bì', 'T.R.I', 2022),
                        (6, 'Ngôi sao cô đơn', 'Jack-J97', 2022),
                        (7, 'Chạy khỏi thế giới này', 'Dalab, Phương Ly', 2022),
                        (8, 'Thiêu Thân', 'Bray, Sofia', 2022),
                        (9, 'Cơn đau', 'Wren Even', 2022),
                        (10, 'Vì mẹ anh bắt chia tay', 'Miu Lê, Karik', 2022);
