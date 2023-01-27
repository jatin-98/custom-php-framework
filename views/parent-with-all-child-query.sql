WITH recursive generation AS
(
     SELECT employee_id,
          employee_name,
          manager_name,
          manager_id,
          1 AS generation_number
     FROM   core_hr_manager_map
     WHERE  manager_id = 417
     /* IS NULL */
     UNION ALL
     SELECT child.employee_id,
          child.employee_name,
          child.manager_name,
          child.manager_id,
          generation_number+1 AS generation_number
     FROM   core_hr_manager_map child
     JOIN   generation g
     ON     g.employee_id = child.manager_id 
)
SELECT   g.employee_name AS employee_name,
         g.manager_name  AS manager_name,
         g.generation_number,
         parent.manager_id  AS manager_id,
         parent.employee_id AS employee_id
FROM     generation g
JOIN     core_hr_manager_map parent
ON       g.manager_id = parent.employee_id
ORDER BY generation_number;