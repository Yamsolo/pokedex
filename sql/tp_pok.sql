CREATE TABLE Pokedex 
(
	idPokedex INT PRIMARY KEY NOT NULL,
	Nom VARCHAR(20),
	Taille FLOAT,
	Poids FLOAT,
	Legendaire BOOLEAN,
	AttaqueSpe VARCHAR(20),
	PV INT,
	idEsp INT NOT NULL REFERENCES Especes (idEsp)
);

CREATE TABLE Pokemon
(
	idNumero INT PRIMARY KEY NOT NULL,
	idPokedex INT,
	Niveau INT,
	Surnom VARCHAR(20)
);

CREATE TABLE Types
(
	idType INT PRIMARY KEY NOT NULL,
	PokeType VARCHAR(20)
);

CREATE TABLE Especes
(
	idEsp INT PRIMARY KEY NOT NULL,
	Espece VARCHAR(20)
);

CREATE TABLE TypesPokemon
(
	idPokedex INT NOT NULL PRIMARY KEY,
	idType INT  NOT NULL REFERENCES Types (idType)
);

INSERT INTO Pokedex (idPokedex, Nom, Taille, Poids, Legendaire,
  AttaqueSpe, PV, idEsp)
  VALUES
  ('4', 'Salameche', '0.6', '8.5', false, 'Flammèche', '39', '1'),
  ('6', 'Dracaufeu', '1.7', '90.5', false, 'Deflagration', '78', '1'),
  ('25', 'Pikachu', '0.4', '6', false, 'Tonnerre', 35, 2),
  ('144', 'artikodin', '1.7', '55.4', true, 'Laser Glace', '90', '3'),
  ('150', 'Mewtwo', '2', '122', true, 'Psyko', '106', '4'),
  ('132', 'Metamorph', '0.3', '4', false, 'Morphing', '48', '5'),
  ('146', 'Sulfura', '2', '60', true, 'Déflagration', '90', '1'),
  ('7', 'Carapuce', '0.5', '9', false, 'pistolet a o', '44', '6'),
  ('1', 'Bulbizarre', '0.7', '6.9', false, 'Vampigraine', '45', '7'),
  ('58', 'Caninos', '0.7', '19', false, 'Lance-flamme', '55', '8'),
  ('128', 'Tauros', '1.4', '88.4', false, 'Belier', '75', '9'),
  ('56', 'Ferosinge', '0.5', '28', false, 'poing-karaté', '40', '10'),
  ('95', 'Onix', '8.8', '210', false, 'Etreinte', '35', '11'),
  ('97', 'Hypnomade', '1.6', '75.6', false, 'Psyko', '85', '12'),
  ('145', 'Electhor', '1.6', '52.6', true, 'Fatal-foudre', '90', '17'),
  ('151', 'Mew', '0.4', '4', true, 'Psyko', '100', '16'),
  ('9', 'Tortank', '1.6', '85.5', false, 'hydrocanon', '79', '6'),
  ('8', 'Carabaffe', '1', '22.5', false, 'tour rapide', '59', '6'),
  ('1', 'Bulbizarre', '0.7', '6.9', false, 'Vampigraine', '45', '7'),
  ('59', 'Arcanin', '1.9', '155', false, 'Vit. Extreme', '90', '15'),
  ('57', 'Colossinge', '1', '32', false, 'Frappe Atlas', '65', '14'),
  ('16', 'roucoul', '0.3', '1.8', false, 'jet de sable', '40', '13');

INSERT INTO Types (idType, PokeType)
  VALUES
  ('1', 'Feu'),
  ('2', 'Vol'),
  ('3', 'Electrik'),
  ('4', 'Glace'),
  ('5', 'Psy'),
  ('6', 'Normal'),
  ('7', 'Eau'),
  ('8', 'plante'),
  ('9', 'Poison'),
  ('10', 'combat'),
  ('11', 'roche'),
  ('12', 'Sol'),
  ('13', 'psy'),
  ('14', 'vol'),
  ('15', 'eau'),
  ('16', 'Combat'),
  ('17', 'feu'),
  ('18', 'normal');

INSERT INTO Especes (idEsp, Espece)
  VALUES
  ('1', 'Flamme'),
  ('2', 'Souris'),
  ('3', 'Glaciaire'),
  ('4', 'Génétique'),
  ('5', 'Morphing'),
  ('6', 'Carapace'),
  ('7', 'Graine'),
  ('8', 'Chienfeu'),
  ('9', 'Buffle'),
  ('10', 'porsinge'),
  ('11', 'serpenroc'),
  ('12', 'Hypnose'),
  ('13', 'Oiseau'),
  ('14', 'Porsinge'),
  ('15', 'chienfeu'),
  ('16', 'Genetique'),
  ('17', 'Electrique');

INSERT INTO TypesPokemon (idPokedex, idType)
  VALUES
  ('4', '1'),
  ('6', '1'),
  ('6', '2'),
  ('25', '3'),
  ('144', '4'),
  ('144', '2'),
  ('150', '5'),
  ('132', '6'),
  ('146', '1'),
  ('146', '2'),
  ('7', '7'),
  ('1', '8'),
  ('1', '9'),
  ('58', '17'),
  ('128', '18'),
  ('56', '10'),
  ('95', '11'),
  ('95', '12'),
  ('97', '13'),
  ('145', '3'),
  ('145', '14'),
  ('151', '13'),
  ('9', '15'),
  ('8', '15'),
  ('59', '1'),
  ('57', '16'),
  ('16', '6'),
  ('16', '14');
