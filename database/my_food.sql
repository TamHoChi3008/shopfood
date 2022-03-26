drop database myfood;
create database myfood CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use myfood;


CREATE TABLE `users` (
   id int(11) primary key NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
   phone_number varchar(15),
   `type` varchar(50)
);

insert into users  (username, password, phone_number, type) values ('admin', 'admin', '0971850845', 'admin') ;
insert into users  (username, password, phone_number, type) values ('minh', 'minh', '0783893956', 'user') ;
insert into users  (username, password, phone_number, type) values ('tam', 'tam', '0139874631', 'user') ;

create table food(
   food_id int not null primary key,
   food_name varchar(50),
   food_img varchar(50),
   food_price int,
   food_des varchar(50)
);
create table order_prod (
    id_ord int primary key NOT NULL AUTO_INCREMENT,
    username varchar(255) references users(username),
    food_id int(5) references food(food_id),
    food_name varchar(255),
    food_price double(5,2),
    item_quantity int(5),
    time_ord datetime
 );

 create table infor_user_ord (
    username varchar(255) references users(username),
    user varchar(255),
    address varchar(255),
    city varchar(65),
    email varchar(255)
);
/*-------------*/
insert into food value('10001','Barbecue salad','assets/img/plate1.png','22.00','Food');
insert into food value('10002','Salad with fish','assets/img/plate2.png','20.00','Food');
insert into food value('10003','Spinach salad','assets/img/plate3.png','18.00','Food');
insert into food value('10004','Burger','assets/img/menu-burger.jpg','29.00','Food');
insert into food value('10005','Pizza','assets/img/menu-pizza.jpg','32.00','Food');
insert into food value('10006','Momo','assets/img/menu-momo.jpg','40.00','Food');
insert into food value('20001','Coffee','assets/img/coffee.jpg','10.00','Drink');
insert into food value('10007','Food-1','assets/img/plate-1.png','30.00','Food');
insert into food value('10008','Food-2','assets/img/plate-2.png','45.00','Food');
insert into food value('10009','Food-3','assets/img/plate-3.png','38.00','Food');
insert into food value('10010','Food-4','assets/img/salad-table.jpg','27.00','Food');
insert into food value('10011','Food-5','assets/img/straw.png','13.00','Food');
insert into food value('20002','Ép dâu','assets/img/dau.jpg','10.00','Drink');
insert into food value('10012','Salmon','assets/img/salmon.jpg','13.00','Food');
insert into food value('10013','Salmon Sashimi','assets/img/salmon-sashimi.jpg','20.00','Food');
insert into food value('10014','Bun Thai','assets/img/BunThai.jpg','10.00','Food');
insert into food value('10015','Salmon Salad','assets/img/Salmon-salad.jpg','20.00','Food');
insert into food value('10016','Kimbap','assets/img/Kimbap.jpg','10.00','Food');
insert into food value('20003','Ice Cream','assets/img/IceCream.jpg','5.00','Drink');
insert into food value('10017','BeafSteak','assets/img/BeafSteak.jpg','30.00','Food');
insert into food value('20004','Lemond Soda','assets/img/soda.jpg','7.00','Drink');
insert into food value('20005','Cocktail','assets/img/Cocktail.jpg','12.00','Drink');
insert into food value('20006','Chocolate Ice Blended','assets/img/chocolate-iceblended.jpg','10.00','Drink');
insert into food value('20007','Rose Tea','assets/img/Rose-tea.jpg','5.00','Drink');