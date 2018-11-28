drop table if exists reposicao cascade;
drop table if exists planograma cascade;
drop table if exists evento_reposicao cascade;
drop table if exists prateleira cascade;
drop table if exists corredor cascade;
drop table if exists fornece_sec cascade;
drop table if exists produto cascade;
drop table if exists fornecedor cascade;
drop table if exists constituida cascade;
drop table if exists super_categoria cascade;
drop table if exists categoria_simples cascade;
drop table if exists categoria cascade;


create table categoria(
  nome varchar(64) not null,

  primary key(nome)
);

create table categoria_simples(
  nome varchar(64) not null,

  primary key(nome),
  foreign key(nome)
    references categoria(nome)
    ON DELETE CASCADE
);

create table super_categoria(
  nome varchar(64) not null,

  primary key(nome),
  foreign key(nome)
    references categoria(nome)
    ON DELETE CASCADE
);

create table constituida(
  super_categoria varchar(64) not null,
  categoria varchar(64) not null,

  primary key(super_categoria, categoria),
  foreign key(super_categoria)
    references super_categoria(nome)
    ON DELETE CASCADE,
  foreign key(categoria)
    references categoria(nome)
    ON DELETE CASCADE,
  check(super_categoria != categoria)
);

create table fornecedor(
  nif numeric(9,0) not null,
  nome varchar(64) not null,
  primary key(nif),
  unique(nif,nome)
);

create table produto(
  ean numeric(13,0) not null,
  design varchar(64) not null,
  categoria varchar(64) not null,
  forn_primario numeric(9,0) not null,
  data date not null,

  primary key(ean),
  foreign key(categoria)
    references categoria(nome),
  foreign key(forn_primario)
    references fornecedor(nif)
);

create table fornece_sec(
  nif numeric(9,0) not null,
  ean numeric(13,0) not null,

  primary key(nif,ean),
  foreign key(nif)
    references fornecedor(nif)
    ON DELETE CASCADE,
  foreign key(ean)
    references produto(ean)
    ON DELETE CASCADE
);

create table corredor(
  nro integer not null,
  largura float not null,
  primary key(nro)
);

create table prateleira(
  nro integer not null,
  lado char(1) not null,
  altura char(1) not null,

  primary key(nro,lado,altura),
  foreign key(nro)
    references corredor(nro)
    ON DELETE CASCADE,
  check(lado in ('E', 'D')),
  check(altura in ('C', 'M', 'S'))
);

create table planograma(
  ean numeric(13,0) not null,
  nro integer not null,
  lado char(1) not null,
  altura char(1) not null,
  face integer not null,
  unidades integer not null,
  loc integer not null,

  primary key(ean,nro,lado,altura),
  foreign key(ean)
    references produto(ean)
    ON DELETE CASCADE,
  foreign key(nro,lado,altura)
    references prateleira(nro,lado,altura)
    ON DELETE CASCADE
);

create table evento_reposicao(
  operador varchar(64) not null,
  instante timestamp not null,
  primary key(operador,instante),
  check(instante <= CURRENT_TIMESTAMP)
);

create table reposicao(
  ean numeric(13,0) not null,
  nro integer not null,
  lado char(1) not null,
  altura char(1) not null,
  operador varchar(64) not null,
  instante timestamp not null,
  unidades integer not null,

  primary key(ean,nro,lado,altura,operador,instante),
  foreign key(ean,nro,lado,altura)
    references planograma(ean,nro,lado,altura)
    ON DELETE CASCADE,
  foreign key(operador,instante)
    references evento_reposicao(operador,instante));
