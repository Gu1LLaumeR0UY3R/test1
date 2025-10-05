-- Attention : version mots de passe non chiffrés

INSERT INTO membre (id, nom, password, droit) VALUES
('M001', 'Alice','123','admin'),
('M002', 'Bob','123','dev'),
('M003', 'Charlie','123','dev'),
('M004', 'David','123','dev'),
('M005', 'Eve','123','dev'),
('M006', 'Frank','123','dev'),
('M007', 'Gina','123','dev'),
('M008', 'Harry','123','dev');

-- Insertion des projets
INSERT INTO projet (id, nom) VALUES
('P001', 'Projet A'),
('P002', 'Projet B'),
('P003', 'Projet C'),
('P004', 'Projet D'),
('P005', 'Projet E'),
('P006', 'Projet F'),
('P007', 'Projet G');



-- Insertion des contributions (exemples)
INSERT INTO contribution (membre_id, projet_id, duree) VALUES
('M001', 'P001', 10),
('M002', 'P002', 15),
('M003', 'P003', 8),
('M004', 'P001', 5),
('M005', 'P002', 20),
('M006', 'P004', 12),
('M007', 'P005', 25),
('M008', 'P006', 18),
('M001', 'P003', 7),
('M002', 'P004', 9),
('M003', 'P005', 11),
('M004', 'P006', 6),
('M005', 'P007', 14),
('M006', 'P001', 3),
('M007', 'P002', 17),
('M008', 'P003', 10);



INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P005', 6);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P005', 24);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P002', 9);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P004', 13);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P007', 17);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P005', 6);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P005', 13);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P004', 13);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P005', 13);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P005', 4);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P001', 8);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P002', 18);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P002', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M007', 'P003', 15);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P001', 7);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P005', 4);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P005', 17);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P004', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P006', 12);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P005', 6);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P006', 16);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P002', 10);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M007', 'P007', 17);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P001', 8);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P003', 20);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P007', 8);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P001', 17);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P007', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P005', 25);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P006', 20);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P006', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P001', 18);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P001', 8);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P004', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P005', 14);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P005', 22);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P004', 3);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P003', 25);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P006', 24);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P006', 6);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P003', 23);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P004', 1);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M001', 'P002', 5);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P002', 14);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P004', 7);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P007', 17);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P007', 24);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M005', 'P005', 15);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P005', 10);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M007', 'P002', 19);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P005', 23);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P002', 15);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M006', 'P003', 13);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P005', 8);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M008', 'P005', 18);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P005', 11);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M007', 'P003', 4);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M004', 'P006', 19);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M002', 'P007', 2);
INSERT INTO contribution (membre_id, projet_id, duree) VALUES ('M003', 'P006', 13);
