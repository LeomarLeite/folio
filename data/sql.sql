CREATE TABLE contact (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(30),
	link TEXT(255),
	linl_title TEXT(30),
	icon TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE skill (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(30),
	`level` TEXT(30),
	`group` TEXT(30),
	icon TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE menu (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(30),
	link TEXT(255),
	icon TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE project (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(30),
	descripition TEXT,
	link_github TEXT(255),
	title_link_github TEXT(255),
	link_demo TEXT(255),
	title_link_demo TEXT(255),
	tag_techonogies TEXT(255), -- Armazenará as tags como uma string separada por vírgulas ex: 'PHP','Laravel','MySQL'
	picture TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE recommendation (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	neme TEXT(30),
	`position` TEXT(30), -- Armazenará o cargo de trabalho 
	company TEXT(30),
	`text` TEXT,
	avatar TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE service (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(30),
	itens TEXT,
	icon TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);

CREATE TABLE about (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title TEXT(120),
	subtitle TEXT(255),
	about TEXT,
	avatar TEXT(255),
	active INTEGER DEFAULT (1) CHECK (active IN (0, 1, NULL)),
	display_order INTEGER
);