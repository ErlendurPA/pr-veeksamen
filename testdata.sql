-- Inserting data into the `bruker` table
INSERT INTO `fjellticket`.`bruker` (`epost`, `fornavn`, `etternavn`, `passord`, `rolle`) VALUES
('user1@example.com', 'John', 'Doe', 'password123', 1),
('user2@example.com', 'Jane', 'Smith', 'securepass', 2),
('user3@example.com', 'Alice', 'Johnson', 'p@ssw0rd', 1);

-- Inserting data into the `ticket` table
INSERT INTO `fjellticket`.`ticket` (`id`, `bruker_id`, `kategori`, `beskrivelse`, `svar`, `status`) VALUES
(1, 1, 'Technical', 'I am having trouble logging in.', 'We have reset your password. Please try again.', 1),
(2, 2, 'Billing', 'I have been charged incorrectly.', 'We will investigate the issue and refund you if necessary.', 2),
(3, 3, 'Technical', 'My account page is not loading properly.', 'We are aware of the issue and working on a fix.', 1);
