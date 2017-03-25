-- データベースの設定

create database dotinstall_poll_php;

grant all on dotinstall_poll_php.* to dbuser@localhost identified by 'htmr821';

use dotinstall_poll_php

drop table if exists answers;
create table answers (
  id int not null auto_increment primary key,
  answer int not null,
  created datetime,
  remote_addr varchar(15),
  user_agent varchar(255),
  answer_date date,
  unique unique_answer(remote_addr, user_agent, answer_date),
  sex enum('male', 'female')
);


-- insert
insert into answers (answer, created, remote_addr, user_agent, answer_date, sex)
values (0, now(), 'aaa', 'BBB', now(), 'male');
insert into answers (answer, created, remote_addr, user_agent, answer_date, sex)
values (0, now(), 'bbb', 'DDD', now(), 'female');
insert into answers (answer, created, remote_addr, user_agent, answer_date, sex)
values (1, now(), 'ccc', 'KKK', now(), 'female');


-- select
select * from answers;
select answer, count(id) as count from answers group by answer;
select answer, sex, count(sex) as count from answers group by sex, answer;
