<?php

namespace  Zan\Framework\Components\JobServer\Controller\Job\Dao;


use Zan\Framework\Store\Facade\Db;
use Zan\Framework\Utilities\DesignPattern\Singleton;
use Zan\Framework\Utilities\Types\Time;

class AttachmentDao
{
    use Singleton;
    
    /**
     * @param int $kdtId
     * @param array $attachmentIds
     * @param string $order
     * @param string $limit
     * @return array
     */
    public function getListByKdtIdAttachmentIds($kdtId, array $attachmentIds, $order = "", $limit = "") {
        yield Db::execute("general.attachment.select_by_kdt_id_attachment_ids", [
            "order" => $order,
            "limit" => $limit,
            "var"   => [
                "kdt_id"        => $kdtId,
                "attachment_ids"=> $attachmentIds,
            ]
        ]);
    }
    
    
    /**
     * @param int $kdtId
     * @param int $attachmentId
     * @param int $mediaType
     * @param string $newTitle
     * @return bool
     */
    public function updateTitle($kdtId, $attachmentId, $mediaType, $newTitle) {
        $affected  = (yield Db::execute("general.attachment.affected_title", ["var" => [
            "kdt_id"        => $kdtId,
            "attachment_id" => $attachmentId,
            "media_type"    => $mediaType,
            "attachment_title" => $newTitle,
        ]]));
        yield $affected === 1;
    }

    /**
     * @param int $kdtId
     * @param array $attachmentIds
     * @return int
     */
    public function markDelete($kdtId, array $attachmentIds) {
        yield Db::execute("general.attachment.affected_mark_deleted", ["var" => [
            "kdt_id"        => $kdtId,
            "attachment_ids"=> $attachmentIds,
        ]]);
    }

    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data){
        $data["created_time"] = Time::current();
        yield Db::execute("general.attachment.insert", [
            'insert' => $data
        ]);
    }
}