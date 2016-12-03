/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     29-11-2016 18:26:35                          */
/*==============================================================*/


drop table if exists admins;

drop table if exists communes;

drop table if exists communes_volunteers;

drop table if exists emergencies;

drop table if exists managers;

drop table if exists missions;

drop table if exists notifications;

drop table if exists regions;

drop table if exists skills;

drop table if exists skills_volunteers;

drop table if exists tasks;

drop table if exists tasks_tools;

drop table if exists tools;

drop table if exists users;

drop table if exists volunteers;

/*==============================================================*/
/* Table: admins                                        */
/*==============================================================*/
create table admins
(
   id             int not null auto_increment,
   user_id              int not null,
   rut_admin            varchar(15) not null,
   name                 varchar(15) not null,
   last_name_first      varchar(15) not null,
   last_name_second     varchar(15) not null,
   age                  int not null,
   residency            varchar(20) not null,
   mail                 varchar(30) not null,
   primary key (id)
);

--
-- Dumping data for table `admins`
--


INSERT INTO `admins` (`id`, `user_id`, `rut_admin`, `name`, `last_name_first`, `last_name_second`, `age`, `residency`, `mail`) VALUES
(1, 1, '19123123-1', 'John', 'Cena', 'Mamani', 40, 'calle1', 'jcena@gmail.com'),
(2, 2, '13023345-6', 'Hideo', 'Kojima', 'Soto', 50, 'calle2', 'hkojima@konami.jp');
/*==============================================================*/
/* Table: communes                                              */
/*==============================================================*/
create table communes
(
   id           int not null auto_increment,
   admin_id             int not null,
   region_id            int not null,
   name                 varchar(20) not null,
   emergency_in_progress bool not null,
   primary key (id)
);

--
-- Dumping data for table `communes`
--

INSERT INTO `communes` (`id`, `admin_id`, `region_id`, `name`, `emergency_in_progress`) VALUES
(1, 2, 15, 'Putre', 1),
(2, 1, 8, 'Nuble', 0),
(3, 2, 13, 'Santiago', 0);


/*==============================================================*/
/* Table: communes_volunteers                                   */
/*==============================================================*/
create table communes_volunteers
(
   commune_id           int not null,
   volunteer_id         int not null,
   primary key (commune_id, volunteer_id)
);

--
-- Dumping data for table `communes_volunteers`
--

INSERT INTO `communes_volunteers` (`commune_id`, `volunteer_id`) VALUES
(3, 1),
(3, 2);

/*==============================================================*/
/* Table: emergencies                                           */
/*==============================================================*/
create table emergencies
(
   id         int not null auto_increment,
   commune_id           int not null,
   admin_id             int not null,
   date                 date not null,
   place                varchar(20) not null,
   severity             varchar(15) not null,
   description          text,
   status               varchar(15) not null,
   primary key (id)
);

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `commune_id`, `admin_id`, `date`, `place`, `severity`, `description`, `status`) VALUES
(1, 1, 2, '2016-12-25', 'nuble chico', 'GRAVE', 'SE INUNDO EL PUEBLO', 'en progreso');

/*==============================================================*/
/* Table: managers                                              */
/*==============================================================*/
create table managers
(
   id           int not null auto_increment,
   user_id              int not null,
   rut_manager          varchar(15) not null,
   admin_id             int not null,
   name                 varchar(15) not null,
   last_name_first      varchar(15) not null,
   last_name_second     varchar(15) not null,
   age                  int not null,
   residency            varchar(10) not null,
   mail                 varchar(30) not null,
   primary key (id)
);

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `user_id`, `rut_manager`, `admin_id`, `name`, `last_name_first`, `last_name_second`, `age`, `residency`, `mail`) VALUES
(1, 3, '18765398-4', 1, 'Nicolas', 'Roman', 'Marchant', 21, 'calle 69', 'nroman@gmail.com'),
(2, 4, '14567876-k', 2, 'Salvador', 'Allende', 'Gossens', 90, 'tumba 1', 'memate@gmail.com');

/*==============================================================*/
/* Table: missions                                              */
/*==============================================================*/
create table missions
(
   id           int not null auto_increment,
   manager_id           int not null,
   emergency_id         int not null,
   admin_id             int not null,
   mission_name         varchar(15) not null,
   volunteer_amount     int not null,
   status               varchar(15) not null,
   primary key (id)
);

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `manager_id`, `emergency_id`, `admin_id`, `mission_name`, `volunteer_amount`, `status`) VALUES
(1, 1, 1, 2, 'rescatar gente', 2, 'en progreso');

/*==============================================================*/
/* Table: notifications                                         */
/*==============================================================*/
create table notifications
(
   id      int not null auto_increment,
   manager_id           int not null,
   volunteer_id         int not null,
   detail               text,
   urgency_level        int not null,
   primary key (id)
);

/*==============================================================*/
/* Table: regions                                               */
/*==============================================================*/
create table regions
(
   id            int not null auto_increment,
   name                 varchar(20) not null,
   primary key (id)
);
--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'I REGION'),
(2, 'II REGION'),
(3, 'III REGION'),
(4, 'IV REGION'),
(5, 'V REGION'),
(6, 'VI REGION'),
(7, 'VII REGION'),
(8, 'VIII REGION'),
(9, 'IX REGION'),
(10, 'X REGION'),
(11, 'XI REGION'),
(12, 'XII REGION'),
(13, 'METROPOLITANA'),
(14, 'XIV REGION'),
(15, 'XV REGION');
/*==============================================================*/
/* Table: skills                                                */
/*==============================================================*/
create table skills
(
   id             int not null auto_increment,
   manager_id           int not null,
   skill_type           varchar(15) not null,
   skill_name           varchar(15) not null,
   primary key (id)
);


--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `manager_id`, `skill_type`, `skill_name`) VALUES
(1, 1, 'fuerza bruta', 'levantamiento'),
(2, 2, 'Salud', 'primeros auxilios');
/*==============================================================*/
/* Table: skills_volunteers                                     */
/*==============================================================*/
create table skills_volunteers
(
   volunteer_id         int not null,
   skill_id             int not null,
   domain_degree        int not null,
   primary key (volunteer_id, skill_id)
);

--
-- Dumping data for table `skills_volunteers`
--

INSERT INTO `skills_volunteers` (`volunteer_id`, `skill_id`, `domain_degree`) VALUES
(1, 1, 10),
(2, 2, 20);

/*==============================================================*/
/* Table: tasks                                                 */
/*==============================================================*/
create table tasks
(
   id              int not null auto_increment,
   manager_id           int not null,
   mission_id           int not null,
   task_name            varchar(20) not null,
   volunteer_amount     int not null,
   task_status          varchar(10) not null,
   guide_doc            text not null,
   primary key (id)
);

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `manager_id`, `mission_id`, `task_name`, `volunteer_amount`, `task_status`, `guide_doc`) VALUES
(1, 1, 1, 'levantar escombros', 1, 'en progreso', 'se levantan escombros con las manos.'),
(2, 1, 1, 'reanimar gente', 1, 'terminado', 'presionar fuertemente en el pecho.');
/*==============================================================*/
/* Table: tasks_tools                                           */
/*==============================================================*/
create table tasks_tools
(
   task_id              int not null,
   tool_id              int not null,
   primary key (task_id, tool_id)
);

--
-- Dumping data for table `tasks_tools`
--

INSERT INTO `tasks_tools` (`task_id`, `tool_id`) VALUES
(2, 1),
(1, 2);
/*==============================================================*/
/* Table: tools                                                 */
/*==============================================================*/
create table tools
(
   id              int not null auto_increment,
   name                 varchar(12) not null,
   primary key (id)
);

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`) VALUES
(1, 'Desfibrilador'),
(2, 'Pala'); 

/*==============================================================*/
/* Table: users                                                 */
/*==============================================================*/
create table users
(
   id              int not null auto_increment,
   username             varchar(15) not null,
   password             varchar(100) not null,
   attributes           varchar(3) not null,
   primary key (id)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `attributes`) VALUES
(1, 'jcena', '$2y$10$OSr.EQWu02zZZBDyaLL0qeUkpa4M9RIxkesK42CN3xz7BRvSW7JOS', 'A'),
(2, 'hkojima', '$2y$10$sEDY9yLXrBwyZECBFJZVHufYXNwre8OPaCT1QauFPwLB6XwFe7WR2', 'A'),
(3, 'nroman', '$2y$10$kQEgRZmOgvouL7kxbm5jKup/OtAc7L.P/u6JuMg1CE.B.GBMdjYa.', 'M'),
(4, 'sallende', '$2y$10$fy.6POoRnWmD9wmmWIZ2/.CtY4/sZyOnDOodJhwsN5vkuB2Axe866', 'M'),
(5, 'jmaden', '$2y$10$cM4yfpbXi2WAbVR9yyMkheIBHWT7MgVY0Vpl7RgH42rAVvx1G1Hn2', 'V'),
(6, 'ncage', '$2y$10$eRxThlvi3y2fFC54fQZ71Oo8/6saBBfixRVABpAUBqWv/M5CBToWS', 'V');


/*==============================================================*/
/* Table: volunteers                                            */
/*==============================================================*/
create table volunteers
(
   id         int not null auto_increment,
   rut_volunteer        varchar(15) not null,
   task_id              int,
   user_id              int not null,
   name                 varchar(15) not null,
   last_name_first      varchar(15) not null,
   last_name_second     varchar(15) not null,
   age                  int not null,
   residency            varchar(20) not null,
   mail                 varchar(30) not null,
   disponibility        bool not null,
   performance_area     varchar(15) not null,
   experience           int DEFAULT 0,
   phone                varchar(20) not null,
   actual_ubication     varchar(15) not null,
   primary key (id)
);

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `rut_volunteer`, `task_id`, `user_id`, `name`, `last_name_first`, `last_name_second`, `age`, `residency`, `mail`, `disponibility`, `performance_area`, `experience`, `phone`, `actual_ubication`) VALUES
(1, '19328734-0', NULL, 5, 'John', 'Maden', 'Maden', 34, 'the moon', 'johnmaden@johnmaden.jm', 1, 'Santiago', 0, '956632458', 'Santiago'),
(2, '10000999-8', NULL, 6, 'Nicolas', 'Cage', 'Cage', 55, 'calle 34', 'ncage@tnt.com', 1, 'Santiago', 0, '955687443', 'Santiago');

alter table admins add constraint FK_RELATIONSHIP_24 foreign key (user_id)
      references users (id) on delete restrict on update restrict;

alter table communes add constraint FK_DEFINE_ foreign key (admin_id)
      references admins (id) on delete restrict on update restrict;

alter table communes add constraint FK_TIENE1 foreign key (region_id)
      references regions (id) on delete restrict on update restrict;

alter table communes_volunteers add constraint FK_DECLARA_ foreign key (commune_id)
      references communes (id) on delete restrict on update restrict;

alter table communes_volunteers add constraint FK_DECLARA_2 foreign key (volunteer_id)
      references volunteers (id) on delete restrict on update restrict;

alter table emergencies add constraint FK_DEFINE_ACTUALIZA foreign key (admin_id)
      references admins (id) on delete restrict on update restrict;

alter table emergencies add constraint FK_OCURREN foreign key (commune_id)
      references communes (id) on delete restrict on update restrict;

alter table managers add constraint FK_DEFINE foreign key (admin_id)
      references admins (id) on delete restrict on update restrict;

alter table managers add constraint FK_RELATIONSHIP_22 foreign key (user_id)
      references users (id) on delete restrict on update restrict;

alter table missions add constraint FK_DEFINE_DECLARA foreign key (admin_id)
      references admins (id) on delete restrict on update restrict;

alter table missions add constraint FK_ES_ASIGNADO2 foreign key (manager_id)
      references managers (id) on delete restrict on update restrict;

alter table missions add constraint FK_SE_COMPONE_DE foreign key (emergency_id)
      references emergencies (id) on delete restrict on update restrict;

alter table notifications add constraint FK_REALIZA_RECIBE foreign key (volunteer_id)
      references volunteers (id) on delete restrict on update restrict;

alter table notifications add constraint FK_RECIBE_REALIZA foreign key (manager_id)
      references managers (id) on delete restrict on update restrict;

alter table skills add constraint FK_DEFINidAS_POR foreign key (manager_id)
      references managers (id) on delete restrict on update restrict;

alter table skills_volunteers add constraint FK_DECLARA foreign key (volunteer_id)
      references volunteers (id) on delete restrict on update restrict;

alter table skills_volunteers add constraint FK_POSEE foreign key (skill_id)
      references skills (id) on delete restrict on update restrict;

alter table tasks add constraint FK_DECLARA_DEFINE foreign key (manager_id)
      references managers (id) on delete restrict on update restrict;

alter table tasks add constraint FK_SE_COMPONE foreign key (mission_id)
      references missions (id) on delete restrict on update restrict;

alter table tasks_tools add constraint FK_SE_OCUPA foreign key (tool_id)
      references tools (id) on delete restrict on update restrict;

alter table tasks_tools add constraint FK_TIENE foreign key (task_id)
      references tasks (id) on delete restrict on update restrict;

alter table volunteers add constraint FK_REALIZA foreign key (task_id)
      references tasks (id) on delete restrict on update restrict;

alter table volunteers add constraint FK_RELATIONSHIP_23 foreign key (user_id)
      references users (id) on delete restrict on update restrict;



