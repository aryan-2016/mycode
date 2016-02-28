SELECT c.id FROM customer AS c WHERE c.id =
AND ((LOWER(c.name) LIKE LOWER('%abc%'))
OR (DATE_FORMAT(FROM_UNIXTIME(c.startdate),'%d/%m/%Y') LIKE '%$searchKeyword%')
LIMIT 10 OFFSET 21(startFrom)


SELECT id, timecompleted
FROM abc
WHERE (NOT (timecompleted IS NULL))


SELECT p.* from (
SELECT abc.id,abc.name
FROM abc 
JOIN def
ON def.cid= ghi.typeid
JOIN jkl ON jkl.id = ghi.pid
WHERE ghi.type=8 AND def.userid=123
UNION
SELECT abc.id,abc.name
FROM ghi
JOIN jkl ON jkl.id = ghi.pid
WHERE ghi.type=9
AND ghi.typeid =12 ) p


SELECT a.id
from abc b
JOIN def d ON d.id = b.id
JOIN efg e ON d.roleid = e.id
...
WHERE p.id=123 AND u.id=456

DROP TABLE IF EXISTS abc

`id` bigint(20) NOT NULL AUTO_INCREMENT
`name` varchar(10) NOT NULL
`time_created` int(11) NOT NULL
`type` varchar(15) NOT NULL DEFAULT 'abc'
`data` varchar(50) DEFAULT NULL COMMENT 'abc'
`expire` datetime DEFAULT NULL     --'2016-12-30 00:00:00'
`abc` smallint(6) NOT NULL DEFAULT '1'
`discount` decimal(10,2) NOT NULL
`description` text

PRIMARY KEY (`id`)
PRIMARY KEY (`id`,`c_id`)


INSERT INTO users(name)
SELECT empname 
FROM emp
WHERE emp_id =10 and name not in('','')


update employee emp
set emp_id =
(select distinct unew.id from users uold, users unew
where emp.emp_id = uold.id and uold.name=unew.name) where name=''

to_char(to_timestamp(startdate),'dd/yyyy/mm') LIKE '%2012%'

show COLUMNS from user;

