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

/*==============================================================*/
/* Table: communes_volunteers                                   */
/*==============================================================*/
create table communes_volunteers
(
   commune_id           int not null,
   volunteer_id         int not null,
   primary key (commune_id, volunteer_id)
);

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

/*==============================================================*/
/* Table: tasks_tools                                           */
/*==============================================================*/
create table tasks_tools
(
   task_id              int not null,
   tool_id              int not null,
   primary key (task_id, tool_id)
);

/*==============================================================*/
/* Table: tools                                                 */
/*==============================================================*/
create table tools
(
   id              int not null auto_increment,
   name                 varchar(12) not null,
   primary key (id)
);

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



