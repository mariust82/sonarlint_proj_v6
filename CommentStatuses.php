<?php
class CommentStatuses
{
    public function getAllBasic()
    {
        return DB("SELECT id, name FROM ". PARENT_SCHEMA .".comment_statuses")->toMap("id", "name");
    }

    public function getCustomStatuses(array $excludedStatusesIds): array
    {
        return DB("SELECT id, name FROM ". PARENT_SCHEMA .".comment_statuses WHERE id NOT IN (".implode(",", $excludedStatusesIds).")")->toMap("id", "name");
    }
}
