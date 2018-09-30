SELECT title, summary
FROM film 
WHERE summary like '%Vincent%' COLLATE UTF8_GENERAL_CI
ORDER BY id_film ASC;