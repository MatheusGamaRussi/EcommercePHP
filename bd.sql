create database db_loja_digital;
use db_loja_digital;

create table tb_modelo(
	cod_modelo int primary key auto_increment,
	desc_modelo varchar(25) not null
);

create table tb_marca(
	cod_marca int primary key auto_increment,
    nome_marca varchar(20) not null
);

create table tb_cordoamento(
	cod_corda int primary key auto_increment,
    tipo_corda varchar(25) not null
);

create table tb_guitarra(
	cod_guitarra int primary key auto_increment,
    cod_modelo int not null,
    cod_marca int not null,
    cod_corda int not null,
    nome varchar(100) not null,
    preco decimal (7, 2) not null,
    cor varchar(40) not null,
    desc_guitarra varchar(200) not null,
    num_cordas tinyint not null,
    corpo varchar(50) not null,
    braco varchar(50) not null,
    qt_estoque int not null,
    nome_imagem varchar(255) not null,
    qntd_posicoes_chave tinyint not null,
    alavanca enum ('S', 'N') not null,
    destaques_semana enum('S', 'N') not null,
    canhoto enum ('S', 'N') not null,
    constraint fk_modelo foreign key(cod_modelo) references tb_modelo(cod_modelo),
    constraint fk_marca foreign key(cod_marca) references tb_marca(cod_marca),
    constraint fk_corda foreign key(cod_corda) references tb_cordoamento(cod_corda)
);

create table tb_usuario(
	id_usuario int primary key auto_increment,
    nome varchar(200) not null,
    email varchar(200) not null,
    senha varchar(200) not null unique,
    usuario_status boolean not null,
    endereco varchar(80) not null,
    cidade varchar(30) not null,
    num_cep char(9) not null
);

insert into tb_usuario values
	(default, 'Matheus Gama', 'russipixelmon@gmail.com', 'GoGo_M4niac', 1, 'Rua Itaberaba, 69', 'São Paulo', 02500-780),
	(default, 'Gustavo Henrique', 'leagueoflegends@gmail.com', 'WW6rabaddon', 0, 'Rua Jaraguá, 24', 'São Paulo', 02500-000),
	(default, 'Daniel Biondi', 'carrosrapidos@gmail.com', 'nãomechamemdeMOONY', 0, 'Rua Iracema, 11', 'São Paulo', 07500-200);

insert into tb_guitarra values
	(default, 1, 2, 2, 'Tagima Signature Series EA PRO 3', 1350.00, 'Vermelha', 'Super recomendada para os que estão iniciando no aprendizado do instrumento! Esta guitarra conta com uma boa construção, e um timbre muito bom!', 6, 'Mogno', 'Mogno', 5, 'guitarra_1.png', 5, 'S', 'S', 'N'),
	(default, 4, 3, 2, 'Ibanez RG GIO GRGR131EX', 2100.00, 'Cinza', 'Um mustbuy caso você seja o cara do metal! Conta com 2 captadores Humbuckers para um som mais pesado!', 6, 'Choupo', 'Choupo', 10, 'guitarra_2.png', 5, 'S', 'S', 'N'),
	(default, 2, 1, 3, 'Strinberg LPS Series LPS230', 1100.00, 'Preto', 'Nada melhor como um som rústico de uma Les Paul. Contando com 2 Humbuckers e um corpo macisso, ele provêm um som bem aveludado e cheio, perfeito para metal e jazz!', 6, 'Tília', 'Tília', 4, 'guitarra_3.png', 3, 'N', 'N', 'N'),
	(default, 4, 2, 3, 'Tagima True Range', 4850.00, 'Cinza', 'Uma guitarra fora do usual, com suas 8 cordas, podendo chegar a alturas que uma guitarra convencional não consegue chegar. Super usada em Metal Progressivo', 8, 'Cedro', 'Cedro', 2, 'guitarra_4.png', 5, 'N', 'S', 'N'),
    (default, 2, 5, 2, 'Epiphone Modern Collection Les Paul Classic', 6440.00, 'Cherryburst', 'Uma clássica para os amantes de Rock and Roll! Som com muito corpo e que se destaca bastante.', 6, 'Mogno', 'Mogno', 4, 'guitarra_5.png', 3, 'N', 'S', 'N'),
	(default, 1, 4, 1, 'Fender Player Stratocaster', 7530.00, 'Sunburst', 'Caso você esteja procurando uma Stratocaster para fazer aquele Funk de qualidade, você encontrou!.', 6, 'Amieiro', 'Amieiro', 5, 'guitarra_6.png', 5, 'S', 'N', 'S'),
	(default, 3, 5, 3, 'Epiphone Modern SG Classic Worn P-90s', 5200.00, 'Verde', 'Para aqueles que estão na busca de um som pesado! Portando a cara do rock, está SG possui um timbre brilhante, porém volumoso, perfeito para quem curte os clássicos dos anos 80', 6, 'Mogno', 'Mogno', 2, 'guitarra_7.png', 3, 'N', 'N', 'N'),
	(default, 3, 5, 2, 'EpiPhone Sg 1961 Standard Aged Classic White', 16000.00, 'Branco', 'Guitarra Premium, portanto diversos tipos de regulagem que se adequem a sua banda! Perfeito para aqueles que querem levar seu som para o próximo nível', 6, 'Mahogany', 'Mahogany', 1, 'guitarra_8.png', 3, 'N', 'N', 'N'),
	(default, 1, 2, 2, 'Tagima TW Series TG-510', 16000.00, 'Dourado Metálico', 'Guitarra custo-benefício preferida dos iniciantes no instrumento! Excelente construção, contento 2 single coil e 1 humbucker, sendo super versátil.', 6, 'Tília', 'Tília', 10, 'guitarra_9.png', 5, 'S', 'S', 'N'),
	(default, 5, 5, 3, 'EpiPhone Flying V Ebony Vintage Inspired By Gibson', 8700.00, 'Preto', 'Para quem está a procura de uma guitarra que se destaque! Recomendável que se toque em pé para maior conforto..', 6, 'Mahogany', 'Mahogany', 1, 'guitarra_10.png', 3, 'N', 'N', 'N');
update tb_guitarra set qt_estoque = 0 where cod_guitarra = 29 or cod_guitarra = 30;

insert into tb_modelo values
	(default, 'Stratocaster'),
    (default, 'Les Paul'),
    (default, 'SG'),
    (default, 'Super Strato'),
    (default, 'Flying V');

insert into tb_marca values
	(default, 'Stringberg'),
    (default, 'Tagima'),
    (default, 'Ibanez'),
    (default, 'Fender'),
    (default, 'Epiphone');
    
insert into tb_cordoamento values
	(default, 'Roundwound'),
    (default, 'Flatwound'),
    (default, 'Halfwound');
    
select * from tb_guitarra;
select * from tb_modelo;
select * from tb_marca;
select * from tb_cordoamento;

create view vw_guitarra
as select
	tb_guitarra.cod_guitarra, 
    tb_modelo.desc_modelo,
    tb_marca.nome_marca,
    tb_cordoamento.tipo_corda,
    tb_guitarra.nome,
    tb_guitarra.preco,
    tb_guitarra.cor,
    tb_guitarra.desc_guitarra,
    tb_guitarra.num_cordas,
    tb_guitarra.corpo,
    tb_guitarra.braco,
    tb_guitarra.qt_estoque,
    tb_guitarra.nome_imagem,
    tb_guitarra.qntd_posicoes_chave,
    tb_guitarra.alavanca,
    tb_guitarra.destaques_semana,
    tb_guitarra.canhoto
from tb_guitarra 
	inner join tb_modelo on tb_guitarra.cod_modelo = tb_modelo.cod_modelo
    inner join tb_marca on tb_guitarra.cod_marca = tb_marca.cod_marca
    inner join tb_cordoamento on tb_guitarra.cod_corda = tb_cordoamento.cod_corda;
