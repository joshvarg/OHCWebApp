Insert into doctor values
('111111111', 'Alice Wang'),
('222222222', 'John Codd');

Insert into hospital values
('00001', 'Riverside', '3535 Olentangy River Rd, Columbus, OH'),
('00002', "St. Ann's", '500 Cleveland Ave, Westerville, OH');

Insert into treatment values
('0004A', 'Immunization'),
('3006F', 'Chest X-ray'),
('2000F', 'Physical Exam'),
('4006F', 'Diagnostic');

Insert into patient values
('123456789', 'Robert Karp', true),
('987654321', 'Jane Codi', false);

Insert into practices_at values
('111111111', '00001', '50'),
('222222222', '00001', '50'),
('222222222', '00002', '50');

Insert into doctor_treatment values
('0004A', '111111111', '00001'),
('3006F', '111111111', '00001'),
('2000F', '111111111', '00001'),
('4006F', '111111111', '00001'),
('0004A', '222222222', '00001'),
('2000F', '222222222', '00001'),
('0004A', '222222222', '00002'),
('2000F', '222222222', '00002');

Insert into doctor_treatment_fee values
('0004A', '111111111', '100', '150'),
('3006F', '111111111', '300', '450'),
('2000F', '111111111', '200','300'),
('4006F', '111111111', '100', '150'),
('0004A', '222222222', '50', '100'),
('2000F', '222222222', '70', '140');