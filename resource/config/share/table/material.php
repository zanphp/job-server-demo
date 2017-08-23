<?php

return [
    // 指定连接
    "mysql.default_write" => [
        "media_category",
        "image_base",
    ],
    "mysql.cluster" => [
        "attachment",
        "media_meta",
        "media_category_mapping",
    ],
    "mysql.uuid" => [
        "messages",
        "weixin_messages",
//        "attachment", // 暂时不支持不同连接tableName相同,会被覆盖
        "feature",
        "goods",
        "fans",
        "goods_property",
        "team",
    ],
];