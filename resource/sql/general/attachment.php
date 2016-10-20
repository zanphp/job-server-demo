<?php

return [
    "select_by_kdt_id_attachment_ids" => [
        "require"   => ["kdt_id", "attachment_ids"],
        "limit"     => [],
        "sql"       => <<<'SQL'
        
SELECT /*兼容SqlParser判断sql类型*/ 
	attachment_id,
	mp_id,
	media_id,
	attachment_title,
	attachment_url,
	thumb_url,
	file_ext,
	attachment_size,
	media_type,
	media_expire_time,
	created_time,
	is_delete,
	width,
	height,
	source,
	bucket /**/
FROM attachment WHERE /**/
	mp_id = #{kdt_id} /**/
AND attachment_id IN #{attachment_ids} /**/
#ORDER# 
#LIMIT#
SQL
    ],

    "affected_title" => [
        "require"   => ["kdt_id", "attachment_id", "media_type", "attachment_title"],
        "limit"     => [],
        "sql"       => <<<SQL
UPDATE attachment SET /**/
  attachment_title = #{attachment_title} /**/
/**/WHERE /**/
    mp_id = #{kdt_id} /**/ 
AND attachment_id = #{attachment_id} /**/
AND media_type = #{media_type} /**/
LIMIT 1
SQL
    ],

    "affected_mark_deleted" => [
        "require"   => ["kdt_id", "attachment_ids"],
        "limit"     => [],
        "sql"       => <<<SQL
UPDATE attachment SET /**/
  is_delete = 1 /**/
/**/WHERE /**/
    mp_id = #{kdt_id}  /**/
AND attachment_id IN #{attachment_ids}  /**/
SQL
    ],

    "insert" => [
        "require"   => [],
        "limit"     => [],
        'sql' => 'INSERT INTO attachment #INSERT#' 
    ],

];