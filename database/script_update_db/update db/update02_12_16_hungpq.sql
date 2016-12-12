
INSERT INTO academic_programs ( id, name, time_study) VALUES (0, "CNTT", "4");
INSERT INTO academic_programs ( id, name, time_study) VALUES (2, "CNTT (CLC)", "4");
INSERT INTO academic_programs ( id, name, time_study) VALUES (3, "CNTT (CA)", "4");
INSERT INTO academic_programs ( id, name, time_study) VALUES (4, "ĐTVT", "4");

INSERT INTO courses VALUES (0, "QH-2012");
INSERT INTO courses VALUES (1, "QH-2013");
INSERT INTO courses VALUES (2, "QH-2014");
INSERT INTO courses VALUES (3, "QH-2015");
INSERT INTO courses VALUES (4, "QH-2016");
INSERT INTO courses VALUES (5, "QH-2017");

INSERT INTO thesis_councils VALUES (0,"320 E3", "1");
INSERT INTO thesis_councils VALUES (1,"105 G2", "2");
INSERT INTO thesis_councils VALUES (2,"316 GĐ2", "3");
INSERT INTO thesis_councils VALUES (3,"3 G3", "4");

INSERT INTO thesis_council_has_teacher VALUES (0,1,0);
INSERT INTO thesis_council_has_teacher VALUES (0,2,1);
INSERT INTO thesis_council_has_teacher VALUES (0,3,2);
INSERT INTO thesis_council_has_teacher VALUES (0,4,3);
INSERT INTO thesis_council_has_teacher VALUES (1,5,4);
INSERT INTO thesis_council_has_teacher VALUES (1,6,5);
INSERT INTO thesis_council_has_teacher VALUES (1,7,6);
INSERT INTO thesis_council_has_teacher VALUES (1,8,7);
INSERT INTO thesis_council_has_teacher VALUES (1,9,8);
INSERT INTO thesis_council_has_teacher VALUES (2,10,9);
INSERT INTO thesis_council_has_teacher VALUES (2,4,10);
INSERT INTO thesis_council_has_teacher VALUES (2,2,11);
INSERT INTO thesis_council_has_teacher VALUES (3,3,12);
INSERT INTO thesis_council_has_teacher VALUES (3,4,13);

INSERT INTO subject_thesises VALUES (0,"How to play daxua",0,0);
INSERT INTO subject_thesises VALUES (1,"How to play daxua 2nd",1,0);
INSERT INTO subject_thesises VALUES (2,"How to play daxua 3rd",1,0);
INSERT INTO subject_thesises VALUES (3,"How to play daxua 4th",0,1);
INSERT INTO subject_thesises VALUES (4,"How to play daxua 5th",1,1);
INSERT INTO subject_thesises VALUES (5,"How to play daxua 6th",1,1);
INSERT INTO subject_thesises VALUES (6,"How to play daxua 7th",0,1);
INSERT INTO subject_thesises VALUES (7,"How to play daxua 8th",0,1);
INSERT INTO subject_thesises VALUES (8,"How to play daxua 9th",1,1);

INSERT INTO subject_thesis_has_teacher VALUES (0,1,0);
INSERT INTO subject_thesis_has_teacher VALUES (1,3,1);
INSERT INTO subject_thesis_has_teacher VALUES (1,2,2);
INSERT INTO subject_thesis_has_teacher VALUES (2,5,3);
INSERT INTO subject_thesis_has_teacher VALUES (3,6,4);
INSERT INTO subject_thesis_has_teacher VALUES (4,7,5);
INSERT INTO subject_thesis_has_teacher VALUES (5,8,6);
INSERT INTO subject_thesis_has_teacher VALUES (5,9,7);
INSERT INTO subject_thesis_has_teacher VALUES (6,10,8);
INSERT INTO subject_thesis_has_teacher VALUES (7,11,9);
INSERT INTO subject_thesis_has_teacher VALUES (8,14,10);

INSERT INTO record_thesises VALUES (0,0,0,0,0);
INSERT INTO record_thesises VALUES (1,1,1,0,0);
INSERT INTO record_thesises VALUES (2,1,2,1,0);
INSERT INTO record_thesises VALUES (3,0,3,2,0);
INSERT INTO record_thesises VALUES (4,0,4,2,0);
INSERT INTO record_thesises VALUES (5,0,5,3,0);
INSERT INTO record_thesises VALUES (6,1,6,3,1);
INSERT INTO record_thesises VALUES (7,0,7,1,0);

INSERT INTO record_thesis_has_teacher VALUES (0,1,0);
INSERT INTO record_thesis_has_teacher VALUES (1,1,1);
INSERT INTO record_thesis_has_teacher VALUES (2,2,2);
INSERT INTO record_thesis_has_teacher VALUES (3,3,3);
INSERT INTO record_thesis_has_teacher VALUES (4,4,4);
INSERT INTO record_thesis_has_teacher VALUES (5,5,5);
INSERT INTO record_thesis_has_teacher VALUES (6,6,6);
INSERT INTO record_thesis_has_teacher VALUES (7,7,7);
INSERT INTO record_thesis_has_teacher VALUES (0,2,8);
INSERT INTO record_thesis_has_teacher VALUES (2,6,9);
INSERT INTO record_thesis_has_teacher VALUES (1,4,10);

INSERT INTO critical_opinion VALUES (0,"Verry good","Better than ever",0,1);
INSERT INTO critical_opinion VALUES (1,"Verry good 1","Better than ever 1",1,2);
INSERT INTO critical_opinion VALUES (2,"Verry good 2","Better than ever 2",2,3);
INSERT INTO critical_opinion VALUES (3,"Verry good 3","Better than ever 3",3,4);
INSERT INTO critical_opinion VALUES (4,"Verry good 4","Better than ever 4",4,5);
INSERT INTO critical_opinion VALUES (5,"Verry good 5","Better than ever 5",5,6);
INSERT INTO critical_opinion VALUES (6,"Verry good 6","Better than ever 6",6,7);
INSERT INTO critical_opinion VALUES (7,"Verry good 7","Better than ever 7",7,8);
INSERT INTO critical_opinion VALUES (8,"Verry good 8","Better than ever 8",1,9);
INSERT INTO critical_opinion VALUES (9,"Verry good 9","Better than ever 9",2,11);
INSERT INTO critical_opinion VALUES (10,"Verry good 10","Better than ever 10",1,11);