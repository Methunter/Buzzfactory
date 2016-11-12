CREATE TABLE `Buzzfactory`.`BF_Articles` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT,
 `title` TEXT NOT NULL ,
 `smallText` TEXT NOT NULL ,
 `bigText` LONGTEXT NOT NULL ,
 `pic` TEXT NOT NULL ,
 `link` TEXT NOT NULL ,
 `width` INT(5) NOT NULL ,
 `height` INT(5) NOT NULL ,
`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP  ,
 PRIMARY KEY (`id`)
 ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO `BF_Articles`(`title`,`smallText`,`bigText`,`pic`,`link`,`width`,`height`) VALUES
('foo',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis similique omnis doloribus fugiat pariatur obcaecati porro ea illum sunt quod, dolorum consequatur inventore recusandae possimus tenetur unde natus eaque ipsum.',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ipsum modi facilis quisquam fugiat voluptas et accusamus a quas laudantium, vitae doloremque quaerat eum nam voluptatem, natus ullam provident, sint. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut quaerat voluptatum voluptates nulla est placeat expedita, doloremque, magni debitis alias minima enim recusandae sed reiciendis mollitia, quam adipisci architecto.',
'/Images/pic.gif',
'http://www.google.com',
150,200),('Bar',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis similique omnis doloribus fugiat pariatur obcaecati porro ea illum sunt quod, dolorum consequatur inventore recusandae possimus tenetur unde natus eaque ipsum.',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ipsum modi facilis quisquam fugiat voluptas et accusamus a quas laudantium, vitae doloremque quaerat eum nam voluptatem, natus ullam provident, sint. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut quaerat voluptatum voluptates nulla est placeat expedita, doloremque, magni debitis alias minima enim recusandae sed reiciendis mollitia, quam adipisci architecto.',
'/Images/pep.jpg',
'http://www.google.com',
150,200),('love',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis similique omnis doloribus fugiat pariatur obcaecati porro ea illum sunt quod, dolorum consequatur inventore recusandae possimus tenetur unde natus eaque ipsum.',
'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ipsum modi facilis quisquam fugiat voluptas et accusamus a quas laudantium, vitae doloremque quaerat eum nam voluptatem, natus ullam provident, sint. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut quaerat voluptatum voluptates nulla est placeat expedita, doloremque, magni debitis alias minima enim recusandae sed reiciendis mollitia, quam adipisci architecto.',
'/Images/lov.jpg',
'http://www.google.com',
150,200);