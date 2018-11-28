----------------------------------------
-- Populate Relations
----------------------------------------

insert into categoria values('Peixes');
insert into categoria values('Carnes');
insert into categoria values('Frutas');
insert into categoria values('Bebidas');
insert into categoria values('Peixes Frescos');
insert into categoria values('Peixes Frescos de Mar');
insert into categoria values('Peixes Congelados');
insert into categoria values('Carnes Frescas');
insert into categoria values('Carnes Congeladas');
insert into categoria values('Peras');
insert into categoria values('Aguas');
insert into categoria values('Sumos');

insert into categoria_simples values('Peixes Frescos de Mar');
insert into categoria_simples values('Peixes Congelados');
insert into categoria_simples values('Carnes Frescas');
insert into categoria_simples values('Carnes Congeladas');
insert into categoria_simples values('Peras');
insert into categoria_simples values('Sumos');
insert into categoria_simples values('Aguas');

insert into super_categoria values('Peixes Frescos');
insert into super_categoria values('Peixes');
insert into super_categoria values('Carnes');
insert into super_categoria values('Frutas');
insert into super_categoria values('Bebidas');


insert into constituida values('Peixes', 'Peixes Congelados');
insert into constituida values('Peixes', 'Peixes Frescos');
insert into constituida values('Peixes Frescos', 'Peixes Frescos de Mar');
insert into constituida values('Carnes', 'Carnes Congeladas');
insert into constituida values('Carnes', 'Carnes Frescas');
insert into constituida values('Frutas', 'Peras');
insert into constituida values('Bebidas', 'Aguas');
insert into constituida values('Bebidas', 'Sumos');

insert into fornecedor values(276234567, 'Joao');
insert into fornecedor values(276234568, 'Pedro');
insert into fornecedor values(276234578, 'Francisco');
insert into fornecedor values(276234569, 'Miguel');
insert into fornecedor values(276234572, 'Nogueira');
insert into fornecedor values(276234573, 'Pedrosa');
insert into fornecedor values(276234574, 'Mariana');
insert into fornecedor values(276234570, 'Helio');
insert into fornecedor values(276234571, 'Jose');
insert into fornecedor values(276234575, 'Luis');
insert into fornecedor values(276234576, 'Paulo');
insert into fornecedor values(276234577, 'Manuel');


insert into produto values(1234567890123, 'Pera Rocha', 'Peras', 276234567, '2017-07-08');
insert into produto values(1234567890124, 'Robalo', 'Peixes Frescos', 276234567, '2017-07-08');
insert into produto values(1234567890125, 'Picanha', 'Carnes Frescas', 276234568, '2017-07-09');
insert into produto values(1234567890126, 'Bife de Vitela', 'Carnes Frescas', 276234567, '2017-07-08');
insert into produto values(1234567890127, 'Carne picada', 'Carnes Congeladas', 276234567, '2017-07-08');
insert into produto values(1234567890128, 'Bacalhau', 'Peixes Congelados', 276234567, '2017-07-08');
insert into produto values(1234567890129, 'Ice-Tea', 'Sumos', 276234576, '2017-07-10');
insert into produto values(1234567890130, 'Coca-Cola', 'Sumos', 276234575, '2017-07-10');
insert into produto values(1234567890131, 'Agua luso', 'Aguas', 276234570, '2017-07-15');
insert into produto values(1234567890132, 'Agua das pedras', 'Aguas', 276234571, '2017-07-16');


insert into fornece_sec values(276234567, 1234567890123);
insert into fornece_sec values(276234568, 1234567890124);
insert into fornece_sec values(276234567, 1234567890125);
insert into fornece_sec values(276234568, 1234567890123);
insert into fornece_sec values(276234569, 1234567890123);
insert into fornece_sec values(276234570, 1234567890123);
insert into fornece_sec values(276234571, 1234567890123);
insert into fornece_sec values(276234572, 1234567890123);
insert into fornece_sec values(276234573, 1234567890123);
insert into fornece_sec values(276234574, 1234567890123);
insert into fornece_sec values(276234575, 1234567890123);
insert into fornece_sec values(276234576, 1234567890123);
insert into fornece_sec values(276234577, 1234567890123);
insert into fornece_sec values(276234578, 1234567890123);
insert into fornece_sec values(276234568, 1234567890125);
insert into fornece_sec values(276234569, 1234567890125);
insert into fornece_sec values(276234570, 1234567890125);
insert into fornece_sec values(276234571, 1234567890125);
insert into fornece_sec values(276234572, 1234567890125);
insert into fornece_sec values(276234573, 1234567890125);
insert into fornece_sec values(276234574, 1234567890125);
insert into fornece_sec values(276234575, 1234567890125);
insert into fornece_sec values(276234576, 1234567890125);
insert into fornece_sec values(276234577, 1234567890125);
insert into fornece_sec values(276234575, 1234567890129);
insert into fornece_sec values(276234572, 1234567890130);
insert into fornece_sec values(276234570, 1234567890131);
insert into fornece_sec values(276234576, 1234567890132);

insert into corredor values(1, 10.0);
insert into corredor values(2, 10.0);
insert into corredor values(3, 12.0);
insert into corredor values(4, 8.0);
insert into corredor values(5, 10.0);
insert into corredor values(6, 9.0);
insert into corredor values(7, 15.0);
insert into corredor values(8, 8.5);
insert into corredor values(9, 1.0);
insert into corredor values(10, 3.0);

insert into prateleira values(1, 'E', 'S');
insert into prateleira values(1, 'E', 'M');
insert into prateleira values(2, 'D', 'S');
insert into prateleira values(3, 'D', 'C');
insert into prateleira values(4, 'E', 'M');
insert into prateleira values(4, 'E', 'S');
insert into prateleira values(5, 'D', 'S');
insert into prateleira values(6, 'D', 'C');
insert into prateleira values(7, 'D', 'C');
insert into prateleira values(8, 'D', 'C');
insert into prateleira values(9, 'E', 'M');
insert into prateleira values(10, 'E', 'S');

insert into planograma values(1234567890125, 1, 'E', 'S', 1, 100, 1);
insert into planograma values(1234567890124, 2, 'D', 'S', 1, 15, 1);
insert into planograma values(1234567890125, 3, 'D', 'C', 1, 10, 1);
insert into planograma values(1234567890125, 4, 'E', 'S', 1, 100, 2);
insert into planograma values(1234567890126, 5, 'D', 'S', 1, 150, 3);
insert into planograma values(1234567890127, 6, 'D', 'C', 1, 200, 4);
insert into planograma values(1234567890128, 7, 'D', 'C', 1, 1000, 5);
insert into planograma values(1234567890129, 8, 'D', 'C', 1, 150, 6);
insert into planograma values(1234567890130, 9, 'E', 'M', 1, 100, 7);

insert into evento_reposicao values('Pedro', '2017-07-08 12:49:00');
insert into evento_reposicao values('Francisco', '2017-07-08 12:50:30');
insert into evento_reposicao values('Joao', '2017-07-08 12:51:30');
insert into evento_reposicao values('Pedro', '2017-07-12 16:49:00');
insert into evento_reposicao values('Joao', '2017-07-11 17:51:30');
insert into evento_reposicao values('Francisco', '2017-07-23 12:50:30');
insert into evento_reposicao values('Joao', '2017-07-14 14:51:30');
insert into evento_reposicao values('Pedro', '2017-07-09 12:49:00');
insert into evento_reposicao values('Francisco', '2017-07-10 12:50:30');

insert into reposicao values(1234567890124, 2, 'D', 'S', 'Pedro', '2017-07-08 12:49:00', 15);
insert into reposicao values(1234567890125, 3, 'D', 'C', 'Joao', '2017-07-08 12:51:30', 10);
insert into reposicao values(1234567890125, 1, 'E', 'S', 'Francisco', '2017-07-08 12:50:30', 100);
insert into reposicao values(1234567890128, 7, 'D', 'C', 'Pedro', '2017-07-12 16:49:00', 1000);
insert into reposicao values(1234567890130, 9, 'E', 'M', 'Joao', '2017-07-11 17:51:30', 100);
insert into reposicao values(1234567890129, 8, 'D', 'C', 'Francisco', '2017-07-23 12:50:30', 150);
insert into reposicao values(1234567890127, 6, 'D', 'C', 'Joao', '2017-07-14 14:51:30', 200);
insert into reposicao values(1234567890126, 5, 'D', 'S', 'Pedro', '2017-07-09 12:49:00', 150);
insert into reposicao values(1234567890124, 2, 'D', 'S', 'Francisco', '2017-07-10 12:50:30', 15);



